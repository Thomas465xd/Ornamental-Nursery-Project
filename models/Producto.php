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
}