<?php
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['ueml']))
{
header('Location:index.php');
}
$sql="SELECT * FROM doctor_info,deg where doctor_info.d_degree=deg.deg_id and d_status='1'";
$result =$conn->query($sql);
$result->num_rows;
?>
<!DOCTYPE HTML>
<html>
<head>
<title>E-dental | Doctor list</title>
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
     <h3>Doctor list</h3>
     <?php  
          if(isset($_GET['msg']))
          {
            echo "<h5 style='color:green;'>".$_GET['msg']."</h5>";
          }
          ?>
          <table border="2" class="table">
            <tr>
              <td><b>ID</b></td>
            <td><b>Doctor name</b></td>
            <td><b>Gender</b></td>
            <td><b>Address</b></td>
            <td><b>Contact</b></td>
            <td><b>Degree</b></td>
            <td><b>Action</b></td>
         </tr>
    <?php
             $a=1;
         while($row=$result->fetch_assoc())
         {
            ?>
            <tr>
               <td><?php echo $a;?></td>
               <td><?php echo $row['d_name'];?></td>
               <td><?php echo $row['d_gender'];?></td>
               <td><?php echo $row['d_address'];?></td> 
               <td><?php echo $row['d_contact'];?></td> 
               <td><?php echo $row['deg_name'];?></td>

               <td><a href="add_appt.php?bdid=<?php echo $row['d_id'];?>"> Book Appoinment </a>
                <!--   <a href="doci_edit.php?dieid=<?php echo $row['d_id'];?>"> EDIT </a> -->
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
