<!-- Jesus Cristo - O Senhor e Salvador da Terra. -->
<h4  class="text-center">Finalizar Ordem</h4>

<form class="form-horizontal" method="post" id="formBaixa"><!-- FORMULÁRIO CADASTRO -->
    <div class="form-group">
        <div class="col-sm-7">
            <div class="input-group">
                <span class="input-group-addon">Código de serviço-></span>
                <input type="text" id="codigoServico" name="codigoservico" class="form-control" maxlength="13" placeholder="Código do serviço">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="nome" class="col-sm-3 control-label">Equipamento</label>
        <div class="col-sm-7">
            <input type="text" name="nomeProdutoBaixa" class="form-control" disabled id="nomeProdutoBaixa">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="nome" class="col-sm-3 control-label">Cliente </label>
        <div class="col-sm-7">
            <input type="text" name="nomeClienteServico" class="form-control"  id="nomeClienteServico" disabled>
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="nome" class="col-sm-4 control-label">Valor do serviço</label>
        <div class="col-sm-3">
            <input type="text" name="valorServico" class="form-control" id="valorServico" placeholder="Valor">
        </div>
    </div><!--form-->
    <div class="form-group">
        <textarea class="form-control" name="descServico"id="descServico" rows="3" placeholder="Descrição do serviço realizado"></textarea>
    </div><!--form-->
    <div class="form-group">
        <label><input type="checkbox" id="gerarGarantia" name="gerarGarantia" value="x"> Gerar garantia para o serviço ?</label>
    <div class="checkbox">
                <input type="text" maxlength="3" name="garantiaDias" class="form-control" placeholder="Dias de garantia">
    </div><!--form-->
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-3">
                <button type="submit" id="salvarBaixa" class="btn btn-success">Finalizar Ordem</button>
        </div>
    </div> <!--form-->
</form> <!-- FORMULÁRIO SAIDA ACOMPANHAMENTO -->
