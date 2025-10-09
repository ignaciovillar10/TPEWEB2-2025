<?php
require_once 'config/config.php';
class Categoria {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM categorias ORDER BY id_categoria DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get($id) {
        $stmt = $this->db->prepare('SELECT * FROM categorias WHERE id_categoria = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($nombre) {
        $stmt = $this->db->prepare('INSERT INTO categorias (nombre) VALUES (?)');
        return $stmt->execute([$nombre]);
    }
    public function update($id, $nombre) {
        $stmt = $this->db->prepare('UPDATE categorias SET nombre = ? WHERE id_categoria = ?');
        return $stmt->execute([$nombre, $id]);
    }
    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM categorias WHERE id_categoria = ?');
        return $stmt->execute([$id]);
    }
}
