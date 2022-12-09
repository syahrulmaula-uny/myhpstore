<?php
    require "session.php";
    require "../koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - MyHPStore</title>
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
                    <a href="produk.php" class="text-decoration-none text-body">Produk</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">
                    Tambah Produk
                </li>
            </ol>
        </nav>

        <div class="container mt-5">
            <div class="my-6 col-12 col-md-6">
                <p class="fs-2">Tambah Produk</p>
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mt-2">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select form-control" aria-label=".form-select" required>
                            <option value="">Pilih</option>
                            <?php
                                while($data = mysqli_fetch_array($queryKategori)){
                            ?>
                                    <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mt-2">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" name="harga" required>
                    </div>
                    <div class="mt-2">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>
                    <div class="mt-2">
                    <label for="detail">Detail</label>
                    <div class="form-floating">
                        <textarea name="detail" placeholder="Write a detail here" id="detail" class="form-control"></textarea>
                        <label for="floatingTextarea">Tulis detail</label>
                    </div>
                </div>
                    <div class="mt-2">
                        <label for="ketersediaan_stok">Ketersediaan Stok</label>
                        <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                            <option value="tersedia">Tersedia</option>
                            <option value="habis">Habis</option>
                        </select>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </div>
                </form>

                <?php
                    if(isset($_POST['simpan'])){
                        $nama = htmlspecialchars($_POST['nama']);
                        $kategori = htmlspecialchars($_POST['kategori']);
                        $harga = htmlspecialchars($_POST['harga']);
                        $detail = htmlspecialchars($_POST['detail']);
                        $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);

                        $target_dir = "../image/";
                        $nama_file = basename($_FILES["foto"]["name"]);
                        $target_file = $target_dir . $nama_file;
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        $image_size = $_FILES["foto"]["size"];
                        $random_name = generateRandomString(20);
                        $foto = $random_name . "." . $imageFileType;

                        if($nama=='' || $kategori=='' || $harga==''){
                ?>
                            <div class="alert alert-warning mt-2" role="alert">
                                Nama, Kategori dan Harga wajib diisi!
                            </div>
                <?php
                        }
                        else{
                            if($nama_file!=''){
                                if($image_size > 5000000){
                ?>
                                    <div class="alert alert-warning mt-2" role="alert">
                                        File foto tidak boleh lebih dari 5 MB!
                                    </div>
                <?php 
                                }
                                else{
                                    if($imageFileType!='jpg' && $imageFileType!='png' && $imageFileType!='jpeg' && $imageFileType!='svg'){
                ?>
                                        <div class="alert alert-warning mt-2" role="alert">
                                            File foto wajib bertipe jpg, png, jpeg, atau svg!
                                        </div>
                <?php
                                    }
                                    else{
                                        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $foto);
                                    }
                                }
                            }

                            // query insert to produk
                            $queryTambah = mysqli_query($con, "INSERT INTO produk (kategori_id, nama, harga, foto, detail, ketersediaan_stok) VALUES ('$kategori', '$nama', '$harga', '$foto', '$detail', '$ketersediaan_stok')");
                            
                            if($queryTambah){
                ?>
                                <div class="alert alert-primary mt-3" role="alert">
                                    Produk berhasil tersimpan!
                                </div>

                                <meta http-equiv="refresh" content="1; url=produk.php">
                <?php
                            }
                            else{
                                echo mysqli_error($con);
                            }
                        }
                    }
                ?>
                <div class=" mb-5"></div>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>