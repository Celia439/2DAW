<?php

class Database {

    public static function conectar() {
        $mysqli = new mysqli("localhost", "root", "", "biblioteca");
        $mysqli->set_charset("utf8");
        
        return $mysqli;
    }
}
