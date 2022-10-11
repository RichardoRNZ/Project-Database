<?php
    session_start();
    include "koneksi.php";
    $email=$_POST['email'];
    $password=$_POST['password'];
    if(isset($_POST['user'])){
    $ambil=$conn->query("SELECT * FROM customer WHERE CustomerEmail='$email' AND Password = '$password'");
    $row=$ambil->num_rows;
    if($row==1)
    {
      $akun=$ambil->fetch_assoc();
      $_SESSION['pelanggan']=$akun;
      echo "<script>alert('Login Berhasil');document.location.href='main/index.php'</script>";
    }
    else{
      echo "<script>alert('Email Salah atau Tidak Terdaftar');</script>";
    }
    
    }
    else if(isset($_POST['admin']))
    {
      $cek2 =mysqli_query($conn,"SELECT * FROM admin WHERE Username = '$email'");
      $row2 =mysqli_num_rows($cek2);
      if($row2==1)
      {
          $fetch_pass =mysqli_fetch_assoc($cek2);
          $cek_pass = $fetch_pass['Password'];
          if($cek_pass <> $password)
              {
                echo "<script>alert('Password Salah');</script>";
              }
              else
              {
                
                $_SESSION['log'] = true;
                echo "<script>alert('Login Berhasil');document.location.href='admin/admin.php'</script>";
                
                
              }
            }
            else
            {
              echo "<script>alert('Email Salah atau Tidak Terdaftar');</script>";
            }
  
    }
    
?>