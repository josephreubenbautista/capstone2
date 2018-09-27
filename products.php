<?php 
	session_start();
	if (!isset($_SESSION['logged_in_user'])) {
		header('location: index.php');
		$_SESSION['error_message'] = "Unauthorized! Please log in.";
	}
	function get_title(){
		echo "Jcube Basketball | Products";
	}

	function get_content_user(){
		require "connection.php";
?>

		<h2>Products</h2>
		<hr class="my-3">
		<div class="row" >
			<nav class="nav col-lg-12" id="sort-filter">
				<ul class="nav nav-tabs mr-auto">
					<li class="nav-item">
						<a href="#" class="nav-link colored disabled">Filter:</a>
					</li>
					<li class="nav-item">
						<a href="controllers/filter.php?filter=0" class="nav-link colored
						<?php 
							if (isset($_SESSION['filtering'])){
								$categoryid = $_SESSION['filtering'];
								if($categoryid==0){
									echo "active";
								}
							}else{
								echo "active";
							}

						 ?>

						">All</a>
					</li>
<?php
					$filter="SELECT * FROM categories";
					$categories = mysqli_query($conn, $filter);
					foreach ($categories as $category) {
						extract($category);
					

?>
					<li class="nav-item">
						<a href="controllers/filter.php?filter=<?= $id ?>" class="nav-link  colored
							<?php 
							if (isset($_SESSION['filtering'])){
								$categoryid = $_SESSION['filtering'];
								if($categoryid==$id){
									echo "active";
								}
							}

						 	?>
						"><?php echo $name; ?></a>
					</li>
<?php 

					}
 ?>

				</ul>

				<ul class="nav nav-tabs mr-auto">
					<li class="nav-item">
						<a href="#" class="nav-link colored disabled">Sort:</a>
					</li>
					<li class="nav-item">
						<a href="controllers/sort.php?sort=ASC" class="nav-link colored
						<?php 
							if (isset($_SESSION['sorting'])){
				              $sorted = $_SESSION['sorting'];
				              if($sorted =='ASC'){
				                echo "active";
				              }
				            }
             			?>
            			">Low to High</a>
					</li>
					<li class="nav-item">
						<a href="controllers/sort.php?sort=DESC" class="nav-link colored
						<?php 
							if (isset($_SESSION['sorting'])){
				              $sorted = $_SESSION['sorting'];
				              if($sorted =='DESC'){
				                echo "active";
				              }
				            }
             			?>
						">High to Low</a>
					</li>
				</ul>


			</nav>

<?php
		$filter = '';
		$sort = '';
			if (isset($_SESSION['sorting'])){
				$sorted = $_SESSION['sorting'];
				$sort = " ORDER BY price ".$sorted;
			}
						
			if (isset($_SESSION['filtering'])){
				$categoryid = $_SESSION['filtering'];
				if($categoryid==0){
					$filter='';
				}else{
					$filter=" WHERE category_id = $categoryid ";
				}
							
			}

		$sql = "SELECT * FROM products".$filter.$sort;
		$result = mysqli_query($conn, $sql);
		foreach ($result as $row) {
			extract($row);
			$sql1 = "SELECT* from categories WHERE id = $category_id";
			$result1 = mysqli_query($conn, $sql1);
?>
	
			<div class="col-lg-4 items-div">
				<div class="card items-card">
					<img class="card-img-top img-fluid img-items" src="<?php echo $image_path; ?>" alt="<?= $name ?>">
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
							<div class="input-group">
								<select class="form-control item-qty" name="quantity" id="itemquantity<?php echo $id; ?>">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									
								</select>
								<button class="btn btn-success add-to-cart-btn" type="button" data-index="<?php echo $id; ?>" data-toggle="modal" data-target="#msgBoxs">Add To Cart</button>
							</div>
						</form>
					</div>
				</div>
			</div>



<?php
		}

?>
		</div>
		
		<div class="modal" id="msgBox">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<h4 class="modal-title">Success</h4>
						<button class="close okbtn" type="button" data-dismiss="modal">X</button>
					</div>
					
						<div class="modal-body">
							<p id="msg"></p>
						</div>
						 <!-- end modal body -->

						<div class="modal-footer">
							<button class="btn btn-success okbtn" data-dismiss="modal" type="button" id="">Ok</button>
						</div>
					
				</div>
			</div>
		</div>


	<script src="assets/js/productsuser.js"></script>
<?php
	} 
	// end content user





	function get_content_admin() {
		require "connection.php";
?>
		
		<h2>Products</h2>
		<hr class="my-3">
		<div class="row">

			

		<div class="col-lg-12">
			<?php 

				if(isset($_SESSION['error_message'])){
			?>
					<div class="alert alert-danger" role="alert">
						<h4 class="alert-heading">ERROR</h4>
						<p><?php echo $_SESSION['error_message'] ?></p>

					</div>

			<?php


					unset($_SESSION['error_message']);
				}
				if(isset($_SESSION['success_message'])){
			?>
					<div class="alert alert-success" role="alert">
						<h4 class="alert-heading">SUCCESS</h4>
						<p><?php echo $_SESSION['success_message'] ?></p>

					</div>

			<?php

					unset($_SESSION['success_message']);
				}


			 ?>
		</div>

		<div class="col-lg-12 table-responsive guide card" id="product-list">
			<nav class="nav">		
				<ul class="nav nav-tabs mr-auto">
					<li class="nav-item">
						<a href="#" class="nav-link disabled colored">Filter:</a>
					</li>
					<li class="nav-item">
						<a href="controllers/filter.php?filter=0" class="colored nav-link 
						<?php 
							if (isset($_SESSION['filtering'])){
								$categoryid = $_SESSION['filtering'];
								if($categoryid==0){
									echo "active";
								}
							}else{
								echo "active";
							}

						 ?>

						">All</a>
					</li>
<?php
					$filter="SELECT * FROM categories";
					$categories = mysqli_query($conn, $filter);
					foreach ($categories as $category) {
						extract($category);
					

?>
					<li class="nav-item">
						<a href="controllers/filter.php?filter=<?= $id ?>" class="nav-link colored
							<?php 
							if (isset($_SESSION['filtering'])){
								$categoryid = $_SESSION['filtering'];
								if($categoryid==$id){
									echo "active";
								}
							}

						 	?>
						"><?php echo $name; ?></a>
					</li>
<?php 

					}
 ?>

				</ul>

				<ul class="nav nav-tabs mr-auto">
					<li class="nav-item">
						<a href="#" class="nav-link colored disabled">Sort:</a>
					</li>
					<li class="nav-item">
						<a href="controllers/sort.php?sort=ASC" class="colored nav-link 
						<?php 
							if (isset($_SESSION['sorting'])){
				              $sorted = $_SESSION['sorting'];
				              if($sorted =='ASC'){
				                echo "active";
				              }
				            }
             			?>
            			">Low to High</a>
					</li>
					<li class="nav-item">
						<a href="controllers/sort.php?sort=DESC" class="colored nav-link
						<?php 
							if (isset($_SESSION['sorting'])){
				              $sorted = $_SESSION['sorting'];
				              if($sorted =='DESC'){
				                echo "active";
				              }
				            }
             			?>
						">High to Low</a>
					</li>
				</ul>
				<button type="button" class="btn btn-success ml-auto" data-toggle="modal" data-target="#product-form">Add Item</button>
			</nav>
			
			<table class="table">
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Price</th>
						<th>Category</th>
						<th>Description</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
<?php
						$filter = '';
						$sort = '';
						if (isset($_SESSION['sorting'])){
							$sorted = $_SESSION['sorting'];
							$sort = " ORDER BY price ".$sorted;
						}
						
						if (isset($_SESSION['filtering'])){
							$categoryid = $_SESSION['filtering'];
							if($categoryid==0){
								$filter='';
							}else{
								$filter=" WHERE category_id = $categoryid ";
							}
							
							
						}
						$sql = "SELECT * FROM products".$filter.$sort;
						$result = mysqli_query($conn, $sql);
						foreach ($result as $row) {
							extract($row);
							$sql1 = "SELECT* from categories WHERE id = $category_id";
							$result1 = mysqli_query($conn, $sql1);

?>	
							<tr>
								<td><?php echo $name;?></td>
								<td><?php echo $price;?></td>
								<td><?php 
									foreach ($result1 as $row1) {
								 		echo $row1['name'];
								 	} 
								 	?>						 	
								 </td>
								<td><?php echo $description;?></td>
								<td><img src="<?= $image_path ?>" class="img-fluid product-image" alt="<?= $name ?>"></td>
								<td class="btn-group">
									<button type="button" class="btn btn-primary edit-btn" data-index="<?= $id ?>" data-toggle="modal" data-target="#edit-item">Edit</button>
									<button type="button" class="btn btn-danger delete-btn" data-index="<?= $id ?>" data-toggle="modal" data-target="#delete-item">Delete</button>
								</td>
							</tr>
<?php 
						}
 ?>
					</tbody>
				</table>


			</div> <!-- end div for product list -->

		</div> <!-- end div for row -->


		<div class="modal" id="delete-item">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<h4 class="modal-title">ALERT</h4>
						<button class="close" type="button" data-dismiss="modal">X</button>
					</div>
					<div class="modal-body">
							
						<p id="modal-msg">
							Are you sure you want to delete <span id="item-name"></span>?
						</p>
						<p>
							<img id="modal-image">
							<strong>Category: </strong><span id="item-category"></span>
						</p>
							
					</div> <!-- end modal body -->

					<div class="modal-footer">
						<form enctype="multipart/form-data" action="controllers/delete_item.php" method="POST">
							<input type="hidden" name="id" id="hidden-item-id">
							<button class="btn btn-danger">Delete</button>
							<button class="btn btn-secondary" data-dismiss="modal" type="button">Cancel</button>
						</form>
					</div>
					
				</div>
			</div>
		</div> <!-- end modal div for delete -->




		<div class="modal" id="product-form">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<h4 class="modal-title">Product Add</h4>
						<button class="close" type="button" data-dismiss="modal">X</button>
					</div>
					<div class="modal-body">
							
						<form enctype="multipart/form-data" action="controllers/add_item.php" method="POST">
							<div class="form-group">
								<input type="text" class="form-control" name="productname" placeholder="Product Name">
							</div>
							<div class="form-group">
								<select name="productcategories" class="form-control">
									<option>(select category)</option>
									<?php 
										
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
								<input type="number" name="productprice" class="form-control" placeholder="0.00">
							</div>
							<div class="form-group">
								<textarea name="productdescription" class="form-control" placeholder="Product Description..."></textarea>
							</div>
							<div class="form-group">
								<input type="file" name="productimage" class="form-control">
							</div>
							
							
					</div> <!-- end modal body -->

					<div class="modal-footer">
						<div class="form-group">
							<button class="btn btn-primary">Save</button>
							<button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
						</div>
			
						</form>
						
					</div>
					
				</div>
			</div>
		</div> <!-- end modal div for Add item -->




		<div class="modal" id="edit-item">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<h4 class="modal-title">Edit Item</h4>
						<button class="close" type="button" data-dismiss="modal">X</button>
					</div>
					<div class="modal-body">
							
						<form enctype="multipart/form-data" action="controllers/update_item.php" method="POST">
							<input type="hidden" name="id" id="hidden-item-id-edit">
							<div class="form-group">
								<input type="text" class="form-control" name="productname" placeholder="Product Name" id="edit-name">
							</div>
							<div class="form-group">
								<select name="productcategories" class="form-control" id="edit-category">
									<?php 
										
										$sql = "SELECT * FROM categories";
										$result=mysqli_query($conn, $sql);
										foreach($result as $row){
											extract($row);
									?>
											<option value="<?php echo $id; ?>" class="cat-item" id="<?php echo $id; ?>"><?php echo $name; ?></option>
									<?php
										}
									 ?>
								</select>
							</div>
							<div class="form-group">
								<input type="number" name="productprice" class="form-control" placeholder="0.00" id="edit-price">
							</div>
							<div class="form-group">
								<textarea name="productdescription" class="form-control" placeholder="Product Description..." id="edit-description"></textarea>
							</div>
							<div class="form-group">
								<div class="form-control">
								<img id="modal-image-edit">
								<input type="file" name="productimage">
								</div>
							</div>
							
							
					</div> <!-- end modal body -->

					<div class="modal-footer">
						<div class="form-group">
							<button class="btn btn-primary">Save</button>
							<button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
						</div>
			
						</form>
						
					</div>
					
				</div>
			</div>
		</div> <!-- end modal div for Edit item -->

		

				
		<script src="assets/js/productsadmin.js"></script>	
		

		
<?php

	}
	// end content admin






	require_once "partials/template.php";

 ?>