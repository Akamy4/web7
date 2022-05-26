<?php
  session_start();
  if(isset($_SESSION['user'])){
    header ('Location: user_page.php');
  } else if (isset($_SESSION['admin'])) {
    header ('Location: admin_page.php');
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
<div style="
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;">
  <div>
    <form action="includes/signin.php" method="post">
      <span>АВТОРИЗАЦИЯ</span>
      <div>
        <input type="text" placeholder="Login" name = "login">
      </div>
      <div class="container mt-2">
        <input type="password" placeholder="Password" name = "password">
      </div>
      <div>
        <button type="submit" class="btn btn-default">ВХОД</button>
      </div>
      <?php
      if (isset($_SESSION['message'])){
        echo '<p>'.$_SESSION['message'].'</p>';
      }
      unset($_SESSION['message']);
       ?>
    </form>
  </div>
</div>


  </body>
</html>
