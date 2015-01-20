<!-- Jesus Cristo - O Senhor e Salvador da Terra. -->

<div role="tabpanel" class="tab-pane active" id="clientes"> <!-- CONTEÚDO DA TAB CLIENTES-->
    <div class="content-home">
        <div class="btn-grupo">
            <button type="button" class="btn btn-primary reload" href="#tabCadCli"  data-toggle="tab">Cadastrar Cliente</button>
            <button type="button" class="btn btn-primary" href="#tabGerCli"  data-toggle="tab">Gerenciar Clientes</button>
        </div> <!-- BOTÕES DA TAB CLIENTES-->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane" id="tabCadCli"><?php include dirClienteHtml."cadastrarCliente.php" ?></div>
            <div role="tabpanel" class="tab-pane active" id="tabGerCli"><?php include dirClienteHtml."gerenciarCliente.php" ?></div>
        </div><!-- TAB CONTEÚDO PARA CADA BOTÃO DO MENU CLIENTES -->
    </div><!--CONTENT-HOME-->
</div> <!--NAVEGAÇÃO CLIENTES -->