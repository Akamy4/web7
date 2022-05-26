<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location:index.php');
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
      background-color: #000000;
      color: #000000;
      font-size: 24px;
      font-family: Arial;
      font-weight: 500;
    }
    div{
      background: #ffffff;
      padding: 5px;
    }
    </style>
  </head>
  <body>
    <?php
    $id_user = $_SESSION['user']['id_user'];
    require_once 'config/connection.php';
    $user_check = mysqli_query($connection, "SELECT * FROM `users`
      WHERE id_user = '$id_user'");
      $user = mysqli_fetch_assoc($user_check);
      $user_info[]=[
        "surname" => $user['surname'],
         "name" => $user['name'],
         "login" => $user['login'],
         "password" => $user['password'],
         "number" => $user['number'],
         "role" => $user['role']
         ];
    ?>
    <div class="container mt-4">
      <div class="mt-2">
        <div style="">
          <p style="display: flex; justify-content: end;"><a href="includes/logout.php" class = "logout">Выход</a></p>
          <div>
            <p>ФИ: <?= $user['surname']?> <?=$user['name']?></p>
            <p>Логин: <?= $user['login']?></p>
            <p>Пароль: <?= $user['password']?></p>
            <p style="display: flex; justify-content: center;"><a href="includes/update.php?id_user=<?=$id_user?>">Обновить</a></p>
          </div>
          <table width="100%">
            <thead>
              <tr>
                <th>Firm</th>
                <th>Type</th>
                <th>Number of puffs</th>
                <th>Taste</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $id_user = $_SESSION['user']['id_user'];
              require_once 'config/connection.php';
              $user_vape = mysqli_query($connection, "SELECT * FROM users, vape, users_vape
                WHERE users_vape.id_user = users.id_user
                AND users_vape.id_vape = vape.id_vape
                AND users.id_user = $id_user");
              while ($user = mysqli_fetch_assoc($user_vape)) {
                $users[] = [
                  "firm" => $user['firm'],
                  "type" => $user['type'],
                  "number_of_puffs" => $user['number_of_puffs'],
                  "taste" => $user['taste']
                ];
              }
              foreach ($users as $value) {
                echo '<tr>
                <td>'.$value['firm'].'</td>
                <td>'.$value['type'].'</td>
                <td>'.$value['number_of_puffs'].'</td>
                <td>'.$value['taste'].'</td>
                </tr>';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
