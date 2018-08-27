<?php 
	session_start();
	require_once "partials/template_products.php";

	function get_content(){
		require "connection.php";
?>
	<div class="container">
<?php
		$categories = "SELECT * FROM categories";
		$cat=mysqli_query($conn, $categories);
		foreach($cat as $category){
			extract($category);

?>
	
		<a href="controllers/filter.php?filter=<?php echo $id; ?>"><button class="btn btn-primary"><?php echo $name; ?></button></a>
<?php
		}

?>
		<a href="controllers/filter.php?filter=0"><button class="btn btn-primary">All</button></a><br><br>
		<a href="controllers/sort.php?sort=DESC"><button class="btn btn-primary">Price (highest to lowest)</button></a>
		<a href="controllers/sort.php?sort=ASC"><button class="btn btn-primary">Price (lowest to hightst</button></a>
		
		<div class="row">
<?php
		$sort='';
		$filter='';
		if (isset($_SESSION['sorting'])){
			$sorted = $_SESSION['sorting'];
			$sort = " ORDER BY i.price ".$sorted;
		}
		
		if (isset($_SESSION['filtering'])){
			$categoryid = $_SESSION['filtering'];
			if($categoryid==0){
				$filter='';
			}else{
				$filter=" WHERE i.category_id = $categoryid ";
			}
			
			
		}
		$sql = "SELECT i.id as productid, i.name as productname, description, price, image, c.name as categoryname FROM items as i JOIN categories as c ON (i.category_id = c.id) ".$filter.$sort;
		
		
		



		$result=mysqli_query($conn, $sql);
		foreach($result as $row){
			extract($row);
?>
			<div class="card col-4" style="width:300px">
				<img class="card-img-top" src="<?php echo $image; ?>" alt="Card image" style="width:100%; height: 400px;">
				<div class="card-body">
					<h4 class="card-title"><?php echo $productname; ?></h4>
					<h6 ><?php echo $price; ?></h6>
					<p class="card-text"><?php echo $categoryname; ?></p>
					<p class="card-text"><?php echo $description; ?></p>
					<form method="POST" action="controllers/add_to_cart.php?id=<?php echo $productid; ?>">
						<input type="number" min="0" name="quantity">
						<button class="btn btn-success">Add To Cart</button>
					</form>
					
				</div>
			</div>


<?php
		}
?>
		</div>
	</div>
<?php
	}

 ?>