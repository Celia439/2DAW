<?php
//Agenda personal web

//--Sistema de login para acceder a la agenda
//- *formulario de login con usuario y contraseña

/**
 * Función void que muestra el formulario
 */
function mostrarFormulario()
{
    echo "<form action='#' enctype='multipart/form-data' method='post'>
<p>Login :D</p>
<input name='usuario' type='text' placeholder='usuario' />
<input name='pass' type='password' placeholder='contraseña'/>
</form>";
}


/**
 * Función para comprobar que el formulario este correcto
 * @param $usuario
 * @param $pass
 * @return bool
 */
function comprobarLogin($usuario, $pass)
{
    $correcto = false;
    if (preg_match("`^.{3,}$`", $usuario && preg_match("`^.{8,}$`", $pass))) {
        $correcto = true;
    }
    return $correcto;
}

//- *Comprobar credenciales contra la base de datos
//CREATE DATABASE if not EXISTS agendaPersonal;
//use agendaPersonal;
//create table usuarios(
//	nombre varchar(50),
//	rol SET("usuario","administrador"),
//    pass varchar(50)
//);
$conexion = mysqli_connect("Localhost","root","","agendaPersonal");

//- *Sesiones para mantener usuario conectado
//- *una pag de logout que destruya la session
//- *Que no accedas a ninguna página interna sin estar registrado
//--Panel principal donde mostrar eventos de usuario
//- *Que puede hacer un usuario aqui(
//      Crear evento
//      ,Editar evento
//      ,EliminarEvento
//      listar eventos en labla html ordenada por fecha y hora)


//--CRUD de eventos(No admitir fecha pasadas ojo)


//--Recordatorios basado en cookies avisa el más cercano
//- * Al iniciar sesion:
//      -_Comprobar si usuario tiene evento en 24h
//      -   _True:Crear cookie recordatorio=1 que se valida hasta hasta la hora de fin
//      -   _While la cookie existe mostrar “Tienes eventos próximos en las próximas 24 horas.”
//- * Al iniciar supongo en general tenemos que hacer una instancia del  tiempo real  y
//  -_Comparamos fecha y hora con eventos  y mostrar mensaje faltan 3 horas o dos dias


//--vista semanal generada por array multidimensionales


//al realizar este punto cargar todos los eventos guardados en la base de datos
//      listar eventos en labla html ordenada por fecha y hora
//Creamos un array de objetos eventos  ordenado por fecha y hora antes de mostrar
//UNA VEZ TERMINAS ESTA REALIZAS LA OTRA FORMA ARRAY MULTIDIMENSIONAL VISTA SEMANAL
//DE LUNES A DOMINGO FRANJAS HORARIAS  REPRESENTACION DESDE UN ARRAY $AGENDAsEMANA[DIA][HORA]=EVENTO /NULL Y SE MUESTRA EN HTML TABLA CALENDARIO
//POR ULTIMO (FILTRO POR CATEGORIA)
//BUSCADOR DE EVENTO POR TEXTO
//VISTA MENSUAL?
//AÑADIR CHECK CON EVENTOS IMPORTANTES
//EXPORTARLOS A UN JSON


//--Una clase evento que encapsule su loguica
//- * Atributos: (Titulo STR,Descripción TEXT,Fecha date? o str,Hora str,Categoria( supongo que un select o array(ej.: trabajo, estudio, ocio, personal) ) )
class   Evento
{
    private $titulo;
    private $descripcion;
    private $fecha;
    private $hora;
    private $categoria;

    /**
     * Cosntructor de evento
     * @param $categoria
     * @param $hora
     * @param $fecha
     * @param $descripcion
     * @param $titulo
     */
    public function __construct($categoria, $hora, $fecha, $descripcion, $titulo)
    {
        $this->categoria = $categoria;
        $this->hora = $hora;
        $this->fecha = $fecha;
        $this->descripcion = $descripcion;
        $this->titulo = $titulo;
    }

    /**
     * Si faltan menos de 24 horas a este evento dará true o false
     * @return true
     */
    function esProximo()
    {
        return true;
    }

    /**
     * Devuelve la fecha como DateTime para realizar operaciones con ella
     * @return void
     */
    function getFechaCompleta()
    {

    }

}