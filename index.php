<html>
    <head>
        <meta charset="UTF-8">
        <title>Blog</title>
        <link rel="icon" type="image/png" href="img/logo.png">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
            include("barra_menu.html");
        ?>
        <div class="container my-5 py-2">
            <h1 class="pt-2">Nuestras Publicaciones</h1>
            <div class="row" id="publicaciones">
                  
            </div>
            <div class="row mb-5">
                <div class="col-md-12 text-center pb-5">
                    <button id="botonMostrarMas" type="button" 
                            class="btn btn-primary btn-sm">
                        Mostrar Más...
                    </button>
                </div>
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
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/funciones.js" type="text/javascript"></script>
        <script>
            $(".nav-item").eq(0).addClass("active");
            listarPublicaciones();
            $("#botonMostrarMas").on('click', function () {
                listarPublicaciones();
            });
        </script>
    </body>
</html>