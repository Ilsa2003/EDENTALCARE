<?php 
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['aemail']))
{
  header('Location:dashboard.php');
}
date_default_timezone_set('Asia/Kolkata');
$now=date("Y-m-d");
if(isset($_POST['add_deg']))    
{
    $a=$_POST['dname'];
    $b=$_POST['selector2'];
    $sql="INSERT INTO deg(deg_name,deg_status,deg_date) VALUES ('$a','$b','$now')";
    if ($conn->query($sql) === TRUE) 
    {
        header('Location:deg_list.php?msg=Degree Added Successfully..');
    }
    else
    {
        header('Location:add_deg.php?msg=Error Adding Degree..');
    }
}
?>  
<!DOCTYPE HTML>
<html>
<head>
<title>Add Doctor</title>
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
         <h3>Add Degree</h3>
         <?php  
            if(isset($_GET['msg']))
            {
              echo "<h5 style='color:red;'>".$_GET['msg']."</h5>";
            }
            ?>
        <div class="tab-content">
            <div class="tab-pane active" id="horizontal-form">
                <form action="" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Degree Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" id="focusedinput" name="dname" placeholder="Name Of Degree" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="selector2" class="col-sm-2 control-label">Select Status</label>
                        <div class="col-sm-8">
                            <select name="selector2" id="selector1" class="form-control1" required="">
                                <option value="select">Select</option>
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <input type="submit" name="add_deg" value="Add Degree" class="btn-success btn" required="">
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
