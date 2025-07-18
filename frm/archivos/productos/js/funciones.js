function agregarProducto() {
       if(validarDatos()){
        var formData = new FormData(document.getElementById("formPrograma"));
        $.ajax({
            url: "php/agregar.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (res) {
                //limpiarCampos();
                alertify.alert(res);
            },
            error: function (e) {
                $("#mensajes").html("No se puede agregar los datos, Error:" + e.responseText);
            }
        });
    }
}

function validarDatos(){
    if($("#nombre").val()==""){
        alertify.alert("<span style='color:red'>Debe escribir un nombre</span>");
        return false;
    }
    else if (document.getElementById("imagen").files.length == 0) {
        alertify.alert("<span style='color:red'>Debe seleccionar una imagen previamente</span>");
        return false;
    }
    return true;
}

function buscarNombreProducto() {
    var datosFormulario = $("#formBuscar").serialize();
    $.ajax({
        type: 'POST',
        url: 'php/buscarNombre.php',
        data: datosFormulario,
        dataType: 'json',
        beforeSend: function () {
            $("#mensajes").html("Enviando datos al servidor...");
            $("#contenidoBusqueda").css("display", "none");
        },
        success: function (json) {
            $("#mensajes").html(json.mensaje);
            $("#contenidoBusqueda").html(json.contenido);
            $("#contenidoBusqueda").fadeIn("slow");
            $("tbody tr").on("click", function () {
                var codigo = $(this).find("td:first").html();
                $("#panelBuscar").html("");
                $("#codigo").val(codigo);
                buscarIdProducto();
                $("#buscar").fadeOut("slow");
                $("#panelPrograma").fadeIn("slow");
            });
        },
        error: function (error) {
            alertify.alert("Error:" + error.responseText);
        }
    });
}

function buscarIdProducto() {
    var datosFormulario = $("#formPrograma").serialize();
    $.ajax({
        type: 'POST',
        url: 'php/buscarId.php',
        data: datosFormulario,
        dataType: 'json',
        beforeSend: function () {
            $("#mensajes").html("Enviando datos al servidor...");
        },
        success: function (json) {
            $("#mensajes").html(json.mensaje);
            $("#nombre").val(json.nombre);
            $("#descripcion").val(json.descripcion);
            $("#precio").val(json.precio);
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

function eliminarProducto() {
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
            $("#mensajes").html("Error" + e.responseText);
        }
    });
}

function modificarProducto() {
    var formData = new FormData(document.getElementById("formPrograma"));
    $.ajax({
        url: "php/modificar.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
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
            $("#mensajes").html(e.responseText);
        }
    });
}

function limpiarCampos() {
    document.getElementById("formPrograma").reset();
}