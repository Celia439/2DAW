<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>EcoTrans - Registro</title>
    </head>

    <body>
        <h1>Auditoría de Flota EcoTrans Enterprise</h1>
        
        <form action="resultado.php" method="POST">
            <h3>Entrada de datos:</h3>
            
            <textarea name="datos_raw" rows="6" style="width:100%">
                EL| bcn-1010x  |Furgoneta Reparto|2019-05-10|15000#HI|mad 2020y | Camion Logistica|2023-11-02|5500#EL| sev-3030z |Vehiculo Supervision| 2020-01-15|22000
            </textarea>

            <h3>Filtros de Kilometraje:</h3>
            Mínimo: <input type="number" name="min" value="0">
            Máximo: <input type="number" name="max" value="100000">

            <h3>Equipamiento Extra (Extras):</h3>
            <input type="checkbox" name="extras[]" value="GPS"> GPS
            <input type="checkbox" name="extras[]" value="Sensor de carril"> Sensor de carril
            <input type="checkbox" name="extras[]" value="Cámara 360"> Cámara 360
            <input type="checkbox" name="extras[]" value="ABS"> ABS

            <br><br>
            <button type="submit">Generar Informe</button>
            <button type="reset">Limpiar Formulario</button>
        </button>
        </form>
    </body>
</html>