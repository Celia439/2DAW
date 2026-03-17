<tr>

    <td>
        <?php echo $reserva["id"] ?>
    </td>
    <td>
        <?php echo $reserva["canal"] ?>
    </td>
    <td>
        <?php echo $reserva["total_huespedes"] ?>
    </td>
    <td>
        <?php echo (new DateTime($reserva["fecha_entrada"]))->format("d/m/Y") ?>
    </td>
    <td>
        <?php echo (new DateTime($reserva["fecha_salida"]))->format("d/m/Y") ?>
    </td>
    <td>
        <?php echo number_format($reserva["importe_bruto"], 2) ?>
    </td>
    <td>
        <?php echo $reserva["descuento"] ?>
        %
    </td>
    <td>
        <?php echo $reserva["comision"] ?>
        %
    </td>
    <td>
        <?php echo number_format($reserva["importe_final"], 2, ",", ".") ?>
    </td>
    <td>
        <?php echo $reserva["num_reserva"] ?>
    </td>
    <td><button class="btn btn-outline-danger delete borrarReserva">Eliminar</button></td>
    <td><button class="btn btn-outline-primary update">Editar</button></td>

</tr>