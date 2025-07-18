function validarAcceso() {
    $("#mensajes").html("Mensajes del Sistema");
    if ($("#login_usuario").val() === "") {
        $("#mensajes").html("Usuario no debe estar vacio.");
    } else if ($("#pass_usuario").val() === "") {
        $("#mensajes").html("Clave no debe estar vacio.");
    } else {
        validarAccesoAjax();
    }
}

function validarAccesoAjax() {
    var datosFormulario = $("#formAcceso").serialize();
    $.ajax({
        type: 'POST',
        url: "php/validarAcceso.php",
        data: datosFormulario,
        dataType: 'json',
        beforeSend: function () {
            $("#mensajes").html("Enviando datos al servidor ...");
        },
        success: function (json) {
            if (json.acceso == true) {
                location.href = "menu.html";
            } else {
                $("#mensajes").html("Credencial Invalida");
            }
        },
        error: function (error) {
            $("#mensajes").html("Error:" + error.responseText);
        }
    });
}

function verificarSesion(programa) {
    var url = 'php/verificarSesion.php';
    if (programa) {
        url = '../../../php/verificarSesion.php';
    }
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        beforeSend: function () {
            $("#mensajes").html("Enviando datos al Servidor ...");
        },
        success: function (json) {
            console.log(json)
            if (json.activo == false) {
                if (programa) {
                    location.href = "../../../login.html";
                } else {
                    location.href = "login.html";
                }
            } else {
                $("html").css("display", "block");
            }
            $("#mensajes").html(json.mensaje);
        },
        error: function (e) {
            $("#mensajes").html("ERROR: No se pudo recuperar la sesión.");
        }
    });
}

function cerrarSesion() {
    $.ajax({
        type: 'POST',
        url: 'php/cerrarSesion.php',
        dataType: 'json',
        beforeSend: function () {
            $("#mensaje").html("Enviado datos al Servidor ...");
        },
        success: function (json) {
            console.log(json)
            $("#mensajes").html(json.mensaje);
        },
        error: function (e) {
            $("#mensajes").html("No se pudo cerrar la sesión.");
        }
    });
}

var publicacion = 1;
function listarPublicaciones() {
    var formData = {
        publicacion: publicacion
    };
    $.ajax({
        url: "php/buscarPublicaciones.php",
        type: "post",
        dataType: "html",
        data: formData,
        beforeSend: function (objeto) {
            $("#botonMostrarMas").css("display", "none");
        },
        success: function (res) {
            $("#botonMostrarMas").css("display", "inline");
            $("#publicaciones").append(res);
            publicacion++;
            if (res.trim() == "") {
                $("#botonMostrarMas").css("display", "none");
            }
        },
        error: function (error) {
            alert("Error:" + error.responseText);
        }
    });
}

var pagina = 1;
function listarProductos() {
    var formData = {
        pagina:pagina
    };
    $.ajax({
        url: "php/buscarProductos.php",
        type: "post",
        dataType: "html",
        data: formData,
        beforeSend: function (objeto) {
            $("#buscarMas").css("visibility", "visible");
            $("#botonMostrarMas").css("display", "none");
        },
        success: function (res) {
            $("#buscarMas").css("visibility", "hidden");
            $("#botonMostrarMas").css("display", "inline");
            $("#productos").append(res);
            pagina++;
            if (res.trim() == "") {
                $("#botonMostrarMas").css("display", "none");
            }
        },
        error: function (error) {
            alert("Error:" + error.responseText);
        }
    });
}
