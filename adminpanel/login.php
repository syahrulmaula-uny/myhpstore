<?php
    session_start();
    require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - MyHPStore</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<style>
    .main{
        height: 100vh;
    }

    .login-box{
        width: 500px;
        height: 300px;
        box-sizing: border-box;
        border-radius: 10px;
    }
</style>

<body>

    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="w-25 p-3">
            <img src="../image/logo.png" class="img-fluid" alt="MyHPStore">
        </div>
        
        <div class="login-box p-5 shadow mt-4">
            <form action="" method="post">
                <div>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" 
                    id="username">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" 
                    id="password">
                </div>
                <div>
                    <button class="btn btn-success form-control mt-3" 
                    type="submit" name="loginbtn">Login</button>
                </div>
            </form>
        </div>

        <div class="mt-3" style="width: 500px">
            <?php
                if(isset($_POST['loginbtn'])){
                    //echo "submitted"; //Pembuktian submit

                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);

                    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'"); 
                    $countdata = mysqli_num_rows($query);
                    //echo $countdata; //Pembuktian mysqli_num_rows bekerja
                    $data = mysqli_fetch_array($query);

                    if($countdata>0){
                        //echo $data['password']; //Pembuktian mysqli_fetch_array bekerja
                        if (password_verify($password, $data['password'])) {
                            //echo "Password benar"; //ngecek password terverifikasi
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['login'] = true;
                            header('location: ../adminpanel');
                        }
                        else{
                            ?>
                            <div class="alert alert-warning" role="alert">
                                Password Salah!
                            </div>
                            <?php
                        }

                    }
                    else{
                        ?>
                        <div class="alert alert-warning" role="alert">
                            Akun tidak tersedia
                        </div>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>