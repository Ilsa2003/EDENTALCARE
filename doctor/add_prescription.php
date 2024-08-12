<?php
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['demail']))
{
  header('Location:dashboard.php');
}

if(!isset($_GET['a_id']) && !isset($_GET['p_id']))
{
    header('Location:view_detail_user.php');
}

 $a_id=$_GET['a_id'];
 $p_id=$_GET['p_id'];

$did=$_SESSION['did'];


if(isset($_POST['add_Prescription']))    
{
     $p_id=$_POST['p_id'];
     $a_id=$_POST['a_id'];
    $did=$_SESSION['did'];
    $symptoms=$_POST['symptoms'];


    $diagnosis=$_POST['diagnosis'];
    $medicine=$_POST['medicine'];
    $m_note=$_POST['m_note'];
    $test=$_POST['test'];
    $t_note=$_POST['t_note'];
    date_default_timezone_set('Asia/Kolkata');
    $now=date("Y-m-d");

    $sql="INSERT INTO prescription(patient_id,d_id,a_id,symptoms, diagnosis,medicine,m_note,test,t_note,p_date) VALUES ('$p_id','$did','$a_id','$symptoms','$diagnosis','$medicine','$m_note','$test','$t_note','$now')";
    if ($conn->query($sql) === TRUE) 
    {
     header("Location:view_detail_user.php?apid=$a_id & msg=Precipitation Add Successfully..");

    }
    else
    {
        header('Location:view_detail_user.php?msg=Error Adding Precipitation..');
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>E-dental | Add Prescription</title>

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
		 <h3>Add Prescription</h3>
		  <div class="tab-content">
            <div class="tab-pane active" id="horizontal-form">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Symptoms:</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="a_id" value="<?php echo $_GET['a_id'] ;?>">
                            <input type="hidden" name="p_id" value="<?php echo $_GET['p_id'] ;?>">
                    <textarea class="form-control1" placeholder="Write Symptoms" name="symptoms" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Diagnosis:</label>
                        <div class="col-sm-8">
                        <textarea class="form-control1" placeholder="Write Diagnosis" name="diagnosis" required></textarea>
                        </div>
                    </div>
                     
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Medicine:</label>
                        <div class="col-sm-8">
                        <textarea class="form-control1" placeholder="Write Medicine" name="medicine" required></textarea>
                        </div>
                    </div>

                      <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Medicine note:</label>
                        <div class="col-sm-8">
                        <textarea class="form-control1" placeholder="Write Medicine Note" name="m_note" required></textarea>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Test:</label>
                        <div class="col-sm-8">
                        <textarea class="form-control1" placeholder="Write Test" name="test" required></textarea>
                        </div>
                    </div>

                      <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Test note:</label>
                        <div class="col-sm-8">
                        <textarea class="form-control1" placeholder="Write Test Note" name="t_note" required></textarea>
                        </div>
                    </div>                     

                   
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                    <input type="submit" name="add_Prescription" value="Add Prescription" class="btn-success btn">
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
