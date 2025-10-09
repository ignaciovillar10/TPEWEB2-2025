<?php
class AuthController {
    private $user =$_GET['usuario']; 
    private $pass = $get['clave'];

    public function login() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['usuario'] ?? '';
            $clave = $_POST['clave'] ?? '';

            if ($nombre === $this->user && $clave === $this->pass) {
                $_SESSION['admin'] = true;
                header('Location: index.php');
                exit;
            } else {
                $error = "Usuario o contraseña incorrectos";
            }
        }
        require 'views/auth/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?action=login');
        exit;
    }
}
