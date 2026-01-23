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

productos = {
    "laptop": {"precio": 850, "stock": 15, "categoria": "informatica"},
    "raton": {"precio": 25, "stock": 50, "categoria": "informatica"},
    "teclado": {"precio": 45, "stock": 30, "categoria": "informatica"},
    "monitor": {"precio": 200, "stock": 20, "categoria": "informatica"},
    "silla": {"precio": 150, "stock": 10, "categoria": "mobiliario"},
    "mesa": {"precio": 300, "stock": 5, "categoria": "mobiliario"}
}

#a) (3 puntos) Crea una función valor_total_inventario(productos) que calcule el valor total del inventario (precio × stock de todos los productos).

def valor_total_inventario(productos):
    total= [ i["precio"]*i["stock"] for i in productos.values() ]
    return total


print(valor_total_inventario(productos))


#b) (4 puntos) Crea una función productos_por_categoria(productos, categoria) que devuelva un nuevo diccionario solo con los productos de esa categoría.

def productos_por_categoria(productos, categoria):
    productos_categoria= {
      nombre:datos
      for nombre ,datos in productos.items()
        if datos["categoria"] == categoria
    }
    return productos_categoria
print(productos_por_categoria(productos,"mobiliario"))


#c) 4 puntos) Usa dict comprehension para crear un nuevo diccionario llamado productos_bajo_stock que contenga solo los productos con stock menor a 20 unidades. El formato debe ser: {nombre: stock}.

productos_bajo_stock={
        nombre:dato["stock"]
        for nombre,dato in productos.items() 
        if dato["stock"]<20
    }   
print(productos_bajo_stock)


#d) (4 puntos) Implementa una función actualizar_precios(productos, porcentaje) que:
def actualizar_precios(productos, porcentaje):
    productos_mayor_200 = []

    for nombre, datos in productos.items():
        # modificar el precio original
        datos["precio"] = datos["precio"] * (1 + porcentaje / 100)

        # comprobar si supera 200
        if datos["precio"] > 200:
            productos_mayor_200.append(nombre)

    return productos_mayor_200

productos_mayor_200 =actualizar_precios(productos,15)
print(productos)
print(productos_mayor_200)

# ============================================
# Ejercicio 3: Procesamiento de datos con NumPy
# ============================================

print("="*50)
print(" Ejercicio 3: Procesamiento de datos con NumPy")
print("="*50)
import numpy as np

# Datos de sensores: 5 sensores, 7 días de mediciones
# Cada fila es un sensor, cada columna un día
np.random.seed(42)
temperaturas = np.random.uniform(15, 35, size=(5, 7))