<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(APPPATH . '/third_party/fpdf.php');
class PDF extends FPDF
{
// function Footer()
// {
//     // Go to 1.5 cm from bottom
//     $this->SetY(-15);
//     // Select Arial italic 8
//     $this->SetFont('Arial','I',8);
//     // Print current and total page numbers
//     $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
// }
}
?>
