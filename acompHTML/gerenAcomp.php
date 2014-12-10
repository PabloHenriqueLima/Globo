<!-- Jesus Cristo - O Senhor e Salvador da Terra. -->

<h4  class="text-center">Gerenciar Serviços</h4>

<form class="form-horizontal" method="post" id="formeditarservico"><!-- FORMULÁRIO CADASTRO -->
    <div class="form-group">
        <label for="eqpservico" class="col-sm-2 control-label">Equipamento</label>
        <div class="col-sm-8">
            <input type="text" name="eqpservico" class="form-control" id="eqpservico" placeholder="">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="dtentrada" class="col-sm-4 control-label">Data de Entrada</label>
        <div class="col-sm-3">
            <input type="text" name="dtentrada" class="form-control"  id="dtentrada" placeholder="">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="descDefeitoServico" class="col-sm-2 control-label">Defeito</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="descDefeitoServico" id="descDefeitoServico" rows="3"></textarea>
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="ccarregador" class="col-sm-4 control-label">Com carregador?</label>
        <div class="col-sm-2">
            <input type="text" name="ccarregador" data-mask="a?" class="form-control" id="ccarregador" placeholder="">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="ccdados" class="col-sm-4 control-label">Com cabo de dados?</label>
        <div class="col-sm-2">
            <input type="text" name="ccdados"  data-mask="a?" class="form-control" id="ccdados" placeholder="">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="ccartucho" class="col-sm-4 control-label">Com Cartucho Preto?</label>
        <div class="col-sm-4">
            <input type="text" name="ccartpreto" class="form-control"  id="ccartpreto" placeholder="">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="ccartucho" class="col-sm-4 control-label">Com Cartucho Cor?</label>
        <div class="col-sm-4">
            <input type="text" name="ccartcor"  value="" class="form-control"  id="ccartcor" placeholder="">
        </div>
    </div><!--form-->
    <div id="servcomandos">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <button type="reset" class="btn btn-success">Limpar</button>
            </div>
            <div class="col-sm-6">
                <button type="submit" id="salvarservico" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </div>
</form> <!-- FORMULÁRIO CADASTRAR CLIENTE -->

<form class="form-horizontal" method="post" id="formgerenciar"><!-- FORMULÁRIO CADASTRO -->
    <div class="form-group">
        <div class="col-sm-6">
            <div class="input-group">
                <span class="input-group-addon">Código de serviço-></span>
                <input type="text" id="codgeren" name="codgeren" class="form-control" maxlength="10" placeholder="Código do serviço">
            </div>
        </div>
        <buttom class="btn btn-primary" name="servicover" id="servicover">Ver serviço</buttom>
        <buttom class="btn btn-warning" name="editarservico" id="editarservico">Editar</buttom>
        <buttom class="btn btn-danger" name="excluirservico" id="excluirservico">Excluir</buttom>

    </div>
</form>
