<?php 

	require "../connection.php";
	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	$firstname = $_POST['firstName'];
	$lastname = $_POST['lastName'];
	$email = $_POST['email'];
	$contact = $_POST['contactNumber'];
	$address = $_POST['address'];


	$sql = "INSERT INTO users (username, password, first_name, last_name, email, contact_number, address) VALUES ('$username', '$password', '$firstname', '$lastname', '$email', '$contact', '$address')";

	$execute=mysqli_query($conn, $sql);

	if ($execute == 1) {
		echo "Register Successful";
	}else{
		echo "Register Unsuccessful";
	}


 ?>