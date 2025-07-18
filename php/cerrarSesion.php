<?php
session_start();
$mensaje="";
if(isset($_SESSION['acceso'])){
    session_destroy();
    $mensaje="Sesion Cerrada.";
}
$objeto = new stdClass();
$objeto->mensaje = $mensaje;
$json = json_encode($objeto);
echo $json;