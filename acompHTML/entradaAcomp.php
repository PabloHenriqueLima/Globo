<!-- Jesus Cristo - O Senhor e Salvador da Terra. -->
<h4  class="text-center">Entrada de serviço</h4>

<form class="form-horizontal" method="post" id="frm_entradaServico"><!-- FORMULÁRIO CADASTRO -->
    <div class="form-group buscaBox">
        <div class="col-sm-10">
            <div class="input-group">
                <label for="slct_buscarCliente"></label>
            <select data-placeholder="Clique e digite o nome do cliente" style="width:560px;" id="slct_buscarCliente" class="slct_buscarCliente" tabindex="1">
                <option value=""></option>
            </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="nome" class="col-sm-2 control-label">Produto</label>
        <div class="col-sm-8">
            <input type="text" name="nomeProduto" class="form-control" id="nomeProduto" placeholder="Produto">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="nome" class="col-sm-4 control-label">Data de entrada</label>
        <div class="col-sm-3">
            <input type="text" name="dataEntrada" class="form-control" id="dataEntrada" data-mask="99/99/9999" placeholder="Data de Entrada">
        </div>
    </div><!--form-->
    <textarea class="form-control" name="descDefeito"id="descDefeito" rows="3" placeholder="Descrição do Defeito"></textarea>
    <div class="checkbox-inline">
        <label><input type="checkbox" name="carregador" value="x">Com carregador</label>
    </div>
    <div class="checkbox-inline">
        <label><input type="checkbox" name="cabodados" value="x">Com cabo de dados</label>
    </div>
    <div class="checkbox-inline">
        <label><input type="checkbox" name="comcartucho" id="comcartucho" value="x"> Com Cartuchos</label>

        <div id="cartucho">
                <input type="text" name="colorido" class="form-control" id="colorido" placeholder="Colorido">
                <input type="text" name="pretobranco" class="form-control" id="pretobranco" placeholder="Preto">
        </div><!--form-->

    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-3">
            <div class="entcomandos">
                <button type="reset" class="btn btn-success">Limpar</button>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="cadcomandos">
                <input type="hidden" id="actionEntrada" name="action" class="form-control" value="entrada">
                <input type="hidden" id="idClienteEntrada" name="idClienteEntrada" class="form-control" value="">
                <button type="submit" id="cadastroEntrada" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </div> <!--form-->
</form> <!-- FORMULÁRIO CADASTRAR CLIENTE -->
