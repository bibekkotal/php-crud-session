<?php include'db.php';
$id=$_GET['did'];
$del="DELETE FROM student WHERE id='$id'";
$con->query($del);
header("location:select.php");
?>