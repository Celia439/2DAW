# Dada esta lista de ventas diarias:
ventas = [150, 200, 175, 300, 250, 180, 220]

# Usa reduce() para:
from functools import reduce
# 1. Calcular el total de ventas
totalVentas= reduce( lambda a,b : a+b  ,ventas,0)
print(totalVentas)
# 2. Encontrar la venta máxima (sin usar max())
ventaMax=reduce(lambda a , b : a if a > b else b,ventas)
print(ventaMax)

# 3. Calcular el promedio (combina reduce con len())
promedio=reduce( lambda a ,b: b + a ,ventas,0)/len(ventas)
print(promedio)
