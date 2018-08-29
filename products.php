<?php 
	session_start();
	
	function get_title(){
		echo "Jcube Basketball | Products";
	}

	function get_content_user(){
		require "connection.php";
?>
		<h2>Products</h2>
		<div class="row">
<?php

		$sql = "SELECT * FROM products";
		$result = mysqli_query($conn, $sql);
		foreach ($result as $row) {
			extract($row);
			$sql1 = "SELECT* from categories WHERE id = $category_id";
			$result1 = mysqli_query($conn, $sql1);
?>
	
		
			<div class="card col-4" style="width:300px">
				<img class="card-img-top" src="<?php echo $image_path; ?>" alt="Card image" style="width:100%; height: 400px;">
				<div class="card-body">
					<h4 class="card-title"><?php echo $name; ?></h4>
					<h6 ><?php echo $price; ?></h6>
					<p class="card-text">
				<?php 
						foreach ($result1 as $row1) {
						 	echo $row1['name'];
						 } 
				?>
						
					</p>
					<p class="card-text"><?php echo $description; ?></p>
					<form method="POST" action="controllers/add_to_cart.php?id=<?php echo $productid; ?>">
						<input type="number" min="1" name="quantity" id="itemquantity<?php echo $id; ?>">
						<button class="btn btn-success" onclick="addToCart(<?php echo $id; ?>)" type="button">Add To Cart</button>
					</form>
					<span id="successMessage<?php echo $id;  ?>"></span>
				</div>
			</div>

<?php
		}

?>
		</div>
		
		<script src="assets/js/script.js"></script>



<?php
	} 
	// end content user

	function get_content_admin() {

?>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>

		
		<h2>Products</h2>
		<div class="card col-3">
			<form enctype="multipart/form-data" action="controllers/add_item.php" method="POST">
				<div class="form-group">
					<label>Product Name:</label>
					<input type="text" name="productname">
				</div>
				<div class="form-group">
					<label>Product Categories:</label>
					<select name="productcategories">
						<option>(select category)</option>
						<?php 
							require "connection.php";
							$sql = "SELECT * FROM categories";
							$result=mysqli_query($conn, $sql);
							foreach($result as $row){
								extract($row);
						?>
								<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
						<?php
							}
						 ?>
					</select>
				</div>
				<div class="form-group">
					<label>Product Price:</label>
					<input type="text" name="productprice">
				</div>
				<div class="form-group">
					<label>Product Description:</label>
					<textarea name="productdescription"></textarea>
				</div>
				<div class="form-group">
					<label>Product Image:</label>
					<input type="file" name="productimage">
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Submit</button>
				</div>
					



			</form>
		</div>
		


<?php

	}
	// end content admin






	require_once "partials/template.php";

 ?>