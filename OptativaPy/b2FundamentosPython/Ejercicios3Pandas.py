import pandas as pd
datos_sucios = {
    'nombre': ['Ana García', ' Pedro López', 'María Ruiz', 'Ana García'],  # Espacios y duplicado
    'edad': [25, None, 30, 25],  # Valor nulo
    'email': ['ana@mail.com', 'pedro@mail.com', None, 'ana@mail.com'],  # Nulo y duplicado
    'ciudad': ['Madrid', 'barcelona', 'VALENCIA', 'Madrid']  # Formatos inconsistentes
}
#Has recibido un dataset con errores que debes limpiar.
df = pd.DataFrame(datos_sucios)
#Tareas:
print("sucio")
print(df)
# Elimina espacios en blanco de la columna 'nombre'
df['nombre']=df['nombre'].str.strip()
# Rellena los valores nulos de 'edad' con la media
df['edad']=df['edad'].fillna(df['edad'].mean())
# Elimina filas con email nulo
df =df.dropna(subset=['email'])
# Normaliza la columna 'ciudad' (primera letra mayúscula)
df['ciudad']=df['ciudad'].str.title()
# Elimina duplicados
df=df.drop_duplicates()
# Muestra el resultado final
print("limpio")
print(df)
#Lo que te tienes que quedar es que esto devuelve el cambio no lo aplica ojo 