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
require_once './app/controllers/ErrorController.php';

// Definir BASE_URL para redirecciones y base tag
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// Determinar acción solicitada (por defecto 'home')
$action = $_GET['action'] ?? 'home';


$params = explode("/",$action);
$productos= new ProductoController();
$usuarios= new UsuarioController();
$categorias= new CategoriaController();
$auth=new AuthController();
// Enrutamiento principal
switch ($params[0]) {
    // Página principal
    case 'home':
        require 'app/views/home.phtml';
        break;
    // ========== USUARIOS ==========
    case 'usuarios':
        $usuarios->index();
        break;
   // case 'usuarios_create':
      //  $usuarios->create();
     //   break;
    case 'usuarios_delete':
         $usuarios->delete();
        break;

    // ========== CATEGORÍAS ==========
    case 'categorias':
        $categorias->index();
        break;
    case 'categorias_create':
        $categorias->create();
        break;
    case 'categorias_edit':
      $categorias->edit();
        break;
    case 'categorias_delete':
        $categorias->delete();
        break;

    // ========== PRODUCTOS ==========
    case 'productos':
     $productos->index();
        break;
    case 'detallarProducto':
        if(isset($params[1])){
            (new ProductoController())->getProduct($params[1]);
        }
        break;
    case 'productos_create':
        $productos->create();
        break;
    case 'productos_edit':
         $productos->edit();
        break;
    case 'productos_delete':
         $productos->delete();
        break;

    // ========== AUTENTICACIÓN ==========
    case 'login':
        $auth->showLogin();
        break;
    case 'do_login':
        $auth->doLogin();
        break;
    case 'logout':
       $auth->logout();
        break;
    // ========== REGISTRO ==========
    case 'register':
      $auth->showRegister();
        break;
    case 'do_register':
        $auth->doRegister();
        break;

    // ========== ERROR / DEFAULT ==========
    default:
        http_response_code(404);
        $this->view->show('Error 404 Acción no encontrada.');
        break;
}


//7- Cuando elimino una categoria que tiene items o productos dentro de la misma deben manejar una mensaje mas amigable para el usuario mostrando algo y evitar que aparezca el error directo de la base de datos. (-0,5 pts).
//en el apartado de imágenes les descuento lo que es del echo y el msj de eliminar categoria (-1,5pts).


