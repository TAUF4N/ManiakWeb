<div class="container mt-2">
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    Halaman Uppload
                </div>
                <?php
                // Ambil data dari <form>
                $submit = @$_POST['submit'];
                if ($submit == 'Upload') {
                    $judul_foto = @$_POST['judul_foto'];
                    $deskripsi_foto = @$_POST['deskripsi_foto'];
                    $nama_file = @$_FILES['namafile']['name'];
                    $tmp_foto = @$_FILES['namafile']['tmp_name'];
                    $tanggal = date('y-m-d');
                    $album_id = @$_POST['album_id'];
                    $user_id = @$_SESSION['user_id'];
                    if (move_uploaded_file($tmp_foto, 'uploads/' . $nama_file)) {
                        $insert = mysqli_query($conn, "INSERT INTO foto VALUES('', '$judul_foto', '$deskripsi_foto', '$tanggal', '$nama_file', '$album_id', '$user_id')");
                        echo 'Gambar berhasil di upload';
                        echo '<meta http-equiv="refresh" content="0.8; url=?url=upload">';
                    } else {
                        echo 'Gambar gagal di upload!!!';
                        echo '<meta http-equiv="refresh" content="0.8; url=?url=upload">';
                    }
                }
                //Mencari data album
                $album = mysqli_query($conn, "SELECT * FROM album");
                ?>

                <div class="card-body">
                    <h5 class="card-title">Ini adalah halaman Uppload</h5>
                    <form action="?url=upload" method="post" enctype="multipart/form-data">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingInput" placeholder="judulfoto"
                                name="judul_foto" required>
                            <label for="floatingInput">Judul Foto</label>
                        </div>
                        <div class="form-floating mb-2">
                            <textarea name="deskripsi_foto" id="floatingInput" class="form-control" cols="30"
                                rows="5"></textarea>
                            <label for="floatingInput">Dekripsi Foto</label>
                        </div>
                        <div class="form-group mb-2">
                            <label>Pilih Gambar</label>
                            <input type="file" class="form-control" placeholder="namafile" name="namafile" required>
                            <small class="text-danger">File harus berupa: *.jpg, *.png,*.jpeg *.gif</small>
                        </div>
                        <div class="form-group mb-2">
                            <label>Pilih Album</label>
                            <select name="album_id" class="form-select">
                                <?php foreach ($album as $albums): ?>
                                    <option value="<?= $albums['AlbumID'] ?>"><?= $albums['NamaAlbum'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <input type="submit" value="Upload" name="submit" class="btn btn-success my-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>