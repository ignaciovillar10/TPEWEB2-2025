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
        $this->view->showLogin(null);
    }

    public function showRegister() {
        $this->view->showRegister(null);
    }

    public function doLogin() {
        if(empty($_POST['usuario']) || empty($_POST['contrasenia'])) {
            return $this->view->showLogin("Faltan datos obligatorios");
        }

        $user = $_POST['usuario'];
        $password = $_POST['contrasenia'];

        $userFromDB = $this->userModel->getByUser($user);

        if($userFromDB && password_verify($password,$userFromDB->contrasenia)) {
            session_start();
            $_SESSION['USER_ID'] = $userFromDB->id_usuario;
            $_SESSION['USER_NAME'] = $userFromDB->usuario;
            header("Location: ".BASE_URL."home");
        } else {
            return $this->view->showLogin("Usuario o contraseña incorrecta", );
        }
    }



    public function doRegister(){
        if(empty($_POST['usuario']) || empty($_POST['contrasenia'])) {
            return $this->view->showLogin("Faltan datos obligatorios");
        }
        $user = $_POST['usuario'];
        $password = $_POST['contrasenia'];

        $passwordHashed = password_hash($password,PASSWORD_BCRYPT);
        
        $this->userModel->insert($user,$passwordHashed);

        header("Location: ".BASE_URL."login");
    }

    public function logout() {
        session_destroy();
        header("Location: ".BASE_URL."login");
        return;
    }
}