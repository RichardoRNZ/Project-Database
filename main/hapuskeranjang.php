<?php
    session_start();
    $Produk_Id=$_GET['id'];
    unset($_SESSION['keranjang'][$Produk_Id]);
    echo"<script>alert('Produk telah dihapus dari keranjang');document.location.href='keranjang.php'</script>";

?>