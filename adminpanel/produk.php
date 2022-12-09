<?php
    require "session.php";
    require "../koneksi.php";

    $cekData = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id");
    $jumlahProduk = mysqli_num_rows($cekData);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - MyHPStore</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>
<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../adminpanel" class="text-decoration-none text-body"> <i class="fa-solid fa-house me-1"></i>Home</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">
                    Produk
                </li>
            </ol>
        </nav>

        <div class="mt-2">
            <div class="col-6 text-white lh-1">
                <a class="btn btn-primary" href="tambahproduk.php" role="button">Tambah Produk</a>
            </div>
        </div>

        <div class="mt-4">
            <p class="fs-2">List Produk</p>

            <div class="table-responsive mt-3">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th class="fs-6">No.</th>
                            <th class="fs-6">Nama</th>
                            <th class="fs-6">Kategori</th>
                            <th class="fs-6">Harga</th>
                            <th class="fs-6">Ketersediaan Stok</th>
                            <th class="fs-6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($jumlahProduk == 0){
                        ?>
                            <tr>
                                <td colspan=6 class="text-center">
                                    Data produk tidak tersedia
                                </td>
                            </tr>
                        <?php
                            }
                            else{
                                $number = 1;
                                while($data = mysqli_fetch_array($cekData)){
                        ?>
                                    <tr>
                                        <td><?php echo $number; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['nama_kategori']; ?></td>
                                        <td><?php echo $data['harga']; ?></td>
                                        <td><?php echo $data['ketersediaan_stok']; ?></td>
                                        <td>
                                            <a href="produk-detail.php?p=<?php echo $data['id']?>"><button type="submit" class="btn btn-outline-primary" name="edit-button">Edit</button></a>
                                        </td>
                                    </tr>
                        <?php
                                    $number++;
                                }
                            }
                        ?>
                    </tbody>
                </table>    
            </div>
        </div>
    </div>    
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>