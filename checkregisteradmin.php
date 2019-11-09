<?php
$server='localhost';
$username='root';
$password='';
$database='etutor';
$link=mysqli_connect($server,$username,$password,$database);
include ('connection.php');
session_start();

if(isset($_POST['name'])&&
   isset($_POST['email'])&&
   isset($_POST['password'])&&
   isset($_POST['password2'])&&
   isset($_POST['mobile']))
{ 
  $name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $password2=$_POST['password2'];
  $mobile=$_POST['mobile'];
 
    if($password!=$password2)
    { 
      echo'Passwords do not match.';
    }
    else
    { 
        $query ='select Email from admin where Email = "'.$email.'"';
        $query_run=mysqli_query($link,$query) or die(mysqli_error());
        if(mysqli_num_rows($query_run)==1)
        { 
          echo 'Email address already registered.';
        } 
        else
        { 
          
          // Escape user inputs for security
          $name2 = mysqli_real_escape_string($link, $name);
          $email2 = mysqli_real_escape_string($link, $email);
          $password3 = mysqli_real_escape_string($link, $password);
          $mobile2 = mysqli_real_escape_string($link, $mobile);

          // Attempt insert query execution
          $sql = "INSERT INTO admin (Username, Email, Password, Mobile ) VALUES ('$name2', '$email2', '$password3', '$mobile2')";
          if(mysqli_query($link, $sql)){

              $_SESSION['user']=$email;
              header('location:login.php');
          } else{
              echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
          }
          
          // Close connection
          mysqli_close($link);

    
        }
    }
 
}
?>