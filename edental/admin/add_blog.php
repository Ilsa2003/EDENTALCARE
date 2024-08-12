<?php 
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['aemail']))
{
  header('Location:dashboard.php');
}
date_default_timezone_set('Asia/Kolkata');
$now=date("Y-m-d");
if(isset($_POST['add_blog']))
{
$target_dir="../eblog/";
$target_file=$target_dir.basename($_FILES["bbimage"]["name"]);
$img_path="eblog/".basename($_FILES["bbimage"]["name"]);

$uploadOk=1;
$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file))
{
    echo "Sorry,file alreaddy exists.";
    $uploadOk=0;
}
if($_FILES['bbimage']["size"]>50000000000000)
{
    echo "Sorry, file is too large.";
    $uploadOk=0;
}
if ($imageFileType !="jpg" && $imageFileType !="png" && $imageFileType!="jpeg" && $imageFileType !="gif" && $imageFileType !="mp4")
{
    echo "Sorry, only jpg, png, jpeg, gif are allowed";
    $uploadOk=0;
}
if ($uploadOk==0)
{
    header('Location:add_blog.php?msg=Error in File Uploading');
}
   
else
{
    if(move_uploaded_file($_FILES["bbimage"]["tmp_name"], $target_file))
    {
        $blname=$_POST['blname'];
        $bldesc=$_POST['selector3'];
        $bstatus=$_POST['txtarea2'];
        $b_type=$_POST['b_type'];
        echo $sql="INSERT INTO blog(blog_title,blog_status,blog_desc,blog_date,blog_pic,blog_type) VALUES ('$blname','$bldesc','$bstatus','$now','$img_path','$b_type')";
    if ($conn->query($sql) === TRUE) 
    {
    header('Location:blog_list.php?msg=Blog Added Successfully..');
        
    }
    else
    {
    header('Location:add_blog.php?msg=Error Adding blog..');
        
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
<title>E-dental | Blog</title>
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
		 <h3>Add Blog</h3>
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
                        <label for="focusedinput" class="col-sm-2 control-label">Blog Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" id="focusedinput" name="blname" placeholder="Name Of Blog" required="">
                        </div>
                    </div>
                     <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Blog Description</label>
                     <div class="col-sm-8">
                        <textarea name="txtarea2" id="txtarea1" cols="50" rows="7" placeholder="Blog Desc" class="form-control1" required=""></textarea>
                     </div>
                  </div>
                   <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Blog Image/Video</label>
                     <div class="col-sm-8">
                    <input type="file" class="form-control1" id="bbimage" name="bbimage" required="">
                     </div>
                  </div>
                  <div class="form-group">
                        <label for="selector2" class="col-sm-2 control-label">Blog Type</label>
                        <div class="col-sm-8">
                            <select name="b_type" id="b_type" class="form-control1" required="">
                                <option value="select">Select Blog Type</option>
                                <option value="1">Image</option>
                                <option value="2">Video</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="selector2" class="col-sm-2 control-label">Select Status</label>
                        <div class="col-sm-8">
                            <select name="selector3" id="selector1" class="form-control1" required="">
                                <option value="select">Select</option>
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <input type="submit" name="add_blog" value="Add Blog" class="btn-success btn" required="">
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
