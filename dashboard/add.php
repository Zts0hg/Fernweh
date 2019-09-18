<?php
  include "includes/config.php";
  include "includes/db.php";
  session_start();
  include "includes/session.php";
//  Add New
  $author = $_SESSION['username'];
  $title = $_POST['blog-title'];
  $content = $_POST['blog-content'];
  $query2 = "INSERT INTO article(title, content, author)
            VALUES('$title', '$content', '$author')";
  $resultSet = $db->query($query2);
  if ($resultSet){
    $_SESSION['SuccessMessage'] = "Successfully post the article.";

  } else {
    $_SESSION['ErrorMessage'] = "Failed to post the article. Someting goes wrong.";
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
    <form  class="form-signin" style="margin-top: 150px">
      <img class="mb-4" src="../images/fernwehicon.png" alt="LOGO" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Thank you for using Fernweh</h1>
      <hr>
      <?php echo Add_Feedback(); ?>
      <hr>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</body>
</html>
