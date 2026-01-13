<?php
require_once '../app/models/Produk.php';
require_once '../app/core/Auth.php';

class ProdukController {

    public function index() {
        Auth::check(); 

        $search = $_GET['search'] ?? '';
        $page   = $_GET['page'] ?? 1;

        $model = new Produk();

        $produk = $model->getAll($search, $page);
        $total  = $model->count($search);
        $limit  = 5;

        $data = [
            'produk'    => $produk,
            'page'      => $page,
            'totalPage' => ceil($total / $limit),
            'search'    => $search
        ];

        require_once '../app/views/produk/index.php';
    }


    public function create() {
        Auth::admin();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            (new Produk())->insert($_POST);
            header("Location: " . BASE_URL . "produk");
            exit;
        }

        require_once '../app/views/produk/form.php';
    }

    public function edit($id = null) {
        Auth::admin();
        $produk = new Produk();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $produk->update($id, $_POST);
            header("Location: " . BASE_URL . "produk");
            exit;
        }

        $data = $produk->find($id);
        require_once '../app/views/produk/form.php';
    }

    public function store() {

        $gambar = 'no-image.png';

        if (!empty($_FILES['gambar']['name'])) {
            $namaAsli = $_FILES['gambar']['name'];
            $tmp = $_FILES['gambar']['tmp_name'];

            $ext = pathinfo($namaAsli, PATHINFO_EXTENSION);
            $gambar = time() . '_' . uniqid() . '.' . $ext;

            move_uploaded_file($tmp, '../public/assets/gambar/' . $gambar);
        }


        (new Produk())->insert([
            'nama' => $_POST['nama'],
            'harga' => $_POST['harga'],
            'deskripsi' => $_POST['deskripsi'],
            'gambar' => $gambar
        ]);

        header("Location: " . BASE_URL . "produk");
    }

    public function update($id) {

        $produk = (new Produk())->find($id);
        $gambar = $produk['gambar'] ?: 'no-image.png';

        if (!empty($_FILES['gambar']['name'])) {
            $namaAsli = $_FILES['gambar']['name'];
            $tmp = $_FILES['gambar']['tmp_name'];

            $ext = pathinfo($namaAsli, PATHINFO_EXTENSION);
            $gambar = time() . '_' . uniqid() . '.' . $ext;

            move_uploaded_file($tmp, '../public/assets/gambar/' . $gambar);
        }


        (new Produk())->update($id, [
            'nama' => $_POST['nama'],
            'harga' => $_POST['harga'],
            'deskripsi' => $_POST['deskripsi'],
            'gambar' => $gambar
        ]);

        header("Location: " . BASE_URL . "produk");
    }

    public function delete($id) {
        Auth::admin();
        (new Produk())->delete($id);
        header("Location: " . BASE_URL . "produk");
        exit;
    }
    
    public function updateStatus() {
        Auth::check();

        if ($_SESSION['user']['role'] !== 'admin') {
            die("Akses ditolak");
        }

        if (!isset($_POST['id_pesanan'], $_POST['status'])) {
            die("Data tidak lengkap");
        }

        $id_pesanan = $_POST['id_pesanan'];
        $status     = $_POST['status'];

        (new Pesanan())->updateStatus($id_pesanan, $status);

        header("Location: " . BASE_URL . "pesanan");
        exit;
    }

}
