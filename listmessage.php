<?php
include ('connection.php');
session_start();
$server='localhost';
$username='root';
$password='';
$database='etutor';
$link=mysqli_connect($server,$username,$password,$database);
$q='select * from messages where fromid = "'.$_SESSION['userid'].'"';
$res=mysqli_query($link,$q) or die(mysqli_error());
if(
   isset($_POST['delete']))
{ 
  $messageid=$_POST['delete'];

  // sql to delete a record
  $sql = 'DELETE from messages where messageid = "'.$messageid.'"';

  if (mysqli_query($link, $sql)) {
    echo "<script type='text/javascript'>if(confirm('Message Deleted!')) 
    { window.open('listmessage.php','_self');} else {window.open('listmessage.php','_self');}</script>";
    
  } else {
      echo "Error canceling booking: " . $link->error;
  }
  

 }


?>
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
<!-- Custom styles for this template-->
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
            <h1 class="h3 mb-0 text-gray-800">Message</h1>
          </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List of Send Messages</h1>
          </div>
        
          <!-- Content Row -->

          <div class="row">

            <div class="col-xl-8 col-lg-7">
              <div style="width: max-content;">
                
                <!-- Card Body -->
                <div >
                <table class="table table-hover"  border="1" style="background-color: #f2f2f2;     font-size: 12px;" >
                    <tr style="background-color: #c7c7c7;">
                    <th>Message ID</th><th>Send To</th><th>Title</th><th>Message</th><th>Date</th><th>Reply</th><th>Delete Message</th></tr>
                    
                    <?php while($row = mysqli_fetch_array($res)):;?>

                    <tr>
                      <td><?php echo $row[0];?></td>
                      <td><?php echo $row[3];?></td>
                      <td><?php echo $row[4];?></td>
                      <td>
                          <div  style="width: 200px;height: 70px;word-break: break-all;overflow-x: auto;">
                            <?php echo $row[5];?>
                          </div>
                      </td>
                      <td><?php echo $row[6];?></td>
                    
                      <td><a href='viewreply.php?messageid=<?php echo $row[0];?>' >View Reply</a></td>
                      <form method="POST">
                      <td><button type="submit" name="delete" value="<?php echo $row[0];?>"><font color="red">Delete</font></button></td>
                      </form>
                    </tr>
                    
                    <?php endwhile;?>

                </table>
                </div>
              </div>
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
