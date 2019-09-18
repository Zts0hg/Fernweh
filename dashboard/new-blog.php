<?php
  include "includes/icon.php";
  include "includes/session.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>写博客-Fernweh</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="css/doshboard.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body onload="init();" id="main" style="background-image:url('css/change_password.jpg');">
    <form action="add.php" method="post" class="form-group" >
      <div class="row navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <div class="col-md-10">
          <input type="text" class="form-control" name="blog-title" placeholder="Please input the Blog Title" required>
        </div>
        <div class="col-md-2">
          <button class="btn btn-info btn-xs" type="submit" name="button">Post My Blog</button>
        </div>
      </div>
      <div id="entry" class="row container" style="margin-top:50px; display: flex;" id="mark-down">
        <div class="col-md-5">
          <textarea id="text" required name="blog-content" rows="30" cols="67" style="height:1em;" placeholder="Glad you use fernweh markdown editor. &#10&#10The left area (which has been showing this message) is the textarea and the actual content would live show in the right." v-model="input"></textarea>
        </div>
        <div class="col-md-5 " style="height:1em; word-break:break-all; margin-right:0;margin-left:auto;">
          <p class="alert alert-info">{{{ input | md}}}</p>
        </div>
      </div>
  </form>


  <script src="js/vue.js"></script>
  <script src="js/editor.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.5/marked.js"></script>
  <script type="text/javascript" src="http://cdn.jsdelivr.net/vue/1.0.26/vue.min.js"></script>
  <script>
    var vm = new Vue({
      el: '#entry',
      data: {
        input: ''
      },
      filters: {
        md: function (val) {
          return marked(val)
        }
      }
    })
  </script>
</body>
</html>
