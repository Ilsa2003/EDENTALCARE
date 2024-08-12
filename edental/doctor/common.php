<?php 
include '../extra/conn.php';
session_start();

// Status Update

//appointment
if(isset($_GET['capid']))
{
	$d=$_GET['capid'];
	$sql="UPDATE `appointment` SET `b_status`='2' WHERE appointment_id='$d'";
	if($conn->query($sql)=== TRUE)
	{
		// mail(to, subject, message)
		header('Location:appt_list.php?msg=Status Updated');
	}
	else
	{
		header('Location:appt_list.php?msg=Error Updating Status');
	}
}
if(isset($_GET['aapid']))
{
	$d=$_GET['aapid'];
	$sql="UPDATE `appointment` SET `b_status`='1' WHERE appointment_id='$d'";


	if($conn->query($sql)=== TRUE)
	{

		// mail(to, subject, message)
		header('Location:appt_list.php?msg=Status Updated');
	}
	else
	{
		header('Location:appt_list.php?msg=Error Updating Status');
	}
}
if(isset($_GET['ccapid']))
{
	$d=$_GET['ccapid'];
	$sql="UPDATE `appointment` SET `b_status`='4' WHERE appointment_id='$d'";
	if($conn->query($sql)=== TRUE)
	{
		// mail(to, subject, message)
		header('Location:appt_list.php?msg=Status Updated');
	}
	else
	{
		header('Location:appt_list.php?msg=Error Updating Status');
	}
}


if(isset($_GET['ccnid']))
{
	$d=$_GET['ccnid'];
	$sql="UPDATE `online_consultation` SET `o_c_status`='2' WHERE o_c_id='$d'";
	if($conn->query($sql)=== TRUE)
	{
		// mail(to, subject, message)
		header('Location:cons_list.php?msg=Status Updated');
	}
	else
	{
		header('Location:cons_list.php?msg=Error Updating Status');
	}
}
if(isset($_GET['cccnid']))
{
	$d=$_GET['cccnid'];
	$sql="UPDATE `online_consultation` SET `o_c_status`='3' WHERE o_c_id='$d'";
	if($conn->query($sql)=== TRUE)
	{
		// mail(to, subject, message)
		header('Location:cons_list.php?msg=Status Updated');
	}
	else
	{
		header('Location:cons_list.php?msg=Error Updating Status');
	}
}


//prec delete
if(isset($_GET['dpreid']))
{
	$d=$_GET['dpreid'];
	$sql="DELETE FROM prescription WHERE prescription_id='$d'";
	if($conn->query($sql)=== TRUE)
	{
		// mail(to, subject, message)
		header('Location:view_detail_user.php?msg=Prescription Deleted');
	}
	else
	{
		header('Location:view_detail_user.php?msg=Error in Deleting Prescription');
	}
}
// invoice
if(isset($_GET['divid']))
{
	$d=$_GET['divid'];
	echo $sql="DELETE FROM invoice WHERE invoice_id ='$d'";
	if($conn->query($sql)=== TRUE)
	{
		header('Location:view_detail_user.php?msg=Invoice Deleted Successfully');
	}
	else
	{
		header('Location:view_detail_user.php?msg=Error Invoice Delete');
	}
}
?>