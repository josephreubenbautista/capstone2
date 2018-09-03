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
		
?>
		<h2>Transactions</h2>
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
					
					$sql = "SELECT * FROM orders ORDER BY date_created";
					$result = mysqli_query($conn, $sql);
					foreach ($result as $row) {
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



 								