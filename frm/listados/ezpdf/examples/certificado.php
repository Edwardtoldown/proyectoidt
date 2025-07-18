<?php 
set_include_path('../src/'.PATH_SEPARATOR.get_include_path());
date_default_timezone_set('UTC');

include 'Cezpdf.php';

class Creport extends Cezpdf
{
    public function __construct($p, $o)
    {
        parent::__construct($p, $o, 'none', []);
    }
}
$pdf = new Creport('a4', 'landscape');
$pdf->ezSetMargins(0, 0, 0, 0);
$pdf->ezSetY(596);
//$pdf->openHere('Fit');
$pdf->ezImage('images/Certificadobajaresolucion.png', 0, 842, 'none', 'left');
$pdf->selectFont('BRUSHSCI');
$pdf->addText(160,350, 30, "Carlos Pantaleón Pastoriza Gómez");
$pdf->ezSetY(260);
//     $pdf->ezImage('diploma/border.jpg', 0, 547.4, 'none', 'left');
$pdf->ezImage('images/20-06-2020-12-40-40.png', 40, 80, 'none', 'right');
$pdf->selectFont('Courier');
$pdf->addText(100,150, 12, "19 de junio, 2020");
$pdf->addText(310,150,7, "https://tecpropy.com/cer/cert.php?i=1000&c=p");
$pdf->ezStream();
?>
