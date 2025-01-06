<?php

// Memanggil file koneksi database
include "../config/connection.php";

// Cek apakah ada request bertipe POST dengan nama 'pesan'
if (isset($_POST['pesan'])) {

    // Buat variabel penampung data yang dikirim melalui POST
    $nama = $_POST['nama'] ?? '';
    $makanan = $_POST['makanan'] ?? '';
    $jumlah_pesanan = $_POST['jumlah_pesanan'] ?? 0;
    $total = $_POST['total'] ?? 0;

    // Pastikan koneksi database ada
    if ($conn) {
        // Simpan data ke dalam tabel
        $query = "INSERT INTO tbl_pesanan (nama, makanan, jumlah_pesanan, total_harga) 
                  VALUES ('$nama', '$makanan', '$jumlah_pesanan', '$total')";

        // Inisialisasi variabel $result
        $result = mysqli_query($conn, $query);

        // Cek jika query berhasil dijalankan
        if ($result) {
            // Arahkan ke halaman daftar pesanan
            header('Location: ../daftar-pesanan.php');
            exit;
        } else {
            // Jika terjadi error, tampilkan pesan error
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Koneksi database gagal.";
    }
} else {
    echo "Tidak ada data yang dikirim.";
}

?>
