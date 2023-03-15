<!DOCTYPE html>
<html>

<head>
  <title>Registration page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    label {
      display: block;
    }


    button {
      margin-top: 2rem;
    }
  </style>
</head>

<?php
 
  session_start();

  if (isset($_POST['submit'])){
    $conn=mysqli_connect('localhost','root','','db') or die(mysql_error());
    mysqli_select_db($conn,'db');

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $date = $_POST["date"];

    $email = $_POST['email'];
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $_SESSION['email'] = $email;

    $query = "SELECT * FROM users where email='$email'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){
      $message = "Invalid Credentials , $email Or $username already exists. ";
      echo "<script type='text/javascript'>alert('$message');</script>"; 
    } else {
      $sql = " INSERT INTO users (firstname, lastname, birthdate, email, password) VALUES ('$firstname','$lastname','$date','$email','$password')";
      mysqli_query($conn,$sql);
      header('location:profile.php');
    }
  } 
?>

<script type="text/javascript" src="validation.js"></script>

<body onload='document.form.email.focus()'>

<h1 >Login</h1>

  <div class="container">
    <form name="form" action="register.php" method="post">

      <label for="">
        Firstname:
        <input type="text" name="firstname">
      </label>
      
      <label for="">
        Lastname:
        <input type="text" name="lastname">
      </label>

      <label for="">
        Date of Birth:
        <input type="date" name="date">
      </label>

      <label for="">
        Email:
        <input type="email" name="email">
      </label>

      <label for="">
        Password:
        <input type="password" name="password">
      </label>

      <button class="btn btn-primary" name="submit" type="submit" value="submit" onclick="return validateForm();">Register</button>
    </form>
  </div>
</body>

</html>