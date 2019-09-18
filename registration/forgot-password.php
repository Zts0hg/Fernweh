<?php
  $error = NULL;
  include "includes/config.php";
  include "includes/db.php";

  if (isset($_POST['send-email'])){
    $email = $db->real_escape_string($_POST['email']);
    $query1 = "SELECT * from user WHERE email = '$email' LIMIT 1";
    $resultSet = $db->query($query1);
    if ($resultSet->num_rows != 0){
      //  Verify
      $row = $resultSet->fetch_assoc();
      $email = $row['email'];
      $vkey = $row['vkey'];
      $date = strtotime(time());
      $date = date('M d Y', $date);
        // send Verified email
      $to = $email;
      $subject = "Fernweh - Reset your password";
      $message = "<a href='http://172.20.10.3/fernweh-Blog/registration/reset-password.php?vkey=$vkey'>Reset Password AS abc123456</a>";
      $header = "From: 13960359711@163.com";
      // $header .= "MIME-Version: 1.0" . "\r\n";
      // $header .= "Conten-type:text/html; charset=UTF-8" . "\r\n";
      mail($to, $subject, $message, $header);
    }
    else {
      echo "This email has not been used. Please re-enter or regiter it.";
    }
  }
  else {
    echo "something goes wrong.";
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
    <form method="post" action="" class="form-signin" style="margin-top: 100px">
      <img class="mb-4" src="../images/fernwehicon.png" alt="LOGO" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please input your Email</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required >
      <hr>
      <button type="submit" name="send-email" class="btn btn-lg btn-primary btn-block" >Send Reset Email</button>
      <a href="login.php" class="btn btn-lg btn-danger btn-block"> Cancel </a>
      <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</body>
</html>
