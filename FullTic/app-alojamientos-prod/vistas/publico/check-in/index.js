console.log("JS cargado");

var checkin = {


    eventosIncio: function () {
        $("#provincias").change(function () {
            var provinciaSelect = $(this).val();
            comun.listarMunicipios({
                seleccinado: provinciaSelect,
                IDcontenedor: "localidades"
            });

        })
        //cuando el modal se haya cerrado correctamente 
        $("#modalCheckin").on("hidden.bs.modal", function () {
            //Quitar el foco del elemento modal
            document.activeElement.blur();
        });
    },
    validarForm: function () {

        //Validación Bootstrap simple

        const form = document.getElementById('formCliente');

        // si algun campo incorrecto
        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            return false;
        }
        return true;
    }
    ,
    eventoEnviar: function () {
        //Enviar el formulario por jquery-ajax 
        //Accedo al formulario por id
        $("#formCliente").on('submit', function (event) {
            // evitar recargar la página
            event.preventDefault();
            event.stopPropagation();


            //Comprobar el formulario 

            if (!checkin.validarForm()) {
                return;
            }

            let datos = $(this).serialize();//Recoge todos los datos del formulario 
            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "controladores/publico/check-in/guardar_cliente.php",
                    datos: datos
                },
                beforeSend: function () {
                    comun.bloquearUI();
                },
                success: function (respuesta) {
                    //ver que recogemos (comentar cuando no se utilice)
                    console.log(respuesta);
                    //si no esta bien 
                    if (!respuesta.ok) {
                        comun.mostrarAlerta("Error: " + respuesta.error, "danger");
                        return;
                    }
                    // si quedan por registrar huespedes
                    if (Number(respuesta.registrados) < Number(respuesta.total)) {
                        //Limpiar el formulario
                        $("#formCliente")[0].reset();
                        $("#formCliente").removeClass("was-validated");
                        $("#formCliente").find(".is-valid, .is-invalid").removeClass("is-valid is-invalid");

                        /*mensaje de Huésped guardado( pasado a comun.js)
                            $("#modalCheckinBody").html("Huésped guardado correctamente.Faltan " + (respuesta.total - respuesta.registrados) + " por registrar.");
                        //localizar el el1emento modal
                            const modal = new bootstrap.Modal(document.getElementById('modalCheckin'));
                        //mostrar el modal
                            modal.show();*/


                        comun.mostrarModal("Huésped guardado correctamente. Faltan " + (respuesta.total - respuesta.registrados) + " por registrar.");

                    } else {
                        // TODOS REGISTRADOS  mensaje final
                        $("#mensajeCheckin").html(`
                        <div class="alert alert-success">
                            Todos los huéspedes han sido registrados correctamente.
                        </div>
                    `);
                        //ocultar el formulario para que no ingresen huespedes más de la cuenta 
                        $("#formCliente").hide();
                        // Desactivar por si acaso
                        $("#formCliente :input").prop("disabled", true);
                    }



                },
                error: function (xhr, status, error) {
                    //lo pongo como mensaje ?
                    console.log("ERROR AJAX:", xhr.responseText);
                },
                complete: function () {
                    comun.desbloquearUI();
                }
            });
        });

    }

}

$(document).ready(function () {
    checkin.eventosIncio();
    checkin.eventoEnviar();
});
