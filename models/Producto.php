<?php

namespace Model;

class Producto extends ActiveRecord {

    // Base DE DATOS
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'precio', 'stock', 'imagen_url', 'categoria'];


    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $stock;
    public $imagen_url;
    public $categoria;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->stock = $args['stock'] ?? '';
        $this->imagen_url = $args['imagen_url'] ?? '';
        $this->categoria = $args['categoria'] ?? '';
    }

    // Validar Creacion de Producto
    public function validar() {
        if(!$this->nombre) {
            self::$errores[] ="Debes añadir un Nombre";
        }

        if(!$this->descripcion) {
            self::$errores[] ="La Descripcion del producto es obligatoria";
        }

        if(strlen( $this->descripcion ) < 50 ) {
            self::$errores[] ="Debes añadir una Descripcion mayor a 50 caracteres";
        }

        if(!$this->precio) {
            self::$errores[] ="El precio del producto es obligatorio";
        }

        if(!$this->stock) {
            self::$errores[] ="El stock actual del producto es obligatorio";
        }

        if(!$this->imagen_url) {
            self::$errores[] ="La imagen es obligatoria";
        }

        if(!$this->categoria) {
            self::$errores[] ="Debes seleccionar una categoría para el producto";
        }

        return self::$errores;
    }
}