<?php
require_once '../config/connection.php';

$id_user = $_GET['id_user'];
$role = $_GET['role'];
if($role==2){
  mysqli_query($connection, "DELETE FROM `users`
    Where id_user = '$id_user'");
}
header('Location: ../admin_page.php');
?>
