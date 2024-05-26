<?php

namespace Controllers;

use MVC\Router;

class PaginasController
{
    public static function index(Router $router)
    {

        $router->render("paginas/index", [

        ]);
    }

    public static function nosotros( Router $router ) {
        $router->render('paginas/nosotros', [

        ]);
    }

    public static function productos( Router $router ) {
        $router->render('paginas/productos', [

        ]);
    }

    public static function contacto( Router $router ) {
        $router->render('paginas/contacto', [

        ]);
    }

    // Cuenta y pedidos

    public static function cuenta( Router $router ) {
        $router->render('cuenta/informacion', [

        ]);
    }

    public static function orden( Router $router ) {
        $router->render('cuenta/orden', [

        ]);
    }

    public static function favoritos( Router $router ) {
        $router->render('cuenta/favoritos', [

        ]);
    }

    public static function carrito( Router $router ) {
        $router->render('cuenta/carrito', [

        ]);
    }
}