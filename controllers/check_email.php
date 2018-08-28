<?php 

	require "../connection.php";

	$email = $_POST['email'];

	// $username = 'h';
	$sql = "SELECT * FROM users_details WHERE email = '$email'";

	$result = mysqli_query($conn, $sql);
	// var_dump($result);



	if (mysqli_num_rows($result) > 0){
		echo "1";
	}else{
		echo "0";
	}

 ?>