<?php

require_once 'conexion.php';
$offset = ((int) ($_POST['publicacion']) - 1) * 3;
$sql = "SELECT id, titulo, concat(substring(contenido,1,100),'....') as contenido, imagen from publicaciones limit 3 offset " . $offset;
$result = $mysqli->query($sql);
$publicaciones = "";
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $publicaciones .= '<div class="col-md-12 col-sm-12 portfolio-item mb-5">
             <div class="card h-100">
                 <div class="card-body">
                 <div class="row">
                 <div class="col-md-3">
                 <a href="publicacion_detalle.php?codigo=' . $row["id"] . '">
                    <img class="card-img-top"
                        src="imagenes_publicaciones/' . $row["imagen"] . '">
            </a>
            </div>
            <div class="col-md-9">
            <h4 class="card-title">
            <a href="publicacion_detalle.php?codigo=' . $row["id"] . '">
                                ' . $row["titulo"] . '
            </a>
            </h4>
                <h5>' . $row["contenido"] . '
            </h5>
            </div>
            </div>
            </div>
        </div>
    </div>';
}
echo $publicaciones;
