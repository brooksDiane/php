<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login page</title>
</head>

<?php

  session_start();

  if (isset($_POST['submit'])){
    $conn=mysqli_connect('localhost','root','','db') or die(mysql_error());
    mysqli_select_db($conn,'db');
    $email = $_POST['email'];
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    if ($email!="&&$password!=") {
      
      $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
      $result = mysqli_query($conn, $sql);
      
      if ($result== false) echo "error while executing";
      else $row = mysqli_fetch_row($result);

      if ($row==true) {

        $_SESSION['email']=$email;

        header('location:profile.php');
      } else {
        $message = "Wrong credentials";
        echo "<script type='text/javascript'>alert('$message');</script>";
      } 
    }
  }
?>
  <script type="text/javascript" src="validation.js"></script>
  <div class="container">

    <form name="form" action="" class="form-group" method="Post">
      <h1>Login</h1>

      <p>
        <label class="text-info" for="Email">Email:</label>
        <input type="text" class="form-control" name="email" placeholder="Your Email">
        <label class="text-info" for="Password">Password:</label>
        <input type="Password" class="form-control" name="password" placeholder="Your Password" pattern=".{5,30}" title="5 to 30">
      </p>

      <button name="submit" type="submit" value="Submit" class="btn btn-primary" onclick="return validateForm()">Login</button>
    </form>


  </div>

</body>

</html>