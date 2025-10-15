<?php
require_once 'app/config/config.php';
class Producto {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    public function getAll() {
        $stmt = $this->db->query('SELECT p.*, c.nombre as categoria_nombre FROM productos p LEFT JOIN categorias c ON p.id_categoria = c.id_categoria ORDER BY p.id_producto DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get($id) {
        $stmt = $this->db->prepare('SELECT * FROM productos WHERE id_producto = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($id_categoria, $nombre, $precio, $stock) {
        $stmt = $this->db->prepare('INSERT INTO productos (id_categoria, nombre, precio, stock) VALUES (?, ?, ?, ?)');
        return $stmt->execute([$id_categoria ?: null, $nombre, $precio, $stock]);
    }
    public function update($id, $id_categoria, $nombre, $precio, $stock) {
        $stmt = $this->db->prepare('UPDATE productos SET id_categoria = ?, nombre = ?, precio = ?, stock = ? WHERE id_producto = ?');
        return $stmt->execute([$id_categoria ?: null, $nombre, $precio, $stock, $id]);
    }
    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM productos WHERE id_producto = ?');
        return $stmt->execute([$id]);
    }
}
