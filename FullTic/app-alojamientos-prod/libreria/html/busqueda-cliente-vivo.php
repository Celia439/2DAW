<div class="form-group">
    <label>Buscar por Nombre, Apellido, Email o Tlf</label>
    <input id="cliente-vivo-texto" title="Busqueda Vivo" placeholder="Nombre, Apellido, Email o Tlf" type="text" class="form-control" onkeyup="clienteEnVivo.listar(this.value)" value="<?php echo $seleccionado ?>">
    <button style="display: none" id="vaciar-cliente-vivo" type="button" class="btn btn-danger" onclick="clienteEnVivo.desbloquearCampo()">Vaciar Cliente</button>
</div>
<input type="hidden" name="id_cliente" id="id-cliente-vivo" value="<?php echo $parametros->idClienteMarcado ?>">
<div id="content-busqueda-cliente-vivo"></div>


<script type="text/javascript">
    var clienteEnVivo = {
        listar: function(busqueda) {
            if ($("#cliente-vivo-texto").val()) {
                if ($("#cliente-vivo-texto").val().length > 4) {
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: ROOT_AJAX,
                        data: {
                            pagina: "libreria/php/listar-cliente-vivo.php",
                            busqueda: busqueda
                        },
                        beforeSend: function() {
                            $("#content-busqueda-cliente-vivo").html("<li class='list-group-item'>Cargando...</li>");
                        },
                        success: function(data) {
                            $("#content-busqueda-cliente-vivo").html(data.HTML);
                            $("#content-busqueda-cliente-vivo").show();
                        }
                    })
                }
            } else {
                $("#content-busqueda-cliente-vivo").hide();
            }
        },
        setCliente: function(ID, nombre) {
            $("#id-cliente-vivo").val(ID);
            $("#content-busqueda-cliente-vivo").html("");
            $("#cliente-vivo-texto").val(nombre);
            clienteEnVivo.bloquearCampo()
        },
        bloquearCampo: function() {
            $("#cliente-vivo-texto").attr("disabled", true);
            $("#vaciar-cliente-vivo").show();
            $("#content-busqueda-cliente-vivo").hide();
        },
        desbloquearCampo: function() {
            $("#vaciar-cliente-vivo").hide();
            $("#cliente-vivo-texto").val("");
            $("#id-cliente-vivo").val("");
            $("#cliente-vivo-texto").removeAttr("disabled");
            $("#content-busqueda-cliente-vivo").hide();
        }

    }

    $(document).ready(function() {
        <?php if ($seleccionado) { ?>
            clienteEnVivo.bloquearCampo()
        <?php } ?>
    })
</script>