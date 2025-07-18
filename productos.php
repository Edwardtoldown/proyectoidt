<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Lista de Productos</title>
        <link rel="icon" type="image/png" href="img/logo.png"/>
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link href="css/estilos.css" rel="stylesheet"/> 
    </head>
    <body>
        <?php
        include("barra_menu.html");
        ?>
        <div class="container my-5">
            <h1 class="pt-2">Productos</h1>
            <div class="col-md-12">
                <div class="row" id="productos">
                
                </div>
                <center>
                    <div class="progress" style="width:20%" id="buscarMas">
                        <div class="progress-bar progress-bar-striped
                             progress-bar-animated" role="progressbar"
                             aria-valuenow="100" aria-valuemin="0"
                             aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                </center>
                <button id="botonMostrarMas" type="button"
                        class="btn btn-primary btn-lg btn-block">
                    Mostrar Más...
                </button>
            </div>
        </div>
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy;
                    Ejemplo de Sitio Web básico para el IDT</p>
            </div>
        </footer>
        <script src="js/jquery-3.3.1.min.js" type="text/javascript">
            </script>
            <script src="js/popper.min.js" type="text/javascript"></script>
            <script src="js/bootstrap.min.js" type="text/javascript"></script>
            <script src="js/funciones.js" type="text/javascript"></script>
            <script>
                $(".nav-item").eq(1).addClass("active");
                listarProductos();
                $("#botonMostrarMas").on('click', function(){
                    listarProductos();
                });
            </script>
    </body>
</html>