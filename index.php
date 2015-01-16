<?php ob_start( 'ob_gzhandler' ); require "configs/mainConfigs.php"; ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <!-- Jesus Cristo - O Senhor e Salvador da Terra. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Globo Informática System</title>
    <meta name="description" content="Globo Sys">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="css/alertify.core.css"/>
    <link rel="stylesheet" href="css/alertify.default.css"/>
    <link rel="stylesheet" href="css/bootstrapValidator.css"/>

</head>

<body>
<!--[if lt IE 7]>
<p class="browsehappy">Você está usando um navegador <strong> desatualizado</strong>
    Por favor <a href="http://browsehappy.com/">Atualize seu navegador</a> para melhorar sua experiência.</p>
<![endif]-->
    <header class="centro" id="menu">
        <ul class="nav nav-tabs" role="tablist" id="menuPrincipal">
             <li role="presentation"><a href="#clientes" role="tab" data-toggle="tab">Clientes</a></li>
             <li role="presentation"><a href="#acompanhamento" role="tab" data-toggle="tab">Serviço</a></li>
             <li role="presentation"><a href="#abagarantia" role="tab" data-toggle="tab">Garantia</a></li>
<!--             <li role="presentation"><a href="#produtos" role="tab" data-toggle="tab">Produtos</a></li>-->
<!--             <li role="presentation"><a href="#vendas" role="tab" data-toggle="tab">Vendas</a></li>-->
        </ul>
    </header><!-- NAVEGAÇÃO MENU PRINCIPAL-->
<div class="centro">
    <div class="tab-content">

        <?php include "clientes.php" ?>
        <?php include "acompanhamento.php" ?>
        <?php include "garantia.php" ?>
        <?php include "produtos.php" ?>
        <?php include "vendas.php" ?>

</div> <!-- TAB COM CONTEUDO DO MENU -->
</div>
<div id="verUltimoServico"><button type="button" id="btn_verUltimoServico" class="btn btn-success">Imprimir</button></div>

<script type="text/javascript" src="js/core/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/core/bootstrap.min.js"></script>
<script type="text/javascript" src="js/plugins/typewatch.js"></script>
<script type="text/javascript" src="js/plugins/jquery.mask.js"></script>
<script type="text/javascript" src="js/plugins/alertify.js"></script>
<script src="js/plugins/type.js"></script>
<script type="text/javascript" src="js/plugins/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="js/language/pt_BR.js"></script>
<script type="text/javascript" src="js/validador.js"></script>
<script type="text/javascript" src="js/principal.js"></script>
</body>
</html>
