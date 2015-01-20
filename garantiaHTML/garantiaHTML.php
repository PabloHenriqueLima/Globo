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
        <label for="novoPeriodo" class="col-sm-3 control-label">Definir Garantia</label>
        <div class="col-sm-3">
            <input type="text" name="novoPeriodo" data-mask="999" maxlength="60" class="form-control" id="novoPeriodo" placeholder="Dias">
        </div>
    </div><!--form-->

        <div class="form-group">
            <label for="novoPeriodo" class="col-sm-3 control-label"></label>
             <div class="col-sm-3">
                 <button type="button" id="confirmarG" class="btn btn-primary">Confirmar</button>
             </div>
        </div>
</form>
