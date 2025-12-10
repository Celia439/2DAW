# Dada esta lista de calificaciones:
notas = [4.5, 7.0, 3.2, 8.5, 5.5, 9.0, 4.0, 6.5]

# Usa filter() para obtener solo las notas >= 5.0
notaA = filter(lambda a: a >= 5.0 , notas)
# Luego usa map() para convertirlas a strings con formato "Nota: X.X"
notasString=map( lambda b : "Notas: "+ str(b) , list(notaA))
print(list(notasString))