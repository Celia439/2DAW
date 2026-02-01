import pandas as pd

datos = {
    'nombre': ['Ana', 'Pedro', 'María', 'Luis', 'Carmen'],
    'edad': [20, 22, 21, 23, 20],
    'nota': [7.5, 8.0, 6.5, 9.0, 7.0]
}

df = pd.DataFrame(datos)

print("Diccionario original:")
print(datos)

print("\nDataFrame completo:")
print(df)

print("\nPrimeras 3 filas:")
print(df.head(3))

print("\nMedia de notas:")
print(df["nota"].mean())

# Ejemplo de filtrado: mostrar solo filas donde la nota es mayor o igual a 8
print("\nAlumnos con nota >= 8:")
print(df[df["nota"] >= 8])
