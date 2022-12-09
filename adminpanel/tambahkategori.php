<?php
    require "session.php";
    require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori - MyHPStore</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>
<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../adminpanel" class="text-decoration-none text-body"> <i class="fa-solid fa-house me-1"></i>Home</a>
                </li>

                <li class="breadcrumb-item">
                    <a href="kategori.php" class="text-decoration-none text-body">Kategori</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">
                    Tambah Kategori
                </li>
            </ol>
        </nav>

        <div class="container mt-5">
            <div class="my-6 col-12 col-md-6">
                <p class="fs-2">Tambah Kategori</p>
                <form action="" method="post">
                    <div>
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" id="kategori" name="kategori" placeholder="Input kategori" class="form-control" autocomplete="off">
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </div>
                </form>

                <?php
                    if(isset($_POST['simpan'])){
                        $kategori = htmlspecialchars($_POST['kategori']);
                        
                        $sudahAda = mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
                        $jumlahKategoriBaru = mysqli_num_rows($sudahAda);
        
                        if($jumlahKategoriBaru > 0){
                            ?>
                            <div class="alert alert-warning" role="alert">
                                Kategori sudah tersedia!
                            </div>
                            <?php
                        }
                        else{
                            $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");
                            if($querySimpan){
                                ?>
                                <div class="alert alert-primary mt-3" role="alert">
                                    Kategori berhasil tersimpan!
                                </div>

                                <meta http-equiv="refresh" content="1; url=kategori.php">
                                <?php
                            }
                            else{
                                echo mysqli_error($con);
                            }
                        }
                    }
                ?>

            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>