<?php
include ('connection.php');
session_start();


$server='localhost';
$username='root';
$password='';
$database='etutor';
$link=mysqli_connect($server,$username,$password,$database);
$q='select * from students where studentid = "'.$_SESSION['userid'].'"';
$res=mysqli_query($link,$q) or die(mysqli_error());
$row=mysqli_fetch_array($res);

$tutorname = "";
$tutorid="";
$tutoremail="";
if (empty($row['0'])){
	$tutorname = "No tutor assigned";
}else{
	$q1='select * from tutor where tutorid = "'.$row['tutorid'].'"';
  $res1=mysqli_query($link,$q1) or die(mysqli_error());
  $row1=mysqli_fetch_array($res1);
  $tutorname = $row1['Username'];
  $tutorid = $row1['tutorid'];
  $tutoremail = $row1['Email'];
  $_SESSION['tutorid']=$row1['tutorid'];
} 


$q3='select * from user where userid = "'.$_SESSION['userid'].'"';
$res3=mysqli_query($link,$q3) or die(mysqli_error());
$row3=mysqli_fetch_array($res3);
$studentemail = $row3['Email'];
$studentname = $row3['Username'];

$studentid = $_SESSION['userid'];

if(isset($_POST['submit']))
{
  $title=$_POST['title'];
  $description=$_POST['description'];
  $date=$_POST['date'];
  $time=$_POST['time'];
  $type=$_POST['type'];

  $newdate=date_create($date);
  $newdate= date_format($newdate,"Y-m-d");

  if($time=="0" ){ echo "<script type='text/javascript'>alert('Kindly select meeting time!');</script>";}
  elseif($type=="0" ){ echo "<script type='text/javascript'>alert('Kindly select meeting type!');</script>";}
  else{
    $sqladd = "INSERT INTO meeting (fromid,toid,toname, title, description, time,type,date ) VALUES ('$studentid', '$tutorid','$tutorname', '$title','$description','$time','$type', '$newdate')";
          if(mysqli_query($link, $sqladd)){
            $last_id = mysqli_insert_id($link);

            sendEmail($studentid,$tutorname,$tutoremail,$studentname,$studentemail);
          } else{
              echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
          }
  }

}

function sendEmail($studentid,$tutorname,$tutoremail,$studentname,$studentemail) {

  require 'PHPMailer/PHPMailerAutoload.php';
  $mail = new PHPMailer(true);
  try {
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'fauzulhakim2019@gmail.com';                     // SMTP username
      $mail->Password   = 'etutor_2019';                               // SMTP password
      $mail->Port       = 587;                                    // TCP port to connect to
      //Recipients
      $mail->setFrom('fauzulhakim2019@gmail.com', 'Mailer');
      $mail->addAddress($tutoremail, $tutorname);     // Add a recipient
      // Content
      $mail->isHTML(true);
      $subject =  'New Meeting request by '.$studentname;                               // Set email format to HTML
      $mail->Subject = $subject ;
      $body = 'Hi Tutor '.$tutorname.', I have arrange new meeting with you. Thank you. Regards, '.$studentname;
      $mail->Body    = $body ;
      $mail->send();
      //echo 'Message has been sent';
      echo "<script type='text/javascript'>if(confirm('Meeting arranged with Tutor: $tutorname and email has been send!')) 
            { window.open('listmeeting.php','_self');} else {window.open('listmeeting.php','_self');}</script>";
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
            <h1 class="h3 mb-0 text-gray-800">Meeting</h1>
          </div>
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">New Meeting</h1>
          </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="h5 mb-0 text-gray-800">Arrange Meeting with Tutor: MR/MS <?php echo $tutorname;?></h4>
          </div>
          <div class="row">

            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                
                
                <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="tutor">Meeting Title:</label> 
                    <input id="title" name="title" type="text" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="description">Meeting Description:</label> 
                    <textarea id="description" name="description" cols="40" rows="3" class="form-control" required></textarea>
                  </div>

                  <div class="form-group">
                    <label for="date">Date:</label> 
                    <input class="form-control" type="date" name="date"  required>
                  </div>

                  <div class="form-group">
                    <label for="date">Select Time:</label> 
                    <select class="form-control" name="time">
                      <option value="0">Select Time</option>
                      <option value="8-10AM">8-10AM</option>
                      <option value="10-12PM">10-12PM</option>
                      <option value="12-2PM">12-2PM</option>
                      <option value="2-4PM">2-4PM</option>
                      <option value="4-6PM">4-6PM</option>
                      </select>
                  </div>

                  <div class="form-group">
                    <label for="type">Meeting Type:</label> 
                    <select class="form-control" name="type">
                      <option value="0">Select meeting type</option>
                      <option value="Online">Online</option>
                      <option value="Office">Campus Office</option>
                      </select>
                  </div>

                  <div class="form-group">
                    <button name="submit" name="meeting" type="submit" class="btn btn-primary">Arrange Meeting</button>
                  </div>
                </form>
                  
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

  
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
