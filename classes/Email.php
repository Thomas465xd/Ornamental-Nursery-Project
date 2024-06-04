<?php 

namespace Classes;
use PHPMailer\PHPMailer\PHPMailer;

class Email {
    
    public $nombre;
    public $email;
    public $token;

    public function __construct($nombre, $email, $token = null) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->token = $token;
    }

    public function enviarConfirmacion() {

        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV["EMAIL_HOST"];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV["EMAIL_PORT"];
        $mail->Username = $_ENV["EMAIL_USER"];
        $mail->Password = $_ENV["EMAIL_PASS"];

        $mail->setFrom("cuentas@tresmarias.com");
        $mail->addAddress("cuentas@tresmarias.com", "LasTresMarias.com");
        $mail->Subject = "Confirma tu Cuenta";

        // Set HTML
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";

        /* $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has Creado tu cuenta en App Salon, 
        solo debes confirmarla presionando el siguiente enlace</p>"; 
        $contenido .= "<p>Presiona Aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" 
        . $this->token . "'>Confirmar Cuenta </a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>"; */

        $mail->Body = "
        <html>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap');
        h2 {
            font-size: 25px;
            font-weight: 500;
            line-height: 25px;
        }
    
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
    
        p {
            line-height: 18px;
        }
    
        a {
            position: relative;
            z-index: 0;
            display: inline-block;
            margin: 20px 0;
        }
    
        a button {
            padding: 0.7em 2em;
            font-size: 16px !important;
            font-weight: 500;
            background: #000000;
            color: #ffffff;
            border: none;
            text-transform: uppercase;
            cursor: pointer;
        }
        p span {
            font-size: 12px;
        }
        div p{
            border-bottom: 1px solid #000000;
            border-top: none;
            margin-top: 40px;
        }
    </style>
    <body>
        <h1>Vívero las Tres Marías </h1>
        <h2>¡Gracias por registrarte!</h2>
        <p>Por favor confirma tu correo electrónico para que puedas comenzar a disfrutar de todas las funciones de
            Página Web Vívero Tres Marías</p>
        <a href='" . $_ENV["APP_URL"] . "/confirmar-cuenta?token=" . $this->token . "'><button>Verificar</button></a>
        <p>Si tú no te registraste en Página Web Vivero las Tres Marías, por favor ignora este correo electrónico.</p>
        <div><p></p></div>
        <p><span>Este correo electrónico fue enviado desde una dirección solamente de notificaciones que no puede aceptar correo electrónico entrante. Por favor no respondas a este mensaje.</span></p>
    </body>
    </html>";

        //$mail->Body = $contenido; // Forma sin estilos

        // Enviar el mail
        $mail->send();
    }

    public function enviarInstrucciones() {

        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV["EMAIL_HOST"];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV["EMAIL_PORT"];
        $mail->Username = $_ENV["EMAIL_USER"];
        $mail->Password = $_ENV["EMAIL_PASS"];

        $mail->setFrom("cuentas@tresmarias.com");
        $mail->addAddress("cuentas@tresmarias.com", "AppSalon.com");
        $mail->Subject = "Reestablece tu Contraseña";

        // Set HTML
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";

        /* $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has Creado tu cuenta en App Salon, 
        solo debes confirmarla presionando el siguiente enlace</p>"; 
        $contenido .= "<p>Presiona Aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" 
        . $this->token . "'>Confirmar Cuenta </a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>"; */

        $mail->Body = "
        <html>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap');
        h2 {
            font-size: 25px;
            font-weight: 500;
            line-height: 25px;
        }

        span {
            color: #ff53a9;
        }
    
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
    
        p {
            line-height: 18px;
        }
    
        a {
            position: relative;
            z-index: 0;
            display: inline-block;
            margin: 20px 0;
        }
    
        a button {
            padding: 0.7em 2em;
            font-size: 16px !important;
            font-weight: 500;
            background: #0da6f3;
            color:  #FFFFFF;
            border: none;
            text-transform: uppercase;
            cursor: pointer;
        }
        p span {
            font-size: 12px;
        }
        div p{
            border-bottom: 1px solid #000000;
            border-top: none;
            margin-top: 40px;
        }
    </style>
    <body>
        <h1>Vivero las <span style='color: #ff53a9;'>Tres Marías.</span></h1>
        <h2>Reestablecimiento de Contraseña</h2>
        <p> " . $this->nombre . "Has Solicitado Reestablecer tu Contraseña, sigue el siguiente enlace para hacerlo. </p>
        <a href='" . $_ENV["APP_URL"] . "/recuperar?token=" . $this->token . "'><button>Reestablecer Contraseña</button></a>
        <p>Si tú no has solicitado este reestablecimiento, por favor ignora este correo electrónico.</p>
        <div><p></p></div>
        <p><span>Este correo electrónico fue enviado desde una dirección solamente de notificaciones que no puede aceptar correo electrónico entrante. Por favor no respondas a este mensaje.</span></p>
    </body>
    </html>";

        //$mail->Body = $contenido; // Forma sin estilos

        // Enviar el mail
        $mail->send();
    }

    public function enviarContacto($nombre, $email, $telefono, $asunto, $mensajeTexto) {

        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV["EMAIL_HOST"];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV["EMAIL_PORT"];
        $mail->Username = $_ENV["EMAIL_USER"];
        $mail->Password = $_ENV["EMAIL_PASS"];

        // Configurar el contenido del Email
        $mail->setFrom("admin@tresmarias.com");
        $mail->addAddress("admin@tresmarias.com", "LasTresMarias.com");
        $mail->Subject = "Tienes un Nuevo Mensaje";

        // Habilitar HTML
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";

        // Definir el contenido HTML del correo electrónico con estilos
        $contenido = "
        <html>
        <head>
            <style>
                /* Estilos CSS */
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                }
                .mensaje {
                    border: 1px solid #ccc;
                    padding: 20px;
                    background-color: #fff;
                }
                /* Agrega más estilos según sea necesario */
            </style>
        </head>
        <body>
            <div class='mensaje'>
                <p>Tienes un nuevo mensaje:</p>
                <p><strong>Nombre:</strong> {$nombre}</p>
                <p><strong>Email:</strong> {$email}</p>
                <p><strong>Teléfono:</strong> {$telefono}</p>
                <p><strong>Asunto:</strong> {$asunto}</p>
                <p><strong>Mensaje:</strong> {$mensajeTexto}</p>
            </div>
        </body>
        </html>
        ";

        $mail->Body = $contenido;
        $mail->AltBody = "Esto es texto alternativo sin HTML";

        // Enviar el email
        if($mail->send()) {
            $mensaje = "Mensaje Enviado Correctamente";
        } else {
            $mensaje = "El mensaje no se pudo enviar... Error: {$mail->ErrorInfo}";
        }

        return $mensaje;
    }
} 