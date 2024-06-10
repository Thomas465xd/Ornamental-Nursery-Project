<?php 

namespace Controllers; 

use MVC\Router;
use Model\Envio;
use Classes\Email;
use Model\Usuario;

use Transbank\Webpay\Webpay;
use Transbank\Webpay\Configuration;
use Transbank\Webpay\WebpayPlus\Transaction;

class ComprasController {
    public static function confirmar(Router $router) {

        $alertas = [];

        // Asegúrate de que el usuario esté autenticado
        if(!isset($_SESSION['id'])) {
            header('Location: /login');
            return;
        }

        // Recuperar el ID del usuario desde la sesión
        $usuario_id = $_SESSION['id'];
        $usuario = Usuario::find($usuario_id);

        // Lista de regiones permitidas (debe coincidir con las definidas en el ENUM de la base de datos)
        $regiones_permitidas = [
            "Arica y Parinacota", "Tarapacá", "Antofagasta", "Atacama", "Coquimbo", "Valparaíso",
            "Metropolitana", "O'Higgins", "Maule", "Ñuble", "Biobío", "Araucanía",
            "Los Ríos", "Los Lagos", "Aysén", "Magallanes y Antártica Chilena"
        ];

        // Verificar si se encontró el usuario
        if(!$usuario) {
            // Redirigir al login o mostrar un error
            header('Location: /login');
            return;
        }

        // Verificar si hay datos de envío para el usuario
        $envio = Envio::where('id_usuario', $usuario_id);


        // Verificar si se ha enviado el formulario de envío
        if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST['formulario'] === 'datos_envio') {
            //debug($_POST);

            // Lógica para manejar los datos de envío
            $envio->sincronizar($_POST);
            $alertas = $envio->validar();

            //debug($alertas);

            if (empty($alertas)) {
                // Procesar los datos de envío si la validación es exitosa
                $direccion = $_POST['direccion_envio'];
                $ciudad = $_POST['ciudad'];
                $codigo_postal = $_POST['codigo_postal'];
                $region = $_POST['region'];

                if ($envio) {
                    // Si existe un registro de envío para el usuario, actualizar los datos
                    $envio->direccion_envio = $direccion;
                    $envio->ciudad = $ciudad;
                    $envio->codigo_postal = $codigo_postal;
                    $envio->region = $region;
                    $envio->guardar();
                } else {
                    // Si no existe un registro de envío, crear uno nuevo
                    $nuevo_envio = new Envio([
                        'id_usuario' => $usuario_id,
                        'direccion_envio' => $direccion,
                        'ciudad' => $ciudad,
                        'codigo_postal' => $codigo_postal,
                        'region' => $region
                    ]);

                    $nuevo_envio->guardar();
                }

                // Alerta de éxito para los datos de envío
                Envio::setAlerta("exito", "Los datos de envío se han actualizado correctamente.");
                $alertas = $envio->getAlertas();
            } else {
                // Alerta de error para los datos de envío
                Envio::setAlerta("error", "Todos los Campos de envío son obligatorios.");
                $alertas = $envio->getAlertas();
            };
        }

        // Obtener el carrito de la sesión
        $carrito = $_SESSION['carrito'];

        $router->render('/cuenta/confirmar', [
            "carrito" => $carrito,
            "envio" => $envio,
            "regiones_permitidas" => $regiones_permitidas,
            "alertas" => $alertas
        ]); 
    }

    // Procesar la compra
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