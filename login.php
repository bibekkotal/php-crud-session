<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LOGIN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <style>body{ background-color: #7DFB89; }.container{ width: 50%;} .card{ border-radius: 0px;  border: none;} img{ width: 80px; border-radius: 8px; }</style>
</head>
<body>
	<div class="container">


<div class="card shadow p-4 m-4">
	<div class="col-md-12">
		<div class="row p-2">
			<h2 class="card-title">LOGIN</h2>
		</div>
		<form  action="" method="post" enctype="multipart/form-data">
	 <div class="row pb-4">
	 	<div class="col-md-3 pt-2">Username</div>
	 	<div class="col-md-9"><input type="text" name="username" class="form-control"></div>
	 </div>
	  <div class="row pb-4">
	 	<div class="col-md-3 pt-2">Password</div>
	 	<div class="col-md-9"><input type="password" name="password" class="form-control"></div>
	 </div>

	 <div class="row p-2">
	 	<div class="col-md-6"><button type="submit" name="lgin" class="btn btn-outline-success">LOGIN</button></div>
	 	<div class="col-md-6"><a type="submit" href="register.php" class="btn btn-outline-secondary">REGISTER</a></div>
	 </div>
	</form>
	<?php include'db.php';
	if (isset($_POST['lgin'])) {
	$u=$_POST['username'];
	$p=$_POST['password'];
	$sel="SELECT * FROM admin WHERE username='$u' AND password='$p'";
	$rs=$con->query($sel);
	if ($rs->num_rows>0) {
		$row=$rs->fetch_assoc();
		$_SESSION['aid']=$row['id'];
		$_SESSION['au']=$row['username'];
		header("location:insert.php");
	    } else { echo "Error !"; }
	} ?>
	</div>
	</div>
</div>
</body>
</html>