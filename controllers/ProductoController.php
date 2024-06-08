<?php

namespace Controllers;

use MVC\Router;
use Model\Producto;
use Intervention\Image\ImageManagerStatic as Image;

class ProductoController {
    public static function index(Router $router) {

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

        $producto = new Producto();

        // Ejecutar el código despúes de que el usuario envía el formulario
        if($_SERVER["REQUEST_METHOD"] === "POST") {

            // Crea una nueva instancia
            $producto = new Producto($_POST["producto"]);

            /** Subida de archivos */


            // Generar un nombre único
            $nombreImagen = md5( uniqid(rand(), true) ) . ".jpg";

            // Setear la imagen
            // Realiza un resize a la imagen con intervention
            if($_FILES["producto"]["tmp_name"]["imagen"]) {

                $image = Image::make($_FILES["prducto"]["tmp_name"]["imagen"])->fit(800, 600);
                $producto->setImagen($nombreImagen);

            }

            // Validar
            $errores = $producto->validar() ;

            if(empty($errores)) {

                // Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                // Guarda en la BD
                $producto->guardar();
            }
        }
        
        $router->render("producto/crear", [
            "producto" => $producto,
            "errores" => $errores
        ]);
    }
    
    public static function actualizar(Router $router) {
        
        $id = validarORedireccionar("/admin"); 
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
            if($_FILES["producto"]["tmp_name"]["imagen"]) {

            $image = Image::make($_FILES["producto"]["tmp_name"]["imagen"])->fit(800, 600);
            $producto->setImagen($nombreImagen);

        }

        // Revisar que el array de errores este vacío
        if (empty($errores)) {
            // Almacenar la imagen
            if ($_FILES['producto']['tmp_name']['imagen']){
                $image->save(CARPETA_IMAGENES . $nombreImagen);
            }

            $producto->guardar();
        }
    }

        $router->render("/producto/actualizar", [
            "producto" => $producto,
            "errores" => $errores,
        ]);
    }

    public static function eliminar(Router $router) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            // Validar Id
            $id = $_POST["id"];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id) {
    
                $tipo = $_POST["tipo"];
    
                if(validarTipoContenido($tipo)) {
                    $producto = Producto::find($id);
                    $producto->eliminar();
                }
            }
        } 
    }
}