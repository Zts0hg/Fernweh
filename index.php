<?php
  include "includes/header.php";
  include "includes/config.php";
  include "includes/db.php";
  include "includes/Parsedown.php";
  $query = "SELECT * FROM article WHERE /*author='ruo' AND */visible=1 ORDER BY subtime desc";
  $result = $db->query($query);
?>
      <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
          <h1 class="site-title" >
            Fernweh</h1>
          <h5 class="site-description" style="text-align: center;text-decoration:overline;">
            Learning - Future Wise</h5>
      </div>
<main role="main" class="container">
  <div class="row">
    <div class="col-md-9 blog-main">
<?php   if($result){
          while($row=$result->fetch_assoc()){
?>
      <div class="blog-post card border-info mb-3">
        <h2 class="blog-post-title"><?php echo $row['title'] ?></h2>
        <p class="blog-post-meta">
          <?php $time = strtotime($row['subtime']);
                $time = date("Y年m月d日 H:i:s",$time);
                echo $time;
           ?> by
           <a class="btn btn-outline-info btn-sm" href="dashboard/person.php?username=<?php echo $row['author']; ?>"><?php echo " ".$row['author'] ?></a>
        </p>
        <?php $Parsedown = new Parsedown();
              $content = $Parsedown->text($row['content']);
              if (strlen($content) < 400){
                echo $content;
              } else {
              echo substr($content, 0, 400) . "...";}
         ?>
        <br>
        <a href="single.php?post=<?php echo $row['id'] ?>" class="btn btn-primary">Read More</a>
      </div><!-- /.blog-post -->
    <?php }} ?>

  </div><!-- /.blog-main -->
<?php include "includes/sidebar.php"?>

<?php include "includes/footer.php"?>
