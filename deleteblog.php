<?php
include ('connection.php');
session_start();
$server='localhost';
$username='root';
$password='';
$database='etutor';
$link=mysqli_connect($server,$username,$password,$database);

  if(isset($_GET['blogid']) && !empty($_GET['blogid'])){

    $blogid= $_GET['blogid'];
    
    if($_SESSION['loginas']=="tutor"){
      $delsql="DELETE FROM tutorblog WHERE blogid=" . $blogid;
    }
    if($_SESSION['loginas']=="student"){
      $delsql="DELETE FROM studentblog WHERE blogid=" . $blogid;
    }
    
      if(mysqli_query($link, $delsql)){
        echo "<script type='text/javascript'>if(confirm('Blog post deleted!')) 
            { window.open('myblog.php','_self');} else {window.open('myblog.php','_self');}</script>";
      
      }
    
  }
    


?>
