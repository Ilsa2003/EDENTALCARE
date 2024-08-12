<?php
include '../extra/conn.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$now=date("Y-m-d");
if(!isset($_SESSION['aemail']))
{
  header('Location:dashboard.php');
}
$sql="SELECT * FROM `general_setting`";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

if(isset($_POST['update_general']))
{
$target_dir="../assets/images/";
$target_file=$target_dir.basename($_FILES["spic"]["name"]);
$img_path="assets/images/".basename($_FILES["spic"]["name"]);
$web_title=$_POST['stitle'];
$web_desc=$_POST['sdesc'];
$web_address=$_POST['sadd'];
$web_contact=$_POST['snum'];
$web_contact1=$_POST['snum1'];
$web_email=$_POST['semail'];
$g_s_id=$_POST['g_s_id'];

if ($_FILES['spic']['size'] == 0 )
{
 $sql="UPDATE `general_setting` SET `web_title`='$web_title',`web_desc`='$web_desc',`web_contact`='$web_contact',`web_contact1`='$web_contact1',`web_email`='$web_email',`web_address`='$web_address' WHERE g_s_id='$g_s_id'";

      if ($conn->query($sql) === TRUE) 
      {
          header('Location:general_setting.php?msg=Dentist-Setting Added Successfully..');
         // echo "Data insert";
      }
      else
      {
        header('Location:general_setting.php?msg=Error in Adding Setting..');
      }
}
else
{

$uploadOk=1;
 $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file))
{
    // echo "Sorry,file alreaddy exists.";
    $uploadOk=0;
}
if($_FILES['spic']["size"]>500000000)
{
    // echo "Sorry, file is too large.";
    $uploadOk=0;
}
if ($imageFileType !="jpg" && $imageFileType !="png" && $imageFileType!="jpeg" && $imageFileType!="gif")
{
    // echo "Sorry, only jpg, png, jpeg, gif are allowed";
    $uploadOk=0;
}
if ($uploadOk==0)
{
    header('Location:general_setting.php?msg=Error in File Uploading');
}
else
{
    if(move_uploaded_file($_FILES["spic"]["tmp_name"], $target_file))
{
   


   $sql="UPDATE `general_setting` SET `web_title`='$web_title',`web_desc`='$web_desc',`web_logo`='$target_file',`web_contact`='$web_contact',`web_contact1`='$web_contact1',`web_email`='$web_email',`web_address`='$web_address' WHERE g_s_id='$g_s_id'";

      if ($conn->query($sql) === TRUE) 
      {
          header('Location:general_setting.php?msg=Dentist-Setting Added Successfully..');
         // echo "Data insert";
      }
      else
      {
        header('Location:general_setting.php?msg=Error in Adding Setting..');
      }

      }
    else
    {
        echo "Sorry, there was an error uploading your file.";
    }
}
}


}


if(isset($_POST['add_general']))
{
$target_dir="../assets/images/";
$target_file=$target_dir.basename($_FILES["spic"]["name"]);
$img_path="assets/images/".basename($_FILES["spic"]["name"]);


$uploadOk=1;
echo $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file))
{
    // echo "Sorry,file alreaddy exists.";
    $uploadOk=0;
}
if($_FILES['spic']["size"]>500000000)
{
    // echo "Sorry, file is too large.";
    $uploadOk=0;
}
if ($imageFileType !="jpg" && $imageFileType !="png" && $imageFileType!="jpeg" && $imageFileType!="gif")
{
    // echo "Sorry, only jpg, png, jpeg, gif are allowed";
    $uploadOk=0;
}
if ($uploadOk==0)
{
    header('Location:general_setting.php?msg=Error in File Uploading');
}
else
{
    if(move_uploaded_file($_FILES["spic"]["tmp_name"], $target_file))
{
   $web_title=$_POST['stitle'];
   $web_desc=$_POST['sdesc'];
   $web_address=$_POST['sadd'];
   
   $web_contact=$_POST['snum'];
   $web_contact1=$_POST['snum1'];
$web_email=$_POST['semail'];


   $sql="INSERT INTO `general_setting`(`web_title`, `web_desc`, `web_logo`, `web_contact`, `web_contact1`, `web_email`, `web_address`) VALUES ('$web_title','$web_desc','$target_file','$web_contact','$web_contact1','$web_email','$web_address')";

      if ($conn->query($sql) === TRUE) 
      {
          header('Location:general_setting.php?msg=Dentist-Setting Added Successfully..');
         // echo "Data insert";
      }
      else
      {
        header('Location:general_setting.php?msg=Error in Adding Setting..');
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
<title>E-dental | General Setting</title>
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
            <h3>Add General Setting</h3>
          <?php  
          if(isset($_GET['msg']))
          {
            echo "<h5 style='color:red;'>".$_GET['msg']."</h5>";
          }
          ?>
            <div class="tab-content">
               <div class="tab-pane active" id="horizontal-form">
            <?php 
               if($result->num_rows > 0)
               {
            ?>
             <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                     <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Site Title</label>
                        <div class="col-sm-8">
                           <input type="hidden" class="form-control1" id="focusedinput" name="g_s_id" value="<?php echo $row['g_s_id'];?>">

                           <input type="text" class="form-control1" id="focusedinput" name="stitle" placeholder="Enter Site Title" required="" value="<?php echo $row['web_title'];?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Site Description</label>
                        <div class="col-sm-8">
                           <textarea class="form-control1" id="focusedinput" name="sdesc" placeholder="Enter Site Desc" required><?php echo $row['web_desc'];?></textarea>
                          
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-8">
                           <textarea class="form-control1" id="focusedinput" name="sadd" placeholder="Enter Address" required><?php echo $row['web_address'];?></textarea>
                          
                        </div>
                     </div>
                     <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Logo</label>
                     <div class="col-sm-8">
                    <input type="file" class="form-control1" id="spic" name="spic" >
                    <img src="<?php echo $row['web_logo'];?>" width='30%'>
                     </div>
                     </div>
                    
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label"> Contact</label>
                        <div class="col-sm-8">
                           <input type="number" class="form-control1" id="focusedinput" name="snum" placeholder="Enter  Contact Number" value="<?php echo $row['web_contact'];?>" required="">
                        </div>
                     </div>
                       <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Other Contact</label>
                        <div class="col-sm-8">
                           <input type="number" class="form-control1" id="focusedinput" name="snum1" placeholder="Enter Contact Number" value="<?php echo $row['web_contact1'];?>" required="">
                        </div>
                     </div>

                     <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-8">
                           <input type="email" class="form-control1" id="focusedinput" name="semail" placeholder="Enter Email " value="<?php echo $row['web_email'];?>" required="">
                        </div>
                     </div>
                     
                     <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                   <!-- <button class="btn-success btn">Submit</button> -->
                   <input type="submit" name="update_general" value="Update General Setting" class="btn-success btn" required="">
                </div>
             </div>
          </form>

                   <?php  }
                     else
                     {
                        ?>
                         <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                     <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Site Title</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control1" id="focusedinput" name="stitle" placeholder="Enter Site Title" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Site Description</label>
                        <div class="col-sm-8">
                           <textarea class="form-control1" id="focusedinput" name="sdesc" placeholder="Enter Site Desc" required></textarea>
                          
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-8">
                           <textarea class="form-control1" id="focusedinput" name="sadd" placeholder="Enter Address" required></textarea>
                          
                        </div>
                     </div>
                     <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Logo</label>
                     <div class="col-sm-8">
                    <input type="file" class="form-control1" id="spic" name="spic" required>
                     </div>
                     </div>
                    
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label"> Contact</label>
                        <div class="col-sm-8">
                           <input type="number" class="form-control1" id="focusedinput" name="snum" placeholder="Enter  Contact Number" required="">
                        </div>
                     </div>
                       <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Other Contact</label>
                        <div class="col-sm-8">
                           <input type="number" class="form-control1" id="focusedinput" name="snum1" placeholder="Enter Contact Number" required="">
                        </div>
                     </div>

                     <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-8">
                           <input type="email" class="form-control1" id="focusedinput" name="semail" placeholder="Enter Email " required="">
                        </div>
                     </div>
                     
                     <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                   <!-- <button class="btn-success btn">Submit</button> -->
                   <input type="submit" name="add_general" value="Add General Setting" class="btn-success btn" required="">
                </div>
             </div>
          </form>

           <?php
            }
         ?>

                 
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