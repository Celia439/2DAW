import pandas as pd
ventas = {
    'producto': ['Laptop', 'Mouse', 'Teclado', 'Monitor'],
    'precio_base': [800, 20, 45, 200],
    'cantidad': [1, 3, 2, 1]
}

df = pd.DataFrame(ventas)
print("antes")
print(df)
#Crea una columna 'subtotal' (precio_base × cantidad)
df['subtotal']=df['precio_base']*df['cantidad']
# Crea una columna 'iva' (subtotal × 0.21)
df['iva']=df['subtotal']*0.21
# Crea una columna 'total' (subtotal + iva)
df['total']=df['subtotal']+df['iva']
# Crea una columna 'categoria_precio':
def categorizar(precio):
# 'Económico' si precio_base < 50
    if precio <50:
        output="Económico"
# 'Medio' si precio_base < 300
    elif precio<300:
        output="Medio"
# 'Premium' si precio_base >= 300
    elif precio>=300:
        output="Premium"
    return output
df['categoria_precio']=df['precio_base'].apply(categorizar)

# Muestra el DataFrame final
print("despues")
print(df)
