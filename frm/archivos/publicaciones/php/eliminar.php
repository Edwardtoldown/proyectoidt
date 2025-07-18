<?php

require_once ('../../../../php/conexion.php');
$id = $_POST ['id'];
$ruta = "../../../../imagenes_publicaciones/";
$sql = "select imagen from publicaciones where id=" . $id;
$ret2 = $mysqli->query($sql);
$row = $ret2->fetch_array(MYSQLI_ASSOC);
$nombre_viejo = $row["imagen"];
$sql = "delete from publicaciones where id=" . $id;
$ret = $mysqli->query($sql);
$res = "Registro No eliminado";
if ($ret == 1) {
    unlink($ruta . $nombre_viejo);
    $res = "Registro eliminado";
}
echo ($res);
