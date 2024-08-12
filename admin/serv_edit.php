<?php
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['aemail']))
{
  header('Location:dashboard.php');
}

$p=$_GET['seid'];
$sql="SELECT *from service WHERE service_id = '$p'";
$result = $conn->query($sql);
$q = $result ->fetch_assoc();
if(isset($_POST['edit_ser']))
{
   $a=$_POST['sname'];
   $b=$_POST['sprc'];
   $q=$_POST['seid'];
   $sql="UPDATE service SET `service_offer`='$a',`price`='$b' WHERE `service_id`='$q'";
     if($conn ->query($sql) === TRUE)
   {
      echo "Your Data is Updated Sucessfully";
      header('Location:service_list.php?msg= Service Updated Sucessfully.. ');
   }
   else
   {
      echo "Data Not Updated Successfully";
      header('Location:service_list.php?msg= Error Updating Service..');
   }
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Add Service</title>
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
          <h3>Add Service</h3>
          <?php  
          if(isset($_GET['msg']))
          {
            echo "<h5 style='color:red;'>".$_GET['msg']."</h5>";
          }
          ?>
          <div class="tab-content">
            <div class="tab-pane active" id="horizontal-form">
              <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Service Name</label>
                     <div class="col-sm-8">
                        <input type="hidden" class="form-control1" id="focusedinput" name="seid" value="<?php echo $q['service_id'];?>">
                        <input type="text" class="form-control1" id="focusedinput" name="sname" placeholder="Name Of Service" value="<?php echo $q['service_offer'];?>">
                     </div>
                  </div>  
                   <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Price</label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control1" id="focusedinput" name="sprc" placeholder="Price of service"  value="<?php echo $q['price'];?>">
                     </div>
                  </div>                    
                  <div class="form-group">
                     <div class="col-sm-8 col-sm-offset-2">
                        <!-- <button class="btn-success btn">Submit</button> -->
                        <input type="submit" name="edit_ser" value="Edit Service" class="btn-success btn">
                     </div>
                  </div>
               </form>
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
