<?php
include '..\extra\conn.php';
session_start();
if(isset($_SESSION['aemail']))
{
header('Location:dashboard.php');
}
if(isset($_POST['sbmt']))
{
	$aemail=$_POST['aemail'];
	$apass=$_POST['apsw'];
	$sql="SELECT * FROM admin WHERE a_email='$aemail' && a_pwd='$apass'";
	$result = $conn->query($sql);
	if ($result->num_rows>0) 
	{
		$row=$result->fetch_assoc();
		if($row['a_status']==1)
		{
		$_SESSION['aemail']=$aemail;
		$_SESSION['aid']=$row['a_id'];
		header('Location:dashboard.php');
		}
		else
		{
	header('Location:index.php?msg=Admin is not verify');
		}
	}
	else
	{
	header('Location:index.php?msg=Email or password is wrong');
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Edental | Login | Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<!-- Custom CSS -->
<link href="../aassets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="../aassets/css/style.css" rel='stylesheet' type='text/css' />
<link href="../aassets/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="../aassets/js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="../aassets/js/bootstrap.min.js"></script>
</head>
<body id="login">
	<div class="login-logo">
		<a href="index.php"><img src="images/e-logo.png" alt="" width="10%" height="10%" /></a>
	</div>
	<h2 class="form-heading">Admin login</h2>
	 <center><h5 class="form-heading" style="color: red;">
   	<?php 
   	if(isset($_GET['msg']))
   	{
   		echo $_GET['msg'];
   	}
   	?>
   </h5></center>  
	<div class="app-cam">
		<form action="" method="post">
			<input type="text" class="text" value="E-mail address" name="aemail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}" required="">
			<input type="password" value="Password" name="apsw" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
			<div class="submit"><input type="submit" onclick="" value="Login" name="sbmt" required=""></div>
		<!-- <ul class="new">
			<li class="new_left"><p><a href="#">Forgot Password ?</a></p></li>
			<li class="new_right"><p class="sign">New here ?<a href="register.html"> Sign Up</a></p></li>
			<div class="clearfix"></div>
		</ul> -->
	    </form>
	</div>
	<div class="copy_layout login">
		<?php include './extra/footer.php'?>

	</div>
</body>
</html>
