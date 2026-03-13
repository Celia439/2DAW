console.log("JS Casas Cargado");

var casas = {
    eventosInicio: function () {
        $("#modalCheckin").on("hidden.bs.modal", function () {
            document.activeElement.blur();
        });
    },

    validarForm: function () {
        const form = document.getElementById("formCasas");
        if (!form) {
            console.error("No se encuentra el formulario con id='casas'");
            return false;
        }

        let esValido = form.checkValidity();
        if (!esValido) {
            form.classList.add("was-validated");
        }
        console.log("Validación del form:", esValido ? "VÁLIDO" : "INVÁLIDO");
        return esValido;
    },

    eventoEnviar: function () {
        $("#formCasas").on("submit", function (event) {
            event.preventDefault();
            event.stopPropagation();

            console.log("Submit capturado - Validando...");

            if (!casas.validarForm()) {
                console.log("Form inválido - No enviamos AJAX");
                return;
            }
            let datos = $(this).serialize();

            console.log("Datos preparados para enviar:" + datos);

            let action = "insert";

            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "controladores/panel/casas/index.php",
                    datos,
                    action
                },

                beforeSend: function () {
                    console.log("Iniciando petición AJAX...");
                    comun.bloquearUI();
                },

                success: function (respuesta) {
                    console.log("URL que se está usando:", ROOT_AJAX);

                    console.log("Respuesta EXITOSA del servidor:", respuesta);

                    if (respuesta.ok === true) {
                        comun.mostrarAlerta("¡Login correcto! Redirigiendo...", "success");
                        setTimeout(function () {
                            window.location.href = ROOT_URL + "panel/casas";
                        }, 1500);
                    } else {
                        comun.mostrarAlerta("Error: " + (respuesta.message || "Credenciales inválidas"), "danger");
                    }
                },

                error: function (xhr, status, error) {
                    console.error("ERROR EN AJAX:", {
                        status: status,
                        error: error,
                        responseText: xhr.responseText || "(sin respuesta)"
                    });
                    comun.mostrarAlerta("Error de conexión o servidor: " + (xhr.responseText || error), "danger");
                },

                complete: function () {
                    console.log("Petición AJAX completada");
                    comun.desbloquearUI();
                }
            });
        });
    }, eventoEliminar: function () {
        console.log("acaso esto carga");

        //En caso de pulsar algun boton de eliminar
        $(".delete").on("click", function (event) {
            console.log("clic en borrar");
            //Preguntar si realmente lo quiere borrar 
            if (!confirm("¿Seguro que quieres eliminar este registro?")) {
                return; // el usuario canceló
            }
            //Recoger el id 
            let tr = event.currentTarget.closest("tr");
            let id = tr.querySelector("td").textContent.trim();

            $(event.currentTarget).closest("tr").remove();

            alert(tr.firstChild);

            alert(id);
            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "controladores/panel/casas/index.php",
                    id,
                    action: "delete"
                },
                beforeSend: function () {
                    console.log("Iniciando petición AJAX...");
                    comun.bloquearUI();
                },
                success: function (data) {
                    comun.mostrarModal_v2({
                        titulo: "Registro eliminado",
                        HTML: data.HTML
                    });
                },
                error: function (xhr, status, error) {

                    console.error("ERROR EN AJAX:", {
                        status: status,
                        error: error,
                        responseText: xhr.responseText || "(sin respuesta)"
                    });
                },

                complete: function () {
                    console.log("Petición AJAX completada se a borrado correctamete");
                    comun.desbloquearUI();
                }
            });
        })
    },
    //Evento editar 
    actualizarResumen:function(){
         $.ajax({
        url: ROOT_AJAX,
        type: "POST",
        dataType: "json",
        data: {
            pagina: "controladores/panel/casas/index.php",
            action:"actualizarResumen"
        },
        success: function(data){
            $("#resumen").html(data.HTML);
        }
    });
    }
};

$(document).ready(function () {
    console.log("Document ready - Registrando eventos");
    casas.eventosInicio();
    casas.eventoEnviar();
    casas.eventoEliminar();
});
