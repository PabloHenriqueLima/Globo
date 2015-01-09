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
$query = "select equipamento from entrada WHERE codigoServico = ?";
if(!$sql = $mysqli->prepare($query)) die($mysqli->error);
$sql->bind_param('s',$ordem);
if(!$sql->execute()) die($mysqli->error);
$sql->store_result();
$sql->bind_result($equipamento);
$sql->fetch();

//---------------------------------------------------------------------
//add page
$pdf->AddPage();
//html content
$pdf->Ln(10);

//writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=false, $reseth=true, $align='', $autopadding=true)

// Print some HTML Cells
$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'R', true);

$pdf->Output();





















