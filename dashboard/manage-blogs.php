<?php
  include "includes/config.php";
  include "includes/db.php";
  include "includes/header.php";
  include "includes/session.php";
//  Add New Category
//   if (isset($_POST['add-new'])){
//     $category = $db->real_escape_string($_POST['category']);
//     if (empty($category)){
//       $_SESSION["ErrorMessage"] = "Category name must not be empty";
//     }
//     else {
//       $creator = $_SESSION['username'];
//       $query1 = "SELECT * FROM category where name='$category' AND creatorname='$creator'";
//       $resultSet = $db->query($query1);
//       if ($resultSet->num_rows != 0){
//         $_SESSION["ErrorMessage"] = "This category has existed.";
//       }
//       else {
//         $query2 = "INSERT INTO category(name, creatorname)
//                   VALUES('$category', '$creator')";
//         $resultSet = $db->query($query2);
//         if ($resultSet){
//           $_SESSION["SuccessMessage"] = "Successfully Added.";
//         }
//         else{
//           $_SESSION["ErrorMessage"] = "Failed to Add. Someting goes wrong.";
//         }
//       }
//     }
//   }
//  Delete the Category
  if (isset($_GET['deleteid'])){
    $author = $_SESSION['username'];
    $id = $_GET['deleteid'];
    $query3 = "DELETE FROM article WHERE id = '$id'";
    $result = $db->query($query3);
  }
  if (isset($_GET['visibleid'])){
    $author = $_SESSION['username'];
    $id = $_GET['visibleid'];
    $query3 = "UPDATE article SET visible=(visible=0) WHERE id = '$id'";
    $result = $db->query($query3);
  }
?>






<div class="container-fluid">
  <div class="row">
<!--  -->
<?php include "includes/nav.php"; ?>
<!--  -->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Blogs</h1>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead class="thead-dark">
          <tr>
            <th>Post Time</th>
            <th>Article Title</th>
            <th>Status: Shown / Hiden</th>
            <th>Operations</th>
          </tr>
          </thead>
          <tbody>
            <?php
              $username = $_SESSION['username'];
              $query3 = "SELECT * FROM article where author='$username' ORDER BY subtime desc";
              $result = $db->query($query3);
              while ($row = $result->fetch_assoc()){
                $id = $row['id'];
                $postTime  = $row['subtime'];
                $title  = $row['title'];
                $postTime = strtotime($postTime);
                $postTime = date("Y-m-d H:i:s", $postTime);
                $visible = $row['visible'];

                //
            ?>
          <tr>
            <td><?php echo $postTime ?></td>
            <td><?php echo $title ?></td>
            <td><?php if($visible==1) echo "Shown"; else echo "Hiden"; ?></td>
            <td>
              <a href=<?php echo "../single.php?post=".$id?>><button class="btn btn-info btn-sm" type="button" name="view">View</button></a>
              <a href=<?php echo "manage-blogs.php?deleteid=" . $id?>><button class="btn btn-info btn-sm" type="button" name="delete">Delete</button></a>
              <a href=<?php echo "manage-blogs.php?visibleid=" . $id?>><button class="btn btn-info btn-sm" type="button" name="button">Show/Hide</button></a>
            </td>
          </tr>
          <?php } ?>
          </tbody>
        </table>

      </div>
      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
    </main>


  </div>
</div>

<?php include "includes/footer.php"; ?>
