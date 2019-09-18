<?php
  include "includes/config.php";
  include "includes/db.php";
  session_start();
  include "includes/session.php";
//  Add New Category
  if (isset($_POST['add-new'])){
    $category = $db->real_escape_string($_POST['category']);
    if (empty($category)){
      $_SESSION["ErrorMessage"] = "Category name must not be empty";
    }
    else {
      $creator = $_SESSION['username'];
      $query1 = "SELECT * FROM category where name='$category' AND creatorname='$creator'";
      $resultSet = $db->query($query1);
      if ($resultSet->num_rows != 0){
        $_SESSION["ErrorMessage"] = "This category has existed.";
      }
      else {
        $query2 = "INSERT INTO category(name, creatorname)
                  VALUES('$category', '$creator')";
        $resultSet = $db->query($query2);
        if ($resultSet){
          $_SESSION["SuccessMessage"] = "Successfully Added.";
        }
        else{
          $_SESSION["ErrorMessage"] = "Failed to Add. Someting goes wrong.";
        }
      }
    }
  }
//  Delete the Category
  if (isset($_GET['delete'])){
    $creatorname = $_SESSION['username'];
    $category = $_GET['delete'];
    $query3 = "DELETE FROM category WHERE name='$category' AND creatorname='$creatorname'";
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
        <h1 class="h2">Manage Categories</h1>
      </div>
      <div>
        <form class="" action="#" method="post">
          <fieldset>
            <div class="form-group">
              <h4 >Add New Category</h4>
              <label for="categoryname">categoryname: </label>
              <input id="categoryname" type="text" class="form-control" name="category" placeholder="categoryname">
              <button name="add-new" type="submit" class="btn btn-outline-success btn-block">Add New Category</button>
              <?php echo Message()?>
            </div>
          </fieldset>
        </form>
        <hr>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead class="thead-dark">
          <tr>
            <th>Category Name</th>
            <th>Operations</th>
            <th>Article Num</th>
          </tr>
          </thead>
          <tbody>
            <?php
              $username = $_SESSION['username'];
              $query3 = "SELECT * FROM category where creatorname='$username' ORDER BY createtime desc";
              $result = $db->query($query3);
              while ($row = $result->fetch_assoc()){
                $categoryName = $row['name'];

                // $articleNum =
            ?>
          <tr>
            <td><?php echo $categoryName ?></td>
            <td>
              <a href="../dashboard.php"><button class="btn btn-info btn-sm" type="button" name="button">View</button></a>
              <a href=<?php echo "categories.php?delete=" . $categoryName?>><button class="btn btn-info btn-sm" type="button" name="button">Delete</button></a>

            </td>
            <td>NONE</td>
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
