<?php
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['demail']))
{
header('Location:index.php');
}
$did=$_SESSION['did'];


$sql="SELECT * FROM appointment,patient where patient.p_id=appointment.patient_id and d_id='$did'";
$result =$conn->query($sql);
$result->num_rows;
?>
<!DOCTYPE HTML>
<html>
<head>
<title>E-dental | Appointment List</title>
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
        <div class="row">
            <div class="col-md-4">
               <h3>Appointment List</h3> 
            </div>
             <div class="col-md-6 pull-right">
               <input type="search" placeholder="Search..." class="form-control search-input" data-table="customers-list" style="border: 2px solid #000 !important;margin-bottom:10px;" />
            </div>
        </div>
        
		<table border="2" class="table customers-list">
             <thead>
         <tr>
            <td><b>No</b></td>
            <td><b>Patient Name</b></td>
            <td><b>Patient Address</b></td>
            <td><b>Patient Contact</b></td>
            <td><b>Appionment Date & Time</b></td>
            <td><b>Appionment Status</b></td>
            <td><b>Action</b></td>
         </tr>
     </thead>
     <tbody>
         <?php
             $a=1;
         while($row=$result->fetch_assoc())
         {
            ?>
            <tr>
               <td><?php echo $a;?></td>
               <td><?php echo $row['p_name'];?></td>
               <td><?php echo $row['p_add'];?></td> 
               <td><?php echo $row['phone'];?></td> 
               <td><?php echo $row['b_date']." ".$row['b_time'];?></td> 
               
                <td><?php if($row['b_status']==0) 
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
               ?></td>
               <td>
                <?php 
                if($row['b_status']==0)
                {
                ?>
                 <a href="view_detail_user.php?apid=<?php echo $row['appointment_id'];?>"> View </a>|
                <a href="common.php?aapid=<?php echo $row['appointment_id'];?>"> Approve </a>
                | <a href="common.php?capid=<?php echo $row['appointment_id'];?>"> Cancel </a>
                | <a href="common.php?ccapid=<?php echo $row['appointment_id'];?>"> Complete </a>
              <?php } else if($row['b_status']==1) 
              {
                ?>
              <a href="view_detail_user.php?apid=<?php echo $row['appointment_id'];?>"> View </a> |
              <a href="common.php?ccapid=<?php echo $row['appointment_id'];?>"> Complete </a>
            <?php } else if($row['b_status']==4) 
              {
                ?>
                <a href="view_detail_user.php?apid=<?php echo $row['appointment_id'];?>"> View </a> |
              <a href="bk_on_consl.php?bkcid=<?php echo $row['patient_id'];?>"> Consulation </a>

              <?php } else{ ?>
                <a href="view_detail_user.php?apid=<?php echo $row['appointment_id'];?>"> View </a>
            <?php }?>
        </td>
            </tr>
               <?php 
               $a++;
            }?>
        </tbody>
         </table>
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
<script>
        (function(document) {
            'use strict';

            var TableFilter = (function(myArray) {
                var search_input;

                function _onInputSearch(e) {
                    search_input = e.target;
                    var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
                    myArray.forEach.call(tables, function(table) {
                        myArray.forEach.call(table.tBodies, function(tbody) {
                            myArray.forEach.call(tbody.rows, function(row) {
                                var text_content = row.textContent.toLowerCase();
                                var search_val = search_input.value.toLowerCase();
                                row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
                            });
                        });
                    });
                }

                return {
                    init: function() {
                        var inputs = document.getElementsByClassName('search-input');
                        myArray.forEach.call(inputs, function(input) {
                            input.oninput = _onInputSearch;
                        });
                    }
                };
            })(Array.prototype);

            document.addEventListener('readystatechange', function() {
                if (document.readyState === 'complete') {
                    TableFilter.init();
                }
            });

        })(document);
    </script>
<script src="../aassets/js/metisMenu.min.js"></script>
<script src="../aassets/js/custom.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../aassets/js/bootstrap.min.js"></script>
</body>
</html>
