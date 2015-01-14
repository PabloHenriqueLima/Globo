<!-- Jesus Cristo - O Senhor e Salvador da Terra. -->
<h4  class="text-center">Ordem de serviço</h4>
<!-- CADASTRAR ORDEM -->
<form class="form-horizontal cadastroOrdem" method="post" id="frm_entradaServico">
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
            <input type="text" name="equipamento" class="form-control" id="equipamento" placeholder="Equipamento">
        </div>
    </div>
    <div class="form-group">
        <label for="marcaModelo" class="col-sm-2 control-label">Marca/Modelo</label>
        <div class="col-sm-3 inline">
            <input type="text" name="marcaModelo" class="form-control" id="marcaModelo" placeholder="Marca / Modelo">
        </div>
        <label for="numeroSerie" class="col-sm-2 control-label">S/N</label>
        <div class="col-sm-3 inline">
            <input type="text" name="serie" class="form-control" id="numeroSerie" placeholder="Número de Série">
        </div>
    </div>

    <!-- PC DESCRIÇÃO -->
    <div class="form-group">

        <div class="checkbox">
            <label><input type="checkbox" name="placaMae" value="x">Placa Mãe</label>
        </div>
        <div class="form-group mt">
            <label for="placaMaeMarca" class="col-sm-1 control-label">Marca</label>
            <div class="col-sm-3 inline">
                <input type="text" class="form-control" name="placaMaeMarca" id="placaMaeMarca"/>
            </div>
            <label for="placaMaeSn" class="col-sm-1 control-label">S/N</label>
            <div class="col-sm-4 inline">
                <input type="text" class="form-control" name="placaMaeSn" id="placaMaeSn"/>
            </div>
        </div>

        <div class="checkbox">
            <label><input type="checkbox" name="processador" value="x">Processador</label>
        </div>
        <div class="form-group mt">
            <label for="processadorMarca" class="col-sm-1 control-label">Marca</label>
            <div class="col-sm-3 inline">
                <input type="text" class="form-control" name="processadorMarca" id="processadorMarca"/>
            </div>
            <label for="processadorfreq" class="col-sm-1 control-label">Freq.</label>
            <div class="col-sm-2 inline">
                <input type="text" class="form-control" name="processadorfreq" id="processadorfreq"/>
            </div>
            <label for="processadorBarr" class="col-sm-1 control-label">Barr.</label>
            <div class="col-sm-2 inline">
                <input type="text" class="form-control" name="processadorBarr" id="processadorBarr"/>
            </div>
        </div>


        <div class="checkbox">
            <label><input type="checkbox" name="memoria" value="x">Memória</label>
        </div>
        <div class="form-group mt">
            <label for="memoriaMarcaA" class="col-sm-1 control-label">Marca</label>
            <div class="col-sm-3 inline">
                <input type="text" class="form-control" name="memoriaMarcaA" id="memoriaMarcaA"/>
            </div>
            <label for="memoriaGbA" class="col-sm-1 control-label">GB</label>
            <div class="col-sm-2 inline">
                <input type="text" class="form-control" name="memoriaGbA" id="memoriaGbA"/>
            </div>
            <label for="memoriaSnA" class="col-sm-1 control-label">S/N</label>
            <div class="col-sm-4 inline">
                <input type="text" class="form-control" name="memoriaSnA" id="memoriaSnA"/>
            </div>
        </div>
        <div class="form-group mt">
            <label for="memoriaMarcaB" class="col-sm-1 control-label">Marca</label>
            <div class="col-sm-3 inline">
                <input type="text" class="form-control" name="memoriaMarcaB" id="memoriaMarcaB"/>
            </div>
            <label for="memoriaGbB" class="col-sm-1 control-label">GB</label>
            <div class="col-sm-2 inline">
                <input type="text" class="form-control" name="memoriaGbB" id="memoriaGbB"/>
            </div>
            <label for="memoriaSnB" class="col-sm-1 control-label">S/N</label>
            <div class="col-sm-4 inline">
                <input type="text" class="form-control" name="memoriaSnB" id="memoriaSnB"/>
            </div>
        </div>


        <div class="checkbox">
            <label><input type="checkbox" name="hdSsd" value="x">HD / SSD</label>
        </div>
        <div class="form-group mt">
            <label for="hdMarca" class="col-sm-1 control-label">Marca</label>
            <div class="col-sm-3 inline">
                <input type="text" class="form-control" name="hdMarca" id="hdMarca"/>
            </div>
            <label for="hdGb" class="col-sm-1 control-label">GB</label>
            <div class="col-sm-2 inline">
                <input type="text" class="form-control" name="hdGb" id="hdGb"/>
            </div>
            <label for="hdSn" class="col-sm-1 control-label">S/N</label>
            <div class="col-sm-4 inline">
                <input type="text" class="form-control" name="hdSn" id="hdSn"/>
            </div>
        </div>

        <div class="checkbox">
            <label><input type="checkbox" name="fonte" value="x">Fonte</label>
        </div>
        <div class="form-group mt">
            <label for="fonteMarca" class="col-sm-1 control-label">Marca</label>
            <div class="col-sm-3 inline">
                <input type="text" class="form-control" name="fonteMarca" id="fonteMarca"/>
            </div>
            <label for="fonteWatts" class="col-sm-1 control-label">Watts</label>
            <div class="col-sm-2 inline">
                <input type="text" class="form-control" name="fonteWatts" id="fonteWatts"/>
            </div>
            <label for="fonteSn" class="col-sm-1 control-label">S/N</label>
            <div class="col-sm-4 inline">
                <input type="text" class="form-control" name="fonteSn" id="fonteSn"/>
            </div>
        </div>

        <div class="checkbox">
            <label><input type="checkbox" name="placaVideo" value="x">Placa de Vídeo</label>
        </div>
        <div class="form-group mt">
            <label for="placaVideoMarca" class="col-sm-1 control-label">Marca</label>
            <div class="col-sm-3 inline">
                <input type="text" class="form-control" name="placaVideoMarca" id="placaVideoMarca"/>
            </div>
            <label for="placaVideoGb" class="col-sm-1 control-label">GB</label>
            <div class="col-sm-2 inline">
                <input type="text" class="form-control" name="placaVideoGb" id="placaVideoGb"/>
            </div>
            <label for="placaVideoSn" class="col-sm-1 control-label">S/N</label>
            <div class="col-sm-4 inline">
                <input type="text" class="form-control" name="placaVideoSn" id="placaVideoSn"/>
            </div>
        </div>

        <div class="checkbox">
            <label><input type="checkbox" name="leitorDvd" value="x">Leitor DVD</label>
        </div>
        <div class="form-group mt">
            <label for="leitorDvdMarca" class="col-sm-1 control-label">Marca</label>
            <div class="col-sm-3 inline">
                <input type="text" class="form-control" name="leitorDvdMarca" id="leitorDvdMarca"/>
            </div>
            <label for="leitorDvdSn" class="col-sm-1 control-label">S/N</label>
            <div class="col-sm-4 inline">
                <input type="text" class="form-control" name="leitorDvdSn" id="leitorDvdSn"/>
            </div>
        </div>

        <div class="checkbox">
            <label><input type="checkbox" name="leitorCartao" value="x">Leitor de Cartão</label>
        </div>
        <div class="form-group mt">
            <label for="leitorCartaoMarca" class="col-sm-1 control-label">Marca</label>
            <div class="col-sm-3 inline">
                <input type="text" class="form-control" name="leitorCartaoMarca" id="leitorCartaoMarca"/>
            </div>
            <label for="leitorCartaoSn" class="col-sm-1 control-label">S/N</label>
            <div class="col-sm-4 inline">
                <input type="text" class="form-control" name="leitorCartaoSn" id="leitorCartaoSn"/>
            </div>
        </div>

        <div class="checkbox">
            <label><input type="checkbox" name="outro" value="x">Outros</label>
        </div>
        <div class="form-group mt">
            <label for="outros" class="col-sm-1 control-label"></label>
            <div class="col-sm-12 inline">
                <input type="text" class="form-control" name="outros" id="outros"/>
            </div>
        </div>

    </div>


    <div class="form-group">
        <textarea class="form-control" name="infoPreliminar"id="infoPreliminar" rows="3" placeholder="Informações Preliminares"></textarea>
    </div>
    <div class="form-group">
        <div class="checkbox">
            <label><input type="checkbox" name="carregador" value="x">Com carregador</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="caboDados" value="x">Com cabo de dados</label>
        </div>

        <div class="checkbox">
            <label><input type="checkbox" name="cartucho" value="x">Com Cartucho</label>
        </div>
        <div class="form-group mt">
            <label for="cartuchoMarcaA" class="col-sm-1 control-label">Marca</label>
            <div class="col-sm-2 inline">
                <input type="text" class="form-control" name="cartuchoMarcaA" id="cartuchoMarcaA" placeholder="Marca"/>
            </div>
            <label for="cartuchoCorA" class="col-sm-1 control-label">Cor</label>
            <div class="col-sm-2 inline">
                <input type="text" class="form-control" name="cartuchoCorA" id="cartuchoCorA"/>
            </div>
            <label for="cartuchoSnA" class="col-sm-1 control-label">S/N</label>
            <div class="col-sm-4 inline">
                <input type="text" class="form-control" name="cartuchoSnA" id="cartuchoSnA"/>
            </div>
        </div>
        <div class="form-group mt">
            <label for="cartuchoMarcaB" class="col-sm-1 control-label">Marca</label>
            <div class="col-sm-2 inline">
                <input type="text" class="form-control" name="cartuchoMarcaB" id="cartuchoMarcaB" placeholder="Marca"/>
            </div>
            <label for="cartuchoCorB" class="col-sm-1 control-label">Cor</label>
            <div class="col-sm-2 inline">
                <input type="text" class="form-control" name="cartuchoCorB" id="cartuchoCorB"/>
            </div>
            <label for="cartuchoSnB" class="col-sm-1 control-label">S/N</label>
            <div class="col-sm-4 inline">
                <input type="text" class="form-control" name="cartuchoSnB" id="cartuchoSnB"/>
            </div>
        </div>


    </div>

    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-5">
            <button type="submit" id="cadastrarEntrada" class="btn btn-success">Salvar</button>
        </div>
    </div>
</form> <!-- FORMULÁRIO CADASTRAR CLIENTE -->
