<?php 
include '../extra/conn.php';
session_start();

// Status Update

//doctor
if(isset($_GET['dsdid']))
{
	$doc=$_GET['dsdid'];
	$sql="UPDATE `doctor_info` SET `d_status`='1' WHERE d_id='$doc'";
	if($conn->query($sql)=== TRUE)
	{
		header('Location:doctor_list.php?msg=Doctor`s Status Updated!!');
	}
	else
	{
		header('Location:doctor_list.php?msg=Error Updating Doctor`s Status!!');
	}
}
if(isset($_GET['dhdid']))
{
	$doc=$_GET['dhdid'];
	$sql="UPDATE `doctor_info` SET `d_status`='0' WHERE d_id='$doc'";
	if($conn->query($sql)=== TRUE)
	{
		header('Location:doctor_list.php?msg=Doctor`s Status Updated!!');
	}
	else
	{
		header('Location:doctor_list.php?msg=Error Updating Doctor`s Status!!');
	}
}

//degree
if(isset($_GET['sdid']))
{
	$degree=$_GET['sdid'];
	$sql="UPDATE `deg` SET `deg_status`='1' WHERE deg_id='$degree'";
	if($conn->query($sql)=== TRUE)
	{
		header('Location:deg_list.php?msg=Degree`s Status Updated!!');
	}
	else
	{
		header('Location:deg_list.php?msg=Error Updating Degree`s Status!!');
	}
}
if(isset($_GET['hdid']))
{
	$degree=$_GET['hdid'];
	$sql="UPDATE `deg` SET `deg_status`='0' WHERE deg_id='$degree'";
	if($conn->query($sql)=== TRUE)
	{
		header('Location:deg_list.php?msg=Degree`s Status Updated!!');
	}
	else
	{
		header('Location:deg_list.php?msg=Error Updating Degree`s Status!!');
	}
}



//dental_tips
if(isset($_GET['sdtid']))
{
	$dtips=$_GET['sdtid'];
	$sql="UPDATE `dentist_tips` SET `t_status`='1' WHERE d_t_id='$dtips'";
	if($conn->query($sql)=== TRUE)
	{
		// $_SESSION['tstatus']=$dtips;
		header('Location:dtips_list.php?msg=Dental tips Status Updated!!');
	}
	else
	{
		header('Location:dtips_list.php?msg=Error Updating Dental tips Status!!');
	}
}
if(isset($_GET['hdtid']))
{
	$dtips=$_GET['hdtid'];
	$sql="UPDATE `dentist_tips` SET `t_status`='0' WHERE d_t_id='$dtips'";
	if($conn->query($sql)=== TRUE)
	{
		header('Location:dtips_list.php?msg=Dental tips Status Updated!!');
	}
	else
	{
		header('Location:dtips_list.php?msg=Error Updating Dental tips Status!!');
	}
}


//blog
if(isset($_GET['blsdid']))
{
	$blog=$_GET['blsdid'];
	$sql="UPDATE `blog` SET `blog_status`='1' WHERE `blog_id`='$blog'";
	if ($conn->query($sql)== TRUE) 
	{
		header('Location:blog_list.php?msg=Blog Status Updated!!');

	}
	else
	{
		header('Location:blog_list.php?msg=Error Updating Blog Status!!');
	}
}
if(isset($_GET['blhdid']))
{
	$blog=$_GET['blhdid'];
	$sql="UPDATE `blog` SET `blog_status`='0' WHERE `blog_id`='$blog'";
	if ($conn->query($sql)== TRUE) 
	{
		header('Location:blog_list.php?msg=Blog Status Updated!!');

	}
	else
	{
		header('Location:blog_list.php?msg=Error Updating Blog Status!!');
	}
}
//patient
if(isset($_GET['hp_id']))
{
	$p_id=$_GET['hp_id'];
	$sql="UPDATE `patient_login` SET `p_status`='0' WHERE `p_l_id`='$p_id'";
	if ($conn->query($sql)== TRUE) 
	{
		header('Location:patient_list.php?msg=Patient Status Updated!!');

	}
	else
	{
		header('Location:patient_list.php?msg=Error Updating Patient Status!!');
	}
}
if(isset($_GET['sp_id']))
{
	$p_id=$_GET['sp_id'];
	$sql="UPDATE `patient_login` SET `p_status`='1' WHERE `p_l_id`='$p_id'";
	if ($conn->query($sql)== TRUE) 
	{
		header('Location:patient_list.php?msg=Patient Status Updated!!');

	}
	else
	{
		header('Location:patient_list.php?msg=Error Updating Patient Status!!');
	}
}



// Delete

// degree 
if(isset($_GET['ddid']))
{
	$q=$_GET['ddid'];
	$sql="DELETE FROM `deg` WHERE deg_id='$q'";
	if($conn->query($sql) === TRUE)
	{
    	header('Location:deg_list.php?msg=Degree deleted Sucessfully');
    }
    else
    {
    	header('Location:deg_list.php?msg=Error Deleting Degree');
    }
}


// dental_tips
if(isset($_GET['tid']))
{
	$a=$_GET['tid'];
	$sql="DELETE FROM `dentist_tips` WHERE d_t_id='$a'";
    if ($conn->query($sql) === TRUE) 
    {
        header('Location:dtips_list.php?msg=Tips deleted Sucessfully');
    }
    else
    {
        header('Location:dtips_list.php?msg=Error Deleting Tips');
    }
}


//blog
if(isset($_GET['bldid']))
{
	$a=$_GET['bldid'];
	$sql="DELETE FROM `blog` WHERE blog_id='$a'";
	if($conn->query($sql)=== TRUE)
	{
		header('location:blog_list.php?msg=Blog deleted Sucessfully');
	}
	else
	{
		header('location:blog_list.php?msg=Error Deleting Blog');
	}
}

//doctor_info
if(isset($_GET['didid']))
{
	$a=$_GET['didid'];
	$sql="DELETE FROM `doctor_info` WHERE d_id='$a'";
	if($conn->query($sql)=== TRUE)
	{
		header('location:doctor_list.php?msg=Doctor Sucessfully deleted');
	}
	else
	{
		header('location:doctor_list.php?msg=Error Deleting Doctor');
	}
}

//notes
if(isset($_GET['ndid']))
{
	$q=$_GET['ndid'];
	$sql="DELETE FROM `note` WHERE note_id='$q'";
	if($conn->query($sql) === TRUE)
	{
    	header('Location:notes_list.php?msg= Notes deleted Sucessfully');
    }
    else
    {
    	header('Location:notes_list.php?msg=Error Deleting Notes');
    }
}


//service
if(isset($_GET['sedid']))
{
	$a=$_GET['sedid'];
	$sql="DELETE FROM `service` WHERE service_id='$a'";
    if ($conn->query($sql) === TRUE) 
    {
        header('Location:service_list.php?msg=Service deleted Sucessfully');
    }
    else
    {
        header('Location:service_list.php?msg=Error Deleting Service');
    }
    
}
//patient
if(isset($_GET['dp_id']))
{
	$a=$_GET['dp_id'];
	$sql="DELETE FROM `patient` WHERE p_l_id='$a'";
    if ($conn->query($sql) === TRUE) 
    {

   $sql="DELETE FROM `patient_login` WHERE p_l_id='$a'";
   if($conn->query($sql)=== TRUE)
   {
   header('Location:patient_list.php?msg=Patient deleted Sucessfully');
   }
   else
   {
   	 header('Location:patient_list.php?msg=Error Deleting Patient');
   }

     
    }
    else
    {
        header('Location:patient_list.php?msg=Error Deleting Patient');
    }
    
}
?>