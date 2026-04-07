console.log("JS Casas Cargado");

var casas = {
    eventosInicio: function () {
        $("#modalCheckin").on("hidden.bs.modal", function () {
            document.activeElement.blur();
        });
        document.addEventListener("shown.bs.modal", function (e) {

            if (e.target.id !== "modalCasa") return;

            console.log("Modal casa abierto — registrando eventos dinámicos");

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
                        console.log(html);
                        $("select[name='localidad']").html(html);
                    }
                });
            });

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
    RellenarTabla: function (r) {
        //vaciar el tbody
        $("#tablaCasas tbody").empty();

        //rellenar la tabla
        r.forEach(res => {
            let fila = `
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
        <button class="btn btn-outline-primary updateCasa">Editar</button>
    </td>
</tr>
                            `;
            $("#tablaCasas tbody").append(fila);
        });
    },
    eventoEnviar: function () {
        $(document).on("submit", "#formCasas", function (event) {
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
                    modelo: "modelos/panel/casas/index.php",
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
                        //limpiar formulario
                        $("#formCasas")[0].reset();
                        $("#formCasas").removeClass("was-validated");
                        $("#formCasas").find(".is-valid, .is-invalid").removeClass("is-valid is-invalid");
                        //Añadir registro en la tabla 
                        let r = respuesta.casas;
                        casas.RellenarTabla(r);

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
        $(document).on("click", ".borrarCasa", function (event) {
            console.log("clic en borrar");
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
                    pagina: "controladores/panel/casas/index.php",
                    modelo: "modelos/panel/casas/index.php",
                    id,
                    action: "delete"
                },
                beforeSend: function () {
                    console.log("Iniciando petición AJAX...");
                    comun.bloquearUI();
                },
                success: function (data) {
                    //Rellenar la tabla
                    casas.RellenarTabla(data.casas);

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

};

$(document).ready(function () {
    console.log("Document ready - Registrando eventos");
    casas.eventosInicio();
    casas.eventoEnviar();
    casas.eventoEliminar();
});
