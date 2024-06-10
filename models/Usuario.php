<?php 

namespace Model;

class Usuario extends ActiveRecord {
    // Base de datos
    protected static $tabla = "usuarios";
    protected static $columnasDB = ["id", "nombre", "apellido", "email", "password", "admin", "token", "confirmado", "telefono"];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $admin;
    public $token;
    public $confirmado;
    public $telefono;
    //public $fecha_registro;

    public function __construct($args = []) {
        $this->id = $args["id"] ?? null;
        $this->nombre = $args["nombre"] ?? "";
        $this->apellido = $args["apellido"] ?? "";
        $this->email = $args["email"] ?? "";
        $this->password = $args["password"] ?? "";
        $this->admin = $args["admin"] ?? 0;
        $this->token = $args["token"] ?? "";
        $this->confirmado = $args["confirmado"] ?? 0;
        $this->telefono = $args["telefono"] ?? "";
    }

    // Mensajes de Validación para la creación de una cuenta
    public function validarNuevaCuenta() {
        if(!$this->nombre) {
            self::$alertas["error"][] = "El Nombre es Obligatorio";
        }

        if(!$this->apellido) {
            self::$alertas["error"][] = "El Apellido es Obligatorio";
        }

        if(empty($this->telefono)) {
            $alertas[] = "El teléfono es obligatorio.";
        } elseif (!preg_match('/^\d{9}$/', $this->telefono)) {
            $alertas[] = "El teléfono debe estar escrito en el formato 9 1234 5678.";
        }

        if(!$this->email) {
            self::$alertas["error"][] = "El Email es Obligatorio";
        }

        if(!$this->password) {
            self::$alertas["error"][] = "El Password es Obligatorio";
        }
        
        if(strlen($this->password) < 6 ) {
            self::$alertas["error"][] = "El Password debe contener al menos 6 caracteres";
        }

        return self::$alertas;
    }

    public function validarLogin() {
        if(!$this->email) {
            self::$alertas["error"][] = "El Email es obligatorio";
        }

        if(!$this->password) {
            self::$alertas["error"][] = "El Password es obligatorio";
        }

        return self::$alertas;
    }

    public function validarEmail() {
        if(!$this->email) {
            self::$alertas["error"][] = "El email es obligatorio";
        }

        return self::$alertas;
    }

    public function validarPassword() {
        if(!$this->password) {
            self::$alertas["error"][] = "El Password es obligatorio";
        }

        if(strlen($this->password) < 6) {
            self::$alertas["error"][] = "El Password debe tener al menos 6 caracteres";
        }

        return self::$alertas;
    }

    public function validarActualizar() {
        if(!$this->nombre) {
            self::$alertas["error"][] = "El Nombre es obligatorio";
        }

        if(!$this->apellido) {
            self::$alertas["error"][] = "El Apellido es obligatorio";
        }

        // Validación para el teléfono
        if(!$this->telefono) {
            $alertas[] = "El teléfono es obligatorio.";
        } elseif (!preg_match('/^\d{9}$/', $this->telefono)) {
            $alertas[] = "El teléfono debe tener exactamente 9 dígitos.";
        }

        // Validación para el email
        if(empty($this->email)) {
            $alertas[] = "El email es obligatorio.";
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $alertas[] = "El email no es válido.";
        }
        return self::$alertas;
    }

    // Revisa si el usuario ya existe
    public function existeUsuario() {
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1 ";

        $resultado = self::$db->query($query);

        if($resultado->num_rows) {
            self::$alertas["error"][] = "El Usuario ya esta Registrado";
        }

        return $resultado;
    }

    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken() {
        $this->token = uniqid();
    }

    public function comprobarPasswordAndVerificado($password) {

        $resultado = password_verify($password, $this->password);

        if(!$resultado || !$this->confirmado) {
            self::$alertas["error"][] = "Password Incorrecto o tu cuenta no ha sido confirmada";
        } else {
            return true;
        }
    }

}