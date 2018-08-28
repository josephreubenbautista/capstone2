<?php 

	require "../connection.php";

	$username = $_POST['username'];

	// $username = 'h';
	$sql = "SELECT * FROM users WHERE username = '$username'";

	$result = mysqli_query($conn, $sql);
	// var_dump($result);



	if (mysqli_num_rows($result) > 0){
		echo "1";
	}else{
		echo "0";
	}

 ?>