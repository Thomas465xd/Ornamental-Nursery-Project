<?php

namespace Controllers;

use MVC\Router;
use Classes\Email;
use Model\Usuario; // Importa la clase Usuario
use Model\Producto; // Importa la clase Producto
use Transbank\Webpay\Webpay;
use Transbank\Webpay\Configuration;
use Transbank\Webpay\WebpayPlus\Transaction;

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

    public static function producto( Router $router ) {
        // Obtener el ID del producto desde la URL
        $id = $_GET['id'];

        // Obtener los detalles del producto con el ID proporcionado
        $producto = Producto::find($id);

        // Renderizar la plantilla de detalles del producto
        $router->render('paginas/producto', [
            'producto' => $producto
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

        // Verificar si el carrito existe en la sesión
        if (!isset($_SESSION['carrito'])) {
            // Redireccionar al carrito si no hay productos en el carrito
            header('Location: /carrito');
            return;
        }

        // Obtener el carrito de la sesión
        $carrito = $_SESSION['carrito'];

        // Procesar la solicitud de eliminación de un producto del carrito
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar']) && isset($_POST['ref'])) {
            $ref = $_POST['ref'];

            // Encontrar el índice del producto en el carrito
            foreach ($carrito as $i => $producto) {
                if ($producto['ref'] === $ref) {
                    // Disminuir la cantidad del producto en 1
                    $carrito[$i]['cantidad']--;
                    // Si la cantidad llega a 0, eliminar el producto del carrito
                    if ($carrito[$i]['cantidad'] <= 0) {
                        unset($carrito[$i]);
                    }
                    // Actualizar el carrito en la sesión
                    $_SESSION['carrito'] = array_values($carrito);
                    // Redireccionar de vuelta a la página de compra
                    header('Location: /compra');
                    return;
                }
            }
        }

        // Procesar la solicitud de aumento de la cantidad de un producto en el carrito
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregar']) && isset($_POST['ref'])) {
            $ref = $_POST['ref'];

            // Encontrar el índice del producto en el carrito
            foreach ($carrito as $i => $producto) {
                if ($producto['ref'] === $ref) {
                    // Aumentar la cantidad del producto en 1
                    $carrito[$i]['cantidad']++;
                    // Actualizar el carrito en la sesión
                    $_SESSION['carrito'] = $carrito;
                    // Redireccionar de vuelta a la página de compra
                    header('Location: /compra');
                    return;
                }
            }
        }

        // Renderizar la página de compra
        $router->render('/cuenta/compra', [
            "carrito" => $_SESSION['carrito'],
        ]);
    }

    public static function quitar(Router $router) {
        session_start();

        // Verificar si el carrito existe en la sesión
        if (!isset($_SESSION['carrito'])) {
            // Redireccionar al carrito si no hay productos en el carrito
            header('Location: /carrito');
            return;
        }

        // Obtener la referencia del producto a quitar
        $ref = $_POST['ref'];

        // Obtener el carrito de la sesión
        $carrito = $_SESSION['carrito'];

        // Encontrar el índice del producto en el carrito
        foreach ($carrito as $i => $producto) {
            if ($producto['ref'] === $ref) {
                // Disminuir la cantidad del producto en 1
                $carrito[$i]['cantidad']--;
                // Si la cantidad llega a 0, eliminar el producto del carrito
                if ($carrito[$i]['cantidad'] <= 0) {
                    unset($carrito[$i]);
                }
                // Actualizar el carrito en la sesión
                $_SESSION['carrito'] = array_values($carrito);
                // Redireccionar de vuelta a la página de compra
                header('Location: /compra');
                return;
            }
        }
    }

    public static function agregar(Router $router) {
        session_start();
        // Verificar si el carrito existe en la sesión
        if (!isset($_SESSION['carrito'])) {
            // Redireccionar al carrito si no hay productos en el carrito
            header('Location: /carrito');
            return;
        }

        // Obtener la referencia del producto a agregar
        $ref = $_POST['ref'];

        // Obtener el carrito de la sesión
        $carrito = $_SESSION['carrito'];

        // Encontrar el índice del producto en el carrito
        foreach ($carrito as $i => $producto) {
            if ($producto['ref'] === $ref) {
                // Aumentar la cantidad del producto en 1
                $carrito[$i]['cantidad']++;
                // Actualizar el carrito en la sesión
                $_SESSION['carrito'] = $carrito;
                // Redireccionar de vuelta a la página de compra
                header('Location: /compra');
                return;
            }
        }
    }

    public static function confirmar(Router $router) {
        session_start();

        // Obtener el carrito de la sesión
        $carrito = $_SESSION['carrito'];
        
        $router->render('/cuenta/confirmar', [
            "carrito" => $carrito,
        ]);
    }

    public static function procesar(Router $router) {
        session_start();

        // Obtener el carrito de la sesión
        $carrito = $_SESSION['carrito'];
    
        // Configurar las credenciales
        $configuration = new Configuration();
        $configuration->setEnvironment(Configuration::ENVIRONMENT_INTEGRATION); // Modo de integración (pruebas)
        $configuration->setCommerceCode("tu_commerce_code");
        $configuration->setPrivateKey("ruta_a_tu_llave_privada.pem");
        $configuration->setPublicCert("ruta_a_tu_certificado_publico.pem");
        $configuration->setWebpayCert("ruta_a_tu_certificado_webpay.pem");
    
        // Crear una instancia de Webpay
        $webpay = new Webpay($configuration);
    
        // Configurar los parámetros de la transacción
        $buy_order = "orden_de_compra";
        $session_id = session_id();
        $amount = 1000; // Monto en pesos chilenos
        $return_url = "http://tudominio.com/transbank/retorno";
    
        // Iniciar la transacción
        $response = $webpay->getNormalTransaction()->initTransaction($amount, $buy_order, $session_id, $return_url);
    
        // Redireccionar al usuario al formulario de pago de Transbank
        header("Location: " . $response->getUrl());
        exit;
    }
}