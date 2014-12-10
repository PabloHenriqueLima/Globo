<!-- Jesus Cristo - O Senhor e Salvador da Terra. -->
<h4  class="text-center">Entrada de serviço</h4>

<form class="form-horizontal" method="post" id="frm_entradaServico"><!-- FORMULÁRIO CADASTRO -->
    <div class="form-group">
        <div class="col-sm-10">
            <div class="input-group">
                <label for="slct_buscarCliente"></label>
            <select data-placeholder="Clique e digite o nome do cliente" name="slct_buscarCliente" id="slct_buscarCliente" class="slct_buscarCliente" tabindex="1">
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
    </div>
    <div class="form-group">
        <label for="nome" class="col-sm-4 control-label">Data de entrada</label>
        <div class="col-sm-3">
            <input type="text" name="dataEntrada" class="form-control" id="dataEntrada" data-mask="99/99/9999" placeholder="Data">
        </div>
    </div>
    <div class="form-group">
        <textarea class="form-control" name="descDefeito"id="descDefeito" rows="3" placeholder="Descrição do Defeito"></textarea>
    </div>
    <div class="form-group">
        <div class="checkbox-inline">
            <label><input type="checkbox" name="carregador" value="x">Com carregador</label>
        </div>
        <div class="checkbox-inline">
            <label><input type="checkbox" name="cabodados" value="x">Com cabo de dados</label>
        </div>
    <div class="checkbox-inline comcartucho">
        <label><input type="checkbox" name="comcartucho" id="comcartucho" value="x"> Com Cartuchos</label>
                <div id="cartucho">
                        <input type="text" name="colorido" class="form-control" id="colorido" placeholder="Colorido">
                        <input type="text" name="pretobranco" class="form-control" id="pretobranco" placeholder="Preto">
                </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-5">
            <button type="submit" id="cadastrarEntrada" class="btn btn-success">Salvar</button>
        </div>
    </div>
</form> <!-- FORMULÁRIO CADASTRAR CLIENTE -->
