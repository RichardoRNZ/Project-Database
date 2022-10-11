<?php
  include 'koneksi.php';
  //tambah data
  if(isset($_POST['save']))
  {
    $id=$_POST['id']; 
    $jenis=$_POST['jenis']; 
    $nama=$_POST['nama']; 
    $hb=$_POST['hb']; 
    $hj=$_POST['hj']; 
    $stok=$_POST['stok']; 
    $sql="INSERT INTO `produk`(`Produk_Id`, `KategoriID`, `Nama`, `Hargapembelian`, `HargaJual`, `StokTersedia`) 
        VALUES ('$id','$jenis','$nama','$hb','$hj','$stok')";
        $simpan = mysqli_query($conn,$sql); 
        if($simpan)
        {
          echo "<script>
                alert('Tambah data berhasil');
                document.location='produk.php';
                </script>";
                
        }
        else{
          echo "<script>
                alert('Tambah data gagal');
                document.location='produk.php';
                </script>";
      }
  }
  //edit data
  if(isset($_POST['edit']))
  {
   $id=$_POST['Produk_Id'];
  //  $jenis=$_POST['Jenis'];
   $nama=$_POST['Nama'];
   $hb=$_POST['Hargapembelian'];
   $hj=$_POST['HargaJual'];
   $stok=$_POST['StokTersedia'];
   $sql="UPDATE `produk` SET `Nama`='$nama',`Hargapembelian`='$hb',`HargaJual`='$hj',`StokTersedia`='$stok' WHERE Produk_Id = '$id'";
   
  $simpan = mysqli_query($conn,$sql); 
  if($simpan)
  {
    echo "<script>
          alert('Edit data berhasil');
          document.location='produk.php';
          </script>";
          
  }
  else{
    echo "<script>
          alert('Edit data gagal');
          document.location='produk.php';
          </script>";
 }
 
   
  }
 
  //hapus data
  if(isset($_GET['hal']))
  {
    if($_GET['hal']=="hapus")
    {
      $hapus=mysqli_query($conn, "DELETE FROM produk WHERE Produk_Id ='$_GET[id]'");
      if($hapus)
      {
        echo "<script>
         alert('Hapus data berhasil');
         document.location='produk.php';
         </script>";
      }
      else{
        echo "<script>
         alert('Hapus data gagal');
         document.location='produk.php';
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
              <h3><i class="fas fa-carrot mr-2"></i>DAFTAR PRODUK</h3><hr>
          

               <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModalLong">
    <i class="fas fa-plus mr-2"></i>Tambah Produk
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Tambah Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="">
          <div class="form-group">
              <label>ID Produk</label>
              <input type="text" class="form-control" name="id"  required>
            </div>
            <div class="form-group">
              <label>Jenis Produk</label>
              <input type="text" class="form-control" name="jenis"  required>
            </div>
            <div class="form-group">
              <label>Nama Produk</label>
              <input type="text" class="form-control" name="nama"  required>
            </div>
            <div class="form-group">
              <label>Harga Pembelian</label>
              <input type="number" class="form-control" name="hb"  required>
            </div>
            <div class="form-group">
              <label>Harga Jual</label>
              <input type="number" class="form-control" name="hj"  required>
            </div>
            <div class="form-group">
              <label>Stok</label>
              <input type="number" class="form-control" name="stok"  required>
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

              <input type="hidden" class="form-control" name="Produk_Id" id="Produk_Id"  required>
            </div>
            <!-- <div class="form-group"> -->
              <!-- <label>Jenis Produk</label> -->
              <!-- <input type="text" class="form-control" name="Jenis" id="Jenis"  required> -->
            <!-- </div> -->
            <div class="form-group">
              <label>Nama Produk</label>
              <input type="text" class="form-control" name="Nama" id="Nama"  required>
            </div>
            <div class="form-group">
              <label>Harga Pembelian</label>
              <input type="number" class="form-control" name="Hargapembelian" id="Hargapembelian"  required>
            </div>
            <div class="form-group">
              <label>Harga Jual</label>
              <input type="number" class="form-control" name="HargaJual" id="HargaJual"  required>
            </div>
            <div class="form-group">
              <label>Stok</label>
              <input type="number" class="form-control" name="StokTersedia" id="StokTersedia"  required>
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
                    <th scope="col">ID Produk</th>
                    <th scope="col">Jenis Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Stok</th>
                    <th colspan="2" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $no =1;
                    $tampil = mysqli_query($conn,"SELECT `Produk_Id`, kategori.Jenis AS 'Jenis', `Nama`, `Hargapembelian`, `HargaJual`, `StokTersedia` FROM `produk`,kategori WHERE kategori.ID=produk.KategoriID GROUP BY Produk_Id ORDER BY Produk_Id ASC");
                    while($data=mysqli_fetch_array($tampil)) :
                    
                  ?>
                    <tr>
                    <td><?=$no++;?></td>
                    <td><?=$data['Produk_Id']?></td>
                    <td><?=$data['Jenis']?></td>
                    <td><?=$data['Nama']?></td>
                    <td><?=$data['Hargapembelian']?></td>
                    <td><?=$data['HargaJual']?></td>
                    <td><?=$data['StokTersedia']?></td>
                    <td><a class="btn" id="tombolubah" data-toggle="modal" data-target="#exampleModal"
                    data-id="<?=$data['Produk_Id']?>" data-nama="<?=$data['Nama']?>" 
                    data-hb="<?=$data['Hargapembelian']?>" data-hj="<?=$data['HargaJual']?>" data-stok="<?=$data['StokTersedia']?>"><i class="fas fa-edit bg-success p-2 mb-1 text-white rounded" data-toogle="tooltip" title="Edit"></i></a></td>
                    <td><a href="produk.php?hal=hapus&id=<?=$data['Produk_Id']?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')"><i class="fas fa-trash-alt bg-danger p-2 mt-1 text-white rounded" data-toogle="tooltip" title="Delete"></i></a></td>
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
    let jenis =$(this).data('jenis');
    let nama =$(this).data('nama');
    let hb =$(this).data('hb');
    let hj =$(this).data('hj');
    let stok =$(this).data('stok');
    
    $("#Produk_Id").val(id)
    $(".modal-body #Jenis").val(jenis)
    $(".modal-body #Nama").val(nama)
    $(".modal-body #Hargapembelian").val(hb)
    $(".modal-body #HargaJual").val(hj)
    $(".modal-body #StokTersedia").val(stok)
   
  })
</script>
  </body>
</html>