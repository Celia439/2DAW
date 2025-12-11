<!Doctype html>
<html>

<head>
    <title>16</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }

        h1 {
            font-family:   "JetBrains Mono ExtraLight";
        }

        .menu {
            background-color: darkseagreen;
            padding: 1em;
            display: flex;
            border: black 2px dotted;
            border-radius: 2em;
            margin: 1em;
        }

        .plato {
            text-align: center;
            width: 50%;
            background-color: paleturquoise;
            padding: 1em;
            margin: 1em;
            border-radius: 2em;
            border: cadetblue solid 1px;
        }

        .contenedor {
            background-color: cornflowerblue;
            width: 95%;
            border-radius: 2em;
            padding: 1em;
        }
        img{
            width: 20em;
        }
    </style>
</head>

<body>

<?php
// menus diferentes del dia cada uno tiene 3 platos.
$carnivoro = array("Alitas de pollo a la barbacoa"
, "Jamón ibérico con pan tostado"
, "Costillas de cerdo glaseadas");
$vegano = array("Hummus con bastones de zanahoria y apio",
        "Croquetas de setas y espinacas",
        "Curry de garbanzos con arroz basmati");
$internacional = array("Nachos con guacamole",
        "Pizza Margarita",
        "Ensalada griega con queso feta y aceitunas");
$precios = array(
        "Alitas de pollo a la barbacoa" => 8.50,
        "Jamón ibérico con pan tostado" => 12.00,
        "Costillas de cerdo glaseadas" => 14.50,
        "Hummus con bastones de zanahoria y apio" => 6.00,
        "Croquetas de setas y espinacas" => 7.50,
        "Curry de garbanzos con arroz basmati" => 9.00,
        "Nachos con guacamole" => 7.00,
        "Pizza Margarita" => 10.00,
        "Ensalada griega con queso feta y aceitunas" => 8.00
);
?>
<!-- MENÚ CARNÍVORO -->
<div class="contenedor">
    <h1>La Tagliatella PHP</h1>
    <div class="menu">
        <h2>MENU CARNIVORO</h2>

        <div class="plato">
            <img src="https://img-global.cpcdn.com/recipes/c2a44b80adee6f86/640x640sq80/photo.webp"
                 alt="Alitas de pollo a la barbacoa" width="200">
            <h3>Alitas de pollo a la barbacoa</h3>
            <p>Precio: 8.50€</p>
        </div>

        <div class="plato">
            <img src="https://img-global.cpcdn.com/recipes/3b8ae3cdd7f527fd/300x426f0.5_0.541176_1.0q80/pan-con-tomaca-y-jamon-iberico-foto-principal.webp"
                 alt="Jamón ibérico con pan tostado" width="200">
            <h3>Jamón ibérico con pan tostado</h3>
            <p>Precio: 12.00€</p>
        </div>

        <div class="plato">
            <img src="https://imgs.search.brave.com/Pwprk3s5naDLES0htvzMHwRKs4l2P8D9a6GMYmLcF5o/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pMC53/cC5jb20vcGFuZGFy/ZXN0YXVyYW50LmVz/L3dwLWNvbnRlbnQv/dXBsb2Fkcy8yMDIx/LzExL0Nvc3RpbGxh/cy1kZS1jZXJkby1n/bGFzZWFkYXMtY29u/LWNoaWxlLXJvam8t/eS1jYWNhaHVldGVz/LXRvc3RhZG9zLmpw/Zz9maXQ9MzAwLDMw/MCZzc2w9MQ"
                 alt="Costillas de cerdo glaseadas" width="200">
            <h3>Costillas de cerdo glaseadas</h3>
            <p>Precio: 14.50€</p>
        </div>
    </div>

    <!-- MENÚ VEGANO -->
    <div class="menu">
        <h2>MENU VEGANO</h2>

        <div class="plato">
            <img src="https://imgs.search.brave.com/hU6YTapNy8Lurf0V11RQJ3v3GWDBjgolOnV8XvXMcmI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pLnBp/bmltZy5jb20vb3Jp/Z2luYWxzL2YxLzJj/L2NlL2YxMmNjZTcx/NjBiOWJjOTVkNGUx/ZmJiNjQ1MDdmMjI0/LmpwZw"
                 alt="Hummus con bastones de zanahoria y apio" width="200">
            <h3>Hummus con bastones de zanahoria y apio</h3>
            <p>Precio: 6.00€</p>
        </div>

        <div class="plato">
            <img src="https://imgs.search.brave.com/6_75qo88d1T43AUzkszBZPH_P0WkrWjso29Z4Bji1hI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWct/Z2xvYmFsLmNwY2Ru/LmNvbS9yZWNpcGVz/LzYwMjNkOTZhYTg5/NDYxMTMvMjQweDMy/MGNxOTAvcGhvdG8u/anBn"
                 alt="Croquetas de setas y espinacas" width="200">
            <h3>Croquetas de setas y espinacas</h3>
            <p>Precio: 7.50€</p>
        </div>

        <div class="plato">
            <img src="https://imgs.search.brave.com/m_cU_n_ww1xZ8vVXkbqTRMGaPzsaMfylFI3l9zceQ20/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWct/Z2xvYmFsLmNwY2Ru/LmNvbS9yZWNpcGVz/LzAxZDQyMDIwNDgy/ZDk2ZDcvMjQweDMy/MGNxOTAvcGhvdG8u/anBn"
                 alt="Curry de garbanzos con arroz basmati" width="200">
            <h3>Curry de garbanzos con arroz basmati</h3>
            <p>Precio: 9.00€</p>
        </div>
    </div>

    <!-- MENÚ INTERNACIONAL -->
    <div class="menu">
        <h2>MENU INTERNACIONAL</h2>

        <div class="plato">
            <img src="https://imgs.search.brave.com/p8-AqGJpj8faIERpdjhrokCunZl-1yBXl8yJ8mBo4gM/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9lMDAt/eGxrLWNvb2tpbmct/ZWxtdW5kby51ZWNk/bi5lcy9maWxlcy9p/bWFnZV80MTRfMjc2/L3VwbG9hZHMvMjAy/My8wMy8wMS82M2Zl/OGVlYjhlMTBlLmpw/ZWc"
                 alt="Nachos con guacamole" width="200">
            <h3>Nachos con guacamole</h3>
            <p>Precio: 7.00€</p>
        </div>

        <div class="plato">
            <img src="https://imgs.search.brave.com/1nEy2TCLgoLJJIfE1WbJHK-yd9hAmf_bDdGIOdB_1dk/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/bGFuYWNpb24uY29t/LmFyL3Jlc2l6ZXIv/djIvbGEtcGl6emEt/bWFyZ2FyaXRhLWxs/ZXZhLWxvcy1jb2xv/cmVzLWRlLWxhLU03/Tlg2Mk9OQUpHUkhN/R1pRS0wzVU1PSUc0/LmpwZWc_YXV0aD05/NWE0ZjBjMThiNDI0/OWY4YTg1YzQzZTg5/ZWQ5NWZjNTZkYmZh/MjJhYzg1Mjk0NTk2/MjI4NWJiM2MyNjM4/NjgwJndpZHRoPTQy/MCZoZWlnaHQ9Mjgw/JnF1YWxpdHk9NzAm/c21hcnQ9dHJ1ZQ"
                 alt="Pizza Margarita" width="200">
            <h3>Pizza Margarita</h3>
            <p>Precio: 10.00€</p>
        </div>

        <div class="plato">
            <img src="https://imgs.search.brave.com/qXqxvleZfadOqQzn9HixYuWD2ObCZuFyfIMFyeofZoc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/bWR6b2wuY29tL3Uv/Zm90b2dyYWZpYXMv/bS8yMDI0LzQvMjAv/Zjg0OHg0NzctMTU4/Mjg5NF8xNjQwNjk3/XzUwNTAucG5n"
                 alt="Ensalada griega con queso feta y aceitunas" width="200">
            <h3>Ensalada griega con queso feta y aceitunas</h3>
            <p>Precio: 8.00€</p>
        </div>
    </div>
</div>
<?php
echo "Tenemos " . (count($carnivoro) + count($vegano) + count($internacional)) . " platos";
?>


</body>

</html>