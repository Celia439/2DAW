<?php
/**
 * Funciones de utilidad comunes
 */

function sanearEntrada($valor) {
    if (is_string($valor)) {
        return trim(htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
    }
    return $valor;
}

function sanearArray($datos) {
    $limpio = [];
    foreach ($datos as $key => $value) {
        $limpio[$key] = sanearEntrada($value);
    }
    return $limpio;
}
