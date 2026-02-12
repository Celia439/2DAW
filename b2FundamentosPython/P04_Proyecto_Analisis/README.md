# Análisis del PC Pokémon

**Autor:** Tu nombre  
**Fecha:** Febrero 2026  
**Asignatura:** Análisis de Datos con Python

---

## 1. Introducción

Mi proyecto trata sobre analizar mi PC de Pokémon. Para quien no sepa, un PC es como un ordenador donde guardas los pokémon que capturas en el juego. Yo he estado jugando y he capturado varios pokémon, así que voy a analizar mis datos.

**¿Qué voy a analizar?**
- Qué tipos de pokémon me gustan más
- Cuánto tiempo entreno cada pokémon  
- Cuál es mi pokémon favorito
- Relación entre el tiempo de entrenamiento y el nivel que tiene
- Hacer un ranking de los pokémon que más uso

Básicamente quiero ver qué patrón sigo yo cuando juego y qué tipo de entrenador soy.

---

## 2. Los datos que tengo

Mi dataset tiene **30 pokémon** que he capturado entre el 11 y el 19 de febrero de 2026.

**Las columnas que tiene mi CSV son:**
- `nºpokedex`: El número del pokémon en la pokédex (ej: 025 es Pikachu)
- `nombre`: Cómo se llama el pokémon
- `tipos`: De qué tipo es (Fuego, Agua, Planta, etc.)
- `fecha_captura`: Cuándo lo capturé
- `tiempo_entrenamiento`: Cuánto tiempo lo he entrenado (formato: días-horas-minutos)
- `nivel`: El nivel que tiene ahora mismo

Los datos los he sacado de mi partida real del juego.

---

## 3. Limpieza de datos

### Problemas que encontré:

#### ❌ Valores nulos (NaN)
Algunos pokémon tenían datos que faltaban:
- **Si falta el número de pokédex** → Lo puedo recuperar porque sé el nombre
- **Si falta el nombre** → Lo recupero con el número de pokédex
- **Si falta el tipo** → También lo recupero con nombre o número
- **Si falta fecha de captura** → No lo puedo recuperar bien, tendría que eliminarlo
- **Si falta tiempo de entrenamiento** → Tampoco se puede recuperar
- **Si falta el nivel** → Lo mismo, no es fiable estimarlo

#### 🔁 Duplicados
Encontré pokémon duplicados exactamente iguales. Esto pasa cuando se guarda el mismo pokémon dos veces por error. Los he eliminado porque no pueden estar capturados dos veces a la vez.

#### 📝 Formato de datos
- Los tipos a veces venían con mayúsculas y otras con minúsculas → Lo normalicé todo a minúsculas
- El tiempo de entrenamiento está en formato texto ("1D-2H-30M") → Lo convertí a horas totales para poder hacer cálculos

### Código de limpieza usado:

```python
# Ver info del dataset
df.info()

# Ver cuántos nulos hay
df.isnull().sum()

# Ver duplicados
df.duplicated().sum()

# Eliminar duplicados
df = df.drop_duplicates()

# Rellenar nulos recuperables (ejemplo con nombre)
# Aquí iría el código de recuperación

# Eliminar filas con nulos no recuperables
df = df.dropna()
```

---

## 4. Análisis estadístico

### 4.1 Estadísticas básicas

```python
df.describe()
```

**Resultados:**
- **Nivel promedio:** [Tu resultado]
- **Tiempo promedio de entrenamiento:** [Tu resultado]  
- **Nivel mínimo:** [Tu resultado]
- **Nivel máximo:** [Tu resultado]

### 4.2 Tipos de pokémon más comunes

```python
df['tipos'].value_counts()
```

**Interpretación:** [Qué tipos te gustan más]

### 4.3 Agrupación por tipo

```python
df.groupby('tipos')['nivel'].mean()
```

**Descubrimiento:** [Qué tipos tienen nivel más alto en promedio]

### 4.4 Ranking de pokémon más entrenados

```python
df.nlargest(5, 'tiempo_entrenamiento_horas')[['nombre', 'tiempo_entrenamiento_horas']]
```

**Top 5:**
1. [Pokémon 1]
2. [Pokémon 2]
3. [Pokémon 3]
4. [Pokémon 4]
5. [Pokémon 5]

### 4.5 Relación nivel vs tiempo

```python
df[['nivel', 'tiempo_entrenamiento_horas']].corr()
```

**Conclusión:** [Si hay correlación positiva, negativa o ninguna]

---

## 5. Visualizaciones

### Gráfico 1: Distribución de tipos
[Aquí va tu gráfico de barras mostrando cuántos pokémon tienes de cada tipo]

**Interpretación:** Se ve que prefiero pokémon de tipo [X] porque...

### Gráfico 2: Nivel vs Tiempo de entrenamiento  
[Aquí va tu scatter plot]

**Interpretación:** Se puede ver que a más tiempo entrenado, mayor nivel...

### Gráfico 3: Top 5 pokémon más entrenados
[Aquí va tu gráfico de barras horizontales]

**Interpretación:** Mi pokémon favorito claramente es [X] porque...

---

## 6. Conclusiones

**¿Qué he descubierto sobre mi forma de jugar?**

1. **Tipo favorito:** Me gustan más los pokémon de tipo [X] porque tengo [N] de ellos

2. **Tiempo de entrenamiento:** De media entreno cada pokémon unas [X] horas

3. **Pokémon favorito:** El pokémon que más he entrenado es [nombre] con [X] horas

4. **Relación nivel-tiempo:** Sí existe una relación, a más tiempo entrenado más nivel tiene (o no, depende de tus datos)

5. **Estilo de juego:** Soy un entrenador que [captura muchos / se centra en pocos / entrena equilibradamente]

**Limitaciones:**
- Solo analicé 9 días de juego, con más tiempo podría ver más patrones
- Algunos datos los tuve que eliminar por estar incompletos
- No incluí pokémon del equipo activo, solo del PC

**Posibles mejoras:**
- Añadir más datos conforme siga jugando
- Incluir estadísticas de combate
- Comparar con otros entrenadores

---

## Librerías usadas

```
pandas==2.0.0
matplotlib==3.7.0
seaborn==0.12.0
numpy==1.24.0
```

---

## Cómo ejecutar el código

1. Instalar librerías:
```bash
pip install -r requirements.txt
```

2. Ejecutar el script:
```bash
python analisis_pokemon_pc.py
```

---

## Archivos del proyecto

- `dataset_pokemon_pc.csv` - Los datos originales
- `analisis_pokemon_pc.py` - El código Python
- `README.md` - Este archivo
- `requirements.txt` - Las librerías necesarias
- `graficos/` - Carpeta con las imágenes generadas