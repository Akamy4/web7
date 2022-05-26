<?php
session_start();
require_once '../config/connection.php';

$login = $_POST['login'];
$password = $_POST['password'];

$query = "SELECT * FROM users
where login = '$login'
and password = '$password'";
$user_check = mysqli_query($connection, $query);

if (mysqli_num_rows($user_check) > 0){
  $user = mysqli_fetch_assoc($user_check);
  $_SESSION['role'] = [
    "id_user"=> $user['id_user'],
    "role" => $user['role']
  ];
  if($user['role'] == 1){
    $_SESSION['admin'] = [
      "id_user" => $user['id_user']
    ];
    header ('Location:../admin_page.php');
  } else {
    $_SESSION['user'] = [
      "id_user" => $user['id_user']
    ];
    header ('Location:../user_page.php');
  }
} else if(mysqli_num_rows($user_check)==0) {
  $_SESSION['message']='Не верный логин и/или пароль';
  echo $_SESSION['message'];
  header('Location: ../index.php');
}
?>
