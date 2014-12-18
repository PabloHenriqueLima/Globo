<form class="form-horizontal" method="post" id="gerengarantia"><!-- FORMULÁRIO CADASTRO -->
    <div class="form-group">
        <div class="col-sm-6">
            <div class="input-group">
                <span class="input-group-addon">Código de serviço-></span>
                <input type="text" id="codigoServicoG" name="codigoServicoG" class="form-control" maxlength="13" placeholder="Código do serviço">
            </div>
        </div>
    </div>
</form>
<button type="button" id="verGarantiaG" class="btn btn-primary"> Visualizar </button>
<button type="button" id="editarGarantiaG" class="btn btn-warning"> Editar </button>
<button type="button" id="excluirGarantiaG" class="btn btn-danger"> Excluir </button>

<form class="form-horizontal" method="post" id="frm_editarGarantia"><!-- FORMULÁRIO CADASTRO -->
    <div class="form-group">
        <label for="novoPeriodo" class="col-sm-2 control-label">+ Dias</label>
        <div class="col-sm-3">
            <input type="text" name="novoPeriodo" maxlength="60" class="form-control" id="novoPeriodo" placeholder="+Dias">
        </div>
    </div><!--form-->
</form>



<!-- Jesus Cristo - O Senhor e Salvador da Terra. -->
<form class="form-horizontal" method="post" id="frm_garantia"><!-- FORMULÁRIO CADASTRO -->
    <div class="form-group">
        <label for="equipamentoG" class="col-sm-2 control-label">Equipamento garantido</label>
        <div class="col-sm-8">
            <input type="text" name="equipamentoG" maxlength="60" class="form-control" id="equipamentoG" placeholder="">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="descDefeitoG" class="col-sm-2 control-label">Descrição do Defeito</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="descDefeitoG" id="descDefeitoG" rows="3" placeholder=""></textarea>
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="precoG" class="col-sm-2 control-label">Valor do Serviço</label>
        <div class="col-sm-2">
            <input type="text" name="precoG" maxlength="60" class="form-control"  id="precoG" placeholder="">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="inicioGarantia" class="col-sm-2 control-label">Inicio da Garantia</label>
        <div class="col-sm-4">
            <input type="text" name="inicioGarantia" maxlength="20" class="form-control" id="inicioGarantia" placeholder="">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="dataFinalGarantia" class="col-sm-2 control-label">Termino Garantia</label>
        <div class="col-sm-4">
            <input type="text" name="dataFinalGarantia"  class="form-control" id="dataFinalGarantia" placeholder="">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="servicoGarantido" class="col-sm-2 control-label">Serviço garantido</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="servicoGarantido" id="servicoGarantido" rows="3" placeholder=""></textarea>
        </div>
    </div><!--form-->
</form> <!-- FORMULÁRIO CADASTRAR CLIENTE -->
