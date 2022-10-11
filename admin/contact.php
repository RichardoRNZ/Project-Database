<?php
  include 'koneksi.php';
  if(isset($_GET['hal']))
  {
    if($_GET['hal']=="hapus")
    {
      $hapus=mysqli_query($conn, "DELETE FROM `customer_services` WHERE ID = '$_GET[id]'");
      if($hapus)
      {
        echo "<script>
         alert('Hapus data berhasil');
         document.location='contact.php';
         </script>";
      }
      else{
        echo "<script>
         alert('Hapus data gagal');
         document.location='contact.php';
         </script>";
      }
    }
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
        <a class="navbar-brand" href="#">SELAMAT DATANG ADMIN | TaniKu</a>
       
         
          <div class="icon ml-auto">
            <h5>
                <i class="fas fa-envelope mr-3" data-toogle="tooltip" title="Inbox"></i>
                <i class="fas fa-bell mr-3" data-toogle="tooltip" title="Notification"></i>
                <i class="fas fa-sign-out-alt mr-3" data-toogle="tooltip" title="Sign Out"></i>
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
              <h3><i class="fas fa-users mr-2"></i>DAFTAR CUSTOMER</h3><hr>
          


              <table class="table table-striped table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                    <th scope="col">Kontak ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Pesan</th>
                    <th  scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql="SELECT * FROM `customer_service`";
                    $tampil = mysqli_query($conn,$sql);
                    while($data=mysqli_fetch_array($tampil)) :
                    
                  ?>
                    <tr>
                    <td><?=$data['ID']?></td>
                     <td><?=$data['Nama']?></td>
                    <td><?=$data['Email']?></td>
                    <td><?=$data['Subject']?></td>
                    <td><?=$data['Pesan']?></td>
                    
                    <td><a href="contact.php?hal=hapus&id=<?=$data['ID']?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toogle="tooltip" title="Delete"></i></a></td>
                    </tr>
                   <?php endwhile;?>
                </tbody>
                </table>
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