<?php

namespace Controllers;

use MVC\Router;
use Model\Producto;
use Intervention\Image\ImageManagerStatic as Image;

class ProductoController {
    public static function index(Router $router) {
        
        if (!isAdminLoggedIn()) {
            header('Location: /login');
            exit();
        }

        $productos = Producto::all();

        // Arreglo con mensajes de errores
        $errores = Producto::getAlertas();

        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render("producto/admin", [
            "productos" => $productos, 
            "resultado" => $resultado
        ]);
    }

    public static function crear(Router $router) {
        if (!isAdminLoggedIn()) {
            header('Location: /login');
            exit();
        }
    
        $producto = new Producto();
        $errores = [];
    
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $producto = new Producto($_POST["producto"]);
    
            /** Subida de archivos */
    
            // Check if the image is uploaded
            if (isset($_FILES["producto"]["tmp_name"]["imagen_url"]) && $_FILES["producto"]["tmp_name"]["imagen_url"] !== '') {
                // Generate a unique name for the image
                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    
                // Validate the file upload
                if (is_uploaded_file($_FILES["producto"]["tmp_name"]["imagen_url"])) {
                    try {
                        // Resize the image using Intervention Image
                        $image = Image::make($_FILES["producto"]["tmp_name"]["imagen_url"])->fit(800, 600);
                        // Set the image name in the product
                        $producto->imagen_url = $nombreImagen;
                    } catch (\Exception $e) {
                        $errores[] = "Error processing the image: " . $e->getMessage();
                    }
                } else {
                    $errores[] = "The uploaded file is not valid.";
                }
            }
    
            // Validate the product
            $errores = array_merge($errores, $producto->validar());
    
            if (empty($errores)) {
                // Create the directory for images if it doesn't exist
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES, 0755, true);
                }
    
                // Save the image to the server
                if (isset($image)) {
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
    
                // Save the product in the database
                $producto->guardar();

                // Redirect to admin page after successful product creation
                header('Location: /producto/admin');
                exit();
            }
        }
    
        $router->render("producto/crear", [
            "producto" => $producto,
            "errores" => $errores
        ]);
    }    
    
    public static function actualizar(Router $router) {

        if (!isAdminLoggedIn()) {
            header('Location: /login');
            exit();
        }
        
        $id = validarORedireccionar("/producto/admin"); 
        $producto = Producto::find($id);

        $errores = Producto::getAlertas();

        // Método Post para actualizar
        if($_SERVER["REQUEST_METHOD"] === "POST") {

            // Asignar los atributos
            $args = $_POST["producto"];

            $producto->sincronizar($args);

            // Validación
            $errores = $producto->validar();

            // Generar un nombre único
            $nombreImagen = md5( uniqid(rand(), true) ) . ".jpg";
        
            // Subida de archivos
            if($_FILES["producto"]["tmp_name"]["imagen_url"]) {

            $image = Image::make($_FILES["producto"]["tmp_name"]["imagen_url"])->fit(800, 600);
            $producto->setImagen($nombreImagen);

        }

        // Revisar que el array de errores este vacío
        if (empty($errores)) {
            // Almacenar la imagen
            if ($_FILES['producto']['tmp_name']['imagen_url']) {
                $image->save(CARPETA_IMAGENES . $nombreImagen);
            }

            $producto->guardar();

            // Redireccionar al usuario
            header('Location: /producto/admin');
            exit();
        }
    }

        $router->render("/producto/actualizar", [
            "producto" => $producto,
            "errores" => $errores,
        ]);
    }

    public static function eliminar(Router $router) {

        if (!isAdminLoggedIn()) {
            header('Location: /login');
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            // Validar Id
            $id = $_POST["id"];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if ($id) {
                $tipo = $_POST["tipo"];
                if (validarTipoContenido($tipo)) {
                    $producto = Producto::find($id);
                    if ($producto) {
                        $producto->eliminar();
                        header('Location: /producto/admin'); // Redirige después de eliminar
                        exit();
                    } else {
                        echo "Producto no encontrado.";
                    }
                } else {
                    echo "Tipo de contenido no válido.";
                }
            } else {
                echo "ID no válido.";
            }
        } 
    }
}