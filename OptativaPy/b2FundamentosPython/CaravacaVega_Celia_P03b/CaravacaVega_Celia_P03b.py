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

#a) (3 puntos) Crea un array NumPy con los datos y muestra:

# Datos de sensores: 5 sensores, 7 días de mediciones
# Cada fila es un sensor, cada columna un día
np.random.seed(42)
temperaturas = np.random.uniform(15, 35, size=(5, 7))


# La forma (shape) del array 

print(f"Forma de la matriz temperaturas: {temperaturas.shape}")

# La temperatura media global

print(f"Temperatura global: {np.mean(temperaturas)}")

# La temperatura máxima y mínima registradas

print(f"Temperatura máxima: {np.max(temperaturas)}")
print(f"Temperatura minima: {np.min(temperaturas)}")


# b) (4 puntos) Calcula y muestra:

# La temperatura media de cada sensor (promedio por fila)

print(f"Temperatura media de cada sensor: {np.mean(temperaturas,axis=1)}")

# La temperatura media de cada día (promedio por columna)

print(f"Temperatura media de cada día: {np.mean(temperaturas,axis=0)}")

# El sensor con mayor temperatura promedio (índice) 

print(f"Sensor con mayor temperatura promedio(indice): {np.argmax(np.mean(temperaturas,axis=1)) }")

# c) (5 puntos) Crea una máscara booleana para identificar:

# Temperaturas superiores a 28°C

masck=temperaturas>28

# Reemplaza esas temperaturas por exactamente 28 (simula un límite de seguridad)

temperaturas[masck]=28

# Muestra cuántas temperaturas fueron ajustadas

print("Cantidad de temperaturas ajustadas:", np.sum(masck))

# d) (4 puntos) Normaliza los datos usando la fórmula Min-Max: 
# temperatura_normalizada = (temperatura - min) / (max - min)

#Los valores deben quedar entre 0 y 1

min_tmp=np.min(temperaturas)
max_tmp=np.max(temperaturas)
temperaturas_normalizadas= ((temperaturas-min_tmp)/(max_tmp-min_tmp))

# Muestra las primeras 3 filas normalizadas

print(temperaturas_normalizadas[:3])

#e) (4 puntos) Usa broadcasting para: Crear un array de "alertas" (bonos) de [10, 20, 15, 25, 18] € por sensor 
alertas=np.array([10, 20, 15, 25, 18])
# Sumar estas alertas a CADA DÍA de medición de cada sensor

suma_alertas=temperaturas+alertas.reshape(5,1)

# Mostrar el array resultante (shape debe seguir siendo 5x7)

print(suma_alertas.shape)


# ============================================
# Ejercicio 4: Análisis de estudiantes 
# ============================================

print("="*50)
print(" Ejercicio 4: Análisis de estudiantes ")
print("="*50)

# Calificaciones: 20 estudiantes, 5 asignaturas
# Filas = estudiantes, Columnas = asignaturas
np.random.seed(123)
calificaciones = np.random.uniform(4, 10, size=(20, 5))
calificaciones = np.round(calificaciones, 1)

asignaturas = ["Matemáticas", "Física", "Programación", "Inglés", "Historia"]

 #a) (4 puntos) Crea una función estudiantes_aprobados(calificaciones, nota_minima=5.0) que:
def estudiantes_aprobados(calificaciones, nota_minima=5.0):
    # Devuelva un array booleano indicando qué estudiantes aprobaron TODAS las asignaturas
    masck=np.all( calificaciones>nota_minima ,axis=1)
    # Muestre cuántos estudiantes aprobaron todo
    print(f"Número de estudiantes aprobados: {np.sum(masck)}")
    # Devuelva los índices de esos estudiantes
    print(f"indice de los estudiantes: {np.where(masck)}")
estudiantes_aprobados(calificaciones,5)
 # b) (5 puntos) Calcula y muestra: 
    # La nota media de cada asignatura
nota_media_porAsignatura=np.mean(calificaciones,axis=0)
print(f"Nota media de cada asignatura: {nota_media_porAsignatura}")
    # La asignatura con mejor nota media (usa np.argmax y el array de nombres)
asignatura_mejor_media=np.argmax(nota_media_porAsignatura)
print(f"Asignatura con mejor nota media: {asignaturas[ asignatura_mejor_media]}")
    # La asignatura con peor nota media
asignatura_peor_media=np.argmin(nota_media_porAsignatura)
print(f"Asignatura con peor nota media: {asignaturas[ asignatura_peor_media]}")

    # La desviación estándar de cada asignatura (indica cuál tiene más variabilidad)  
desviacion=desv_std = np.std(calificaciones, axis=0) 
print(f"Desviación de cada asignatura: { desviacion}")
print(f"Mayor desviación : { asignaturas[np.argmax(desviacion)]}")

 # c) (5 puntos) Crea un sistema de clasificación:
 
    # Excelente: nota media ≥ 9
    # Notable: 7 ≤ nota media < 9
    # Bien: 6 ≤ nota media < 7
    # Aprobado: 5 ≤ nota media < 6
    # Suspenso: nota media < 5
    # Usa np.where o máscaras booleanas para crear un array con la clasificación de cada estudiante según su nota media.
media_alumnos=np.mean(calificaciones,axis=1)
clasificacion=np.where(
    media_alumnos>=9,
    "Excelente",
    np.where(
        (media_alumnos<9) &(media_alumnos>=7),
        "Notable",np.where(
            (media_alumnos<7)&(media_alumnos>=6),
            "Bien",np.where(
                (media_alumnos<6)&(media_alumnos>=5),
                "Aprobado",np.where(
                    media_alumnos<5,
                    "Suspenso","Error")) )) )
print(clasificacion)


 # d) (6 puntos) Análisis avanzado:
 
    # Encuentra el estudiante con mayor nota en cada asignatura (5 estudiantes, pueden repetirse)
mejor_estudiante_por_asignatura= np.argmax(calificaciones,axis=0)
print(f"Indice de los mejores estudiantes por asignaturas: {mejor_estudiante_por_asignatura}")
 
    # Crea una "matriz de diferencias" que muestre la diferencia de cada estudiante respecto a la media de cada asignatura (resta la media de cada columna)
matriz_de_diferencias=calificaciones-nota_media_porAsignatura
print(f"Matriz de diferencias de estudiante respecto a la media de cada asignatura: {matriz_de_diferencias}")
 
    # Identifica qué estudiante tiene la mayor desviación positiva total (suma de todas sus diferencias positivas)
diferencias_positivas = np.where(matriz_de_diferencias > 0, matriz_de_diferencias, 0)
suma_positivas_por_estudiante = np.sum(diferencias_positivas, axis=1)
mejor_estudiante = np.argmax(suma_positivas_por_estudiante)
print(f"Estudiante que tiene la mayor desviacion positiva total: {mejor_estudiante}")