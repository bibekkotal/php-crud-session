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
  <style>body{ background-color: #5474FF; } .card{ border-radius: 0px;} .table th,td{ text-align: center; } img{ width: 80px; border-radius: 8px; }.btn{ border-radius: 0px; }</style>
</head>
<body>
	<div class="container">
		<div class="card card-shadow m-4 p-2">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Email</th>
					<th>Gender</th>
					<th>Country</th>
					<th>Subject</th>
					<th>Image</th>
					<th colspan="2">Operation</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<?php include'db.php';
				$sel="SELECT * FROM student";
				$rs=$con->query($sel);
				while ($row=$rs->fetch_assoc()) {
				?>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['gender']; ?></td>
					<td><?php echo $row['country']; ?></td>
					<td><?php echo $row['subject']; ?></td>
					<td><img src="up_img/<?php echo $row['image']; ?>"></td>
					<td><a href="update.php?eid=<?php echo $row['id']; ?>" class="btn btn-outline-success">EDIT</a></td>
					<td><a onclick="return confirm('Are You Sure !');" href="delete.php?did=<?php echo $row['id']; ?>" class="btn btn-outline-danger">DELETE</a></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>