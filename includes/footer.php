</main><!-- /.container -->
<footer class="blog-footer" style="float:bottom;padding: 10px;border-top: 1px solid black;color: #eeeeee;background-color: #211f22;text-align: center;">
  <p>Blog System built by students in <a href="http://www.njupt.edu.cn">@NJUPT</a>.</p>
  <p>
    <a href="#">Back to top</a>
    <?php  if (isset($_SESSION['username'])) {?>
      <h1>
        Hello, <?php echo $_SESSION['username'] ?>
      </h1>
    <?php } ?>
  </p>
</footer>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</body>
</html>
