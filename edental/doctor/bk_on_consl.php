<?php
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['demail']))
{
  header('Location:dashboard.php');
}
if(!isset($_GET['bkcid']))
{
    header('Location:appt_list.php');
}

$pa_id=$_GET['bkcid'];

$did=$_SESSION['did'];


if(isset($_POST['on_cons']))    
{
     $p_id=$_POST['p_id'];
    $ctime=$_POST['ctime'];
    $cdate=$_POST['cdate'];
    $clink=$_POST['clink'];
    $cstatus=$_POST['selector2'];
    $sql="INSERT INTO online_consultation(o_c_time,o_c_date,o_c_link,o_c_status,d_id,patient_id) VALUES ('$ctime','$cdate','$clink','$cstatus','$did','$p_id')";
    if ($conn->query($sql) === TRUE) 
    {
        header('Location:bk_on_consl.php?msg=Consultation Booked Successfully..');
    }
    else
    {
        header('Location:bk_on_consl.php?msg=Error Booking Consultation..');
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>E-dental | Online Consultation</title>

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
		 <h3>Online Consultation</h3>
		  <div class="tab-content">
            <div class="tab-pane active" id="horizontal-form">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Consultancy Time:</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="p_id" value="<?php echo $_GET['bkcid'] ;?>">
                            <input type="time" class="form-control1" id="focusedinput" name="ctime" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Consultancy Date:</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control1" id="focusedinput" name="cdate" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Consultancy Link:</label>
                        <div class="col-sm-8">
                            <input type="url" class="form-control1" id="focusedinput" name="clink" required="">
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
                            <input type="submit" name="on_cons" value="Submit" class="btn-success btn" required="">
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
