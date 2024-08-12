<?php
include '../extra/conn.php';
session_start();
if(!isset($_SESSION['demail']))
{
  header('Location:dashboard.php');
}

if(!isset($_GET['a_id']) && !isset($_GET['p_id']))
{
    header('Location:view_detail_user.php');
}

 $a_id=$_GET['a_id'];
 $p_id=$_GET['p_id'];

$did=$_SESSION['did'];


if(isset($_POST['add_invoice']))    
{
     $p_id=$_POST['p_id'];
     $a_id=$_POST['a_id'];
    $did=$_SESSION['did'];
    $payment_mode=$_POST['payment_mode'];
    $invoice_title=$_POST['invoice_title'];
    $invoice_amount=$_POST['invoice_amount'];
    $invoice_date=$_POST['invoice_date'];
    date_default_timezone_set('Asia/Kolkata');
    $now=date("Y-m-d");

    $sql="INSERT INTO `invoice`(`patient_id`, `a_id`, `d_id`, `payment_mode`, `payment_status`, `invoice_title`, `invoice_amount`, `invoice_date`) VALUES ('$p_id','$a_id','$did','$payment_mode','1','$invoice_title','$invoice_amount','$invoice_date')";
    if ($conn->query($sql) === TRUE) 
    {
     header("Location:view_detail_user.php?apid=$a_id & msg=Invoice Add Successfully..");

    }
    else
    {
        header('Location:view_detail_user.php?msg=Error Adding Invoice..');
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>E-dental | Add Invoice</title>

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
		 <h3>Add Precipitation</h3>
		  <div class="tab-content">
            <div class="tab-pane active" id="horizontal-form">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Invoice Title:</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="a_id" value="<?php echo $_GET['a_id'] ;?>">
                            <input type="hidden" name="p_id" value="<?php echo $_GET['p_id'] ;?>">
                   
                    <input type="text" name="invoice_title" placeholder="Enter Invoice Title" class="form-control1" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Invoice Amount:</label>
                        <div class="col-sm-8">
                              <input type="number" name="invoice_amount" placeholder="Enter Invoice Amount" class="form-control1" required>
                        
                        </div>
                    </div>
                     
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Invoice Date:</label>
                        <div class="col-sm-8">
                        <input type="date" name="invoice_date" placeholder="Enter Invoice Date" class="form-control1" required>
                        </div>
                    </div>

                      <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Payment Mode:</label>
                        <div class="col-sm-8">
                          <select name="payment_mode" id="payment_mode" class="form-control1" required="">
                                <option value="select">Select Payment Mode</option>
                                <option value="Cash">Cash</option>
                                <option value="Google Pay">Google Pay</option>
                                <option value="online">Online</option>
                            </select>

                        </div>
                    </div>

                                 

                   
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                    <input type="submit" name="add_invoice" value="Add Invoice" class="btn-success btn">
                        </div>
                    </div>
                </form>
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
