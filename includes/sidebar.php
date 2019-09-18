<aside class="col-md-3 blog-sidebar" style="margin-top:100px;">
  <div class="p-4 mb-3 bg-light rounded">
    <h4 class="font-italic">About Fernweh</h4>
    <hr>
    <p class="mb-0"> <strong>Fernweh Blog System</strong> has been designed and build for people learning science subjects to submarize and share their learning experience with <strong>Fenyman Technique</strong></p>
  </div>

  <!-- <div class="p-4">
    <h4 class="font-italic">Timeline</h4>
    <hr>
    <ol class="list-unstyled mb-0">
      <li><a href="#">September 2019</a></li>
      <li><a href="#">August 2019</a></li>
      <li><a href="#">July 2019</a></li>
    </ol>
  </div> -->
  <div class="p-4">
    <h4 class="font-italic">Subscribe</h4>
    <hr>
    <form method="post" >
    <div class="form-group">
      <input type="text" name="Name" class="form-control" id="InputName" placeholder="Your Name">
    </div>
    <div class="form-group">
      <input type="email" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Your Email Address">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <?php if(isset($_POST['subscribe'])){ ?>
    <div class="alert alert-success">
      <p>Successfully subscribe.</p>
    </div>
    <?php } ?>
    <button type="submit" class="btn btn-primary" name="subscribe">Subscribe</button>
    </form>
  </div>
  <div class="p-4">
    <h4 class="font-italic">Elsewhere</h4>
    <hr>
    <ol class="list-unstyled">
      <li><a href="https://github.com">GitHub</a></li>
      <li><a href="https://twitter.com/?lang=zh-cn">Twitter</a></li>
      <li><a href="https://www.facebook.com">Facebook</a></li>
      <li><a href="http://www.njupt.edu.cn">NJUPT</a></li>
    </ol>
  </div>
</aside><!-- /.blog-sidebar -->
<!-- </div> -->
<!-- /.row -->
