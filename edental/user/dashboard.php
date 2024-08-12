<?php 
include '..\extra\conn.php';

session_start();
if(!isset($_SESSION['ueml']))
{
header('Location:index.php');
}

$dsql="SELECT count(*) as dtotal from doctor_info where d_status='1' ";
$dresult=$conn->query($dsql);
$drow=$dresult->fetch_assoc();

$service_sql="SELECT * FROM `service`";
$service_result=$conn->query($service_sql);

$blog_sql="SELECT * FROM `blog` where blog_status='1'";
$blog_result=$conn->query($blog_sql);

// List
$tips_sql="SELECT * FROM `dentist_tips` where t_status='1'";
$tips_result=$conn->query($tips_sql);

$note_sql="SELECT * FROM `note`";
$note_result=$conn->query($note_sql);

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Edental | Home-USER </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content=""/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="../aassets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="../aassets/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="../aassets/css/lines.css" rel='stylesheet' type='text/css' />
<link href="../aassets/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="../aassets/js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Nav CSS -->
<link href="../aassets/css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="../aassets/js/metisMenu.min.js"></script>
<script src="../aassets/js/custom.js"></script>
<!-- Graph JavaScript -->
<script src="../aassets/js/d3.v3.js"></script>
<script src="../aassets/js/rickshaw.js"></script>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
       <?php include 'extra/sidebar.php';?>
        <div id="page-wrapper">
        <div class="graphs">
     	<div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-users icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $drow['dtotal'];?></strong></h5>
                      <span><a href='doc_list.php'>Doctor</a></span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-users user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $blog_result->num_rows;?></strong></h5>
                      <span>Blog</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-comment user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $tips_result->num_rows;?></strong></h5>
                      <span>Tips</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $note_result->num_rows;?></strong></h5>
                      <span>Note</span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
      </div>
      
	
    	<?php include 'extra/footer.php';?>
		</div>
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="../aassets/js/bootstrap.min.js"></script>
</body>
</html>
