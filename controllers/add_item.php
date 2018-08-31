<?php

	session_start();
	require "../connection.php";

	$itemname = $_POST['productname'];
	$itemcategory = $_POST['productcategories'];
	$itemprice = $_POST['productprice'];
	$itemdesc = $_POST['productdescription'];
	$itemimage = "assets/images/".uniqid().sha1($itemname).$_FILES['productimage']['name'];

	

	// move_uploaded_file($_FILES['image']['tmp_name'], '../assets/images/'.$_FILES['image']['name']);

	move_uploaded_file($_FILES['productimage']['tmp_name'], '../'.$itemimage);

	$sql = "INSERT INTO products (name,description,price,category_id,image_path) VALUES ('$itemname', '$itemdesc', $itemprice, $itemcategory, '$itemimage')";
	 $result=mysqli_query($conn, $sql);

	 if($result==1){
	 	$_SESSION['success_message'] = "$itemname Has been added.";
	 }else{
	 	$_SESSION['error_message'] = "The product you are trying to add is already in the database. The same name is not allowed.";
	 }




	



	header('location: '.$_SERVER['HTTP_REFERER']);

?>

