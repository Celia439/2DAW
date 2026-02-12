import pandas as pd

print("="*60)
print("ANÁLISIS DEL PC POKÉMON")
print("="*60)

# Cargar datos
df = pd.read_csv('P04_Proyecto_Analisis/dataset/dataset_PC_pokemon.csv', 
                 sep=',', encoding='utf-8')

print("\n1. PRIMEROS 5 REGISTROS")
print(df.head())

print("\n2. INFORMACIÓN DEL DATASET")
df.info()

print("\n3. ESTADÍSTICAS DESCRIPTIVAS")
print(df.describe())

print("\n4. TIPOS DE DATOS")
print(df.dtypes)

print("\n5. DETECCIÓN DE PROBLEMAS")
print(f"\n Total de registros: {len(df)}")
print(f"\n Valores nulos por columna:")
print(df.isnull().sum())
print(f"\n Registros duplicados: {df.duplicated().sum()}")

# Ver las filas duplicadas si existen
if df.duplicated().sum() > 0:
    print("\nFilas duplicadas encontradas:")
    print(df[df.duplicated(keep=False)])