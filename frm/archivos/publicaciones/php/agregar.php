<?php
require_once ('../../../../php/conexion.php');
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$ruta = "../../../../imagenes_publicaciones/";//ruta de carpeta donde copiaremos las imagenes
$uploadfile_temporal = $_FILES['imagen']['tmp_name'];
$uploadfile_nombre = uniqid().$_FILES['imagen']['name'];

$sql = "insert into publicaciones (titulo,contenido,imagen)
        VALUES('$titulo','$contenido','$uploadfile_nombre')";
$ret = $mysqli->query($sql);
$res = "Registro No guardado";
if ($ret == 1){
    if (is_uploaded_file($uploadfile_temporal)){
        move_uploaded_file($uploadfile_temporal, $ruta.$uploadfile_nombre);
    }
    $res = "Registro guardado";
}
echo $res;