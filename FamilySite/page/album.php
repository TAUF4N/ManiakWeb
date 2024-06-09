<div class="container mt-2">
    <div class="row">
        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <div class="container-fluid py-3">
                <div class="col-6 col-md-4 col-lg-3">

                </div>
                <!-- <h1 class="display-5 fw-bold">Create Your Name Album😠</h1> -->
                
                <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one
                    in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it
                    to your liking.</p>
                <button class="btn btn-primary btn-lg" type="button">Example button</button>
            </div>
        </div>
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    Halaman Album
                </div>
                <?php
                //Ambil data yang dikirim oleh <form>
                $submit = @$_POST['submit'];
                if ($submit == 'Simpan') {
                    $nama_album = @$_POST['nama_album'];
                    $deskripsi_album = @$_POST['deskripsi_album'];
                    $tanggal = date('y-m-d');
                    $user_id = @$_SESSION['user_id'];
                    $insert = mysqli_query($conn, "INSERT INTO album VALUES('', '$nama_album', '$deskripsi_album', '$tanggal', '$user_id')");
                    if ($insert) {
                        echo 'Berhasil membuat album';
                        echo '<meta http-equiv="refresh" content="0.8; url=?url=album">';
                    } else {
                        echo 'Gagal membuat album!!!';
                        echo '<meta http-equiv="refresh" content="0.8; url=?url=album">';
                    }
                }
                ?>

                <div class="card-body">
                    <h5 class="card-title">Ini adalah halaman Album</h5>
                    <form action="?url=album" method="post">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingInput" placeholder="namaalbum"
                                name="nama_album" required>
                            <label for="floatingInput">Nama Album</label>
                        </div>
                        <div class="form-floating mb-2">
                            <textarea name="deskripsi_album" id="floatingInput" class="form-control" cols="30" rows="5"
                                required></textarea>
                            <label for="floatingInput">Dekripsi Album</label>
                        </div>
                        <button type="submit" value="Simpan" class="btn btn-success mb-2" name="submit">Simpan</button>
                </div>
            </div>
        </div>
    </div>


</div>