<?php
$title = "Pemesanan Menu Martabak";
include "layout/_header.php";
?>

<style>
    body {
        background-color: #f0f4f8; /* Soft, light blue-white background */
    }
    .order-container {
        background-color: white;
        box-shadow: 0 10px 25px rgba(44, 62, 80, 0.1);
        border-radius: 20px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }
    .order-container:hover {
        transform: scale(1.02);
    }
    .premium-header {
        background: linear-gradient(135deg, #2980b9, #3498db);
        color: white;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .form-control, .form-select {
        border-radius: 10px;
        border-color: #bdc3c7;
        transition: all 0.3s ease;
    }
    .form-control:focus, .form-select:focus {
        box-shadow: 0 0 10px rgba(41, 128, 185, 0.3);
        border-color: #2980b9;
    }
    .menu-image {
        object-fit: cover;
        width: 100%;
        height: 450px;
        border-radius: 15px;
        transition: transform 0.3s ease;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .menu-image:hover {
        transform: scale(1.05);
    }
    .btn-order {
        background: linear-gradient(135deg, #2980b9, #3498db);
        color: white;
        transition: all 0.3s ease;
        border: none;
    }
    .btn-order:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(41, 128, 185, 0.4);
        background: linear-gradient(135deg, #3498db, #2980b9);
    }
    .btn-secondary {
        background-color: #34495e;
        border-color: #2c3e50;
    }
    .btn-secondary:hover {
        background-color: #2c3e50;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="order-container">
                <div class="premium-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">
                        <i class="fas fa-utensils me-3"></i>Pemesanan Menu Martabak
                    </h2>
                    <div id="live-clock" class="h5 mb-0"></div>
                </div>
                
                <div class="row p-4">
                    <div class="col-lg-7 pe-lg-5">
                        <form action="controller/pemesanan_menu.php" method="post" id="form-pesanan">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label">Nama</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" name="nama" required placeholder="Masukkan Nama" autocomplete="name">
                                    </div>
                                </div>
                                
                                <div class="col-12 mb-3">
                                    <label class="form-label">Pilih Menu</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-utensils"></i></span>
                                        <select name="makanan" class="form-control" id="makanan" required>
                                            <option value="keju coklat">Martabak Keju Coklat</option>
                                            <option value="ketan kelapa">Martabak Ketan Kelapa</option>
                                            <option value="coklat">Martabak Coklat</option>
                                            <option value="strawberry">Martabak Strawberry</option>
                                            <option value="kacang coklat">Martabak Kacang Coklat</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Jumlah Pesanan</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-calculator"></i></span>
                                        <input type="number" class="form-control" name="jumlah_pesanan" value="1" id="jumlah_pesanan" min="1" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Total Harga (Rp)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                        <input type="number" class="form-control" name="total" id="total" required readonly>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-secondary me-2" id="btn-hitung">
                                            <i class="fas fa-calculator me-2"></i>Hitung
                                        </button>
                                        <button type="submit" name="pesan" class="btn btn-order">
                                            <i class="fas fa-shopping-cart me-2"></i>Proses Pesanan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5">
                        <div class="card shadow-sm">
                            <img id="menu-preview-image" src="" class="card-img-top menu-image" alt="Menu Preview">
                            <div class="card-body">
                                <h5 id="menu-preview-title" class="card-title text-center">Pilih Menu</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    const btnHitung = document.getElementById('btn-hitung');
    const inputJumlahPesanan = document.getElementById('jumlah_pesanan');
    const inputTotal = document.getElementById('total');
    const inputMakanan = document.getElementById('makanan');
    const menuPreviewImage = document.getElementById('menu-preview-image');
    const menuPreviewTitle = document.getElementById('menu-preview-title');
    const liveClock = document.getElementById('live-clock');
   
    const hargaPerMakanan = {
        "keju coklat": 5000,
        "ketan kelapa": 5000,
        "coklat": 5000,
        "strawberry": 5000,
        "kacang coklat": 5000
    };

   const martabakImages = {
    "keju coklat": "assets/imgs/kj.jpg",
    "ketan kelapa": "assets/imgs/kepa.jpg",
    "coklat": "assets/imgs/cklt.jpg",
    "strawberry": "assets/imgs/stw.jpg",
    "kacang coklat": "assets/imgs/kc.jpeg"
};


    function hitungTotalHarga(harga, jumlah) {
        return harga * jumlah;
    }

    function updateLiveClock() {
        const now = new Date();
        liveClock.textContent = now.toLocaleTimeString('id-ID', { 
            hour: '2-digit', 
            minute: '2-digit', 
            second: '2-digit' 
        });
    }

    // Initial menu preview
    menuPreviewImage.src = martabakImages[inputMakanan.value];
    menuPreviewTitle.textContent = inputMakanan.options[inputMakanan.selectedIndex].text;

    // Update preview when menu selection changes
    inputMakanan.addEventListener('change', function() {
        const selectedMenu = this.value;
        menuPreviewImage.src = martabakImages[selectedMenu];
        menuPreviewTitle.textContent = this.options[this.selectedIndex].text;
    });

    btnHitung.addEventListener('click', function(){
        const makanan = inputMakanan.value;
        const jumlah = inputJumlahPesanan.value;
        const harga = hargaPerMakanan[makanan];
        const totalHarga = hitungTotalHarga(harga, jumlah);
        
        inputTotal.value = totalHarga;
    });

    // Live clock update
    updateLiveClock();
    setInterval(updateLiveClock, 1000);
});
</script>

<script src="assets/js/app.js"></script>

<?php
include "layout/_footer.php";
?>