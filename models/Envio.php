<?php

namespace Model;

class Envio extends ActiveRecord {

    // Base de datos
    protected static $tabla = 'envios';
    protected static $columnasDB = ['id', 'id_usuario', 'direccion_envio', 'ciudad', 'codigo_postal', 'region'];

    // Propiedades del objeto
    public $id;
    public $id_usuario;
    public $direccion_envio;
    public $ciudad;
    public $codigo_postal;
    public $region;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->id_usuario = $args['id_usuario'] ?? '';
        $this->direccion_envio = $args['direccion_envio'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
        $this->codigo_postal = $args['codigo_postal'] ?? '';
        $this->region = $args['region'] ?? '';
    }

    // Validación
    public function validar() {

        if(!$this->id_usuario) {
            self::$alertas[] = "El ID del usuario es obligatorio";
        }

        if(!$this->direccion_envio) {
            self::$alertas[] = "La direccion de envío es obligatoria";
        }

        if(!$this->ciudad) {
            self::$alertas[] = "La Ciudad es obligatoria";
        }

        if(!$this->codigo_postal) {
            self::$alertas[] = "El Código Postal es obligatorio";
        }

        if(!$this->region) {
            self::$alertas[] = "La Región es obligatoria";
        }

        return self::$alertas;
    }
}
