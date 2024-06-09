<?php

define("TEMPLATES_URL", __DIR__ . "/templates");
define("FUNCIONES_URL", __DIR__ . "funciones.php");
define("CARPETA_IMAGENES", $_SERVER["DOCUMENT_ROOT"] . "/imagenes/");

function incluirTemplate(string $nombre, bool $inicio = false) {
    include TEMPLATES_URL . "/${nombre}.php";
}

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
    $tipos = ["producto", "orden"];

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

// Validar Administrador
function isAdminLoggedIn() {
    session_start();
    // Verifica si el usuario está autenticado y es administrador
    return isset($_SESSION['login']) && $_SESSION['login'] === true && isset($_SESSION['admin']) && $_SESSION['admin'] === "1";
}