<?php 
	session_start();
	
	function get_title(){
		echo "Jcube Basketball | Transactions";
	}

	function get_content_user(){
		require "connection.php";
		$user = $_SESSION['logged_in_id']

?>
		<h2>Transactions</h2>
		<hr class="my-3">
		<table class="table">
			<thead>
				<tr>
					<th>Transaction Code</th>
					<th>Address</th>
					<th>Contact Number</th>
					<th>Status</th>
					<th>Payment Method</th>
					<th>Date Ordered</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$code = '';
					$orderid = 0;
					$date='';
					$sql = "SELECT * FROM orders WHERE user_id = $user";
					$result = mysqli_query($conn, $sql);
					foreach ($result as $row) {
						$statusid = $row['status_id'];
						$payid = $row['payment_method_id'];
						$date = $row['date_created'];
						extract($row);
						$code = $transaction_code;
						$orderid = $id;
				?>
						<tr>
							<td><a href="#" data-toggle="modal" data-target="#expand-order"><?php echo $transaction_code; ?></a></td>
							<td><?php echo $address; ?></td>
							<td><?php echo $contact_number; ?></td>
							<td><?php 
								$statussql = "SELECT * FROM statuses WHERE id=$statusid";
								$statusresult = mysqli_query($conn,$statussql);
								foreach ($statusresult as $status) {
									echo $status['name'];
								}

							 ?></td>
							<td><?php 
								$paysql = "SELECT * FROM payment_methods WHERE id=$payid";
								$payresult = mysqli_query($conn,$paysql);
								foreach ($payresult as $pay) {
									echo $pay['name'];
								}

							?></td>
							<td><?php echo $date_created; ?></td>
						</tr>
				<?php
					}

				 ?>

			</tbody>
		</table>

		<div class="modal" id="expand-order">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<h4 class="modal-title"><?php echo $code; ?></h4>

						<button class="close" type="button" data-dismiss="modal">X</button>
					</div>
					<div class="modal-body">
						<small><?php echo $date; ?></small>
						<?php 
							$sql = "SELECT * FROM order_details WHERE order_id = $orderid";
							$result = mysqli_query($conn, $sql);
							foreach ($result as $row) {
								extract($row);
						?>
								<table>
									<tr>
										<td>
											<?php 
												$prodsql = "SELECT * FROM products WHERE id = $product_id";
												$prodresult = mysqli_query($conn, $prodsql);
												foreach ($prodresult as $product) {
													extract($product);
											?>
													<img src="<?= $image_path ?>" class="transact-image">
											<?php
												}
											?>
										</td>
										<td>
											<?php 
												$prodsql = "SELECT * FROM products WHERE id = $product_id";
												$prodresult = mysqli_query($conn, $prodsql);
												foreach ($prodresult as $product) {
													extract($product);
											?>
													<h4><?php echo $name; ?></h4>
											<?php
												}
											?>
													<h5><?php echo $quantity; ?></h5>
										</td>
									</tr>
								</table>
								
								<hr class="my-2">
						<?php
							}
						?>
							
					</div> <!-- end modal body -->

					<div class="modal-footer">
						<button class="btn btn-success" data-dismiss="modal" type="button">Ok</button>
					</div>
					
				</div>
			</div>
		</div> <!-- end modal div for delete -->
	
		
<?php
	} 
	// end content user





	function get_content_admin() {
		require "connection.php";
?>
		<h2>Transactions</h2>
		<hr class="my-3">
		<div class="row">

		</div>
	

		
<?php

	}
	// end content admin






	require_once "partials/template.php";

 ?>