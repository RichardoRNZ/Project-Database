<?php
session_start();
 /*echo "<pre>";
    print_r($_SESSION['keranjang']);
    echo"</pre>";*/
    include "koneksi.php";

    if(empty($_SESSION['keranjang'] ))
    {
        echo"<script>alert('Keranjang kosong');document.location.href='index.php'</script>";  
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio Details - Green Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Green - v4.7.0
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">Tanamyuk@gmail.com</a>
        <i class="bi bi-phone-fill phone-icon"></i> +62 813 110 444
      </div>
      <div class="social-links d-none d-md-block">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Tanam Yuk</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
        <li><a class="nav-link scrollto " href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php">About</a></li>
          <li><a class="nav-link scrollto" href="index.php">Services</a></li>
          <li><a class="nav-link scrollto active " href="portfolio-details-nutrisi.html">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="index.php">Team</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="#about">Login / Sign Up</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Shopping Cart</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Shopping Cart</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    <section class="konten">
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;?>
                    <?php
                    foreach($_SESSION['keranjang'] AS $Produk_Id => $jumlah) :
                        ?>
                        <?php 
                        $ambil= $conn->query("SELECT * FROM produk WHERE Produk_Id='$Produk_Id'");
                        $pecah=$ambil->fetch_assoc();
                        $total=$pecah['HargaJual']*$jumlah;
                        /*echo "<pre>";
                        print_r($pecah);
                        echo"</pre>";*/
                        ?>
                       
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$pecah['Nama'];?></td>
                        <td>Rp.<?=number_format($pecah['HargaJual']);?></td>
                        <td><?=$jumlah?></td>
                        <td>Rp.<?=number_format($total);?></td>
                        <td><a href="hapuskeranjang.php?id=<?=$Produk_Id?>" class="btn btn-danger" onclick="return confirm('Apakah anda ingin membatalkan produk ini?')">Hapus</a></td>
                    </tr>
                    <?php $no++;?>
                    <?php endforeach?>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-default">Kembali</a>
            <a href="checkout.php" class="btn btn-success">Beli</a>
        </div>
    </section>
</body>
</html>