<?php

		if (isset($_GET['clicked'])){
			unset($_SESSION['cart']);
		}

		if (isset($_GET['deletekey'])){
			$key = $_GET['deletekey'];
			// $itemqty = $_GET['itemqty'];
			
			// $_SESSION['cart'][$key] -= $itemqty;
			if(count($_SESSION['cart'])>1){
				unset($_SESSION['cart'][$key]);
			}else{
				unset($_SESSION['cart']);
			}

		}

		if (isset($_POST['qty'])){
			$key = $_GET['key'];
			$_SESSION['cart'][$key]=$_POST['qty'];
		}

		if(!isset($_SESSION['cart'])) {
			echo "NO ITEMS IN CART.";
		} else {
			
			$total=0;
			foreach ($_SESSION['cart'] as $id => $quantity) {
					$sql = "SELECT * FROM products WHERE id = $id";
					$result = mysqli_query($conn, $sql);
					foreach($result as $row){
						extract($row);
						$sub=0;
						$sub = $price*$quantity;
						$total += $sub;
					}


?>
					<div class="row">
						<div class="col-2">
							<img src="<?php echo $image_path; ?>" style="width: 175px; height: 175px;">
						</div>
						<div class="col-9">
							<p><strong>Name: </strong><span><?php echo $name; ?></span></p> 
							<p><strong>Quantity: </strong><span><?php echo $quantity; ?></span></p> 
							<p><strong>Price: </strong><span><?php echo $price; ?></span></p> 
							<p><strong>Sub-Total: </strong><span><?php echo number_format($sub,2); ?></span></p> 
						</div>
						<div class="col-12">
							
								<input type="number" name="qty" value="<?php echo $quantity; ?>">
								<button class="btn btn-primary">Update</button>
								<a href="cart.php?deletekey=<?php echo $id; ?>"><button class="btn btn-danger" type="button">Remove</button></a>
							
						</div>
						
					</div>
					<hr class="my-4">
<?php
				
			}
			
?>
				<div class="row">
					<div class="col-6">
<?php
						if($total==0){
							$_SESSION['cart']='';
							echo "NO ITEMS IN CART.";

						}else{
?>
						<h2>TOTAL: <?php echo number_format($total,2); ?></h2>
					</div>
					<div class="col-6">

						<a href="cart.php?clicked=true"><button class="btn btn-danger" type="button">Empty Cart</button></a>
					</div>

				</div>
<?php
						}
		}























