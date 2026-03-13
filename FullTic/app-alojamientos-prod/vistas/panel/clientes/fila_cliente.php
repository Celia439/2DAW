<tr>
    <td><?php echo $cliente["id"] ?></td>
    <td><?php echo (new DateTime($cliente["created_at"]))->format("d/m/Y") ?></td>
    <td><?php echo $cliente["nombre"] ?></td>
    <td><?php echo $cliente["primer_apellido"] ?></td>
    <td><?php echo $cliente["segundo_apellido"] ?></td>
    <td><?php echo $cliente["sexo"] ?></td>
    <td><?php echo $cliente["numero_documento_identidad"] ?></td>
    <td><?php echo $cliente["tipo_documentacion"] ?></td>
    <td><?php echo $cliente["numero_soporte_documento"] ?></td>
    <td><?php echo $cliente["nacionalidad_id"] ?></td>
    <td><?php echo $cliente["fecha_nacimiento"] ?></td>
    <td><?php echo $cliente["telefono_fijo"] ?></td>
    <td><?php echo $cliente["telefono_movil"] ?></td>
    <td><?php echo $cliente["correo"] ?></td>
    <td><?php echo $cliente["menores_de_edad"] ?></td>
    <td><?php echo $cliente["pais"] ?></td>
    <td><?php echo $cliente["provincia"] ?></td>
    <td><?php echo $cliente["localidad"] ?></td>
    <td><?php echo $cliente["direccion"] ?></td>
    <td><?php echo $cliente["codigo_postal"] ?></td>
    <td><button class="btn btn-outline-danger delete">Eliminar</button></td>
    <td><button class="btn btn-outline-primary update">Editar</button></td>
</tr>