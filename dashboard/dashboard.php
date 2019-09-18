<?php
  include "includes/config.php";
  include "includes/db.php";
  include "includes/session.php";
  if (isset($_SESSION['username'])){
    $query = "SELECT * FROM article WHERE author='$_SESSION[username]'";
    $result = $db->query($query);
  }
?>
<?php
  include "includes/header.php";
  include "includes/nav.php";
?>
    <main id="main" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2" style="color:white;">Dashboard</h1>
      </div>
      <div  class="d-flex p-2 bd-highlight">
      </div>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>


    </main>
  </div>
</div>

<?php include "includes/footer.php" ?>
