<?php
require_once('../../../../php/conexion.php');
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$ruta = "../../../../imagenes_productos/";
$uploadfile_temporal = $_FILES['imagen']['tmp_name'];
$uploadfile_nombre = uniqid().$_FILES['imagen']['name'];
$sql = "select imagen from productos where codigo=" . $codigo;
$ret = $mysqli->query($sql);
$row = $ret->fetch_array(MYSQLI_ASSOC);
$nombre_viejo = $row["imagen"];
if ($uploadfile_temporal == "") {
    $sql = "update productos set nombre='$nombre',
descripcion='$descripcion',
precio='$precio' where codigo='$codigo'";
} else {
    $sql = "update productos set nombre='$nombre',
descripcion='$descripcion',
precio='$precio',
imagen='$uploadfile_nombre' where codigo='$codigo'";
}
$ret = $mysqli->query($sql);
$res = "Registro No modificado";
if ($ret == 1) {
    $res = "Registro Modificado Correctamente";
    if ($uploadfile_temporal != "") {
        unlink($ruta . $nombre_viejo);
    }
    if (is_uploaded_file($uploadfile_temporal)) {
        move_uploaded_file($uploadfile_temporal, $ruta . $uploadfile_nombre);
    }
}
echo($res);