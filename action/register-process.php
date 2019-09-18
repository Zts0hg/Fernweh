<?php
  //
  $username = $_POST['user'];
  $password = $_POST['pass'];
  $email = $_POST['email'];
  //
  //$db = new PDO("mysql:dbname=fernweh;host=localhost","root","");
  include "connect.php";
  //
  $result = $db->exec("INSERT INTO `user` (`id`, `username`, `password`, `email`, `fig`) VALUES (NULL, '$username', '$password', '$email', '0')")
              or  die("Failed to exec database " . mysql_error());
/*
  foreach ($result as $row) {
    // code...
  }
  if ($row['username'] == $username && $row['password'] == $password){
    echo "Login success! Welcome " . $row['username'];
  }
  else {
    echo "Failed to login.";
  }
  */
  echo "Hello" . $username;
?>
