<?php 

if(isset($_SESSION['customer'])){

	$customer_id= $_SESSION['customer']['id'];
	// echo $customer_id;
}





 ?>

<div class="container">
	<div class="bread-crumb">
		<a href="index.php">Home</a>

		<i class="fas fa-angle-right"></i>
		<span>Order</span>
	
	</div>
	<div class="product-main">
		<div class="row">
			<div class="col-md-9 col-sm-8 col-12">
				<div class="page-order">
					<table class="table">
						<thead>
							<tr>
								<th>stt</th>
								<th>phone</th>
								<th>address</th>
								<th>total money</th>
								<th>date</th>
								<th>status</th>
								<th>view</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$sql= "SELECT * FROM orders WHERE customer_id='$customer_id' ORDER BY order_id DESC";

							$query= mysqli_query($conn, $sql);
							$stt=0;
							while($row= mysqli_fetch_array($query)){
								$stt++;
							 ?>
							<tr>
								<td><?php echo $stt; ?></td>
								<td><?php echo $row['ship_phone']; ?></td>
								<td><?php echo $row['ship_address']; ?></td>
								<td><?php echo money($row['total_money']); ?></td>
								<td><?php echo $row['order_date']; ?></td>
								<td>
									<?php 
									if($row['order_status']=='1'){
										echo 'Đang xử lí...';
									}
									else if($row['order_status']=='2'){
										echo 'Đang gửi hàng';
									}else if($row['order_status']=='3'){
										echo 'Đã nhận hàng';
									}

									 ?>
								</td>
								<td><a href="index.php?layout=order_detail&order_id=<?php echo $row['order_id']; ?>">detail</a></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>

			</div>

			<div class="col-md-3 col-sm-4 col-12">
				<div class="sidebar">
					
					<?php 
					include_once "block/sidebar.php";

					 ?>


				</div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	
$(document).ready(function(){


});