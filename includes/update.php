<?php
require_once '../config/connection.php';

$id_user = $_GET['id_user'];
$query = "SELECT * FROM `users` WHERE id_user=$id_user";
$user = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($user);
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Изменить Данные</title>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  </head>
  <body>

      <form action="update_script.php" method="post">
        <h1>Изменение данных</h1>
        <label>Surname</label>
        <div>
          <input type="text" name="surname" value="<?= $user['surname']?>">
        </div>

        <label>Name</label>
        <div>
          <input type="text" name="name" value="<?= $user['name']?>">
        </div>

        <label>Login</label>
        <div>
          <input type="text" name="login" value="<?= $user['login']?>">
        </div>

        <label>Password</label>
        <div>
          <input type="text" name="password" value="<?= $user['password']?>">
        </div>
        <input type="hidden" name="id_user" value="<?= $user['id_user']?>">
        <button class="mt-2" type="submit">Изменить</button>
      </form>

  </body>
</html>
