<?php
  include "includes/config.php";
  include "includes/db.php";
  include "includes/header.php";
  include "includes/nav.php";
  include "includes/session.php";
  if (isset($_POST['change'])){
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $conPassword = $_POST['confirm_password'];
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    // Get data from the database
    $oldPassword = md5($oldPassword);
    $query1 = "SELECT * FROM user WHERE (username='$username') AND (password='$oldPassword') LIMIT 1";
    $query3 = "SELECT * FROM user WHERE email='$email' AND password='$oldPassword' LIMIT 1";
    $resultSet1 = $db->query($query3);
    if ($resultSet1->num_rows != 0){
      $bool = "true";
      //  process the change
      if ((strlen($newPassword) < 8) ) {
        $_SESSION['ErrorMessage'] = "The new password must at least 8 characters long.";
      }
      else if ($newPassword != $conPassword){
        $_SESSION['ErrorMessage'] = "The new password and confirmed password don't match.";
      }
      else {
      //  pass the change
        $newPassword = md5($newPassword);
        $query2 = "UPDATE user SET password='$newPassword' WHERE username='$_SESSION[username]' AND password='$oldPassword' LIMIT 1";
        $resultSet2 = $db->query($query2);
        if ($resultSet2){
          $_SESSION['SuccessMessage'] = "Password has been successfully changed.";
        }
        //
        else {
          $_SESSION['ErrorMessage'] = "Failed to change password. Something goes wrong.";
          }
        }
    }
    else {
      $_SESSION['ErrorMessage'] = "The old password is wrong.";
    }



  }
?>

<?php

?>
    <main id="main" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2" style="color:white;">Change Password</h1>
      </div>
      <div  class="d-flex p-2 bd-highlight">
        <div class="text-center" style="margin-left:auto; margin-right:auto; margin-top:100px; opacity:0.9;">
            <form method="post" action="" class="form-signin" style="margin-top: 100px">
              <!-- <img class="mb-4" src="../images/fernwehicon.png" alt="LOGO" width="72" height="72"> -->
              <?php if (isset($_GET['err'])) { ?>
                <div style="width:250px; margin-left:auto; margin-right:auto;">
                  <label class="alert alert-danger">
                    <?php echo $_GET['err'];?>
                  </label>
                </div>
              <?php } ?>
              <?php if (isset($resultSet1) || isset($resultSet2)) { ?>
                <div style="width:250px; margin-left:auto; margin-right:auto;">
                    <?php echo Message();?>
                </div>
              <?php } ?>
              <div class="form-group row">
                <label for="inputEmail" style="color:white;">Old Password</label>
                <input type="password" name="old_password" id="inputEmail" class="form-control" placeholder="Old Password" required autofocus>
              </div>
              <div class="form-group row">
                <label for="inputPassword" style="color:white;">New Password</label>
                <input type="password" name="new_password" id="inputPassword" class="form-control" placeholder="New Password (at least 8 characters)" required>
              </div>
              <div class="form-group row">
                <label for="inputPassword" style="color:white;">Confirm Password</label>
                <input type="password" name="confirm_password" id="inputPassword" class="form-control" placeholder="Confirm Password (at least 8 characters)" required>
              </div>
              <button type="submit" name="change" class="btn btn-lg btn-dark btn-block" >Change Password</button>
            </form>

        </div>
      </div>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>


    </main>
  </div>
</div>

<?php include "includes/footer.php" ?>
