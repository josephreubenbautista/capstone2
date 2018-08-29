<?php


	require "../connection.php";

	$itemname = $_POST['productname'];
	$itemcategory = $_POST['productcategories'];
	$itemprice = $_POST['productprice'];
	$itemdesc = $_POST['productdescription'];
	$itemimage = "assets/images/".uniqid().sha1($itemname).$_FILES['productimage']['name'];

	

	// move_uploaded_file($_FILES['image']['tmp_name'], '../assets/images/'.$_FILES['image']['name']);

	move_uploaded_file($_FILES['productimage']['tmp_name'], '../'.$itemimage);

	$sql = "INSERT INTO products (name,description,price,category_id,image_path) VALUES ('$itemname', '$itemdesc', $itemprice, $itemcategory, '$itemimage')";
	mysqli_query($conn, $sql) or die(mysqli_error($conn));



	header('location: '.$_SERVER['HTTP_REFERER']);

?>