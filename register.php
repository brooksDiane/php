<!DOCTYPE html>
<html>

<head>
  <title>Registration page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style>
    form {
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
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $_SESSION['email'] = $email;

    $query = "SELECT * FROM users where email='$email'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){
      $message = "Invalid Credentials, $email already exists. ";
      echo "<script type='text/javascript'>alert('$message');</script>"; 
    } else {
      $sql = " INSERT INTO users (firstname, lastname, birthdate, phone, gender, email, password) VALUES ('$firstname','$lastname','$date','$phone','$gender','$email','$password')";
      mysqli_query($conn,$sql);
      header('location:profile.php');
    }
  } 
?>

<script type="text/javascript" src="validation.js"></script>

<body onload='document.form.email.focus()'>

<form class="container register" name="form" action="register.php" method="post">
  <div class="row">
      <div class="col-md-9 register-right">
          <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <h1 class="register-heading">Register</h1>
                  <div class="row register-form">
                      <div class="col-md-6">
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="First Name" name="firstname"/>
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="Last Name" name="lastname"/>
                          </div>
                          <div class="form-group">
                              <input type="password" class="form-control" placeholder="Password"  name="password"/>
                          </div>
                          <div class="form-group">
                          <input type="date" class="form-control"  name=date />
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <input type="email" class="form-control" placeholder="Your Email" name="email"/>
                          </div>
                          <div class="form-group">
                              <input type="text"  class="form-control" placeholder="Your Phone" value="" name="phone" />
                          </div>
                          <div class="form-group">
                              <select class="form-control" name="gender">
                                  <option class="hidden" disabled >Gender</option>
                                  <option value=Female>Female</option>
                                  <option value=Male>Male</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <button class="btn btn-primary" style="width: 100%;" name="submit" type="submit" value="submit" onclick="return validateForm();">Register</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>
  </div>

</form>
</body>



</html>