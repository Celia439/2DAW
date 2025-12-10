from functools import reduce
# encapsular y divide y venceras haz funiomes mas chiquitas
def calcular_estadisticas(numeros):
    diccionario = {}
    # Calcular media 
    suma = reduce(lambda a, b: a + b, numeros, 0)
    media = suma / len(numeros)
    diccionario["media"] = media
    #Calcular mediana
    numeros.sort()
    n = len(numeros)
    centro = n // 2

    if n % 2 == 1:  
        mediana = numeros[centro]  
    else:  
        mediana = (numeros[centro - 1] + numeros[centro]) / 2
    diccionario["mediana"] = mediana
    # moda
    frecuencias = {}

    for num in numeros:
      frecuencias[num] = frecuencias.get(num, 0) + 1

    # El numero con mayor frecuencia:
    moda = max(frecuencias, key=frecuencias.get)
    diccionario["moda"] = moda

    # rango
    rango = max(numeros) - min(numeros)
    diccionario["rango"] = rango

    #varianza     varianza = promedio de (cada valor - media)^2
    varianza = reduce(lambda a, b: a + (b - media) ** 2, numeros, 0) / len(numeros)
    diccionario["varianza"] = varianza

    return diccionario

# Ejemplo de uso:
datos = [23, 45, 67, 45, 89, 12, 45, 34, 56, 78]
resultados = calcular_estadisticas(datos)
print(resultados)
# {'media': 49.4, 'mediana': 45, 'moda': 45, 'rango': 77, 'varianza': 512.84}