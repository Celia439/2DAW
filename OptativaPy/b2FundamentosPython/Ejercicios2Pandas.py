import pandas as pd

df = pd.read_csv('./ejemplo_datos.csv')
#Tareas:
#1 Muestra información básica del dataset (info, describe)
df.info()
print(f"\nEstadisticas  describe :\n {df.describe()}")
#2 ¿Cuántas ventas se realizaron en total?
print(f"\n Se realizaron :{len(df)} ventas")
#3 ¿Cuál es el precio medio de los productos vendidos?
print(f"\nEl precio medio de los productos vendidos es :{df.describe()['precio']['50%']}")
print(f"\nLa media de los productos vendidos es : {df['precio'].sum()/len(df) }")
print(f"\nPrecio medio: {df['precio'].mean()}")
#4 ¿Cuál es el producto más caro vendido?
print(f"\nproducto mas caro vendido: {df['producto']}")
#5 Filtra las ventas de Madrid
print(f"\nVentas de madrid\n{df[df['ciudad']=='Madrid']}")
#6 Calcula el total de ventas por ciudad
print(f"\nTotal de ventas por ciudad: \n{df.groupby('ciudad')['precio'].sum()}")

#7 Ordena las ciudades por ventas totales (de mayor a menor)
ventas_por_ciudad = df.groupby('ciudad')['precio'].sum()
odenado=ventas_por_ciudad.sort_values(ascending=False)
print(f"Ciudades ordenadas por ventas totales:\n{odenado}")
