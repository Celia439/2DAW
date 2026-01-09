grupo_a = {"Ana", "Carlos", "Elena", "David", "Beatriz"}
grupo_b = {"Carlos", "Elena", "Fernando", "Gloria"}

print(f"Grupo A: {grupo_a}")
print(f"Grupo B: {grupo_b}\n")

# 1. ¿Qué estudiantes están en ambos grupos?
# Se usa el método .intersection() o el operador &.
en_ambos = grupo_a.intersection(grupo_b)

print("1. Estudiantes en AMBOS grupos (Intersección):")
print(en_ambos)
print("-" * 50)

# 2. ¿Qué estudiantes están SOLO en el grupo A?
# Se usa el método .difference() o el operador -.
solo_en_a = grupo_a.difference(grupo_b)

print("2. Estudiantes SOLO en el Grupo A (Diferencia):")
print(solo_en_a)
print("-" * 50)

# 3. ¿Cuántos estudiantes hay en total (sin repetir)?
# Se usa el método .union() o el operador | para combinar y eliminar duplicados,
# y luego len() para contar.
total_sin_repetir = grupo_a.union(grupo_b)
conteo = len(total_sin_repetir)

print("3. Estudiantes en TOTAL (Unión y Conteo):")
print(f"Lista de estudiantes únicos: {total_sin_repetir}")
print(f"Conteo total (len()): {conteo}")
print("-" * 50)

# 4. Elimina duplicados de esta lista: [1, 2, 2, 3, 4, 4, 4, 5]
lista_con_duplicados = [1, 2, 2, 3, 4, 4, 4, 5]

# Convertir la lista a un conjunto (set) para eliminar duplicados,
# y luego convertirlo de nuevo a lista si se requiere ese tipo de dato.
sin_duplicados = list(set(lista_con_duplicados))

print("4. Eliminación de Duplicados en una Lista:")
print(f"Lista original: {lista_con_duplicados}")
print(f"Lista sin duplicados: {sin_duplicados}")