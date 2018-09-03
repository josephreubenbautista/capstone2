<?php 
	session_start();
	
	function get_title(){
		echo "Jcube Basketball | Transactions";
	}

	function get_content_user(){
		require "connection.php";
		$user = $_SESSION['logged_in_id'];

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
	
		<!-- <script src="assets/js/transaction.js"></script> -->
<?php
	} 
	// end content user





	function get_content_admin() {
		require "connection.php";
		$first_name = '';
		$last_name = '';
		
		
?>
		<h2>Transactions</h2>
		<hr class="my-3">
		<div class="row">
			<nav class="nav col-lg-12" id="sort-filter">
				<ul class="nav nav-tabs mr-auto">
					<li class="nav-item">
						<a href="#" class="nav-link disabled">Status:</a>
					</li>
					<li class="nav-item">
						<a href="controllers/filter_status.php?status=0" class="nav-link 
						<?php 
							if (isset($_SESSION['filtering-status'])){
								$statusid = $_SESSION['filtering-status'];
								if($statusid==0){
									echo "active";
								}
							}else{
								echo "active";
							}

						 ?>

						">All</a>
					</li>
<?php
					$filter="SELECT * FROM statuses";
					$statuses = mysqli_query($conn, $filter);
					foreach ($statuses as $status) {
						extract($status);
					

?>
					<li class="nav-item">
						<a href="controllers/filter_status.php?status=<?= $id ?>" class="nav-link 
							<?php 
							if (isset($_SESSION['filtering-status'])){
								$statusid = $_SESSION['filtering-status'];
								if($statusid==$id){
									echo "active";
								}
							}

						 	?>
						"><?php echo $name; ?></a>
					</li>
<?php 

					}
 ?>

				</ul> <!-- END FILTER STATUS -->



				<ul class="nav nav-tabs ml-auto">
					<li class="nav-item">
						<a href="#" class="nav-link disabled">Payment Method:</a>
					</li>
					<li class="nav-item">
						<a href="controllers/filter_payment.php?pay=0" class="nav-link 
						<?php 
							if (isset($_SESSION['filtering-payment'])){
								$methodid = $_SESSION['filtering-payment'];
								if($methodid==0){
									echo "active";
								}
							}else{
								echo "active";
							}

						 ?>

						">All</a>
					</li>
<?php
					$filter="SELECT * FROM payment_methods";
					$methods = mysqli_query($conn, $filter);
					foreach ($methods as $method) {
						extract($method);
					

?>
					<li class="nav-item">
						<a href="controllers/filter_payment.php?pay=<?= $id ?>" class="nav-link 
							<?php 
							if (isset($_SESSION['filtering-payment'])){
								$methodid = $_SESSION['filtering-payment'];
								if($methodid==$id){
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

				


			</nav>
			

		</div>
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
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>Transaction Code</th>
					<th>Customer Name</th>
					<th>Delivery Address</th>
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
					$filter = '';

				
					
													
					if (isset($_SESSION['filtering-status'])&&isset($_SESSION['filtering-payment'])){
						$statusid = $_SESSION['filtering-status'];
						$methodid = $_SESSION['filtering-payment'];
						
						$filter = " WHERE status_id = $statusid AND payment_method_id = $methodid";
						
					}else if(!isset($_SESSION['filtering-status'])&&isset($_SESSION['filtering-payment'])){
						$methodid = $_SESSION['filtering-payment'];
						
						$filter = " WHERE payment_method_id = $methodid";

					}else if(isset($_SESSION['filtering-status'])&&!isset($_SESSION['filtering-payment'])){
						$statusid = $_SESSION['filtering-status'];
						
						$filter = " WHERE status_id = $statusid";
					}else{
						$filter = '';
					}

					
					$sql = "SELECT * FROM orders ".$filter." ORDER BY date_created DESC";
					$result1 = mysqli_query($conn, $sql);
					foreach ($result1 as $row) {

						$statusid = $row['status_id'];
						$payid = $row['payment_method_id'];
						$date = $row['date_created'];
						$userid = $row['user_id'];
						extract($row);
						$code = $transaction_code;
						$orderid = $id;
				?>
						<tr>
							<td><a href="#" data-toggle="modal" data-target="#expand-order" id="transcode<?= $id  ?>" class="transactcode" data-index="<?php echo $id; ?>"><?php echo $transaction_code; ?></a></td>
							<td id="tdname<?= $id ?>"><?php 
								$usersql = "SELECT * FROM users WHERE id = $userid";
								$userresult = mysqli_query($conn, $usersql);
								foreach ($userresult as $user) {
									$name = $user['first_name']." ".$user['last_name'];
									echo $name;
								}
							 ?></td>
							<td><?php echo $address; ?></td>
							<td><?php echo $contact_number; ?></td>
							<td id="statustd">
								<form action="controllers/update_status.php" method="POST" id="update-status<?= $id ?>">
									<input type="hidden" name="id" value="<?= $id ?>" id="order<?= $id  ?>">
									<select name="statusid" class="form-control status" id="status<?= $id ?>" data-index="<?= $id ?>">
										<?php 
										$statussql = "SELECT * FROM statuses";
										$statusresult = mysqli_query($conn,$statussql);
										foreach ($statusresult as $status) {
											extract($status);
										?>
											<option value="<?php echo $id; ?>" class="status" id="value<?php echo $id; ?>" <?php if($status_id==$id){echo "selected";} ?>><?php echo $name; ?></option>
										<?php
										}

									 ?>
									</select> 
									
										
									
								</form>
							</td>
							<td><?php 
								$paysql = "SELECT * FROM payment_methods WHERE id=$payid";
								$payresult = mysqli_query($conn,$paysql);
								foreach ($payresult as $pay) {
									echo $pay['name'];
								}

							?></td>
							<td id="date<?= $id  ?>"><?php echo $date_created; ?></td>
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
						<small id="date"></small><br>
						<small>Customer Name:  </small><strong id="customername"></strong>
						<hr class="my-2">

							<table id="det">
								
								
							</table>
								
						<hr class="my-2">
					</div> <!-- end modal body -->

					<div class="modal-footer">
						

						<button class="btn btn-success" data-dismiss="modal" type="button">Ok</button>
					</div>
					
				</div>
			</div>
		</div> <!-- end modal div for delete -->

		<script src="assets/js/transaction.js"></script>
		
<?php

	}
	// end content admin






	require_once "partials/template.php";

 ?>



 								