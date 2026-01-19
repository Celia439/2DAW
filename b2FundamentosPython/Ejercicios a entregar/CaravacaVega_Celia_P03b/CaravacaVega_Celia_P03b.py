"""
P03b - Evaluación Python y NumPy
Alumno: [Celia Caravaca Vega]

"""


# ============================================
# EJERCICIO 1: ANÁLISIS DE VENTAS
# ============================================

print("="*50)
print("EJERCICIO 1: ANÁLISIS DE VENTAS")
print("="*50)

ventas = [15000, 18000, 22000, 17000, 25000, 30000, 28000, 32000, 27000, 29000, 35000, 40000]



#a) (3 puntos) Calcula el total de ventas del año usando una función apropiada.

from functools import reduce
totalVentas= sum(ventas)
print(f"Total de ventas de este año: {totalVentas}")



# b) (4 puntos) Crea una función calcular_estadisticas(lista) 
# que reciba la lista de ventas y devuelva una tupla con: (total, promedio, mes_mejor, mes_peor) 
# donde mes_mejor y mes_peor son los índices (0-11).

def calcular_estadisticas(lista):
    total= sum(ventas)
    promedio=reduce( lambda a ,b: b + a ,lista,0)/len(lista)
    mes_mejor= lista.index(max(lista))
    mes_peor=  lista.index(min(lista))
    return  (total,promedio,mes_mejor,mes_peor)

estadisticas=calcular_estadisticas(ventas)
print(f"Estadisticas:{estadisticas}")



#c) (4 puntos) Usa list comprehension para crear una nueva lista con las ventas que superaron el promedio. 
# Muestra el resultado con el formato: "Mes X: €Y".
ventasSobrePromedio=[i for i in ventas  if estadisticas[1]<i]
print("Ventas sobre el promedio: ")
for i in ventasSobrePromedio :
    print(f"Mes { ventas.index(i)+1}:€{i}")
    


#d) (4 puntos) Usa las funciones map() y filter() para:
# Aplicar un incremento del 15% a todas las ventas (simulando inflación)
ventas_inflacion= list(map(lambda a: round( a*1.15,2) ,ventas))
print(f"Ventas con un incremento del 15%:{ventas_inflacion} ")

# Filtrar solo los meses donde las ventas con incremento superan los 30.000€
# Muestra el resultado
meses_ventas_mas_30000=list(filter( lambda a: 30000<a,ventas))
print("meses donde las ventas superan los 30.000:")
for i in meses_ventas_mas_30000:
    print(f" {ventas.index(i)+1} ")



# ============================================
# EJERCICIO 2: GESTIÓN DE INVENTARIO
# ============================================

print("="*50)
print(" EJERCICIO 2: GESTIÓN DE INVENTARIO")
print("="*50)
# ... continúa con los demás ejercicios

import numpy as np
5

