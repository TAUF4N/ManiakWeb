<?php include 'koneksi.php';
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hurricane Website</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body style="min-height: 3000px;">
  <nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top">
    <div class="container">
      <div class="d-flex align-items-center">
        <a class="navbar-brand ms-3" href="?url=home">Hurricane</a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="?url=home">Home</a>
          <?php if (isset($_SESSION['user_id'])): ?>
            <a class="nav-link" href="?url=upload">Upload</a>
            <a class="nav-link" href="?url=album">Album</a>
          <?php endif; ?>
        </div>
        <div class="navbar-nav">
          <?php if (isset($_SESSION['user_id'])): ?>
            <div class="nav-link dropdown">
              <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="assets/img/nasa--hI5dX2ObAs-unsplash.jpg" class="rounded-circle me-2" style="width: 2rem; height: 2rem;">
                <?= ucwords($_SESSION['username']) ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="?url=profil">Profil</a></li>
                <li><a class="dropdown-item" href="?url=logout">Logout</a></li>
              </ul>
            </div>
          <?php else: ?>
            <a class="nav-link" href="login.php">Login</a>
            <a class="nav-link" href="daftar.php">Daftar</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>

  <?php
  $url = @$_GET["url"];
  if ($url == 'home') {
    include 'page/home.php';
  } elseif ($url == 'profil') {
    include 'page/profil.php';
  } elseif ($url == 'upload') {
    include 'page/upload.php';
  } elseif ($url == 'album') {
    include 'page/album.php';
  } elseif ($url == 'detail') {
    include 'page/detail.php';
  } elseif ($url == 'logout') {
    session_destroy();
    header("location: ?url=home");
  } else {
    include 'page/home.php';
  }

  ?>

  <footer class="d-flex flex-wrap justify-content-between align-items-center p-3 mb-0 bg-success border-top fixed-bottom">
    <div class="col-md-4 d-flex align-items-center">
      <a href="" class="mb-3 me-2 mb-md-0 ms-5 text-body-secondary text-
