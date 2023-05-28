<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Web Ukom</title>
  </head>
  <body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
  <header>
  <nav class="navbar navbar-expand-lg navbar-dark text-white" style="background: linear-gradient(to right, #b92b27, #1565c0);">
  <div class="container">
    <a class="navbar-brand">
    <img src="<?= base_url();?>assets/keqing.jpg" alt="pict" class="rounded-circle" style="width:60px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url();?>Home"?>Home</a>
        </li>
        <li class="nav-item dropdown">
        <?php if($this->session->userdata('akses') == "admin"){ ?>
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Databases
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?php echo base_url().'kelas'?>">Tambah Kelas</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url().'siswa'?>">Tambah Siswa</a></li>
            <li><a class="dropdown-item" href="<?= base_url();?>registrasi"?>Registrasi Akun</a></li>
          </ul>
          <?php } ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url().'Cetak_surat'?>">Cetak Surat</a>
        </li>
        <li class="nav-item">
        <?php if($this->session->userdata('akses') == "khusus"){ ?>
          <a class="nav-link" href="<?php echo base_url('donasi'); ?>">Donasi</a>
          <?php } ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('login'); ?>">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
</html>
