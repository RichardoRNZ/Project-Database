<?php 
session_start();
include "koneksi.php";
  
  
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
          <h2>Check Out Form</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Check Out Form</li>
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
                        <!-- <th>Aksi</th> -->
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
                        
                        <!-- <td><a href="hapuskeranjang.php?id=<?=$Produk_Id?>" class="btn btn-danger" onclick="return confirm('Apakah anda ingin membatalkan produk ini?')">Hapus</a></td> -->
                    </tr>
                    <?php $no++;?>
                    <?php endforeach?>
                </tbody>
            </table>
            
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambahkan alamat pengiriman
</button>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CheckOut Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
                   <div class="form-group"><label>Alamat Pengiriman</label>
                    <input type="text" name="alamat" require>
                   </div>
                   <div class="form-group"><label>Ekspedisi</label>
                        <select name="ekspedisi" id="">
                            <option value="JNE Express">JNE Express</option>
                            <option value="J&T Express">J&T Express</option>
                            <option value="Gojek">Gojek</option>
                        </select>
                   
                   </div> 
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input id="submit-btn" type="submit" name="save" value="Save Changes" class="btn btn-primary" >
      </div>
      </form>
    </div>
  </div>
</div>
        <?php
            if(isset($_POST['save'])):
            
                $alamat=$_POST['alamat'];
                $ekspedisi=$_POST['ekspedisi'];
                if($ekspedisi=="JNE Express")
                {
                    $Ship_ID="SHP001";
                    $biaya=15000;
                }
                else if($ekspedisi=="J&T Express")
                {
                  $Ship_ID="SHP002";
                    $biaya=17000;
                }
                else if($ekspedisi=="Gojek")
                {
                  $Ship_ID="SHP003";
                    $biaya=10000;
                }
                $sql="INSERT INTO `detailpengiriman`(`Ship_ID`, `AlamatPengirim`, `AlamatTujuan`, `Biaya`) 
                VALUES ('$Ship_ID','Jln. Mayjend Sungkono, no 15, Malang, Jawa Timur','$alamat','$biaya')";
                $simpan=mysqli_query($conn,$sql);
                if($simpan)
                {
                  echo"<script>alert('Data berhasil disimpan');</script>";
                }
                else
                {
                  echo"<script>alert('Data gagal disimpan');</script>";
                }
                ?>
            
            
        
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Alamat Tujuan</th>
              <th>Ekspedisi</th>
              <th>Biaya</th>
            </tr>
          </thead>
          <?php
              $tampil = mysqli_query($conn,"SELECT AlamatTujuan, shipper.NamaPerusahaan AS 'ekspedisi', Biaya FROM detailpengiriman INNER JOIN shipper ON detailpengiriman.Ship_ID=shipper.Ship_ID ORDER BY ID DESC LIMIT 1");
              while($data=mysqli_fetch_array($tampil)) :
          ?>
          <tr>
            <td><?=$data['AlamatTujuan'];?></td>
            <td><?=$data['ekspedisi'];?></td>
            <td><?=$data['Biaya'];?></td>
          </tr>
          <?php endwhile;?>
        </table>
        <?php endif;?>
        <form action="" method="POST">

<label for="">Metode Pembayaran</label>
    <input type="text" name="metode" require>
    <button type="submit" class="btn btn-success mb-3" name="checkout">Check out</button>
</form>
<?php
  if(isset($_POST['checkout']))
  {
    $CustomerID=$_SESSION['pelanggan']['CustomerID'];
    $tanggal=date("Y-m-d");
    $metode=$_POST['metode'];
    $sql="INSERT INTO `transaksi`(`CustomerID`, `Jumlah`, `Total Harga`, `TanggalTransaksi`, `Metode Pembayaran`) 
    VALUES ('$CustomerID','$jumlah','$total','$tanggal','$metode')";
    $simpan=mysqli_query($conn,$sql);
    
                $id_pembelian_terbaru= $conn->insert_id;
                $tampil=mysqli_query($conn,"SELECT * FROM detailpengiriman ORDER BY ID DESC LIMIT 1");
                $data=mysqli_fetch_array($tampil);
                //echo $data['ID'];
                $PengirimanID=$data['ID'];
                //mengosongkan keranjang
                //unset($_SESSION['keranjang']);
                foreach ($_SESSION['keranjang'] as $Produk_Id => $jumlah) 
                {
                  $ambil= $conn->query("SELECT * FROM produk WHERE Produk_Id='$Produk_Id'");
                    $pecah=$ambil->fetch_assoc();
                  $KategoriID=$pecah['KategoriID'];
                 
                  $simpan2=$conn->query("INSERT INTO `detailtransaksi`(`TransaksiID`, `KategoriID`, `Produk_ID`, `PengirimanID`) 
                  VALUES ('$id_pembelian_terbaru','$KategoriID','$Produk_Id','$PengirimanID')");
                }
                if($simpan AND $simpan2)
                {
                  echo"<script>alert('Pembelian Berhasil');location='nota.php'</script>";
                  unset($_SESSION['keranjang']);
                }

  }
  

  
?>
        
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>