temperatura= float( input("ingresa la temperatura: "))
origen= input("ingresa la unidad de origen(C/F/K): ")
destino= input("ingresa la unidad de destino(C/F/K): ")
if origen == "C" and destino == "F":
    f = (temperatura * 9/5) + 32
    print(f"{temperatura}ºC = {f}ºF")

elif origen == "C" and destino == "K":
    k = temperatura + 273.15
    print(f"{temperatura}ºC = {k}ºK")

elif origen == "F" and destino == "C":
    c = (temperatura - 32) * 5/9
    print(f"{temperatura}ºF = {c}ºC")
    
elif origen == "F" and destino == "K":
    k = (temperatura - 32) * 5/9 + 273.15
    print(f"{temperatura}ºF = {k}ºK")

elif origen == "K" and destino == "C":
    c = temperatura - 273.15
    print(f"{temperatura}ºK = {c}ºC")

elif origen == "K" and destino == "F":
    f = (temperatura - 273.15) * 9/5 + 32
    print(f"{temperatura}ºK = {f}ºF")

else:
    print("Conversión no válida")
