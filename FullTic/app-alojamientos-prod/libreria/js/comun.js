
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
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ROOT_AJAX,
            data: propiedades,
            beforeSend: function () {

            },
            success: function (data) {

                $(".modal-content .modal-title").html(propiedades.titulo);
                $(".modal-content .modal-body").html(data.HTML);
                $("#modal-button-aceptar").unbind("click");
                $("#modal-button-aceptar").hide();
                if (propiedades.funcionAceptar) {
                    $("#modal-button-aceptar").attr("onClick", propiedades.funcionAceptar)
                    $("#modal-button-aceptar").show();
                }

                $(".modal-footer #botones-extras").html("");
                if (propiedades.botonesExtras) {
                    for (var i in  propiedades.botonesExtras) {
                        var html = '<button id="modal-button-"' + i + ' type="button" onclick="' + propiedades.botonesExtras[i].click + '" class="btn btn-primary" data-dismiss="modal">' + propiedades.botonesExtras[i].texto + '</button>'
                        $(".modal-footer #botones-extras").append(html)
                    }
                }

                $(".modal-footer").show();
                if (propiedades.ocultarClose) {
                    $(".modal-footer").hide();
                }
                if (propiedades.funccionAntesMostrar) {
                    propiedades.funccionAntesMostrar();
                }

                $("#modal").modal();
                if (propiedades.funccionClose) {
                    $('#modal').on('hidden.bs.modal', function () {
                        propiedades.funccionClose();
                    })
                }

//                $("#modal").on("hidden.bs.modal", function () {
//                    $("#botones-extras").html("");
//                    $(".modal-body").html("");
//                    if (!data)
//                        return e.preventDefault() // stops modal from being shown
//                });
            }
        })
    },
    //Funciones para bloquear UI
    bloquearUI: function () {
        $.LoadingOverlay("show");
    },
    desbloquearUI: function () {
        $.LoadingOverlay("hide");
    }

}