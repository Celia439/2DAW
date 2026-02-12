import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns
import numpy as np


plt.style.use('ggplot')
sns.set_palette('husl')

print("="*60)
print("ANÁLISIS DEL PC POKÉMON")
print("="*60)

# Cargar datos
df = pd.read_csv('dataset/dataset_PC_pokemon.csv',  sep=',', encoding='utf-8')

print("\n1. PRIMEROS 5 REGISTROS")
print(df.head())

print("\n2. INFORMACIÓN DEL DATASET")

df.info()

print(f"\n Total de pokémon: {len(df)}")
print(f"\n Columnas: {list(df.columns)}")
print("\n Tipos de datos:")
print(df.dtypes)

print("\n3. ESTADÍSTICAS DESCRIPTIVAS")
print(df.describe())

print("\n4. LIMPIEZA DE DATOS")

print(f"\n Valores nulos por columna:")
print(df.isnull().sum())
numDuplicados =df.duplicated().sum()
print(f"\n Registros duplicados: {numDuplicados}")

# Ver las filas duplicadas si existen.
if numDuplicados > 0:
    print("\nFilas duplicadas encontradas:")
    
    # keep es el parametro que ignora los duplicados por defecto 
    # esta en first se queda con la primera aparición.
    
    #print(df[df.duplicated(keep=False)])
    
    # Pero primero pense en pillar las columnas como listas agrupar por columna 
    # y filtrarlas si se repetian .
    print(df.groupby(df.columns.tolist()).filter(lambda x: len(x) > 1))


    #tienes que echarle un ojo a todo de aqui hay cosas que no hemos dado asi que piensa con la cabeza no con la pereza
    
