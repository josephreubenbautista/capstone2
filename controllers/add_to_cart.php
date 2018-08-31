<?php
	session_start();
	require "../connection.php";
	$id = $_POST['id'];
	$quantity = 0;
	if(isset($_SESSION['cart'][$id])) {
		$_SESSION['cart'][$id] += $_POST['quantity'];
	} else {
		$_SESSION['cart'][$id] = $_POST['quantity'];
	}
	
	foreach ($_SESSION['cart'] as $qty) {
		$quantity+=$qty;
	}

	// echo $quantity."<br>";

	$_SESSION['item-quantity'] = $quantity;

	$sql = "SELECT * FROM products WHERE id = $id";

	$result = mysqli_query($conn, $sql);
	// var_dump($result);

	$product = [];

	while ($row = mysqli_fetch_assoc($result)){
		array_push($product,$row);
	}

	// var_dump($product);
	// echo $id;	

	// echo json_encode($product);

	echo json_encode(['quantity'=>$quantity,'product'=>$product]);

 ?>