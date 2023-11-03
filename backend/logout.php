<?php session_start();
$id= $_SESSION['user'];
unset($id);
session_destroy();
header("location: ../login.php"); ?>