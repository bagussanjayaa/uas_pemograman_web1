<?php require_once '../app/views/layout/header.php'; ?>

<div class="container mt-4">
    <h4>Update Status Pesanan</h4>

    <p><strong>Produk:</strong> <?= $pesanan['nama'] ?></p>
    <p><strong>Jumlah:</strong> <?= $pesanan['jumlah'] ?></p>
    <p><strong>Status Saat Ini:</strong>
        <span class="badge bg-secondary"><?= $pesanan['status'] ?></span>
    </p>

    <form method="post" action="<?= BASE_URL ?>pesanan/updateStatus">
        <input type="hidden" name="id_pesanan" value="<?= $pesanan['id_pesanan'] ?>">

        <select name="status" class="form-select mb-3">
            <option value="Pending"  <?= $pesanan['status']=='Pending'?'selected':'' ?>>Pending</option>
            <option value="Diproses" <?= $pesanan['status']=='Diproses'?'selected':'' ?>>Diproses</option>
            <option value="Selesai"  <?= $pesanan['status']=='Selesai'?'selected':'' ?>>Selesai</option>
        </select>

        <button class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?= BASE_URL ?>pesanan" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php require_once '../app/views/layout/footer.php'; ?>
