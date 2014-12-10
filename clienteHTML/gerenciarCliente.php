<!-- Jesus Cristo - O Senhor e Salvador da Terra. -->

<h4 class="text-center">Gerenciamento de Clientes</h4>
    <div class="input-group">
        <span class="input-group-addon">Buscar pelo NOME -></span>
        <input type="text" id="buscarCliente" name="buscarCliente" class="form-control" placeholder="Digite o nome do cliente..">
    </div><!-- BUSCA PELO NOME -->

    <div class="comandosClientes">
        <table class="table" id="tbl_resultado">
            <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Comandos</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

<div id="div_editarCliente">
<form class="form-horizontal" method="post" id="frm_editarCliente"><!-- EDITAR CLIENTE -->
    <div class="form-group">
        <label for="nome" class="col-sm-2 control-label">Nome</label>
        <div class="col-sm-8">
            <input type="text" name="nome" maxlength="60" class="form-control" id="ipt_nomeClienteB" placeholder="Nome">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="cpf" class="col-sm-2 control-label">CPF</label>
        <div class="col-sm-4">
            <input type="text" name="cpf" data-mask="000.000.000-00" class="form-control" id="ipt_cpfClienteB" placeholder="CPF">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="endereco" class="col-sm-2 control-label">Endereço</label>
        <div class="col-sm-10">
            <input type="text" name="endereco" maxlength="60" class="form-control"  id="ipt_enderecoClienteB" placeholder="Endereço">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="bairro" class="col-sm-2 control-label">Bairro</label>
        <div class="col-sm-4">
            <input type="text" name="bairro" maxlength="20" class="form-control" id="ipt_bairroClienteB" placeholder="Bairro">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="cep" class="col-sm-2 control-label">CEP</label>
        <div class="col-sm-3">
            <input type="text" name="cep" data-mask="00000-000" class="form-control" id="ipt_cepClienteB" placeholder="CEP">
        </div>
    </div><!--form-->
    <div class="form-group">
        <label for="telefone1" class="col-sm-2 control-label">Telefones</label>
        <div class="col-sm-4">
            <input type="tel" name="telefone" data-mask="(00)0000-0000" class="form-control" id="ipt_telefoneClienteB" placeholder="Telefone 1">
        </div>
        <div class="col-sm-4">
            <input type="tel" name="telefoneB" data-mask="(00)0000-0000" class="form-control" id="ipt_telefoneBClienteB" placeholder="Telefone 2">
        </div>
    </div><!--form--><br>
    <div class="form-group">
        <div class="col-sm-12 col-sm-offset-4">
            <div class="comandosCadastro">
                <button type="submit" id="btn_cadastroB" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </div> <!--form-->
</form> <!-- FORMULÁRIO CADASTRAR CLIENTE -->
</div>
