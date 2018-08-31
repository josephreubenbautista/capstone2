<?php 
	session_start();

	require "../connection.php";

	$id = $_POST['id'];

	$namesql="SELECT name, image_path FROM products WHERE id=$id";
	$nameresult = mysqli_query($conn, $namesql);

	$forname = '';
	$image = '';
	foreach ($nameresult as $row) {
		extract($row);
		$forname = $name;
		$image = "../".$image_path;
		
	}
	
	unlink($image);
	
	$sql = "DELETE FROM products WHERE id = $id";

	$result = mysqli_query($conn, $sql);
	

	if($result==1){
	 	$_SESSION['success_message'] = "$forname deleted successfully";
	 }else{
	 	$_SESSION['error_message'] = "$forname unsuccessfully deleted";
	 }
	
	header('location: '.$_SERVER['HTTP_REFERER']);

 ?>