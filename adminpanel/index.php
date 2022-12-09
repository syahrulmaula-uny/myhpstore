<?php
    require "session.php";
    require "../koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);
    //echo $jumlahKategori; //ngecek hitung jumlah data di table kategori

    $queryProduk = mysqli_query($con, "SELECT * FROM produk");
    $jumlahProduk = mysqli_num_rows($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - MyHPStore</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    .kotak{
        border: solid;
    }

    .summary-kategori{
        background-color: #0E5E6F;
        border-radius: 8px;
    }

    .summary-produk{
        background-color: #1C6758;
        border-radius: 8px;
    }

    /*.no-decoration{
        text-decoration: none;
    }*/ /*untuk menghilangkan underline pada teks di css*/
</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-house me-1"></i>Home
                </li>
            </ol>
        </nav>
        <p class="fs-3">Halo <?php echo $_SESSION['username']; ?></p>

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="summary-kategori p-4">
                        <div class="row">
                            <div class="col-6">
                                <i class="fa-solid fa-list fa-7x text-white-50"></i>
                            </div>
                            <div class="col-6 text-white lh-1">
                                <h3 class="fs-2 fw-bolder">KATEGORI</h3>
                                <p class="fs-5"><?php echo $jumlahKategori; ?> Kategori</p>
                                <p><a href="kategori.php" class="text-white text-decoration-none">Selengkapnya</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="summary-produk p-4">
                        <div class="row">
                            <div class="col-6">
                                <i class="fa-solid fa-bag-shopping fa-7x text-white-50"></i>
                            </div>
                            <div class="col-6 text-white lh-1">
                                <h3 class="fs-2 fw-bolder">PRODUK</h3>
                                <p class="fs-5"><?php echo $jumlahProduk; ?> Produk</p>
                                <p><a href="produk.php" class="text-white text-decoration-none">Selengkapnya</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>