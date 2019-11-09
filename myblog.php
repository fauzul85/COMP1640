<?php
include ('connection.php');
session_start();
$server='localhost';
$username='root';
$password='';
$database='etutor';
$link=mysqli_connect($server,$username,$password,$database);
if($_SESSION['loginas']=="tutor"){
  $q='select * from tutorblog where tutorid = "'.$_SESSION['userid'].'"';
}
if($_SESSION['loginas']=="student"){
  $q='select * from studentblog where studentid = "'.$_SESSION['userid'].'"';
}

$res=mysqli_query($link,$q) or die(mysqli_error());


$userid = $_SESSION['userid'];

if(isset($_POST['submit']))
{
  $title =  $_POST['title'];
  $description =  $_POST['description'];

  $posteddate = date('Y-m-d');
  $modifieddate = date('Y-m-d');
  if($_SESSION['loginas']=="tutor"){
    $sqladd = "INSERT INTO tutorblog (tutorid, title,description, posteddate,modifieddate ) VALUES ($userid, '$title','$description', '$posteddate','$modifieddate')";
  }
  if($_SESSION['loginas']=="student"){
    $sqladd = "INSERT INTO studentblog (studentid, title,description, posteddate,modifieddate ) VALUES ($userid, '$title','$description', '$posteddate','$modifieddate')";
  }
          if(mysqli_query($link, $sqladd)){
       
            echo "<script type='text/javascript'>if(confirm('New blog posted!')) 
            { window.open('myblog.php','_self');} else {window.open('myblog.php','_self');}</script>";

          } else{
              echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
          }
 

}
?>


<script>
function delet(blogid) {

window.location.href='deleteblog.php?blogid='+blogid;

}
function edit(blogid) {

        window.location.href='editblog.php?blogid='+blogid;
  
}
function comment(blogid) {

window.location.href='blogcomment.php?blogid='+blogid;

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

  <!-- Page Wrapper -->
  <div id="wrapper">

 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="homeuser.php">
  <div class="sidebar-brand-text mx-3" style="font-size: 15px;">E-Tutor Student Portal</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
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
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Blog</h1>
          </div>
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My Blog</h1>
          </div>

          

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800">Create blog post:</h5>
          </div>

        
          <!-- Content Row -->

          <div class="row">
            

            <div class="col-xl-8 col-lg-7">
              
              <div class="card shadow mb-4">
                
                <!-- Card Body -->
                <div class="card-body">
                <form action="" method="POST">
                  <div class="form-group">
                    <label for="tutor">Blog Title:</label> 
                    <input id="title" name="title" type="text" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="description">Blog Description:</label> 
                    <textarea id="description" name="description" cols="40" rows="3" class="form-control" required></textarea>
                  </div>
                  

                  <div class="form-group">
                    <button name="submit" name="post" type="submit" class="btn btn-primary">POST</button>
                  </div>
                </form>
                  
                </div>
              </div>

              <?php while($row = mysqli_fetch_array($res)):;?>

              <div class="card shadow mb-4" style="width: 650px;">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Blog Title: <?php echo $row[2];?></h6>
                </div>
                <div class="card-body">
                  <p><?php echo $row[3];?></p>
                  <p class="mb-0"><b>Posted Date:</b> <?php echo $row[4];?></p>
                  <p class="mb-0"><b>Modified Date:</b> <?php echo $row[5];?></p>
                  <div style="margin-top: 10px;">
                    <button id="submit" name="edit"  onclick="edit('<?php echo $row[0];?>')"  class="btn btn-primary">EDIT</button>
                  <button id="submit" name="comment" onclick="comment('<?php echo $row[0];?>')" class="btn btn-primary">COMMENT</button>
                  
                  <button id="submit" name="delete" onclick="delet('<?php echo $row[0];?>')"  class="btn btn-primary" >DELETE</button>
                  
                  </div>
                </div>
                
              </div>

              <?php endwhile;?>


            </div>


          </div>

        </div>

      </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; E-Tutor Portal 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>



</body>

</html>
