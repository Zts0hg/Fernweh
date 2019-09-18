<?php
  include "includes/config.php";
  include "includes/db.php";
  include "includes/header.php";
  include "includes/session.php";
?>

<?php
  if (isset($_GET['username']) && isset($_SESSION['username'])){
    if ($_GET['username'] == $_SESSION['username'])
      include "includes/nav.php";
  }
?>
<div id="main" class="container-fluid">
  <div class="row">
<!--  -->
<!--  -->
    <main  role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2" style="color:white;">Current Position:</h1>
      </div>

      <div class="table-responsive">
        <h4 style="color:white;"><button class="btn btn-info btn-xs" type="button" name="button"><h4 ><?php echo $_GET['username'] ?></h4></button>'s Homepage</h4>
        <div style="opacity:0.7;">
        <table class="table table-dark table-striped table-hover" >
          <thead class="thead-dark">
          <tr>
            <th>Article Title</th>
            <th>Post Time</th>
            <th>Operations</th>
          </tr>
          </thead>
          <tbody>
            <?php
              if (isset($_GET['username'])){
              $username = $_GET['username'];
              $query3 = "SELECT * FROM article where author='$username' AND visible=1 ORDER BY subtime desc";
              $result = $db->query($query3);
              while ($row = $result->fetch_assoc()){
                $id = $row['id'];
                $postTime  = $row['subtime'];
                $title  = $row['title'];
                $postTime = strtotime($postTime);
                $postTime = date("Y-m-d H:i:s", $postTime);
                //
            ?>
          <tr>
            <td><?php echo $title ?></td>
            <td><?php echo $postTime ?></td>
            <td>
              <a href=<?php echo "../single.php?post=" . $id?>><button class="btn btn-info btn-sm" type="button" name="view">View</button></a>
            </td>
          </tr>
        <?php }} ?>
          </tbody>
        </table>
      </div>
      </div>
      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
    </main>


  </div>
</div>
<?php include "includes/footer.php"; ?>
