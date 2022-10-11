<?php
session_start();
include "koneksi.php";
$nama=$_POST['nama'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$no=$_POST['no'];
$address=$_POST['address'];
$password=$_POST['password'];
$sql="INSERT INTO `customer`(`CustomerName`, `CustomerEmail`, `CustomerGender`, `CustomerAddress`, `CustomerPhone`, `Password`) 
VALUES ('$nama','$email','$gender','$no','$address','$password')";
$hasil=mysqli_query($conn,$sql);
if ($hasil)
{
    $_SESSION['pelanggan']=true;
    echo "<script>alert('Registrasi Berhasil!');document.location.href='main/index.php'</script>";
    exit;
}
else
{
    echo "<script>alert('Registrasi gagal');</script>";
    exit;
}

?>
