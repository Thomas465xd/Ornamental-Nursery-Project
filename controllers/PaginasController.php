<?php

namespace Controllers;

use MVC\Router;
use Classes\Email;
use Model\Usuario; // Importa la clase Usuario
use Model\Producto; // Importa la clase Producto

class PaginasController
{
    public static function index(Router $router)
    {

        $router->render("paginas/index", [

        ]);
    }

    public static function nosotros( Router $router ) {
        $router->render('paginas/nosotros', [

        ]);
    }

    public static function productos(Router $router) {

        $productos = Producto::all();

        $router->render('paginas/productos', [
            'productos' => $productos
        ]);
    }

    public static function contacto( Router $router ) {

        $mensaje = null;

        if($_SERVER["REQUEST_METHOD"] === "POST") {

            // Obtener los datos del formulario
            $nombre = $_POST["nombre"] ?? "";
            $correo = $_POST["correo"] ?? "";
            $telefono = $_POST["telefono"] ?? "";
            $asunto = $_POST["asunto"] ?? "";
            $mensajeTexto = $_POST["mensaje"] ?? "";

            // Crear una instancia de php Mailer y enviar el correo electrónico
            $email = new Email($nombre, $correo);
            $mensaje = $email->enviarContacto($nombre, $correo, $telefono, $asunto, $mensajeTexto);
        }

        $router->render('paginas/contacto', [
            "mensaje" => $mensaje
        ]);
    }

    // Cuenta y pedidos

    public static function cuenta( Router $router ) {
        session_start();

        // Asegúrate de que el usuario esté autenticado
        if(!isset($_SESSION['id'])) {
            header('Location: /login');
            return;
        }

        // Recuperar el ID del usuario desde la sesión
        $usuario_id = $_SESSION['id'];
        $usuario = Usuario::find($usuario_id);

        // Verificar si se encontró el usuario
        if(!$usuario) {
            // Redirigir al login o mostrar un error
            header('Location: /login');
            return;
        }

        // Renderizar la vista y pasar el objeto $usuario
        $router->render('cuenta/informacion', [
            'usuario' => $usuario,
            'nombre' => $_SESSION['nombre']
        ]);
    }

    public static function orden( Router $router ) {
        $router->render('cuenta/orden', [

        ]);
    }

    public static function favoritos( Router $router ) {
        $router->render('cuenta/favoritos', [

        ]);
    }

    public static function vaciarCarrito() {
        session_start();
        
        // Asegúrate de que el usuario esté autenticado
        if (!isset($_SESSION['id'])) {
            header('Location: /login');
            return;
        }

        // Vaciar el carrito
        $_SESSION['carrito'] = [];

        // Redirigir a la página del carrito o a la página anterior
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        return;
    }

    // Método para mostrar el carrito
    public static function carrito(Router $router) {
        session_start();
        
        // Asegúrate de que el usuario esté autenticado
        if (!isset($_SESSION['id'])) {
            header('Location: /login');
            return;
        }

        // Recuperar el ID del usuario desde la sesión
        $usuario_id = $_SESSION['id'];
        $usuario = Usuario::find($usuario_id);

        // Verificar si se encontró el usuario
        if (!$usuario) {
            // Redirigir al login o mostrar un error
            header('Location: /login');
            return;
        }

        // Initialize the cart if it doesn't exist
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        $carrito = $_SESSION['carrito'];

        // Process the form submission to add or update items in the cart
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nombre'], $_POST['precio'], $_POST['cantidad'], $_POST['ref'])) {
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];
                $cantidad = (int)$_POST['cantidad'];
                $imagen_url = $_POST['imagen_url'];
                $ref = $_POST['ref'];
                $indice = -1;

                // Find the index of the item in the cart if it exists
                foreach ($carrito as $i => $item) {
                    if ($item['ref'] === $ref) {
                        $indice = $i;
                        break;
                    }
                }

                if ($indice !== -1) {
                    // Existing item, update quantity
                    $carrito[$indice]['cantidad'] += $cantidad;
                } else {
                    // New item, add to cart
                    $carrito[] = [
                        'nombre' => $nombre,
                        'precio' => $precio,
                        'cantidad' => $cantidad,
                        'imagen_url' => $imagen_url,
                        'ref' => $ref
                    ];
                }

                // Update the session cart
                $_SESSION['carrito'] = $carrito;
            }

            // Redirect back to the previous page
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            return;
        }

        $router->render('cuenta/carrito', []);
    }

    public static function compra(Router $router) {
        session_start();
        
        $router->render('/cuenta/compra', [
            "carrito" => $_SESSION['carrito'],
        ]);
    }
}