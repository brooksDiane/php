<!DOCTYPE html>
<html>

<head>
	<title>Form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style>
		html {
			font-family: sans-serif;
			font-weight: 100;
		}
	</style>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  

</head>

<?php 
	session_start();
	$conn=mysqli_connect('localhost','root','','db') or die(mysql_error());
	mysqli_select_db($conn,'db');


	$email = $_SESSION['email'];

	$sql = "SELECT * FROM users WHERE email='$email'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
?>

<body style="background-color: #eee;">
	<h1 style="margin: 2rem 0 -1rem 15rem;">Profile page</h1>
	<section>
	<div class="container py-5">
		<div class="row">
		<div class="col-lg-8">
			<div class="card mb-4">
			<div class="card-body">
				<div class="row">
				<div class="col-sm-3">
					<p class="mb-0">Full Name</p>
				</div>
				<div class="col-sm-9">
					<p class="text-muted mb-0"><?php echo "$row[firstname] $row[lastname]"; ?></p>
				</div>
				</div>
				<hr>
				<div class="row">
				<div class="col-sm-3">
					<p class="mb-0">Email</p>
				</div>
				<div class="col-sm-9">
					<p class="text-muted mb-0"><?php echo $row['email'] ?></p>
				</div>
				</div>
				<hr>
				<div class="row">
				<div class="col-sm-3">
					<p class="mb-0">Phone</p>
				</div>
				<div class="col-sm-9">
					<p class="text-muted mb-0"><?php echo $row['phone'] ?></p>
				</div>
				</div>
				<hr>
				<div class="row">
				<div class="col-sm-3">
					<p class="mb-0">Gender</p>
				</div>
				<div class="col-sm-9">
					<p class="text-muted mb-0"><?php echo $row['gender'] ?></p>
				</div>
				</div>
				<hr>
				<div class="row">
				<div class="col-sm-3">
					<p class="mb-0">Date of birth</p>
				</div>
				<div class="col-sm-9">
					<p class="text-muted mb-0"><?php echo $row['birthdate'] ?></p>
				</div>
				</div>
				<hr>
				<div class="row">
				<div class="col-sm-3">
					<p class="mb-0">Password</p>
				</div>
				<div class="col-sm-9">
					<p class="text-muted mb-0"><?php echo $row['password'] ?></p>
				</div>
				</div>
			</div>
			</div>
		</div>
		</div>
</div>
</section>
</body>
</html>