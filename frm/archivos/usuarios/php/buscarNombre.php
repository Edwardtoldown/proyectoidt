<?php
require_once('../../../../php/conexion.php');
$offset = ((int)($_POST['bpagina']) -1) * 10;
$result=$mysqli->query("SELECT * FROM usuarios WHERE 
    nombre_usuario like '%".$_POST['bnombre']."%' LIMIT 10
        OFFSET ".$offset );
$tabla="";
while($row=$result->fetch_array(MYSQLI_ASSOC)){
    $tabla = $tabla."<tr>
        <td>{$row["cod_usuario"]}</td>
        <td>{$row["nombre_usuario"]}</td>
        </tr>";
}
if ($tabla==""){
    $tabla="<tr><td colspan='2'>No hay registros...</td></tr>";
}
$objeto = new stdClass();
$objeto->mensaje = "Datos encontrados";
$objeto->contenido = $tabla;
$json = json_encode($objeto);
$mysqli->close();
echo $json;