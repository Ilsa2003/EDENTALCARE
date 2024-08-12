<?php
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['aemail']))
{
  header('Location:dashboard.php');
}
$degid=$_GET['deid'];
$sql="SELECT * FROM deg WHERE deg_id= '$degid'";
$result= $conn->query($sql);
$s = $result->fetch_assoc();

if(isset($_POST['edit_deg']))
{
  $dname=$_POST['dname'];
  $dstatus=$_POST['deg_status'];
  $degid=$_POST['deid'];
  $sql="UPDATE deg SET `deg_name`='$dname',`deg_status`='$dstatus' WHERE `deg_id`='$degid'";
  if($conn->query($sql))
  {
    header('Location:deg_list.php?msg=Degree sucessfully Updated');
  }
  else
  {
    header('Location:deg_list.php?msg=Error Updating Degree');
  }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Degree Edit</title>
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
		<div class="tab-content">
               <div class="tab-pane active" id="horizontal-form">
                  <form action="" method="POST" class="form-horizontal">
                      <div class="form-group">
                        <div class="col-sm-8">
                           <input type="hidden" class="form-control1" id="focusedinput" name="deid" value="<?php echo $s['deg_id'];?>">
                     <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Degree Name</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control1" id="focusedinput" name="dname" value="<?php echo $s['deg_name'];?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="selector2" class="col-sm-2 control-label">Select Status</label>
                        <div class="col-sm-8">
                            <select name="deg_status" id="deg_status" class="form-control1" >
                                <option value="select">Select Status</option>
                                <option value="1" <?php if($s['deg_status']=="1") echo 'selected="selected"'; ?> >Show</option>
                                <option value="0"  <?php if($s['deg_status']=="0") echo 'selected="selected"'; ?>>Hide</option>
                            </select>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                   <!-- <button class="btn-success btn">Submit</button> -->
                   <input type="submit" name="edit_deg" value="Edit" class="btn-success btn">
                </div>
             </div>
          </form>
       </div>
    </div>
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
