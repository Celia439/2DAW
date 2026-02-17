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

print(f"\n Normalizar columnas tipos a minúsculas")

def normalizar(variable):
    normalizado = variable.lower()
    return normalizado

df["tipos"]=df["tipos"].apply(normalizar)

print(df["tipos"])

print(f"\n Convertir formato día hora min a horas para caluclar")


def dhmToH(variable):

    #Primero si la variables es NaN va a ser 0
    if pd.isna(variable):
        return 0
    #Creamos una lista separando por -
    partes = variable.split('-')
    #Quitamos las letras y recogemos dias horas y min
    dias= int(partes[0].replace('D',''))
    horas= int (partes[1].replace('H',''))
    min= int(partes[2].replace('M',''))    
    total_horas=(dias*24)+horas+(min/60)

    return round(total_horas,2)


df["tiempo_entrenamiento"] = df["tiempo_entrenamiento"].apply(dhmToH)

print(df["tiempo_entrenamiento"])

print(f"\n Ver cuantos valores nulos por columna:")

print(df.isnull().sum())

numDuplicados =df.duplicated().sum()

print(f"\n Registros duplicados: {numDuplicados}")


# Ver las filas duplicadas si existen.
if numDuplicados > 0:
    print("\nFilas duplicadas encontradas:")
    
    # keep es el parametro que ignora los duplicados por defecto 
    # esta en first se queda con la primera aparición.
    
    #print(df[df.duplicated(keep=False)])
    
    # Pero primero pense en agrupa por todas las 
    # columnas y mostrar solo los grupos con más de una
    # fila (duplicados).
    print(df.groupby(df.columns.tolist()).filter(lambda x: len(x) > 1))


print(f"\nEliminar filas duplicadas")
print(f"\nAntes de eliminar nulos: {len(df)} pokémon")

df = df.drop_duplicates()

print(f"\nTratar valores nulos\n")

print(f"-En caso de que falla nºPokedex o nombre")
#atascada como? 
df.loc[df['nºpokedex'].isna(), df['nºpokedex']] = df[]
print(f"-Si nos falla nivel, tiempo_entrenamiento, fecha_captura el pokémon está corrupto se elimina")

df.dropna()

print(f"\nDespués de eliminar nulos: {len(df)} pokémon")
