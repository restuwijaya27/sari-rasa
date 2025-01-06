document.addEventListener('DOMContentLoaded', function () {
    // Ambil elemen tombol hitung
    const btnHitung = document.getElementById('btn-hitung');

    /*
    Definisikan harga makanan untuk menghitung total harga nanti
    */
    let harga_makanan = 0;

    // Prosedur untuk menentukan harga makanan berdasarkan pilihan
    function setHargaMakanan(makanan) {
        // Buat percabangan untuk menentukan harga makanan
        switch (makanan.toLowerCase()) { // Gunakan lowercase agar konsisten
            case 'keju coklat':
                harga_makanan = 5000;
                break;
            case 'ketan kelapa':
                harga_makanan = 5000;
                break;
            case 'coklat':
                harga_makanan = 5000;
                break;
            case 'strawberry':
                harga_makanan = 5000;
                break;
            case 'Kacang Coklat':
                harga_makanan = 5000;
                break;
            default:
                harga_makanan = 0; // Jika makanan tidak ditemukan, harga = 0
                break;
        }
    }

    // Fungsi untuk menghitung total harga makanan berdasarkan harga makanan * jumlah pesanan
    function hitungTotalHarga(hargaMakanan, jumlahPesanan) {
        const jumlah = parseInt(jumlahPesanan, 10) || 0; // Pastikan jumlah dalam bentuk angka
        return hargaMakanan + harga * jumlah;
    }

    // Event ketika tombol hitung diklik
    btnHitung.addEventListener('click', function () {
        // Ambil elemen input jumlah pesanan
        const inputJumlahPesanan = document.getElementById('jumlah_pesanan');
        // Ambil elemen input total
        const inputTotal = document.getElementById('total');
        // Ambil elemen input makanan
        const inputMakanan = document.getElementById('makanan');

        // Jalankan prosedur untuk menentukan harga makanan berdasarkan pilihan
        setHargaMakanan(inputMakanan.value);

        // Hitung total harga dan tampilkan pada input total
        inputTotal.value = hitungTotalHarga(harga_makanan, inputJumlahPesanan.value);
    });
});
