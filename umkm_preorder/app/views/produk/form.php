<?php include '../app/views/layout/header.php'; ?>

<div class="container mt-4" style="max-width:600px;">
    <h4 class="mb-3"><?= isset($data) ? 'Edit' : 'Tambah' ?> Produk</h4>

    <form
        method="post"
        enctype="multipart/form-data"
        action="<?= BASE_URL ?>produk/<?= isset($data) ? 'update/' . $data['id_produk'] : 'store' ?>"
    >

        <!-- NAMA -->
        <label class="form-label">Nama Produk</label>
        <input type="text" name="nama" class="form-control mb-2"
               value="<?= $data['nama'] ?? '' ?>" required>

        <!-- HARGA -->
        <label class="form-label">Harga</label>
        <input type="number" name="harga" class="form-control mb-2"
               value="<?= $data['harga'] ?? '' ?>" required>

        <!-- DESKRIPSI -->
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control mb-2" rows="3"><?= $data['deskripsi'] ?? '' ?></textarea>

        <!-- GAMBAR -->
        <label class="form-label">Gambar Produk</label>
        <input type="file" name="gambar" class="form-control mb-2" accept="image/*">

        <?php if (isset($data) && !empty($data['gambar'])): ?>
            <div class="mb-3">
                <small class="text-muted">Gambar saat ini:</small><br>
                <img src="<?= BASE_URL ?>assets/gambar/<?= $data['gambar'] ?>"
                     style="width:100%;height:200px;object-fit:contain;background:#f8f9fa;">
                <input type="hidden" name="gambar_lama" value="<?= $data['gambar'] ?>">
            </div>
        <?php else: ?>
            <small class="text-muted">Belum ada gambar (boleh dikosongkan)</small>
        <?php endif; ?>

        <button class="btn btn-success w-100">
            <?= isset($data) ? 'Update' : 'Simpan' ?>
        </button>
    </form>
</div>

<?php include '../app/views/layout/footer.php'; ?>
