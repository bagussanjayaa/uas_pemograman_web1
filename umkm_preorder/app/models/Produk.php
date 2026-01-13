<?php
require_once '../app/core/Database.php';

class Produk {

    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAll($search = '', $page = 1) {
        $limit  = 6;
        $offset = ($page - 1) * $limit;

        $stmt = $this->db->prepare(
            "SELECT * FROM produk
            WHERE nama LIKE ?
            ORDER BY id_produk DESC
            LIMIT $limit OFFSET $offset"
        );
        $stmt->execute(["%$search%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function count($search = '') {
        $stmt = $this->db->prepare(
            "SELECT COUNT(*) FROM produk WHERE nama LIKE ?"
        );
        $stmt->execute(["%$search%"]);
        return $stmt->fetchColumn();
    }

    public function insert($data) {
        $sql = "INSERT INTO produk (nama, harga, deskripsi, gambar)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['nama'],
            $data['harga'],
            $data['deskripsi'],
            $data['gambar']
        ]);
    }


    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM produk WHERE id_produk=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $sql = "UPDATE produk SET
                nama = ?, harga = ?, deskripsi = ?, gambar = ?
                WHERE id_produk = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['nama'],
            $data['harga'],
            $data['deskripsi'],
            $data['gambar'],
            $id
        ]);
    }


    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM produk WHERE id_produk=?");
        $stmt->execute([$id]);
    }
    
}

