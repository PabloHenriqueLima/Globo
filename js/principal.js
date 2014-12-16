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
    captureLength: 4
}
$("#buscarCliente").typeWatch( options );
// ############# GERENCIAR CLIENTE ################## //

// @ BOTÃO VISUALIZAR @ //
$(document).on("click","#btn_visualizar", function () {
    var idCliente = $(this).attr("idCliente");
    alertify.confirm("Deseja visualizar os dados do cliente ?", function (ok) {
        if (ok) {
            $.post(dirClientePHP+'editarCliente.php',{idCliente:idCliente}).done(function (result) {
                objResult = JSON.parse(result);
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
// @ BOTÃO EDITAR @ //
$(document).on("click","#btn_editar", function () {
    var idCLiente = $(this).attr("idCliente");
    alertify.confirm("Deseja editar os dados do cliente ?", function (ok) {
        if (ok) {
            $.post(dirClientePHP+'editarCliente.php',{idCliente:idCLiente}).done(function (result) {
                objResult = JSON.parse(result);
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
// @ BUSCAR CLIENTE NA ENTRADA DO PRODUTO @ //
$(function () {
    //
    var options2 = {
        callback: function (busca) {
            $.post(dirAcompPHP + "buscarClienteEntrada.php",{busca:busca}).done(function (response) {
              // console.debug(response);
                if(response){
                    $(".slct_buscarCliente").empty().append(response).trigger("chosen:updated");
                }
            });
        },
        wait: 300,
        captureLength: 4
    }
    $(".slct_buscarCliente").chosen();
    var buscaCliente = $(".chosen-search").find('input');
    buscaCliente.typeWatch( options2 );
});
// @ CARTUCHO @ //
var cartuchos = function () {
    if ($("#comcartucho").prop("checked")) {
        $("#cartucho").show();
    } else {
        $("#cartucho").hide();
    }
}
$(".comcartucho").on("click",cartuchos);
// @ ULTIMO SERVIÇO @ //

$(document).on("click","#btn_verUltimoServico", function () {
    alertify.alert('O código do ultimo serviço cadastrado é: ' + window.localStorage.getItem('ultimoCodigo'));
})

// @ Gerar garantia baixa serviço @ //    var garantia = function () {

var garantia = function () {
    if($("#gerargarantia")[0].checked){
        $("#gerarGarantiaBox").show();
    }else {
        $("#gerarGarantiaBox").hide();
    }

}
$("#gerargarantia").on("click",garantia);

// @ ativação de statuses @//

var atualizaStatus = function (codigoServico) {
    $.post(dirAcompPHP+'statusServico.php',{codigoServico:codigoServico}, function (response) {
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
                $("#frm_editarServico").show();
                $.post(dirAcompPHP + 'editarServico.php', {codigoServico: codigoServico}).done(function (result){
                    console.log(result);

                    if(!result){
                        console.log('Deu um erro lá');
                    }else {
                    objResult = JSON.parse(result);
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
                $("#frm_editarServico").show();
                $.post(dirAcompPHP + 'editarServico.php', {codigoServico: codigoServico}).done(function (result){
                    console.log(result);

                    if(!result){
                        console.log('Deu um erro lá');
                    }else {
                        objResult = JSON.parse(result);
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
// @ Salvar @ //
$("#salvarServicoS").click(function (e) {
    e.preventDefault();
    var codigoServico = $("#cosigoServicoS").val();
    var formValues = $("#frm_editarServico").serialize()+'&codigoServico='+codigoServico;
    console.log(formValues);
    $.post(dirAcompPHP+'atualizarServico.php',formValues,function (response) {
        alertify.alert(response);
    });
});
