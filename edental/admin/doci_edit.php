<?php
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['aemail']))
{
  header('Location:dashboard.php');
}
$degsql= "select * from deg where deg_status='1'";
$degresult=$conn->query($degsql);

$r=$_GET['dieid'];
$sql="SELECT * FROM doctor_info WHERE d_id= '$r'";
$result= $conn->query($sql);
$s = $result->fetch_assoc();
if(isset($_POST['edit_doc']))
{
  $a=$_POST['dcname'];
  $b=$_POST['gender'];
  $c=$_POST['txtarea1'];
  $d=$_POST['dnum'];
  $e=$_POST['ddob'];
  $f=$_POST['deg'];
  $g=$_POST['dieid'];
   $sql= "UPDATE doctor_info SET d_name='$a',d_gender='$b',d_address='$c',d_contact='$d',d_dob='$e',d_degree='$f' WHERE d_id='$g'";
  if($conn->query($sql))
  {
    header('Location:doctor_list.php?msg=Doctor Information sucessfully Updated');
  }
  else
  {
    header('Location:doctor_list.php?msg=Error Updating Doctor Information');
  }
}
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Doctor Edit</title>
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
          <h3>Doctor Update</h3>
          <div class="tab-content">
            <div class="tab-pane active" id="horizontal-form">
              <form action="" method="POST" class="form-horizontal">
                <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Doctor Name</label>
                  <div class="col-sm-8">
                    <input type="hidden" name="dieid" value="<?php echo $r;?>">
                    <input type="text" class="form-control1" id="focusedinput" name="dcname" placeholder="Name Of Doctor" required=" " value="<?php echo $s['d_name'];?>" >
                  </div>
                  </div>
                  <div class="form-group">
                     <label for="radio" class="col-sm-2 control-label">Gender</label>
                     <div class="col-sm-8">
                        <div class="radio-inline">
                          <?php if($s['d_gender']=='M')
                          {?>
                          <label><input type="radio" name="gender" value="M" checked="" >Male</label></div>
                        <div class="radio-inline"><label><input type="radio" name="gender" value="F">Female</label></div>
                        <div class="radio-inline"><label><input type="radio" name="gender" value="O">Other</label>
                        <?php }
                        else if($s['d_gender']=='F')
                        { ?>
                          <label><input type="radio" name="gender" value="M"  >Male</label></div>
                        <div class="radio-inline"><label><input type="radio" name="gender" value="F" checked="">Female</label></div>
                        <div class="radio-inline"><label><input type="radio" name="gender" value="O">Other</label>     
                        <?php }
                      else{
                        ?>
                        <label><input type="radio" name="gender" value="M"  >Male</label></div>
                        <div class="radio-inline"><label><input type="radio" name="gender" value="F" >Female</label></div>
                        <div class="radio-inline"><label><input type="radio" name="gender" value="O" checked="">Other</label>
                    <?php }

                         ?>
                        
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Address</label>
                     <div class="col-sm-8">
                        <textarea name="txtarea1" id="txtarea1" cols="50" rows="7" placeholder="Address of Doctor" class="form-control1"><?php echo $s['d_address'];?>
</textarea>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Contact No.</label>
                     <div class="col-sm-8">
                        <input type="number" class="form-control1" id="focusedinput" name="dnum" placeholder="Contact Of Doctor" value="<?php echo $s['d_contact'];?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">DOB</label>
                     <div class="col-sm-8">
                        <input type="date" class="form-control1" id="focusedinput" name="ddob" placeholder="DOB Of Doctor" value="<?php echo $s['d_dob'];?>">
                     </div>
                  </div>
                   
                  <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Degree</label>
                    <div class="col-sm-8">
                      <select name="deg" id="selector1" class="form-control1" required="">
                        <option value="-1">Select Degree</option>
                        <?php 
                        while($row=$degresult->fetch_assoc())
                        {?>
                   <option value="<?php echo $row['deg_id'];?>" <?php if($s['d_degree']==$row['deg_id']) echo 'selected="selected"'; ?>><?php echo $row['deg_name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                     <div class="col-sm-8 col-sm-offset-2">
                        <!-- <button class="btn-success btn">Submit</button> -->
                        <input type="submit" name="edit_doc" value="Edit Doctor" class="btn-success btn">
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
