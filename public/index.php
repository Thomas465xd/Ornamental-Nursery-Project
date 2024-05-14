<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PaginasController;

$router = new Router();

// Paginas
$router->get("/", [PaginasController::class, "index"]);




// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();