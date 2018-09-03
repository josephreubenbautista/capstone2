<?php

	session_start();
	require "../connection.php";


	$id = $_SESSION['logged_in_id'];
	$fname = $_POST['firstName'];
	$lname = $_POST['lastName'];
	$email = $_POST['email'];
	$contact = $_POST['contactNumber'];
	$address = $_POST['address'];
	$username = $_POST['username'];
	$newpassword = sha1($_POST['newpassword']);

	$fname = $_POST['firstName'];
	

	$sql = "UPDATE users
			SET first_name = '$fname',
				last_name = '$lname',
				email = '$email',
				contact_number = '$contact',
				address = '$address',
				username = '$username',
				password = '$newpassword'
			WHERE id = $id";
	$result=mysqli_query($conn, $sql);

	
	

	
	if($result==1){
		$_SESSION['success_message'] = "User successfully updated";
		unset($_SESSION['logged_in_user']);
		$_SESSION['logged_in_user'] = $username;
		
	}else{
		$_SESSION['error_message'] = "User update unsuccessful";
	}




	// echo "$status <br> $id";


	



	header('location: ../index.php');

?>

