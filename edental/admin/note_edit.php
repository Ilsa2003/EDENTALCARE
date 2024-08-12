<?php
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['aemail']))
{
  header('Location:dashboard.php');
}
$r=$_GET['neid'];
$sql="SELECT * FROM note WHERE note_id= '$r'";
$result= $conn->query($sql);
$s= $result->fetch_assoc();
if(isset($_POST['edit_note']))
{
   $ntname=$_POST['ntname'];
   $nid=$_POST['neid'];
   $sql="UPDATE note SET `message`='$ntname' WHERE `note_id`='$nid'";
   if($conn->query($sql)=== TRUE)
   {
      echo "Your Notes List Updated sucessfully";
      header('Location:notes_list.php?msg= Notes Updated Sucessfully');
   }
   else
   {
      echo "Your Notes List Not Updated sucessfully";
      header('Location:notes_list.php?msg=Error Updating Notes');
   }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>E-dental | Note</title>
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
                            <input type="hidden" class="form-control1" id="focusedinput" name="neid" placeholder="id Of note" value="<?php echo $s['note_id'];?>">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Message:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" id="focusedinput" name="ntname" placeholder="Type Your Notes" value="<?php echo $s['message'];?>">
                        </div>
                    </div>
                    </div>
                     <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                   <!-- <button class="btn-success btn">Submit</button> -->
                   <input type="submit" name="edit_note" value="Update Note" class="btn-success btn">
                   <!-- <div class="clearfix"></div> -->

                </div>
                <br>
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
