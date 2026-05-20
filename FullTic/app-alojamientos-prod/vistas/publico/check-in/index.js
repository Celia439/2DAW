console.log("JS cargado");

var checkin = {


    eventosIncio: function () {

        //cuando el modal se haya cerrado correctamente 
        $("#modalCheckin").on("hidden.bs.modal", function () {
            //Quitar el foco del elemento modal
            document.activeElement.blur();
        });
        // Cargar países y provincias (solo para el modal de nuevo cliente)
        $.ajax({
            url: ROOT_AJAX,
            type: "POST",
            dataType: "json",
            data: {
                pagina: "libreria/php/comunAjax.php",
                action: "NaciProv"
            },
            success: function (data) {
                let htmlP = '<option value="" disabled selected>Seleccione una provincia</option>';
                let htmlN = '<option value="" disabled selected>Seleccione un País</option>';

                if (data.paises) {
                    data.paises.forEach(m => {
                        htmlN += `<option value="${m.id}">${m.nombre}</option>`;
                    });
                }
                $("select[name='nacionalidad_id']").html(htmlN);
                $("select[id='pais']").html(htmlN);

                if (data.provincias) {
                    data.provincias.forEach(m => {
                        htmlP += `<option value="${m.id}">${m.Provincia}</option>`;
                    });
                }
                $("#provincia_cliente").html(htmlP);
            }
        });
        // Evento para cargar municipios en Check-in
        $(document).off("change", "#provincia_cliente").on("change", "#provincia_cliente", function () {

            let idProvincia = $(this).val();

            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "libreria/php/municipios.php",
                    provincia: idProvincia
                },
                success: function (data) {

                    let html = '<option value="" disabled selected>Seleccione una localidad</option>';

                    data.municipios.forEach(m => {
                        html += `<option value="${m.id}">${m.Municipio}</option>`;
                    });

                    $("#localidad_cliente").html(html);
                }
            });
        });

   
    },
    validarForm: function () {

        //Validación Bootstrap simple

        const form = document.getElementById('formClientes');

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
        $("#formClientes").on('submit', function (event) {
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

                    //Comprobar datos
                    if (!respuesta.ok) {
                        comun.mostrarAlerta("Error: " + respuesta.error, "danger");
                        return;
                    }
                    // si quedan por registrar huespedes
                    if (Number(respuesta.registrados) < Number(respuesta.total)) {
                        //Limpiar el formulario
                        $("#formClientes")[0].reset();
                        $("#formClientes").removeClass("was-validated");
                        $("#formClientes").find(".is-valid, .is-invalid").removeClass("is-valid is-invalid");

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
                        $("#formClientes").hide();
                        // Desactivar por si acaso
                        $("#formClientes :input").prop("disabled", true);
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
