<?php require_once '../app/views/layout/header.php'; ?>

<h4 class="mb-3">Pesan Produk</h4>

<div class="card">
    <div class="card-body">
        <form method="post" action="<?= BASE_URL ?>pesanan/store/<?= $produk['id_produk'] ?>">
            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" class="form-control" value="<?= $produk['nama'] ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="text" class="form-control" value="Rp <?= number_format($produk['harga']) ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" min="1" required>
            </div>

            <button class="btn btn-primary">Pesan Sekarang</button>
            <a href="<?= BASE_URL ?>produk" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<?php require_once '../app/views/layout/footer.php'; ?>
