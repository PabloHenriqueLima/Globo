<?php
//Jesus é Rei

require_once('MyHeader.php');
require '../configs/localMysql.php';
$pdf = new MyHeader();
//--------------------------------------------------------------------
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// -------------------------------------------------------------------
if(!isset($_GET['ordem']) OR empty($_GET['ordem'])) die('Serviço não fornecido');
$ordem = $_GET['ordem'];
//------------------------------------------------
$query = "select cli.id,cli.nomeCliente,cli.cpfCliente,cli.endCliente,cli.bairroCliente,cli.cepCliente, cli.telefoneCliente,ent.equipamento,ent.serie,ent.memoria,ent.hdSsd,ent.fonte,ent.placaVideo,ent.leitorDvd,ent.card,ent.outros,ent.dataEntrada,ent.descDefeito,ent.carregador,ent.caboDados,ent.cartucho
from entrada ent INNER JOIN clientes cli ON ent.idCliente = cli.id WHERE codigoServico = ?";

if(!$sql = $mysqli->prepare($query)) die($mysqli->error);
$sql->bind_param('s',$ordem);
if(!$sql->execute()) die($mysqli->error);
$sql->store_result();
$sql->bind_result($id,$nomeCliente,$cpfCliente,$endereco,$bairro,$cep,$telefoneCliente,$equipamento,$serie,$memoria,$hdSSd,$fonte,$placaVideo,$leitorDvd,$card,$outros,$dataEntrada,$descDefeito,$carregador,$caboDados,$cartucho);
$sql->fetch();


//---------------------------------------------------------------------
//add page
$pdf->AddPage();
//html content
$pdf->Ln(10);

//writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=false, $reseth=true, $align='', $autopadding=true)

// Print some HTML Cells


$html = '<span style="font-weight: bold">ORDEM DE SERVIÇO N°: </span>'. $ordem;

$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'L', true);
$pdf->ln(4);
$html = '<span style="font-weight: bold">DADOS DO CLIENTE</span>';
$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'L', true);

$html = '------------------------------------------------------------------------------------------------------------------------------';
$html .= '<br/><span style="font-weight: bold">NOME: </span>'. $nomeCliente;
$html .= '<br/><span style="font-weight: bold">CPF: </span>'. $cpfCliente;
$html .= '<br/><span style="font-weight: bold">TELEFONE: </span>'. $telefoneCliente;
$html .= '<br/><span style="font-weight: bold">ENDEREÇO: </span>'. $endereco;
$html .= ' <span style="font-weight: bold">BAIRRO: </span>'. $bairro;

$pdf->writeHTMLCell(0, 22, '', '', $html, 'LRTB', 1, 0, true, 'L', true);

//------------------------------------------------------------------------------------------
$pdf->ln(4);
$html = '<span style="font-weight: bold">DADOS DO SERVIÇO</span>';
$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'L', true);

$html = '------------------------------------------------------------------------------------------------------------------------------';
$html .= '<br/><span style="font-weight: bold">EQUIPAMENTO: </span>'. $equipamento;
$html .= '<br/><span style="font-weight: bold">SERIE: </span>'. $serie;
$html .= '<br/><span style="font-weight: bold">MEMORIA: </span>'. $memoria;
$html .= '<br/><span style="font-weight: bold">HD / SDD: </span>'. $hdSSd;
$html .= ' <br/><span style="font-weight: bold">FONTE: </span>'. $bairro;
$html .= '<br/><span style="font-weight: bold">PLACA DE VÍDEO: </span>'. $placaVideo;
$html .= ' <br/><span style="font-weight: bold">LEITOR DE DVD: </span>'. $leitorDvd;
$html .= ' <br/><span style="font-weight: bold">LEITOR DE CARTÃO: </span>'. $card;
$html .= ' <br/><span style="font-weight: bold">OUTROS: </span>'. $outros;
$html .= ' <br/><span style="font-weight: bold">DESCRIÇÃO DO DEFEITO: </span>'. $descDefeito;
$html .= ' <br/><span style="font-weight: bold">COM CARREGADOR?: </span>'. $carregador;
$html .= ' <br/><span style="font-weight: bold">COM CARTUCHOS?: </span>'. $caboDados;


$pdf->writeHTMLCell(0, 70, '', '', $html, 'LRTB', 1, 0, true, 'L', true);
//-----------------------------------------------------------------------

$quebrarInicio = explode(" ",$dataEntrada);
list($data,$horario) = $quebrarInicio;
$quebrarData = explode("-",$data);
list($ano,$mes,$dia) = $quebrarData;
$dataI = date('d-m-Y',mktime(0,0,0,$mes,$dia,$ano));
$dataF = date('d-m-Y',mktime(0,0,0,$mes,$dia + 2,$ano));

$dataEntrada = $dataI.' '.$horario;
$dataSaida = $dataF.' '.$horario;


$html = ' <br/><span style="font-weight: bold">DATA DE ENTRADA: </span>'. $dataEntrada;
$html .= ' - <span style="font-weight: bold">PREVISÃO DE SAÍDA: </span>'. $dataSaida;
$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'L', true);
//-------------------------------------------------------------------------------------
$html = '------------------------------------------------------------------------------------------------------------------------------';
$html .= ' <br/><span style="font-weight: bold">OBS*: </span>'. 'Cabe ao cliente acima cumprir um prazo de 60(sessenta) dias para retiradado seu
equipamento do estabelecimento, após esse prazo será cobrado taxa diária.';


$pdf->writeHTMLCell(0,20, '', '', $html, 0, 1, 0, true, 'L', true);

//---------------------------------------------------------
$html = '__________________________________________ <br /> Assinatura do Cliente';

$pdf->writeHTMLCell(0, 20, '', '', $html, 0, 1, 0, true, 'C', true);

$html = '__________________________________________ <br /> Assinatura do Técnico Responsável';

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'C', true);



$pdf->Output();





















