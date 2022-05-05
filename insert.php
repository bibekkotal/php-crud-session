<?php session_start();
if (!isset($_SESSION['au'])) {
header("location:login.php");
}?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>INSERT</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <style>body{ background-color: #FF8054; }.container{ width: 50%;} .card{ border-radius: 0px;  border: none;}</style>
</head>
<body>
	<div class="container">

<div class="card shadow p-4 m-4">
	<div class="col-md-12">
		<form method="post" enctype="multipart/form-data">
	 <div class="row pb-4">
	 	<div class="col-md-3 pt-2">Email</div>
	 	<div class="col-md-9"><input type="email" name="email" class="form-control"></div>
	 </div>
	 <div class="row pb-4">
	 	<div class="col-md-3">Gender</div>
	 	<div class="col-md-9"><div class="form-check-inline">
								  <label class="form-check-label">
								    <input type="radio" class="form-check-input" name="gender" value="Male">Male
								  </label>
								</div>
								<div class="form-check-inline">
								  <label class="form-check-label">
								    <input type="radio" class="form-check-input" name="gender" value="Female">Female
								  </label>
								</div>
								<div class="form-check-inline">
								  <label class="form-check-label">
								    <input type="radio" class="form-check-input" name="gender" value="Other">Other
								  </label>
								</div></div>
	 </div>
	 <div class="row pb-2">
	 	<div class="col-md-3">Country</div>
	 	<div class="col-md-9"><select id="country" name="country" class="form-control">
									  <option value="">- Choose Your Country -</option>
									   <option value="Afganistan">Afghanistan</option>
									   <option value="Australia">Australia</option>
									   <option value="Bangladesh">Bangladesh</option>
									   <option value="Bhutan">Bhutan</option>
									   <option value="Brazil">Brazil</option>
									   <option value="Hong Kong">Hong Kong</option>
									   <option value="India">India</option>
									   <option value="Iran">Iran</option>
									</select></div>
	 </div>
	 <div class="row pt-3">
	 	<div class="col-md-3">Subject</div>
	 	<div class="col-md-9"><div><div class="form-check-inline">
					  <label class="form-check-label">
					    <input type="checkbox" class="form-check-input" name="subject[]" value="html">Html
					  </label>
					</div>
					<div class="form-check-inline">
					  <label class="form-check-label">
					    <input type="checkbox" class="form-check-input" name="subject[]" value="css">Css
					  </label>
					</div>
					<div class="form-check-inline">
					  <label class="form-check-label">
					    <input type="checkbox" class="form-check-input" name="subject[]" value="javascript">Javascript
					  </label>
					</div>
				    <div class="form-check-inline">
					  <label class="form-check-label">
					    <input type="checkbox" class="form-check-input" name="subject[]" value="python">Python
					  </label>
					</div></div></div>
	 </div>
	 <div class="row pb-2 pt-4">
	 	<div class="col-md-4">Profile Picture</div>
	 	<div class="col-md-8"><div class="custom-file">
			    <input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
			    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
		</div></div>
	 </div>
	 <div class="row p-2"><button type="submit" name="save" class="btn btn-outline-secondary">SAVE</button></div>
	</form>

	 <div class="row lg pb-2 pt-4">
	 	<div class="col-md-8"><p><p><?php echo $_SESSION['au']; ?></p></p></div>
	 	<div class="col-md-4"><a type="submit" href="logout.php">LOGOUT</a></div>
	 </div>

	<?php include'db.php';
	if (isset($_POST['save'])) {
	$e=$_POST['email'];
	$g=$_POST['gender'];
	$c=$_POST['country'];
	$s=implode(",", $_POST['subject']);
	
	if ($_FILES['image']['name']!="") {
	$fn=time().$_FILES['image']['name'];
	$extarr=explode(".", $fn);
	$extrev=array_reverse($extarr);
	if ($extrev[0]=="jpg" || $extrev[0]=="jpeg" || $extrev[0]=="png") {
	$temp=$_FILES['image']['tmp_name'];
	move_uploaded_file($temp, "up_img/".$fn);
	$ins="INSERT INTO student SET email='$e', gender='$g', country='$c', subject='$s', image='$fn'";
	$con->query($ins);
	if ($con) {
	?><script>alert("Data Saved Successfully !"); window.location="select.php";</script><?php
              }
	} } } else { "Access Denied !"; }

	?>
	 </div>

	</div>
	</div>
</body>
</html>