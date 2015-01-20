<!-- Jesus Cristo - O Senhor e Salvador da Terra. -->

<div role="tabpanel" class="tab-pane" id="acompanhamento"> <!--NAVEGAÇÃO ACOMPANHAMENTO -->
    <div class="content-home">
        <!--BOTÕES-->
        <div class="btn-grupo">
            <button type="button" class="btn btn-primary" href="#entrada"  data-toggle="tab">Ordem de Serviço</button>
            <button type="button" class="btn btn-primary" href="#status"  data-toggle="tab">Status da Ordem</button>
            <button type="button" class="btn btn-primary" href="#saida"  data-toggle="tab">Finalizar Ordem</button>

<!--            <button type="button" class="btn btn-primary" href="#verservico"  data-toggle="tab">Gerenciar Ordens</button>-->
        </div>
        <!--CONTEUDO PARA CADA BOTÃO -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane" id="entrada"><?php include dirAcompHtml . "OrdemServico.php" ?></div>
            <div role="tabpanel" class="tab-pane" id="status"> <?php include dirAcompHtml . "statusOrdem.php" ?> </div>
            <div role="tabpanel" class="tab-pane" id="saida"> <?php include dirAcompHtml."saidaAcomp.php" ?> </div>

<!--            <div role="tabpanel" class="tab-pane" id="verservico">--><?php //include dirAcompHtml."gerenAcomp.php" ?><!--</div>-->
        </div><!--CONTEUDO PARA CADA BOTÃO -->
        <!--BOTÕES-->
    </div><!--CONTENT-HOME-->
</div> <!--NAVEGAÇÃO ACOMPANHAMENTO -->
 