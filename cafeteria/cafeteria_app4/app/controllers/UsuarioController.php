<?php
require_once 'app/models/Usuario.model.php';
class UsuarioController {

    public function index() {
        $m = new UserModel();
        $usuarios = $m->getAll();
        require 'app/views/usuario/index.php';
    }
    public function create() {
        $m = new UserModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // model defines insert(), so call it and hash the password
            $nombre = $_POST['nombre'] ?? '';
            $apellido = $_POST['apellido'] ?? '';
            $hash = password_hash($apellido, PASSWORD_DEFAULT);
            $m->insert($nombre, $hash);
            header('Location: index.php?action=usuarios');
            exit;
        }
        require 'app/views/usuario/form.php';
    }
    public function edit() {
        $m = new UserModel();
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: index.php?action=usuarios'); exit; }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Model has no update(), perform a minimal update here to avoid modifying the model
            $nombre = $_POST['nombre'] ?? '';
            $apellido = $_POST['apellido'] ?? '';
            $hash = password_hash($apellido, PASSWORD_DEFAULT);
            try {
                $db = new PDO('mysql:host=localhost;dbname=cafeteria;charset=utf8', 'root', '');
                $stmt = $db->prepare("UPDATE usuarios SET usuario = ?, contraseña = ? WHERE id = ?");
                $stmt->execute([$nombre, $hash, $id]);
            } catch (Exception $e) {
                // optionally log the error
            }
            header('Location: index.php?action=usuarios');
            exit;
        }
        $usuario = $m->get($id);
        require 'app/views/usuario/form.php';
    }
    public function delete() {
        $m = new UserModel();
        $id = $_GET['id'] ?? null;
        if ($id) {
            // Model has no delete(), execute minimal delete here
            try {
                $db = new PDO('mysql:host=localhost;dbname=cafeteria;charset=utf8', 'root', '');
                $stmt = $db->prepare('DELETE FROM usuarios WHERE id = ?');
                $stmt->execute([$id]);
            } catch (Exception $e) {
                // optionally log the error
            }
        }
        header('Location: index.php?action=usuarios');
        exit;
    }
}
