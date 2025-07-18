<?php
require_once('../../../../php/conexion.php');
$id = $_POST['id'];
$sql = "select * from publicaciones where id=".$id;
$ret = $mysqli->query($sql);
$row = $ret->fetch_array(MYSQLI_ASSOC);
$objeto = new stdClass();
$objeto->mensaje = "Registro encontrado";
$objeto->titulo = $row["titulo"];
$objeto->contenido = $row["contenido"];
$json = json_encode($objeto);
echo($json);