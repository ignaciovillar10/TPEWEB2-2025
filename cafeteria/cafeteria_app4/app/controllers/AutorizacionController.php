<?php
require_once './app/models/Usuario.model.php';
require_once './app/views/auth/auth.view.php';

class AuthController {
    private $userModel;
    private $view;

    function __construct() {
        $this->userModel = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function doLogin() {
        if(empty($_POST['user']) || empty($_POST['contrasenia'])) {
            return $this->view->showLogin("Faltan datos obligatorios");
        }

        $user = $_POST['usuario'];
        $password = $_POST['contrasenia'];

        $userFromDB = $this->userModel->getByUser($user);

        if($userFromDB && password_verify($password, $userFromDB->contraseña)) {
            session_start();
            $_SESSION['USER_ID'] = $userFromDB->id;
            $_SESSION['USER_NAME'] = $userFromDB->usuario;
            return;
        } else {
            return $this->view->showLogin("Usuario o contraseña incorrecta", );
        }
    }

    public function logout($request) {
        session_destroy();
        header("Location: ".BASE_URL."login");
        return;
    }
}