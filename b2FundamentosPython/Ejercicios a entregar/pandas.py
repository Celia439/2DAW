import pandas as pd

datos = {
    'nombre': ['Ana', 'Pedro', 'María', 'Luis', 'Carmen'],
    'edad': [20, 22, 21, 23, 20],
    'nota': [7.5, 8.0, 6.5, 9.0, 7.0]
}
df=pd.DataFrame(datos)
print(datos)
print(df)
print(df.head(3))
print(df["nota"].mean())
#print(df[df["nota"]=df])