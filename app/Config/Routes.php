<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Define la ruta para el recurso 'productos'
$routes->resource('productos', ['except' => 'new,edit', 'controller' => 'Productos']);
$routes->resource('usuarios', ['except' => 'new,edit', 'controller' => 'Usuarios']);
$routes->resource( 'carrito', ['except' => 'new,edit', 'controller' => 'Carrito']);
$routes->resource( 'tipoproducto', ['except' => 'new,edit', 'controller' => 'TipoProducto']);
$routes->resource( 'detallecarrito', ['except' => 'new,edit', 'controller' => 'DetalleCarrito']);
