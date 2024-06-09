<?php

namespace Model;

class Orden extends ActiveRecord {

    protected static $tabla = 'ordenes';
    protected static $columnasDB = ['id', 'id_usuario', 'fecha_orden', 'total', 'estado', 'metodo_pago'];

    public $id;
    public $id_usuario;
    public $fecha_orden;
    public $total;
    public $estado;
    public $metodo_pago;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->id_usuario = $args['id_usuario'] ?? '';
        $this->fecha_orden = $args['fecha_orden'] ?? date('Y-m-d H:i:s');
        $this->total = $args['total'] ?? 0.0;
        $this->estado = $args['estado'] ?? 'Pendiente';
        $this->metodo_pago = $args['metodo_pago'] ?? '';
    }

    public function validar() {
        if(!$this->id_usuario) {
            self::$alertas[] = "El ID del usuario es obligatorio";
        }

        if(!$this->total) {
            self::$alertas[] = "El total de la orden es obligatorio";
        }

        if(!$this->estado) {
            self::$alertas[] = "El estado de la orden es obligatorio";
        }

        if(!$this->metodo_pago) {
            self::$alertas[] = "El método de pago es obligatorio";
        }

        return self::$alertas;
    }
}
?>