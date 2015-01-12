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
$query = "select cli.id,cli.nomeCliente,cli.cpfCliente,cli.endCliente,cli.bairroCliente,cli.cepCliente, cli.telefoneCliente,ent.equipamento,ent.marcaModelo,ent.serie,ent.placaMae,ent.memoria,ent.hdSsd,ent.fonte,ent.placaVideo,ent.leitorDvd,ent.card,ent.outros,ent.dataEntrada,ent.descDefeito,ent.carregador,ent.caboDados,ent.cartucho
from entrada ent INNER JOIN clientes cli ON ent.idCliente = cli.id WHERE codigoServico = ?";

if(!$sql = $mysqli->prepare($query)) die($mysqli->error);
$sql->bind_param('s',$ordem);
if(!$sql->execute()) die($mysqli->error);
$sql->store_result();
$sql->bind_result($id,$nomeCliente,$cpfCliente,$endereco,$bairro,$cep,$telefoneCliente,$equipamento,$marcaModelo,$serie,$placaMae,$memoria,$hdSSd,$fonte,$placaVideo,$leitorDvd,$card,$outros,$dataEntrada,$descDefeito,$carregador,$caboDados,$cartucho);
$sql->fetch();


//---------------------------------------------------------------------
//add page
$pdf->AddPage();
//html content
$pdf->Ln(10);

//writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=false, $reseth=true, $align='', $autopadding=true)

// Print some HTML Cells


$html = '<span style="font-weight: bold; font-size: x-large">ORDEM DE SERVIÇO N°: </span>'.'<span style="font-size: x-large">'. $ordem . '</span>';

$pdf->writeHTMLCell(0, 0, '55', '', $html, '', 1, 0, true, 'L', true);
$pdf->ln(8);
$html = '<span style="font-weight: bold">DADOS DO CLIENTE</span>';
$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'C', true);

//$html = '------------------------------------------------------------------------------------------------------------------------------';
$html = '<br/><span style="font-weight: bold">Nome: </span>'. $nomeCliente;
$html .= '<br/><span style="font-weight: bold">Cpf: </span>'. $cpfCliente;
$html .= '<br/><span style="font-weight: bold">Endereço: </span>'. $endereco;
$html .= ' <span style="font-weight: bold">Bairro: </span>'. $bairro;
$html .= '<br/><span style="font-weight: bold">Telefone: </span>'. $telefoneCliente;
$html .= '<br/><span style="font-weight: bold">Cep: </span>'. $cep;

$pdf->writeHTMLCell(0, 22, '', '', $html, 'LRTB', 1, 0, true, 'L', true);

//------------------------------------------------------------------------------------------
$pdf->ln(4);
$html = '<span style="font-weight: bold">DESCRIÇÃO DO EQUIPAMENTO</span>';
$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'C', true);
//----- Explodindo as variaveis ------- //
$var = explode('-',$memoria);
list($memoriaMarca,$memoriaGb,$memoriaSn) = $var;

$var = explode('-',$hdSSd);
list($hdMarca,$hdGb,$hdSn) = $var;

$var = explode('-',$fonte);
list($fonteMarca,$fonteGb,$fonteSn) = $var;

$var = explode('-',$placaVideo);
list($placaVideoMarca,$placaVideoGb,$placaVideoSn) = $var;

$var = explode('-',$leitorDvd);
list($leitorMarca,$leitorDvdSn) = $var;

$var = explode('-',$card);
list($cardMarca,$cardSn) = $var;

$var = explode('/',$cartucho);
list($cartuchoA,$cartuchoB) = $var;
$var = explode('-',$cartuchoA);
list($cartuchoMarcaA,$cartuchoCorA,$cartuchoSnA) = $var;
$var = explode('-',$cartuchoB);
list($cartuchoMarcaB,$cartuchoCorB,$cartuchoSnB) = $var;





//$html = '------------------------------------------------------------------------------------------------------------------------------';
$html = '<br/><span style="font-weight: bold">Nome: </span>'. $equipamento;
if(!empty($marcaModelo)) $html .= ' '.$marcaModelo.' ';
if(!empty($serie)) $html .= '<span style="font-weight: bold">Série: </span>'. $serie;
//----------------------------------------------
if(!empty($memoriaMarca)) $html .= '<br/><span style="font-weight: bold">Memória: </span>'. $hdMarca ;


if(!empty($hdSSd)) $html .= '<br/><span style="font-weight: bold">Hd / Ssd: </span>'. $hdSSd;
if(!empty($fonte)) $html .= ' <br/><span style="font-weight: bold">Fonte: </span>'. $fonte;
if(!empty($placaVideo)) $html .= '<br/><span style="font-weight: bold">Placa de Vídeo: </span>'. $placaVideo;
if(!empty($leitorDvd)) $html .= ' <br/><span style="font-weight: bold">Leitor de DVD: </span>'. $leitorDvd;
if(!empty($card)) $html .= ' <br/><span style="font-weight: bold">Leitor de Cartão: </span>'. $card;
if(!empty($outros)) $html .= ' <br/><span style="font-weight: bold">Outros: </span>'. $outros;
if(!empty($descDefeito)) $html .= ' <br/><span style="font-weight: bold">Informações Preliminares: </span>'. $descDefeito;
if(!empty($carregador)) $html .= ' <br/><span style="font-weight: bold">C/ Carregador : </span>'. $carregador;
if(!empty($caboDados)) $html .= ' <br/><span style="font-weight: bold">Cartucho(s) : </span>'. $caboDados;


$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'L', true);
//-----------------------------------------------------------------------

$quebrarInicio = explode(" ",$dataEntrada);
list($data,$horario) = $quebrarInicio;
$quebrarData = explode("-",$data);
list($ano,$mes,$dia) = $quebrarData;
$dataI = date('d-m-Y',mktime(0,0,0,$mes,$dia,$ano));
$dataF = date('d-m-Y',mktime(0,0,0,$mes,$dia + 2,$ano));

$dataEntrada = $dataI.' '.$horario;
$dataSaida = $dataF.' '.$horario;


$html = ' <br/><span style="font-weight: bold">ENTRADA: </span>'. $dataEntrada;
$html .= ' - <span style="font-weight: bold">ORÇAMENTO EM ATÉ 72 Hhs </span>';
$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'C', true);
//-------------------------------------------------------------------------------------
$html = '------------------------------------------------------------------------------------------------------------------------------';
$html .= ' <br/><span style="font-weight: bold">OBS*: </span>'. 'Cabe ao cliente acima citado, retirar o seu equipamento em um prazo
de até 60(sessenta) dias, após esse prazo será cobrado taxa de depósito.';


$pdf->writeHTMLCell(0,25, '', '', $html, 0, 1, 0, true, 'L', true);

//---------------------------------------------------------
$html = '_____________________________________ <br />Assinatura do Cliente';

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'L', true);

$html = '______________________________________<br /> Assinatura do Técnico Responsável';

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'R', true);



$pdf->Output();





















