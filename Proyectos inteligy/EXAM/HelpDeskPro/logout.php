<?php
session_start();
//cerrar sesión
session_destroy();
header("location: login.php");