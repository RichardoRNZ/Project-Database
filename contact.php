<?php
include "koneksi.php";
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$sql="INSERT INTO `customer_service`(`Nama`, `Email`, `Subject`, `Pesan`) 
VALUES ('$name','$email','$subject','$message')";
$simpan = mysqli_query($conn,$sql);
if($simpan)
{
    echo "pesan sukses";
}
else
{
    echo "pesan gagal";
}
?>