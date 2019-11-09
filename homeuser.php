<?php
include ('connection.php');
session_start();
$server='localhost';
$username='root';
$password='';
$database='etutor';
$link=mysqli_connect($server,$username,$password,$database);
$q='select * from user where Email = "'.$_SESSION['email'].'"';
$res=mysqli_query($link,$q) or die(mysqli_error());
$row=mysqli_fetch_array($res);

$_SESSION['userid']=$row['userid'];
$userid = $_SESSION['userid'];


if(isset($_SESSION['success'])){
	echo "<script type='text/javascript'>alert('Welcome to E-Tutor Portal!');</script>";
	unset($_SESSION['success']);
}

//for message
$q1='select *, COUNT(*) as totalmessage from messages where fromid = "'.$userid.'"';
$res1=mysqli_query($link,$q1) or die(mysqli_error());
$row1=mysqli_fetch_array($res1);
$totalmessage = $row1['totalmessage'];
$q1='select * from messages where fromid = "'.$userid.'" AND messagedate > DATE_SUB(NOW(), INTERVAL 7 DAY)';
$res1=mysqli_query($link,$q1) or die(mysqli_error());

//for meeting
$q2='select *, COUNT(*) as totalmeeting from meeting where fromid = "'.$userid.'"';
$res2=mysqli_query($link,$q2) or die(mysqli_error());
$row2=mysqli_fetch_array($res2);
$totalmeeting = $row2['totalmeeting'];
$res2=mysqli_query($link,$q2) or die(mysqli_error());

//for uploads
$q3='select *, COUNT(*) as totaluploads from upload where studentid = "'.$userid.'"';
$res3=mysqli_query($link,$q3) or die(mysqli_error());
$row3=mysqli_fetch_array($res3);
$totaluploads = $row3['totaluploads'];
$q3='select * from upload where studentid = "'.$userid.'" AND uploaddate > DATE_SUB(NOW(), INTERVAL 7 DAY)';
$res3=mysqli_query($link,$q3) or die(mysqli_error());

//for blogs
$q4='select *, COUNT(*) as totalblogs from studentblog where studentid = "'.$userid.'"';
$res4=mysqli_query($link,$q4) or die(mysqli_error());
$row4=mysqli_fetch_array($res4);
$totalblogs = $row4['totalblogs'];
$res4=mysqli_query($link,$q4) or die(mysqli_error());



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
            <h1 class="h3 mb-0 text-gray-800">My Dashboard</h1>
          </div>
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Welcome <?php echo strtoupper($row['Username']) ?> </h1>
          </div>


          <div class="row">


            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Messages</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalmessage;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="far fa-envelope fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Meeting</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalmeeting;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="far fa-eye fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Uploads</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $totaluploads;?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file-upload fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Blogs</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalblogs;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-blog fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">

            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4" style="width: fit-content;">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Recent Messages (last 7 Days)</h6>

                </div>

                <div class="card-body">
                <div >
                <table class="table table-hover"  border="1" style="background-color: #f2f2f2;     font-size: 12px; width: 800px;" >
                    <tr style="background-color: #4e73df;color: white;">
                    <th>Message ID</th><th>Send To</th><th>Title</th><th>Message</th><th>Date</th></tr>

                    <?php while($row1 = mysqli_fetch_array($res1)):;?>

                    <tr>
                      <td><?php echo $row1[0];?></td>
                      <td><?php echo $row1[3];?></td>
                      <td><?php echo $row1[4];?></td>
                      <td>
                          <div  style="width: 250px;height: 50px;word-break: break-all;overflow-x: auto;">
                            <?php echo $row1[5];?>
                          </div>
                      </td>
                      <td><?php echo $row1[6];?></td>

                    </tr>
                    <?php endwhile;?>
                </table>
                </div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">

            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4" style="width: fit-content;">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Upcoming Meeting With Tutor</h6>

                </div>

                <div class="card-body">
                <div >
                <table class="table table-hover"  border="1" style="background-color: #f2f2f2;     font-size: 12px; width: 800px;" >
                <tr style="background-color: #36b9cc;color: white;">
                    <th>Meeting ID</th><th>Meeting With</th><th>Title</th><th>Description</th><th>Time</th><th>Type</th><th>Date</th></tr>

                    <?php while($row2 = mysqli_fetch_array($res2)):;?>

                    <tr>
                      <td><?php echo $row2[0];?></td>
                      <td><?php echo $row2[3];?></td>
                      <td><?php echo $row2[4];?></td>
                      <td>
                          <div  style="width: 150px;height: 30px;word-break: break-all;overflow-x: auto;">
                            <?php echo $row2[5];?>
                          </div>
                      </td>
                      <td><?php echo $row2[6];?></td>
                      <td><?php echo $row2[7];?></td>
                      <td><?php echo $row2[8];?></td>
                    </tr>

                    <?php endwhile;?>

                </table>
                </div>
                </div>
              </div>
            </div>
          </div>



             <div class="row">

              <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4" style="width: fit-content;">

                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Uploads (last 7 Days)</h6>

                  </div>

                  <div class="card-body">
                  <div >
                  <table class="table table-hover"  border="1" style="background-color: #f2f2f2;     font-size: 12px; width: 800px;" >
                  <tr style="background-color: #f7c649;color: white;">
                      <th>Upload ID</th><th>Title</th><th>Description</th><th>Filename</th><th>Upload Date</th></tr>

                      <?php while($row3 = mysqli_fetch_array($res3)):;?>

                      <tr>
                        <td><?php echo $row3[0];?></td>
                        <td><?php echo $row3[2];?></td>
                        <td><?php echo $row3[3];?></td>
                        <td>
                              <?php echo $row3[4];?>
                        </td>
                        <td><?php echo $row3[7];?></td>
                      </tr>

                      <?php endwhile;?>

                  </table>
                  </div>
                  </div>
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
