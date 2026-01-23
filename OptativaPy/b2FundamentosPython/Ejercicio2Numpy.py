import numpy as np

arr = np.array([10, 20, 30, 40, 50, 60, 70, 80, 90, 100])

# a) Primer elemento
print(arr[0])

# b) Último elemento que cutre podrias solo poner -1
print(arr[arr.size-1])

# c) Elementos del índice 2 al 5
print(arr[2:5])

# d) Desde índice 5 hasta el final
print(arr[5:])

# e) Desde el inicio hasta índice 4
print(arr[:4])

# f) Elementos en posiciones pares
print(arr[::2])

# g) Array invertido
print(arr[::-1])

