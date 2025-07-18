<?php

require_once ('../../../php/conexion.php');
require_once ('../ezpdf/src/Cezpdf.php');
date_default_timezone_set('America/Asuncion');
$pdf = new Cezpdf($paper = 'LETTER', $orientation = "portrait"); //landscape
$pdf->selectFont('../fontsez/Courier.afm');
$pdf->ezSetCmMargins(1, 1, 1.5, 1.5);
$desdeid = $_GET ['d'];
$hastaid = $_GET ['h'];
$queEmp = "SELECT nombre, precio FROM productos WHERE
    codigo>=" . $desdeid . " AND codigo<=" . $hastaid;
$resEmp = $mysqli->query($queEmp);
while ($row = $resEmp->fetch_array(MYSQLI_ASSOC)) {
    $data[] = array_merge($row);
}
$titles = array(
    'nombre' => 'Nombre de Producto',
    'precio' => 'Precio de Producto'
);
$options = array(
    'shadeCol' => array(0.9, 0.9, 0.9),
    'xOrientation' => 'center',
    'width' => 500
);
$txttit = "IDT \n";
$txttit .= "Ejemplo de PDF con PHP y MYSQL \n";
$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, "", $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("Fecha: " . date("d/m/Y"), 10, array('justification' => 'right'));
$pdf->ezText("Hora: " . date("H:i:s"), 10, array('justification' => 'right'));
$pdf->ezStream();
//para guardar el pdf generado
$output = $pdf->ezOutput(); //Salida de archivo
file_put_contents('mipdf.pdf', $output); //guardar en el server