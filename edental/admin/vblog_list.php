<?php
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['aemail']))
{
  header('Location:dashboard.php');
}
$sql="SELECT * FROM blog where blog_type='2'";
$result =$conn->query($sql);
$result->num_rows;
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Video Blog List</title>
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
		 <h3>Blog List</h3>
     <?php  
          if(isset($_GET['msg']))
          {
            echo "<h5 style='color:green;'>".$_GET['msg']."</h5>";
          }
          ?>
		<table border="2" class="table">
         <tr>
            <td><b>ID</b></td>
            <td><b>Blog Title</b></td>
            <td><b>Blog Video</b></td>
            <td><b>Desc</b></td>
            <td><b>Status</b></td>
            <td><b>Action</b></td>
         </tr>
         <?php
             $a=1;
         while($row=$result->fetch_assoc())
         {
            ?>
            <tr>
               <td><?php echo $a;?></td>
               <td><?php echo $row['blog_title'];?></td>
               <td><video width="320" height="240" controls>
  <source src="../<?php echo $row['blog_pic'];?>" type="video/mp4"></video></td>
               <td><?php echo $row['blog_desc'];?></td> 
                <td><?php if($row['blog_status']==1) 
               {
                  echo "<a href='common.php?blhdid=$row[blog_id]'>Hide</a>";

                 }
                 else 
                 {
                  echo "<a href='common.php?blsdid=$row[blog_id]'>Show</a>";
                 } 
               ?></td>
               <td><a href="common.php?bldid=<?php echo $row['blog_id'];?>"> DELETE </a>||
                  <a href="blog_edit.php?bleid=<?php echo $row['blog_id'];?>"> EDIT </a>
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
