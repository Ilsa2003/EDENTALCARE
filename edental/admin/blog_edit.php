<?php
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['aemail']))
{
  header('Location:dashboard.php');
}
$ab=$_GET['bleid'];
$sql="SELECT *FROM blog where blog_id='$ab'";
$result= $conn->query($sql);
$qp=$result->fetch_assoc();
if(isset($_POST['up_blog']))
{
	$a=$_POST['blname'];
	$b=$_POST['txtarea2'];
	$c=$_POST['selector3'];
	$q=$_POST['bleid'];
    $sql="UPDATE blog SET `blog_title`='$a',`blog_desc`='$b',`blog_status`='$c' WHERE blog_id='$q'";
    if($conn->query($sql))
   {
      header('Location:blog_list.php?msg=Blog sucessfully Updated..');
   }
   else
   {
      header('Location:blog_list.php?msg=Error Updating Blog..');
   }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>E-dental |Blog</title>
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
		 <h3>Update Blog</h3>
    	 <div class="tab-content">
            <div class="tab-pane active" id="horizontal-form">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                	<div class="form-group">
                           <div class="col-sm-8">
                            <input type="hidden" class="form-control1" id="focusedinput" name="bleid" placeholder="id Of Blog" value="<?php echo $qp['blog_id'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Blog Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" id="focusedinput" name="blname" placeholder="Name Of Blog" value="<?php echo $qp['blog_title'];?>">
                        </div>
                    </div>
                     <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Blog Description</label>
                     <div class="col-sm-8">
                        <textarea name="txtarea2" id="txtarea1" cols="50" rows="7"><?php echo $qp['blog_desc'];?></textarea>
                     </div>
                  </div>
                    <div class="form-group">
                        <label for="selector2" class="col-sm-2 control-label">Select Status</label>
                        <div class="col-sm-8">
                            <select name="selector3" id="selector1" class="form-control1" value="<?php echo $qp['blog_status'];?>">
                                <option value="select">Select</option>
                                <option value="1" <?php if($qp['blog_status']=="1") echo 'selected="selected"'; ?> >Show</option>
                                <option value="0" <?php if($qp['blog_status']=="0") echo 'selected="selected"'; ?> >Hide</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <input type="submit" name="up_blog" value="Update Blog" class="btn-success btn" required="">
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




