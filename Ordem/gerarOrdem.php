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
$sql->bind_result($id,$nomeCliente,$cpfCliente,$endereco,$bairro,$cep,$telefoneCliente,$equipamento,$marcaModelo,$serie,$placaMae,$memoria,$hdSSd,$fonte,$placaVideo,$leitorDvd,$card,$outros,$dataEntrada,$infoPreliminar,$carregador,$caboDados,$cartucho);
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
$var = explode('/',$memoria);
list($memoriaA,$memoriaB) = $var;
$var = explode('+',$memoriaA);
list($memoriaMarcaA,$memoriaGbA,$memoriaSnA) = $var;
$var = explode('+',$memoriaB);
list($memoriaMarcaB,$memoriaGbB,$memoriaSnB) = $var;

$var = explode('+',$hdSSd);
list($hdMarca,$hdGb,$hdSn) = $var;

$var = explode('+',$fonte);
list($fonteMarca,$fonteWatts,$fonteSn) = $var;

$var = explode('+',$placaVideo);
list($placaVideoMarca,$placaVideoGb,$placaVideoSn) = $var;

$var = explode('+',$leitorDvd);
list($leitorMarca,$leitorDvdSn) = $var;

$var = explode('+',$card);
list($cardMarca,$cardSn) = $var;

$var = explode('/',$cartucho);
list($cartuchoA,$cartuchoB) = $var;
$var = explode('+',$cartuchoA);
list($cartuchoMarcaA,$cartuchoCorA,$cartuchoSnA) = $var;
$var = explode('+',$cartuchoB);
list($cartuchoMarcaB,$cartuchoCorB,$cartuchoSnB) = $var;



//$html = '------------------------------------------------------------------------------------------------------------------------------';
$html = '<br/><span style="font-weight: bold"></span>'. $equipamento;
if(!empty($marcaModelo)) $html .= ' '.$marcaModelo.' ';
if(!empty($serie)) $html .= '<span style="font-weight: bold">S/N: </span>'. $serie;
//----------------------------------------------
if(!empty($memoriaMarcaA)) $html .= '<br/><span style="font-weight: bold">Memória(s): </span>'. $memoriaMarcaA;
if(!empty($memoriaGbA)) $html .= ' '.$memoriaGbA;
if(!empty($memoriaSnA)) $html .= '<span style="font-weight: bold"> S/N: </span>'. $memoriaSnA;
//
if(!empty($memoriaMarcaB)) $html .= ' + ';
if(!empty($memoriaMarcaB)) $html .= ' '. $memoriaMarcaB;
if(!empty($memoriaGbB)) $html .= ' '.$memoriaGbB;
if(!empty($memoriaSnB)) $html .= '<span style="font-weight: bold"> S/N: </span>'. $memoriaSnB;
//----------------------------------------------------
if(!empty($hdMarca)) $html .= '<br/><span style="font-weight: bold">HD: </span>'. $hdMarca;
if(!empty($hdGb)) $html .= ' '.$hdGb;
if(!empty($hdSn)) $html .= '<span style="font-weight: bold"> S/N: </span>'. $hdSn;
//----------------------------------------------------
if(!empty($fonteMarca)) $html .= '<br/><span style="font-weight: bold">Fonte: </span>'.$fonteMarca;
if(!empty($fonteWatts)) $html .= ' '.$fonteWatts . ' W';
if(!empty($fonteSn)) $html .= '<span style="font-weight: bold"> S/N: </span>'. $fonteSn;
//----------------------------------------------------
if(!empty($placaVideoMarca)) $html .= '<br/><span style="font-weight: bold">Placa de Vídeo: </span>'.$placaVideoMarca;
if(!empty($placaVideoGb)) $html .= ' '.$placaVideoGb;
if(!empty($placaVideoSn)) $html .= '<span style="font-weight: bold"> S/N: </span>'. $placaVideoSn;
//----------------------------------------------------
if(!empty($leitorMarca)) $html .= '<br/><span style="font-weight: bold">Leitor DVD: </span>'.$leitorMarca;
if(!empty($leitorDvdSn)) $html .= '<span style="font-weight: bold"> S/N: </span>'. $leitorDvdSn;
//----------------------------------------------------
if(!empty($cardMarca)) $html .= '<br/><span style="font-weight: bold">Leitor Cartão: </span>'.$cardMarca;
if(!empty($cardSn)) $html .= '<span style="font-weight: bold"> S/N: </span>'. $cardSn;
//----------------------------------------------------
if(!empty($outros)) $html .= ' <br/><span style="font-weight: bold">Outros: </span>'. $outros;
if(!empty($infoPreliminar)) $html .= ' <br/><span style="font-weight: bold">Informações Preliminares: </span>'. $infoPreliminar;
if(empty($carregador)){

}else{
    $carregador = 'Sim';
    $html .= ' <br/><span style="font-weight: bold">C/ Carregador : </span>'. $carregador;
}


//--------------------
if(!empty($cartuchoMarcaA)) $html .= '<br/><span style="font-weight: bold">Cartucho A: </span>'.$cartuchoMarcaA;
if(!empty($cartuchoCorA)) $html .= ' '.$cartuchoCorA;
if(!empty($cartuchoSnA)) $html .= '<span style="font-weight: bold"> S/N: </span>'. $cartuchoSnA;
//----------------------------------------------------
if(!empty($cartuchoMarcaB)) $html .= '<br/><span style="font-weight: bold">Cartucho B: </span>'.$cartuchoMarcaB;
if(!empty($cartuchoCorB)) $html .= ' '.$cartuchoCorB;
if(!empty($cartuchoSnB)) $html .= '<span style="font-weight: bold"> S/N: </span>'. $cartuchoSnB;
//----------------------------------------------------

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





















