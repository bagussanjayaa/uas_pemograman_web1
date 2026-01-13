<?php
require_once '../app/core/Database.php';

class Pesanan {

    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAll($user) {
        if ($user['role'] === 'admin') {
            $sql = "SELECT ps.id_pesanan, p.nama, ps.jumlah, ps.tanggal, ps.status
                    FROM pesanan ps
                    JOIN produk p ON ps.id_produk = p.id_produk
                    ORDER BY ps.tanggal DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        } else {
            $sql = "SELECT ps.id_pesanan, p.nama, ps.jumlah, ps.tanggal, ps.status
                    FROM pesanan ps
                    JOIN produk p ON ps.id_produk = p.id_produk
                    WHERE ps.id_user = ?
                    ORDER BY ps.tanggal DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$user['id_user']]);
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($id_user, $id_produk, $jumlah) {
        $sql = "INSERT INTO pesanan (id_user, id_produk, jumlah, tanggal, status)
                VALUES (?, ?, ?, NOW(), 'Pending')";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id_user, $id_produk, $jumlah]);
    }


    public function updateStatus($id_pesanan, $status) {
        $sql = "UPDATE pesanan SET status = ? WHERE id_pesanan = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$status, $id_pesanan]);
    }

    public function find($id_pesanan) {
        $sql = "SELECT ps.*, p.nama
                FROM pesanan ps
                JOIN produk p ON ps.id_produk = p.id_produk
                WHERE ps.id_pesanan = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id_pesanan]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
