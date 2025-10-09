<?php
require_once 'models/Usuario.php';
class UsuarioController {
    public function index() {
        $m = new Usuario();
        $usuarios = $m->getAll();
        require 'views/usuario/index.php';
    }
    public function create() {
        $m = new Usuario();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $m->create($_POST['nombre'], $_POST['apellido']);
            header('Location: index.php?action=usuarios');
            exit;
        }
        require 'views/usuario/form.php';
    }
    public function edit() {
        $m = new Usuario();
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: index.php?action=usuarios'); exit; }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $m->update($id, $_POST['nombre'], $_POST['apellido']);
            header('Location: index.php?action=usuarios');
            exit;
        }
        $usuario = $m->get($id);
        require 'views/usuario/form.php';
    }
    public function delete() {
        $m = new Usuario();
        $id = $_GET['id'] ?? null;
        if ($id) { $m->delete($id); }
        header('Location: index.php?action=usuarios');
        exit;
    }
}
