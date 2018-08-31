<?php
	session_start();
	function get_title(){
		echo "Jcube Basketball | Cart";
	}
	
	function get_content_user(){
		require "connection.php";
?>

		<h2>Cart</h2>
		<hr class="my-3">
		<div class="row">
			<div class="col-lg-8 guide">
<?php 
				if(isset($_SESSION['cart'])){
					$totalitems = count($_SESSION['cart']);
					$totalquantity = $_SESSION['item-quantity'];
					$total = 0;
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
							<div class="col-lg-3">
								<img src="<?php echo $image_path; ?>" class="img-fluid cart-image">
							</div>
							<div class="col-lg-8">
								<div class="row item-details" >
									<p class="col-lg-6"><strong>Name: </strong><span><?php echo $name; ?></span></p> 
									<p class="col-lg-6"><strong>Quantity: </strong><span><?php echo $quantity; ?></span></p> 
									<p class="col-lg-6"><strong>Price: </strong><span><?php echo $price; ?></span></p> 
									<p class="col-lg-6"><strong>Sub-Total: </strong><span><?php echo number_format($sub,2); ?></span></p> 
								
									<div class="col-lg-12  btn-group">
									
										<input type="number" name="qty" value="<?php echo $quantity; ?>" class="form-control" id="cart-item-qty<?= $id  ?>">

										<button class="btn btn-primary cart-btn-update" type="button" data-index="<?php echo $id; ?>">Update</button>

										<button class="btn btn-danger cart-btn-remove" type="button" data-index="<?php echo $id; ?>" data-toggle="modal" data-target="#delete-alert">Remove</button>
									
									</div>
								</div>

							</div>

							
							
						</div>
						<hr class="my-4">
<?php
					}
				}else{
					$totalitems = 0;
					$totalquantity = 0;
					$total = 0;
					echo "NO ITEMS IN CART.";
				}
?>

			</div>  <!-- end div for cart items -->
			


			<div class="col-lg-4 guide">
				<div class="card bg-light mb-3">
					<div class="card-header">
						<h4>Order Details</h4>
					</div>
					<div class="card-body">
						<p class="card-text">
							<table>
								<tr>
									<th>Total Items:</th>
									<td>&nbsp;</td>
									<td><?php echo $totalitems; ?></td>
								</tr>
								<tr>
									<th>Total Quantity:</th>
									<td>&nbsp;</td>
									<td><?php echo $totalquantity; ?></td>
								</tr>
								<tr>
									<th>Total Price:</th>
									<td>&nbsp;</td>
									<td><?php echo "P".number_format($total,2); ?></td>
								</tr>
							</table>
							<button class="btn btn-danger float-right" type="button">Empty Cart</button>
						</p>
					</div>

					
				</div>
				
			</div>




		</div>



		<script type="text/javascript">

			$('.cart-btn-update').click((e)=>{
				let id = e.target.getAttribute('data-index');

				let quantity = $('#cart-item-qty'+id).val();
				
				$.ajax({
					url : "controllers/update_the_cart.php",
					data : {id : id, quantity : quantity},
					method: "POST",
				}).done(data =>{
					data = JSON.parse(data);
					let product = data.product;
					
					$('#badge-cart').html(data.quantity);

					product.forEach((item)=>{
						$('#msg').html()
						$('#msgBox').show();
					});

					

				});

			});

			$('.okbtn').click(()=>{
				
				$('#msgBox').hide();
			});



		</script>


<?php
	}




	require_once "partials/template.php";

?>