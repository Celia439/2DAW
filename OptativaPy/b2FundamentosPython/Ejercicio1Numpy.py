import numpy as np
#python -m pip install numpy
# a) Array del 0 al 9 si pones un solo valor es del cero al num 
array=np.arange(0,9)

# b) Array 3x4 de ceros
array2=np.zeros((3,4))

# c) Array 2x5 de unos
array3=np.ones((2,5))

# d) Matriz identidad 4x4
array4=np.eye(4)

# e) Explorar propiedades de cada array
# Su forma (shape) se puede acortar con el item.gloval y un diccionario
print(f"Forma : {array.shape}") 
print(f"Forma : {array2.shape}") 
print(f"Forma : {array3.shape}") 
print(f"Forma : {array4.shape}") 
# Su número de dimensiones(ndim)
print(f"Dimensiones: {array.ndim}")
print(f"Dimensiones: {array2.ndim}")
print(f"Dimensiones: {array3.ndim}")
print(f"Dimensiones: {array4.ndim}")
# Su tamaño total (número de elementos)
print(f"Tamaño del array: {array.size}")
print(f"Tamaño del array: {array2.size}")
print(f"Tamaño del array: {array3.size}")
print(f"Tamaño del array: {array4.size}")
# Su tipo de dato
print(f"Tipo de dato: {array.dtype}")
print(f"Tipo de dato: {array2.dtype}")
print(f"Tipo de dato: {array3.dtype}")
print(f"Tipo de dato: {array4.dtype}")

