<?php require_once '../app/views/layout/header.php'; ?>

<h4 class="mb-3">Daftar Produk</h4>

<!-- FORM SEARCH -->
<form class="mb-3" method="get">
    <div class="input-group">
        <input type="text"
               name="search"
               class="form-control"
               placeholder="Cari produk..."
               value="<?= htmlspecialchars($data['search'] ?? '') ?>">
        <button class="btn btn-primary">Cari</button>
    </div>
</form>

<!-- LIST PRODUK -->
<div class="row row-cols-1 row-cols-md-3 g-3">
<?php if (!empty($data['produk'])): ?>
    <?php foreach ($data['produk'] as $p): ?>
        <div class="col">
            <div class="card h-100 shadow-sm">

                <!-- GAMBAR -->
                <img src="<?= BASE_URL ?>assets/gambar/<?= $p['gambar'] ?: 'no-image.png' ?>"
                     class="card-img-top"
                     style="height:220px;object-fit:contain;background:#f8f9fa;">

                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($p['nama']) ?></h5>
                    <p class="card-text small text-muted">
                        <?= htmlspecialchars($p['deskripsi']) ?>
                    </p>
                    <p class="fw-bold text-success">
                        Rp <?= number_format($p['harga'], 0, ',', '.') ?>
                    </p>
                </div>

                <div class="card-footer bg-white">
                    <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                        <a href="<?= BASE_URL ?>produk/edit/<?= $p['id_produk'] ?>"
                           class="btn btn-warning btn-sm">Edit</a>

                        <a href="<?= BASE_URL ?>produk/delete/<?= $p['id_produk'] ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Hapus produk?')">
                           Hapus
                        </a>
                    <?php else: ?>
                        <a href="<?= BASE_URL ?>pesanan/create/<?= $p['id_produk'] ?>"
                           class="btn btn-primary btn-sm w-100">
                           Pesan
                        </a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="col-12">
        <div class="alert alert-warning text-center">
            Produk tidak ditemukan.
        </div>
    </div>
<?php endif; ?>
</div>

<!-- PAGINATION -->
<?php if (($data['totalPage'] ?? 1) > 1): ?>
<nav class="mt-4">
    <ul class="pagination justify-content-center">

        <!-- PREV -->
        <li class="page-item <?= ($data['page'] <= 1) ? 'disabled' : '' ?>">
            <a class="page-link"
               href="?page=<?= $data['page'] - 1 ?>&search=<?= urlencode($data['search']) ?>">
               &laquo;
            </a>
        </li>

        <!-- NUMBER -->
        <?php for ($i = 1; $i <= $data['totalPage']; $i++): ?>
            <li class="page-item <?= ($i == $data['page']) ? 'active' : '' ?>">
                <a class="page-link"
                   href="?page=<?= $i ?>&search=<?= urlencode($data['search']) ?>">
                   <?= $i ?>
                </a>
            </li>
        <?php endfor; ?>

        <!-- NEXT -->
        <li class="page-item <?= ($data['page'] >= $data['totalPage']) ? 'disabled' : '' ?>">
            <a class="page-link"
               href="?page=<?= $data['page'] + 1 ?>&search=<?= urlencode($data['search']) ?>">
               &raquo;
            </a>
        </li>

    </ul>
</nav>
<?php endif; ?>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
