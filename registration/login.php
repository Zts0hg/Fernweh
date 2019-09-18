<?php
  include "../includes/session.php";
    session_start();
  $error = NULL;
  include "includes/config.php";
  include "includes/db.php";

  if (isset($_POST['login'])){
    //  Get form database
    $email = $db->real_escape_string($_POST['email']);
    $password = $db->real_escape_string($_POST['password']);
    $password = md5($password);
    //
    $query1 = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
    $resultSet = $db->query($query1);

    if ($resultSet->num_rows != 0){
      //  Process Login
      $row = $resultSet->fetch_assoc();
      $_SESSION['username'] = $row['username'];
      $_SESSION['email'] = $row['email'];
      $verified = $row['verified'];
      $email = $row['email'];
      $date = $row['createdate'];
      $date = strtotime($date);
      $date = date('M d Y', $date);


      if ($verified == 1){
        //  Continue Process
        header("Location:../index.php");

      }
      else {
        header("Location:login.php?err=" . urlencode("This account has not yet been verified. An email was sent to $email on $date"));
        exit();
      }

    }
    else {
      //  Invaid credentials
      header("Location:login.php?err=" . urlencode("The username or password you entered is incorrect"));
      exit();
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
    <form method="post" action="" class="form-signin" style="margin-top: 100px">
      <img class="mb-4" src="../images/fernwehicon.png" alt="LOGO" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <?php if (isset($_GET['err'])) { ?>
      <div class="alert alert-danger">
        <?php echo $_GET['err'];?>
      </div>
      <?php } ?>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button type="submit" name="login" class="btn btn-lg btn-primary btn-block" >Sign in</button>
      <a href="forgot-password.php"> Forgot password? </a> <a href="sign-up.php"> Sign up new account? </a>
      <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

<div>
</div>
</body>
</html>
