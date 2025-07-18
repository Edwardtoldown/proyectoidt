<!DOCTYPE html>
<html>
    <head>
        <title>Formulario de Contacto</title>
        <link rel="icon" type="image/png" 
              href="../../../img/logo.png"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, 
              initial-scale=1.0">
        <link href="../../../css/bootstrap-theme.min.css" 
              rel="stylesheet" type="text/css"/>
        <link href="../../../css/bootstrap.min.css" rel="stylesheet" 
              type="text/css"/>
        <link href="../../../css/alertify.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../../css/estilos.css" rel="stylesheet" 
              type="text/css"/>
    </head> 
    <body>
        <div id="panelPrograma" class="card border 
             border-primary">
            <div class="card-header bg-primary text-center 
                 text-white">
                Formulario de Contacto
            </div>
            <form id="formPrograma">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-1">
                            <span>Nombre</span>
                        </div>
                        <div class="col-md-3">
                            <input id="nombre" name="nombre" 
                                   type="text" 
                                   class="form-control
                                   input-sm" 
                                   placeholder="Nombre" required>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <span>Apellido</span>
                        </div>
                        <div class="col-md-3">
                            <input id="apellido" name="apellido" 
                                   type="text" 
                                   class="form-control
                                   input-sm" 
                                   placeholder="Apellido">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <span>Asunto</span>
                        </div>
                        <div class="col-md-3">
                            <input id="asunto" name="asunto" 
                                   type="text" 
                                   class="form-control
                                   input-sm" 
                                   placeholder="Asunto">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <span>Email</span>
                        </div>
                        <div class="col-md-3">
                            <input id="email" name="email" 
                                   type="text" 
                                   class="form-control
                                   input-sm" placeholder="Email">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <span>Telefono</span>
                        </div>
                        <div class="col-md-3">
                            <input id="telefono" name="telefono" 
                                   type="text" 
                                   class="form-control
                                   input-sm" 
                                   placeholder="Telefono" required pattern="\(\[0-9]{4})[0-9]{6}"
                                   title="El formato esperado es (0999)999999">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <span>Celular</span>
                        </div>
                        <div class="col-md-3">
                            <input id="celular" name="celular" 
                                   type="text"
                                   class="form-control
                                   input-sm" 
                                   placeholder="Celular">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <span>Mensaje</span>
                        </div>
                        <div class="col-md-5">
                            <textarea id="mensaje" name="mensaje" 
                                      class="form-control input-sm" 
                                      placeholder="Mensaje" rows="5" 
                                      cols="10"></textarea>
                        </div> 
                    </div>

                </div>
                <div class="card-footer text-center">
                    <button id="botonEnviar" type="button" 
                            class="btn btn-primary btn-sm">Enviar</button>
                    <button id="botonLimpiar" type="button" 
                            class="btn btn-primary btn-sm">Limpiar</button>
                    <button id="botonSalir" type="button" 
                            class="btn btn-primary btn-sm">Salir</button>
                </div>
            </form>
        </div>
        <div id="mensajes" class="card card-body bg-light text-center 
             fixed-bottom">
            Mensajes del Sistema.</div>
        <script src="../../../js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="../../../js/bootstrap.min.js" 
        type="text/javascript"></script>
        <script src="../../../js/alertify.js" type="text/javascript"></script>
        <script src="../../../js/funciones.js" 
        type="text/javascript"></script>
        <script src="js/funciones.js" type="text/javascript"></script>
        <script>
            $("#botonEnviar").on("click", function (e) {
                enviarMensaje(e);
            });
            $("#botonSalir").on('click', function () {
                location.href = "../../../index.php";
            });
            $("#botonLimpiar").on('click', function () {
                limpiarCampos();
            });
        </script>
    </body>
</html>
