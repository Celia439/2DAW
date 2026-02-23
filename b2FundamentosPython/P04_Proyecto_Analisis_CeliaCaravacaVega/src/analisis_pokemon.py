#Pandas sirve para leer el CSV, limpiar datos, crear columnas nuevas y hacer análisis.
import pandas as pd
#Matplotlib sirve para hacer gráficos
import matplotlib.pyplot as plt
#Seaborn es una librería de gráficos
import seaborn as sns
# NumPy sirve para operaciones matemáticas y manejo de arrays.
import numpy as np

plt.style.use('ggplot')
sns.set_palette('husl')

print("="*60)
print("ANÁLISIS DEL PC POKÉMON")
print("="*60)

# 1. Cargar datos
df = pd.read_csv('dataset/dataset_PC_pokemon.csv', sep=',', encoding='utf-8')

print("="*60)
print("1. PRIMEROS 5 REGISTROS")
print("="*60)

print(df.head())

print("="*60)
print("2. INFORMACIÓN DEL DATASET")
print("="*60)

df.info()

print(f"\n Total de pokémon: {len(df)}")
print(f"\n Columnas: {list(df.columns)}")

print("\n Tipos de datos:")
print(df.dtypes)

print("="*60)
print("n3. LIMPIEZA DE DATOS")
print("="*60)

# trabajar sobre una copia data frame limpio
dfl = df.copy()

# 4.1 Normalizar tipos a minúsculas
print("\n4.1 Normalizar columna 'tipos' a minúsculas")

def normalizar(variable):
    if pd.isna(variable):
        return variable
    return variable.lower()

dfl["tipos"] = dfl["tipos"].apply(normalizar)
print(dfl["tipos"])

# 4.2 Convertir tiempo_entrenamiento a horas
print("\n4.2 Convertir tiempo_entrenamiento formato día-hora-min a horas totales")

def dhmToH(variable):
    # Si la variable es NaN → 0 horas (porque no podemos saberlo)
    if pd.isna(variable):
        return np.nan  # mejor dejarlo como NaN para luego decidir si lo eliminamos
    partes = variable.split('-')
    dias = int(partes[0].replace('D',''))
    horas = int(partes[1].replace('H',''))
    minutos = int(partes[2].replace('M',''))
    total_horas = (dias * 24) + horas + (minutos / 60)
    return round(total_horas, 2)

dfl["tiempo_horas"] = dfl["tiempo_entrenamiento"].apply(dhmToH)
print(dfl[["tiempo_entrenamiento", "tiempo_horas"]].head())

# 4.3 Ver nulos y duplicados
print("\n4.3 Valores nulos por columna:")
print(dfl.isnull().sum())

numDuplicados = dfl.duplicated().sum()

print(f"\nRegistros duplicados: {numDuplicados}")

if numDuplicados > 0:
    print("\nFilas duplicadas encontradas:")
    print(dfl[dfl.duplicated(keep=False)])

# 4.4 Eliminar duplicados
print("\n4.4 Eliminar filas duplicadas")
print(f"Antes de eliminar duplicados: {len(dfl)} pokémon")
dfl = dfl.drop_duplicates()
print(f"Después de eliminar duplicados: {len(dfl)} pokémon")

# 4.5 Ver filas con nulos antes de rellenar/eliminar
print("\n4.5 Filas con valores nulos antes de tratar nada:")
print(dfl[dfl.isnull().any(axis=1)])

print("\n4.6 Recuperar nºpokedex o nombre cuando falte uno de los dos")

# Base de referencia: filas que tienen número Y nombre
base_ref = dfl.dropna(subset=['nºpokedex', 'nombre'])

# Diccionarios de referencia
    #zip une dos listas en pares 
    #dict combierte esas parejas en un diccionario 
num_to_name = dict(zip(base_ref['nºpokedex'], base_ref['nombre']))
name_to_num = dict(zip(base_ref['nombre'], base_ref['nºpokedex']))

# Si falta el nombre pero tenemos nºpokedex

falta_nombre = dfl['nombre'].isna() & dfl['nºpokedex'].notna()
dfl.loc[falta_nombre, 'nombre'] = dfl.loc[falta_nombre, 'nºpokedex'].map(num_to_name)

# Si falta nºpokedex pero tenemos nombre
falta_num = dfl['nºpokedex'].isna() & dfl['nombre'].notna()
dfl.loc[falta_num, 'nºpokedex'] = dfl.loc[falta_num, 'nombre'].map(name_to_num)

print("\nFilas con nulos después de intentar recuperar nombre/nºpokedex:")
print(dfl[dfl.isnull().any(axis=1)])

print("\n4.7 Eliminar filas irrecuperables (nivel, tiempo, fecha_captura)")

dfl = dfl.dropna(subset=['nivel', 'tiempo_horas', 'fecha_captura'])

print(f"\nDespués de eliminar nulos críticos: {len(dfl)} pokémon")
print("\nComprobación final de nulos:")
print(dfl.isnull().sum())


print("="*60)
print("4. ESTADÍSTICAS DESCRIPTIVAS")
print("="*60)

print("\n4.1 Estadísticas básicas")
print(dfl.describe())

print("\n4.2 Estadísticas básicas:")
#value counts cuenta por tipos cuantos se repite
conteo_tipos = dfl['tipos'].value_counts()
print(conteo_tipos)

print("\n4.3 Agrupación por tipo:")
# el sort es opcional pero lo puse para verlo más claro.
nivel_por_tipo = dfl.groupby('tipos')['nivel'].mean().sort_values(ascending=False)
print(nivel_por_tipo)

print("\n4.4 Tiempo promedio de entrenamiento por tipo:")
tiempo_por_tipo = dfl.groupby('tipos')['tiempo_horas'].mean().sort_values(ascending=False)
print(tiempo_por_tipo)

print("\n4.5 TOP 5 Pokémon más entrenados:")
#utilizamos nlargest recoge los 5 mayores primeros por el campo del segundo parametro
top_entrenados = dfl.nlargest(5, 'tiempo_horas')[['nombre', 'tipos', 'nivel', 'tiempo_horas']]
print(top_entrenados)

print("\n4.6 TOP 5 Pokémon con mayor nivel:")
top_nivel = dfl.nlargest(5, 'nivel')[['nombre', 'tipos', 'nivel', 'tiempo_horas']]
print(top_nivel)

print("\n4.7 Correlación entre nivel y tiempo de entrenamiento:")
correlacion = dfl[['nivel', 'tiempo_horas']].corr()
valor_corr = correlacion.loc['nivel', 'tiempo_horas']

if valor_corr > 0.7:
    print("→ Correlación fuerte positiva: entrenar más horas sube mucho el nivel.")
elif valor_corr > 0.3:
    print("→ Correlación moderada: entrenar más horas ayuda, pero no es el único factor.")
elif valor_corr > 0:
    print("→ Correlación débil: entrenar más horas influye muy poco.")
else:
    print("→ No hay relación o es negativa.")

print("="*60)
print("5. VISUALIZACIONES")
print("="*60)

conteo_tipos = dfl['tipos'].value_counts()
print("1. Distbuición de tipos")
print("Primero comprobamos contando los tipos de los pokémon")
print(conteo_tipos)

# Gráfico 1: Distribución de Pokémon por tipo

#creamos lienzo 10x6 pulgadas.
plt.figure(figsize=(10, 6))
#Le decimos a pandas que queremos un grafico de barras  de color oro con el borde marrón
conteo_tipos.plot(kind='bar', color='gold', edgecolor='brown')

#titulo dl grafico 
plt.title('Distribución de Pokémon por Tipo', fontsize=16, fontweight='bold')
#etiquetas para los ejes
#horizontal
plt.xlabel('Tipo de Pokémon', fontsize=12)
#vertical 
plt.ylabel('Cantidad', fontsize=12)
#rotamos los nombres para que no se pisen
plt.xticks(rotation=45, ha='right')

#ajustar para que no se corte nada 
plt.tight_layout()
#y mostrar el grafico
plt.show()


# Gráfico 2: Relación entre tiempo de entrenamiento y nivel
plt.figure(figsize=(10, 6))

#creamos un gráfico de puntos 
plt.scatter(
    #eje x
    dfl['tiempo_horas'], 
    #eje y
    dfl['nivel'], 
    #trasparencia 
    alpha=0.6, 
    #tamaño de los puntos
    s=100, 
    #color 
    c='coral', 
    #Bordes 
    edgecolors='black'
)
#titulo
plt.title('Relación entre Tiempo de Entrenamiento y Nivel', fontsize=16, fontweight='bold')
#Ejes
plt.xlabel('Tiempo de Entrenamiento (horas)', fontsize=12)
plt.ylabel('Nivel del Pokémon', fontsize=12)
#Activa la cuadricula para que se vea mejor 
plt.grid(True, alpha=0.3)
 
 #evita que se corte el texto
plt.tight_layout()
# y mostramos 
plt.show()

#obtenemos los 5 pokémon más entrenados
top_5 = dfl.nlargest(5, 'tiempo_horas')
print(top_5[['nombre', 'tipos', 'nivel', 'tiempo_horas']])

# Gráfico 3: Top 5 Pokémon más entrenados
plt.figure(figsize=(10, 6))

plt.barh(
    top_5['nombre'], 
    top_5['tiempo_horas'], 
    color='lightgreen', 
    edgecolor='black'
)

plt.title('Top 5 Pokémon Más Entrenados', fontsize=16, fontweight='bold')
plt.xlabel('Tiempo de Entrenamiento (horas)', fontsize=12)
plt.ylabel('Pokémon', fontsize=12)

# Para que el más entrenado salga arriba
plt.gca().invert_yaxis()  

plt.tight_layout()
plt.show()
