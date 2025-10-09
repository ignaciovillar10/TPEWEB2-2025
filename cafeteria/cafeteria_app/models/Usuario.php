<?php
require_once 'config/config.php';
class Usuario {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM usuarios ORDER BY id_usuario DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get($id) {
        $stmt = $this->db->prepare('SELECT * FROM usuarios WHERE id_usuario = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($usuario, $contrasenia) {
        $stmt = $this->db->prepare('INSERT INTO usuarios (usuario,contrasenia) VALUES (?, ?)');
        return $stmt->execute([$usuario, $contrasenia]);
    }
    public function update($id, $usuario, $contrasenia) {
        $stmt = $this->db->prepare('UPDATE usuarios SET usuario = ?, contrasenia = ? WHERE id_usuario = ?');
        return $stmt->execute([$usuario,$contrasenia, $id]);
    }
    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM usuarios WHERE id_usuario = ?');
        return $stmt->execute([$id]);
    }
}
