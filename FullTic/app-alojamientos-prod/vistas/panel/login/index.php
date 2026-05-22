<?php
?>
<div id="contenedor" class="container-sm">
    <div id="alertas" class="m-5"></div>
    
    <form id="formLogin" action="#" method="post" class="formL needs-validation m-5" novalidate>
        <div class="d-flex flex-column  gap-3 p-5">

            <h1>Acceso administrador</h1>

            <label for="usuario">Usuario</label>
            <input id="usuario" type="text" class="form-control" name="usuario" required>

            <label for="password">Contraseña</label>
            <input id="password" type="password" class="form-control" name="password" required>

            <button type="submit" class="btn btn-primary m-3">Entrar</button>

        </div>
        <!--comun-->
        <script src="<?php echo LIBRERIA_JS . "comun.js" ?>"></script>
        <!--index-->
        <script type="text/javascript" src="<?php echo ROOT_URL . "vistas/panel/login/index.js" ?>"></script>

    </form>

</div>