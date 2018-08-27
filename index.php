<?php 
	require_once "partials/template_products.php";


	function get_content () {

?>
		<form enctype="multipart/form-data" action="controllers/add_item.php" method="POST">
			<div class="form-group">
				<label>Product Name:</label>
				<input type="text" name="productname">
			</div>
			<div class="form-group">
				<label>Product Categories:</label>
				<select name="productcategories">
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
				<input type="text" name="productdescription">
			</div>
			<div class="form-group">
				<label>Product Image:</label>
				<input type="file" name="productimage">
			</div>
			<div class="form-group">
				<button class="btn btn-primary">Submit</button>
			</div>
			



		</form>


<?php

	}

 ?>