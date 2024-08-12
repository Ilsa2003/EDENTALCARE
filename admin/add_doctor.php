<?php 
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['aemail']))
{
  header('Location:dashboard.php');
}
$sql= "select * from deg where deg_status='1'";
$result=$conn->query($sql);
date_default_timezone_set('Asia/Kolkata');
$now=date("Y-m-d");
if(isset($_POST['add_doc']))
{
  $target_dir="../doctor/doctor_pic/";
  $target_file=$target_dir.basename($_FILES["ddimage"]["name"]);
  $img_path="doctor/doctor_pic/".basename($_FILES["ddimage"]["name"]);
  $uploadOk=1;
  $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  if (file_exists($target_file))
  {
    echo "Sorry,file alreaddy exists.";
    $uploadOk=0;
  }
  if($_FILES['ddimage']["size"]>500000000000)
  {
    echo "Sorry, file is too large.";
    $uploadOk=0;
  }
  if ($imageFileType !="jpg" && $imageFileType="png" && $imageFileType="jpeg" && $imageFileType="gif")
  {
    echo "Sorry, only jpg, png, jpeg, gif are allowed..";
    $uploadOk=0;
  }
  if ($uploadOk==0)
  {
    header('Location:add_doctor.php?msg=Error in File Uploading');
  }
  else
  {
    if(move_uploaded_file($_FILES["ddimage"]["tmp_name"], $target_file))
    {
      $dcname=$_POST['dcname'];
      $gender=$_POST['gender'];
      $dadd=$_POST['txtarea1'];
      $dnum=$_POST['dnum'];
      $ddob=$_POST['ddob'];
      $deg=$_POST['deg'];
      $demail=$_POST['demail'];
      $dpwd=$_POST['dpwd'];
      $dstatus=$_POST['doc_status'];
      $dc_reg_no=$_POST['dc_reg_no'];
      $sql= "INSERT into doctor_info(d_name,d_gender,d_address,d_contact,d_dob,d_degree,username,password,d_cdate,d_pic,d_status,d_reg_no) VALUES ('$dcname','$gender','$dadd','$dnum','$ddob','$deg','$demail','$dpwd','$now','$img_path','$dstatus','$dc_reg_no')";
      if ($conn->query($sql) === TRUE) 
      {
        header('Location:doctor_list.php?msg=Doctor Added Successfully..');
      }
      else
      {
        header('Location:add_doctor.php?msg=Error Adding Doctor..');
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
   <title>Add Doctor</title>
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
            <h3>Add Doctor</h3>
            <?php  
            if(isset($_GET['msg']))
            {
              echo "<h5 style='color:red;'>".$_GET['msg']."</h5>";
            }
            ?>
            <div class="tab-content">
              <div class="tab-pane active" id="horizontal-form" >
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Doctor Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control1" id="focusedinput" name="dcname" placeholder="Name Of Doctor" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Doctor Reg No</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control1" id="focusedinput" name="dc_reg_no" placeholder=" Doctor Register Number" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Doctor Pic</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control1" id="ddimage" name="ddimage" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="radio" class="col-sm-2 control-label">Gender</label>
                    <div class="col-sm-8">
                      <div class="radio-inline"><label><input type="radio" name="gender" value="M" checked="" >Male</label></div>
                      <div class="radio-inline"><label><input type="radio" name="gender" value="F">Female</label></div>
                      <div class="radio-inline"><label><input type="radio" name="gender" value="O">Other</label></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-8">
                      <textarea name="txtarea1" id="txtarea1" cols="50" rows="7" placeholder="Address of Doctor" class="form-control1" required=""></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Contact No.</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control1" id="focusedinput" name="dnum" placeholder="Contact Of Doctor" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">DOB</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control1" id="focusedinput" name="ddob" placeholder="DOB Of Doctor" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Degree</label>
                    <div class="col-sm-8">
                      <select name="deg" id="selector1" class="form-control1" required="">
                        <option value="-1">Select Degree</option>
                        <?php 
                        while($row=$result->fetch_assoc())
                        {?>
                          <option value="<?php echo $row['deg_id'];?>"><?php echo $row['deg_name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control1" id="focusedinput" name="demail" placeholder="Email of Doctor" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control1" id="focusedinput" name="dpwd" placeholder="Enter Password" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-8">
                      <select name="doc_status" id="selector1" class="form-control1"s>
                        <option value="-1">Select Status</option>
                        <option value="1">Verified</option>
                        <option value="0">Unverified</option>    
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                      <!-- <button class="btn-success btn">Submit</button> -->
                      <input type="submit" name="add_doc" value="Add Doctor" class="btn-success btn" required="">
                    </div>
                  </div>
                </div> 
                <?php include 'extra/footer.php';?>           
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