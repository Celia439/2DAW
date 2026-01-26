# Puedes ejecutar este archivo completo o línea por línea

import numpy as np

# Crear array
print("=== Creando array ===")
arr = np.array([1, 2, 3, 4, 5])
print(f"Array: {arr}")

# Operaciones
print("\n=== Operaciones ===")
print(f"Cuadrados: {arr ** 2}")
print(f"Media: {np.mean(arr)}")

# Filtrado
print("\n=== Filtrado ===")
mayores_3 = arr[arr > 3]
print(f"Mayores que 3: {mayores_3}")

# Para ejecutar:
# 1. Todo el archivo: F5 o "Run Python File"
# 2. Lneas especficas: Seleccionar + Shift+Enter

# Selecciona estas líneas y presiona Shift+Enter
# Se ejecutarn en una terminal Python interactiva
# si quieres volver a usar el modo interactivo escribe python en la terminal