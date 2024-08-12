<?php 
include '../extra/conn.php';
$sql = "SELECT * FROM dentist_tips";
session_start();
if(!isset($_SESSION['aemail']))
{
  header('Location:dashboard.php');
}
$result = $conn->query($sql);
$result->num_rows;
?>
<!DOCTYPE HTML>
<html>
<head>
<title>E-dental | Dental Tips List</title>
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
       <h3>Tips List</h3>
       <?php  
          if(isset($_GET['msg']))
          {
            echo "<h5 style='color:green;'>".$_GET['msg']."</h5>";
          }
          ?>
       <table border="2" class="table">
         <tr>
            <td><b>ID</b></td>
            <td><b>Tip Title</b></td>
            <td><b>Tip Pic</b></td>
            <td><b>Tip Description</b></td>
            <td><b>Status</b></td>
            <td><b>Action</b></td>
         </tr>
         <?php
         $i=1;
         while($row=$result->fetch_assoc())
            {
            ?>
            <tr>
               <td><?php echo $i;?></td>
               <td><?php echo $row['t_name']; ?></td>
               <td><img src="../<?php echo $row['t_pic']; ?>" width="50%"></td>
               <td><?php echo $row['t_desc']; ?></td>
               <td><?php  if($row['t_status']==1) 
               {
                  echo "<a href='common.php?hdtid=$row[d_t_id]'>Hide</a>";

                 }
                 else 
                 {
                  echo "<a href='common.php?sdtid=$row[d_t_id]'>Show</a>";
                 } 
               ?></td>
               <td><a href="common.php?tid=<?php echo $row['d_t_id'];?>"> DELETE </a>||
                  <a href="dtips_edit.php?teid=<?php echo $row['d_t_id'];?>"> EDIT </a>
            </tr>
               <?php 
               $i++;
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
