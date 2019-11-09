<?php
$server='localhost';
$username='root';
$password='';
$database='etutor';
$link=mysqli_connect($server,$username,$password,$database);
include ('connection.php');
session_start();

$email=$_POST['email'];
$pwd=$_POST['password'];

        if($email == "" || $pwd == ""){
                echo "<script type='text/javascript'>if(confirm('Key in email and password!')) 
                { window.open('login.php','_self');} else {window.open('login.php','_self');}</script>";        
        }
        else{

                $q='select * from user where Email = "'.$email.'" AND Password = "'.$pwd.'"';
                $res=mysqli_query($link,$q) or die(mysqli_error($link));
                $num=mysqli_num_rows($res);
                if($num>0)
                {
                $_SESSION['success']=TRUE;
                $_SESSION['user']=$email;
                $_SESSION['email']=$email;
                $_SESSION['loginas']="student";
                header('location:homeuser.php');
                }
                else
                {
                $_SESSION['fail']="Yes";
                header('location:login.php');
                }

        }


?>