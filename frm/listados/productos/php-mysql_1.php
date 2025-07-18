<?php
require_once ('../../../php/conexion.php');
require_once ('../ezpdf/src/Cezpdf.php');
date_default_timezone_set('America/Asuncion');
$pdf = new Cezpdf($paper = 'LETTER', $orientacion = "portrait");
$pdf->selectFont('../fontsez/Courier.afm');
$pdf->ezSetCmMargins(1, 1, 1.5, 1.5); //arriba, abajo, izquierda, derecha
$desdeid = $_GET['d'];
$hastaid = $_GET['h'];
$queEmp = "SELECT codigo, nombre, imagen FROM productos WHERE codigo>=" . $desdeid . " AND codigo<=" . $hastaid;
$resEmp = $mysqli->query($queEmp);
$txttit = "IDT\n";
$txttit .= "Ejemplo de PDF con PHP y MYSQL \n";
$pdf->ezText($txttit, 12);
while ($row = $resEmp->fetch_array(MYSQLI_ASSOC)) {
    $pdf->ezText("Codigo: ".$row["codigo"], 10);
    $pdf->ezText("Nombre: ".$row["nombre"], 10);
    //ezImage (ubicacionimagen,relleno,tamaño,[resize],[justification])
    $pdf->ezImage("../../../imagenes_productos/{$row["imagen"]}", 10, 50, 'none', 'left');
}
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("Fecha: " . date("d/m/Y"), 10, array('justification' => 'right'));
$pdf->ezText("Hora: " . date("H:i:s"), 10, array('justification' => 'right'));
$pdf->ezStream(); //para guardar el pdf generado
$output = $pdf->ezOutput(); //salida del archibo
file_put_contents('mipdf.pdf', $output); //guardar en el server
