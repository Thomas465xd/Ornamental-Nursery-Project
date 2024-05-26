<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\LoginController;
use Controllers\PaginasController;

$router = new Router();

// Paginas
$router->get("/", [PaginasController::class, "index"]);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/productos', [PaginasController::class, 'productos']);
$router->get('/propiedad', [PaginasController::class, 'propiedad']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

// Iniciar Sesión
$router->get("/login", [LoginController::class, "login"]);
$router->post("/login", [LoginController::class, "login"]);

$router->get("/logout", [LoginController::class, "logout"]);

// Recuperar Password
$router->get("/olvide-password", [LoginController::class, "olvide"]);
$router->post("/olvide-password", [LoginController::class, "olvide"]);
$router->get("/recuperar", [LoginController::class, "recuperar"]);
$router->post("/recuperar", [LoginController::class, "recuperar"]);

// Crear Cuenta
$router->get("/crear-cuenta", [LoginController::class, "crear"]);
$router->post("/crear-cuenta", [LoginController::class, "crear"]);

// Confirmar la cuenta
$router->get("/confirmar-cuenta", [LoginController::class, "confirmar"]);
$router->get("/mensaje", [LoginController::class, "mensaje"]);

// Cuenta
$router->get("/informacion", [PaginasController::class, "cuenta"]);

// Informacion Pedidos y Carrito
$router->get("/orden", [PaginasController::class, "orden"]);
$router->get("/favoritos", [PaginasController::class, "favoritos"]);
$router->get("/carrito", [PaginasController::class, "carrito"]);
$router->post("/carrito", [PaginasController::class, "carrito"]);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();