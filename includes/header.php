<?php
  session_start();
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
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/blog/">

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
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="images/fernwehicon.png" title="Fernweh" type="image/x-icon" >
  </head>

  <body class="fluid-container">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
          <img src="images/fernwehicon.png" width="32" height="32" class="d-inline-block align-top" alt="">
          Fernweh
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a id="nav-login" class="nav-item nav-link" href="registration/login.php ">Login</a>
          </li>
          <li class="nav-item">
            <a id="nav-register" class="nav-link" href="registration/sign-up.php" tabindex="-1" aria-disabled="true">Register</a>
          </li>
          <?php  if (isset($_SESSION['username'])) {?>
            <li class="nav-item">
              <a id="nav-logout" class="nav-link" href="registration/logout.php" tabindex="-1" aria-disabled="true">logout</a>
            </li>
          <?php } ?>
        </ul>
        <?php  if (isset($_SESSION['username'])) {?>
          <div >
            <a href="dashboard/dashboard.php">
            <button type="button" name="button" class="btn btn-dark">Hello, <?php echo $_SESSION['username'] ?></button>
            </a>
          </div>
          <style >
            #nav-login, #nav-register {
              display: none;
            }
          </style>
        <?php } ?>
        <form method="post" action="results.php" class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
