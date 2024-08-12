<?php 
include 'extra/conn.php';
$dsql="select * from doctor_info,deg where deg.deg_id=doctor_info.d_degree and d_status='1'";
$dresult=$conn->query($dsql);

// print_r($result);
?>

<!doctype html>
<html lang="zxx">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>E-Dental | About </title>
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
			<a href="index.php">Home</a> » <span class="breadcrumb_last" aria-current="page">About</span>
		</div>
	</nav>
	
<!-- feature1 -->
<section class="w3l-feature-1">
	<div class="feature-1sec py-5">
		<div class="container py-lg-5">
			<div class="feature-1-content">
				<img src="assets/images/banner2.jpg" class="img-fluid" alt="" />
				<h3 class="hny-title mt-4">Welcome to E-dental</h3>
				<p class="mt-2">E-dental is a website which meets all the requirements of a dental clinic and to help the dentist in managing their clinics in an effective manner.</p>
				<div class="read">
					<a class="btn mt-4" href="services.php">Read More</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //feature1 -->
	<section class="w3l-content-4">
		<!-- /content-6-section -->
		<div class="content-4-main py-5">
			<div class="container py-lg-5">
				<div class="content-info-in row">
					<div class="content-right col-lg-6 pl-lg-4">
						<div class="row content4-right-grids mb-lg-5 mb-4">
							<div class="col-md-2 content4-right-icon">
								<div class="content4-icon">
									<span class="fa fa-linode"></span>
								</div>
							</div>
							<div class="col-md-10 content4-right-info">
								<h6><a href="#">Annual Check-ups</a></h6>
								<!-- <p>Lorem ipsum dolor sit amet,Ea consequuntur illum facere aperiam sequi optio
									consectetur
									adipisicing elit.</p> -->
							</div>

						</div>
						<div class="row content4-right-grids mb-lg-5 mb-4">
							<div class="col-md-2 content4-right-icon">
								<div class="content4-icon">
									<span class="fa fa-heartbeat"></span>
								</div>
							</div>
							<div class="col-md-10 content4-right-info">
								<h6><a href="#">
										Work with Hearts</a></h6>
								<!-- <p>Lorem ipsum dolor sit amet,Ea consequuntur illum facere aperiam sequi optio
									consectetur
									adipisicing elit.</p> -->
							</div>

						</div>
						<div class="row content4-right-grids mb-lg-5 mb-4">
							<div class="col-md-2 content4-right-icon">
								<div class="content4-icon">
									<span class="fa fa-handshake-o"></span>
								</div>
							</div>
							<div class="col-md-10 content4-right-info">
								<h6><a href="#">
										Help at Hand</a></h6>
							<!-- 	<p>Lorem ipsum dolor sit amet,Ea consequuntur illum facere aperiam sequi optio
									consectetur
									adipisicing elit.</p> -->
							</div>

						</div>
					</div>
					<div class="content-left col-lg-6 pl-lg-4">
						<h6 class="sub-title">
							Who we are</h6>
						<h3 class="hny-title">
							Why Choose Us</h3>
						<p>Our website is user-friendly. Anyone can use it in a easy way. Dental care can lead to error free, secure, reliable and fast management system. It can assist the user to concentrate on their other activities rather to concentrate on the record keeping.</p>
						<img src="assets/images/ab2.jpg" class="img-fluid mt-3" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //content-6-section -->
	<!--/team-sec-->
	<section class="w3l-team-main">
		<div class="team py-5">
			<div class="container py-lg-5">
						<div class="row team-row">
							<div class="col-lg-3 col-md-6 team-left">
								<div class="title-content text-left">
									<h6 class="sub-title">Expert Doctors</h6>
									<h3 class="hny-title">Our Team</h3>
									<!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sunt in culpa
										qui
										officia sed deserunt mollit anim id est laborum mollit anim id est nulla.</p> -->
								</div>
							</div>
							<!-- end team member -->
							<?php 
							while($row=$dresult->fetch_assoc())
							{
							?>
					<div class="col-lg-3 col-md-6 team-wrap">
						<div class="team-info text-left">
							<div class="column position-relative">
										<a href="#url"><img src="<?php echo $row['d_pic'] ;?>" alt=""
												class="img-fluid team-image" /></a>
									</div>
									<div class="column">
										<h3 class="name-pos"><a href="#url"><?php echo $row['d_name'] ;?></a></h3>
										<p><?php echo $row['deg_name'] ;?></p>
										<div class="social">
											<div class="social-left">
												<a href="#facebook" class="facebook"><span class="fa fa-facebook"
														aria-hidden="true"></span></a>
												<a href="#twitter" class="twitter"><span class="fa fa-twitter"
														aria-hidden="true"></span></a>
											</div>
											<div class="social-right">
												<a href="#email" class="email"><span
														class="fa fa-envelope-o"></span></a>
												<a href="#phone" class="phone"><span class="fa fa-phone"></span></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<!-- end team member -->
						<?php } ?>
							
						</div>
					</div>
				</div>
	</section>
	<!--//team-sec-->
		<!-- grids -->
		<section class="grids-1 py-5">
			<div class="grids py-lg-5">
				<div class="container">
					<h6 class="sub-title">We care your smile</h6>
					<h3 class="hny-title">Featured Services
					</h3>
					<div class="row text-center mt-lg-5 mt-4">
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="column">
								<a href="#single"><img src="assets/images/g1.jpg" alt="" class="img-responsive" /></a>
								<h4><a href="#single">Periodontal Therapy</a></h4>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6 mt-sm-0 mt-4">
							<div class="column">
								<a href="#single"><img src="assets/images/g2.jpg" alt="" class="img-responsive" /></a>
								<h4><a href="#single">Cosmetic Dentistry</a></h4>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6 mt-md-0 mt-4">
							<div class="column">
								<a href="#single"><img src="assets/images/g3.jpg" alt="" class="img-responsive" /></a>
								<h4><a href="#single">Dental Implants</a></h4>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6 mt-lg-0 mt-4">
							<div class="column">
								<a href="#single"><img src="assets/images/g4.jpg" alt="" class="img-responsive" /></a>
								<h4><a href="#single">Pediatric Dentistry</a></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- //grids -->
	<!-- footer-66 -->
	<?php include'footer.php'?>
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
<!--/scroll-down-JS-->
<!-- stats -->
<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.countup.js"></script>
<script>
	$('.counter').countUp();
</script>
<!-- //stats -->
<!-- //script -->
<script src="assets/js/bootstrap.min.js"></script>