<?php
	session_start();
	require "../connection.php";
	$transaction_code = $_POST['code'];


	$sql = "SELECT * FROM order_details WHERE order_id = (SELECT id FROM orders WHERE transaction_code = '$transaction_code')";

	$result = mysqli_query($conn, $sql);
	// var_dump($result);

	$products = [];
	$quantities = [];

	while ($row = mysqli_fetch_assoc($result)){
		$prodid = $row['product_id'];
		$quantity = $row['quantity'];
		// echo $row['product_id'];
		$productsql = "SELECT id, name, image_path FROM products WHERE id = $prodid";
		$productresult = mysqli_query($conn, $productsql);
		while ($product = mysqli_fetch_assoc($productresult)){
			array_push($products,$product);
		}


		array_push($quantities,$quantity);

	}



	// var_dump($quantities);
	// echo $id;	

	// echo json_encode($product);

	echo json_encode(['quantity'=>$quantities,'product'=>$products]);

 ?>

