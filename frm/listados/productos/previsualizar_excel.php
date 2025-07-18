<?php
require_once ('../../../php/conexion.php');
$desdeid = $_GET ['d'];
$hastaid = $_GET ['h'];
$previsualizar = $_GET['pre'];
if ($previsualizar == "no") {
    date_default_timezone_set('America/Asuncion');
    $nombre = "excel" . date("d_m_Y_") . date("H_i") . ".xls";
    header('Content-Type: application/vdn.ms-excel');
    header('Content-Disposition: attachment;filename=' . $nombre . ';');
    /* Recuerda cambiar tu extension a la que estas tomando xls, txt, etc */
}
$consulta = "SELECT * FROM productos WHERE codigo >= " . $desdeid . " AND codigo <=" . $hastaid;
$resEmp = $mysqli->query($consulta);
?>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>IDT</h1>
        <h2>Ejemplo de Excel con PHP Y MYSQL</h2>
        <table border="1">
            <tr><td>Codigo</td><td>Nombre</td></tr>
            <?php
            while ($row = $resEmp->fetch_array(MYSQLI_ASSOC)) {
                ?>
                <tr>
                    <td> 
                        <?php
                        echo $row["codigo"];
                        ?>
                    </td>
                    <td> 
                        <?php
                        echo $row["nombre"];
                        ?>
                    </td>
                    <?php
                    if ($previsualizar == "si") {
                        echo "<td><img src='../../../imagenes_productos/{$row["imagen"]}'width='50'></td>";
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>