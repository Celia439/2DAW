from functools import reduce
# Ejemplo de entrada:
texto = "Python es un lenguaje de programación increíble para ciencia de datos"

# Salida esperada:
#numero de palabras los espacios mas la primera palabra(esto no es fiable)busca otra solucion 
#numPalabras=len([ i for i in texto if i==" " ])+1
# tambien existe el split aqui :D
numPalabras=len(texto.split())

print("Número de palabras: "+numPalabras) # Número de palabras: 11

# Palabra más larga: programación (12 caracteres)
caracteresDePalabraLarga = reduce(lambda a, b: a if len(a) > len(b) else b, texto.split())
print("Palabra más larga: "+caracteresDePalabraLarga+"("+len(caracteresDePalabraLarga)+" caracteres)")
# Vocales: a=6, e=8, i=5, o=4, u=2
vocales={"a":0,"e":0,"i":0,"o":0,"u":0}
for i in texto.split():
    if i==" ":
        print(i) 

# Top 3 palabras más largas: programación, increíble, lenguaje(mayor de 8 caracteres)