<?php
$target_dir="upload/";
$target_file=$target_dir.basename($_FILES["FiletoUpload"]["name"]);
$uploadOk=1;
$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (isset($_POST['submit']))
{
	$check=getimagesize($_FILES["FiletoUpload"]["tmp_name"]);
	if($check!==false)
	{
		echo 'file is an image - '.$check["mime"].".";
		$uploadOk=1;	
	}
	else
	{
		echo "file is not an image.";
		$uploadOk=0;
	}
}
if (file_exists($target_file))
{
	echo "Sorry,file alreaddy exists.";
	$uploadOk=0;
}
if($_FILES['FiletoUpload']["size"]>500000)
{
	echo "Sorry, file is too larg`e.";
	$uploadOk=0;
}
if ($imageFileType !="jpg" && $imageFileType="png" && $imageFileType="jpeg" && $imageFileType="gif")
{
	echo "Sorry, only jpg, png, jpeg, gif are allowed";
	$uploadOk=0;
}
if ($uploadOk==0)
{
	echo "Sorry, your file was not uploaded";
}
else
{
	if(move_uploaded_file($_FILES["FiletoUpload"]["tmp_name"], $target_file))
	{
		echo "The file".htmlspecialchars(basename($_FILES["FiletoUpload"]["name"])). "has been uploaded.";
	}
	else
	{
		echo "Sorry, there was an error uploading your file.";
	}
}
?>