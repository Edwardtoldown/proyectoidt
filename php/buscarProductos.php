<?php

require_once ('conexion.php');
$offset = ((int) ($_POST['pagina']) - 1) * 3;
$sql = "select codigo,nombre,concat(substring(descripcion,1,100),'...') as descripcion,
        precio,imagen from productos limit 3 offset " . $offset;
$result = $mysqli->query($sql);
$productos = "";
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $productos .= '<div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                        <a href="producto_detalle.php?codigo=' . $row['codigo'] . '">
                        <img class="card-img-top"
                        src="imagenes_productos/' . $row["imagen"] . '"></a>
                        <h4 class="card-title">
                        <a href="producto_detalle.php?codigo=' . $row['codigo'] . '">' . $row["nombre"] . '</a>
                        </h4>
                        <p class="card-text">' . $row["descripcion"] . '</p>
                        </div>
                    </div>
                </div>';
}
echo $productos;