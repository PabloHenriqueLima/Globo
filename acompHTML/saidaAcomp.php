<!-- Jesus Cristo - O Senhor e Salvador da Terra. -->
<h4  class="text-center">Baixa no serviço</h4>

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
    <div class="checkbox-inline">
        <label><input type="checkbox" id="gerargarantia" name="gerargarantia" value="x">Gerar garantia para o serviço</label>
        <div class="form-group" id="gerarGarantiaBox">
            <label for="nome" class="col-sm-4 control-label">Garantia</label>
            <div class="col-sm-4">
                <input type="text" name="garantia" class="form-control" id="garantia" placeholder="dias">
            </div>
        </div><!--form-->
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-3">
            <div class="entcomandos inline">
                <button type="reset" class="btn btn-success">Limpar</button>
            </div>
        </div>
        <div class="col-sm-6">
                <button type="submit" id="salvarBaixa" class="btn btn-success">Baixar serviço</button>
        </div>
    </div> <!--form-->
</form> <!-- FORMULÁRIO SAIDA ACOMPANHAMENTO -->
