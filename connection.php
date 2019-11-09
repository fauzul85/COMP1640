<?php

$server='localhost';
$username='root';
$password='';
$database='etutor';
$link=mysqli_connect($server,$username,$password,$database);
if(!$link)
{
	exit('Error: could not establish database connection');
}
mysqli_select_db($link,$database) or die("Cant establish connection with the db");
?>
