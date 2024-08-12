<?php
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['aemail']))
{
  header('Location:dashboard.php');
}
$tid=$_GET['teid'];
$sql="SELECT *from dentist_tips WHERE d_t_id = '$tid'";
$result = $conn->query($sql);
$q = $result ->fetch_assoc();
if(isset($_POST['edit_dtips']))
{
   $tname=$_POST['tname'];
   $tdesc=$_POST['txtarea1'];
   $tstatus=$_POST['selector1'];
   $q=$_POST['teid'];
   $sql="UPDATE dentist_tips SET `t_name`='$tname',`t_desc`='$tdesc',`t_status`='$tstatus' WHERE `d_t_id`='$q'";
     if($conn ->query($sql) === TRUE)
   {
      echo "Your Data is Updated Sucessfully";
      header('Location:dtips_list.php?msg=Dentist-Tips Updated Successfully');
   }
   else
   {
      echo "Data Not Updated Successfully";
      header('Location:dtips_list.php?msg=Error in Updated Dentist-Tips..');
   }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Add Dental Tips</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="../aassets/css/bootstrap.min.css" rel='stylesheet' type='text/css'/>
<!-- Custom CSS -->
<link href="../aassets/css/style.css" rel='stylesheet' type='text/css'/>
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
              <h3>Update Dental Tips</h3>
            <div class="tab-content">
               <div class="tab-pane active" id="horizontal-form">
                  <form action="" method="POST" class="form-horizontal">
                      <div class="form-group">
                        <div class="col-sm-8">
                           <input type="hidden" class="form-control1" id="focusedinput" name="teid" value="<?php echo $q['d_t_id'];?>">
                     <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Tip Title</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control1" id="focusedinput" name="tname" value="<?php echo $q['t_name'];?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Tip Description</label>
                        <div class="col-sm-8">
                           <textarea name="txtarea1" id="txtarea1" cols="50" rows="7"><?php echo $q['t_desc'];?></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="selector1" class="col-sm-2 control-label">Select Status</label>
                        <div class="col-sm-8">
                           <select name="selector1" id="selector1" class="form-control1" value="<?php echo $q['t_status'];?>">
                           <option value="select">Select</option>
                           <option value="1" <?php if($q['t_status']=="1") echo 'selected="selected"'; ?>>Show</option>
                           <option value="0" <?php if($q['t_status']=="0") echo 'selected="selected"'; ?>>Hide</option>
                        </select>
                     </div>   
                     </div>
                     <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                   <!-- <button class="btn-success btn">Submit</button> -->
                   <input type="submit" name="edit_dtips" value="Edit Dental Tips" class="btn-success btn">
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
