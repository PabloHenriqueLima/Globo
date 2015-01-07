<?php
//Jesus é Rei

require_once('MYPDF.php');
$pdf = new MYPDF();

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// -------------------------------------------------------------------

if(!isset($_GET['ordem']) OR empty($_GET['ordem'])) die('Serviço não fornecido');
$ordem = $_GET['ordem'];

$pdf->AddPage();
$pdf->writeHTML('<br/><br/><hr />');
$pdf->writeHTML("<h4>ORDEM DE SERVIÇO n°: $ordem  </h4>");;

$pdf->Output();