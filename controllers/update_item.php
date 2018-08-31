<?php

	session_start();
	require "../connection.php";


	$itemid = $_POST['id'];
	$itemname = $_POST['productname'];
	$itemcategory = $_POST['productcategories'];
	$itemprice = $_POST['productprice'];
	$itemdesc = $_POST['productdescription'];
	
	$result=0;
	
	if (($_FILES['productimage']['name'])){

		// var_dump($_FILES['productimage']['name']);

		$imagesql = "SELECT image_path FROM products WHERE id = $itemid";
		$imageresult = mysqli_query($conn, $imagesql);
		$image='';
		foreach ($imageresult as $row) {
			extract($row);
			$image = "../".$image_path;
		}
		unlink($image);

		$itemimage = "assets/images/".uniqid().sha1($itemname).$_FILES['productimage']['name'];

		move_uploaded_file($_FILES['productimage']['tmp_name'], '../'.$itemimage);

		$sql = "UPDATE products
			SET name = '$itemname',
				category_id = $itemcategory,
				price = $itemprice,
				description = '$itemdesc',
				image_path = '$itemimage'
			WHERE id = $itemid";

		$result=mysqli_query($conn, $sql);

		
	

	}else{

		$sql = "UPDATE products
			SET name = '$itemname',
				category_id = $itemcategory,
				price = $itemprice,
				description = '$itemdesc'
			WHERE id = $itemid";
		$result=mysqli_query($conn, $sql);

	}
	

	
	if($result==1){
		$_SESSION['success_message'] = "$itemname successfully updated";
		
	}else{
		$_SESSION['error_message'] = "$itemname update unsuccessful";
	}







	



	header('location: '.$_SERVER['HTTP_REFERER']);

?>

