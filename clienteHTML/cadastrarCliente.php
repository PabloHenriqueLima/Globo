<!-- Jesus Cristo - O Senhor e Salvador da Terra. -->
    <h4 class="text-center">Cadastrar novo cliente</h4>
    <form class="form-horizontal" method="post" id="frm_cadastrarCliente"><!-- FORMULÁRIO CADASTRO -->
        <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Nome</label>
            <div class="col-sm-8">
                <input type="text" name="nome" maxlength="60" class="form-control" id="ipt_nomeCliente" placeholder="Nome">
            </div>
        </div><!--form-->
        <div class="form-group">
            <label for="cpf" class="col-sm-2 control-label">CPF</label>
            <div class="col-sm-4">
                <input type="text" name="cpf" data-mask="000.000.000-00" class="form-control" id="ipt_cpfCliente" placeholder="CPF">
            </div>
        </div><!--form-->
        <div class="form-group">
            <label for="endereco" class="col-sm-2 control-label">Endereço</label>
            <div class="col-sm-10">
                <input type="text" name="endereco" maxlength="60" class="form-control"  id="ipt_enderecoCliente" placeholder="Endereço">
            </div>
        </div><!--form-->
        <div class="form-group">
            <label for="bairro" class="col-sm-2 control-label">Bairro</label>
            <div class="col-sm-4">
                <input type="text" name="bairro" maxlength="20" class="form-control" id="ipt_bairroCliente" placeholder="Bairro">
            </div>
        </div><!--form-->
        <div class="form-group">
            <label for="cep" class="col-sm-2 control-label">CEP</label>
            <div class="col-sm-3">
                <input type="text" name="cep" data-mask="00000-000" class="form-control" id="ipt_cepCliente" placeholder="CEP">
            </div>
        </div><!--form-->
        <div class="form-group">
            <label for="telefone1" class="col-sm-2 control-label">Telefones</label>
            <div class="col-sm-4">
                <input type="tel" name="telefone" data-mask="(00)0000-0000" class="form-control" id="ipt_telefoneCliente" placeholder="Telefone 1">
            </div>
            <div class="col-sm-4">
                <input type="tel" name="telefoneB" data-mask="(00)0000-0000" class="form-control" id="ipt_telefoneBCliente" placeholder="Telefone 2">
            </div>
        </div><!--form-->
        <div class="form-group">
            <div class="col-sm-12 col-sm-offset-4">
                <div class="comandosCadastro">
                    <button type="submit" id="btn_cadastro" class="btn btn-success">Cadastrar Cliente</button>
                </div>
            </div>
        </div> <!--form-->
    </form> <!-- FORMULÁRIO CADASTRAR CLIENTE -->
