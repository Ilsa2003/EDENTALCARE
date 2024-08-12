<?php 
include '..\extra\conn.php';

session_start();
if(!isset($_SESSION['demail']))
{
	header('Location:index.php');
}
$did=$_SESSION['did'];

// Patient
 $pai_sql="SELECT DISTINCT patient_id FROM appointment WHERE d_id='$did'";
 $pai_result=$conn->query($pai_sql);

// Appionment
$apoi_sql="SELECT * FROM appointment WHERE d_id='$did'";
 $apoi_result=$conn->query($apoi_sql);

// COnsultaion
 $cons_sql="SELECT * FROM online_consultation WHERE d_id='$did'";
 $cons_result=$conn->query($cons_sql);
// Amount
 $iv_sql="select SUM(invoice_amount) as iv_amount from invoice where d_id='$did'";
$iv_result = $conn->query($iv_sql);
$iv_row=$iv_result->fetch_assoc();

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>E-dental | Home- DOCTOR</title>
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
						<i class="pull-left fa fa-users icon-rounded"></i>
						<div class="stats">
							<h5><strong><?php echo $pai_result->num_rows ;?></strong></h5>
							<span>Patient</span>
						</div>
					</div>
				</div>
				<div class="col-md-3 widget widget1">
					<div class="r3_counter_box">
						<i class="pull-left fa fa-thumbs-up user1 icon-rounded"></i>
						<div class="stats">
							<h5><strong><?php echo $apoi_result->num_rows ;?></strong></h5>
							<span>Appointment</span>
						</div>
					</div>
				</div>
				<div class="col-md-3 widget widget1">
					<div class="r3_counter_box">
						<i class="pull-left fa fa-comment user2 icon-rounded"></i>
						<div class="stats">
							<h5><strong><?php echo $cons_result->num_rows ;?></strong></h5>
							<span>Consultation</span>
						</div>
					</div>
				</div>
				<div class="col-md-3 widget">
					<div class="r3_counter_box">
						<i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
						<div class="stats">
							<h5><strong>Rs. <?php echo $iv_row['iv_amount'];?></strong></h5>
							<span>Amount</span>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
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
