// CONTANTES E FUNÇÕES IMPORTANTES //
dirClientePHP = 'clientePHP/';
dirAcompPHP = 'acompPHP/';

function setConfig (){
    alertify.set({
        labels : {
            ok     : "Sim",
            cancel : "Agora não"
        },
        delay : 10000,
        buttonReverse : false,
        buttonFocus   : "Sim"
    });
}
$(document).ready(function() {
    $('#frm_cadastrarCliente')
        .bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nome: {
                    validators: {
                        notEmpty: {
                            message: 'O nome do cliente é obrigatório.'
                        },
                        stringLength:{
                            min:10,
                            message:'Nome muito curto.'
                        }
                    }
                },
                endereco:{
                    validators:{
                        notEmpty:{
                            message:'Onde o cliente mora?'
                        },
                        stringLength:{
                            min:5,
                            message:'Endereço muito curto.'
                        }
                    }
                },
                bairro:{
                    validators:{
                        notEmpty:{
                            message:'Digite o bairro do cliente !'
                        },
                        stringLength:{
                            min:5,
                            message:'Bairro muito curto.'
                        }
                    }
                },
                telefone:{
                    validators:{
                        notEmpty:{
                            message:'Telefone obrigatório.'
                        },
                        stringLength:{
                            min:13,
                            message:'Telefone incompleto.'
                        }
                    }
                },
                cep:{
                    validators:{
                        stringLength:{
                            min:9,
                            message:'Preecha corretamente o CEP.'
                        }
                    }
                },
                cpf:{
                    validators:{
                        stringLength:{
                            min:14,
                            message:'Preecha corretamente o CPF.'
                        }
                    }
                }
            }
        })
        .on('success.field.bv', function(e, data) {
                if (data.bv.isValid()) {
                    data.bv.disableSubmitButtons(false);
                }
            })
        .on('success.form.bv', function(e) {
            e.preventDefault();
            var $form = $(e.target);
            setConfig();
            alertify.confirm("Cadastrar cliente ?", function (ok) {
                if (ok) {
                    $.post(dirClientePHP+"cadastrarCliente.php", $form.serialize(), function (result) {
                        alertify.success(result);
                        $($form).data('bootstrapValidator').resetForm();
                        $form[0].reset();
                    });
                } else {
                    return false;
                }
            });
        }); // ON SUCCESS;

    // @ Validação Entrada de serviço @ //

    $('#frm_entradaServico')
        .bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nomeProduto: {
                    validators: {
                        notEmpty: {
                            message: 'O nome do produto é obrigatório.'
                        },
                        stringLength:{
                            min:5,
                            message:'Nome muito curto.'
                        }
                    }
                },
                dataEntrada:{
                    validators:{
                        notEmpty:{
                            message:'A data de entrada é obrigatória.'
                        },
                        stringLength:{
                            min:10,
                            message:'Data incompleta.'
                        }
                    }
                },
                descDefeito:{
                    validators:{
                        notEmpty:{
                            message:'Descrição do problema obrigatória.'
                        },
                        stringLength:{
                            min:10,
                            message:'Descrição muito curta'
                        }
                    }
                }
            }//fields
        })
        .on('success.field.bv', function(e, data) {
            if (data.bv.isValid()) {
                data.bv.disableSubmitButtons(false);
            }
        })
        .on('success.form.bv', function(e) {
            e.preventDefault();
            var $form = $(e.target);
            setConfig();
            alertify.confirm("Cadastrar entrada do serviço ?", function (ok) {
                if (ok) {
                    var formS = $form.serialize();
                    console.log(formS);
                    $.post(dirAcompPHP+"cadastrarEntradaProduto.php", $form.serialize(), function (result) {
                        window.localStorage.setItem('ultimoCodigo',result);
                        alertify.alert('Serviço cadastrado com sucesso, anote o código do serviço: ' + result);
                        $($form).data('bootstrapValidator').resetForm();
                        $form[0].reset();
                        $("#verUltimoServico").show();

                    });//post
                }else {
                    return false;
                }
            });
        }); // ON SUCCESS;

    // @ Baiba do serviço @ //
    $('#formBaixa')
        .bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                codigoservico: {
                    validators: {
                        notEmpty: {
                            message: 'Código do serviço obrigatório.'
                        },
                        stringLength:{
                            min:13,
                            message:'O código precisa ter 13 caracteres.'
                        }
                    }
                },
                valorServico: {
                    validators: {
                        notEmpty: {
                            message: 'Digite o valor do serviço.'
                        }
                    }
                },
                descServico: {
                    validators: {
                        notEmpty: {
                            message: 'Descreva o serviço realizado.'
                        },
                        stringLength:{
                            min:10,
                            message:'Descrição muito curta.'
                        }
                    }
                }
            }//fields
        })
        .on('success.field.bv', function(e, data) {
            console.debug(data);
            if(data.field === "codigoservico"){
               var codigoServico =  $("#codigoServico").val();
                $.post(dirAcompPHP+'verificarServico.php',{codigoServico:codigoServico}, function (response) {
                    if(!response){
                        $("#formBaixa").data('bootstrapValidator')
                            .updateStatus(data.field, 'INVALID')
                            .validateField(data.field)
                            .updateMessage(data.field,'stringLength','Código não encontrado.');
                    }else {
                        var dat = JSON.parse(response);
                        $("#nomeProdutoBaixa").val(dat.equipamento);
                        $("#nomeClienteServico").val(dat.cliente);
                    }
                });
            }
            if (data.bv.isValid()) {
                data.bv.disableSubmitButtons(false);
            }
        })
        .on('success.form.bv', function(e) {
            e.preventDefault();
            var $form = $(e.target);
            setConfig();
            alertify.confirm("Deseja dar baixa no serviço ?", function (ok) {
                if (ok) {
                    var formS = $form.serialize();
                    console.log(formS);
                    $.post(dirAcompPHP+"cadastrarBaixa.php", $form.serialize(), function (result) {
                        alertify.alert(result);
                        $($form).data('bootstrapValidator').resetForm();
                        $form[0].reset();

                    });//post
                }else {
                    return false;
                }
            });
        }); // ON SUCCESS;
});// Jquery ON load event
