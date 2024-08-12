<?php
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['ueml']))
{
header('Location:index.php');
}
$uid=$_SESSION['uid'];
$sql="select * from patient where p_l_id='$uid'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$p_id=$row['p_id'];

$sql="SELECT * FROM online_consultation,doctor_info where doctor_info.d_id=online_consultation.d_id and patient_id='$p_id'";
$result =$conn->query($sql);
$result->num_rows;
?>
<!DOCTYPE HTML>
<html>
<head>
<title>E-dental | Consultation List</title>
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
		 <h3>Consultation List</h3>
       <?php  
          if(isset($_GET['msg']))
          {
            echo "<h5 style='color:green;'>".$_GET['msg']."</h5>";
          }
          ?>
		<table border="2" class="table">
         <tr>
            <td><b>No</b></td>
            <td><b>Doctor Name</b></td>
            <td><b>Doctor Address</b></td>
            <td><b>Doctor Contact</b></td>
            <td><b>Consultation Date & Time</b></td>
            <td><b>Consultation Status</b></td>
            
         </tr>
         <?php
             $a=1;
         while($row=$result->fetch_assoc())
         {
            ?>
            <tr>
               <td><?php echo $a;?></td>
               <td><?php echo $row['d_name'];?></td>
               <td><?php echo $row['d_address'];?></td> 
               <td><?php echo $row['d_contact'];?></td> 
               <td><?php echo $row['o_c_date']." ".$row['o_c_time'];?></td> 
               
                <td><?php if($row['o_c_status']==0) 
                   {
                  echo "<p style='color:#7c7c1e;'><b>Pending</b></p>";

                  }
                  else if ($row['o_c_status']==1) {
                    echo "<p style='color:green;'><b>Approve</b></p>";
                  }
                   else if ($row['o_c_status']==2) {
                    echo "<p style='color:red;'><b>Cancel By Doctor</b></p>";
                  }
                   else if ($row['o_c_status']==3) {
                    echo "<p style='color:red;'><b>Cancel By User</b></p>";
                  }
                 else 
                 {
                   echo "<p style='color:green;'><b>Complete</b></p>";
                 } 
               ?></td>
               
            </tr>
               <?php 
               $a++;
            }?>
         </table>
        </div>	
        <?php include './extra/footer.php';?>				
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
