<?php
$title = "Laporan";
include "layout/_header.php";

// Sertakan file koneksi database
include "config/connection.php";

// Cek koneksi database
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Tangkap parameter bulan dan tahun dengan validasi
$bulan = isset($_GET['bulan']) ? intval($_GET['bulan']) : date('m');
$tahun = isset($_GET['tahun']) ? intval($_GET['tahun']) : date('Y');

// Pastikan bulan dalam rentang valid
$bulan = ($bulan >= 1 && $bulan <= 12) ? $bulan : date('m');
$tahun = ($tahun >= 2000 && $tahun <= 2100) ? $tahun : date('Y');

// Query laporan pesanan per bulan
$query = "
    SELECT 
        nama, 
        makanan, 
        jumlah_pesanan, 
        total_harga, 
        DATE(created_at) as tanggal_pesanan
    FROM 
        tbl_pesanan
    WHERE 
        MONTH(created_at) = ? 
        AND YEAR(created_at) = ?
    ORDER BY 
        created_at DESC
";

// Persiapkan statement
$stmt = $conn->prepare($query);

// Periksa persiapan query
if (!$stmt) {
    die("Kesalahan persiapan query: " . $conn->error);
}

// Bind parameter dan eksekusi
$stmt->bind_param("ii", $bulan, $tahun);

// Eksekusi query
if (!$stmt->execute()) {
    die("Gagal mengeksekusi query: " . $stmt->error);
}

// Ambil hasil query
$result = $stmt->get_result();

// Periksa hasil query
if (!$result) {
    die("Gagal mendapatkan hasil: " . $conn->error);
}

// Hitung total statistik
$total_pesanan = 0;
$total_pendapatan = 0;
$total_produk = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pesanan Bulanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .report-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 30px;
            margin-top: 30px;
        }
        .filter-section {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
        }
        .table thead {
            background-color: #007bff;
            color: white;
        }
        .table-striped tbody tr:nth-of-type(even) {
            background-color: rgba(0,123,255,0.05);
        }
        .export-buttons .btn {
            margin-right: 10px;
        }
        .total-summary {
            background-color: #e9ecef;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container report-container">
        <h1 class="mb-4 text-center text-primary">
            <i class="bi bi-file-earmark-text me-2"></i>Laporan Pesanan Bulanan
        </h1>
        
        <div class="filter-section">
            <form method="get" class="row g-3 align-items-center">
                <div class="col-md-5">
                    <select name="bulan" class="form-select">
                        <?php 
                        for($m=1; $m<=12; $m++) {
                            $nama_bulan = date('F', mktime(0,0,0,$m,1));
                            $selected = ($m == $bulan) ? 'selected' : '';
                            echo "<option value='$m' $selected>$nama_bulan</option>";
                        }
                        ?>
                    </select>
                </div>
                
                <div class="col-md-5">
                    <select name="tahun" class="form-select">
                        <?php 
                        $tahun_sekarang = date('Y');
                        for($t=$tahun_sekarang; $t>=$tahun_sekarang-5; $t--) {
                            $selected = ($t == $tahun) ? 'selected' : '';
                            echo "<option value='$t' $selected>$t</option>";
                        }
                        ?>
                    </select>
                </div>
                
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-filter me-2"></i>Filter
                    </button>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Makanan</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Periksa apakah ada data
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['makanan'] ?></td>
                                <td><?= $row['jumlah_pesanan'] ?></td>
                                <td>Rp <?= number_format($row['total_harga'], 0, ',', '.') ?></td>
                                <td><?= $row['tanggal_pesanan'] ?></td>
                            </tr>
                            <?php 
                            $total_pesanan++;
                            $total_pendapatan += $row['total_harga'];
                            $total_produk += $row['jumlah_pesanan'];
                        endwhile; 
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>Tidak ada data pesanan untuk bulan ini</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="total-summary row">
            <div class="col-md-4">
                <strong>Total Pesanan:</strong> <?= $total_pesanan ?>
            </div>
            <div class="col-md-4">
                <strong>Total Produk:</strong> <?= $total_produk ?>
            </div>
            <div class="col-md-4">
                <strong>Total Pendapatan:</strong> Rp <?= number_format($total_pendapatan, 0, ',', '.') ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Tutup statement dan koneksi database
$stmt->close();
$conn->close();
?>