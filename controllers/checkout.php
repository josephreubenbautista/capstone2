<?php
	session_start();
	require "../connection.php";

	$address = $_POST['address'];
	$transaction_code=$_POST['transactioncode'];
	$contact_number='';
	if(isset($_POST['contactnumber'])){
		$contact_number=$_POST['contactnumber'];
	}

	$payment_method = $_POST['paymentmethod'];

	$user_id = $_POST['userid'];


	$sql = "INSERT INTO orders (transaction_code, address, contact_number, user_id, payment_method_id) VALUES ('$transaction_code', '$address', '$contact_number', $user_id, $payment_method)";
	$result=mysqli_query($conn, $sql);

	

	if($result==1){
		$order_id = mysqli_insert_id($conn);
		foreach ($_SESSION['cart'] as $id => $quantity) {
			$sql1 = "INSERT INTO order_details (quantity, product_id, order_id) VALUES ($quantity, $id, $order_id)";
			$result1=mysqli_query($conn, $sql1);
		}

	
		$_SESSION['success_message'] = "Thank you for your trust in us. We will deliver your product within 7 days.";

		unset($_SESSION['cart']);
		unset($_SESSION['item-quantity']);
	
	}else{
		$_SESSION['error_message'] = "There is an Error in Checkout";
	
	}

	header('location: ../index.php');

 ?>