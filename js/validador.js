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
});
