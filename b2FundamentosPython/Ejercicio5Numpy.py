import numpy as np

temperaturas = np.array([18, 22, 25, 19, 30, 15, 28, 23, 17, 31, 20, 26])

# a) Máscara > 25
mask = temperaturas > 25

# b) Filtrar temperaturas > 25
print(f"Mascara :{temperaturas[mask]}")

# c) Contar temperaturas > 25
print(f"Mascara count :{ temperaturas[mask].size}")

# d) Máscara entre 20 y 25
mask2=temperaturas>20 & temperaturas<25
print(f"Mascara entre :{ temperaturas[mask2]}")

# e) Reemplazar valores > 28 con 28
mask3=[temperaturas>28]=28
print(f"Mascara reemplazo :{ temperaturas[mask3]}")

# f) Clasificar temperaturas 
# Temperaturas < 20 → "Frío" 
# Temperaturas entre 20-25 → "Templado" 
# Temperaturas > 25 → "Calor"
