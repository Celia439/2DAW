temperaturas = [18, 22, 19, 25, 30, 17, 28, 24]
print(f"Lista original de temperaturas: {temperaturas}\n")

# 1. Obtén solo las temperaturas mayores a 20
temperaturas_altas = [] 
for temp in temperaturas :
    if temp > 20:
        temperaturas_altas.append(temp)

print("1. Temperaturas mayores a 20°C:")
print(temperaturas_altas)

# 2. Crea un diccionario donde la clave sea el índice y el valor la temperatura
# Utilizamos la función *enumerate()* dentro de una *comprensión de diccionario* (dictionary comprehension).
diccionario_temperaturas = {}
indice=0
for t in temperaturas:
    diccionario_temperaturas[indice]=t
    indice+1
print("2. Diccionario {índice: temperatura}:")
print(diccionario_temperaturas)
print("-" * 30)

# 3. Usa slicing para obtener las 3 primeras temperaturas
# El slicing [0:3] o simplemente [:3] selecciona elementos desde el índice 0 hasta *antes* del índice 3.
primeras_tres = temperaturas[:3]

print("3. Las 3 primeras temperaturas (usando slicing):")
print(primeras_tres)