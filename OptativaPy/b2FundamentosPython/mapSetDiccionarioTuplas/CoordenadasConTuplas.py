# 1. Crea una tupla con las coordenadas (latitud, longitud) de Madrid
coordenadas_madrid = (40.4168, -3.7038)

print(f"Coordenadas originales: {coordenadas_madrid}")
print(f"Tipo de dato: {type(coordenadas_madrid)}\n")

# 2. Intenta modificar uno de los valores (observa el error)
# error de inmutabilidad (TypeError)

# coordenadas_madrid[0] = 41.0 

# El error que obtendrías sería:
# TypeError: 'tuple' object does not support item assignment

print("confirmando que las tuplas son INMUTABLES y sus elementos no se pueden modificar.\n")


# 3. Crea una función que reciba una tupla de coordenadas y devuelva
# dos tuplas separadas: (latitud,) y (longitud,)
def separar_coordenadas(coordenadas: tuple) -> tuple:
    """
    Recibe una tupla (latitud, longitud) y devuelve una tupla con
    la latitud y otra con la longitud, ambas encapsuladas en tuplas unitarias.
    """
    latitud = coordenadas[0]
    longitud = coordenadas[1]
    
    # Notación importante: (valor,) crea una tupla de un solo elemento (tupla unitaria)
    return (latitud,), (longitud,)

# Prueba de la función
lat_tupla, lon_tupla = separar_coordenadas(coordenadas_madrid)

print("--- Resultado de la Función ---")
print(f"Tupla de Latitud: {lat_tupla}")
print(f"Tipo: {type(lat_tupla)}")
print(f"Tupla de Longitud: {lon_tupla}")
print(f"Tipo: {type(lon_tupla)}")