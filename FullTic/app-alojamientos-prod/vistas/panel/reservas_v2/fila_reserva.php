<tr>
    <td><?php echo $reserva["id"] ?></td>
    <td><?php echo $reserva["num_reserva"] ?></td>
    <td><?php echo $reserva["canal"] ?></td>
    <td><?php echo $reserva["total_huespedes"] ?></td>
    <td><?php echo (new DateTime($reserva["fecha_entrada"]))->format("d/m/Y") ?></td>
    <td><?php echo $reserva["fecha_salida"] ?></td>
    <td><?php echo $reserva["importe_bruto"] ?></td>
    <td><?php echo $reserva["descuento"] ?></td>
    <td><?php echo $reserva["comision"] ?></td>
    <td><?php echo number_format($reserva["importe_final"], 2,",",".")  ?></td>
    <td><button class="btn btn-outline-danger delete"><font dir="auto" style="vertical-align: inherit;"><font dir="auto" style="vertical-align: inherit;">Eliminar</font></font></button></td>
    <td><button class="btn btn-outline-primary update">Editar</button></td>
</tr>