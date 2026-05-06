console.log("JS Casas Cargado");

var casas = {
    eventosInicio: function () {
        $("#modalCheckin").on("hidden.bs.modal", function () {
            document.activeElement.blur();
        });

        // Evento global para cargar municipios cuando cambia la provincia
        $(document).off("change", "select[name='provincia']").on("change", "select[name='provincia']", function () {
            let selectProvincia = $(this);
            let idProvincia = selectProvincia.val();
            let selectLocalidad = selectProvincia.closest('form').find("select[name='localidad']");

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
                    if (data.municipios) {
                        data.municipios.forEach(m => {
                            html += `<option value="${m.id}">${m.Municipio}</option>`;
                        });
                    }
                    selectLocalidad.html(html);
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
        //vaciar el tbody no hace falta 
        // $("#tablaCasas tbody").empty();
        let html = "";
        //rellenar la tabla
        r.forEach(res => {
            html += `
    <tr>
        <td>${res.id}</td>
        <td>${res.nombre}</td>
        <td>${res.max_huespedes}</td>
        <td>${res.hab}</td>
        <td>${res.banios}</td>
        <td>${res.direccion}</td>
        <td>${res.localidad}</td>
        <td>${res.provincia}</td>
        <td>${res.descripcion}</td>
        <td>${res.precio_noche}</td>
    <td>
        <button class="btn btn-outline-danger borrarCasa">Eliminar</button>
    </td>
    <td>
        <button class="btn btn-outline-primary editarCasa">Editar</button>
    </td>
</tr>
                            `;
        });
        //realizar una variable y hacer un put directamente
        $("#tablaCasas tbody").html(html);
    },
    eventoFiltrar: function () {
        $(document).on("submit", "#filtrosCasas", function (event) {
            event.preventDefault();
            event.stopPropagation();
            let id = $("#idF").val();
            let alojamiento = $("#alojamientoF").val();
            let provincia = $("#provinciaF").val();
            let localidad = $("#localidadF").val();


            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "controladores/panel/casas/filtros.php",
                    modelo: "modelos/panel/casas/index.php",
                    id: id,
                    alojamiento: alojamiento,
                    provincia: provincia,
                    localidad: localidad

                },
                beforeSend: function () {
                    comun.bloquearUI();
                },
                success: function (respuesta) {
                    //Actualizar la tabla
                    casas.RellenarTabla(respuesta.registros || []);
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
        $(document).on("click", "#resetF", function () {
            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "controladores/panel/casas/filtros.php",
                    modelo: "modelos/panel/casas/index.php"
                },
                beforeSend: function () {
                    comun.bloquearUI();
                },
                success: function (respuesta) {
                    //Actualizar la tabla
                    casas.RellenarTabla(respuesta.registros || []);
                },
                complete: function () {
                    comun.desbloquearUI();
                },
            });
        });

    },
    eventoEnviar: function () {
        // Abrir modal vacío para "Nuevo"
        $(document).on("click", "#btnNuevaCasa", function (event) {
            comun.mostrarModal_v2({
                pagina: "controladores/panel/casas/formModal.php",
                modelo: "modelos/panel/casas/index.php",
                titulo: "Nueva casa",
            });
        });

        // Escuchar el submit unificado del modal dinámico
        $(document).off("submit", "#formCasaModal").on("submit", "#formCasaModal", function (event) {
            event.preventDefault();
            event.stopPropagation();

            if (!casas.validarForm("formCasaModal")) {
                console.log("Form inválido - No enviamos AJAX");
                return;
            }

            let datos = $(this).serialize();
            let action = $("#casaAccion").val(); // 'insert' o 'update'

            console.log("Submit capturado con acción:", action);

            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "controladores/panel/casas/index.php",
                    modelo: "modelos/panel/casas/index.php",
                    datos: datos,
                    action: action
                },
                beforeSend: function () {
                    comun.bloquearUI();
                },
                success: function (respuesta) {
                    if (respuesta.ok === true) {
                        comun.mostrarAlerta(action === "insert" ? "Casa añadida correctamente" : "Casa actualizada correctamente", "success");

                        // Ocultar modal genérico
                        const modalElement = document.getElementById('modal');
                        if (modalElement) {
                            const modal = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                            if (modal) modal.hide();
                        }

                        // Rellenar los datos de la tabla
                        if (respuesta.casas) {
                            casas.RellenarTabla(respuesta.casas);
                        }
                    } else {
                        comun.mostrarAlerta("Error: " + (respuesta.message || "Datos inválidos enviados"), "danger");
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
    eventoEliminar: function () {
        $(document).on("click", ".borrarCasa", function (event) {
            let tr = event.currentTarget.closest("tr");
            let id = tr.querySelector("td").textContent.trim();

            comun.mostrarModal_v2({
                titulo: "Confirmar eliminación",
                HTML: "¿Estás seguro de eliminar este registro?",
                funcionAceptar: function () {
                    $.ajax({
                        url: ROOT_AJAX,
                        type: "POST",
                        dataType: "json",
                        data: {
                            pagina: "controladores/panel/casas/index.php",
                            modelo: "modelos/panel/casas/index.php",
                            id: id,
                            action: "delete"
                        },
                        beforeSend: function () {
                            comun.bloquearUI();
                        },
                        success: function (data) {
                            // Cerrar modal
                            const modalEl = document.getElementById('modal');
                            const modal = bootstrap.Modal.getInstance(modalEl);
                            if (modal) modal.hide();

                            // Rellenar la tabla
                            casas.RellenarTabla(data.casas);
                            comun.mostrarAlerta("Casa eliminada correctamente", "success");
                        },
                        error: function (xhr, status, error) {
                            console.error("ERROR EN AJAX:", error);
                            comun.mostrarAlerta("Error al eliminar el registro", "danger");
                        },
                        complete: function () {
                            comun.desbloquearUI();
                        }
                    });
                }
            });
        })
    },
    eventoEditar: function () {
        $(document).on("click", ".editarCasa", function (event) {
            let tr = event.currentTarget.closest("tr");
            let id = $(tr).find("td:first").text().trim();

            comun.mostrarModal_v2({
                pagina: "controladores/panel/casas/formModal.php",
                modelo: "modelos/panel/casas/index.php",
                titulo: "Editar casa",
                id: id
            });
        });
    },
};

$(document).ready(function () {
    console.log("Document ready - Registrando eventos");
    casas.eventosInicio();
    casas.eventoEnviar();
    casas.eventoEliminar();
    casas.eventoFiltrar();
    casas.eventoEditar();
});