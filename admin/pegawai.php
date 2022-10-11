<?php
  include 'koneksi.php';
  //tambah data
  if(isset($_POST['save']))
  {
    $id=$_POST['id']; 
    $nama=$_POST['nama']; 
    $email=$_POST['email']; 
    $tel=$_POST['tempatlahir']; 
    $tal=$_POST['tanggallahir']; 
    $gender=$_POST['gender']; 
    $alamat=$_POST['alamat']; 
    $no=$_POST['no']; 
    $agama=$_POST['agama']; 
    $posisi=$_POST['posisi']; 
    $gaji=$_POST['gaji'];
    $sql="INSERT INTO `pegawai`(`ID`, `Nama`, `Email`, `TempatLahir`, `TanggalLahir`, `Gender`, `Alamat`, `NomorHandphone`, `Agama`, `Posisi`, `Gaji`) 
    VALUES ('$id','$nama','$email','$tel','$tal','$gender','$alamat','$no','$agama','$posisi','$gaji')";
        $simpan = mysqli_query($conn,$sql); 
        if($simpan)
        {
          echo "<script>
                alert('Tambah data berhasil');
                document.location='pegawai.php';
                </script>";
                
        }
        else{
          echo "<script>
                alert('Tambah data gagal');
                document.location='pegawai.php';
                </script>";
      }
  }
  //edit data
 if(isset($_POST['edit']))
 {
  $id = $_POST['ID'];
  $nama = $_POST['Nama'];
  $email = $_POST['Email'];
  $tel = $_POST['TempatLahir'];
  $tal = $_POST['TanggalLahir'];
  $gender = $_POST['Gender'];
  $alamat = $_POST['Alamat'];
  $no = $_POST['NomorHandphone'];
  $agama = $_POST['Agama'];
  $posisi = $_POST['Posisi'];
  $Gaji = $_POST['Gaji'];
  $sql="UPDATE `pegawai` SET `Nama`='$nama',`Email`='$email',`TempatLahir`='$tel',`TanggalLahir`='$tal',`Gender`='$gender',`Alamat`='$alamat',`NomorHandphone`='$no',`Agama`='$agama',`Posisi`='$posisi',`Gaji`='$Gaji' WHERE ID = '$id'";
 $simpan = mysqli_query($conn,$sql); 
 if($simpan)
 {
   echo "<script>
         alert('Edit data berhasil');
         document.location='pegawai.php';
         </script>";
         
 }
 else{
   echo "<script>
         alert('Edit data gagal');
         document.location='pegawai.php';
         </script>";
}

  
 }
 
  //hapus data
  if(isset($_GET['hal']))
  {
    if($_GET['hal']=="hapus")
    {
      $hapus=mysqli_query($conn, "DELETE FROM pegawai WHERE ID ='$_GET[id]'");
      if($hapus)
      {
        echo "<script>
         alert('Hapus data berhasil');
         document.location='pegawai.php';
         </script>";
      }
      else{
        echo "<script>
         alert('Hapus data gagal');
         document.location='pegawai.php';
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
              <h3><i class="fas fa-user-tie mr-2"></i>DAFTAR KARYAWAN</h3><hr>
          

               <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModalLong">
    <i class="fas fa-plus mr-2"></i>Tambah Data Pegawai
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Pegawai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="">
          <div class="form-group">
              <label>ID Pegawai</label>
              <input type="text" class="form-control" name="id"  required>
            </div>
            <div class="form-group">
              <label>Nama Pegawai</label>
              <input type="text" class="form-control" name="nama"  required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email"  required>
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" class="form-control" name="tempatlahir"  required>
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" class="form-control" name="tanggallahir"  required>
            </div>
            <div class="form-group">
              <label>Gender</label>
              <select class="form-group" name="gender"  required>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat"  required>
            </div>
            <div class="form-group">
              <label>No.Handphone</label>
              <input type="text" class="form-control" name="no"  required>
            </div>
            <div class="form-group">
              <label>Agama</label>
              <input type="text" class="form-control" name="agama"  required>
            </div>
            <div class="form-group">
              <label>Posisi/jabatan</label>
              <input type="text" class="form-control" name="posisi"  required>
            </div>
            <div class="form-group">
              <label>Gaji</label>
              <input type="number" class="form-control" name="gaji"  required>
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
          <h5 class="modal-title" id="exampleModalTitle">Edit Data Pegawai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="">
          <div class="form-group">
              <input type="hidden" class="form-control" name="ID" id="ID"  required>
            </div>
            <div class="form-group">
              <label for="Nama">Nama Pegawai</label>
              <input type="text" class="form-control" name="Nama" id="Nama"  required>
            </div>
            <div class="form-group">
              <label for="Email">Email</label>
              <input type="email" class="form-control" name="Email" id="Email" required>
            </div>
            <div class="form-group">
              <label for="Tempat Lahir">Tempat Lahir</label>
              <input type="text" class="form-control" name="TempatLahir" id="TempatLahir" required>
            </div>
            <div class="form-group">
              <label for="Tanggal Lahir">Tanggal Lahir</label>
              <input type="date" class="form-control" name="TanggalLahir" id="TanggalLahir"  required>
            </div>
            <div class="form-group">
              <label for="Gender">Gender</label>
              <select class="form-group" name="Gender" id="Gender"  required>
                
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
            </div>
            <div class="form-group">
              <label for="Alamat">Alamat</label>
              <input type="text" class="form-control" name="Alamat" id="Alamat"  required>
            </div>
            <div class="form-group">
              <label for="Nomor Handphone">No.Handphone</label>
              <input type="text" class="form-control" name="NomorHandphone" id="NomorHandphone"  required>
            </div>
            <div class="form-group">
              <label for="Agama">Agama</label>
              <input type="text" class="form-control" name="Agama" id="Agama"  required>
            </div>
            <div class="form-group">
              <label for="Posisi">Posisi/jabatan</label>
              <input type="text" class="form-control" name="Posisi" id="Posisi" required>
            </div>
            <div class="form-group">
              <label for="Gaji">Gaji</label>
              <input type="number" class="form-control" name="Gaji" id="Gaji"  required>
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
                    <th scope="col">ID Pegawai</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No.Handphone</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Posisi/jabatan</th>
                    <th scope="col">Gaji</th>
                    <th colspan="2" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $no =1;
                    $tampil = mysqli_query($conn,"SELECT * FROM pegawai ORDER BY ID asc");
                    while($data=mysqli_fetch_array($tampil)) :
                    
                  ?>
                    <tr>
                    <td><?=$no++;?></td>
                    <td><?=$data['ID']?></td>
                    <td><?=$data['Nama']?></td>
                    <td><?=$data['Email']?></td>
                    <td><?=$data['TempatLahir']?></td>
                    <td><?=$data['TanggalLahir']?></td>
                    <td><?=$data['Gender']?></td>
                    <td><?=$data['Alamat']?></td>
                    <td><?=$data['NomorHandphone']?></td>
                    <td><?=$data['Agama']?></td>
                    <td><?=$data['Posisi']?></td>
                    <td><?=$data['Gaji']?></td>
                    
                    <td><a class="btn" id="tombolubah" data-toggle="modal" data-target="#exampleModal" 
                    data-id="<?=$data['ID'];?>" data-nama="<?=$data['Nama'];?>" data-email="<?=$data['Email'];?>" data-tel="<?=$data['TempatLahir'];?>"
                    data-tal="<?=$data['TanggalLahir'];?>" data-gender="<?=$data['Gender'];?>" data-alamat="<?=$data['Alamat'];?>" data-no="<?=$data['NomorHandphone'];?>"
                    data-agama="<?=$data['Agama'];?>" data-posisi="<?=$data['Posisi'];?>" data-gaji="<?=$data['Gaji'];?>"><i class="fas fa-edit bg-success p-2 text-white rounded" data-toogle="tooltip" title="Edit"></i></a></td>
                    <td><a href="pegawai.php?hal=hapus&id=<?=$data['ID']?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toogle="tooltip" title="Delete"></i></a></td>
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
    let nama =$(this).data('nama');
    let email =$(this).data('email');
    let tel =$(this).data('tel');
    let tal =$(this).data('tal');
    let gender =$(this).data('gender');
    let alamat =$(this).data('alamat')
    let no =$(this).data('no');
    let agama =$(this).data('agama');
    let posisi =$(this).data('posisi');
    let gaji =$(this).data('gaji');

    $("#ID").val(id)
    $(".modal-body #Nama").val(nama)
    $(".modal-body #Email").val(email)
    $(".modal-body #TempatLahir").val(tel)
    $(".modal-body #TanggalLahir").val(tal)
    $(".modal-body #Gender").val(gender)
    $(".modal-body #Alamat").val(alamat)
    $(".modal-body #NomorHandphone").val(no)
    $(".modal-body #Agama").val(agama)
    $(".modal-body #Posisi").val(posisi)
    $(".modal-body #Gaji").val(gaji)
  })
</script>
  </body>
</html>