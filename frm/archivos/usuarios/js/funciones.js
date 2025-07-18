function agregarUsuario() {
    var formData = $("#formPrograma").serialize();
    if (validarDatos()) {
        $.ajax({
            url: "php/agregar.php",
            type: "post",
            dataType: "html",
            data: formData,
            success: function (res) {
                //$("#mensajes").html(res);
                alertify.alert(res);
                limpiarCampos();
            },
            error: function (e) {
                $("#mensajes").html("Error:" + e.responseText);
            }
        });
    } else {
        $("mensajes").html("Las contraseñas no coinciden");
    }
}

function validarDatos() {
    if ($("#nombre_usuario").val() == "") {
        alertify.alert("<span style='color:red'>Nombre no debe estar vacio</span>");
        return false;
    } else if ($("#login_usuario").val() == "") {
        alertify.alert("<span style='color:red'>Login no debe estar vacio</span>");
        return false;
    } else if ($("#pass_usuario").val() == "") {
        alertify.alert("<span style='color:red'>Password no debe estar vacio</span>");
        return false;
    } else if ($("#rep_pass").val() == "") {
        alertify.alert("<span style='color:red'>Repetir Password no debe estar vacio</span>");
        return false;
    } else if ($("#pass_usuario").val() != $("#rep_pass").val()) {
        alertify.alert("<span style='color:red'>Las contraseñas no coinciden</span>");
        return false;
    }
    return true;
}

function buscarNombreUsuario() {
    var datosFormulario = $("#formBuscar").serialize();
    $.ajax({
        type: 'POST',
        url: 'php/buscarNombre.php',
        data: datosFormulario,
        dataType: 'json',
        beforeSend: function (objeto) {
            $("#mensajes").html("Enviando datos al servidor...");
            $("#contenidoBusqueda").css("display", "none");
        },
        success: function (json) {
            console.log(json)
            $("#mensajes").html(json.mensaje);
            $("#contenidoBusqueda").html(json.contenido);
            $("#contenidoBusqueda").fadeIn("slow");
            $("tbody tr").on("click", function () {
                var id = $(this).find("td:first").html();
                $("#panelBuscar").html("");
                $("#cod_usuario").val(id);
                buscarIdUsuario();
                $("#buscar").fadeOut("slow");
                $("#panelPrograma").fadeIn("slow");
            });
        },
        error: function (error) {
            $("#mensajes").html("Error:" + error.responseText);
        }
    });
}
function buscarIdUsuario() {
    var datosFormulario = $("#formPrograma").serialize();
    $.ajax({
        type: 'POST',
        url: 'php/buscarId.php',
        data: datosFormulario,
        dataType: 'json',
        beforeSend: function (objeto) {
            $("#mensajes").html("Enviando datos al servidor...");
        },
        success: function (json) {
            $("#mensajes").html(json.mensaje);
            $("#nombre_usuario").val(json.nombre_usuario);
            $("#login_usuario").val(json.login_usuario);
            $("#pass_usuario").val(json.pass_usuario);
            $("#rep_pass").val(json.pass_usuario);
            $("#botonAgregar").prop('disabled', true);
            $("#botonModificar").prop('disabled', false);
            $("#botonEliminar").prop('disabled', false);
            $("#botonCancelar").prop('disabled', false);
        },
        error: function (e) {
            $("#mensajes").html("Error:" + e.responseText);
        }
    });
}
function eliminarUsuario() {
    var datosFormulario = $("#formPrograma").serialize();
    $.ajax({
        type: 'POST',
        url: 'php/eliminar.php',
        data: datosFormulario,
        dataType: 'html',
        beforeSend: function (objeto) {
            $("#mensajes").html("Enviando datos al servidor...");
        },
        success: function (res) {
            $("#mensajes").html(res);
            limpiarCampos();
            $("#botonAgregar").prop('disabled', false);
            $("#botonModificar").prop('disabled', true);
            $("#botonEliminar").prop('disabled', true);
            $("#botonCancelar").prop('disabled', true);
        },
        error: function (e) {
            $("#mensajes").html("Error:" + e.responseText);
        }
    });
}
function modificarUsuario(){
    var datosFormulario = $("#formPrograma").serialize();
    if(validarDatos()){
        $.ajax({
            type: 'Post',
            url: 'php/modificar.php',
            data: datosFormulario,
            dataType: 'html',
            beforeSend: function () {
                $("#mensajes").html("Enviando datos al servidor...");
            },
            success: function (res) {
                $("#mensajes").html("");
                alertify.alert(res);
                limpiarCampos();
                $("#botonAgregar").prop('disabled', false);
                $("#botonModificar").prop('disabled', true);
                $("#botonEliminar").prop('disabled', true);
                $("#botonCancelar").prop('disabled', true);
            },
            error: function (e) {
                $("#mensajes").html("Error:"+ e.responseText);
            }
        });
    }
}

function limpiarCampos() {
    $("#cod_usuario").val("");
    $("#nombre_usuario").val("");
    $("#login_usuario").val("");
    $("#pass_usuario").val("");
    $("#rep_pass").val("");
}

