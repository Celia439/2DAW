
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//?
var comun = {
    listarMunicipios: function (param) {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ROOT_AJAX,
            data: {
                pagina: "controladores/publico/check-in/municipios_v2.php",
                modelo: "modelos/publico/check-in/index.php",
                seleccionado: param.seleccinado,
            },
            beforeSend: function () {
                $("#" + param.IDcontenedor).html("cargando...");
            },
            success: function (data) {
                $("#" + param.IDcontenedor).html(data.HTML_municipios);
                //window.location.reload();
            }
        })

    },
    //tipo puede ser:
    // "success" = verde
    // "danger" = rojo
    // "warning" = amarillo
    // "info" = azul

    mostrarAlerta: function (mensaje, tipo) {
        $("#alertas").html(`
         <div class="alert alert-${tipo} alert-dismissible fade show" role="alert">
            ${mensaje}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>`);
    },
    // Mostrar ventana flotante
    mostrarModal: function (mensaje) {
        $("#modalCheckinBody").html(mensaje);
        const modal = new bootstrap.Modal(document.getElementById('modalCheckin'));
        modal.show();
    },
    mostrarModal_v2: function (propiedades) {
        let mostrar = function (HTML) {
            $("#modal .modal-title").html(propiedades.titulo);
            $("#modal .modal-body").html(HTML);

            // Configuración del botón aceptar
            $("#modal-button-aceptar").off("click").removeAttr("onclick").hide();
            if (propiedades.funcionAceptar) {
                if (typeof propiedades.funcionAceptar === "function") {
                    $("#modal-button-aceptar").on("click", propiedades.funcionAceptar);
                } else {
                    $("#modal-button-aceptar").attr("onclick", propiedades.funcionAceptar);
                }
                $("#modal-button-aceptar").show();
            }

            $("#modal .modal-footer #botones-extras").html("");
            if (propiedades.botonesExtras) {
                for (var i in propiedades.botonesExtras) {
                    var html = '<button id="modal-button-' + i + '" type="button" onclick="' + propiedades.botonesExtras[i].click + '" class="btn btn-primary" data-bs-dismiss="modal">' + propiedades.botonesExtras[i].texto + '</button>'
                    $("#modal .modal-footer #botones-extras").append(html)
                }
            }

            $("#modal .modal-footer").show();
            if (propiedades.ocultarClose) {
                $("#modal .modal-footer").hide();
            }
            if (propiedades.funcionAntesMostrar) {
                propiedades.funcionAntesMostrar();
            }

            const modalElement = document.getElementById('modal');
            if (!modalElement) {
                console.error("El elemento con id 'modal' no existe en el DOM.");
                return;
            }
            const modal = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
            modal.show();

            // Clean up previous event listeners to avoid accumulation
            $('#modal').off('hidden.bs.modal');
            if (propiedades.funcionClose) {
                $('#modal').on('hidden.bs.modal', function () {
                    propiedades.funcionClose();
                })
            }
        };

        if (propiedades.pagina) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: ROOT_AJAX,
                data: propiedades,
                success: function (data) {
                    mostrar(data.HTML);
                },
                error: function (xhr, status, error) {
                    console.error("Error en mostrarModal_v2 AJAX:", error, xhr.responseText);
                    mostrar("<p class='text-danger'>Error al cargar el contenido del modal.</p><pre>" + xhr.responseText + "</pre>");
                }
            });
        } else if (propiedades.HTML) {
            mostrar(propiedades.HTML);
        } else {
            console.error("mostrarModal_v2 requiere 'pagina' o 'HTML' en propiedades");
            mostrar("<p>Error interno: No se proporcionó contenido para el modal.</p>");
        }
    },
    //Funciones para bloquear UI
    bloquearUI: function () {
        $.LoadingOverlay("show");
    },
    desbloquearUI: function () {
        $.LoadingOverlay("hide");
    }

}