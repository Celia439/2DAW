import pandas as pd
ventas = {
    'producto': ['Laptop', 'Mouse', 'Teclado', 'Monitor'],
    'precio_base': [800, 20, 45, 200],
    'cantidad': [1, 3, 2, 1]
}

df = pd.DataFrame(ventas)
#Crea una columna 'subtotal' (precio_base × cantidad)

# Crea una columna 'iva' (subtotal × 0.21)

# Crea una columna 'total' (subtotal + iva)

# Crea una columna 'categoria_precio':

# 'Económico' si precio_base < 50

# 'Medio' si precio_base < 300

# 'Premium' si precio_base >= 300

# Muestra el DataFrame final