# 1. Introducción
# 2. Carga y exploración inicial de datos
# 3. Limpieza de datos
# 4. Análisis estadístico
# 5. Visualizaciones
# 6. Conclusiones

## 1. Introducción 
- Mi proyecto va a ir dedicado a anailizar distintos PC de Pokémon.
- Para que se entienda un PC es un ordenador donde los entrenadores pokémon guardan a los pokémon capturados durante el juego, en este caso un PC se representará como un csv.
- Realizaré unos analisis para determinar:
* Tipo favorito del entrenador.
* ... todo: esto está en mi libreta.

## 2. Carga y exploración inicial de datos
- Los PC albergan pokémon guardados en su interior y cada uno de ellos tienen estos datos:
nºpokedex
nombre
tipo
fecha de captura
tiempo de entrenamiento
nivel

- Con estos datos prodremos hacer una precdicción sobre el entrenador:
- ¿Que tipos prefiere el jugador?
- ¿Cuantas horas invierte en promedio a los pokemon?
- Relación entre nivel y tiempo de entrenamiento 
- Pokemon favorito 
- Ranking del los pokémon más usados
- mediana de tipos por nivel 

## 3. Limpieza de datos
- En casos de tener valores nulos dependiendo de que campo sea:
* Si es el número de la Pokédex se puede salvar pues es un dato que tenemos controlado a travez del dato nombre.
* si es el nombre pero tiene el número de la pokedex lo podemos recuperar
* si es el tipo tambien lo podemos recuperar si es por el nombre o el número de la pokedex

- (A partir de aqui no se puede recuperar ni con extimación)

* la fecha de captura es quizas posible extimar un aproximado con el dia de hoy respecto al tiempo de entrenamiento pero no nos daría un dato fiable pues el pókemon puede haber estado en el pc mucho tiempo.

* El tiempo de entrenamiento quizas nos podemos aproximar de una manera parecida a la anterior  con respecto a la fecha de captura y su nivel pero sige siendo una aproximación invalida

* El nivel es más de lo mismo se puede extimar a partir de tiempo de entrenamiento y fecha de captura pero no es fiable.

- Eliminar duplicados iguales (Un pokémon no se puede capturar simultaneamente junto a otro por lo que esté caso se categoriza como error)

