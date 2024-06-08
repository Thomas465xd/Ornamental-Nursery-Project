<?php

function debug($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

// Validar tipo de contenido
function validarTipoContenido($tipo) {
    $tipos = ["vendedor", "propiedad"];

    return in_array($tipo, $tipos);
}

// Muestra los mensajes
function mostrarNotificacion($codigo) {
    $mensaje = "";

    switch ($codigo) {
        case 1:
            $mensaje = "Registro Creado Correctamente";
            break;

        case 2:
            $mensaje = "Registro Actualizado Correctamente";
            break;

        case 3:
            $mensaje = "Registro Eliminado Correctamente";
            break;

        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}

function validarORedireccionar(string $url ) {
    // Validar por un id valido
    $id = $_GET["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if(!$id) {
        header("Location: ${url}");
    }

    return $id;
}