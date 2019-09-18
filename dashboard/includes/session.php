<?php
  if(session_status() == PHP_SESSION_DISABLED )
    session_start();
  function Message(){
    if (isset($_SESSION['ErrorMessage'])){
    $output = "<div class=\"alert alert-danger\">";
    $output .=htmlentities($_SESSION["ErrorMessage"]);
    $output .="</div>";
    $_SESSION['ErrorMessage'] = NULL;
    return $output;
    }
    if (isset($_SESSION['SuccessMessage'])){
    $output = "<div class=\"alert alert-success\">";
    $output .=htmlentities($_SESSION["SuccessMessage"]);
    $output .="</div>";
    $_SESSION['SuccessMessage'] = NULL;
    return $output;
    }
  }
  function Add_Feedback(){
    if (isset($_SESSION['ErrorMessage'])){
    $output = "<div class=\"alert alert-danger\">";
    $output .=htmlentities($_SESSION["ErrorMessage"]);
    $output .="</div>";
    $_SESSION['ErrorMessage'] = NULL;
    return $output;
    }
    if (isset($_SESSION['SuccessMessage'])){
    $output = "<div class=\"alert alert-success\">";
    $output .=htmlentities($_SESSION["SuccessMessage"]);
    $output .="</div>";
    $output .="<a href='manage-blogs.php'> Manage Blogs | </a> <a href='new-blog.php'> Write More one </a>";
    $_SESSION['SuccessMessage'] = NULL;
    return $output;
    }
  }

?>
