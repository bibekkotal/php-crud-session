<?php session_start();
unset($_SESSION['au']);
header("location:login.php");
?>