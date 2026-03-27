console.log("JS reservas Cargado");

var reservas = {
    eventosInicio: function () {
        $("#modalCheckin").on("hidden.bs.modal", function () {
            document.activeElement.blur();
        });
    },

    validarForm: function () {
        const form = document.getElementById("formEditarReservas");
        if (!form) {
            console.error("No se encuentra el formulario con id='formEditarReservas'");
            return false;
        }

        let esValido = form.checkValidity();
        if (!esValido) {
            form.classList.add("was-validated");
        }
        console.log("Validación del form editar:", esValido ? "VÁLIDO" : "INVÁLIDO");
        return esValido;
    },

    eventoEnviar: function () {
        $("#formReservas").on("submit", function (event) {
            event.preventDefault();
            event.stopPropagation();

            console.log("Submit capturado - Validando...");

            if (!reservas.validarForm()) {
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
                    pagina: "controladores/panel/reservas/index.php",
                    modelo: "modelos/panel/reservas/index.php",
                    datos,
                    action
                },

                beforeSend: function () {
                    console.log("Iniciando petición AJAX...");
                    comun.bloquearUI();
                },

                success: function (respuesta) {

                    console.log("Respuesta EXITOSA del servidor:", respuesta);

                    if (respuesta.ok === true) {

                        //cambiar por modalv2
                        comun.mostrarAlerta("añadido correctamente", "success");

                        // Actualizar resumen
                        $("#total_huespedes").text(respuesta.resumen.total_huespedes);
                        $("#total_bruto").text(respuesta.resumen.total_bruto);
                        $("#total_descuento").text(respuesta.resumen.total_descuento);
                        $("#total_comision").text(respuesta.resumen.total_comision);
                        $("#total_final").text(respuesta.resumen.total_final);

                        //limpiar formulario
                        $("#formReservas")[0].reset();
                        $("#formReservas").removeClass("was-validated");
                        $("#formReservas").find(".is-valid, .is-invalid").removeClass("is-valid is-invalid");

                        // añadir registro para que se muestre
                        let r = respuesta.reserva;

                        let nuevaFila = `
<tr>
    <td>${r.id}</td>
    <td>${r.num_reserva}</td>
    <td>${r.canal}</td>
    <td>${r.total_huespedes}</td>
    <td>${r.fecha_entrada}</td>
    <td>${r.fecha_salida}</td>
    <td>${r.importe_bruto}</td>
    <td>${r.descuento}%</td>
    <td>${r.comision}%</td>
    <td>${r.importe_final}</td>
    <td><button class="btn btn-outline-danger borrarReserva">Eliminar</button></td>
    <td><button class="btn btn-outline-primary update">Editar</button></td>
</tr>
`;


                        $("#tablaReservas tbody").append(nuevaFila);


                    } else {
                        comun.mostrarAlerta("Error: " + (respuesta.error || "Credenciales inválidas"), "danger");
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
    },
    eventoEditar: function () {
        console.log("evento editar activo");

        $(document).on("click", ".editarReserva", function (event) {
            console.log("click en editar");

            // Recopilar datos de la fila
            let tr = event.currentTarget.closest("tr");
            let datosReserva = $(tr).find("td").map(function () {
                return $(this).text().replace("%", "").trim();
            }).get();
            let idReserva = datosReserva[0]; // ID de la reserva

            //realizar la consulta de de la fila y devolver el formulario con la fila con action  

            // Mostrar modal 
            comun.mostrarModal_v2({
                pagina: "controladores/panel/reservas/formModal.php",
                modelo: "modelos/panel/reservas/index.php",
                titulo: "Editar reserva",
                id: idReserva
            });

        });
        // Escuchar submit del form editar
        $(document).off("submit", "#formEditarReservas").on("submit", "#formEditarReservas", function (e) {
            e.preventDefault();
            console.log("editando registro");

            if (!reservas.validarForm()) return; // Valida este form

            let datos = $(this).serialize();

            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "controladores/panel/reservas/index.php",
                    modelo: "modelos/panel/reservas/index.php",
                    datos: datos + "&id=" + idReserva, // Agregar ID
                    action: "update"
                },
                beforeSend: function () {
                    console.log("Iniciando petición AJAX...");
                    comun.bloquearUI();
                },
                success: function (respuesta) {
                    if (respuesta.ok) {
                        comun.mostrarAlerta("Actualizado correctamente", "success");
                        $("#modal").modal("hide");
                        // Actualizar fila 
                        let r = respuesta.reserva;
                        let registro = `
<tr>
    <td>${r.id}</td>
    <td>${r.num_reserva}</td>
    <td>${r.canal}</td>
    <td>${r.total_huespedes}</td>
    <td>${r.fecha_entrada}</td>
    <td>${r.fecha_salida}</td>
    <td>${r.importe_bruto}</td>
    <td>${r.descuento}%</td>
    <td>${r.comision}%</td>
    <td>${r.importe_final}</td>
    <td><button class="btn btn-outline-danger borrarReserva">Eliminar</button></td>
    <td><button class="btn btn-outline-primary update editarReserva">Editar</button></td>
</tr>
`;
                        $(tr).html(registro);

                    } else {
                        comun.mostrarAlerta("Error: " + respuesta.error, "danger");
                    }
                },
                error: function () {
                    comun.mostrarAlerta("Error de conexión", "danger");
                },
                complete: function () {
                    comun.desbloquearUI();
                }
            });
        });

    },
    eventoEliminar: function () {

        //En caso de pulsar algun boton de eliminar
        $(".borrarReserva").on("click", function (event) {
            console.log("clic en borrar");
            //Preguntar si realmente lo quiere borrar 
            if (!confirm("¿Seguro que quieres eliminar este registro?")) {
                return; // el usuario canceló
            }
            //Recoger el id 
            let tr = event.currentTarget.closest("tr");
            let id = tr.querySelector("td").textContent.trim();

            // Eliminar el tr 
            $(event.currentTarget).closest("tr").remove();
            //Actualizamos el resumen
            //reservas.actualizarResumen();

            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "controladores/panel/reservas/index.php",
                    modelo: "modelos/panel/reservas/index.php",
                    id,
                    action: "delete"
                },
                beforeSend: function () {
                    console.log("Iniciando petición AJAX...");
                    comun.bloquearUI();
                },
                success: function (data) {
                    // Actualizar resumen
                    $("#total_huespedes").text(data.resumen.total_huespedes);
                    $("#total_bruto").text(data.resumen.total_bruto);
                    $("#total_descuento").text(data.resumen.total_descuento);
                    $("#total_comision").text(data.resumen.total_comision);
                    $("#total_final").text(data.resumen.total_final);


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
    }
    /*Evento editar (Doble petición AJAX otra opción menos eficiente)
    actualizarResumen: function () {
        $.ajax({
            url: ROOT_AJAX,
            type: "POST",
            dataType: "json",
            data: {
                pagina: "controladores/panel/reservas/index.php",
                modelo:"modelos/panel/reservas/index.php",
                action: "actualizarResumen"
            },
            success: function (data) {
                $("#resumen").html(data.HTML);
            }
        });
    }*/
};

$(document).ready(function () {
    console.log("Document ready - Registrando eventos");
    reservas.eventosInicio();
    reservas.eventoEnviar();
    reservas.eventoEditar();
    reservas.eventoEliminar();
});
