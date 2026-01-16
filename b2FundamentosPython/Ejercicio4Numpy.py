import numpy as np

ventas = np.array([
    [1000, 1200, 1100, 1300],
    [900, 1000, 950, 1050],
    [1500, 1600, 1550, 1700]
])

# a) Shape de la matriz
print(f"Shape/forma de la matriz{ventas.shape}")

# b) Obtén las ventas de la Tienda 2 (fila 1, índice 1).
print(f"Ventas de la tienda 2: {ventas[1:]}")

# c) c) Obtén las ventas del Trimestre 3 de todas las tiendas (columna 2).
print(f"Ventas de tercer trimestre de toda tienda: {ventas[:3]}")

# d) Calcula el total de ventas por tienda (suma por filas, axis=1).
print(f"Total venta por tienda: {np.sum(ventas,axis=1)}")

# e) Total por trimestre (suma por columnas)
print(f"Total venta por trimestre: {np.sum(ventas,axis=0)}")

# f) Media por tienda
print(f"Media venta por tienda: {np.mean(ventas,axis=1)}")

# g) Tienda con mayores ventas
print(f"Tienda mayor venta: {np.argmax(np.sum(ventas,axis=1))}")

# h) Trimestre con menores ventas
print(f"Trimestre menor venta: {np.argmin(np.sum(ventas,axis=0))}")

