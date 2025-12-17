import re

def validar_password(password):
    errores = []
    # Tu código aquí
    passwords_comunes = {
    "password": "Demasiado obvia",
    "123456": "Secuencia numérica simple",
    "123456789": "Secuencia numérica larga pero común",
    "qwerty": "Patrón del teclado",
    "abc123": "Combinación muy usada",
    "admin": "Relacionado con roles",
    "welcome": "Palabra frecuente",
    "iloveyou": "Expresión sentimental",
    "monkey": "Palabra común en ataques",
    "dragon": "Palabra popular en videojuegos",
    "football": "Deporte muy usado",
    "letmein": "Contraseña clásica",
    "pokemon": "Referencia popular",
    "login": "Demasiado genérica",
    "user": "Relacionado con cuentas"
    
}
    # tengo la duda si meterlos en funciones más pequeñas pero si algo falla aquí creo que es facil de locaclizar de las dos maneras
   # 1. Longitud mínima de 12 (Tu código tenía > 12, que es al revés)
    if len(password) < 12:
        errores.append("La contraseña debe tener al menos 12 caracteres.")

 # 2. Al menos 2 mayúsculas
    # re.findall busca todas las letras de la 'A' a la 'Z'. 
    # len() cuenta cuántas encontró. Si hay menos de 2, da error.
    if len(re.findall(r'[A-Z]', password)) < 2:
        errores.append("Debe contener al menos 2 letras mayúsculas.")

    # 3. Al menos 2 minúsculas
    # El patrón '[a-z]' machea cualquier letra minúscula individualmente.
    if len(re.findall(r'[a-z]', password)) < 2:
        errores.append("Debe contener al menos 2 letras minúsculas.")

    # 4. Al menos 2 números
    # '[0-9]' busca cualquier dígito. findall los extrae todos a una lista.
    if len(re.findall(r'[0-9]', password)) < 2:
        errores.append("Debe contener al menos 2 números.")

    # 5. Al menos 2 símbolos
    # El '^' dentro de [] significa "NEGACIÓN" igual que en js. 
    # Machea cualquier caracter que NO sea una letra (A-Za-z) ni un número (0-9).
    if len(re.findall(r'[^A-Za-z0-9]', password)) < 2:
        errores.append("Debe contener al menos 2 símbolos (ej: !@#$).")

    # 6. No contener palabras comunes
    # .lower() convierte la password a minúsculas antes de comparar
    # para que 'ADMIN' o 'Admin' sean detectados igual que 'admin'.
    if password.lower() in passwords_comunes:
        errores.append("La contraseña es demasiado común/predecible.")

    # 7. No 3 caracteres consecutivos iguales (Ej: "aaa" o "111")
    # Explicación: (.) captura un carácter, \1\1 busca que se repita ese mismo 2 veces más
    if re.search(r'(.)\1\1', password):
        errores.append("No puede tener 3 caracteres consecutivos iguales.")
    return len(errores) == 0, errores

# Ejemplo:
valida, errores = validar_password("MiPass123!@")
print(valida, errores)
# (False, ['Longitud insuficiente', 'Solo 1 mayúscula'])