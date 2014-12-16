<!-- Jesus Cristo - O Senhor e Salvador da Terra. -->
<h4  class="text-center">Gerenciar Serviços</h4>
<form class="form-horizontal" method="post" id="frm_editarServico"><!-- FORMULÁRIO CADASTRO -->
    <div class="form-group">
        <label for="equipamentoS" class="col-sm-2 control-label">Equipamento</label>
        <div class="col-sm-8">
            <input type="text" name="equipamentoS" class="form-control" id="equipamentoS" placeholder="">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="dataEntradaS" class="col-sm-4 control-label">Data de Entrada</label>
        <div class="col-sm-4">
            <input type="text" name="dataEntradaS" class="form-control"  id="dataEntradaS" placeholder="">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="descDefeitoS" class="col-sm-2 control-label">Defeito</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="descDefeitoS" id="descDefeitoS" rows="3"></textarea>
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="carregadorS" class="col-sm-4 control-label">Com carregador?</label>
        <div class="col-sm-2">
            <input type="text" name="carregadorS" data-mask="S" class="form-control" id="carregadorS" placeholder="">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="caboDadosS" class="col-sm-4 control-label">Com cabo de dados?</label>
        <div class="col-sm-2">
            <input type="text" name="caboDadosS" data-mask="S"  class="form-control" id="caboDadosS" placeholder="">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="cartuchoPretoS" class="col-sm-4 control-label">Com Cartucho Preto?</label>
        <div class="col-sm-4">
            <input type="text" name="cartuchoPretoS" class="form-control"  id="cartuchoPretoS" placeholder="">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="cartuchoColoridoS" class="col-sm-4 control-label">Com Cartucho Cor?</label>
        <div class="col-sm-4">
            <input type="text" name="cartuchoColoridoS"  value="" class="form-control"  id="cartuchoColoridoS" placeholder="">
        </div>
    </div><!--form-->
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
            </div>
            <div class="col-sm-6">
                <button type="submit" id="salvarServicoS" class="btn btn-success">Salvar</button>
            </div>
        </div>
</form> <!-- FORMULÁRIO CADASTRAR CLIENTE -->

<form class="form-horizontal" method="post" id="frm_gerenciar"><!-- FORMULÁRIO CADASTRO -->
    <div class="form-group">
        <div class="col-sm-6">
            <div class="input-group">
                <span class="input-group-addon">Código de serviço-></span>
                <input type="text" id="cosigoServicoS" name="cosigoServicoS" class="form-control" maxlength="13" placeholder="Código do serviço">
            </div>
        </div>
        <button class="btn btn-primary" type="button" id="verServicoS">Ver serviço</button>
        <button class="btn btn-warning" type="button"  id="editarServicoS">Editar</button>
        <button class="btn btn-danger" type="button" id="excluirServicoS">Excluir</button>
    </div>
</form>
