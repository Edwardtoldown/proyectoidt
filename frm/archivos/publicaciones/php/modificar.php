<?php
require_once('../../../../php/conexion.php');
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$ruta = "../../../../imagenes_publicaciones/";
$uploadfile_temporal = $_FILES['imagen']['tmp_name'];
$uploadfile_nombre = uniqid().$_FILES['imagen']['name'];
$sql = "select imagen from publicaciones where id=" . $id;
$ret = $mysqli->query($sql);
$row = $ret->fetch_array(MYSQLI_ASSOC);
$nombre_viejo = $row["imagen"];
if ($uploadfile_temporal == "") {
    $sql = "update publicaciones set titulo='$titulo',
contenido='$contenido' where id='$id'";
} else {
    $sql = "update publicaciones set titulo='$titulo',
contenido='$contenido',
imagen='$uploadfile_nombre' where id='$id'";
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