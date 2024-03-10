
<?php session_start();
include_once 'connection.php';?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Avian Crux Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form method="POST" action="LoginCheck.php">
        <div class="txt_field">
          <input type="text" name="UserEmail" required>
          <span></span>
          <label>User Email</label>
        </div>
        <div class="txt_field">
          <input name = "UserPassword" type="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass"></div>
        <input type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="Register.php">Signup</a>
        </div>
      </form>
    </div>

  </body>
</html>
