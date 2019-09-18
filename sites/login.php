<!DOCTYPE html>
<html>
<head>
  <title>登录页</title>
</head>
<body>
  <!-- 登录表单-->
  <div id="login-opt">
  <form action="login-process.php" method="post">
    <p>
      <label>用户名</label>
      <input type="text" id="user" name="user" />
    </p>
    <p>
      <label>用户密码</label>
      <input type="password" id="pass" name="pass" />
    </p>
    <p>
      <input type="submit" id="btn" value="登录" />
    </p>
  </form>
  </div>
</body>
</html>
