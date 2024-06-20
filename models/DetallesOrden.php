<?php

namespace Model;

class DetallesOrden extends ActiveRecord {

    protected static $tabla = 'detalles_ordenes';
    protected static $columnasDB = ['id', 'id_orden', 'id_producto', 'cantidad', 'precio'];

    public $id;
    public $id_orden;
    public $id_producto;
    public $cantidad;
    public $precio;
    public $nombre;  // Agregar la propiedad nombre

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->id_orden = $args['id_orden'] ?? '';
        $this->id_producto = $args['id_producto'] ?? '';
        $this->cantidad = $args['cantidad'] ?? 0;
        $this->precio = $args['precio'] ?? 0.0;
    }

    public function validar() {
        if(!$this->id_orden) {
            self::$alertas[] = "El ID de la orden es obligatorio";
        }

        if(!$this->id_producto) {
            self::$alertas[] = "El ID del producto es obligatorio";
        }

        if(!$this->cantidad) {
            self::$alertas[] = "La cantidad es obligatoria";
        }

        if(!$this->precio) {
            self::$alertas[] = "El precio es obligatorio";
        }

        return self::$alertas;
    }

    public static function obtenerProductosPorOrden($id_orden) {
        $query = "SELECT p.nombre, do.cantidad 
            FROM " . static::$tabla . " do
            JOIN productos p ON do.id_producto = p.id
            WHERE do.id_orden = " . $id_orden;
        return self::consultarSQL($query);
    }
}


