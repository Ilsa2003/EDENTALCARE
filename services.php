<?php 
include 'extra/conn.php';
$sql="select * from service";
$result=$conn->query($sql);
// print_r($result);
?>
<!doctype html>
<html lang="zxx">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>E-Dental | Services</title>
	<link rel="stylesheet" href="assets/css/style-starter.css">
	<link href="//fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700&display=swap" rel="stylesheet">
</head>
<body>
	<!---header-->
	<?php include 'header.php';?>
	<!-- //-header -->
	<!-- /breadcrumbs -->
	<nav id="breadcrumbs" class="breadcrumbs">
		<div class="container page-wrapper">
			<a href="index.php">Home</a> » <span class="breadcrumb_last" aria-current="page">Services</span>
		</div>
	</nav>
	<!-- //breadcrumbs -->
	<!-- services block 2 -->
	<div class="w3l-services-block py-5" id="classes">
		<div class="container py-lg-5 py-md-5">
			<div class="title-content text-left mb-lg-5 mt-4">
				<h6 class="sub-title">What We Offer</h6>
				<h3 class="hny-title">Services</h3>
				<p>These Are Some Services Provided By Us.</p>
			</div>
			<div class="services-block_grids_bottom">
				<div class="row">

					<?php 
					while ($row=$result->fetch_assoc())
					 {			
					?>
					<div class="col-lg-4 col-md-6 service_grid_btm_left mt-lg-5 mt-4">
						<div class="service_grid_btm_left1">
							<a href="#"><img src="<?php echo $row['service_pic'];?>" alt=" " class="img-fluid" />
							</a>
							<div class="service_grid_btm_left2">
								<h5><?php echo $row['service_offer'];?></h5>
								<!-- <p><?php echo $row['blog_desc'];?></p> -->
								<div class="read">
									<a class="btn mt-4" href="">Rs.<?php echo $row['price'];?></a>
								</div>
							</div>

						</div>
					</div>
					<?php 
				} 
				?>
				</div>
			</div>
		</div>
	</div>
	<!-- footer-66 -->
	<?php include 'footer.php';?>
	<!--//footer-66 -->
</body>
</html>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<!-- disable body scroll which navbar is in active -->
<!--//-->
<script>
	$(function () {
		$('.navbar-toggler').click(function () {
			$('body').toggleClass('noscroll');
		})
	});
</script>
<!-- //script -->
<!-- stats -->
<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.countup.js"></script>
<script>
	$('.counter').countUp();
</script>
<!-- //stats -->
<script src="assets/js/bootstrap.min.js"></script>