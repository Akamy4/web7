<?php
session_start();
require_once '../config/connection.php';

$surname = $_POST['surname'];
$name = $_POST['name'];
$login = $_POST['login'];
$password = $_POST['password'];
$id_user = $_POST['id_user'];
mysqli_query($connection, "UPDATE users SET
surname='$surname',
name='$name',
login='$login',
password='$password'
 WHERE id_user = '$id_user'");
 if(isset($_SESSION['user'])){
   header ('Location: ../user_page.php');
 } elseif (isset($_SESSION['admin'])) {
header ('Location: ../admin_page.php'); 
}
 ?>
