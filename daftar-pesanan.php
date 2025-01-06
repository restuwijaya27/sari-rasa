<?php 
$title = "Daftar Pesanan";
include "config/connection.php";
include "layout/_header.php";

$pesan = '';

$query = mysqli_query($conn, "SELECT * FROM tbl_pesanan ORDER BY id DESC");
?>

<div class="container-fluid px-4 py-4">
    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                <i class="fas fa-list-alt me-2"></i>Daftar Pesanan
            </h4>
            <a href="pemesanan_menu.php" class="btn btn-light btn-sm">
                <i class="fas fa-plus me-1"></i>Tambah Pesanan
            </a>
        </div>
        
        <div class="card-body">
            <?php 
            if (isset($_GET['pesan'])) {
                echo '<div class="alert alert-soft-primary alert-dismissible fade show" role="alert">' . 
                     htmlspecialchars($_GET['pesan']) . 
                     '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
            ?>
            
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Pemesan</th>
                            <th>Makanan</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Waktu Pesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr>
                            <td class="text-center fw-bold"><?= htmlspecialchars($i++) ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-primary text-white me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <?= strtoupper(substr(htmlspecialchars($data['nama']), 0, 1)) ?>
                                    </div>
                                    <?= htmlspecialchars($data['nama']) ?>
                                </div>
                            </td>
                            <td><?= htmlspecialchars($data['makanan']) ?></td>
                            <td><?= htmlspecialchars($data['jumlah_pesanan']) ?></td>
                            <td class="text-success fw-bold">Rp <?= number_format(htmlspecialchars($data['total_harga']), 0, ',', '.') ?></td>
                            <td><?= htmlspecialchars(date('d M Y H:i', strtotime($data['waktu_pesanan']))) ?></td>
                            
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
                <?php if (mysqli_num_rows($query) == 0): ?>
                <div class="text-center py-4">
                    <img src="assets/img/empty-state.svg" alt="No Orders" class="mb-3" style="max-width: 200px;">
                    <h5 class="text-muted">Belum Ada Pesanan</h5>
                    <p class="text-muted">Silakan tambahkan pesanan baru</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>