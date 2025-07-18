<?php
require_once('../../../../php/conexion.php');
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$asunto = $_POST['asunto'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$mensaje = $_POST['mensaje'];
$fecha = date("Y-m-d");
$hora = date("H:i:s");
$sql = "insert into mensajes(nombre,apellido,asunto,email,telefono,
                celular,mensaje,respondido,fecha,hora) VALUES ('".$nombre."','".$apellido . "','" . $asunto . "','" . $email . "',         
                    '" . $telefono . "','" . $celular . "','" . $mensaje . "',
                        'pendiente','" . $fecha . "','" . $hora . "')";
$ret = $mysqli->query($sql);
$res = "Mensaje No enviado";
if ($ret == 1) {
    $res = "Mensaje enviado satisfactoriamente. Gracias por 
    escribirnos! En breve nos comunicaremos contigo";
}
$mysqli->close();
echo($res);
