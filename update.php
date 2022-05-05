<?php session_start(); ?>
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
  <style>body{ background-color: #FF8054; }.container{ width: 50%;} .card{ border-radius: 0px;  border: none;} img{ width: 80px; border-radius: 8px; }</style>
</head>
<body>
	<div class="container">

<div class="card shadow p-4 m-4">
	<div class="col-md-12">
	<?php include'db.php';
	$id=$_GET['eid'];
	$sel="SELECT * FROM student WHERE id='$id'";
	$rs=$con->query($sel);
	while ($row=$rs->fetch_assoc()) {
		$s=explode(",", $row['subject'])
	?>
		<form action="uins.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	 <div class="row pb-4">
	 	<div class="col-md-3 pt-2">Email</div>
	 	<div class="col-md-9"><input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>"></div>
	 </div>
	 <div class="row pb-4">
	 	<div class="col-md-3">Gender</div>
	 	<div class="col-md-9"><div class="form-check-inline">
								  <label class="form-check-label">
<input type="radio" <?php if($row['gender']=="Male"){ echo "checked"; } ?> class="form-check-input" name="gender" value="Male">Male
								  </label>
								</div>
								<div class="form-check-inline">
								  <label class="form-check-label">
<input type="radio" <?php if($row['gender']=="Female"){ echo "checked"; } ?> class="form-check-input" name="gender" value="Female">Female
								  </label>
								</div>
								<div class="form-check-inline">
								  <label class="form-check-label">
<input type="radio" <?php if($row['gender']=="Other"){ echo "checked"; } ?> class="form-check-input" name="gender" value="Other">Other
								  </label>
								</div></div>
	 </div>
	 <div class="row pb-2">
	 	<div class="col-md-3">Country</div>
	 	<div class="col-md-9"><select id="country" name="country" class="form-control">
 <option <?php if($row['country']==""){ echo "selected"; } ?> value="">- Choose Your Country -</option>
 <option <?php if($row['country']=="Afganistan"){ echo "selected"; } ?> value="Afganistan">Afghanistan</option>
 <option <?php if($row['country']=="Australia"){ echo "selected"; } ?> value="Australia">Australia</option>
 <option <?php if($row['country']=="Bangladesh"){ echo "selected"; } ?> value="Bangladesh">Bangladesh</option>
 <option <?php if($row['country']=="Bhutan"){ echo "selected"; } ?> value="Bhutan">Bhutan</option>
 <option <?php if($row['country']=="Brazil"){ echo "selected"; } ?> value="Brazil">Brazil</option>
 <option <?php if($row['country']=="Hong Kong"){ echo "selected"; } ?> value="Hong Kong">Hong Kong</option>
 <option <?php if($row['country']=="India"){ echo "selected"; } ?> value="India">India</option>
 <option <?php if($row['country']=="Iran"){ echo "selected"; } ?> value="Iran">Iran</option>
									</select></div>
	 </div>
	 <div class="row pt-3">
	 	<div class="col-md-3">Subject</div>
	 	<div class="col-md-9"><div><div class="form-check-inline">
					  <label class="form-check-label">
<input type="checkbox" <?php if(in_array("html", $s)){ echo "checked"; } ?> class="form-check-input" name="subject[]" value="html">Html
					  </label>
					</div>
					<div class="form-check-inline">
					  <label class="form-check-label">
<input type="checkbox" <?php if(in_array("html", $s)){ echo "checked"; } ?> class="form-check-input" name="subject[]" value="css">Css
					  </label>
					</div>
					<div class="form-check-inline">
					  <label class="form-check-label">
<input type="checkbox" <?php if(in_array("html", $s)){ echo "checked"; } ?> class="form-check-input" name="subject[]" value="javascript">Javascript
					  </label>
					</div>
				    <div class="form-check-inline">
					  <label class="form-check-label">
<input type="checkbox" <?php if(in_array("html", $s)){ echo "checked"; } ?> class="form-check-input" name="subject[]" value="python">Python
					  </label>
					</div></div></div>
	 </div>
	 <div class="row pb-2 pt-4">
	 	<div class="col-md-5">Profile Picture<img src="up_img/<?php echo $row['image']; ?>"></div>
	 	<div class="col-md-7"><div class="custom-file">
			    <input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
			    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
		</div></div>
	 </div>
	 <div class="row p-2"><button type="submit" name="update" class="btn btn-outline-success">UPDATE</button></div>
	</form>
<?php } ?>
	 <div class="row lg pb-2 pt-4">
	 	<div class="col-md-8"><p><?php echo $_SESSION['au']; ?></p></div>
	 	<div class="col-md-4"><a type="submit" href="logout.php">LOGOUT</a></div>
	 </div>

	 </div>

	</div>
	</div>
</body>
</html>