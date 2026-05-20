<li class="list-group-item list-group-item-action mb-4 " 
    data-name="<?php echo $fila["nombre"] . " " . $fila["primer_apellido"] . " " . $fila["segundo_apellido"]; ?>" 
    id="busqueda-<?php echo $fila["id"] ?>" 
    onclick='clienteEnVivo.setCliente(<?php echo $fila["id"] ?>,"<?php echo $fila["nombre"] . " " . $fila["primer_apellido"] ?>")'>
    <strong><?php echo "[" . strtoupper($fila["numero_documento_identidad"]) . "] " . $fila["nombre"] . " " . $fila["primer_apellido"]; ?></strong>
    <?php echo " · " . $fila["correo"] . " · " . $fila["telefono_movil"] ?>
</li>
