console.log("JS Clientes Cargado");

var clientes = {

    eventosInicio: function () {
        $("#modalCheckin").on("hidden.bs.modal", function () {
            document.activeElement.blur();
        });

        // Evento para cargar municipios (Globalmente para cualquier select de provincia en Clientes)
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

        document.addEventListener("shown.bs.modal", function (e) {
            if (e.target.id !== "modalCliente") return;

            console.log("Modal cliente abierto — reservando carga de datos iniciales");

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
                    let htmlP = '<option value="" disabled selected>Seleccione una Provincia</option>';
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
                    $("select[name='provincia']").html(htmlP);
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
    ActualizaPaginador: function (pagina, totalPaginas) {
        // Quitar el active de todas las páginas
        $(".page-item").removeClass("active");

        //Poner active en el que tenga data-p pagina
        $(`.page-link[data-p='${pagina}']`).parent().addClass("active");

        //Activar o desactivar anterior y sigiente 
        if (pagina <= 1) {
            $("#btnAnterior").addClass("disabled");
        } else {
            $("#btnAnterior").removeClass("disabled");
        }

        if (pagina >= totalPaginas) {
            $("#btnSiguiente").addClass("disabled");
        } else {
            $("#btnSiguiente").removeClass("disabled");
        }
    },

    cargarClientes: function (pagina) {
        let nombre = $("#nombreF").val();
        let telefono = $("#telefonoF").val();
        let DNI = $("#DNIF").val();
        let email = $("#emailF").val();

        $.ajax({
            url: ROOT_AJAX,
            type: "POST",
            dataType: "json",
            data: {
                pagina: "controladores/panel/clientes/index.php",
                modelo: "modelos/panel/clientes/index.php",
                action: "listar",
                p: pagina,
                nombre: nombre,
                telefono: telefono,
                DNI: DNI,
                email: email
            },
            beforeSend: function () {
                comun.bloquearUI();
            },
            success: function (respuesta) {
                //Actualizar la tabla 
                $("#tablaCliente tbody").html(respuesta.HTML);
                // Guardar valores
                clientes.paginaActual = respuesta.pagina;
                clientes.totalPaginas = respuesta.totalPaginas;
                // Actualizar paginador
                clientes.ActualizaPaginador(respuesta.pagina, respuesta.totalPaginas);
            },
            complete: function () {
                comun.desbloquearUI();
            }
        });
    },

    eventosPaginador: function () {
        $(document).on("click", ".paginar", function (e) {
            e.preventDefault();
            e.stopPropagation();

            let $boton = $(this);
            let pagina = $boton.data("p");

            //Al pulsar en anterior o siguiente, se calcula la pagina dependiendo de la actual.
            if ($boton.parent().attr('id') === 'btnAnterior') {
                pagina = clientes.paginaActual - 1;
            } else if ($boton.parent().attr('id') === 'btnSiguiente') {
                pagina = clientes.paginaActual + 1;
            }

            // Evitar que baje de 1 o pase del total
            if (pagina < 1 || pagina > clientes.totalPaginas) return;

            clientes.cargarClientes(pagina);
        });
    },
    eventoFiltrar: function () {

        $(document).on("submit", "#filtrosClientes", function (event) {
            event.preventDefault();
            event.stopPropagation();

            // Siempre que se filtra, empezamos por la página 1
            clientes.cargarClientes(1);
        });
        //Limpiar los filtros
        $(document).on("click", "#resetF", function () {
            clientes.cargarClientes(1);
        });
    },
    eventoEnviar: function () {
        $(document).on("submit", "#formClientes", function (event) {
            event.preventDefault();
            event.stopPropagation();

            console.log("Submit capturado - Validando...");

            if (!clientes.validarForm("formClientes")) {
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
                    pagina: "controladores/panel/clientes/index.php",
                    modelo: "modelos/panel/clientes/index.php",
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
                        //  Actualizar el paginador

                        clientes.ActualizaPaginador(respuesta.pagina, respuesta.totalPaginas);

                        //limpiar formulario
                        $("#formClientes")[0].reset();
                        $("#formClientes").removeClass("was-validated");
                        $("#formClientes").find(".is-valid, .is-invalid").removeClass("is-valid is-invalid");
                        // Añadir registro en la tabla
                        let r = respuesta.clientes;

                        //Rellenar la tabla de nuevo
                        $("#tablaCliente tbody").html(respuesta.HTML);
                        clientes.ActualizaPaginador(respuesta.pagina, respuesta.totalPaginas);

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
    },
    eventoEditar: function () {
        console.log("evento editar clientes activo");

        $(document).on("click", ".editarCliente", function (event) {
            console.log("click en editar cliente");

            let tr = event.currentTarget.closest("tr");
            let id = $(tr).find("td:first").text().trim();

            comun.mostrarModal_v2({
                pagina: "controladores/panel/clientes/formModal.php",
                modelo: "modelos/panel/clientes/index.php",
                titulo: "Editar cliente",
                id: id
            });
        });

        $(document).off("submit", "#formEditarClientes").on("submit", "#formEditarClientes", function (e) {
            e.preventDefault();
            console.log("editando registro de cliente");

            if (!clientes.validarForm("formEditarClientes")) return;

            let datos = $(this).serialize();

            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "controladores/panel/clientes/index.php",
                    modelo: "modelos/panel/clientes/index.php",
                    datos: datos,
                    action: "update",
                    p: clientes.paginaActual // Mantener la página actual tras el update
                },
                beforeSend: function () {
                    comun.bloquearUI();
                },
                success: function (respuesta) {
                    if (respuesta.ok) {
                        comun.mostrarAlerta("Cliente actualizado correctamente", "success");
                        const modalElement = document.getElementById('modal');
                        if (modalElement) {
                            const modal = bootstrap.Modal.getInstance(modalElement);
                            if (modal) modal.hide();
                        }
                        // Refrescar tabla y paginador
                        $("#tablaCliente tbody").html(respuesta.HTML);
                        clientes.ActualizaPaginador(respuesta.pagina, respuesta.totalPaginas);
                    } else {
                        comun.mostrarAlerta("Error al actualizar el cliente", "danger");
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
        $(document).on("click", ".deleteCliente", function (event) {
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
                            pagina: "controladores/panel/clientes/index.php",
                            modelo: "modelos/panel/clientes/index.php",
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

                            clientes.ActualizaPaginador(data.pagina, data.totalPaginas);
                            $("#tablaCliente tbody").html(data.HTML);
                            comun.mostrarAlerta("Cliente eliminado correctamente", "success");
                        },
                        error: function (xhr, status, error) {
                            console.error("ERROR EN AJAX:", error);
                            comun.mostrarAlerta("Error al eliminar el cliente", "danger");
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
    clientes.eventosInicio();
    clientes.eventoEnviar();
    clientes.eventoEliminar();

    clientes.eventosPaginador();
    clientes.eventoFiltrar();
    clientes.eventoEditar();
});
