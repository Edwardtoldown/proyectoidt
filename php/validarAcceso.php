<?php

session_start();
require_once('conexion.php');
$login_usuario = $_POST['login_usuario'];
$pass_usuario = $_POST['pass_usuario'];
$sql = "select * from usuarios where login_usuario='$login_usuario'
and pass_usuario='$pass_usuario'";
$ret=$mysqli->query($sql);
$_SESSION['acceso']=false;
if($ret->num_rows==1){
    $_SESSION['acceso']=true;
}
$objeto = new stdClass ();
$objeto->acceso = $_SESSION['acceso'];
$json = json_encode($objeto);
$mysqli->close();
echo($json);