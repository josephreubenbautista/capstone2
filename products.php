<?php 
	session_start();
	
	function get_title(){
		echo "Jcube Basketball | Products";
	}

	function get_content_user(){
		require "connection.php";
?>
		<h2>Products</h2>
		<hr class="my-3">
		<div class="row">
			<nav class="nav col-lg-12" id="sort-filter">
				<ul class="nav nav-tabs mr-auto">
					<li class="nav-item">
						<a href="#" class="nav-link disabled">Filter:</a>
					</li>
					<li class="nav-item">
						<a href="controllers/filter.php?filter=0" class="nav-link 
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
						<a href="controllers/filter.php?filter=<?= $id ?>" class="nav-link 
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
						<a href="#" class="nav-link disabled">Sort:</a>
					</li>
					<li class="nav-item">
						<a href="controllers/sort.php?sort=ASC" class="nav-link 
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
						<a href="controllers/sort.php?sort=DESC" class="nav-link
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
							<input type="number" min="1" class="form-control" name="quantity" id="itemquantity<?php echo $id; ?>">
							<button class="btn btn-success" onclick="addToCart(<?php echo $id; ?>)" type="button">Add To Cart</button>
						</div>
					</form>
					<span id="successMessage<?php echo $id;  ?>"></span>
				</div>
			</div>
			</div>

<?php
		}

?>
		</div>
		
		



<?php
	} 
	// end content user





	function get_content_admin() {
		require "connection.php";
?>
		
		<h2>Products</h2>
		<hr class="my-3">
		<div class="row">

			<div class="card col-lg-3 fixed-top" id="product-form">
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
						<input type="text" name="productprice" class="form-control" placeholder="0.00">
					</div>
					<div class="form-group">
						<textarea name="productdescription" class="form-control" placeholder="Product Description..."></textarea>
					</div>
					<div class="form-group">
						<input type="file" name="productimage" class="form-control">
					</div>
					<div class="form-group">
<?php
					if(isset($_SESSION['error_message'])){
						echo "<span class='error_message'>".$_SESSION['error_message']."</span>";
						unset($_SESSION['error_message']);
					}
					if(isset($_SESSION['success_message'])){
						echo "<span class='success_message'>".$_SESSION['success_message']."</span>";
						unset($_SESSION['success_message']);
					}
?>
						<button class="btn btn-primary float-right">Save</button>
					</div>
	
				</form>
			</div> <!-- end div for adding product -->

			<div class="col-lg-3" id="product-space"></div>

			<div class="col-lg-8 table-responsive guide card" id="product-list">
				

			
				<ul class="nav nav-tabs mr-auto">
					<li class="nav-item">
						<a href="#" class="nav-link disabled">Filter:</a>
					</li>
					<li class="nav-item">
						<a href="controllers/filter.php?filter=0" class="nav-link 
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
						<a href="controllers/filter.php?filter=<?= $id ?>" class="nav-link 
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
						<a href="#" class="nav-link disabled">Sort:</a>
					</li>
					<li class="nav-item">
						<a href="controllers/sort.php?sort=ASC" class="nav-link 
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
						<a href="controllers/sort.php?sort=DESC" class="nav-link
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
								<td><img src="<?= $image_path ?>" class="img-fluid product-image"></td>
								<td>
									<p><button type="button" class="btn btn-primary edit-btn">Edit</button></p>
									<p>
									<button type="button" class="btn btn-danger delete-btn" data-index="<?= $id ?>" data-toggle="modal" data-target="#delete-item">Delete</button>
									</p>
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
							Are you sure you want to delete <span id="item"></span>?
						</p>
							
					</div> <!-- end modal body -->

					<div class="modal-footer">
						<button class="btn btn-danger">Delete</button>
						<button class="btn btn-secondary" data-dismiss="modal" type="button">Cancel</button>
					</div>
					
				</div>
			</div>
		</div> <!-- end modal div for delete -->


		<script type="text/javascript">
			
			$('.delete-btn').click((e)=>{
				let itemToDelete = e.target.getAttribute('data-index');
				console.log(itemToDelete);

				//ajax request
				// $.post('controllers/delete.php',
				// 	{id: taskToDelete},
				// 	function (data){
				// 		let tasks = JSON.parse(data);
				// 		let htmlString = '';
				// 		tasks.forEach(function (task){

				// 			htmlString += `<li><span><i id="delete${task['id']}" data-index="${task['id']}" class="far fa-trash-alt"></i></span>${task['name']}</li>`;
				// 		});

				// 		let pending = document.querySelector('#completedTask');
				// 		pending.innerHTML = htmlString;
				// 	});

				$.ajax({
					url : 'controllers/retrieve_item.php',
					method : 'post',
					data : {id : itemToDelete},
				}).done(data =>{
					let product = JSON.parse(data);
					console.log(product);
					// product.forEach((items)=>{
					// 	console.log(${items['id']});
						
					// });

				});

			});



		</script>
<?php

	}
	// end content admin






	require_once "partials/template.php";

 ?>