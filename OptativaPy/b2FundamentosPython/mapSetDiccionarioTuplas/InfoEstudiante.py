# 1. Crear un diccionario con los datos del estudiante
estudiante = {
    "nombre": "Elena Castillo",
    "edad": 22,
    "nota_media": 8.7,  # Nota inicial
    "asignaturas": ["Sistema informaticos", "Lenguaje de marcas", "Programación Avanzada"]
}

print("--- Diccionario Inicial ---")
print(estudiante)

# 2. Añadir una nueva asignatura y añadir update()
estudiante["asignaturas"].append("Inteligencia Artificial")

# 3. Incrementar la nota_media en 0.5
estudiante["nota_media"] += 0.5
# del borrar clear limpiarlo por completo key y values como el map items conjunto
# 4. Imprimir solo el nombre y la nota_media
print("\n--- Resultado Final ---")
print(f"Nombre: {estudiante['nombre']}")
print(f"Nueva Nota Media: {estudiante['nota_media']}")

print("\n--- Diccionario Modificado Completo (Para verificación) ---")
print(estudiante)