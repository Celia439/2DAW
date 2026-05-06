console.log("JS Huéspedes Cargado");

var huespedes = {
    eventosInicio: function () {
        $("#modalCheckin").on("hidden.bs.modal", function () {
            document.activeElement.blur();
        });

        function cargarReservas($select, selectedReserva) {
            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "libreria/php/comunAjax.php",
                    action: "reservas"
                },
                success: function (data) {
                    let html = '<option value="" disabled selected>Seleccione una reserva</option>';
                    if (data.reservas) {
                        data.reservas.forEach(reserva => {
                            const value = reserva.id;
                            const label = `ID:${value} Reserva: ${reserva.num_reserva}`;
                            html += `<option value="${value}">${label}</option>`;
                        });
                    }
                    $select.html(html);
                    if (selectedReserva) {
                        $select.val(selectedReserva);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error cargando reservas para el modal de huéspedes:", error, xhr.responseText);
                }
            });
        }

        function cargarCasas($select, selectedCasa) {
            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "libreria/php/comunAjax.php",
                    action: "casas"
                },
                success: function (data) {
                    let html = '<option value="" disabled selected>Seleccione una casa</option>';
                    if (data.casas) {
                        data.casas.forEach(casa => {
                            html += `<option value="${casa.id}"> id:${casa.id} Nombre:${casa.nombre}</option>`;
                        });
                    }
                    $select.html(html);
                    if (selectedCasa) {
                        $select.val(selectedCasa);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error cargando casas para el modal de huéspedes:", error, xhr.responseText);
                }
            });
        }

        function cargarClientes($select, selectedCliente) {
            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "libreria/php/comunAjax.php",
                    action: "clientes"
                },
                success: function (data) {
                    let html = '<option value="" disabled selected>Seleccione un cliente</option>';
                    if (data.clientes) {
                        data.clientes.forEach(cliente => {
                            const nombre = cliente.nombre || "";
                            const apellido = cliente.primer_apellido || "";
                            const dni = cliente.numero_documento_identidad || "";
                            const label = `id ${cliente.id}, ${dni}, ${nombre} ${apellido}`.trim();
                            html += `<option value="${cliente.id}">${label}</option>`;
                        });
                    }
                    $select.html(html);
                    if (selectedCliente) {
                        $select.val(selectedCliente);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error cargando clientes para el modal de huéspedes:", error, xhr.responseText);
                }
            });
        }
        //Cargar los filtros
        const $reservaSelectF = $("select[id='idReservaF']");
        const $casaSelectF = $("select[id='idCasaF']");
        const $clienteSelectF = $("select[id='idClienteF']");

        if ($reservaSelectF.length) {
            cargarReservas($reservaSelectF, $reservaSelectF.val());
        }

        if ($casaSelectF.length) {
            cargarCasas($casaSelectF, $casaSelectF.val());
        }

        if ($clienteSelectF.length) {
            cargarClientes($clienteSelectF, $clienteSelectF.val());
        }
        //Cargar los datos de reservas casas y clientes en el modal 
        $(document).on("shown.bs.modal", function (e) {
            if (e.target.id !== "modal" || $(e.target).find('#formHuespedModal').length === 0) {
                return;
            }

            const $reservaSelect = $("select[id='id_reserva']");
            const $casaSelect = $("select[id='id_casa']");
            const $clienteSelect = $("select[id='id_cliente']");

            if ($reservaSelect.length) {
                cargarReservas($reservaSelect, $reservaSelect.val());
            }

            if ($casaSelect.length) {
                cargarCasas($casaSelect, $casaSelect.val());
            }

            if ($clienteSelect.length) {
                cargarClientes($clienteSelect, $clienteSelect.val());
            }
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
        $("#tablaHuespedes tbody").empty();

        //rellenar la tabla
        r.forEach((huesped) => {
            let fila = `
                <tr>
                    <td>${huesped.id}</td>
                    <td>${huesped.id_reserva}</td>
                    <td>${huesped.id_casa}</td>
                    <td>${huesped.id_cliente}</td>
                    <td>${huesped.es_titular}</td>
                    <td><button class="btn btn-outline-danger delete borrarHuesped">Eliminar</button></td>
                    <td><button class="btn btn-outline-primary editarHuesped">Editar</button></td>
                </tr>
            `;
            $("#tablaHuespedes tbody").append(fila);
        });
    },

    eventoFiltrar: function () {
        $(document).on("submit", "#filtrosHuespedes", function (event) {
            event.preventDefault();
            event.stopPropagation();
            let id = $("#idF").val();
            let id_reserva = $("#idReservaF").val();
            let id_casa = $("#idCasaF").val();
            let id_cliente = $("#idClienteF").val();

            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "controladores/panel/huespedes/filtros.php",
                    modelo: "modelos/panel/huespedes/index.php",
                    id: id,
                    id_reserva: id_reserva,
                    id_casa: id_casa,
                    id_cliente: id_cliente,
                },
                beforeSend: function () {
                    comun.bloquearUI();
                },
                success: function (respuesta) {
                    //Actualizar la tabla
                    huespedes.RellenarTabla(respuesta.registros || []);
                },
                error: function () {
                    //mandar un mensaje con modal
                },
                complete: function () {
                    comun.desbloquearUI();
                },
            });
        });
         //Limpiar los filtros
        $(document).on("click","#resetF",function(){
            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "controladores/panel/huespedes/filtros.php",
                    modelo: "modelos/panel/huespedes/index.php"
                },
                beforeSend: function () {
                    comun.bloquearUI();
                },
                success: function (respuesta) {
                    //Actualizar la tabla
                    huespedes.RellenarTabla(respuesta.registros || []);
                },
                complete: function () {
                    comun.desbloquearUI();
                },
            });
        });
    },

    eventoEnviar: function () {
        // Abrir modal vacío para "Nuevo"
        $(document).on("click", "#btnNuevoHuesped", function (event) {
            comun.mostrarModal_v2({
                pagina: "controladores/panel/huespedes/formModal.php",
                modelo: "modelos/panel/huespedes/index.php",
                titulo: "Nuevo Huésped",
            });

        });

        // Escuchar el submit unificado del modal dinámico
        $(document)
            .off("submit", "#formHuespedModal")
            .on("submit", "#formHuespedModal", function (event) {
                event.preventDefault();
                event.stopPropagation();

                if (!huespedes.validarForm("formHuespedModal")) {
                    console.log("Form inválido - No enviamos AJAX");
                    return;
                }

                let datos = $(this).serialize();
                let action = $("#huespedAccion").val(); // 'insert' o 'update'

                console.log("Submit capturado con acción:", action);

                $.ajax({
                    url: ROOT_AJAX,
                    type: "POST",
                    dataType: "json",
                    data: {
                        pagina: "controladores/panel/huespedes/index.php",
                        modelo: "modelos/panel/huespedes/index.php",
                        datos: datos,
                        action: action,
                    },
                    beforeSend: function () {
                        comun.bloquearUI();
                    },
                    success: function (respuesta) {
                        comun.mostrarAlerta(
                            action === "insert"
                                ? "Huésped añadido correctamente"
                                : "Huésped actualizado correctamente",
                            "success",
                        );

                        // Ocultar modal genérico
                        const modalElement = document.getElementById("modal");
                        if (modalElement) {
                            const modal =
                                bootstrap.Modal.getInstance(modalElement) ||
                                new bootstrap.Modal(modalElement);
                            if (modal) modal.hide();
                        }

                        // Rellenar los datos de la tabla
                        if (respuesta.huespedes) {
                            huespedes.RellenarTabla(respuesta.huespedes);
                        }

                    },
                    error: function (xhr, status, error) {
                        console.error("ERROR EN AJAX:", xhr.responseText);
                        comun.mostrarAlerta("Error de conexión al guardar", "danger");
                    },
                    complete: function () {
                        comun.desbloquearUI();
                    },
                });
            });
    },

    eventoEditar: function () {
        $(document).on("click", ".editarHuesped", function (event) {
            let tr = event.currentTarget.closest("tr");
            let idHuesped = $(tr).find("td:first").text().trim();

            comun.mostrarModal_v2({
                pagina: "controladores/panel/huespedes/formModal.php",
                modelo: "modelos/panel/huespedes/index.php",
                titulo: "Editar Huésped",
                id: idHuesped,
            });
        });
    },

    eventoEliminar: function () {
        //En caso de pulsar algún botón de eliminar
        $(document).on("click", ".borrarHuesped", function (event) {
            console.log("clic en borrar");

            // Recoger el id y el tr para usarlos dentro de la función de aceptar
            let tr = event.currentTarget.closest("tr");
            let id = tr.querySelector("td").textContent.trim();

            // Preguntar si realmente lo quiere borrar con v2
            comun.mostrarModal_v2({
                titulo: "Confirmar eliminación",
                HTML: "¿Estás seguro de que quieres eliminar este registro?",
                funcionAceptar: function () {
                    $.ajax({
                        url: ROOT_AJAX,
                        type: "POST",
                        dataType: "json",
                        data: {
                            pagina: "controladores/panel/huespedes/index.php",
                            modelo: "modelos/panel/huespedes/index.php",
                            id: id,
                            action: "delete",
                        },
                        beforeSend: function () {
                            console.log("Iniciando petición AJAX...");
                            comun.bloquearUI();
                        },
                        success: function (data) {
                            // Cerrar modal
                            const modalEl = document.getElementById('modal');
                            const modal = bootstrap.Modal.getInstance(modalEl);
                            if (modal) modal.hide();

                            // Actualizar la tabla
                            huespedes.RellenarTabla(data.huespedes);
                            comun.mostrarAlerta("Huésped eliminado correctamente", "success");
                        },
                        error: function (xhr, status, error) {
                            console.error("ERROR EN AJAX:", {
                                status: status,
                                error: error,
                                responseText: xhr.responseText || "(sin respuesta)",
                            });
                            comun.mostrarAlerta("Error al eliminar el huésped", "danger");
                        },
                        complete: function () {
                            console.log("Petición AJAX completada");
                            comun.desbloquearUI();
                        },
                    });
                }
            });
        });
    },
};

$(document).ready(function () {
    console.log("Document ready - Registrando eventos");
    huespedes.eventosInicio();
    huespedes.eventoFiltrar();
    huespedes.eventoEnviar();
    huespedes.eventoEditar();
    huespedes.eventoEliminar();
});
