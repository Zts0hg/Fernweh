<?php
  $error = NULL;
  session_start();
  include "includes/config.php";
  include "includes/db.php";
//
  function isUnique($email){
    $query1 = "select * from user where email='$email'";
    global $db;
    $result = $db->query($query1);
    if ($result->num_rows >0){
      return false;
    }
    else
      return true;
  }
//
  if (isset($_POST['sign-up'])){
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['confirm-password'] = $_POST['confirm-password'];

// validation
  if (@$_POST['username'] && strlen($_POST['username']) < 3){
    header("Location:sign-up.php?err=" . urlencode("The name must be at least 3 charaters long"));
    exit();
  }
  else if (@$_POST['password'] && (strlen($_POST['password']) < 8) ) {
    header("Location:sign-up.php?err=" . urlencode("The password should be at least 8 charaters long"));
    exit();
  }
  else if (@$_POST['password'] && @$_POST['confirm-password'] && ($_POST['password'] != $_POST['confirm-password']) ){
    header("Location:sign-up.php?err=" . urlencode("The password and confirm password do not match"));
    exit();
  }
  else if (!isUnique(@$_POST['email'])){
    header("Location:sign-up.php?err=" . urlencode("Email is already in use。 Please use another one"));
    exit();
  }
  else {  // Process
    //Get form data and Sanitize them
    $username = $db->real_escape_string($_POST['username']);
    $password = $db->real_escape_string($_POST['password']);
    $email = $db->real_escape_string($_POST['email']);
    //  Generate vkey
    $vkey = md5(time() . $username);
    //Insert user into the database
    $password = md5($password);
    $query2 = "INSERT INTO USER (username, password, email, vkey)
                VALUES('$username', '$password', '$email', '$vkey')";
    $insert = $db->query($query2);
    if ($insert) {
      //  Send Email
      $to = $email;
      $subject = "Fernweh - Email Verification";
      $message = "<a href='http://localhost/fernweh-Blog/registration/verifiy.php?vkey=$vkey'>Verify Email</a>";
      $header = "From: 327403704@qq.com";
      $header .= "MIME-Version: 1.0" . "\r\n";
      $header .= "Conten-type:text/html; charset=UTF-8" . "\r\n";

      mail($to, $subject, $message, $header);

      header("Location: thankyou.php");
      ;//
    }
    else {
      echo $db->error;
    }
  }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Fernweh-Blog</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
    <link rel="icon" href="images/fernwehicon.png" title="Fernweh" type="image/x-icon" >
    <?php include "includes/icon.php"?>

  </head>
  <body class="text-center">
    <?php include "includes/nav.php"?>
    <form method="post" action="sign-up.php" class="form-signin" style="margin-top: 100px">
      <img class="mb-4" src="../images/fernwehicon.png" alt="LOGO" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Thank you for registering</h1>
      <hr>
      <p> We have sent a verification email to the address provided.
      <img class="mb-4" src="../images/mail.png" alt="LOGO" width="72" height="72">
      </p>
      <hr>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</body>
</html>
