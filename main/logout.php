<?php
    session_start();
    $_SESSION['log'] = '';
    unset($_SESSION['log']);
    session_unset();
    session_destroy();
    header("Location: ../register.php");
?>