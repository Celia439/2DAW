#Analisis de ventas
from functools import reduce

ventas_mensuales = {
    "Enero": [120, 150, 200, 180, 210],
    "Febrero": [180, 190, 210, 200, 230],
    "Marzo": [150, 160, 170, 180, 190]
}

# Calcular ventas total por mes
total_ventas={}
mayor_ventas=0

for mes,lista in ventas_mensuales.items():
    total_mes= reduce(lambda r,a: a+r,lista,0)
    total_ventas[mes]=total_mes

print(total_ventas)
#encontrar el mes con mayor ventas 
maximo=max(total_ventas.values())
mayor_ventas= filter(lambda mes: total_ventas[mes] == maximo ,list( total_ventas))
print(mayor_ventas) 
