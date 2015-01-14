<?php
require 'tcpdf.php';

class MyHeader extends TCPDF {
//Page header
public function Header() {
    // Logo
    $image_file = K_PATH_IMAGES.'img/globo-logo-pdf.png';
    $this->Image($image_file, 10, 6,22, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    // Set font
    $this->SetFont('helvetica', 'B', 20);
    // Title
    $this->Cell(0,13,'GLOBO INFORMÁTICA',0, 2, 'C', 0, '', 0, false, 'M', 'M');
    $this->SetFont('courier', 'B', 13);
    $this->Cell(0,9,'CNPJ: 07.150.424/0001-81',0,2, 'C', 0, '', 0, false, 'M', 'M');
    $this->Cell(0,9,'www.globo-informatica.com',0,2, 'C', 0, '', 0, false, 'M', 'M');
    $this->Cell(0,9,'globoinformaticadirceu@gmail.com',0,2, 'C', 0, '', 0, false, 'M', 'M');
    $this->Cell(0,9,'Quadra 163, Casa 18, Dirceu II, CEP: 64078-040',0, 2, 'C', 0, '', 0, false, 'M', 'M');
    $this->Cell(0,11,'Contatos: (86) 3231-8186 / (86) 8859-7086',0,2, 'C', 0, '', 0, false, 'M', 'M');
    $this->Cell(0,9,'Loja especializada em manutenção de computadores, monitores',0,2, 'C', 0, '', 0, false, 'M', 'M');
    $this->Cell(0,9,'impressoras, notebooks, fontes, estabilizadores, etc.',0,2, 'C', 0, '', 0, false, 'M', 'M');


    }
    public function Footer(){

    }

}
