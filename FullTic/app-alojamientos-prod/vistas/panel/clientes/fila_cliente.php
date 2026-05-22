<tr class="fila-cliente" data-id="<?php echo $cliente['id'] ?>">
    <td><?php echo $cliente["id"] ?></td>
    <td><?php echo $cliente["nombre"] ?> <?php echo $cliente["primer_apellido"] ?> <?php echo $cliente["segundo_apellido"] ?></td>
    <td>
        <?php
        $tipoDocMap = ["D" => "DNI", "N" => "NIE", "P" => "Pasaporte"];
        echo !empty($cliente["tipo_documentacion"]) ? ($tipoDocMap[$cliente["tipo_documentacion"]] ?? $cliente["tipo_documentacion"]) : "-";
        ?>
    </td>
    <td><?php echo $cliente["telefono_fijo"] ?></td>
    <td><?php echo $cliente["telefono_movil"] ?></td>
    <td><?php echo $cliente["correo"] ?></td>
    <td>
        <a href="<?= PANEL_URL ?>clientes/formulario?id=<?= $cliente['id'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
        <button class="btn btn-sm btn-outline-danger delete deleteCliente">Eliminar</button>
    </td>
</tr>
<tr id="detalle-cliente-<?php echo $cliente['id']; ?>" style="display:none">
    <td colspan="7" class="p-0">
        <div class="p-3 bg-light border-top">
            <div class="row g-3 small text-muted">
                <div class="col-md-3"><strong>Sexo:</strong> <?php echo $cliente["sexo"] ?: "-" ?></div>
                <div class="col-md-3"><strong>Documento:</strong> <?php echo $cliente["numero_documento_identidad"] ?: "-" ?></div>
                <div class="col-md-3"><strong>Soporte:</strong> <?php echo $cliente["numero_soporte_documento"] ?: "-" ?></div>
                <div class="col-md-3"><strong>Nacionalidad:</strong> <?php echo $cliente["nacionalidad_id"] ?: "-" ?></div>
                <div class="col-md-3"><strong>Nacimiento:</strong> <?php echo !empty($cliente["fecha_nacimiento"]) ? (new DateTime($cliente["fecha_nacimiento"]))->format("d/m/Y") : "-" ?></div>
                <div class="col-md-3"><strong>Menores:</strong> <?php echo $cliente["menores_de_edad"] ?: "-" ?></div>
                <div class="col-md-3"><strong>País:</strong> <?php echo $cliente["pais"] ?: "-" ?></div>
                <div class="col-md-3"><strong>Provincia:</strong> <?php echo $cliente["provinciaN"] ?: "-" ?></div>
                <div class="col-md-3"><strong>Localidad:</strong> <?php echo $cliente["localidadN"] ?: "-" ?></div>
                <div class="col-md-3"><strong>Dirección:</strong> <?php echo $cliente["direccion"] ?: "-" ?></div>
                <div class="col-md-3"><strong>CP:</strong> <?php echo $cliente["codigo_postal"] ?: "-" ?></div>
                <div class="col-md-3"><strong>Registro:</strong> <?php echo !empty($cliente["created_at"]) ? (new DateTime($cliente["created_at"]))->format("d/m/Y") : "-" ?></div>
            </div>
        </div>
    </td>
</tr>
