console.log("JS reservas Cargado");

var reservas = {
    eventosInicio: function () {
        $("#modalCheckin").on("hidden.bs.modal", function () {
            document.activeElement.blur();
        });
        //Evento para cargar casas 
        $(document).on("shown.bs.modal", function (e) {
            // Comprobamos que el elemento instanciado sea el modal genérico Y además contenga nuestro formulario de reservas
            if (e.target.id !== "modal" || $(e.target).find('#formReservaModal').length === 0) return;
            console.log("ok");
            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "libreria/php/comunAjax.php",
                    action: "casas"
                },
                success: function (data) {
                    console.log("Respuesta de AJAX:", data);
                    let html = '<option value="" disabled selected>Elija una casa</option>';

                    if (data.casas) {
                        data.casas.forEach(m => {
                            html += `<option value="${m.id}">${m.nombre}</option>`;
                        });
                    }

                    $("select[id='casa']").html(html);
                },
                error: function (xhr, status, error) {
                    console.error("Error en AJAX casas:", error);
                    console.log("Respuesta:", xhr.responseText);
                }
            });

        });

    },

    validarForm: function (idForm) {
        const form = document.getElementById(idForm);
        if (!form) {
            console.error("No se encuentra el formulario con id='" + idForm + "'");
            return false;
        }

        let esValido = form.checkValidity();
        if (!esValido) {
            form.classList.add("was-validated");
        }
        console.log("Validación del form " + idForm + ":", esValido ? "VÁLIDO" : "INVÁLIDO");
        return esValido;
    },
    RellenarTabla: function (r) {
        //vaciar el tbody
        $("#tablaReservas tbody").empty();

        //rellenar la tabla
        r.forEach(res => {
            let fila = `
                             <tr>
                                <td>${res.id}</td>
                                <td>${res.num_reserva}</td>
                                <td>${res.canal}</td>
                                <td>${res.total_huespedes}</td>
                                <td>${res.fecha_entrada}</td>
                                <td>${res.fecha_salida}</td>
                                <td>${res.importe_bruto}</td>
                                <td>${res.descuento}%</td>
                                <td>${res.comision}%</td>
                                <td>${res.importe_final}</td>
                                <td><button class="btn btn-outline-danger borrarReserva">Eliminar</button></td>
                                <td><button class="btn btn-outline-primary editarReserva">Editar</button></td>
                            </tr>
                            `;
            $("#tablaReservas tbody").append(fila);
        });
    },
    eventoFiltrar: function () {

        $(document).on("submit", "#filtrosReservas", function (event) {
            event.preventDefault();
            event.stopPropagation();
            let numero = $("#numeroF").val();
            let anio = $("#anioF").val();
            let desde = $("#desdeF").val();
            let hasta = $("#hastaF").val();


            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "controladores/panel/reservas/filtros.php",
                    modelo: "modelos/panel/reservas/index.php",
                    numero: numero,
                    anio: anio,
                    desde: desde,
                    hasta: hasta

                },
                beforeSend: function () {
                    comun.bloquearUI();
                },
                success: function (respuesta) {
                    //Actualizar la tabla
                    reservas.RellenarTabla(respuesta.registros || []);
                },
                error: function () {
                    //mandar un mensaje con modalv2
                },
                complete: function () {
                    comun.desbloquearUI();

                }
            });

        });
            //Limpiar los filtros
        $(document).on("click","#resetF",function(){
            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "controladores/panel/reservas/filtros.php",
                    modelo: "modelos/panel/reservas/index.php"
                },
                beforeSend: function () {
                    comun.bloquearUI();
                },
                success: function (respuesta) {
                    //Actualizar la tabla
                    reservas.RellenarTabla(respuesta.registros || []);
                },
                complete: function () {
                    comun.desbloquearUI();
                },
            });
        });

    },
    eventoFactura: function () {

        $(document).on("click", ".facturaReserva", function (event) {
            let tr = event.currentTarget.closest("tr");
            let idReserva = $(tr).find("td:first").text().trim();

            console.log("Generando factura... "+idReserva);

            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "controladores/panel/reservas/facturaReservas.php",
                    modelo: "modelos/panel/reservas/index.php",
                    id: idReserva
                },
                beforeSend: function () {
                    comun.bloquearUI();
                },
                success: function (respuesta) {
                    if (respuesta.ok === true) {
                        comun.mostrarAlerta("Factura con id " + respuesta.registro.id + " realizada correctamente", "success");
                    } else {
                        comun.mostrarAlerta("Error: " + (respuesta.error || "Datos inválidos enviados"), "danger");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("ERROR EN AJAX:", xhr.responseText);
                    comun.mostrarAlerta("Error de conexión al generar la factura", "danger");
                },
                complete: function () {
                    comun.desbloquearUI();
                }
            });
        });
    },
    eventoEnviar: function () {
        // Abrir modal vacío para "Nuevo"
        $(document).on("click", "#btnNuevaReserva", function (event) {
            comun.mostrarModal_v2({
                pagina: "controladores/panel/reservas/formModal.php",
                modelo: "modelos/panel/reservas/index.php",
                titulo: "Nueva reserva",
            });
        });

        // Escuchar el submit unificado del modal dinámico
        $(document).off("submit", "#formReservaModal").on("submit", "#formReservaModal", function (event) {
            event.preventDefault();
            event.stopPropagation();

            if (!reservas.validarForm("formReservaModal")) {
                console.log("Form inválido - No enviamos AJAX");
                return;
            }

            let datos = $(this).serialize();
            let action = $("#reservaAccion").val(); // 'insert' o 'update'

            console.log("Submit capturado con acción:", action);

            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "controladores/panel/reservas/index.php",
                    modelo: "modelos/panel/reservas/index.php",
                    datos: datos,
                    action: action
                },
                beforeSend: function () {
                    comun.bloquearUI();
                },
                success: function (respuesta) {
                    if (respuesta.ok === true) {
                        comun.mostrarAlerta(action === "insert" ? "Reserva añadida correctamente" : "Reserva actualizada correctamente", "success");

                        // Ocultar modal genérico
                        const modalElement = document.getElementById('modal');
                        if (modalElement) {
                            const modal = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                            if (modal) modal.hide();
                        }

                        // Actualizar resumen al pie de la tabla
                        if (respuesta.resumen) {
                            $("#total_huespedes_resumen").text(respuesta.resumen.total_huespedes);
                            $("#total_bruto_resumen").text(respuesta.resumen.total_bruto);
                            $("#total_descuento_resumen").text(respuesta.resumen.total_descuento);
                            $("#total_comision_resumen").text(respuesta.resumen.total_comision);
                            $("#total_final_resumen").text(respuesta.resumen.total_final);
                        }

                        // Rellenar los datos de la tabla
                        if (respuesta.reservas) {
                            reservas.RellenarTabla(respuesta.reservas);
                        }
                    } else {
                        comun.mostrarAlerta("Error: " + (respuesta.error || "Datos inválidos enviados"), "danger");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("ERROR EN AJAX:", xhr.responseText);
                    comun.mostrarAlerta("Error de conexión al guardar", "danger");
                },
                complete: function () {
                    comun.desbloquearUI();
                }
            });
        });
    },
    eventoEditar: function () {
        $(document).on("click", ".editarReserva", function (event) {
            let tr = event.currentTarget.closest("tr");
            let idReserva = $(tr).find("td:first").text().trim();

            comun.mostrarModal_v2({
                pagina: "controladores/panel/reservas/formModal.php",
                modelo: "modelos/panel/reservas/index.php",
                titulo: "Editar reserva",
                id: idReserva
            });
        });
    },
    eventoEliminar: function () {
        $(document).on("click", ".borrarReserva", function (event) {
            let tr = event.currentTarget.closest("tr");
            let id = tr.querySelector("td").textContent.trim();

            comun.mostrarModal_v2({
                titulo: "Confirmar eliminación",
                HTML: "¿Estás seguro de que quieres eliminar esta reserva?",
                funcionAceptar: function () {
                    $.ajax({
                        url: ROOT_AJAX,
                        type: "POST",
                        dataType: "json",
                        data: {
                            pagina: "controladores/panel/reservas/index.php",
                            modelo: "modelos/panel/reservas/index.php",
                            id: id,
                            action: "delete"
                        },
                        beforeSend: function () {
                            comun.bloquearUI();
                        },
                        success: function (data) {
                            const modalEl = document.getElementById('modal');
                            const modal = bootstrap.Modal.getInstance(modalEl);
                            if (modal) modal.hide();

                            $("#total_huespedes_resumen").text(data.resumen.total_huespedes);
                            $("#total_bruto_resumen").text(data.resumen.total_bruto);
                            $("#total_descuento_resumen").text(data.resumen.total_descuento);
                            $("#total_comision_resumen").text(data.resumen.total_comision);
                            $("#total_final_resumen").text(data.resumen.total_final);

                            reservas.RellenarTabla(data.reservas);
                            comun.mostrarAlerta("Reserva eliminada correctamente", "success");
                        },
                        error: function (xhr, status, error) {
                            console.error("ERROR EN AJAX:", error);
                            comun.mostrarAlerta("Error al eliminar la reserva", "danger");
                        },
                        complete: function () {
                            comun.desbloquearUI();
                        }
                    });
                }
            });
        })
    }
};

$(document).ready(function () {
    console.log("Document ready - Registrando eventos");
    reservas.eventosInicio();
    reservas.eventoFiltrar();
    reservas.eventoEnviar();
    reservas.eventoEditar();
    reservas.eventoFactura();
    reservas.eventoEliminar();
});
