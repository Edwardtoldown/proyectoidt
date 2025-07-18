<?php

require_once ('../../../../php/conexion.php');
$cod_usuario = $_POST['cod_usuario'];
$nombre_usuario = $_POST['nombre_usuario'];
$login_usuario = $_POST['login_usuario'];
$pass_usuario = $_POST['pass_usuario'];
$sql = "update usuarios set
nombre_usuario='$nombre_usuario',login_usuario='$login_usuario',
pass_usuario='$pass_usuario' where cod_usuario=$cod_usuario";
$ret = $mysqli->query($sql);
$res = "Registro No Modificado";
if ($ret == 1) {
    $res = "Registro Modificado";
}
echo($res);
