<?php
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['ueml']))
{
header('Location:index.php');
}

$ueml=$_SESSION['ueml'];
$sql="select * from patient_login,patient where patient_login.p_l_id = patient.p_l_id and   email='$ueml'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

if(isset($_POST['update_profile']))
{
    $ueml=$_SESSION['ueml'];

    $p_id=$_POST['p_id'];
    $p_name=$_POST['p_name'];
    $p_add=$_POST['p_add'];
    $height=$_POST['height'];
    $weight=$_POST['weight'];
    $b_group=$_POST['b_group'];
    $b_pressure=$_POST['b_pressure'];

     $pulse=$_POST['pulse'];
    $respiration=$_POST['respiration'];
     $allergy=$_POST['allergy'];
    $diet=$_POST['diet'];

     $sql="UPDATE patient SET `p_name`='$p_name',`p_add`='$p_add',`height`='$height',`weight`='$weight',`b_group`='$b_group',`b_pressure`='$b_pressure',`pulse`='$pulse',`respiration`='$respiration',`allergy`='$allergy',`diet`='$diet' WHERE p_id='$p_id'";

     if($conn->query($sql)===TRUE)
{
 header('Location:edit_p_profile.php?msg=Profile Change Successfully'); 
}
else
{
 header('Location:edit_p_profile.php?msg=Profile Change Error'); 
}
    }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>E-dental | Patient Profile</title>
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
<style type="text/css">
   .user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}

</style>
<script type="text/javascript">
   $(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
        alert("This is a demo.\n :-)");
    });
});
</script>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <?php include './extra/sidebar.php';?>
        <div id="page-wrapper">
        <div class="graphs">
	   <div class="md">
		 <h3>Patient Profile</h3>
		<?php  
          if(isset($_GET['msg']))
          {
            echo "<h5 style='color:red;'>".$_GET['msg']."</h5>";
          }

          ?>
		<div class="container">
      <div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $row['p_name'];?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="images/1.png" class="img-circle img-responsive"> </div>
                <form action="" method="post" class="form-horizontal">
              
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                        <input type="hidden" name="p_id"  value="<?php echo $row['p_id'];?>" >
                      <tr>
                        <td>Name:</td>
                        <td><input type="text" name="p_name" placeholder="Enter Pateint Name" class="form-control1" value="<?php echo $row['p_name'];?>" required></td>
                      </tr>
                      <tr>
                        <td>Address:</td>
                        <td><input type="text" name="p_add" placeholder="Enter Pateint Address" class="form-control1" value="<?php echo $row['p_add'];?>" required></td>
                      </tr>
                     
                   
                      <tr>
                        <td>Height</td>
                        <td><input type="text" name="height" placeholder="Enter Pateint Height in CM" class="form-control1" value="<?php echo $row['height'];?>" required></td>
                      </tr>
                        <tr>
                        <td>Weight</td>
                        <td><input type="text" name="weight" placeholder="Enter Pateint Weight in KG" class="form-control1" value="<?php echo $row['weight'];?>" required></td>
                      </tr>
                      <tr>
                        <td>Blood Group</td>
                        <td><input type="text" name="b_group" placeholder="Enter Pateint Blood Group" class="form-control1" value="<?php echo $row['b_group'];?>" required></td>

                      </tr>
                      <tr>
                        <td>Blood Pressure</td>
                        <td><input type="text" name="b_pressure" placeholder="Enter Pateint Blood Pressure" class="form-control1" value="<?php echo $row['b_pressure'];?>" required>
                           </td>
                           
                      </tr>
                        <tr>
                        <td>Pulse</td>
                        <td><input type="text" name="pulse" placeholder="Enter Pateint  Pulse" class="form-control1" value="<?php echo $row['pulse'];?>" required>
                           </td>
                           
                      </tr>
                       <tr>
                        <td>Respiration</td>
                        <td><input type="text" name="respiration" placeholder="Enter Pateint  Respiration" class="form-control1" value="<?php echo $row['respiration'];?>" required>
                           </td>
                           
                      </tr>
                       <tr>
                        <td>Allergy</td>
                        <td><input type="text" name="allergy" placeholder="Enter Pateint  allergy" class="form-control1" value="<?php echo $row['allergy'];?>" required></td>
                           
                      </tr>
                       <tr>
                        <td>Diet</td>
                        <td><input type="text" name="diet" placeholder="Enter Pateint Diet" class="form-control1" value="<?php echo $row['diet'];?>" required>
                        </td>
                           
                      </tr>
                      <tr>
                        <td>
                     <input type="submit" name="update_profile" value="Update Profile" class="btn-success btn">
                 </td>
                    </tr>
                    </tbody>
                  </table>
                  
               <!--    <a href="#" class="btn btn-primary">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a> -->
                </div>
            </form>
              </div>
            </div>
               <!--   <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div> -->
            
          </div>
        </div>
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
