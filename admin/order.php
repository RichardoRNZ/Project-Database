<?php
  include 'koneksi.php';
  //tambah data
  if(isset($_POST['save']))
  {
    $id=$_POST['id']; 
    $produk=$_POST['produk']; 
    $kategori=$_POST['kategori'];
    $supplier=$_POST['supplier']; 
    $pegawai=$_POST['pegawai']; 
    $jumlah=$_POST['jumlah']; 
    $harga=$_POST['harga']; 
    $total = $jumlah*$harga;
    $sql="INSERT INTO `ordersupply`(`OrderID`, `ProdukID`,KategoriID, `SupplierID`, `PegawaiID`, `JumlahStok`, `HargaStok`, `Total Harga`) 
          VALUES ('$id','$produk','$kategori','$supplier','$pegawai','$jumlah','$harga','$total')";
        $simpan = mysqli_query($conn,$sql); 
        if($simpan)
        {
          echo "<script>
                alert('Tambah data berhasil');
                document.location='order.php';
                </script>";
                
        }
        else{
          echo "<script>
                alert('Tambah data gagal');
                document.location='order.php';
                </script>";
      }
  }
  //edit data
 if(isset($_POST['edit']))
 {
  $id = $_POST['OrderID'];
  $produk = $_POST['ProdukID'];
  $jumlah = $_POST['JumlahStok'];
  $harga = $_POST['HargaStok'];
  $total = $jumlah*$harga;
  
  $sql="UPDATE `ordersupply` SET `ProdukID`='$produk',`JumlahStok`='$jumlah',`HargaStok`='$harga',`Total Harga`='$total' WHERE OrderID ='$id' ";
 $simpan = mysqli_query($conn,$sql); 
 if($simpan)
 {
   echo "<script>
         alert('Edit data berhasil');
         document.location='order.php';
         </script>";
         
 }
 else{
   echo "<script>
         alert('Edit data gagal');
         document.location='order.php';
         </script>";
}

  
 }
 
  //hapus data
  if(isset($_GET['hal']))
  {
    if($_GET['hal']=="hapus")
    {
      $hapus=mysqli_query($conn, "DELETE FROM ordersupply WHERE OrderID ='$_GET[id]'");
      if($hapus)
      {
        echo "<script>
         alert('Hapus data berhasil');
         document.location='order.php';
         </script>";
      }
      else{
        echo "<script>
         alert('Hapus data gagal');
         document.location='order.php';
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
              <h3><i class="fas fa-truck mr-2"></i>RIWAYAT ORDER STOK</h3><hr>
          

               <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModalLong">
    <i class="fas fa-plus mr-2"></i>Tambah Order
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Tambah Order</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="">
          <div class="form-group">
              <label>Order ID</label>
              <input type="text" class="form-control" name="id"  required>
            </div>
            <div class="form-group">
              <label>Produk ID</label>
              <input type="text" class="form-control" name="produk"  required>
            </div>
            <div class="form-group">
              <label>Kategori ID</label>
              <input type="text" class="form-control" name="kategori"  required>
            </div>
            <div class="form-group">
              <label>Supplier ID</label>
              <input type="text" class="form-control" name="supplier"  required>
            </div>
            <div class="form-group">
              <label>Pegawai ID</label>
              <input type="text" class="form-control" name="pegawai"  required>
            </div>
            <div class="form-group">
              <label>Jumlah Stok</label>
              <input type="number" class="form-control" name="jumlah"  required>
            </div>
            <div class="form-group">
              <label>Harga per Stok</label>
              <input type="text" class="form-control" name="harga"  required>
            </div>
            <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Delete</button>
          <input id="submit-btn" type="submit" name="save" value="Save Changes" class="btn btn-primary" >
        </div>
          </form>
        </div>
       
      </div>
    </div>
  </div>

  <!-- Modal Edit -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalTitle">Edit Data Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="">
          <div class="form-group">

              <input type="hidden" class="form-control" name="OrderID" id="OrderID"  required>
            </div>
            <div class="form-group">
              <label>Produk ID</label>
              <input type="text" class="form-control" name="ProdukID" id="ProdukID"  required>
            </div>
            <div class="form-group">
              <label>Jumlah Stok</label>
              <input type="number" class="form-control" name="JumlahStok" id="JumlahStok"  required>
            </div>
            <div class="form-group">
              <label>Harga Stok</label>
              <input type="number" class="form-control" name="HargaStok" id="HargaStok"  required>
            </div>
            
            <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Delete</button>
          <input id="submit-btn" type="submit" name="edit" value="Save Changes" class="btn btn-primary" >
        </div>
          </form>
        </div>
       
      </div>
    </div>
  </div>
              <table class="table table-striped table-bordered mt-1">
                <thead class="bg-dark text-white">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Produk ID</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Supllier</th>
                    <th scope="col">Nama Penerima Order</th>
                    <th scope="col">Jumlah Stok</th>
                    <th scope="col">Harga per Stok</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Tanggal Order</th>
          
                    <th colspan="2" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $no =1;
                    $tampil = mysqli_query($conn,"SELECT * FROM view_ordersupply");
                    while($data=mysqli_fetch_array($tampil)) :
                    
                  ?>
                    <tr>
                    <td><?=$no++;?></td>
                    <td><?=$data['OrderID']?></td>
                    <td><?=$data['ProdukID']?></td>
                    <td><?=$data['NamaProduk']?></td>
                    <td><?=$data['Supplier']?></td>
                    <td><?=$data['NamaPegawai']?></td>
                    <td><?=$data['JumlahStok']?></td>
                    <td><?=$data['HargaStok']?></td>
                    <td><?=$data['Total Harga']?></td>
                    <td><?=$data['TanggalOrder']?></td>
                    
                    
                    <td><a class="btn" id="tombolubah" data-toggle="modal" data-target="#exampleModal"
                    data-id="<?=$data['OrderID'];?>" data-produk="<?=$data['ProdukID'];?>"  data-jumlah="<?=$data['JumlahStok'];?>" data-harga="<?=$data['HargaStok'];?>"
                     >
                    <i class="fas fa-edit bg-success p-2 mb-1 text-white rounded" data-toogle="tooltip" title="Edit"></i></a></td>
                    <td><a href="order.php?hal=hapus&id=<?=$data['OrderID']?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toogle="tooltip" title="Delete"></i></a></td>
                    </tr>
                    <?php endwhile; ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).on("click","#tombolubah", function(){
    let id =$(this).data('id');
    let produk =$(this).data('produk');
    let jumlah =$(this).data('jumlah');
    let harga =$(this).data('harga');

    $("#OrderID").val(id)
    $(".modal-body #ProdukID").val(produk)
    $(".modal-body #JumlahStok").val(jumlah)
    $(".modal-body #HargaStok").val(harga)
    
  })
</script>
  </body>
</html>