console.log("JS reservas Cargado");

var reservas = {
  eventosInicio: function () {
    $("#modalCheckin").on("hidden.bs.modal", function () {
      document.activeElement.blur();
    });
    //Evento para cargar casas
    $(document).on("shown.bs.modal", function (e) {
      // Comprobamos que el elemento instanciado sea el modal genérico Y además contenga nuestro formulario de reservas
      if (
        e.target.id !== "modal" ||
        $(e.target).find("#formReservaModal").length === 0
      )
        return;
      console.log("ok");
      $.ajax({
        url: ROOT_AJAX,
        type: "POST",
        dataType: "json",
        data: {
          pagina: "libreria/php/comunAjax.php",
          action: "casas",
        },
        success: function (data) {
          console.log("Respuesta de AJAX:", data);
          let html =
            '<option value="" disabled selected>Elija una casa</option>';

          if (data.casas) {
            data.casas.forEach((m) => {
              html += `<option value="${m.id}">${m.nombre}</option>`;
            });
          }

          $("select[id='casa']").html(html);

          // Si hay una casa preseleccionada (modo edición), la marcamos
          let casaSeleccionada = $("#casa-seleccionada").val();
          if (casaSeleccionada) {
            $("select[id='casa']").val(casaSeleccionada);
          }
        },
        error: function (xhr, status, error) {
          console.error("Error en AJAX casas:", error);
          console.log("Respuesta:", xhr.responseText);
        },
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
    console.log(
      "Validación del form " + idForm + ":",
      esValido ? "VÁLIDO" : "INVÁLIDO",
    );
    return esValido;
  },
  // Actualiza el pie de la tabla con los datos del resumen
  actualizarResumen: function (resumen) {
    if (!resumen) return;
    $("#total_huespedes_resumen").text(resumen.total_huespedes);
    $("#total_bruto_resumen").text(resumen.total_bruto + "€");
    $("#total_descuento_resumen").text(resumen.total_descuento + "%");
    $("#total_comision_resumen").text(resumen.total_comision + "%");
    $("#total_final_resumen").text(resumen.total_final + "€");
  },
  ActualizaPaginador: function (pagina, totalPaginas) {
    $(".page-item").removeClass("active");
    $(`.page-link[data-p='${pagina}']`).parent().addClass("active");
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
  cargarReservas: function (pagina) {
    let numero = $("#numeroF").val();
    let anio = $("#anioF").val();
    let desde = $("#desdeF").val();
    let hasta = $("#hastaF").val();
    $.ajax({
      url: ROOT_AJAX,
      type: "POST",
      dataType: "json",
      data: {
        pagina: "controladores/panel/reservas/index.php",
        modelo: "modelos/panel/reservas/index.php",
        action: "listar",
        p: pagina,
        numero: numero,
        anio: anio,
        desde: desde,
        hasta: hasta
      },
      beforeSend: function () {
        comun.bloquearUI();
      },
      success: function (respuesta) {
        $("#tablaReservas tbody").html(respuesta.HTML);
        if (respuesta.resumenHTML) {
          $("#tablaReservas tfoot").html(respuesta.resumenHTML);
        }
        if (respuesta.paginadorHTML) {
          $("#paginadorReservas").replaceWith(respuesta.paginadorHTML);
        }
        reservas.paginaActual = respuesta.pagina;
        reservas.totalPaginas = respuesta.totalPaginas;
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
      if ($boton.parent().attr('id') === 'btnAnterior') {
        pagina = reservas.paginaActual - 1;
      } else if ($boton.parent().attr('id') === 'btnSiguiente') {
        pagina = reservas.paginaActual + 1;
      }
      if (pagina < 1 || pagina > reservas.totalPaginas) return;
      reservas.cargarReservas(pagina);
    });
  },
  RellenarTabla: function (r) {
    //vaciar el tbody
    $("#tablaReservas tbody").empty();

    //rellenar la tabla
    r.forEach((res) => {
      // Formatear fechas de YYYY-MM-DD a DD/MM/YYYY
      let fEntrada = res.fecha_entrada
        ? res.fecha_entrada.split("-").reverse().join("/")
        : "";
      let fSalida = res.fecha_salida
        ? res.fecha_salida.split("-").reverse().join("/")
        : "";

      let fila = `
                             <tr>
                                <td>${res.id}</td>
                                <td>${res.num_reserva}</td>
                                <td>${res.canal}</td>
                                <td>${res.total_huespedes}</td>
                                <td>${fEntrada}</td>
                                <td>${fSalida}</td>
                                <td>${res.importe_bruto}€</td>
                                <td>${res.descuento}%</td>
                                <td>${res.comision}%</td>
                                <td>${res.importe_final}€</td>
                                <td><button class="btn btn-outline-info btn-sm copiar-link" data-url="${res.url_checkin || ''}" title="Copiar link de check-in">Link</button></td>
                                <td><button class="btn btn-outline-danger borrarReserva">Eliminar</button></td>
                                <td><button class="btn btn-outline-primary editarReserva">Editar</button></td>
                                <td><button class="btn btn-outline-success factura facturaReserva">Generar factura</button></td>
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
          hasta: hasta,
        },
        beforeSend: function () {
          comun.bloquearUI();
        },
        success: function (respuesta) {
          //Actualizar la tabla
          reservas.RellenarTabla(respuesta.registros || []);
          //Actualizar resumen
          reservas.actualizarResumen(respuesta.resumen);
        },
        error: function () {
          //mandar un mensaje con modalv2
        },
        complete: function () {
          comun.desbloquearUI();
        },
      });
    });
    //Limpiar los filtros
    $(document).on("click", "#resetF", function () {
      $.ajax({
        url: ROOT_AJAX,
        type: "POST",
        dataType: "json",
        data: {
          pagina: "controladores/panel/reservas/filtros.php",
          modelo: "modelos/panel/reservas/index.php",
        },
        beforeSend: function () {
          comun.bloquearUI();
        },
        success: function (respuesta) {
          //Actualizar la tabla
          reservas.RellenarTabla(respuesta.registros || []);
          //Actualizar resumen
          reservas.actualizarResumen(respuesta.resumen);
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

      console.log("Generando factura... " + idReserva);

      $.ajax({
        url: ROOT_AJAX,
        type: "POST",
        dataType: "json",
        data: {
          pagina: "controladores/panel/reservas/facturaReservas.php",
          modelo: "modelos/panel/reservas/index.php",
          id: idReserva,
        },
        beforeSend: function () {
          comun.bloquearUI();
        },
        success: function (respuesta) {
          if (respuesta.ok === true) {
            comun.mostrarAlerta(
              "Factura con id " +
                respuesta.registro.id +
                " realizada correctamente",
              "success",
            );
          } else {
            comun.mostrarAlerta(
              "Error: " + (respuesta.error || "Datos inválidos enviados"),
              "danger",
            );
          }
        },
        error: function (xhr, status, error) {
          console.error("ERROR EN AJAX:", xhr.responseText);
          comun.mostrarAlerta(
            "Error de conexión al generar la factura",
            "danger",
          );
        },
        complete: function () {
          comun.desbloquearUI();
        },
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
    $(document)
      .off("submit", "#formReservaModal")
      .on("submit", "#formReservaModal", function (event) {
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
            action: action,
          },
          beforeSend: function () {
            comun.bloquearUI();
          },
          success: function (respuesta) {
            if (respuesta.ok === true) {
              comun.mostrarAlerta(
                action === "insert"
                  ? "Reserva añadida correctamente"
                  : "Reserva actualizada correctamente",
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

              // Actualizar tabla, paginador y resumen
              if (respuesta.HTML) {
                $("#tablaReservas tbody").html(respuesta.HTML);
              }
              if (respuesta.resumenHTML) {
                $("#tablaReservas tfoot").html(respuesta.resumenHTML);
              }
              if (respuesta.paginadorHTML) {
                $("#paginadorReservas").replaceWith(respuesta.paginadorHTML);
              }
            } else {
              comun.mostrarAlerta(
                "Error: " + (respuesta.error || "Datos inválidos enviados"),
                "danger",
              );
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
    $(document).on("click", ".editarReserva", function (event) {
      let tr = event.currentTarget.closest("tr");
      let idReserva = $(tr).find("td:first").text().trim();

      comun.mostrarModal_v2({
        pagina: "controladores/panel/reservas/formModal.php",
        modelo: "modelos/panel/reservas/index.php",
        titulo: "Editar reserva",
        id: idReserva,
      });
    });
  },
  eventoCopiarLink: function () {
    $(document).on("click", ".copiar-link", function () {
      let url = $(this).data("url");
      if (url) {
        if (navigator.clipboard && navigator.clipboard.writeText) {
          navigator.clipboard.writeText(url).then(function () {
            comun.mostrarAlerta("Link copiado al portapapeles", "success");
          }, function () {
            comun.mostrarAlerta("No se pudo copiar el link", "warning");
          });
        } else {
          // Fallback para navegadores antiguos
          let $temp = $("<input>");
          $("body").append($temp);
          $temp.val(url).select();
          document.execCommand("copy");
          $temp.remove();
          comun.mostrarAlerta("Link copiado al portapapeles", "success");
        }
      }
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
              action: "delete",
            },
            beforeSend: function () {
              comun.bloquearUI();
            },
            success: function (data) {
              const modalEl = document.getElementById("modal");
              const modal = bootstrap.Modal.getInstance(modalEl);
              if (modal) modal.hide();

              if (data.HTMLtabla) {
                $("#tablaReservas tbody").html(data.HTMLtabla);
              }
              if (data.resumenHTML) {
                $("#tablaReservas tfoot").html(data.resumenHTML);
              }
              if (data.paginadorHTML) {
                $("#paginadorReservas").replaceWith(data.paginadorHTML);
              }
              comun.mostrarAlerta("Reserva eliminada correctamente", "success");
            },
            error: function (xhr, status, error) {
              console.error("ERROR EN AJAX:", error);
              comun.mostrarAlerta("Error al eliminar la reserva", "danger");
            },
            complete: function () {
              comun.desbloquearUI();
            },
          });
        },
      });
    });
  },
};

$(document).ready(function () {
  console.log("Document ready - Registrando eventos");
  reservas.eventosInicio();
  reservas.eventosPaginador();
  reservas.eventoFiltrar();
  reservas.eventoEnviar();
  reservas.eventoEditar();
  reservas.eventoFactura();
  reservas.eventoCopiarLink();
  reservas.eventoEliminar();
});
