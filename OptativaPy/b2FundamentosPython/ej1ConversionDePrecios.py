# Dada esta lista de precios en euros:
precios_euros = [19.99, 49.99, 12.50, 99.99, 5.00]

# Usa map() para:
# 1. Convertir a dólares (multiplica por 1.1)
dolares= map(lambda p : p * 1.1 , precios_euros)
print(list(dolares))
# 2. Redondear a 2 decimales con round()
dolaresR=map(lambda a : round(a,2) , list(dolares))
# Imprime la lista resultante
print(list(dolaresR))