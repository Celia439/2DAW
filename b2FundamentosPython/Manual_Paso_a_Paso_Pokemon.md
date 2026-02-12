# 📚 Manual Paso a Paso - Análisis PC Pokémon

## 📋 Índice
1. [Preparación](#paso-1-preparación)
2. [Crear el CSV](#paso-2-crear-el-csv)
3. [Cargar y explorar datos](#paso-3-cargar-y-explorar-datos)
4. [Limpiar datos](#paso-4-limpiar-datos)
5. [Análisis estadístico](#paso-5-análisis-estadístico)
6. [Crear visualizaciones](#paso-6-crear-visualizaciones)
7. [Escribir conclusiones](#paso-7-escribir-conclusiones)
8. [Crear presentación](#paso-8-crear-presentación)
9. [Subir a GitHub](#paso-9-subir-a-github)

---

## Paso 1: Preparación

### 1.1 Crear carpeta del proyecto

```bash
mkdir proyecto_pokemon
cd proyecto_pokemon
```

### 1.2 Crear entorno virtual (opcional pero recomendado)

```bash
python -m venv venv

# Activar en Windows:
venv\Scripts\activate

# Activar en Mac/Linux:
source venv/bin/activate
```

### 1.3 Instalar librerías necesarias

```bash
pip install pandas matplotlib seaborn numpy
```

### 1.4 Guardar librerías en requirements.txt

```bash
pip freeze > requirements.txt
```

---

## Paso 2: Crear el CSV

### 2.1 Descarga el CSV que te di

Usa el archivo `dataset_pokemon_pc.csv` que te generé. Tiene:
- ✅ 30 pokémon
- ✅ Valores nulos (para que los limpies)
- ✅ Un duplicado (Pikachu está 2 veces)
- ✅ Inconsistencias de formato (fuego vs Fuego)

### 2.2 Guárdalo en tu carpeta

Ponlo en: `proyecto_pokemon/dataset_pokemon_pc.csv`

---

## Paso 3: Cargar y explorar datos

### 3.1 Crear archivo Python

Crea `analisis_pokemon_pc.py` y empieza:

```python
import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns
import numpy as np

# Configuración para que los gráficos se vean bien
plt.style.use('ggplot')
sns.set_palette("husl")

print("="*50)
print("ANÁLISIS DEL PC POKÉMON")
print("="*50)
```

### 3.2 Cargar el CSV

```python
# Cargar los datos
df = pd.read_csv('dataset_pokemon_pc.csv')

print("\n1. PRIMEROS REGISTROS")
print(df.head())
```

### 3.3 Exploración inicial

```python
print("\n2. INFORMACIÓN DEL DATASET")
print(f"Total de pokémon: {len(df)}")
print(f"Columnas: {list(df.columns)}")
print("\nTipos de datos:")
print(df.dtypes)
```

### 3.4 Ver estadísticas básicas

```python
print("\n3. ESTADÍSTICAS DESCRIPTIVAS")
print(df.describe())
```

**✅ Ejecuta el código hasta aquí y verifica que funciona**

---

## Paso 4: Limpiar datos

### 4.1 Detectar valores nulos

```python
print("\n4. LIMPIEZA DE DATOS")
print("\n4.1 Valores nulos por columna:")
print(df.isnull().sum())
```

### 4.2 Detectar duplicados

```python
print("\n4.2 Duplicados encontrados:")
duplicados = df.duplicated().sum()
print(f"Total de duplicados: {duplicados}")

# Ver cuáles son los duplicados
if duplicados > 0:
    print("\nFilas duplicadas:")
    print(df[df.duplicated(keep=False)])
```

### 4.3 Eliminar duplicados

```python
# Eliminar duplicados
df = df.drop_duplicates()
print(f"\nDespués de eliminar duplicados: {len(df)} pokémon")
```

### 4.4 Tratar valores nulos

**Estrategia:**
- Si falta `nºpokedex` o `nombre` → intentar recuperar
- Si falta `fecha_captura`, `tiempo_entrenamiento` o `nivel` → eliminar esa fila

```python
# Ver qué filas tienen nulos
print("\nFilas con valores nulos:")
print(df[df.isnull().any(axis=1)])

# Recuperar nºpokedex si sabemos el nombre
# (Aquí tendrías que hacer un diccionario nombre:numero o buscar en internet)
# Por simplicidad, vamos a eliminar las filas con nulos

df_limpio = df.dropna()
print(f"\nDespués de eliminar nulos: {len(df_limpio)} pokémon")
```

### 4.5 Normalizar tipos (minúsculas)

```python
# Convertir tipos a minúsculas para consistencia
df_limpio['tipos'] = df_limpio['tipos'].str.lower()

print("\nTipos únicos después de normalizar:")
print(df_limpio['tipos'].unique())
```

### 4.6 Convertir tiempo de entrenamiento a horas

```python
def convertir_tiempo_a_horas(tiempo_str):
    """
    Convierte formato '1D-2H-30M' a horas totales
    """
    try:
        partes = tiempo_str.split('-')
        dias = int(partes[0].replace('D', ''))
        horas = int(partes[1].replace('H', ''))
        minutos = int(partes[2].replace('M', ''))
        
        total_horas = (dias * 24) + horas + (minutos / 60)
        return round(total_horas, 2)
    except:
        return None

# Aplicar conversión
df_limpio['tiempo_horas'] = df_limpio['tiempo_entrenamiento'].apply(convertir_tiempo_a_horas)

print("\nNueva columna de tiempo en horas:")
print(df_limpio[['nombre', 'tiempo_entrenamiento', 'tiempo_horas']].head())
```

### 4.7 Guardar dataset limpio

```python
# Guardar versión limpia
df_limpio.to_csv('dataset_pokemon_limpio.csv', index=False)
print("\n✅ Dataset limpio guardado como 'dataset_pokemon_limpio.csv'")
```

**✅ Ejecuta hasta aquí y verifica que tienes el CSV limpio**

---

## Paso 5: Análisis estadístico

### 5.1 Estadísticas básicas (OBLIGATORIO)

```python
print("\n" + "="*50)
print("5. ANÁLISIS ESTADÍSTICO")
print("="*50)

print("\n5.1 Estadísticas descriptivas del nivel:")
print(df_limpio['nivel'].describe())

print("\n5.2 Estadísticas descriptivas del tiempo de entrenamiento:")
print(df_limpio['tiempo_horas'].describe())
```

### 5.2 Conteo de valores (OBLIGATORIO)

```python
print("\n5.3 Pokémon por tipo:")
conteo_tipos = df_limpio['tipos'].value_counts()
print(conteo_tipos)
```

### 5.3 Medias por grupo (OBLIGATORIO)

```python
print("\n5.4 Nivel promedio por tipo:")
nivel_por_tipo = df_limpio.groupby('tipos')['nivel'].mean().sort_values(ascending=False)
print(nivel_por_tipo)
```

### 5.4 Agrupación con groupby() (TU ELECCIÓN)

```python
print("\n5.5 Agrupación: Estadísticas completas por tipo")
stats_por_tipo = df_limpio.groupby('tipos').agg({
    'nivel': ['mean', 'min', 'max', 'count'],
    'tiempo_horas': ['mean', 'sum']
})
print(stats_por_tipo)
```

### 5.5 Ranking de top elementos (TU ELECCIÓN)

```python
print("\n5.6 TOP 5 Pokémon más entrenados:")
top_entrenados = df_limpio.nlargest(5, 'tiempo_horas')[['nombre', 'tipos', 'nivel', 'tiempo_horas']]
print(top_entrenados)

print("\n5.7 TOP 5 Pokémon de mayor nivel:")
top_nivel = df_limpio.nlargest(5, 'nivel')[['nombre', 'tipos', 'nivel', 'tiempo_horas']]
print(top_nivel)
```

### 5.6 Correlación (EXTRA)

```python
print("\n5.8 Correlación entre nivel y tiempo de entrenamiento:")
correlacion = df_limpio[['nivel', 'tiempo_horas']].corr()
print(correlacion)

# Interpretación
if correlacion.iloc[0, 1] > 0.7:
    print("→ Correlación FUERTE positiva: A más tiempo, más nivel")
elif correlacion.iloc[0, 1] > 0.3:
    print("→ Correlación MODERADA positiva")
else:
    print("→ Correlación DÉBIL")
```

**✅ Copia los resultados que te salgan para el README**

---

## Paso 6: Crear visualizaciones

### 6.1 Crear carpeta para gráficos

```python
import os
os.makedirs('graficos', exist_ok=True)
```

### 6.2 Gráfico 1: Barras - Distribución de tipos

```python
print("\n" + "="*50)
print("6. VISUALIZACIONES")
print("="*50)

# Gráfico 1: Cantidad de pokémon por tipo
plt.figure(figsize=(10, 6))
conteo_tipos.plot(kind='bar', color='skyblue', edgecolor='black')
plt.title('Distribución de Pokémon por Tipo', fontsize=16, fontweight='bold')
plt.xlabel('Tipo de Pokémon', fontsize=12)
plt.ylabel('Cantidad', fontsize=12)
plt.xticks(rotation=45, ha='right')
plt.tight_layout()
plt.savefig('graficos/1_distribucion_tipos.png', dpi=300, bbox_inches='tight')
plt.show()
print("✅ Gráfico 1 guardado: graficos/1_distribucion_tipos.png")
```

### 6.3 Gráfico 2: Scatter - Nivel vs Tiempo

```python
# Gráfico 2: Relación nivel vs tiempo de entrenamiento
plt.figure(figsize=(10, 6))
plt.scatter(df_limpio['tiempo_horas'], df_limpio['nivel'], 
            alpha=0.6, s=100, c='coral', edgecolors='black')
plt.title('Relación entre Tiempo de Entrenamiento y Nivel', fontsize=16, fontweight='bold')
plt.xlabel('Tiempo de Entrenamiento (horas)', fontsize=12)
plt.ylabel('Nivel', fontsize=12)
plt.grid(True, alpha=0.3)
plt.tight_layout()
plt.savefig('graficos/2_nivel_vs_tiempo.png', dpi=300, bbox_inches='tight')
plt.show()
print("✅ Gráfico 2 guardado: graficos/2_nivel_vs_tiempo.png")
```

### 6.4 Gráfico 3: Barras horizontales - Top 5

```python
# Gráfico 3: Top 5 pokémon más entrenados
top_5 = df_limpio.nlargest(5, 'tiempo_horas')

plt.figure(figsize=(10, 6))
plt.barh(top_5['nombre'], top_5['tiempo_horas'], color='lightgreen', edgecolor='black')
plt.title('Top 5 Pokémon Más Entrenados', fontsize=16, fontweight='bold')
plt.xlabel('Tiempo de Entrenamiento (horas)', fontsize=12)
plt.ylabel('Pokémon', fontsize=12)
plt.gca().invert_yaxis()  # Para que el #1 esté arriba
plt.tight_layout()
plt.savefig('graficos/3_top_5_entrenados.png', dpi=300, bbox_inches='tight')
plt.show()
print("✅ Gráfico 3 guardado: graficos/3_top_5_entrenados.png")
```

### 6.5 Gráfico EXTRA: Boxplot - Niveles por tipo

```python
# Gráfico 4 (EXTRA): Boxplot de niveles por tipo
plt.figure(figsize=(12, 6))
df_limpio.boxplot(column='nivel', by='tipos', patch_artist=True)
plt.title('Distribución de Niveles por Tipo de Pokémon', fontsize=16, fontweight='bold')
plt.suptitle('')  # Quitar título auto-generado
plt.xlabel('Tipo', fontsize=12)
plt.ylabel('Nivel', fontsize=12)
plt.xticks(rotation=45, ha='right')
plt.tight_layout()
plt.savefig('graficos/4_boxplot_niveles.png', dpi=300, bbox_inches='tight')
plt.show()
print("✅ Gráfico 4 guardado: graficos/4_boxplot_niveles.png")
```

**✅ Revisa que se hayan creado todos los gráficos en la carpeta `graficos/`**

---

## Paso 7: Escribir conclusiones

### 7.1 Completa el README

Abre `README.md` y rellena las secciones con TUS resultados:

**Sección 4: Análisis estadístico**
- Copia los números que te salieron en la consola
- Ejemplo: "Nivel promedio: 10.8"

**Sección 5: Visualizaciones**
- Añade las imágenes de la carpeta `graficos/`
- Escribe QUÉ VES en cada gráfico

```markdown
### Gráfico 1: Distribución de tipos
![Distribución de tipos](graficos/1_distribucion_tipos.png)

**Interpretación:** Se puede ver que tengo más pokémon de tipo fuego (5) que de cualquier otro tipo. Esto significa que me gustan los pokémon de ataque.
```

**Sección 6: Conclusiones**
- Resume los 5 hallazgos más importantes
- Sé honesto: "Mi pokémon favorito es Pikachu porque lo entrené 25 horas"

---

## Paso 8: Crear presentación

### 8.1 Usa PowerPoint o Google Slides

**Estructura sugerida (10 diapositivas):**

1. **Portada**
   - Título: "Análisis del PC Pokémon"
   - Tu nombre
   - Fecha

2. **Introducción**
   - ¿Qué es un PC Pokémon?
   - Objetivo del análisis

3. **Dataset**
   - 30 pokémon capturados
   - 6 columnas de datos
   - Período: 11-19 febrero 2026

4. **Proceso de limpieza**
   - Captura de código:
   ```python
   df.isnull().sum()
   df.drop_duplicates()
   ```
   - Problemas encontrados: X nulos, 1 duplicado

5. **Análisis: Estadísticas clave**
   - Nivel promedio: X
   - Tiempo promedio: X horas
   - Tipo más común: X

6. **Visualización 1**
   - Pega el gráfico de barras de tipos
   - Interpretación en 2 líneas

7. **Visualización 2**
   - Pega el scatter plot nivel vs tiempo
   - "Se ve correlación positiva"

8. **Visualización 3**
   - Pega el top 5 pokémon
   - "Mi favorito es X"

9. **Conclusiones**
   - 3-4 puntos clave que descubriste
   - Estilo de juego: "Soy un entrenador que..."

10. **Aspectos técnicos**
    - Librerías: pandas, matplotlib, seaborn
    - Desafío: Convertir tiempo texto a horas
    - Solución: Función personalizada

### 8.2 Exportar a PDF

- Archivo → Guardar como → PDF
- Nombre: `presentacion_analisis_pokemon.pdf`

---

## Paso 9: Subir a GitHub

### 9.1 Crear repositorio en GitHub

1. Ve a github.com
2. Click en "New repository"
3. Nombre: `analisis-pokemon-pc`
4. Marca "Add a README"
5. Click "Create repository"

### 9.2 Subir archivos desde tu ordenador

**Opción A: Desde la web**
1. En GitHub, click "Upload files"
2. Arrastra todos tus archivos
3. Commit

**Opción B: Desde terminal (recomendado)**

```bash
# Inicializar git
git init

# Añadir archivos
git add .

# Commit
git commit -m "Primer commit: análisis PC Pokémon"

# Conectar con GitHub (usa TU URL)
git remote add origin https://github.com/TU_USUARIO/analisis-pokemon-pc.git

# Subir
git push -u origin main
```

### 9.3 Estructura final del repositorio

```
analisis-pokemon-pc/
├── dataset_pokemon_pc.csv
├── dataset_pokemon_limpio.csv
├── analisis_pokemon_pc.py
├── README.md
├── requirements.txt
├── presentacion_analisis_pokemon.pdf
└── graficos/
    ├── 1_distribucion_tipos.png
    ├── 2_nivel_vs_tiempo.png
    ├── 3_top_5_entrenados.png
    └── 4_boxplot_niveles.png
```

---

## ✅ Checklist final

Antes de entregar, verifica:

- [ ] CSV con 30 pokémon
- [ ] Código Python ejecutable
- [ ] README completo con resultados
- [ ] Al menos 3 gráficos diferentes
- [ ] Presentación en PDF (8-12 diapositivas)
- [ ] requirements.txt
- [ ] Todo subido a GitHub
- [ ] Análisis groupby() hecho
- [ ] Ranking top elementos hecho
- [ ] Conclusiones escritas

---

## 🆘 Problemas comunes

### Error: "ModuleNotFoundError"
```bash
pip install pandas matplotlib seaborn
```

### Error al leer CSV
```python
df = pd.read_csv('dataset_pokemon_pc.csv', encoding='utf-8')
```

### Gráficos no se ven
```python
plt.show()  # Añade esto al final de cada gráfico
```

### No sé qué escribir en conclusiones
- Mira los números que te salieron
- Ejemplo: "Nivel promedio es 11, eso significa que estoy en early game"

---

¡Éxito con tu proyecto! 🎮✨
