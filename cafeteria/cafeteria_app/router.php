<?php
session_start();

$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'home':
        require 'views/home.php';
        break;
    // usuarios
    case 'usuarios':
        require 'controllers/UsuarioController.php';
        $c = new UsuarioController();
        $c->index();
        break;
    case 'usuarios_create':
        require 'controllers/UsuarioController.php';
        $c = new UsuarioController();
        $c->create();
        break; 
    case 'usuarios_delete':
        require 'controllers/UsuarioController.php';
        $c = new UsuarioController();
        $c->delete();
        break;
    // categorias
    case 'categorias':
        require 'controllers/CategoriaController.php';
        $c = new CategoriaController();
        $c->index();
        break;
    case 'categorias_create':
        require 'controllers/CategoriaController.php';
        $c = new CategoriaController();
        $c->create();
        break;
    case 'categorias_edit':
        require 'controllers/CategoriaController.php';
        $c = new CategoriaController();
        $c->edit();
        break;
    case 'categorias_delete':
        require 'controllers/CategoriaController.php';
        $c = new CategoriaController();
        $c->delete();
        break;
    // productos
    case 'productos':
        require 'controllers/ProductoController.php';
        $c = new ProductoController();
        $c->index();
        break;
    case 'productos_create':
        require 'controllers/ProductoController.php';
        $c = new ProductoController();
        $c->create();
        break;
    case 'productos_edit':
        require 'controllers/ProductoController.php';
        $c = new ProductoController();
        $c->edit();
        break;
    case 'productos_delete':
        require 'controllers/ProductoController.php';
        $c = new ProductoController();
        $c->delete();
        break;

    case 'login':
        require 'controllers/AuthController.php';
        $auth = new AuthController();
        $auth->login();
        break;

    case 'logout':
        require 'controllers/AuthController.php';
        $auth = new AuthController();
        $auth->logout();
        break;

    default:
        echo "Acción no encontrada";
        break;
}
