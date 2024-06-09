<?php include 'koneksi.php'; session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurricane Website</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-success">
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center mb-4">
                            <div class="card-tittle">L O G I N</div>
                        </h4>
                        <?php
                        //Ambil data yang dikirimkan oleh <form> dengan method POST
                        $submit=@$_POST['submit'];
                        if ($submit== 'Login') {
                            $username = @$_POST['username'];
                            $password = md5(@$_POST['password']);
                            //Cek apakah username dan password yang di <input> berada didalam database
                            $sql=mysqli_query($conn, "SELECT * FROM user WHERE Username='$username' AND Password='$password' ");
                            $cek=mysqli_num_rows($sql);
                            if ($cek!==0) {
                                //Ambil data dari database untuk membuat session
                                $sesi=mysqli_fetch_array($sql);
                                echo 'Login Berhasil!!!';
                                $_SESSION['username']=$sesi['Username'];
                                $_SESSION['user_id']=$sesi['UserID'];
                                $_SESSION['email']=$sesi['Email'];
                                $_SESSION['nama_lengkap']=$sesi['NamaLengkap'];
                                echo '<meta http-equiv="refresh" content="0.8; url=./">';
                            }else{
                                echo 'Login Gagal!!!';
                                echo '<meta http-equiv="refresh" content="0.8; url=login.php">';
                            }
                        }
                        ?>

                        <form action="login.php" method="POST">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="username"
                                    name="username" required>
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                    name="password" required>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <button type="submit" value="Login" class="btn btn-success mb-2"
                                name="submit">Login</button>
                            <p>Sudah punya Akun? <a href="daftar.php" class="link-danger">Daftar Sekarang</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>