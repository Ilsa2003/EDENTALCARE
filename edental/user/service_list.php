<?php
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['ueml']))
{
header('Location:index.php');
}
$sql="SELECT * FROM service";
$result =$conn->query($sql);
$result->num_rows;
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Service List</title>
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
     <h3>Service List</h3>
     <?php  
          if(isset($_GET['msg']))
          {
            echo "<h5 style='color:green;'>".$_GET['msg']."</h5>";
          }
          ?>
    <table border="2" class="table">
         <tr>
            <td><b>ID</b></td>
            <td><b>Degree Name</b></td>
            <td><b>Price</b></td>
            <td><b>Action</b></td>
         </tr>
         <?php 
         $a=1;
         while($row=$result->fetch_assoc())
         {
            ?>
            <tr>
               <td><?php echo $a; ?></td>
               <td><?php echo $row['service_offer']; ?></td>
               <td><?php echo $row['price']; ?></td>

               <td><a href="ser_delete.php?sdid=<?php echo $row['service_id'];?>"> DELETE </a>||
                  <a href="serv_edit.php?seid=<?php echo $row['service_id'];?>"> EDIT </a></td>
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
         }
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
