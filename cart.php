<?php
	session_start();
	if (!isset($_SESSION['logged_in_user'])||$_SESSION['logged_in_role']==2) {
		header('location: index.php');
		$_SESSION['error_message'] = "Unauthorized! Please log in.";
	}
	
	function get_title(){
		echo "Jcube Basketball | Cart";
	}
	
	function get_content_user(){
		require "connection.php";
		$id = $_SESSION['logged_in_id'];
		$addr="";
		$cont="";
		$usersql = "SELECT * FROM users WHERE id = $id";
		$userresult = mysqli_query($conn, $usersql);
		foreach ($userresult as $rows) {
			extract($rows);
			$addr = "$address";
			$cont = "$contact_number";
		}
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
						<div class="row div<?= $id  ?>">
							<div class="col-lg-3">
								<img src="<?php echo $image_path; ?>" class="img-fluid cart-image">
							</div>
							<div class="col-lg-8">
								<div class="row item-details" >
									<p class="col-lg-6 colored"><strong>Name: </strong><span><?php echo $name; ?></span></p> 
									<p class="col-lg-6 colored"><strong>Quantity: </strong><span id="qty<?= $id ?>"><?php echo $quantity; ?></span></p> 
									<p class="col-lg-6 colored"><strong>Price: </strong><span><?php echo $price; ?></span></p> 
									<p class="col-lg-6 colored"><strong>Sub-Total: </strong><span id="sub<?= $id ?>"><?php echo number_format($sub,2); ?></span></p> 
								
									<div class="col-lg-12  btn-group">
									
										<input type="number" min="1" name="qty" value="<?php echo $quantity; ?>" class="form-control" id="cart-item-qty<?= $id  ?>">
										<input type="hidden" min="1" name="hidden" value="<?php echo $quantity; ?>" class="form-control" id="hidden-item-qty<?= $id  ?>">

										<button class="btn btn-primary cart-btn-update" type="button" data-index="<?php echo $id; ?>">Update</button>

										<button class="btn btn-danger cart-btn-remove" type="button" data-index="<?php echo $id; ?>" data-toggle="modal" data-target="#delete-alert">Remove</button>
									
									</div>
									<div class="col-lg-12 ">
									
										<span class="error_message" id="errormessages<?= $id  ?>"></span>
									
									</div>
								</div>

							</div>

							
							
						</div>
						<hr class="my-4 div<?= $id  ?>">
<?php
					}
				}else{
					$totalitems = 0;
					$totalquantity = 0;
					$total = 0;
					?>
					<h5 class="colored">NO ITEMS IN THE CART.</h5>
<?php
					
				}
?>

			</div>  <!-- end div for cart items -->
			


			<div class="col-lg-4 guide" >
				<?php if(isset($_SESSION['item-quantity'])) {?>
				<div class="card bg-light mb-3"  >
					<div class="card-header">
						<h4>Order Details</h4>
					</div>
					<div class="card-body">
						<p class="card-text">
							<table class="black">
								<tr>
									<th class="black">Total Items:</th>
									<td class="black">&nbsp;</td>
									<td id="total-items" class="black"><?php echo $totalitems; ?></td>
								</tr>
								<tr>
									<th class="black">Total Quantity:</th>
									<td class="black">&nbsp;</td>
									<td id="total-quantity" class="black"><?php echo $totalquantity; ?></td>
								</tr>
								<tr>
									<th class="black">Total Price:</th>
									<td class="black">&nbsp;</td>
									<td id="total-price" class="black"><?php echo number_format($total,2); ?></td>
								</tr>
							</table>
							<div class="btn-group float-right">
								<button id="btn-checkout" class="btn btn-success " type="button" data-toggle="modal" data-target="#checkout-form" >Checkout</button>
								<button class="btn btn-danger " type="button" data-toggle="modal" data-target="#empty-alert">Empty Cart</button>
							</div>
						</p>
					</div>

					
				</div>
				<?php }?>
			</div>


		</div>

		
		<div class="modal" id="checkout-form">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<h4 class="modal-title">Checkout Form</h4>
						<button class="close" type="button" data-dismiss="modal">X</button>
					</div>
					<form action="controllers/checkout.php" method="POST" id="form-of-checkout">
						<div class="modal-body">

							<div class="alert alert-danger" role="alert" id="alert-checkout">
								<h4 class="alert-heading">ERROR</h4>
								<p>Please input your delivery address</p>

							</div>
							<div class="input-group">
								<?php $code=uniqid('TR'); ?>
								<input type="text" class="form-control" id="transaction-code" name="transactioncodedisabled" value="<?php echo $code; ?>" disabled>
								<input type="hidden" class="form-control" id="transaction-code" name="transactioncode" value="<?php echo $code; ?>">
							</div>

							<div class="input-group">
								<textarea class="form-control" id="addresscart" name="address" placeholder="Delivery Address. Where do you want us to deliver your order?" ><?php echo $addr; ?></textarea><span></span>
							</div>

							<div class="input-group">
								<input type="number" class="form-control" id="contact-number" name="contactnumber" placeholder="0915 XXX XXXX" value="<?= $cont ?>">
							</div>
							<div class="input-group">
								<select class="form-control" id="payment-method" name="paymentmethod">
									<?php 
										$sql = "SELECT * FROM payment_methods";
										$result = mysqli_query($conn, $sql);
										foreach ($result as $row) {
											extract($row);
											echo "<option value='$id'>$name</option>";
										}
									 ?>
									
								</select>
								
							</div>
							
								
							
						</div> <!-- end modal body -->

						<div class="modal-footer">
							<?php 
								$usern = $_SESSION['logged_in_user'];
								$sql = "SELECT * FROM users WHERE username = '$usern'";
								$result = mysqli_query($conn, $sql);
								foreach ($result as $row) {
									extract($row);
							?>
									<input type="hidden" name="userid" value="<?= $id ?>">
							<?php		
								}
							?>
									
							
							<button class="btn btn-danger" type="button" id="checkout-submit">Submit</button>
							<button class="btn btn-secondary" data-dismiss="modal" type="button">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div> <!-- END CHECKOUT FORM -->


		<div class="modal" id="empty-alert">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<h4 class="modal-title">ALERT</h4>
						<button class="close" type="button" data-dismiss="modal">X</button>
					</div>
					<div class="modal-body">
							
						<p id="modal-msg">
							Are you sure you want to remove all from your cart?
						</p>
							
					</div> <!-- end modal body -->

					<div class="modal-footer">
						<form action="controllers/empty_cart.php" method="POST">
							<input type="hidden" name="clicked" value="true">
							<button class="btn btn-danger" id="yes">Yes</button>
							<button class="btn btn-secondary" data-dismiss="modal" type="button">No</button>
						</form>
					</div>
					
				</div>
			</div>
		</div> <!-- end modal div for delete -->

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

		<div class="modal" id="delete-alert">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<h4 class="modal-title">ALERT</h4>
						<button class="close" type="button" data-dismiss="modal">X</button>
					</div>
					<div class="modal-body">
							
						<p id="modal-msg">
							Are you sure you want to remove <span id="item-name"></span> from your cart?
						</p>
						<p>
							<img id="modal-image">
							<strong>Category: </strong><span id="item-category"></span>
						</p>
							
					</div> <!-- end modal body -->

					<div class="modal-footer">
						
							<input type="hidden" name="id" id="hidden-item-id">
							<button class="btn btn-danger" id="modal-cart-remove" data-dismiss="modal">Delete</button>
							<button class="btn btn-secondary" data-dismiss="modal" type="button">Cancel</button>
						
					</div>
					
				</div>
			</div>
		</div> <!-- end modal div for delete -->


<script src="assets/js/cart.js"></script>
		
		

<?php
	}




	require_once "partials/template.php";

?>