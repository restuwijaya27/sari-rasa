<?php

// Membuat title halaman
$title = "Beranda";

// Menggabungkan file header
include "layout/_header.php";

?>

<header id="home" class="header">
    <div class="overlay text-white text-center">
        <h1 class="display-2 font-weight-bold my-3">Martabak Sari Rasa</h1>
        <h2 class="display-4 mb-5">Lezatnya Tak Pernah Berakhir!</h2>
    </div>
</header>

<!--  About Section  -->
<div id="about" class="container-fluid wow fadeIn" id="about" data-wow-duration="1.5s">
    <div class="row">
        <div class="col-lg-6 has-img-bg"></div>
        <div class="col-lg-6">
            <div class="row justify-content-center">
                <div class="col-sm-8 py-5 my-5">
                    <h2 class="mb-4">About Us</h2>
                    <style>
                        .justified {
                            text-align: justify;
                        }
                    </style>
                    </head>

                    <body>
                        <p class="justified">
                        "Martabak Sari Rasa, perpaduan sempurna rasa manis dan gurih yang menggoda selera. Dibuat dari bahan berkualitas dan resep istimewa, setiap gigitan menghadirkan kelezatan yang tak terlupakan. Cocok untuk momen spesial atau sekadar memanjakan diri!"    
                        </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  gallary Section  -->
<div id="gallary" class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">


    <!-- book a table Section  -->
    <div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" id="book-table">


        <!-- BLOG Section  -->
        <div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
            <h2 class="section-title py-5">MENU</h2>
            <div class="row justify-content-center">
                <div class="col-sm-7 col-md-4 mb-5">
                    <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#foods" role="tab" aria-controls="pills-home" aria-selected="true">Foods</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card bg-transparent border my-3 my-md-0">
                                <img src="assets/imgs/kepa1.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                                <div class="card-body">
                                    <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">Rp.5.000</a></h1>
                                    <h4 class="pt20 pb20">Reiciendis Laborum </h4>
                                    <p class="text-white">Ketan Kelapa</p>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="card bg-transparent border my-3 my-md-0">
                                <img src="assets/imgs/kj1.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                                <div class="card-body">
                                    <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">Rp.5.000</a></h1>
                                    <h4 class="pt20 pb20">Dicta Deserunt</h4>
                                    <p class="text-white">Keju Coklat</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="card bg-transparent border my-3 my-md-0">
                                <img src="assets/imgs/cklt.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                                <div class="card-body">
                                    <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">Rp.5.000</a></h1>
                                    <h4 class="pt20 pb20">Reiciendis Laborum </h4>
                                    <p class="text-white">Coklat</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-transparent border my-3 my-md-0">
                                <img src="assets/imgs/stw.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                                <div class="card-body">
                                    <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">Rp.5.000</a></h1>
                                    <h4 class="pt20 pb20">Adipisci Totam</h4>
                                    <p class="text-white">strawbery</p>
                                </div>
                            </div>
                        </div>
                    <div>
                        <br>
                    </div>
                       <div class="col-md-3">
                            <div class="card bg-transparent border my-3 my-md-0">
                                <img src="assets/imgs/kc.jpeg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                                <div class="card-body">
                                    <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">Rp.5.000</a></h1>
                                    <h4 class="pt20 pb20">Reiciendis Laborum </h4>
                                    <p class="text-white">Kacang Coklat</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTACT Section  -->
         <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Follow Us</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .social-media {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 20px;
        }
        .social-media a {
            text-decoration: none;
            color: #fff;
            text-align: center;
            font-size: 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 80px; /* Optional for consistent spacing */
        }
        .social-media a i {
            font-size: 30px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body style="background-color: #333; color: #fff; text-align: center;">

<div class="row">
    <h3>ORDER NOW</h3>
    <div class="social-media">
        <a href="https://wa.me/+6288801389682" 
           target="_blank" 
           aria-label="WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
</div>

</body>
</html>


    </div>

    <!-- Include Font Awesome for social media icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


    <?php

    // Menggabungkan file footer
    include "layout/_footer.php";

    ?>