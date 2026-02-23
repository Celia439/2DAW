# Análisis del PC Pokémon

**Autor:** Celia Caracaca Vega
**Fecha:** 11/02/2026
**Asignatura:** Optativa

---

## 1. Introducción

Mi proyecto trata sobre analizar un PC de Pokémon. Para quien no lo sepa, un PC es como un ordenador donde guardas los pokémon que capturas en el juego.
El entrenador ha estado jugando y ha capturado varios pokémon, así que voy a analizar sus datos (yo no soy tan pendeja jugando, aviso).

### ¿Qué voy a analizar?

- Qué tipos de pokémon le gustan más.
- Cuánto tiempo entrena cada pokémon.
- Relación entre el tiempo de entrenamiento y el nivel que tiene.
- Ranking de los pokémon más usados.

Básicamente quiero ver qué patrón sigue un entrenador cuando juega y qué tipo de entrenador es.

---

## 2. Los datos que tengo

El dataset tiene 30 pokémon capturados entre el 11 y el 19 de febrero de 2026.

### Columnas del CSV

| Columna | Descripción |
|---|---|
| `nºpokedex` | Número del pokémon en la pokédex |
| `nombre` | Nombre del pokémon |
| `tipos` | Tipo elemental (fuego, agua, planta…) |
| `fecha_captura` | Fecha en la que se capturó |
| `tiempo_entrenamiento` | Tiempo entrenado (formato D-H-M) |
| `nivel` | Nivel actual del pokémon |

---

## 3. Limpieza de datos

### Problemas encontrados

#### ✔️ Valores nulos (NaN)

- Si falta el número de pokédex → lo recupero usando el nombre.
- Si falta el nombre → lo recupero usando el número de pokédex.
- Si falta el tipo → NO se puede recuperar (no hay duplicados con tipo correcto).
- Si falta fecha, tiempo o nivel → no se pueden recuperar, así que elimino esa fila.

#### ✔️ Duplicados

Había pokémon duplicados exactamente iguales. Los eliminé porque no pueden existir dos veces en el PC.

#### ✔️ Formato de datos

- Normalicé la columna `tipos` a minúsculas.
- Convertí `tiempo_entrenamiento` (texto) a una nueva columna `tiempo_horas` (número).
- Eliminé filas con datos irrecuperables.

---

## 4. Análisis estadístico

### 4.1 Estadísticas básicas

```python
dfl.describe()
```

**Resultados:**

| Métrica | Valor |
|---|---|
| Nivel promedio | 10.93 |
| Tiempo promedio de entrenamiento | 23.03 horas |
| Nivel mínimo | 7 |
| Nivel máximo | 15 |

### 4.2 Tipos de pokémon más comunes

```python
dfl['tipos'].value_counts()
```

**Interpretación:** El entrenador prefiere pokémon de tipo fuego, porque son los que más aparecen en el PC.

### 4.3 Nivel promedio por tipo

```python
dfl.groupby('tipos')['nivel'].mean()
```

**Descubrimiento:** Los pokémon de tipo eléctrico tienen el nivel promedio más alto.

### 4.4 Tiempo promedio de entrenamiento por tipo

```python
dfl.groupby('tipos')['tiempo_horas'].mean()
```

### 4.5 Ranking de pokémon más entrenados

```python
dfl.nlargest(5, 'tiempo_horas')
```

**Top 5:**

1. Spearow
2. Sandshrew
3. Tentacool
4. Vulpix
5. Caterpie

### 4.6 Ranking de pokémon con mayor nivel

```python
dfl.nlargest(5, 'nivel')
```

**Top 5:**

1. Pikachu
2. Vulpix
3. Mankey
4. Spearow
5. Meowth

### 4.7 Relación nivel vs tiempo

```python
dfl[['nivel', 'tiempo_horas']].corr()
```

**Conclusión:**
Entrenar más horas ayuda un poco a subir de nivel, pero no es el único factor.
La correlación es moderada (0.37), lo que indica que el entrenador no está entrenando de forma eficiente.

---

## 5. Visualizaciones

### Gráfico 1: Distribución de tipos

**Interpretación:** El entrenador prefiere pokémon de tipo fuego.

### Gráfico 2: Nivel vs Tiempo de entrenamiento

**Interpretación:**
Hay pokémon con muchas horas entrenadas pero niveles bajos. Por ejemplo, uno con más de 20 horas solo llega a nivel 15.

Esto sugiere que:

- El entrenador no usa bien el tiempo.
- No lucha contra pokémon que den buena experiencia.
- Entrena sin estrategia.

Vamos, que parece novato.

### Gráfico 3: Top 5 pokémon más entrenados

**Interpretación:** El pokémon más usado por el entrenador es Spearow.

---

## 6. Conclusiones

### Preferencia por ciertos tipos de Pokémon

El tipo más frecuente en el PC indica una preferencia clara. La apariencia suele influir en jugadores con poca experiencia, lo que explica por qué ciertos tipos aparecen más.

### Pokémon favoritos según el tiempo de entrenamiento

Los pokémon con más horas entrenadas son los que el entrenador usa más o con los que se siente más cómodo.

### Relación entre nivel y tiempo de entrenamiento

Aunque lo normal sería que más horas = más nivel, aquí la relación es moderada. Hay pokémon con muchas horas pero niveles bajos.

Esto indica que el entrenador no entrena de forma eficiente y probablemente es novato.

---

## Limitaciones

- Solo se analizaron 9 días de juego.
- Algunos datos se eliminaron por estar incompletos.
- No se incluyeron pokémon del equipo activo.

## Posibles mejoras

- Añadir más datos en el futuro.
- Incluir estadísticas de combate.
- Comparar con otros entrenadores.

---

## Librerías usadas

```
pandas==2.0.0
matplotlib==3.7.0
seaborn==0.12.0
numpy==1.24.0
```

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

- `dataset_pokemon_pc.csv`
- `analisis_pokemon_pc.py`
- `README.md`
- `requirements.txt`
- `graficos/` (carpeta con las imágenes generadas)