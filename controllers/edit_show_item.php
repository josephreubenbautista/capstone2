<?php 

	require "../connection.php";

	$id = $_POST['id'];

	// $username = 'h';
	$sql = "SELECT p.name AS name, p.image_path AS image, c.name AS category FROM products AS p JOIN categories AS c ON (p.category_id=c.id) WHERE p.id = $id";

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