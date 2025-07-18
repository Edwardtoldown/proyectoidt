<?php

require_once ('../../../../php/conexion.php');
$cod_usuario = $_POST['cod_usuario'];
$sql="delete from usuarios where cod_usuario=$cod_usuario";
$ret=$mysqli->query($sql);
$res="Registro No eliminado";
if($ret==1){
    $res="Registro eliminado";
}
echo $res;