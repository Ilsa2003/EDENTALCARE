<?php
$servername="localhost";
$username="root";
$password="";
$dbname="dentist";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
	die("Connection errror".$conn->connect_error);
}

date_default_timezone_set('Asia/Kolkata');
$now1=date("Y-m-d");
?>