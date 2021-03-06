// # BUSCAR CLIENTE # //
var options = {
    callback: function (value) {
        $.post(dirClientePHP + "buscarCliente.php",{buscarCliente:value}).done(function (result) {
            // console.log(result);
            $(".comandosClientes").show();
            $("#tbl_resultado").find('tbody').empty().append(result);
        });
    },
    wait: 500,
    highlight: true,
    captureLength: 2
}
$("#buscarCliente").typeWatch( options );
// ############# GERENCIAR CLIENTE ################## //

// @ BOTÃO VISUALIZAR @ //
$(document).on("click","#btn_visualizar", function () {
    var idCliente = $(this).attr("idCliente");
    alertify.confirm("Deseja visualizar os dados do cliente ?", function (ok) {
        $(".servicesResults").hide();
        if (ok) {
            $.post(dirClientePHP+'editarCliente.php',{idCliente:idCliente}).done(function (result) {
               var objResult = JSON.parse(result);
                objResult.key = function (n) {
                    return this[Object.keys(this)[n]];
                }
                var formEditar = $("#frm_editarCliente").show().find('input');
                var i = 1;
                $.each(formEditar, function (index,e) {
                    e.value = objResult.key(i);
                    e.disabled = true;
                    i++;
                });
                $("#btn_cadastroB").hide();

            });
        }else {
            return false;
        }
    });
})
// @ BOTÃO VISUALIZAR @ //
$(document).on("click","#btn_servicos", function () {
    var idCliente = $(this).attr("idCliente");
    alertify.confirm("Deseja visualizar os serviços do cliente ?", function (ok) {
        if (ok) {
            $.post(dirClientePHP+'ordensCliente.php',{idCliente:idCliente}).done(function (result) {

                if(result) $(".servicesResults").show().html(result);
                if(!result) alertify.alert('Nenhum serviço cadastrado para esse cliente.')
            });
        }else {
            return false;
        }
    });
})
// @ BOTÃO EDITAR @ //
$(document).on("click","#btn_editar", function () {
    var idCLiente = $(this).attr("idCliente");
    alertify.confirm("Deseja editar os dados do cliente ?", function (ok) {
        $(".servicesResults").hide();
        if (ok) {
            $.post(dirClientePHP+'editarCliente.php',{idCliente:idCLiente}).done(function (result) {
              var objResult = JSON.parse(result);
                objResult.key = function (n) {
                    return this[Object.keys(this)[n]];
                }
                var formEditar = $("#frm_editarCliente").show().find('input');
                var i = 1;
                $.each(formEditar, function (index,e) {
                    e.value = objResult.key(i);
                    e.disabled = false;
                    i++;
                });
                $("#btn_cadastroB").show().attr("idcliente",objResult.key(0));


            });
        }else {
            return false;
        }
    });
});
// @ BOTÃO SALVAR @ //
$(document).on("click","#btn_cadastroB", function (e) {
    this.disabled = true;
    e.preventDefault();
    var idCliente = $("#btn_cadastroB").attr("idcliente");
    var dadosNew = $("#frm_editarCliente").serialize();
    var dadosNew = dadosNew+'&idCliente='+idCliente;
    console.log(dadosNew);
    $.post(dirClientePHP+'atualizarCliente.php',dadosNew).done(function (result) {
        alertify.success(result);
        var atualizar = $("#buscarCliente").val();
        $.post(dirClientePHP + "buscarCliente.php",{buscarCliente:atualizar}).done(function (response) {
            $("#tbl_resultado").find('tbody').empty().append(response);
        });
        window.setTimeout(function () {
         $("#btn_cadastroB").prop("disabled",false);
        },8000);
    });
});
// # BOTÃO DELETAR @ //
$(document).on("click","#btn_deletar", function () {
    var idCliente = $(this).attr("idCliente");
    alertify.confirm("Deseja DELETAR o cliente ?", function (ok) {
        if (ok) {
            $.post(dirClientePHP + "deletarCliente.php", {idCliente: idCliente}).done(function (response) {
                alertify.success(response);
                $("#tbl_resultado").find('tbody').empty();
            });
        }//if ok
    });

});
// @ BUSCAR CLIENTE NA ENTRADA DO EQUIPAMENTO @ //

$(document).ready(function(){
    $("#search").typeahead({
        name : 'sear',
        remote: {
            url : dirAcompPHP+'buscarClienteOrdem.php?nomeCliente=%QUERY'
        }
    });
});

// @ PC DESC ATIVADORES @ //
$(".cadastroOrdem .checkbox input").click(function () {
    var $thisName = this.getAttribute("name");
    var obj = this.parentNode.parentNode;
   // console.debug();
    var obj = $(obj).next();

    if($(this).prop("checked")){
        if($thisName == 'cartucho' || $thisName == 'memoria' ) $(obj).next().show();
        $(obj).show();
    }else{
        if($thisName == 'caboDados' || $thisName == 'carregador') return;
        $(obj).hide();
        if($thisName == 'cartucho') $(obj).next().hide();
        if($thisName == 'memoria') $(obj).next().hide();
    }
});

// @ ULTIMO SERVIÇO @ //

$(document).on("click","#btn_verUltimoServico", function () {
    alertify.alert(
            'Último Cliente: ' + window.localStorage.getItem('nome') +
            '<br /> O código da ultima ordem cadastrada é: ' + window.localStorage.getItem('ultimoCodigo')+

    '<br /> <a target="_blank" href="ordem/gerarOrdem.php?ordem='+ window.localStorage.getItem('ultimoCodigo')+'"><button type="submit" class="btn btn-success btn-lg btn-custom">Imprimir Ordem</button></a>'
    );
});

// @ ativação de statuses @//

var atualizaStatus = function (codigoServico) {
    $.post(dirAcompPHP+'statusOrdem.php',{codigoServico:codigoServico}, function (response) {
        var dat = JSON.parse(response);
        $(".statusAtual").text(dat.statusAtual);
    });
}
$("#ativarStatus").click(function () {
    var  codigoServico = $("#codigoServicoStatus").val();
    var valorNovoStatus = $("#alterStatus").val();
    $.post(dirAcompPHP+'ativarStatus.php',{codigoServico:codigoServico,valorNovoStatus:valorNovoStatus}, function (response) {
        alertify.alert(response);
        atualizaStatus(codigoServico);
    });
});

$(".statuses").click(function () {
        var  codigoServico = $("#codigoServicoStatus").val();
        var textoDiv = $(this).parent().find("span").text();
        $.post(dirAcompPHP+ "ativarStatus.php",{valorNovoStatus:textoDiv,codigoServico:codigoServico},function (response) {
            atualizaStatus(codigoServico);
        }
    );
});

// @ Gerenciamento de serviços @ //
// @ Visualizando Serviço  @ //
$("#verServicoS").click(function (){
    var codigoServico = $("#cosigoServicoS").val();
    if(codigoServico.length < 13 || !codigoServico ) {
        alertify.alert('ERRO: Código Inválido.')
    }else {
        alertify.confirm("Deseja ver os dados do serviço ?", function (ok) {
            if (ok) {
                $.post(dirAcompPHP + 'editarServico.php', {codigoServico: codigoServico}).done(function (result){
                    console.log(result);

                    if(!result){
                        alertify.alert('Serviço não cadastrado.');
                    }else {
                    var objResult = JSON.parse(result);
                    objResult.key = function (n) {
                        return this[Object.keys(this)[n]];
                    }
                    var formEditar = $("#frm_editarServico").show().find($('input:text, textarea'));
                    var i = 0;
                    $.each(formEditar, function (index, e) {
                        e.value = objResult.key(i);
                        e.disabled = true;
                        i++;
                    });

                    }
                });


            } else {
                return false;
            }
        });
    } //else
});

// @ Editando serviço @ //
$("#editarServicoS").click(function (){
    var codigoServico = $("#cosigoServicoS").val();
    if(codigoServico.length < 13 || !codigoServico ) {
        alertify.alert('ERRO: Código Inválido.')
    }else {
        alertify.confirm("Deseja editar os dados do serviço ?", function (ok) {
            if (ok) {
                $.post(dirAcompPHP + 'editarServico.php', {codigoServico: codigoServico}).done(function (result){
                    console.log(result);

                    if(!result){
                        alertify.alert('Serviço não cadastrado.');
                    }else {
                      var objResult = JSON.parse(result);
                        objResult.key = function (n) {
                            return this[Object.keys(this)[n]];
                        }
                        var formEditar = $("#frm_editarServico").show().find($('input:text, textarea'));
                        var i = 0;
                        $.each(formEditar, function (index, e) {
                            e.value = objResult.key(i);
                            if(i == 1) {
                                e.disabled = true
                            }else{
                                e.disabled = false;
                            }
                            i++;
                        });

                    }
                });


            } else {
                return false;
            }
        });
    } //else
});
// @ Excluir serviço @ //
$("#excluirServicoS").click(function (){
    var codigoServico = $("#cosigoServicoS").val();
    if(codigoServico.length < 13 || !codigoServico ) {
        alertify.alert('ERRO: Código Inválido.')
    }else {
        alertify.confirm("Deseja EXCLUIR os dados do serviço ?", function (ok) {
            if (ok) {
                        $.post(dirAcompPHP + 'excluirServico.php', {codigoServico: codigoServico}).done(function (result){
                            $("#frm_editarServico").hide();
                            alertify.alert(result);
                        });
                    } else {
                return false;
            }
        });
    } //else
});

// @ Salvar  Serviço @ //
$("#salvarServicoS").click(function (e) {
    e.preventDefault();
    var codigoServico = $("#cosigoServicoS").val();
    var formValues = $("#frm_editarServico").serialize()+'&codigoServico='+codigoServico;
    console.log(formValues);
    $.post(dirAcompPHP+'atualizarServico.php',formValues,function (response) {
        alertify.alert(response);
    });
});
$("#verGarantiaG").click(function(){
    var codigoServico = $("#codigoServicoG").val();
    if(codigoServico.length < 13 || !codigoServico ) {
        alertify.alert('ERRO: Código Inválido.')
    }else {
        $.post(dirGarantiaPHP+'garantia.php',{codigoServico:codigoServico},function(response){
            res = JSON.parse(response);
            alertify.alert('Serviço garantido até o dia:' + res.dataFinal );
        });
    }
});
$("#editarGarantiaG").click(function () {
    var codigoServico = $("#codigoServicoG").val()
    if(codigoServico.length < 13 || !codigoServico ) {
        alertify.alert('ERRO: Código Inválido.')
    }else {
        $.post(dirGarantiaPHP+'garantia.php',{codigoServico:codigoServico,controle:true},function(response){
            if(!response){
                alertify.alert('Esse serviço não foi garantido.')
            }else {
                $("#frm_garantia").hide();
                $("#frm_editarGarantia").show()
            }
        });
    }
});

$("#confirmarG").click(function () {
    var codigoServico = $("#codigoServicoG").val();
    var novoPeriodo = $("#novoPeriodo").val();
    $.post(dirGarantiaPHP+'atualizarGarantia.php',{codigoServico:codigoServico,novoPeriodo:novoPeriodo}, function (response) {
        alertify.alert('A garantia foi definida para '+response + ' dias após a finalização do serviço.')
    });
});
$("#excluirGarantiaG").click(function () {
    var codigoServico = $("#codigoServicoG").val();
    if(codigoServico.length < 13 || !codigoServico ) {
        alertify.alert('ERRO: Código Inválido.')
    }else {
        alertify.confirm("Deseja mesmo remover a garantia desse serviço ?", function (ok) {
            if(ok) {
                $.post(dirGarantiaPHP+'excluirGarantia.php',{codigoServico:codigoServico},function(response){
                    if(!response){
                        alertify.alert('Garantia não encontrada.')
                    }else {
                        alertify.alert('Garantia deletada com sucesso.')
                    }
                });

            }//if OK
        }) // confirm
    }
});

//@ Gerar Garantia @//
$("#gerarGarantia").click(function () {
    if($(this).prop('checked')){
       $("#formBaixa .checkbox").show();
    }else{
        $("#formBaixa .checkbox").hide();
    }
});


// @ Ativar Orçamento @ //
$("#ativarOrcamento").click(function () {
        var valor = prompt('Insira o valor do orçamento em R$');
        var referente = prompt('Descrição do orçamento');
        var codigoServico = $("#codigoServicoStatus").val();
        if(valor && referente){
            $.post(dirAcompPHP+'gravarOrcamento.php',{codigoServico:codigoServico,referente:referente,valor:valor}, function (response) {
                alertify.success(response);
            });
    }
});







