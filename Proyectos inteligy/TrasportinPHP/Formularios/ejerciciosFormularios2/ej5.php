<!doctype html>
<html>
<head>
    <title>ej5</title>
</head>
<body>
<h2>Ejercicio5</h2>
<!--
//5) Crear un formulario HTML con una lista desplegable de comidas (pizza,
//hamburguesa, sushi, ensalada) y un radio para elegir si le gusta o no. Al
//enviar, una página PHP mostrará un mensaje tipo: "Te gusta la pizza: Sí/No"
-->
<form action="ej5.1.php" method="post" enctype="multipart/form-data">
    <label>Comida
        <select name="menu">
            <option selected>Selectione plato</option>
            <option>Pizza</option>
            <option>hamburgesa</option>
            <option>sushi</option>
            <option>ensalada</option>
        </select>
        <label>Le gusta?
            Si
            <input name="sino" type="radio" value="si">
            No
            <input name="sino" type="radio" value="no">
        </label>
        <input type="submit" value="Comprobar">
        <input type="reset" value="Lipiar Parametros">
</form>
</body>
</html>