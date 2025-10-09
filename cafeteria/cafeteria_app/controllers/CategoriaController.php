<?php
require_once 'models/Categoria.php';
class CategoriaController {
    public function index() {
        $m = new Categoria();
        $items = $m->getAll();
        require 'views/categoria/index.php';
    }
    public function create() {
        $m = new Categoria();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $m->create($_POST['nombre']);
            header('Location: index.php?action=categorias');
            exit;
        }
        require 'views/categoria/form.php';
    }
    public function edit() {
        $m = new Categoria();
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: index.php?action=categorias'); exit; }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $m->update($id, $_POST['nombre']);
            header('Location: index.php?action=categorias');
            exit;
        }
        $categoria = $m->get($id);
        require 'views/categoria/form.php';
    }
    public function delete() {
        $m = new Categoria();
        $id = $_GET['id'] ?? null;
        if ($id) { $m->delete($id); }
        header('Location: index.php?action=categorias');
        exit;
    }
}
