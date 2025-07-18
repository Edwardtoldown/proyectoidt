<?php

require_once ('../../../../php/conexion.php');
$codigo = $_POST ['codigo'];
$ruta = "../../../../imagenes_productos/";
$sql = "select imagen from productos where codigo=" . $codigo;
$ret2 = $mysqli->query($sql);
$row = $ret2->fetch_array(MYSQLI_ASSOC);
$nombre_viejo = $row["imagen"];
$sql = "delete from productos where codigo=" . $codigo;
$ret = $mysqli->query($sql);
$res = "Registro No eliminado";
if ($ret == 1) {
    unlink($ruta . $nombre_viejo);
    $res = "Registro eliminado";
}
echo ($res);
