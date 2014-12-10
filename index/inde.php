<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=no-js> <!--<![endif]-->
<head>
    <meta charset=utf-8>
    <meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
    <title>Globo Informática System</title>
    <meta name=description content="Globo Sys">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link rel=stylesheet href="../css/bootstrap.min.css">
    <link rel=stylesheet href="../css/main.css"/>
    <link rel="shortcut icon" href=favicon.ico type="image/x-icon"/>
    <script>var cjsscript=document.createElement('script');cjsscript.src="js/plugins/control.min.js";var cjssib=document.getElementsByTagName('script')[0];cjssib.parentNode.insertBefore(cjsscript,cjssib);</script>
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">Você está usando um navegador <strong> desatualizado</strong>
    Por favor <a href="http://browsehappy.com/">Atualize seu navegador</a> para melhorar sua experiência.</p>
<![endif]-->
<header class=centro id=menu>
    <ul class="nav nav-tabs" role=tablist id=myTab>
        <li role=presentation><a href="#clientes" role=tab data-toggle=tab>Clientes</a></li>
        <li role=presentation class=active><a href="#acompanhamento" role=tab data-toggle=tab>Acompanhamento</a></li>
        <li role=presentation><a href="#garantia" role=tab data-toggle=tab>Garantia</a></li>
        <li role=presentation><a href="#produtos" role=tab data-toggle=tab>Produtos</a></li>
        <li role=presentation><a href="#vendas" role=tab data-toggle=tab>Vendas</a></li>
        <li role=presentation><a href="#estat" role=tab data-toggle=tab>Estatísticas</a></li>
    </ul>
</header>
<div class=centro>
<div class=tab-content>
<div role=tabpanel class="tab-pane fade" id=clientes>
    <div class=content-home>
        <div class=btn-grupo>
            <button type=button class="btn btn-primary reload" href="#tabCadCli" data-toggle=tab>Cadastrar Cliente</button>
            <button type=button class="btn btn-primary" href="#tabGerCli" data-toggle=tab>Gerenciar Clientes</button>
        </div>
        <div class=tab-content>
            <div role=tabpanel class=tab-pane id=tabCadCli>
                <h4 class=text-center>Cadastrar novo cliente</h4>
                <form class=form-horizontal method=post id=formcadastro>
                    <div class=form-group>
                        <label for=nome class="col-sm-2 control-label">Nome</label>
                        <div class=col-sm-8>
                            <input name=nome class=form-control id=nome placeholder=Nome>
                        </div>
                    </div>
                    <div class=form-group>
                        <label for=cpf class="col-sm-2 control-label">CPF</label>
                        <div class=col-sm-4>
                            <input name=cpf class=form-control data-mask=999.999.999-99 id=cpf placeholder=CPF>
                        </div>
                    </div>
                    <div class=form-group>
                        <label for=endereco class="col-sm-2 control-label">Endereço</label>
                        <div class=col-sm-10>
                            <input name=endereco class=form-control id=endereco placeholder="Endereço">
                        </div>
                    </div>
                    <div class=form-group>
                        <label for=bairro class="col-sm-2 control-label">Bairro</label>
                        <div class=col-sm-4>
                            <input name=bairro class=form-control id=bairro placeholder=Bairro>
                        </div>
                    </div>
                    <div class=form-group>
                        <label for=cep class="col-sm-2 control-label">CEP</label>
                        <div class=col-sm-3>
                            <input name=cep class=form-control data-mask=99999-999 id=cep placeholder=CEP>
                        </div>
                    </div>
                    <div class=form-group>
                        <label for=telefone1 class="col-sm-2 control-label">Telefones</label>
                        <div class=col-sm-3>
                            <input type=tel name=tele1 class=form-control data-mask="(99)9999-9999" id=tele1 placeholder="Telefone 1">
                        </div>
                        <div class=col-sm-3>
                            <input type=tel name=tele2 class=form-control data-mask="(99)9999-9999" id=tele2 placeholder="Telefone 2">
                        </div>
                    </div><br>
                    <div class=form-group>
                        <div class="col-sm-offset-2 col-sm-3">
                            <div class=cadcomandos>
                                <button type=reset class="btn btn-success">Limpar</button>
                            </div>
                        </div>
                        <div class=col-sm-6>
                            <div class=cadcomandos>
                                <input type=hidden id=action name=action class=form-control value=registrar>
                                <input type=hidden id=idCliente name=idCliente class=form-control value="">
                                <button type=submit id=cadastrobtn class="btn btn-success">Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div role=tabpanel class=tab-pane id=tabGerCli>
                <h4 class=text-center>Gerenciamento de Clientes</h4>
                <div class=input-group>
                    <span class=input-group-addon>Buscar pelo NOME -></span>
                    <input id=buscarCliente name=gerbusca class=form-control autofocus placeholder="Por favor comece a digitar o NOME do cliente...">
                </div>
                <div id=resultado>
                    <table class=table>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div role=tabpanel class="tab-pane active" id=acompanhamento>
    <div class=content-home>
        <div class=btn-grupo>
            <button type=button class="btn btn-primary" href="#entrada" data-toggle=tab>Entrada de Serviço</button>
            <button type=button class="btn btn-primary" href="#saida" data-toggle=tab>Saída de Serviço</button>
            <button type=button class="btn btn-primary" href="#verservico" data-toggle=tab>Gerenciar Serviços</button>
        </div>
        <div class=tab-content>
            <div role=tabpanel class="tab-pane active" id=entrada>
                <h4 class=text-center>Buscar Cliente</h4>
                <form class=form-horizontal method=post id=formentrada>
                    <div class=form-group>
                        <div class=col-sm-10>
                            <div class=input-group>
                                <span class=input-group-addon>Buscar pelo NOME -></span>
                                <input id=buscarClienteEnt name=gerbusca class=form-control autofocus placeholder="Por favor comece a digitar o NOME do cliente...">
                            </div>
                        </div>
                    </div>
                    <div class=form-group>
                        <label for=nome class="col-sm-3 control-label">Cliente Selecionado</label>
                        <div class=col-sm-7>
                            <input name=nomeCliente class=form-control disabled id=nomeCliente>
                        </div>
                    </div>
                    <div class=form-group>
                        <label for=nome class="col-sm-3 control-label">CPF do Cliente</label>
                        <div class=col-sm-3>
                            <input name=cpfCliente class=form-control disabled id=cpfCliente>
                        </div>
                    </div>
                    <div class=form-group>
                        <label for=nome class="col-sm-2 control-label">Produto</label>
                        <div class=col-sm-8>
                            <input name=nomeProduto class=form-control id=nomeProduto placeholder=Produto>
                        </div>
                    </div>
                    <div class=form-group>
                        <label for=nome class="col-sm-4 control-label">Data de entrada</label>
                        <div class=col-sm-3>
                            <input name=dataEntrada class=form-control id=dataEntrada data-mask="99/99/9999" placeholder="Data de Entrada">
                        </div>
                    </div>
                    <textarea class=form-control name=descDefeito id=descDefeito rows=3 placeholder="Descrição do Defeito"></textarea>
                    <div class=checkbox-inline>
                        <label><input type=checkbox name=carregador value=x>Com carregador</label>
                    </div>
                    <div class=checkbox-inline>
                        <label><input type=checkbox name=cabodados value=x>Com cabo de dados</label>
                    </div>
                    <div class=checkbox-inline>
                        <label><input type=checkbox name=comcartucho id=comcartucho value=x> Com Cartuchos</label>
                        <div id=cartucho>
                            <input name=colorido class=form-control id=colorido placeholder=Colorido>
                            <input name=pretobranco class=form-control id=pretobranco placeholder=Preto>
                        </div>
                    </div>
                    <div class=form-group>
                        <div class="col-sm-offset-2 col-sm-3">
                            <div class=entcomandos>
                                <button type=reset class="btn btn-success">Limpar</button>
                            </div>
                        </div>
                        <div class=col-sm-6>
                            <div class=cadcomandos>
                                <input type=hidden id=actionEntrada name=action class=form-control value=entrada>
                                <input type=hidden id=idClienteEntrada name=idClienteEntrada class=form-control value="">
                                <button type=submit id=cadastroEntrada class="btn btn-success">Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div role=tabpanel class=tab-pane id=saida>
                <h4 class=text-center>Baixa no serviço</h4>
                <form class=form-horizontal method=post id=formsaida>
                    <div class=form-group>
                        <div class=col-sm-6>
                            <div class=input-group>
                                <span class=input-group-addon>Código de serviço-></span>
                                <input id=codigoservico name=codigoservico class=form-control maxlength=10 placeholder="Código do serviço">
                            </div>
                        </div>
                    </div>
                    <div class=form-group>
                        <label for=nome class="col-sm-3 control-label">Produto do serviço</label>
                        <div class=col-sm-7>
                            <input name=nomeProdutoBaixa class=form-control disabled id=nomeProdutoBaixa>
                        </div>
                    </div>
                    <div class=form-group>
                        <label for=nome class="col-sm-3 control-label">Nome do Cliente</label>
                        <div class=col-sm-7>
                            <input name=nomeClienteServico class=form-control id=nomeClienteServico disabled>
                        </div>
                    </div>
                    <div class=form-group>
                        <label for=nome class="col-sm-4 control-label">Valor do serviço</label>
                        <div class=col-sm-3>
                            <input name=valorServico class=form-control id=valorServico placeholder=Valor>
                        </div>
                    </div>
                    <div class=form-group>
                        <label for=nome class="col-sm-4 control-label">Data da baixa</label>
                        <div class=col-sm-3>
                            <input name=dataSaida class=form-control id=dataSaida data-mask="99/99/9999" placeholder="Data da baixa">
                        </div>
                    </div>
                    <textarea class=form-control name=descServico id=descServico rows=3 placeholder="Descrição do serviço realizado"></textarea>
                    <div class=checkbox-inline>
                        <label><input type=checkbox id=gerargarantia name=gerargarantia value=x>Gerar garantia para o serviço</label>
                        <div class=form-group id=gerarGarantiaBox>
                            <label for=nome class="col-sm-4 control-label">Garantia</label>
                            <div class=col-sm-4>
                                <input name=garantia class=form-control id=garantia placeholder=dias>
                            </div>
                        </div>
                    </div>
                    <div class=form-group>
                        <div class="col-sm-offset-2 col-sm-3">
                            <div class="entcomandos inline">
                                <button type=reset class="btn btn-success">Limpar</button>
                            </div>
                        </div>
                        <div class=col-sm-6>
                            <button type=submit id=SalvarSaida class="btn btn-success">Baixar serviço</button>
                        </div>
                    </div>
                </form>
            </div>
            <div role=tabpanel class=tab-pane id=verservico>Ver serviço</div>
        </div>
    </div>
</div>
<div role=tabpanel class="tab-pane fade" id=garantia>
    <div class=content-home>
        <div class=btn-grupo>
            <button type=button class="btn btn-primary" href="#vergarantia" data-toggle=tab>Gerar Garantia</button>
        </div>
        <div class=tab-content>
            <div role=tabpanel class=tab-pane id=vergarantia>Garantia</div>
        </div>
    </div>
</div>
<div role=tabpanel class="tab-pane fade" id=produtos>
    <div class=content-home>
        <div class=btn-grupo>
            <button type=button class="btn btn-primary" href="#cadestoque" data-toggle=tab>Cadastrar Estoque</button>
            <button type=button class="btn btn-primary" href="#gerenprodutos" data-toggle=tab>Gerenciar Produtos</button>
            <button type=button class="btn btn-primary" href="#vizuprodutos" data-toggle=tab>Visualizar Produtos</button>
        </div>
        <div class=tab-content>
            <div role=tabpanel class=tab-pane id=cadestoque>
            </div>
            <div role=tabpanel class=tab-pane id=gerenprodutos>Geranciar Produtos</div>
            <div role=tabpanel class=tab-pane id=vizuprodutos>Vizualizar Produtos </div>
        </div>
    </div>
</div>
<div role=tabpanel class="tab-pane fade" id=estat>
    <div class=content-home>
        <div class=btn-grupo>
            <button type=button class="btn btn-primary" href="#gerais" data-toggle=tab>Gerais</button>
            <button type=button class="btn btn-primary" href="#produvendidos" data-toggle=tab>Produtos Vendidos</button>
            <button type=button class="btn btn-primary" href="#garantiasgeradas" data-toggle=tab>Garantias Geradas</button>
        </div>
        <div class=tab-content>
            <div role=tabpanel class=tab-pane id=gerais>Gerais</div>
            <div role=tabpanel class=tab-pane id=produvendidos>Produtos Vendidos</div>
            <div role=tabpanel class=tab-pane id=garantiasgeradas>Garantias Geradas</div>
        </div>
    </div>
</div>
</div>
</div>
<script src="../js/core/jquery-2.1.1.min.js"></script>
<script src="../js/core/bootstrap.min.js"></script>
<script type="text/cjs" data-cjssrc="js/plugins/pluginsAll.min.js"></script>
<script type="text/cjs" data-cjssrc="js/plugins/storeapi.js"></script>
<script type="text/cjs" data-cjssrc="js/plugins/cookie.js"></script>
<script type="text/cjs" data-cjssrc="js/main.js"></script>
</body>
</html>