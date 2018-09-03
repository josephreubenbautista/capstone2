<?php 

	session_start();
	require "../connection.php";



	$id = $_POST['id'];
	unset($_SESSION['cart'][$id]);

	$quantity = 0;
	foreach ($_SESSION['cart'] as $qty) {
		$quantity+=$qty;
	}

	// echo $quantity."<br>";

	$_SESSION['item-quantity'] = $quantity;


	

	// var_dump($product);
	// echo $id;	

	// echo json_encode($product);

	echo $quantity;



	

 ?>