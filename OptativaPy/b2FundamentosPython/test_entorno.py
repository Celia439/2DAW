# test_entorno.py
import numpy as np

print("NumPy instalado correctamente!")
print(f"versión: {np.__version__}")

# Cárear un array simple
arr = np.array([1, 2, 3, 4, 5])
print(f"Array cáreado: {arr}")
print(f"Media: {np.mean(arr)}")