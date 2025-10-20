<?php
session_start();

// Middlewares
require_once './app/middlewares/session.middleware.php';
require_once './app/middlewares/guard.middleware.php';

// Controladores
require_once './app/controllers/AutorizacionController.php';
require_once './app/controllers/UsuarioController.php';
require_once './app/controllers/CategoriaController.php';
require_once './app/controllers/ProductoController.php';

// Definir BASE_URL para redirecciones y base tag
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// Determinar acción solicitada (por defecto 'home')
$action = $_GET['action'] ?? 'home';


$params = explode("/",$action);



// Enrutamiento principal
switch ($params[0]) {
    // Página principal
    case 'home':
        require 'app/views/home.phtml';
        break;
    // ========== USUARIOS ==========
    case 'usuarios':
        (new UsuarioController())->index();
        break;
    case 'usuarios_create':
        (new UsuarioController())->create();
        break;
    case 'usuarios_delete':
        (new UsuarioController())->delete();
        break;

    // ========== CATEGORÍAS ==========
    case 'categorias':
        (new CategoriaController())->index();
        break;
    case 'categorias_create':
        (new CategoriaController())->create();
        break;
    case 'categorias_edit':
        (new CategoriaController())->edit();
        break;
    case 'categorias_delete':
        (new CategoriaController())->delete();
        break;

    // ========== PRODUCTOS ==========
    case 'productos':
        (new ProductoController())->index();
        break;
    case 'detallarProducto':
        if(isset($params[1])){
            (new ProductoController())->getProduct($params[1]);
        }
        break;
    case 'productos_create':
        (new ProductoController())->create();
        break;
    case 'productos_edit':
        (new ProductoController())->edit();
        break;
    case 'productos_delete':
        (new ProductoController())->delete();
        break;

    // ========== AUTENTICACIÓN ==========
    case 'login':
        (new AuthController())->showLogin();
        break;
    case 'do_login':
        (new AuthController())->doLogin();
        break;
    case 'logout':
        (new AuthController())->logout();
        break;
    // ========== REGISTRO ==========
    case 'register':
        (new AuthController())->showRegister();
        break;
    case 'do_register':
        (new AuthController())->doRegister();
        break;

    // ========== ERROR / DEFAULT ==========
    default:
        http_response_code(404);
        echo "<h1>Error 404</h1><p>Acción '<strong>$action</strong>' no encontrada.</p>";
        break;
}
