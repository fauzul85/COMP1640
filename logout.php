<?php
include ('connection.php');
session_start();
$server='localhost';
$username='root';
$password='';
$database='etutor';
$link=mysqli_connect($server,$username,$password,$database);

unset($_SESSION['success']);
unset($_SESSION['user']);
unset($_SESSION['email']);
unset($_SESSION['loginas']);
unset($_SESSION['email']);
session_destroy();

header('location:login.php');


?>
