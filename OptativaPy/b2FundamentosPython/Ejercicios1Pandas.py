import pandas as pd

datos = {
    'nombre': ['Ana', 'Pedro', 'María', 'Luis', 'Carmen'],
    'edad': [20, 22, 21, 23, 20],
    'nota': [7.5, 8.0, 6.5, 9.0, 7.0]
}
#Crea un DataFrame con estos datos
df=pd.DataFrame(datos)
# Muestra las primeras 3 filas
print(df.head(3))
# Calcula la nota media de la clase
media=df["nota"].mean()
print(f"La media de todos los estudiantes: {media}")
# Encuentra el estudiante con la nota más alta

nota_max = df['nota'].max()
print(f"Mejor nota: {nota_max}")
#se puede hacer con idmax() mas concreto
df_ordenado = df.sort_values('nota')
mejor_estudiante = df_ordenado.iloc[-1]

print(
    f"Mejor estudiante: {mejor_estudiante['nombre']} "
    f"con nota {mejor_estudiante['nota']}"
)

# Filtra estudiantes con nota >= 7.0
estudiantesFiltrados=df[df['nota']>=7.0]
print(f"\nEstudiantes filtrados: \n {estudiantesFiltrados}")