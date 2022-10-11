<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['log'])){
    header("Location: ../register.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0a1208e247.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin.css">
    <title>ADMIN TaniKu</title>
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
        <a class="navbar-brand" href="#">SELAMAT DATANG ADMIN | TanamYuk</a>
       
         
          <div class="icon ml-auto">
            <h5>
                <i class="fas fa-envelope mr-3" data-toogle="tooltip" title="Inbox"></i>
                <i class="fas fa-bell mr-3" data-toogle="tooltip" title="Notification"></i>
                <a href="logout.php"><i class="fas fa-sign-out-alt mr-3" data-toogle="tooltip" title="Sign Out"></i></a>
            </h5>
            </div>
        </div>
      </nav>
      
      <div class="row no-gutters mt-5">
          <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
            <ul class="nav flex-column ml-3 mb-5">
                <li class="nav-item">
                  <a class="nav-link active text-white" href="admin.php"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="user.php"><i class="fas fa-users mr-2"></i>Daftar User</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="pegawai.php"><i class="fas fa-user-tie mr-2"></i>Daftar Karyawan</a><hr class="bg-secondary">
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="produk.php"><i class="fas fa-carrot mr-2"></i>Daftar Produk</a><hr class="bg-secondary">
                <li class="nav-item">
                    <a class="nav-link text-white" href="order.php"><i class="fas fa-truck mr-2"></i>Order Stok </a><hr class="bg-secondary">
                  </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="penjualan.php"><i class="fab fa-sellsy mr-2"></i>Riwayat Penjualan</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="contact.php"><i class="fas fa-phone mr-2"></i>Kritik dan Saran Customer</a><hr class="bg-secondary">
                  </li>
                
              </ul>
          </div>
          <div class="col-md-10 p-5 pt-2">
              <h3><i class="fas fa-tachometer-alt mr-2"></i>DASHBOARD</h3><hr>
              <div class="row text-white">
                <div class="card bg-info ml-3" style="width: 18rem;">
                   
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-users mr-2"></i>
                        </div>
                      <h5 class="card-title">Jumlah Pengguna</h5>
                      <div class="display-4">
                        <?php
                           $tampil = mysqli_query($conn,"SELECT COUNT(CustomerID) AS 'JumlahCustomer' FROM customer");
                           $sql = mysqli_fetch_array($tampil);
                           echo $sql['JumlahCustomer'];
                        ?>
                      </div>
                      <a href="user.php"><p class="card-text text-white">Lihat Detail</p></a>
                      
                    </div>
                  </div>
                  <div class="card bg-success ml-5" style="width: 18rem;">
                   
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-user-tie mr-2"></i>
                        </div>
                      <h5 class="card-title">Jumlah Karyawan</h5>
                      <div class="display-4">
                        <?php
                           $tampil = mysqli_query($conn,"SELECT COUNT(ID) AS 'JumlahPegawai' FROM pegawai");
                           $sql = mysqli_fetch_array($tampil);
                           echo $sql['JumlahPegawai'];
                        ?>
                      </div>
                      <a href="pegawai.php"><p class="card-text text-white">Lihat Detail</p></a>
                      
                    </div>
                  </div>
                  <div class="card badge-danger ml-5" style="width: 18rem;">
                   
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fab fa-sellsy mr-2"></i>
                        </div>
                      <h5 class="card-title">Total Penjualan</h5>
                      <div class="display-4">
                      <?php
                           $tampil = mysqli_query($conn,"SELECT COUNT(TransaksiID) AS 'JumlahTransaksi' FROM transaksi");
                           $sql = mysqli_fetch_array($tampil);
                           echo $sql['JumlahTransaksi'];
                        ?>
                      </div>
                      <a href="penjualan.php"><p class="card-text text-white">Lihat Detail</p></a>
                      
                    </div>
                  </div>
              </div>
              <div class="row text-white pt-4">
                <div class="card bg-warning ml-3" style="width: 18rem;">
                   
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-boxes"></i>
                        </div>
                      <h5 class="card-title">Produk Habis</h5>
                      <div class="display-4">
                      <?php
                           $tampil = mysqli_query($conn,"SELECT COUNT(Produk_Id) AS 'StokHabis' FROM produk WHERE StokTersedia = 0");
                           
                           while($sql = mysqli_fetch_array($tampil))
                           {
                              echo $sql['StokHabis'];
                           }
                           
                        ?>
                      </div>
                      <a href="produk.php"><p class="card-text text-white">Lihat Detail</p></a>
                      
                    </div>
                  </div>
                  <div class="card bg-primary ml-5" style="width: 18rem;">
                   
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-truck mr-2" ></i>
                        </div>
                      <h5 class="card-title">Total Order Stok</h5>
                      <div class="display-4 font-weight-bold">
                      <?php
                           $tampil = mysqli_query($conn,"SELECT SUM(JumlahStok) AS 'JumlahStok' FROM ordersupply");
                           $sql = mysqli_fetch_array($tampil);
                           echo $sql['JumlahStok'];
                        ?>
                    </div>
                      <a href="order.php"><p class="card-text text-white">Lihat Detail</p></a>
                      
                    </div>
                  </div>
                  <div class="card bg-secondary ml-5" style="width: 18rem;">
                   
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-phone mr-2"></i>
                        </div>
                      <h5 class="card-title">Kritik dan Saran</h5>
                      <div class="display-4">
                      <?php
                           $tampil = mysqli_query($conn,"SELECT COUNT(ID) AS 'Jumlah' FROM `customer_service`");
                           $sql = mysqli_fetch_array($tampil);
                           echo $sql['Jumlah'];
                        ?>
                      </div>
                      <a href="contact.php"><p class="card-text text-white">Lihat Detail</p></a>
                      
                    </div>
                  </div>
              </div>

              <div class="row mt-4">
                <div class="card ml-3 text-white text-center" style="width: 18rem;">
                    <div class="card-header badge-danger display-4 pt-4 pb-4">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title text-danger">INSTAGRAM</h5>
                      <a href="#" class="btn btn-danger">FOLLOW</a>
                    </div>
                  </div>
                  <div class="card ml-5 text-white text-center" style="width: 18rem;">
                    <div class="card-header badge-info display-4 pt-4 pb-4">
                        <i class="fab fa-facebook"></i>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title text-info">FACEBOOK</h5>
                      <a href="#" class="btn btn-info">LIKE</a>
                    </div>
                  </div>
                   <div class="card ml-5 text-white text-center" style="width: 18rem;">
                    <div class="card-header badge-primary display-4 pt-4 pb-4">
                        <i class="fab fa-twitter"></i>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title text-primary">TWITTER</h5>
                      <a href="#" class="btn btn-primary">FOLLOW</a>
                    </div>
                  </div>
              </div>
              
          </div>
      </div>

    <!-- Optional JavaScript -->
    <script type="text/javascript" src="admin.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>