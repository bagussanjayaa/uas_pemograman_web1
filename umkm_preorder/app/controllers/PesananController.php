<?php
require_once '../app/models/Pesanan.php';
require_once '../app/core/Auth.php';
require_once '../app/models/Produk.php';

class PesananController {

    public function index() {
        Auth::check();
        $data = (new Pesanan())->getAll($_SESSION['user']);
        require_once '../app/views/pesanan/index.php';
    }

    public function create($id_produk) {
        Auth::check();
        $produk = (new Produk())->find($id_produk);
        require_once '../app/views/pesanan/form.php';
    }

    public function store($id_produk) {
        Auth::check();

        $jumlah = (int) $_POST['jumlah'];
        if ($jumlah < 1) {
            die("Jumlah tidak valid");
        }

        (new Pesanan())->insert(
            $_SESSION['user']['id_user'],
            $id_produk,
            $jumlah
        );

        header("Location: " . BASE_URL . "pesanan");
        exit;
    }

    public function edit($id_pesanan) {
        Auth::check();
        if ($_SESSION['user']['role'] !== 'admin') {
            die('Akses ditolak');
        }

        $pesanan = (new Pesanan())->find($id_pesanan);
        require_once '../app/views/pesanan/edit.php';
    }

    public function updateStatus() {
        Auth::admin();

        $id_pesanan = $_POST['id_pesanan'];
        $status = $_POST['status'];

        (new Pesanan())->updateStatus($id_pesanan, $status);

        header("Location: " . BASE_URL . "pesanan");
        exit;
    }

}
