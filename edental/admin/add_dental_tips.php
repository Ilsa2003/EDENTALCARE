<?php
include '../extra/conn.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$now=date("Y-m-d");
if(!isset($_SESSION['aemail']))
{
  header('Location:dashboard.php');
}
if(isset($_POST['add_dtips']))
{
$target_dir="../eblog/";
$target_file=$target_dir.basename($_FILES["tpic"]["name"]);
$img_path="eblog/".basename($_FILES["tpic"]["name"]);


$uploadOk=1;
$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file))
{
    echo "Sorry,file alreaddy exists.";
    $uploadOk=0;
}
if($_FILES['tpic']["size"]>500000000)
{
    echo "Sorry, file is too large.";
    $uploadOk=0;
}
if ($imageFileType !="jpg" && $imageFileType="png" && $imageFileType="jpeg" && $imageFileType="gif")
{
    echo "Sorry, only jpg, png, jpeg, gif are allowed";
    $uploadOk=0;
}
if ($uploadOk==0)
{
    header('Location:add_dental_tips.php?msg=Error in File Uploading');
}
else
{
    if(move_uploaded_file($_FILES["tpic"]["tmp_name"], $target_file))
{
   $tname=$_POST['tname'];
   $tdesc=$_POST['txtarea1'];
   $tstatus=$_POST['selector1'];
   $sql="INSERT INTO dentist_tips(t_pic,t_name,t_desc,t_status,t_cdate) VALUES ('$img_path','$tname','$tdesc','$tstatus','$now')";
      if ($conn->query($sql) === TRUE) 
      {
          header('Location:dtips_list.php?msg=Dentist-Tips Added Successfully..');
         // echo "Data insert";
      }
      else
      {
        header('Location:dtips_list.php?msg=Error in Adding Dentist-Tips..');
      }

      }
    else
    {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>E-dental | Add Dental Tips</title>
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
            <h3>Add Dental Tips</h3>
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
                        <label for="focusedinput" class="col-sm-2 control-label">Tip Title</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control1" id="focusedinput" name="tname" placeholder="Title Of The Tips" required="">
                        </div>
                     </div>
                      <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Tip Image</label>
                     <div class="col-sm-8">
                    <input type="file" class="form-control1" id="tpic" name="tpic" required>
                     </div>
                  </div>
                     <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Tip Description</label>
                        <div class="col-sm-8">
                           <textarea name="txtarea1" id="txtarea1" cols="50" rows="7" placeholder="Description Of The Tips" class="form-control1" required=""></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="selector1" class="col-sm-2 control-label">Select Status</label>
                        <div class="col-sm-8">
                           <select name="selector1" id="selector1" class="form-control1">
                           <option value="select">Select</option>
                           <option value="1">Show</option>
                           <option value="0">Hide</option>
                        </select></div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                   <!-- <button class="btn-success btn">Submit</button> -->
                   <input type="submit" name="add_dtips" value="Add Dental Tips" class="btn-success btn" required="">
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