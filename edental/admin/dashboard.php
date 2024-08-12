<?php 
include '../extra/conn.php';

session_start();
if(!isset($_SESSION['aemail']))
{
header('Location:index.php');
}

$doc_sql="SELECT * FROM doctor_info,deg where doctor_info.d_degree=deg.deg_id";
$doc_result=$conn->query($doc_sql);

$user_sql="SELECT * FROM `patient`";
$user_result=$conn->query($user_sql);

$service_sql="SELECT * FROM `service`";
$service_result=$conn->query($service_sql);

$blog_sql="SELECT * FROM `blog`";
$blog_result=$conn->query($blog_sql);

// List
$tips_sql="SELECT * FROM `dentist_tips`";
$tips_result=$conn->query($tips_sql);

$note_sql="SELECT * FROM `note`";
$note_result=$conn->query($note_sql);

// $user_sql="SELECT * FROM `note`";
// $user_result=$conn->query($user_sql);



?>
<!DOCTYPE HTML>
<html>
<head>
<title>E-dental | Home-Admin</title>
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
       <?php include './extra/sidebar.php';?>
        <div id="page-wrapper">
        <div class="graphs">
     	<div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-cog icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $service_result->num_rows ;?></strong></h5>
                      <span>Service</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-users user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $user_result->num_rows ;?></strong></h5>
                      <span>User</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-user-md user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $doc_result->num_rows ;?></strong></h5>
                      <span>Doctor</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-bold dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $blog_result->num_rows ;?></strong></h5>
                      <span>Blog</span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
      </div>
      <div class="col_1">
		    <div class="col-md-4 stats-info">	
		      <div class="panel-heading">
                    <h4 class="panel-title">Dental Tips</h4>
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                    	<?php 
                    	while($row=$tips_result->fetch_assoc())
                    	{

                    	?>
                        <li><?php echo $row['t_name'];?><div class="text-success pull-right">12%<i class="fa fa-level-up"></i></div></li>
                        <?php } ?>
                    </ul>
                </div>
		    </div>
		    <div class="col-md-4 span_8">
		    	  
		       <div class="activity_box">
		       	
		        <div class="scrollbar" id="style-2">
		        	<?php 
		        	while($row=$doc_result->fetch_assoc())
		        	{

		        	?>
                   <div class="activity-row">
	                 <div class="col-xs-1"><i class="fa fa-thumbs-up text-info icon_13"> </i>  </div>
	                 <div class="col-xs-3 activity-img"><img src='../<?php echo $row['d_pic'] ;?>' class="img-responsive" alt=""/></div>
	                 <div class="col-xs-8 activity-desc">
	                 	<h5><a href="#"><?php echo $row['d_name'] ;?></a> Deg. <a href="#"><?php echo $row['deg_name'] ;?></a></h5>
	                    <p>Contact: <?php echo $row['d_contact'] ;?></p>
	                    <h6>Reg No: <?php echo $row['d_reg_no'] ;?></h6>
	                 </div>
	                 <div class="clearfix"> </div>
                    </div>
	  			    <?php }
	  			    ?>
                   
                    
	  		        </div>
		          </div>
		    </div>
			<div class="col-md-4 stats-info">
                <div class="panel-heading">
                    <h4 class="panel-title">Note</h4>
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                    	<?php 
                    	while($row=$note_result->fetch_assoc())
                    	{

                    	?>
                        <li><?php echo $row['message'] ;?><div class="text-success pull-right">Date:- <?php echo $row['date'] ;?></div></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
	  </div>
	
		<?php include './extra/footer.php';?>
		</div>
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="../aassets/js/bootstrap.min.js"></script>
</body>
</html>
