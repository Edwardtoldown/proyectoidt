<!DOCTYPE html>
<html>
    <head>
        <title>Carga de Usuarios</title>
        <link rel="icon" type="image/png" href="../../../img/logo.png"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href="../../../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../../css/themes/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../../css/alertify.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../../fonts/css/fontawesome-all.css" rel="stylesheet" type="text/css"/>
        <style>
            tbody tr{
                cursor:pointer
            }
            /* html{
                 display:none;
             }   */
        </style>
    </head>
    <body>
        <div id="buscar"></div>
        <div id="panelPrograma" class="card border border-primary">
            <div class="card-header text-center bg-primary text-white">Carga de Usuarios</div>
            <div class="card-body text-right">
                <form id="formPrograma" method="POST">
                    <div class="row">
                        <div class="col-md-2">
                            <span>Codigo</span>
                        </div>
                        <div class="col-md-1">
                            <input id="cod_usuario" name="cod_usuario" 
                                   type="text" class="form-control input-sm" 
                                   placeholder="Codigo" readonly>
                        </div>
                        <div class="col-md-1">
                            <button id="botonBuscarId" 
                                    type="button" 
                                    class="btn btn-primary btn-sm">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <span>Nombre</span>
                        </div>
                        <div class="col-md-2">
                            <input id="nombre_usuario" name="nombre_usuario" 
                                   type="text" class="form-control input-sm" 
                                   placeholder="Nombre">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <span>Login</span>
                        </div>
                        <div class="col-md-2">
                            <input id="login_usuario" name="login_usuario" 
                                   type="text" class="form-control input-sm" 
                                   placeholder="Login">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <span>Password</span>
                        </div>
                        <div class="col-md-2">
                            <input id="pass_usuario" name="pass_usuario" 
                                   type="password" class="form-control input-sm" 
                                   placeholder="Password">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-2 derecha">
                            <span>Repetir Password</span>
                        </div>
                        <div class="col-md-2">
                            <input id="rep_pass" name="rep_pass" 
                                   type="password" class="form-control input-sm" 
                                   placeholder="Repetir Password">
                        </div> 
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <button id="botonAgregar" type="button" 
                        class="btn btn-primary btn-sm">Agregar</button>
                <button id="botonModificar" type="button" 
                        class="btn btn-primary btn-sm">Modificar</button>
                <button id="botonEliminar" type="button"
                        class="btn btn-primary btn-sm" 
                        data-toggle="modal" 
                        data-target="#confirmarEliminar">Eliminar</button>
                <button id="botonCancelar" type="button" 
                        class="btn btn-primary btn-sm">Cancelar</button>
                <button id="botonSalir" type="button" 
                        class="btn btn-primary btn-sm">Salir</button>      
            </div>
        </div>
        <div class="modal fade" id="confirmarEliminar" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Mensaje del Sistema</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Está seguro de eliminar estos datos?
                    </div>
                    <div class="modal-footer">
                        <button id="botonEliminarAlert" type="button" 
                                class="btn btn-primary btn-sm" data-dismiss="modal">
                            Eliminar
                        </button>
                        <button type="button" class="btn btn-default 
                                btn-sm" data-dismiss="modal">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div id="mensajes" class="card card-body fixed-bottom bg-light text-center">
            Mensajes del Sistema
        </div>
        <script src="../../../js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="../../../js/popper.min.js" type="text/javascript"></script>
        <script src="../../../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../js/alertify.js" type="text/javascript"></script>
         <!--<script src="../../../js/funciones.js" type="text/javascript"></script>-->
        <script src="js/funciones.js" type="text/javascript"></script> 
        <script>
            //verificarSesion(true);
            alertify.defaults.transition = "slide";
            alertify.defaults.theme.ok = "btn btn-primary";
            alertify.defaults.theme.cancel = "btn btn-danger";
            alertify.defaults.theme.input = "form-control";
            $("#botonModificar").prop('disabled', true);
            $("#botonEliminar").prop('disabled', true);
            $("#botonCancelar").prop('disabled', true);

            $("#botonBuscarId").on('click', function () {
                $("#buscar").load("buscar.html");
                $("#buscar").fadeIn("slow");
                $("#panelPrograma").fadeOut("slow");
            });

            $("#botonAgregar").on('click', function () {
                agregarUsuario();
            });

            $("#botonModificar").on('click', function () {
                modificarUsuario();
            });

            $("#botonEliminarAlert").on('click', function () {
                eliminarUsuario();
                //$("#confirmarEliminar").modal('hide'); esto ocultaria el modal
            });
            $("#botonSalir").on('click', function () {
                location.href = "../../../menu.html";
            });
            $("#botonCancelar").on('click', function () {
                $("#botonAgregar").prop('disabled', false);
                $("#botonModificar").prop('disabled', true);
                $("#botonEliminar").prop('disabled', true);
                $("#botonCancelar").prop('disabled', true);
                limpiarCampos();
            });
        </script>
    </body>
</html>