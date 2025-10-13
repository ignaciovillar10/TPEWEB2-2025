<?php
require_once './app/middlewares/session.middleware.php';
require_once './app/middlewares/guard.middleware.php';
session_start();

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// accion por defecto si no se envia ninguna
$action = 'home'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}
switch ($action) {
    case 'home':
        require 'views/home.php';
        break;
    // usuarios
    case 'usuarios':
        require 'app/controllers/UsuarioController.php';
        $c = new UsuarioController();
        $c->index();
        break;
    case 'usuarios_create':
        require 'app/controllers/UsuarioController.php';
        $c = new UsuarioController();
        $c->create();
        break; 
    case 'usuarios_delete':
        require 'app/controllers/UsuarioController.php';
        $c = new UsuarioController();
        $c->delete();
        break;
    // categorias
    case 'categorias':
        require 'app/controllers/CategoriaController.php';
        $c = new CategoriaController();
        $c->index();
        break;
    case 'categorias_create':
        require 'app/controllers/CategoriaController.php';
        $c = new CategoriaController();
        $c->create();
        break;
    case 'categorias_edit':
        require 'app/controllers/CategoriaController.php';
        $c = new CategoriaController();
        $c->edit();
        break;
    case 'categorias_delete':
        require 'app/controllers/CategoriaController.php';
        $c = new CategoriaController();
        $c->delete();
        break;
    // productos
    case 'productos':
        require 'app/controllers/ProductoController.php';
        $c = new ProductoController();
        $c->index();
        break;
    case 'productos_create':
        require 'app/controllers/ProductoController.php';
        $c = new ProductoController();
        $c->create();
        break;
    case 'productos_edit':
        require 'app/controllers/ProductoController.php';
        $c = new ProductoController();
        $c->edit();
        break;
    case 'productos_delete':
        require 'app/controllers/ProductoController.php';
        $c = new ProductoController();
        $c->delete();
        break;

      case 'login':
        $controller = new AuthController();
        $controller->showLogin($request);
        break;
    case 'do_login':
        $controller = new AuthController();
        $controller->doLogin($request);
        break;
    case 'logout':
        $request = (new GuardMiddleware())->run($request);
        $controller = new AuthController();
        $controller->logout($request);
        break;
    default:
        echo "Acción no encontrada";
        break;
}
