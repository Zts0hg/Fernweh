<?php
  //
  $username = $_POST['user'];
  $password = $_POST['pass'];
  //


  //$db = new PDO("mysql:dbname=fernweh;host=localhost","root","");
  include "connect.php";
  //
  $result = $db->query("select * from user where username = '$username' and password = '$password'")
              or  die("Failed to query database " . mysql_error());

  foreach ($result as $row) {
    // code...
  }
  if ($row['username'] == $username && $row['password'] == $password){
    echo "Login success! Welcome " . $row['username'];
  }
  else {
    echo "Failed to login.";
  }
?>
