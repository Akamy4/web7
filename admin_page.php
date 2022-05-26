<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Страница Админа</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style media="screen">
    body {
      background-color: #fff;
      color: #000000;
      font-size: 24px;
      font-family: Arial;
      font-weight: 500;
    }
    div{
      background: #ffffff;
      padding: 5px;
    }
    th, td {
        padding: 10px;
    }

    th {
        background: #606060;
        color: #fff;
    }

    td {
        background: #b5b5b5;
    }
    </style>
  </head>
<body>
  <div class="container mt-4">
    <p style="display: flex; justify-content: end;"><a href="includes/logout.php" class = "logout">Выход</a></p>
    <div>
      <table width="700" style="margin: 0 auto">
        <thead>
          <tr>
            <th>Surname</th>
            <th>Name</th>
            <th>Login</th>
            <th>Password</th>
            <th>Role</th>
            <th>Function</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require_once 'config/connection.php';
          $users = mysqli_query($connection, "SELECT * FROM users");
          $users = mysqli_fetch_all($users);
          foreach ($users as $key) {
          ?>

          <tr>
              <td><?=$key[1]?></td>
              <td><?=$key[2]?></td>
              <td><?=$key[3]?></td>
              <td><?=$key[4]?></td>
              <td><?=$key[5]?></td>
              <td> <a href="includes/update.php?id_user=<?=$key[0]?>"> Изменить </a> <br>
              <a href="includes/delete.php?id_user=<?=$key[0]?>&role=<?=$key[5]?>"> Удалить </a></td>
          </tr>
          <?php
          }
           ?>
        </tbody>
      </table>
  </div>
  </div>
        <div>
          <table width="1000" style="margin: 0 auto">
            <thead>
              <tr>
                <th>Surname</th>
                <th>Name</th>
                <th>Login</th>
                <th>Password</th>
                <th>Role</th>
                <th>Firm</th>
                <th>Type</th>
                <th>Number of puffs</th>
                <th>Taste</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once 'config/connection.php';
              $users = mysqli_query($connection, "SELECT * FROM users, vape, users_vape
                WHERE users_vape.id_user = users.id_user
                AND users_vape.id_vape = vape.id_vape");
              $users = mysqli_fetch_all($users);
              foreach ($users as $key) {
              ?>
              <tr>
                  <td><?=$key[1]?></td>
                  <td><?=$key[2]?></td>
                  <td><?=$key[3]?></td>
                  <td><?=$key[4]?></td>
                  <td><?=$key[6]?></td>
                  <td><?=$key[7]?></td>
                  <td><?=$key[8]?></td>
                  <td><?=$key[9]?></td>
                  <td><?=$key[10]?></td>
              </tr>
              <?php
              }
               ?>
            </tbody>
          </table>
    </div>

  </body>
</html>
