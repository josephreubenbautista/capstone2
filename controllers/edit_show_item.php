<?php 

	require "../connection.php";

	$id = $_POST['id'];

	// $username = 'h';
	$sql = "SELECT * FROM products WHERE id = $id";

	$result = mysqli_query($conn, $sql);
	// var_dump($result);

	$product = [];

	while ($row = mysqli_fetch_assoc($result)){
		array_push($product,$row);
	}

	// var_dump($product);
	// echo $id;	

	echo json_encode($product);


 ?>