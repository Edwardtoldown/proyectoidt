<?php

# Conectamos con MySQL
require_once('../../../../php/conexion.php');
$nombre_usuario = $_POST['nombre_usuario'];
$login_usuario = $_POST['login_usuario'];
$pass_usuario = $_POST['pass_usuario'];
$sql = "INSERT INTO usuarios(nombre_usuario,login_usuario, 
    pass_usuario) VALUES ('$nombre_usuario','$login_usuario','$pass_usuario')";
$ret= $mysqli->query($sql);
$res= "Usuario No agregado";
if ($ret == 1) {
    $res = "Usuario agregado satisfactoriamente";
}
$mysqli->close();
echo($res);