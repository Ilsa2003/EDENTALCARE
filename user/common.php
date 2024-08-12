<?php 
include '../extra/conn.php';
session_start();

// Status Update

//appointment
if(isset($_GET['capid']))
{
	$d=$_GET['capid'];
	$sql="UPDATE `appointment` SET `b_status`='3' WHERE appointment_id='$d'";
	if($conn->query($sql)=== TRUE)
	{
		header('Location:appt_list.php?msg=Status Updated');
	}
	else
	{
		header('Location:appt_list.php?msg=Error Updating Status');
	}
}
?>