<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\LoginController;
use Controllers\ComprasController;
use Controllers\PaginasController;
use Controllers\ProductoController;

$router = new Router();

// Paginas
$router->get("/", [PaginasController::class, "index"]);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get("/productos", [PaginasController::class, "productos"]);
$router->get('/producto', [PaginasController::class, 'producto']);
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
$router->get("/crear-cuenta", [LoginController::class, "registrar"]);
$router->post("/crear-cuenta", [LoginController::class, "registrar"]);

// Confirmar la cuenta
$router->get("/confirmar-cuenta", [LoginController::class, "confirmar"]);
$router->get("/mensaje", [LoginController::class, "mensaje"]);

// Cuenta
$router->get("/informacion", [PaginasController::class, "cuenta"]);
$router->post("/informacion", [PaginasController::class, "cuenta"]);

$router->post("/informacion/envio", [PaginasController::class, "envio"]);

// Informacion Pedidos y Carrito
$router->get("/orden", [PaginasController::class, "orden"]);
$router->get("/favoritos", [PaginasController::class, "favoritos"]);

// Carrito y Overview
$router->get("/compra", [PaginasController::class, "compra"]);
$router->post("/compra", [PaginasController::class, "compra"]);

$router->post("/compra/quitar", [PaginasController::class, "quitar"]);
$router->post("/compra/agregar", [PaginasController::class, "agregar"]);

$router->post("/carrito", [PaginasController::class, "carrito"]);

$router->post('/carrito/vaciar', [PaginasController::class, "vaciarCarrito"]);

// Checkout y Pago
$router->get('/confirmar', [ComprasController::class, "confirmar"]);
$router->post('/confirmar', [ComprasController::class, "confirmar"]);

// Administración
$router->get("/producto/admin", [ProductoController::class, "index"]);
$router->get("/producto/crear", [ProductoController::class, "crear"]);
$router->post("/producto/crear", [ProductoController::class, "crear"]);
$router->get("/producto/actualizar", [ProductoController::class, "actualizar"]);
$router->post("/producto/actualizar", [ProductoController::class, "actualizar"]);
$router->post("/producto/eliminar", [ProductoController::class, "eliminar"]);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();