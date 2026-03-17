console.log("JS Clientes Cargado");

var clientes = {
    eventosInicio: function () {
        $("#modalCheckin").on("hidden.bs.modal", function () {
            document.activeElement.blur();
        });
    },

    validarForm: function () {
        const form = document.getElementById("formclientes");
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
    eventoCargarPaginador: function () {
        $(".pagination");
        let pagina = $_POST["p"];
        $.ajax({
            url: ROOT_AJAX,
            type: "POST",
            dataType:"json",
            data:{
                pagina:"controladores/panel/clientes/index.php",
                modelo:"modelos/panel/clientes/index.php",
                action:"cargarPaginador",
                pagAct: pagina
            }
        })
    },

    eventoEnviar: function () {
        $("#formclientes").on("submit", function (event) {
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
                    console.log("URL que se está usando:", ROOT_AJAX);

                    console.log("Respuesta EXITOSA del servidor:", respuesta);

                    if (respuesta.ok === true) {
                        comun.mostrarAlerta("¡Login correcto! Redirigiendo...", "success");
                        //limpiar formulario
                        $("#formReservas")[0].reset();
                        $("#formReservas").removeClass("was-validated");
                        $("#formReservas").find(".is-valid, .is-invalid").removeClass("is-valid is-invalid");
                        // añadir registro para que se muestre
                        let r = respuesta.cliente;

                        let nuevaFila = `
<tr>
    <td>${r.id}</td>
    <td>${r.created_at}</td>
    <td>${r.nombre}</td>
    <td>${r.primer_apellido}</td>
    <td>${r.segundo_apellido}</td>
    <td>${r.sexo}</td>
    <td>${r.numero_documento_identidad}</td>
    <td>${r.tipo_documentacion}</td>
    <td>${r.numero_soporte_documento}</td>
    <td>${r.nacionalidad_id}</td>
    <td>${r.fecha_nacimiento}</td>
    <td>${r.telefono_fijo}</td>
    <td>${r.telefono_movil}</td>
    <td>${r.correo}</td>
    <td>${r.menores_edad}</td>
    <td>${r.pais}</td>
    <td>${r.provincia}</td>
    <td>${r.localidad}</td>
    <td>${r.direccion}</td>
    <td>${r.codigo_postal}</td>

    <td>
        <button class="btn btn-outline-danger borrarCliente">Eliminar</button>
    </td>
    <td>
        <button class="btn btn-outline-primary updateCliente">Editar</button>
    </td>
</tr>

`;


                        $("#tablaCliente tbody").append(nuevaFila);
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
        $(".delete").on("click", function (event) {
            console.log("clic en borrar");
            //Preguntar si realmente lo quiere borrar 
            if (!confirm("¿Seguro que quieres eliminar este registro?")) {
                return; // el usuario canceló
            }
            //Recoger el id 
            let tr = event.currentTarget.closest("tr");
            let id = tr.querySelector("td").textContent.trim();

            $(event.currentTarget).closest("tr").remove();

            alert(tr.firstChild);

            alert(id);
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
    actualizarResumen: function () {
        $.ajax({
            url: ROOT_AJAX,
            type: "POST",
            dataType: "json",
            data: {
                pagina: "controladores/panel/clientes/index.php",
                action: "actualizarResumen"
            },
            success: function (data) {
                $("#resumen").html(data.HTML);
            }
        });
    }
};

$(document).ready(function () {
    console.log("Document ready - Registrando eventos");
    clientes.eventosInicio();
    clientes.eventoEnviar();
    clientes.eventoEliminar();
});
