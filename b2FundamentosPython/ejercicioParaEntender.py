def tipoVariable(a):
    # Variable numeros
    entero=0
    #cadena
    texto="hola"
    #boolean *Mayusculas*
    sino=True
    #nada osea null **
    nada=None
    #tipo 
    print(type(entero))
    print(type(texto))
    print(type(nada))
    print(type(sino))
    #Extructuras de control
    if entero>= entero:
        print("Misma variable?")
    elif nada == sino:
        print("nanai")
    lul=10
    for i in range(10):
        print(" ")
        for i in range(10) :
            print("*")
        lul-1
    mequedo=True
    while mequedo :
        sino= input("si o no")
        if sino == "no":
            mequedo=False
    return 0
#listas (Array)
almacen=["leche",5,"huevos",8,"harina",50,"sal",40,"manteca",10,"yogurt"]
for i in almacen:
    print(i," ")
print(almacen[8])
# este le da la vuleta XD (Pero ojo cuidado no dos o explota)
print(almacen[-5])
#Slicing (sublistas) 
print(almacen[0:3])#del primero al tres sin el tres
print(almacen[1:3])#del uno al tres sin el tres
print(almacen[1:])#del primero al ultimo 
print(almacen[:3])#tres primeros
print(almacen[::3])#cada tres elementos
#metodos
almacen.append("a")# al  fina inserta
almacen.insert(1,"15")# en la posicion inserta
almacen.remove("a")#eliminar
almacen.pop()#elimina ultimo

#-----diccionario (nota si te pasas de largura utiliza letras y simbolos)
coche={"nombre":"Ford","edad":15,"kilometros":20515545405540540540541054154054.10}
# acceder
print(coche["nombre"])
print(coche.get("nombre"))
#modificar
coche["nombre"]="Tu abuela"
#iterar
for clave,valor in coche.items():
    print(f"{clave}:{valor}")
if "Tu abuela" in coche:
    print("Lul tu abuela está en el coche XD")
    
#-------tuplas---(le da lo mismo a marta) constantes
laMitadDelPlaneta=(150,990)
# obtener valor
altura,hanchura=laMitadDelPlaneta
print("altura:",altura)
print("ancho:",hanchura)
#conjuntos osea sets bolsa que destruye repetidos
numeros={21,21,21,2,12,2,12,1,21,21,212,12,12,1,12,121,2,1,212,12}
print(numeros)
a={1,2,3}
b={3,4,5}
#---------------------------OJO -------------------------------------------------
print(a | b)#Se une en uno
print(a & b)# comun
print(a - b)#Quitar comun de b en a 


#El map como funcion de lista // variable = map(funcion,array) map(lambda a: a*5)
#concatenar + crear tuplas ,
def editar(a):
    return "hola " + str(a)
anadirNum= map(lambda a: editar(a),almacen)
print(list(anadirNum))

# Aplicar operación a múltiples listas esto es curioso(*)
nums1 = [1, 2, 3]
nums2 = [10, 20, 30]
sumas = list(map(lambda x, y: x + y, nums1, nums2))
print(sumas)  # [11, 22, 33]
# utilizar el filtre por tipo de un array
cadenas= filter(lambda a: isinstance(a,str) ,almacen)
print(len(list(cadenas)))

# el reduce lul reduce (fucnion ,array,valor Incial)
from functools import reduce
sumaInventario= reduce( lambda a,v: a+v if isinstance( v,int) else  a ,almacen,0)
print(sumaInventario)
