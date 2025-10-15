<?php

require_once 'app/models/Producto.model.php';
require_once 'app/models/Categoria.model.php';
class ProductoController {
    public function index() {
        $m = new Producto();
        $productos = $m->getAll();
        require 'app/views/producto/index.php';
    }

    public function getProduct($id){
        $m = new Producto();
        $c = new Categoria();
        $p = $m->get($id);
        require 'app/views/producto/detalle.php';
    }



    public function create() {
        $m = new Producto();
        $cat = new Categoria();
        $categorias = $cat->getAll();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $m->create($_POST['id_categoria'] ?: null, $_POST['nombre'], $_POST['precio'], $_POST['stock']);
            header('Location: index.php?action=productos');
            exit;
        }
        require 'app/views/producto/form.php';
    }
    public function edit() {
        $m = new Producto();
        $cat = new Categoria();
        $categorias = $cat->getAll();
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: index.php?action=productos'); exit; }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $m->update($id, $_POST['id_categoria'] ?: null, $_POST['nombre'], $_POST['precio'], $_POST['stock']);
            header('Location: index.php?action=productos');
            exit;
        }
        $producto = $m->get($id);
        require 'app/views/producto/form.php';
    }
    public function delete() {
        $m = new Producto();
        $id = $_GET['id'] ?? null;
        if ($id) { $m->delete($id); }
        header('Location: index.php?action=productos');
        exit;
    }
}
