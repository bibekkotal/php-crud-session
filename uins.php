  <?php include'db.php';
	if (isset($_POST['update'])) {
	$e=$_POST['email'];
	$g=$_POST['gender'];
	$c=$_POST['country'];
	$s=implode(",", $_POST['subject']);
	$id=$_POST['id'];
	if($_FILES['image']['name']!=""){
	$fn=time().$_FILES['image']['name'];
	$extarr=explode(".", $fn);
	$extrev=array_reverse($extarr);
	if ($extrev[0]=="jpg" || $extrev[0]=="jpeg" || $extrev[0]=="png"){
	$temp=$_FILES['image']['tmp_name'];
	move_uploaded_file($temp, "up_img/".$fn);
	$ins="UPDATE student SET email='$e', gender='$g', country='$c', subject='$s', image='$fn' WHERE id='$id'";
	} else { $ins="UPDATE student SET email='$e', gender='$g', country='$c', subject='$s' WHERE id='$id'"; }
	$con->query($ins);
	if ($con) {
	?><script>alert("Data Updated Successfully !"); window.location="select.php";</script><?php
	          }
	} } else {  "Access Denied !";  }?>