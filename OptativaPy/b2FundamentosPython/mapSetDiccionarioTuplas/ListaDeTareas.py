tareas_pendientes = [
    "Comprar leche",
    "Pagar facturas",
    "Enviar correo electrónico a Juan",
    "Preparar presentación",
    "Llamar al médico"
]

print("--- Lista inicial (5 tareas) ---")
print(tareas_pendientes)

# 2. Añadir una tarea más
nueva_tarea = "Ir al gimnasio"
tareas_pendientes.append(nueva_tarea)

print("\n--- Después de añadir 1 tarea más ---")
print(tareas_pendientes)

# 3. Eliminar la primera tarea
# En Python, el índice de la primera tarea es 0.
if tareas_pendientes:
    tarea_eliminada = tareas_pendientes.pop(0) # pop(0) elimina el elemento en la posición 0
    print(f"\n--- Tarea eliminada: '{tarea_eliminada}' ---")
else:
    print("\n--- No se pudo eliminar la tarea: la lista está vacía. ---")


# 4. Muestra la lista resultante
print("\n--- Lista resultante (código final) ---")
print(tareas_pendientes)