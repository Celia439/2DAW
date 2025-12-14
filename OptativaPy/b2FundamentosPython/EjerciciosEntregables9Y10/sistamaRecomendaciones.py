usuarios_intereses = {
    "Ana": {"Python", "Machine Learning", "Data Science", "Música"},
    "Carlos": {"JavaScript", "React", "Node.js", "Videojuegos"},
    "Elena": {"Python", "Data Science", "Estadística", "Lectura"},
    "David": {"Python", "Django", "PostgreSQL", "Música"},
    "Celia": {"Java","Java Script","Python","HTML5","Videojuegos"},
    "Marta": {"Python", "Java", "League of Legends","Los Sims"},
    "Carolina": {"Java Script", "HTML5", "CSS", "Música","Arte"},
    "Alejandro": {"PHP", "FIFA"},
}
# Función que encuentre usuarios con intereses similares
def encontrar_usuarios_similares(usuario, minimo_coincidencias=2):
    # encontrar el usaurio 
    if usuarios_intereses.get(usuario):
        personas={}
        #pillar intereses del usuario 
        interesUser=usuarios_intereses.get(usuario)
        # recorrer todo el diccionario
        for user, intereses in usuarios_intereses.items():
            #una variable para los comunes de cada persona 
            numIntereses=0
            #recorrer los intereses 
            for interes in intereses:
                #Comprobar que tengan  intereses parecidos pero no iguales
                if interes in interesUser and interesUser != intereses:
                    numIntereses=numIntereses+1
                
            #Lo supera añadelo 
            if numIntereses>=minimo_coincidencias:
                personas[user]=usuarios_intereses[user]
    else:
        # no lo encontró
        print("el usuario "+usuario+" no existe")
    
    return personas
#Pruebas
similares=encontrar_usuarios_similares("Celia")
print(similares)

#Función que recomiende nuevos intereses basados en usuarios similares
def recomendar_intereses(usuario):
    if usuarios_intereses.get(usuario):
        #pillar intereses del usuario 
        interesUser=usuarios_intereses.get(usuario)
        #guardar los similares
        recomendacion=[]
        numIntereses=0
        #Auxiliar para comparar 
        recomendacionAux=[]
        numInteresesAux=0
        # recorrer todo el diccionario
        for intereses in usuarios_intereses.values():
            #Resetear para la siguiente persona
            numInteresesAux=0
            recomendacionAux.clear()
            #recorrer los intereses 
            for interes in intereses:
                #Comprobar que tengan  intereses parecidos pero no iguales
                if interes in interesUser and interesUser != intereses:
                    #coinciden 
                    numInteresesAux=numInteresesAux+1
                elif interes not in interesUser:
                    #es diferente
                    recomendacionAux.append(interes) 
                
            # si coincide más que el anterior y tiene alguno que no tenga 
            if numIntereses<numInteresesAux and recomendacionAux != [] :
                #limpiamos el anterior
                recomendacion.clear()
                #ponemos la mejor recomendacion 
                recomendacion =recomendacionAux.copy()
                #y el numero de intereses comunes maximos
                numIntereses=numInteresesAux
    else:
        # no lo encontró
        print("el usuario "+usuario+" no existe")

    return recomendacion

print(recomendar_intereses("Ana"))
# ["Estadística", "Django", "PostgreSQL"] (intereses de usuarios similares que Ana no tiene) 
#( este ejemplo no lo entiendo pues pilla tres uno del primero y dos de el ultimo por lo que no me queda claro))
# e decidido pillar el que mas en comun tiene aunque tenga poco que recomendar (estaba pensando en hacer un ranking para saber los tres primeros mas recomendados y que cambiara dependiendo de un parametro pero por ahora no se como implementarlo por completo )