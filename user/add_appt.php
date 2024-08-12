<?php
include '../extra/conn.php';
date_default_timezone_set('Asia/Kolkata');
$now=date("Y-m-d");
session_start();
if(!isset($_SESSION['ueml']))
{
header('Location:index.php');
}
if (!isset($_GET['bdid'])) {
  header('Location:doc_list.php');
}

$d_id=$_GET['bdid'];
$uid=$_SESSION['uid'];

$sql="select * from patient where p_l_id='$uid'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$p_id=$row['p_id'];
if(isset($_POST['add_appt']))
{
  $a=$_POST['adate'];
  $b=$_POST['atime'];
  $uid=$_POST['p_id'];
  $did=$_POST['d_id'];
  $sql="INSERT INTO appointment(b_date,b_time,b_c_date,patient_id,d_id) VALUES ('$a','$b','$now','$uid','$did')";
  if ($conn->query($sql) === TRUE) 
  {
    header('Location:appt_list.php?msg=Appointment booked Successfully..');
  }
  else
  {
    header('Location:appt_list.php?msg=Error booking appointment..');
  }
}
?>
<!DOCTYPE HTML>
<html>
<head>
   <title>E-dental | Add Appointment</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="keywords" content="" />
   <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
 <link href="../aassets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
 <!-- Custom CSS -->
 <link href="../aassets/css/style.css" rel='stylesheet' type='text/css' />
 <link href="../aassets/css/font-awesome.css" rel="stylesheet"> 
 <!-- jQuery -->
 <script src="../aassets/js/jquery.min.js"></script>
 <!----webfonts--->
 <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
 <!---//webfonts--->  
</head>
<body>
   <div id="wrapper">
     <!-- Navigation -->
     <?php include './extra/sidebar.php';?>
     <div id="page-wrapper">
      <div class="graphs">
         <div class="md">
            <h3>Appointment</h3>
            <?php  
          if(isset($_GET['msg']))
          {
            echo "<h5 style='color:red;'>".$_GET['msg']."</h5>";
          }
          ?>
            <div class="tab-content">
               <div class="tab-pane active" id="horizontal-form">
               <form action="" method="POST" class="form-horizontal">
                 <input type="hidden" class="form-control1" id="focusedinput" name="p_id" value="<?php echo $p_id;?>">
                  <input type="hidden" class="form-control1" id="focusedinput" name="d_id" value="<?php echo $d_id;?>">
                  <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Date:</label>
                     <div class="col-sm-8">
                        <input type="date" class="form-control1" id="focusedinput" name="adate" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Time:</label>
                     <div class="col-sm-8">
                        <input type="time" class="form-control1" id="focusedinput" name="atime" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-sm-8 col-sm-offset-2">
                        <!-- <button class="btn-success btn">Submit</button> -->
                        <input type="submit" name="add_appt" value="Book Appointment" class="btn-success btn">
                     </div>
                  </div>
               </div> 
               <?php include 'extra/footer.php';?>           
            </div>
         </div>
         <!-- /#page-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- Nav CSS -->
      <link href="../aassets/css/custom.css" rel="stylesheet">
      <!-- Metis Menu Plugin JavaScript -->
      <script src="../aassets/js/metisMenu.min.js"></script>
      <script src="../aassets/js/custom.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="../aassets/js/bootstrap.min.js"></script>
   </body>
</html>
