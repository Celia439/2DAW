import numpy as np

# a) Crear arrays
a = np.array([1, 2, 3, 4, 5])
b = np.array([10, 20, 30, 40, 50])

# b) Operaciones elemento a elemento
print(f"Suma: {a + b}")
print(f"Resta: {a - b}")
print(f"Multiplicación: {a * b}")
print(f"División: {a / b}")
print(f"Modulo a: {a **2 }")
print(f"Modulo b: {b ** 2}")

# c) Multiplicar por escalar 10
print(f"Multiplicacion por escalar a: {a * 10}")

# d) Sumar escalar
print(f"Sumar por escalar b: {b + 100}")

# e) Raíz cuadrada
print(f"Raiz cuadrada por escalar b: {np.sqrt(b)}")

