console.log("JS login Cargado");

var login = {
    eventosInicio: function () {
        $("#modalCheckin").on("hidden.bs.modal", function () {
            document.activeElement.blur();
        });
    },

    validarForm: function () {
        const form = document.getElementById("formLogin");
        if (!form) {
            console.error("No se encuentra el formulario con id='formLogin'");
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
        $("#formLogin").on("submit", function (event) {
            event.preventDefault();
            event.stopPropagation();

            console.log("Submit capturado - Validando...");

            if (!login.validarForm()) {
                console.log("Form inválido - No enviamos AJAX");
                return;
            }

            let usuario = $("#usuario").val().trim();
            let pass = $("#password").val();

            console.log("Datos preparados para enviar:", {
                usuario: usuario || "(vacío)",
                pass: pass ? "**** (longitud: " + pass.length + ")" : "(vacío)"
            });

            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "controladores/panel/login/index.php",
                    usuario: usuario,
                    pass: pass
                },

                beforeSend: function () {
                    console.log("Iniciando petición AJAX...");
                    comun.bloquearUI();
                },

                success: function (respuesta) {
                    console.log("URL que se está usando:", ROOT_AJAX);
                    
                    console.log("Respuesta EXITOSA del servidor:", respuesta);

                    if (respuesta.ok === true) {
                        window.location.href = ROOT_URL + "panel/reservas";
                        
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
    }
};

$(document).ready(function () {
    console.log("Document ready - Registrando eventos");
    login.eventosInicio();
    login.eventoEnviar();
});