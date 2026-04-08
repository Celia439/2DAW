console.log("JS Clientes Cargado");

var clientes = {
    
    eventosInicio: function () {

        $("#modalCheckin").on("hidden.bs.modal", function () {
            document.activeElement.blur();
        });

        document.addEventListener("shown.bs.modal", function (e) {

            if (e.target.id !== "modalCliente") return;

            console.log("Modal cliente abierto — registrando eventos dinámicos");

            // Evento para cargar municipios
            $(document).off("change", "select[name='provincia']");
            $(document).on("change", "select[name='provincia']", function () {

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

                        $("select[name='localidad']").html(html);
                    }
                });
            });

        });
    },

    validarForm: function () {
        const form = document.getElementById("formClientes");
        if (!form) {
            console.error("No se encuentra el formulario con id='clientes'");
            return false;
        }

        let esValido = form.checkValidity();
        if (!esValido) {
            form.classList.add("was-validated");
        }
        console.log("Validación del form:", esValido ? "VÁLIDO" : "INVÁLIDO");
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

    eventosPaginador: function () {
        $(document).on("click", ".paginar", function () {
            let pagina = $(this).data("p");
            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "controladores/panel/clientes/index.php",
                    modelo: "modelos/panel/clientes/index.php",
                    action: "listar",
                    p: pagina
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
        });

    },
    eventoEnviar: function () {
        $(document).on("submit", "#formClientes", function (event) {
            event.preventDefault();
            event.stopPropagation();

            console.log("Submit capturado - Validando...");

            if (!clientes.validarForm()) {
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
    }, eventoEliminar: function () {

        //En caso de pulsar algun boton de eliminar
        $(document).on("click", ".deleteCliente", function (event) {
            //Preguntar si realmente lo quiere borrar 
            if (!confirm("¿Seguro que quieres eliminar este registro?")) {
                return; // el usuario canceló
            }
            //Recoger el id 
            let tr = event.currentTarget.closest("tr");
            let id = tr.querySelector("td").textContent.trim();

            $.ajax({
                url: ROOT_AJAX,
                type: "POST",
                dataType: "json",
                data: {
                    pagina: "controladores/panel/clientes/index.php",
                    modelo: "modelos/panel/clientes/index.php",
                    id,
                    action: "delete"
                },
                beforeSend: function () {
                    console.log("Iniciando petición AJAX...");
                    comun.bloquearUI();
                },
                success: function (data) {
                    //Actualizar el paginador 
                    clientes.ActualizaPaginador(data.pagina, data.totalPaginas);

                    // Rellenar la tabla 
                    $("#tablaCliente tbody").html(data.HTML);
                    clientes.ActualizaPaginador(data.pagina, data.totalPaginas);


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
    //Evento editar 

};

$(document).ready(function () {
    console.log("Document ready - Registrando eventos");
    clientes.eventosInicio();
    clientes.eventoEnviar();
    clientes.eventoEliminar();

    clientes.eventosPaginador();
});
