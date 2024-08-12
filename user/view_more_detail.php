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

if(!isset($_GET['apid']))
{
header('Location:appt_list.php');
}
$a_id=$_GET['apid'];
// preciption detail
$pre_sql="select * from prescription where a_id='$a_id'";
$pre_result=$conn->query($pre_sql);

// Invoice
$in_sql="select * from invoice where a_id='$a_id'";
$in_result=$conn->query($in_sql);

?>
<!DOCTYPE HTML>
<html>
<head>
<title>E-dental | Appointment List</title>
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
		 <h3>Precipitation Detail</h3>
        <table border="2" class="table">
         <tr>
            <td><b>No</b></td>
            <td><b>Symptoms</b></td>
            <td><b>Diagnosis</b></td>
            <td><b>Medicine</b></td>
            <td><b>Medicine Note</b></td>
            <td><b>Test</b></td>
            <td><b>Test Note</b></td>
              </tr>
         <?php
             $a=1;
         while($row=$pre_result->fetch_assoc())
         {
            ?>
            <tr>
               <td><?php echo $a;?></td>
               <td><?php echo $row['symptoms'];?></td>
               <td><?php echo $row['diagnosis'];?></td> 
               <td><?php echo $row['medicine'];?></td> 
               <td><?php echo $row['m_note'];?></td> 
               
                <td><?php echo $row['test'];?></td>
               <td> <?php echo $row['t_note'];?></td>
            </tr>
               <?php 
               $a++;
            }?>
         </table>
        </div>	

        <div class="md">
         <h3>Invoice Detail</h3>
        <table border="2" class="table">
         <tr>
            <td><b>No</b></td>
            <td><b>Invoice title</b></td>
            <td><b>Invoice amount</b></td>
            <td><b>Invoice date</b></td>
            <td><b>Payment mode</b></td>
              </tr>
         <?php
             $a=1;
         while($row=$in_result->fetch_assoc())
         {
            ?>
            <tr>
               <td><?php echo $a;?></td>
               <td><?php echo $row['invoice_title'];?></td>
               <td><?php echo $row['invoice_amount'];?></td> 
               <td><?php echo $row['invoice_date'];?></td> 
               <td><?php echo $row['payment_mode'];?></td> 
               
              
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
