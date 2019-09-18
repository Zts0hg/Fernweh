<?php
  include "includes/config.php";
  include "includes/db.php";
  include "includes/session.php";

  if(isset($_GET['delete'])){
    $cid = $_GET['delete'];
    $query1 = "DELETE FROM comment WHERE id='$cid' LIMIT 1";
    $resultSet = $db->query($query1);
    // if ($resultSet){
    //
    // }


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
        <h1 class="h2" >Manage Comments</h1>
      </div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4" >Comments to me</h4>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead class="thead-dark">
          <tr>
            <th>Post Time</th>
            <th>Article Title</th>
            <th>Content</th>
            <th>username</th>
            <th>Operations</th>
          </tr>
          </thead>
          <tbody>
            <?php
              $username = $_SESSION['username'];
              $query3 = "SELECT *, comment.content AS Ctent, comment.id AS Cid FROM comment, article where (comment.blogid = article.id) AND (article.author='$username')  ORDER BY commenttime desc";
              $result = $db->query($query3);
            if ($result){
              while ($row = $result->fetch_assoc()){
                $postTime  = $row['commenttime'];
                $postTime = strtotime($postTime);
                $postTime = date("Y-m-d H:i:s", $postTime);
                $artiTitle  = $row['title'];
                $content = $row['Ctent'];
                $username = $row['username'];
                $cid = $row['Cid'];
                //
            ?>
          <tr>
            <td><?php echo $postTime ?></td>
            <td><?php echo $artiTitle ?></td>
            <td><?php echo $content ?></td>
            <td><?php echo $username ?></td>
            <td>
              <a href=<?php echo "../single.php?post=" . $row['blogid']?>><button class="btn btn-info btn-sm" type="button" name="button">View</button></a>
              <a href=<?php echo "manage-comments.php?delete=" . $cid?>><button class="btn btn-info btn-sm" type="button" name="button">Delete</button></a>

            </td>
          </tr>
        <?php }} ?>
          </tbody>
        </table>

      </div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4" >Comments I posted</h4>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead class="thead-dark">
          <tr>
            <th>Post Time</th>
            <th>Article Title</th>
            <th>Content</th>
            <th>Operations</th>
          </tr>
          </thead>
          <tbody>
            <?php
              $username = $_SESSION['username'];
              $query3 = "SELECT *,comment.id AS Cid, comment.content AS Ctent FROM comment, article where (comment.blogid = article.id) AND (comment.username='$username')  ORDER BY commenttime desc";
              $result = $db->query($query3);
            if ($result){
              while ($row = $result->fetch_assoc()){
                $postTime  = $row['commenttime'];
                $postTime = strtotime($postTime);
                $postTime = date("Y-m-d H:i:s", $postTime);
                $artiTitle  = $row['title'];
                $content = $row['Ctent'];
                $username = $row['username'];
                $cid = $row['Cid'];

                //
            ?>
          <tr>
            <td><?php echo $postTime ?></td>
            <td><?php echo $artiTitle ?></td>
            <td><?php echo $content ?></td>
            <td>
              <a href=<?php echo "../single.php?post=" . $row['blogid']?>><button class="btn btn-info btn-sm" type="button" name="button">View</button></a>
              <a href=<?php echo "manage-comments.php?delete=" . $cid?>><button class="btn btn-info btn-sm" type="button" name="button">Delete</button></a>
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
