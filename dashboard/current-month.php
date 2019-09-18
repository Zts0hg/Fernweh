<?php
  include "includes/config.php";
  include "includes/db.php";
  include "includes/session.php";
//  Delete the blog
  if (isset($_GET['deleteid'])){
    $author = $_SESSION['username'];
    $id = $_GET['deleteid'];
    $query3 = "DELETE FROM article WHERE id = '$id'";
    $result = $db->query($query3);
  }
?>

<?php include "includes/header.php"; ?>
<div class="container-fluid">
  <div class="row">
<!--  -->
<?php include "includes/nav.php"; ?>
<!--  -->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Current Month</h1>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead class="thead-dark">
          <tr>
            <th>Post Time</th>
            <th>Article Title</th>
            <th>Operations</th>
          </tr>
          </thead>
          <tbody>
            <?php
              $username = $_SESSION['username'];
              //  Get the date of current month
              date_default_timezone_set("Asia/Shanghai");
              $currentMonth = date('Y-m');
              echo $currentMonth;
              //
              $query3 = "SELECT * FROM article where (author='$username') AND (subtime LIKE '$currentMonth%') ORDER BY subtime desc";
              $result = $db->query($query3);
              if ($result){
              while ($row = $result->fetch_assoc()){
                $id = $row['id'];
                $postTime  = $row['subtime'];
                $title  = $row['title'];
                $postTime = strtotime($postTime);
                $postTime = date("Y-m-d H:i:s", $postTime);

                //
            ?>
          <tr>
            <td><?php echo $postTime ?></td>
            <td><?php echo $title ?></td>
            <td>
              <a href=<?php echo "../single.php?post=" . $id?>><button class="btn btn-info btn-sm" type="button" name="view">View</button></a>
              <a href=<?php echo "manage-blogs.php?deleteid=" . $id?>><button class="btn btn-info btn-sm" type="button" name="delete">Delete</button></a>
              <a href=<?php echo "manage-blogs.php?displayid=" . $id?>><button class="btn btn-info btn-sm" type="button" name="button">Show/Hide</button></a>
            </td>
          </tr>
        <?php }} ?>
          </tbody>
        </table>

      </div>
      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
    </main>


  </div>
</div>

<?php include "includes/footer.php"; ?>
