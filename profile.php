<!DOCTYPE html>
<html>

<head>
  <title>Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

<body>
	<h1>Profile page</h1>

	<h2>Name <?php echo "$row[firstname] $row[lastname]"; ?></h2>
	<p>Date of Birth: <?php echo $row['birthdate'] ?></p>
	<p>Email: <?php echo $row['email'] ?></p>
	<p>Password: <?php echo $row['password'] ?></p>

</body>

</html>