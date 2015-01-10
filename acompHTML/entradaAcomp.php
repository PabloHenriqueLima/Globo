<!-- Jesus Cristo - O Senhor e Salvador da Terra. -->
<h4  class="text-center">Ordem de serviço</h4>

<form class="form-horizontal" method="post" id="frm_entradaServico"><!-- FORMULÁRIO CADASTRO -->
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <div class="input-group">
                    <input type="text"  name="search" id="search" placeholder="Buscar Cliente">

            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="nome" class="col-sm-2 control-label">Equipamento</label>
        <div class="col-sm-8">
            <input type="text" name="nomeProduto" class="form-control" id="nomeProduto" placeholder="Equipamento">
        </div>
    </div>
    <div class="form-group">
        <label for="nome" class="col-sm-4 control-label">Modelo / Modelo</label>
        <div class="col-sm-4">
            <input type="text" name="marcaModelo" class="form-control" id="marcaModelo" placeholder="Marca / Modelo">
        </div>
    </div>
    <div class="form-group">
        <label for="nome" class="col-sm-2 control-label">S/N</label>
        <div class="col-sm-4">
            <input type="text" name="numeroSerie" class="form-control" id="numeroSerie" placeholder="Número de Série">
        </div>
    </div>

    <div id="pcDesc" class="form-group">
        <div class="checkbox">
            <label><input type="checkbox" name="memoria" value="x">Placa Mãe?</label>
            <input type="text" class="form-control" name="placaMaeData" id="placaMaeData"/>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="memoria" value="x">Memória?</label>
            <input type="text" class="form-control" name="memoriaData" id="memoriaData"/>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="hdSsd" value="x">HD / SSD ?</label>
            <input type="text" class="form-control" name="hdSSdData" id="hdSsdData"/>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="fonte" value="x">Fonte?</label>
            <input type="text" class="form-control" name="fonteData" id="fonteData"/>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="placaVideo" value="x">Placa Vídeo?</label>
            <input type="text" class="form-control" name="placaVideoData" id="placaVideoData"/>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="leitorDvd" value="x">Leitor DVD?</label>
            <input type="text" class="form-control" name="leitorDvdData" id="leitorDvdData"/>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="leitorCard" value="x">Leitor Card?</label>
            <input type="text" class="form-control" name="leitorCardData" id="leitorCardData"/>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="outrasPlacas" value="x">Outros?</label>
            <input type="text" class="form-control" name="outrosData" id="outrasPlacasData"/>
        </div>
    </div>


    <div class="form-group">
        <textarea class="form-control" name="descDefeito"id="descDefeito" rows="3" placeholder="Descrição do Defeito"></textarea>
    </div>
    <div class="form-group">
        <div class="checkbox">
            <label><input type="checkbox" name="carregador" value="x">Com carregador</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="cabodados" value="x">Com cabo de dados</label>
        </div>
    <div class="checkbox">
        <label><input type="checkbox" name="cartucho" value="x">Com Cartuchos</label>
        <input type="text" class="form-control" name="cartuchoData" id="cartuchoData"/>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-5">
            <button type="submit" id="cadastrarEntrada" class="btn btn-success">Salvar</button>
        </div>
    </div>
</form> <!-- FORMULÁRIO CADASTRAR CLIENTE -->
