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
                            <div class="card-tittle">Daftar Akun!!!</div>
                        </h4>
                        <?php
                        //Ambil data yang dikirimkan oleh <form> dengan method POST
                        $submit = @$_POST['submit'];
                        if ($submit == 'Daftar') {
                            $username = @$_POST['username'];
                            $password = md5(@$_POST['password']);
                            $email = @$_POST['email'];
                            $nama_lengkap = @$_POST['nama_lengkap'];
                            $alamat = @$_POST['alamat'];
                            //Cek apakah ada username dan email yang sama
                            //Jika ada yang sama maka dafatar akun gagal karna username atau email sudah dipakai
                            $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE Username='$username' OR Email='$email' "));
                            if ($cek == 0) {
                                mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password', 'email', '$nama_lengkap', '$alamat')");
                                echo 'Daftar Berhasil, silakan Login!!';
                                echo '<meta http-equiv="refresh" content="0.8; url=login.php">';
                            } else {
                                echo 'Maaf akun sudah ada';
                                echo '<meta http-equiv="refresh" content="0.8; url=daftar.php">';
                            }
                        }
                        ?>

                        <form action="daftar.php" method="POST">
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
                            <div class="form-floating mb-2">
                                <input type="email" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" name="email" required>
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="namalengkap"
                                    name="nama_lengkap" required>
                                <label for="floatingInput">Nama Lengkap</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="alamat"
                                    name="alamat" required>
                                <label for="floatingInput">Alamat</label>
                            </div>
                            <button type="submit" value="Daftar" class="btn btn-success mb-2" name="submit">Daftar</button>
                            <p>Sudah punya Akun? <a href="login.php" class="link-danger">Login Sekarang</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>