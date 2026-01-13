<?php require_once '../app/views/layout/header.php'; ?>

<div class="container mt-4">
    <h4 class="mb-3">
        <?= ($_SESSION['user']['role'] === 'admin') ? 'Data Pesanan' : 'Pesanan Saya'; ?>
    </h4>

    <table class="table table-bordered align-middle">
        <thead class="table-light text-center">
            <tr>
                <th>Produk</th>
                <th width="90">Jumlah</th>
                <th width="140">Tanggal</th>
                <th width="180">Status</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td class="text-center"><?= $row['jumlah'] ?></td>
                    <td class="text-center"><?= $row['tanggal'] ?></td>
                    <td>
                    <?php if ($_SESSION['user']['role'] === 'admin'): ?>

                    <form method="post" action="<?= BASE_URL ?>pesanan/updateStatus">
                        <input type="hidden" name="id_pesanan" value="<?= $row['id_pesanan'] ?>">

                        <select name="status" class="form-select form-select-sm">
                            <option value="Pending" <?= $row['status']=='Pending'?'selected':'' ?>>Pending</option>
                            <option value="Diproses" <?= $row['status']=='Diproses'?'selected':'' ?>>Diproses</option>
                            <option value="Selesai" <?= $row['status']=='Selesai'?'selected':'' ?>>Selesai</option>
                        </select>

                        <button class="btn btn-primary btn-sm mt-1">Update</button>
                    </form>

                    <?php else: ?>

                    <span class="badge 
                        <?= $row['status']=='Pending' ? 'bg-warning' : 
                            ($row['status']=='Diproses' ? 'bg-info' : 'bg-success') ?>">
                        <?= $row['status'] ?>
                    </span>

                    <?php endif; ?>
                    </td>


                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center text-muted">
                    Belum ada pesanan
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once '../app/views/layout/footer.php'; ?>
