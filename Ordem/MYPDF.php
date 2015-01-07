<?php
require 'tcpdf.php';

class MYPDF extends TCPDF {
//Page header
public function Header() {
    // Logo
    $image_file = K_PATH_IMAGES.'img/globo-logo-pdf.png';
    $this->Image($image_file, 10, 5,20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    // Set font
    $this->SetFont('helvetica', 'B', 20);
    // Title
    $this->Cell(0,13,'GLOBO INFORMÁTICA',0, 2, 'C', 0, '', 0, false, 'M', 'M');
    $this->SetFont('courier', 'B', 13);
    $this->Cell(0,'','Quadra 163, Casa 18, Dirceu II, CEP: 64078-040',0, false, 'C', 0, '', 0, false, 'M', 'M');

    }

}
