<?php
	session_start();
	require "../connection.php";


	$status = $_POST['statusid'];
	$id = $_POST['id'];

	$sql = "UPDATE orders
			SET status_id = '$status'
			WHERE id = $id";
	$result=mysqli_query($conn, $sql);

	
	if($result==1){
		$_SESSION['success_message'] = " Successfully updated";
		
	}else{
		$_SESSION['error_message'] = "Update unsuccessful";
	}

	header('location: '.$_SERVER['HTTP_REFERER']);

?>