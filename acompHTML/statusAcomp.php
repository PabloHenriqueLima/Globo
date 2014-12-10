<!-- Jesus Cristo - O Senhor e Salvador da Terra. -->

<h4  class="text-center">Status do Serviço</h4>

<form class="form-horizontal" method="post" id="formstatus"><!-- FORMULÁRIO CADASTRO -->
    <div class="form-group">
        <div class="col-sm-6">
            <div class="input-group">
                <span class="input-group-addon">Código de serviço-></span>
                <input type="text" id="codstatus" name="codstatus" class="form-control" maxlength="10" placeholder="Código do serviço">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="nome" class="col-sm-3 control-label">Status Atual</label>
        <div class="col-sm-7 statusAtual">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="nome" class="col-sm-3 control-label">Equipamento</label>
        <div class="col-sm-7">
            <input type="text" name="equipamento" id="equipamento" disabled class="form-control">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="nome" class="col-sm-3 control-label">Alterar Status</label>
        <div class="col-sm-7">
            <input type="text" name="alterStatus" class="form-control"  id="alterStatus">
            <button type="button" id="ativarStatus" class="btn btn-warning">Ativar</button>
        </div>
    </div><!--form-->
</form> <!-- FORMULÁRIO BUSCAR SERVIÇO -->
<h4  class="text-center">Status Padrões</h4>
<div class="col-lg-12">
    <span>Maquina Aberta: Manutenção em andamento.....</span>

    <button type="button" class="btn btn-warning statuses" href="#">Ativar</button>
</div>
<div class="col-lg-12">
    <span>Maquina Aberta: Realizando testes necessários.....</span>
    <button type="button" class="btn btn-warning statuses" href="#">Ativar</button>
</div>
<div class="col-lg-12">
    <span> Maquina Fechada: Manutenção Finalizada.</span>
    <button type="button" class="btn btn-warning statuses" href="#">Ativar</button>
</div>
<div class="col-lg-12">
    <span>Maquina Fechada: Favor comparecer à loja.</span>
    <button type="button" class="btn btn-warning statuses" href="#">Ativar</button>
</div>
<div class="col-lg-12">
    <span>Maquina Aberta: Problemas nos componentes físicos, favor comparecer à loja.</span>
    <button type="button" class="btn btn-warning statuses" href="#">Ativar</button>
</div>