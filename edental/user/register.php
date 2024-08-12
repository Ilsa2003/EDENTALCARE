<?php 
include '../extra/conn.php';
session_start();

if(isset($_SESSION['ueml']))
{
header('Location:dashboard.php');
}
if(isset($_POST['usbmt']))
{
    $a=$_POST['usname'];
    $b=$_POST['udob'];
    $c=$_POST['gender'];
    $d=$_POST['usmob'];
    $e=$_POST['uadd'];
    $f=$_POST['uemail'];
    $g=$_POST['upsw'];
    
    $sql="select * from patient_login where email='$f'";
    $result=$conn->query($sql);
    if($result->num_rows > 0)
    {
      header('Location:register.php?msg=Patient Email is already register');
    }
    else
    {
       $sql="INSERT INTO patient_login(email,password) VALUES ('$f','$g')";
      if ($conn->query($sql) === TRUE) 
    {
      $last_id = $conn->insert_id;
      echo $sql="INSERT INTO patient(p_l_id,p_name,dob,gender,phone,p_add) VALUES ('$last_id','$a','$b','$c','$d','$e')";
      if($conn->query($sql) === TRUE)
      {
        header('Location:index.php?msg=Patient Register Successfully');
      }
      else
      {
         header('Location:index.php?msg=Patient register error');
      }
    }
    else
    {
      header('Location:index.php?msg=Patient register error');
    }

    }

   
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>User Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
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
<!-- Bootstrap Core JavaScript -->
<script src="../aassets/js/bootstrap.min.js"></script>
</head>

<body id="login" >
  <div class="graphs" >
  <div class="login-logo">

    <a href="index.php"><img src="images/e-logo.png"  alt="E-Dental" title="E-Dental" style="height:160px;"  /></a>
  </div>
  <h2 class="form-heading">User Registration</h2>
  <form class="form-signin app-cam"  method="POST" action="">
   <!--  <p>Enter your personal details below</p> -->
    Full Name:
    <input type="text" class="form-control1" placeholder="User Full Name" name="usname" autofocus="" required="">
    Date Of Birth:
    <input type="date" class="form-control1" placeholder="DOB" name="udob" autofocus="" required="">
    Gender:
    <div class="radios">
      <label for="radio-01" class="label_radio">
        <input type="radio"  name="gender" value="Male" checked=""> Male</label>
      <label for="radio-02" class="label_radio">
        <input type="radio" name="gender" value="Female" > Female</label>
    </div>
    Mobile No.:
    <input type="number" class="form-control1" placeholder="Phone No.:" name="usmob" autofocus="" required="">
    Address:
    <textarea name="uadd" id="uadd" cols="50" rows="7" class="form-control1"></textarea>
    Email:
    <input type="Email" class="form-control1" placeholder="Email" name="uemail" autofocus="" required="">
    Password:
    <input type="password" class="form-control1" placeholder="Password" name="upsw" required="">
    <!-- <p> Enter your account details below</p>
    <input type="text" class="form-control1" placeholder="User Name" autofocus="">
    <input type="password" class="form-control1" placeholder="Password">
    <input type="password" class="form-control1" placeholder="Re-type Password"> -->
    <label class="checkbox-custom check-success">
    <input type="checkbox" value="agree this condition" id="checkbox1" required="">
    <label for="checkbox1">I agree to the Terms of Service and Privacy Policy</label>
    </label>
    <button class="btn btn-lg btn-success1 btn-block" type="submit" name="usbmt" >Submit</button>
    <div class="registration">Already Registered.
        <a class="" href="index.php">Login</a>
    </div>
  </form>
   <?php include 'extra/footer.php';?> 
 </div>
</body>
</html>
