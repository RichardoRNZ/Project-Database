<?php

    session_start();

    $Produk_Id=$_GET['id'];
    if(isset($_SESSION['keranjang'][$Produk_Id]))
    {
        $_SESSION['keranjang'][$Produk_Id]+=1;
    }
    else
    {
        $_SESSION['keranjang'][$Produk_Id]=1;
    }
    /*echo "<pre>";
    print_r($_SESSION);
    echo"</pre>";*/
    echo"<script>alert('Produk telah ditambahkan ke keranjang');document.location.href='keranjang.php'</script>";
    
    
   
?>