<?php
$details = mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.UserID=user.UserID WHERE foto.FotoID= '$_GET[id]'");
$data = mysqli_fetch_array($details);
?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <img src="uploads/<?= $data['NamaFile'] ?>" alt="<?= $data['JudulFoto'] ?>" class="object-fit-cover">
                <div class="card-body">
                    <div class="card-tittle mb-0"><?= $data['JudulFoto'] ?><a
                            href="<?php if(isset($_SESSION['user_id'])){echo '?url=like&&id='.$data['FotoID'].'';}else{echo 'login.php';} ?>" class="btn-dark btn-sm">Like</a></div>
                    <small class="text-muted">by:<?= $data['Username'] ?>, <?= $data['TanggalUnggah'] ?></small>
                    <p><?= $data['Deskripsi'] ?></p>
                    <?php 
                    // Ambil data komentar
                    $submit=@$_POST['submit'];
                    if ($submit=='Kirim') {
                        $komentar=@$_POST['komentar'];
                        $foto_id=@$_POST['foto_id'];
                        $user_id=@$_SESSION['user_id'];
                        $tanggal=('y-m-d');
                        $komen=mysqli_query($conn, "INSERT INTO komentar VALUES('','$foto_id','$user_id','$komentar','$tanggal')");
                        header("location: ?url=detail&&id=$foto_id");
                    }
                    ?>
                    <form action="?url=detail" method="post">
                    <div class="form-group d-flex flex-row">
                        <input type="hidden" name="foto_id" value="<?= $data['FotoID'] ?>">
                        <a href="?url=home" class="btn btn-secondary">Kembali</a>
                        <?php 
                        if (isset($_SESSION['user_id'])):?>
                        <input type="text" name="komentar" class="form-control" placeholder="Masukkan Komentar...">
                        <input type="submit" value="Kirim" name="submit" class="btn btn-primary">
                        <?php endif; ?>
                    </div>
                    </form>
                    
                </div>
            </div>
        </div>
        <div class="col-6">

        </div>
    </div>
</div>