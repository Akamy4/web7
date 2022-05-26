<?php
session_start();
unset($_SESSION['user'], $_SESSION['admin'], $_SESSION['role']);
header('Location: ../index.php');
?>
