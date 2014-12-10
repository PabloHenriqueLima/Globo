////////###########//////////// CADASTRO DA ENTRADA DO PRODUTO //////############//////////////########
//$("#formentrada").validate({
//    submitHandler:function(form){
//        if($("#cpfCliente").val() == ""){
//            alert('Selecione um cliente')
//        }else {
//        var serial =  $(form).serialize();
//        //console.log(serial);
//            $.post(dirAcompPhp + "cadastrarEntradaProduto.php",serial).done(function (response) {
//               console.log(response);
//                alert (response);
//                 form.reset();
//              //  location.reload();
//            });
//        }
//    },
//    errorClass:"alert-danger",
//    rules:{
//        nomeProduto:"required",
//        dataEntrada:"required",
//        descDefeito:"required"
//    },
//    messages:{
//        nomeProduto:"O nome do produto é obrigatório",
//        dataEntrada:"Data obrigatória",
//        descDefeito:"Preencha Acima"
//    }
//});
////////###########//////////// BAIXA NO SERVIÇO //////############//////////////########
//$("#formsaida").validate({
//    submitHandler:function(form){
//            var serial =  $(form).serialize();
//            console.log(serial);
//            $.post(dirAcompPhp + "cadastrarBaixa.php",serial).done(function (response) {
//                console.log(response);
//                alert (response);
//                form.reset();
//                //  location.reload();
//            });
//
//    },
//    errorClass:"alert-danger",
//    rules:{
//        valorServico:"required",
//        dataSaida:"required",
//        descServico:"required"
//    },
//    messages:{
//        valorServico:"Obrigatório",
//        dataSaida:"Data obrigatória",
//        descServico:"Preencha Acima"
//    }
//});
////////###########//////////////// BUSCAR CLIENTE //############//////////////########
//    var options = {
//        callback: function (busca) {
//            $.post(dirClientePhp + "buscarCliente.php",{busca:busca}).done(function (d) {
//               // console.log(d);
//                $("div#resultado table").empty().append(d);
//            });
//        },
//        wait: 500,
//        highlight: true,
//        captureLength: 1
//    }
//$("#buscarCliente").typeWatch( options );

//////###########//////////// BUSCA DO CLIENTE - ENTRADA DO PRODUTO //////############//////////////########
var options2 = {
    callback: function (busca) {
                $.post(dirAcompPhp + "buscarClienteEntrada.php",{busca:busca}).done(function (response) {
                    var dataJ = JSON.parse(response);
                    $("#nomeCliente").val(dataJ.nome);
                    $("#cpfCliente").val(dataJ.cpf);
                });
    },
    wait: 500,
    highlight: true,
    captureLength: 1
}
    $("#buscarClienteEnt").typeWatch( options2 );

//////###########//////////// GARANTIA VIA BAIXA DO SERVIÇO //////############//////////////########

    var garantia = function () {
         if($("#gerargarantia")[0].checked){
             $("#gerarGarantiaBox").show();
         }else {
             $("#gerarGarantiaBox").hide();
         }

    }
$("#gerargarantia").on("click",garantia);

//////###########//////////// VERIFICAR COM CARTUCHOS //////############//////////////########

var cartuchos = function () {
    if ($("#comcartucho").prop("checked")) {
        $("#cartucho").show();
    } else {
        $("#cartucho").hide();
    }
}
$("#comcartucho").on("click",cartuchos);

//////###########//////////// BAIXA NO SERVIÇO//////############//////////////########
$("#codigoservico").blur(function () {
    $.post(dirAcompPhp + "verificarServico.php",{codigoServico:this.value}).done(function (response) {
        if(response == 'false'){
            $("#codigoservico").removeClass("alert-success");
            $('#codigoservico').addClass('alert-danger');
            return false;
        }else{
            console.log(response);
            var dadosJSON = JSON.parse(response);
            $("#nomeClienteServico").val(dadosJSON.cliente);
            $("#nomeProdutoBaixa").val(dadosJSON.produto);
            $('#codigoservico').removeClass('alert-danger');
            $("#codigoservico").addClass("alert-success");
        }
    });
});

//////###########//////////// STATUS DO SERVIÇO//////############//////////////########
$("#codstatus").blur(function () {
    $.post(dirAcompPhp + "statusServico.php",{codstatus:this.value}).done(function (response) {
        if(response == 'false'){
            $("#codstatus").removeClass("alert-success");
            $('#codstatus').addClass('alert-danger');
            return false;
        }else{
            console.log(response);
            var dadosJSON = JSON.parse(response);
            $(".statusAtual").text(dadosJSON.statusAtual);
            $("#equipamento").val(dadosJSON.equipamento);
            $('#codstatus').removeClass('alert-danger');
            $("#codstatus").addClass("alert-success");
        }
    });
    $("#alterStatus").val('');
});
//////###########//////////// GERENCIAMENTO DE SERVICOS //////############//////////////########
$("#excluirservico").click(function () {
    var codigoServ = $("#codgeren").val();
    if(codigoServ ==""){alert('Insira um código de serviço')}
    $.post(dirAcompPhp+'excluirServico.php',{codigoServico:codigoServ}).done(function (response) {
        console.log(response);
    });
});
//////###########//////////// EDITAR SERVIÇO //////############//////////////########
$("#editarservico").click(function () {
    var codigoServ = $("#codgeren").val();
    if(codigoServ ==""){alert('Insira um código de serviço')}
    $.post(dirAcompPhp+'editarServico.php',{codigoServico:codigoServ}).done(function (response) {
        console.log(response);
        $("#formeditarservico").show();
        var dadosJSON = JSON.parse(response);
        $.each(dadosJSON, function (k,v) {
            $("#"+k).prop('disabled',false);
            $("#"+k).val(v);
        });
        $("#servcomandos").show();
    });//post
});
//////###########//////////// VISUALIZAR SERVIÇO //////############//////////////########
$("#servicover").click(function () {
    var codigoServ = $("#codgeren").val();
    if(codigoServ ==""){alert('Insira um código de serviço')}
    $.post(dirAcompPhp+'editarServico.php',{codigoServico:codigoServ}).done(function (response) {
       // console.log(response);
        $("#formeditarservico").show();
        var dadosJSON = JSON.parse(response);
        $.each(dadosJSON, function (k,v) {
            $("#"+k).val(v);
            $("#"+k).prop('disabled',true);
        });
        $("#servcomandos").hide();
    });//post
});
//////###########//////////// SALVAR ALTERAÇÕES SERVIÇO//////############//////////////########
$("#salvarservico").click(function (e) {
    e.preventDefault();
    var serial = $("#formeditarservico").serialize();
    var codserv = $("#codgeren").val();
    var serial = serial+'&codigoServico='+codserv;
    if(codserv ==""){alert('Insira um código de serviço')}
    $.post(dirAcompPhp+'atualizarServico.php',serial).done(function (response) {
        console.log(response);
        $("#formeditarservico").hide();
    });//post

});
//////###########//////////// ATIVAÇÕES DE STATUS//////############//////////////########

$("#ativarStatus").click(function () {
    if(!$("#codstatus").hasClass("alert-success")){
        alert('Código do serviço inválido');
    }else {
        var novoValor = $("#alterStatus").val();
        var codServico = $("#codstatus").val();
        $.post(dirAcompPhp+ "ativarStatus.php",{alterStatus:novoValor,codStatus:codServico}).done(function (response) {
            alert(response);
            $("#codstatus").blur();
        });
    }
});
//////###########//////////// ATIVAÇÕES DE STATUS PADRÕES //////############//////////////########
$(".statuses").click(function () {
    if(!$("#codstatus").hasClass("alert-success")){
        alert('Código do serviço inválido');
    }else {
        var textoDiv = $(this).parent().find("span").text()
        console.log(textoDiv);
        var codServico = $("#codstatus").val();
        $.post(dirAcompPhp+ "ativarStatus.php",{alterStatus:textoDiv,codStatus:codServico}).done(function (response) {
           // alert(response);
            $("#codstatus").blur();
        });
    }//vazio

});
////////############//////////######## GERENCIAMENTO DE GARANTIA ##########/////////////////
$("#codgaran").blur(function () {
    var codServ = document.getElementById('codgaran').value;
    $.post(dirGaranPhp+'garantia.php',{codigoServico:codServ}).done(function (response) {
        var dadosJSON = JSON.parse(response);
        $("#tbl_garantia").show();
        $(".eqp_value").text(dadosJSON.equipamento);
        $(".dataEntrada_value").text(dadosJSON.dataEnt);
        $(".defeito_value").text(dadosJSON.descDefeito);
        $(".solucao_value").text(dadosJSON.descBaixa);
        $(".preco_value").text('R$ '+dadosJSON.preco);
        $(".iniGarantia_value").text(dadosJSON.dataInicio);
        $(".FimGarantia_value").text('Fim');
    });
});
//////###########//////////////// MODAL DE OPÇÕES MENU //############//////////////########

    var abrirModal = function (id,nome,acao){
        $.confirm({
            title:"Confirmar ação->"+ acao +" cliente",
            text:"Tem certeza que você deseja " + acao + "  o cliente: <i><strong>" + nome + "</strong></i>",
            confirm: function(button) {

                switch (acao){
                    case "ver":
                        $.post(dirClientePhp + "editarCliente.php",{idEditar:id})
                            .done(function (dataJ) {
                                var data = JSON.parse(dataJ);
                                $("#tabCadCli").addClass("active");
                                $.each(data,function(k,v){
                                    $('#'+ k).val(v).prop('disabled', true);
                                    $(".cadcomandos").hide();
                                    console.log('Chave: '+ k + ' // ' + v);

                                }); // Each

                            }); //Done

                        break;
                    case "editar":
                        $.post(dirClientePhp + "editarCliente.php",{idEditar:id})
                            .done(function (dataJ) {
                                var data = JSON.parse(dataJ);
                                $("#tabCadCli").addClass("active");
                                $.each(data,function(k,v){
                                    console.log('Chave: '+ k + ' // ' + v);
                                    $('#'+ k).val(v).prop('disabled', false);
                                }); // Each
                                $("#action").val("atualizar");
                                $("#idCliente").val(data.id);
                                $(".cadcomandos").show();
                            }); //Done

                        break;

                    case "excluir":
                        $.post( dirClientePhp + "deletarCliente.php", { idDelete:id })
                            .done(function( data ) {
                                alert(data );
                                location.reload();
                            });
                        break;
                    default:
                        alert('Opção Inválida');
                }
            },
            cancel: function(button) {
                //  alert("Abortado.");
            },
            confirmButton: "Sim",
            cancelButton: "Não"
        });
    }

