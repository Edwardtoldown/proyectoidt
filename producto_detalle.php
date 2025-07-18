<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Catalogo de Productos</title>
        <link rel="icon" type="image/png" href="img/logo.png"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" 
              type="text/css"/>
        <link href="css/estilos.css" rel="stylesheet" 
              type="text/css"/>
    </head>
    <body>
        <div class="container mb-5 py-2">
            <h1>Detalle de Producto</h1>
            <?php
            require_once('php/conexion.php');
            $result = $mysqli->query("select nombre,replace(format(precio,'Currency'),',','.') as precio,imagen,descripcion from productos 
            where codigo=" . $_GET["codigo"]);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            ?>
            <div class="row">
                <img class='col-3 pb-2' 
                     src='imagenes_productos/<?php echo $row["imagen"] ?>' alt=''>
                <h2 class='card-title col-12 pb-2'>
                    <?php echo $row["nombre"] ?>
                </h2>
                <h3 class="col-12 pb-2">Gs. <?php echo $row["precio"] ?></h3>
                <h3 class="col-12 pb-2"><?php echo $row["descripcion"] ?></h3>
            </div>
        </div>
    </body>
</html>