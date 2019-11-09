<?php
include ('connection.php');
session_start();
$server='localhost';
$username='root';
$password='';
$database='etutor';
$link=mysqli_connect($server,$username,$password,$database);
$q='select * from blogcomment where blogid = "'.$_GET['blogid'].'"';

$blogid = $_GET['blogid'];
$userid = $_SESSION['userid'];

$commentCheck="";

$res=mysqli_query($link,$q);

if(mysqli_fetch_array($res)){
  
}
else{
  $commentCheck = "No Comments!";
}
$res=mysqli_query($link,$q);


if(isset($_POST['submit']))
{

  $comment =  $_POST['comment'];
  $commentdate = date('Y-m-d');
  

          $sqladd = "INSERT INTO blogcomment (blogid, userid,comment, date ) VALUES ($blogid, $userid,'$comment', '$commentdate')";
          if(mysqli_query($link, $sqladd)){
       
            echo "<script type='text/javascript'>if(confirm('Comment send!')) 
            { window.open('myblog.php','_self');} else {window.open('myblog.php','_self');}</script>";

          } else{
              echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
          }
}

?>

<script>
function download(location) {
        window.open(location, '_blank');
  
}
function comment(location) {

window.open(location, '_blank');

}
</script>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-TUTOR PORTAL</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <div id="wrapper">

 
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


<a class="sidebar-brand d-flex align-items-center justify-content-center" href="homeuser.php">
  <div class="sidebar-brand-text mx-3" style="font-size: 15px;">E-Tutor Student Portal</div>
</a>


<hr class="sidebar-divider my-0">


<li class="nav-item active">
  <a class="nav-link" href="homeuser.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<hr class="sidebar-divider">

<li class="nav-item">
  <a class="nav-link" href="mytutor.php">
  <i class="fas fa-chalkboard-teacher"></i>
    <span>My Tutor</span></a>
</li>


<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMessage" aria-expanded="true" aria-controls="collapseMessage">
  <i class="far fa-envelope"></i>
    <span>Message</span>
  </a>
  <div id="collapseMessage" class="collapse" aria-labelledby="collapseMessage2" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="newmessage.php">New Message</a>
      <a class="collapse-item" href="listmessage.php">View Message List</a>
      <a class="collapse-item" href="receivemessage.php">View Receive Message</a>
    </div>
  </div>
</li>



<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#meeting" aria-expanded="true" aria-controls="meeting">
  <i class="far fa-eye"></i>
    <span>Meeting</span>
  </a>
  <div id="meeting" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="addmeeting.php">New Meeting</a>
      <a class="collapse-item" href="listmeeting.php">My Meeting</a>

    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
  <i class="fas fa-file-import"></i>
    <span>Document</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="myupload.php">My Upload</a>
      <a class="collapse-item" href="tutorupload.php">Tutor Upload</a>
      <a class="collapse-item" href="uploaddocument.php">Upload Document</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
  <i class="fas fa-blog"></i>
    <span>Blog</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="myblog.php">My Blog</a>
      <a class="collapse-item" href="studentblog.php">Student Blog</a>
      <a class="collapse-item" href="tutorblog.php">Tutor Blog</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link" href="logout.php">
  <i class="fas fa-sign-out-alt"></i>
    <span>Log Out</span></a>
</li>


</ul>


    
    <div id="content-wrapper" class="d-flex flex-column">

      
      <div id="content">

        
        <div class="container-fluid">

          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Blog</h1>
          </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Comment on Blog Post</h1>
          </div>

        
          

          <div class="row">

            <div class="col-xl-8 col-lg-7">
              <div style="width: max-content;">

                
             
              <?php while($row = mysqli_fetch_array($res)):;?>

              <div class="card shadow mb-4" style="width: 600px;">
                <div class="card-body">
                  <p><b>Comment By(ID) :</b> <?php echo $row[2];?></p>
                  <p><b>Comment Date   :</b> <?php echo $row[4];?></p>
                  <p><b>Comment        :</b> <?php echo $row[3];?></p>
                </div>
                
              </div>

              <?php endwhile;?>

              <form action="" method="POST">
                 
                  <div class="form-group">
                    <label for="comment">Leave your comment here...</label> 
                    <textarea id="comment" name="comment" cols="50" rows="5" class="form-control" required></textarea>
                  </div>

              
                  <div class="form-group">
                    <button name="submit" name="send" type="submit" value="<?php echo $blogid;?>" class="btn btn-primary">Send</button>
                  </div>
                </form>
              

              </div>
            </div>


          </div>

        </div>

      </div>

       
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; E-Tutor Portal 2019</span>
          </div>
        </div>
      </footer>
      

    </div>
    

  </div>
  

  
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
