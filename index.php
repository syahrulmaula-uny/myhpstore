<?php
    require "koneksi.php";
    $queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 8");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | MyHPStore</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "navbar.php"; ?>

    <!-- banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>MY HP STORE</h1>
            <p class="fs-3">Pencarian</p>
            <div class="col-md-8 offset-md-2">
                <form action="produk.php" method="get">
                    <div class="input-group input-group-lg mb-3">
                        <input type="text" class="form-control" placeholder="Pencarian" aria-label="Pencarian" aria-describedby="Pencarian-produk" name="keyword">
                        <button type="submit" class="btn btn-primary" id="basic-addon2">Telusuri</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- highdarked kategori -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <p class="fs-3 fw-bold">Kategori HP</p>
            <div class="row mt-3">
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="image/samsung.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">Samsung</h4>
                            <p class="card-text text-truncate">Some quick example text to build on the Vivo T1 5G and make up the bulk of the card's content.</p>
                            <a href="produk.php?kategori=Samsung" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="image/vivo.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">Vivo</h4>
                            <p class="card-text text-truncate">Some quick example text to build on the Vivo T1 5G and make up the bulk of the card's content.</p>
                            <a href="produk.php?kategori=Vivo" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="image/oppo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">OPPO</h4>
                            <p class="card-text text-truncate">Some quick example text to build on the Vivo T1 5G and make up the bulk of the card's content.</p>
                            <a href="produk.php?kategori=OPPO" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="image/evercoss.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">Evercoss</h4>
                            <p class="card-text text-truncate">Some quick example text to build on the Vivo T1 5G and make up the bulk of the card's content.</p>
                            <a href="produk.php?kategori=Evercoss" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- tentang kami -->
    <div class="container-fluid warna1 py-5">
        <div class="container text-center">
            <h3>Tentang Kami</h3>
            <p class="fs-5 mt-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus earum enim nostrum, vel adipisci autem vero, deleniti eveniet excepturi reprehenderit at. Quasi praesentium, quis rerum placeat voluptates, eius ratione unde, enim eos voluptatem blanditiis exercitationem. Ipsa optio dolorum nostrum placeat? Ducimus unde fugiat repellendus minus soluta sunt officia, id fugit? Quos odit perferendis quam, non voluptatem, nulla totam delectus dolores nobis facilis laborum modi ab commodi praesentium voluptas beatae vel accusantium ad, natus harum. Exercitationem commodi debitis a porro repudiandae!</p>
        </div>
    </div>

    <!-- produk -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>

            <div class="row mt-5">
                <?php
                while ($data = mysqli_fetch_array($queryProduk)) { ?>
                <div class="col-sm-6 col-md-3 mb-4">
                    <div class="card h-100">
                        <div class="image-box">
                            <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $data['nama']; ?></h4>
                            <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                            <p class="card-text text-harga">Rp <?php echo $data['harga']; ?></p>
                            <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

            <a class="btn btn-outline-primary mt-3" href="produk.php">See More <i class="fa-solid fa-chevron-right"></i></a>

        </div>
    </div>

    <footer class="warna1 text-center text-dark">
    <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-dark btn-floating m-1" href="https://www.facebook.com/syahrul.m.azmi.3" role="button"
                ><i class="fab fa-facebook-f"></i
            ></a>

            <!-- Twitter -->
            <a class="btn btn-outline-dark btn-floating m-1" href="https://twitter.com/syahrulmaula_az" role="button"
                ><i class="fab fa-twitter"></i
            ></a>

            <!-- Google -->
            <a class="btn btn-outline-dark btn-floating m-1" href="syahrulmaulaazmi@gmail.com" role="button"
                ><i class="fab fa-google"></i
            ></a>

            <!-- Instagram -->
            <a class="btn btn-outline-dark btn-floating m-1" href="https://www.instagram.com/syahrulmaula_azmi/?hl=id" role="button"
                ><i class="fab fa-instagram"></i
            ></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-dark" href="">Syahrul Maula 'Azmi</a>
        </div>
    </footer>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>