<?php
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['demail']))
{
header('Location:index.php');
}
if(!isset($_GET['apid']))
{
    header('Location:appt_list.php');
}
$a_id=$_GET['apid'];
$did=$_SESSION['did'];

$sql="SELECT * FROM appointment,patient where patient.p_id=appointment.patient_id and  appointment_id='$a_id' ";

$result=$conn->query($sql);
$row=$result->fetch_assoc();

// preciption detail
$pre_sql="select * from prescription where a_id='$a_id'";
$pre_result=$conn->query($pre_sql);

// Invoice
$in_sql="select * from invoice where a_id='$a_id'";
$in_result=$conn->query($in_sql);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>E-dental | Appointment Patient Profile</title>
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
         <h3>Appointment Patient Profile</h3>
        <p style="color: green;"><?php if (isset($_GET['msg'])) {
            echo $_GET['msg'];
        }
        ?></p>
        <div class="container">
      <div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $row['p_name'];?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-4 col-lg-4" align="center"> <img alt="User Pic" src="images/1.png" class="img-circle img-responsive">
                <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><b>Appointment Status:</b></td>
                        <td><b><?php if($row['b_status']==0) 
                   {
                  echo "<p style='color:#7c7c1e;'><b>Pending</b></p>";

                  }
                  else if ($row['b_status']==1) {
                    echo "<p style='color:green;'><b>Approve</b></p>";
                  }
                   else if ($row['b_status']==2) {
                    echo "<p style='color:red;'><b>Cancel By Doctor</b></p>";
                  }
                   else if ($row['b_status']==3) {
                    echo "<p style='color:red;'><b>Cancel By User</b></p>";
                  }
                 else 
                 {
                   echo "<p style='color:green;'><b>Complete</b></p>";
                 } 
               ?></b></td>
                      </tr>
                      <tr>
                        <td><b>Appointment Date:</b></td>
                        <td><b><?php echo $row['b_date'];?></b></td>
                    </tr>
                    <tr>
                        <td><b>Appointment Time:</b></td>
                        <td><b><?php echo $row['b_time'];?></b></td>
                    </tr>
                   

                  </tbody>
              </table>
              <a href="add_precipitation.php?a_id=<?php echo $a_id;?> &p_id=<?php echo $row['patient_id'];?>" class="btn-success btn">Add Precipitation</a>
              <a href="add_invoice.php?a_id=<?php echo $a_id;?>&p_id=<?php echo $row['patient_id'];?>" class="btn-success btn">Add Invoice</a>
                 </div>
                
              
                <div class=" col-md-8 col-lg-8"> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>DOB:</td>
                        <td><?php echo $row['dob'];?></td>
                      </tr>
                      <tr>
                        <td>Address:</td>
                        <td><?php echo $row['p_add'];?></td>
                      </tr>
                     
                      <tr>
                        <td>Gender</td>
                        <td><?php echo $row['gender'];?></td>
                      </tr>
                        <tr>
                        <td>Phone</td>
                        <td><?php echo $row['phone'];?></td>
                      </tr>
                      <tr>
                        <td>Height/Weight</td>
                        <td><?php echo $row['height'];?>/<?php echo $row['weight'];?></td>

                      </tr>
                      <tr>
                        <td>Blood Group/ Blood Pressure</td>
                        <td><?php echo $row['b_group'];?>/<?php echo $row['b_pressure'];?></td>
                           
                      </tr>

                       <tr>
                        <td>Pulse/ Respiration</td>
                        <td><?php echo $row['pulse'];?>/<?php echo $row['respiration'];?></td>
                           
                      </tr>
                       <tr>
                        <td>Allergy</td>
                        <td><?php echo $row['allergy'];?></td>
                           
                      </tr>
                       <tr>
                        <td>Diet</td>
                        <td><?php echo $row['diet'];?></td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                
                  
                </div>
              </div>
            </div>
                 
            
          </div>
        </div>
      </div>
      <div class="row">
      <div class="md col-md-10">
         <h3>Precipitation Detail</h3>
        <table border="2" class="table">
         <tr>
            <td><b>No</b></td>
            <td><b>Symptoms</b></td>
            <td><b>Diagnosis</b></td>
            <td><b>Medicine</b></td>
            <td><b>Medicine Note</b></td>
            <td><b>Test</b></td>
            <td><b>Test Note</b></td>
            <td><b>Action</b></td>
         </tr>
         <?php
             $a=1;
         while($row=$pre_result->fetch_assoc())
         {
            ?>
            <tr>
               <td><?php echo $a;?></td>
               <td><?php echo $row['symptoms'];?></td>
               <td><?php echo $row['diagnosis'];?></td> 
               <td><?php echo $row['medicine'];?></td> 
               <td><?php echo $row['m_note'];?></td> 
               
                <td><?php echo $row['test'];?></td>
               <td> <?php echo $row['t_note'];?></td>
               <td><a href="common.php?dpreid=<?php echo $row['prescription_id'];?>">Delete</a> </td>
            </tr>
               <?php 
               $a++;
            }?>
         </table>
        </div>  

        <div class="md col-md-10">
         <h3>Invoice Detail</h3>
        <table border="2" class="table">
         <tr>
            <td><b>No</b></td>
            <td><b>Invoice title</b></td>
            <td><b>Invoice amount</b></td>
            <td><b>Invoice date</b></td>
            <td><b>Payment mode</b></td>
            <td><b>Action</b></td>
         </tr>
         <?php
             $a=1;
         while($row=$in_result->fetch_assoc())
         {
            ?>
            <tr>
               <td><?php echo $a;?></td>
               <td><?php echo $row['invoice_title'];?></td>
               <td><?php echo $row['invoice_amount'];?></td> 
               <td><?php echo $row['invoice_date'];?></td> 
               <td><?php echo $row['payment_mode'];?></td> 
               
               <td><a href="common.php?divid=<?php echo $row['invoice_id'];?>">Delete</a> </td>
            </tr>
               <?php 
               $a++;
            }?>
         </table>
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
