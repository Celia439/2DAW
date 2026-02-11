import pandas as pd

# Cargar datos desde archivo indicando la "," como separador
df =pd.read_csv('P04_Proyecto_Analisis/dataset/dataset_pokemon.csv', sep=',' , encoding='utf-8')

#uso de info
print("Info:\n")
df.info()
print("\n")

#uso de describe
print("\n Describe:")
print(f"{df.describe()}\n")

 #Verificación de tipos de datos 
print(f"\nTipos de datos:\n {df.dtypes}")

#identificación y tratamiento de tipos nulos 
print(f"Cantidad de reguistros nulos: {df.isnull().sum()}")
#Detección de duplicados
print(f"Cantidad de registros duplicados: {df.duplicated().sum()}")

#Normalización de datos (si aplica)
#Aqui creo que se pondrían los datos ya limplitos o apartados

# Conversión de tipos de datos (si necesario)