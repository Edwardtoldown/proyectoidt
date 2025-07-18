<?php

session_start();
$mensaje="La sesión está cerrada.";
$activo=false;
if(isset($_SESSION['acceso'])){
    if($_SESSION['acceso']==true){
        $mensaje="Sesión Abierta.";
        $activo=true;
    }
}
$objeto = new stdClass();
$objeto->mensaje = $mensaje;
$objeto->activo = $activo;
$json = json_encode($objeto);
echo $json;