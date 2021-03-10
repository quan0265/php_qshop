<?php 

if(isset($_SESSION['customer'])){

	$customer_id= $_SESSION['customer']['id'];
	// echo $customer_id;
}

if(isset($_GET['order_id'])){
	$order_id= $_GET['order_id'];
}
else{
	header('location: index.php');
}


 ?>

<div class="container">
	<div class="bread-crumb">
		<a href="index.php">Home</a>

		<i class="fas fa-angle-right"></i>
		<span>Order detail</span>
	
	</div>
	<div class="product-main">
		<div class="row">
			<div class="col-md-9 col-sm-8 col-12">
				<div class="page-order">
					<table class="table">
						<thead>
							<tr>
								<th>stt</th>
								<th>image</th>
								<th>name</th>
								<th>price</th>
								<th>quanlity</th>
								<th>total price</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$sql= "SELECT * FROM order_detail INNER JOIN products ON order_detail.product_id=products.product_id WHERE order_id='$order_id' ORDER BY id ASC";

							$query= mysqli_query($conn, $sql);
							$stt=0;
							$total_money=0;
							while($row= mysqli_fetch_array($query)){
								$stt++;
								$total_money= $total_money + $row['total_price'];
							 ?>
							<tr>
								<td><?php echo $stt; ?></td>
								<td><img src="images/product/<?php echo $row['product_image']; ?>" alt=""></td>
								<td><?php echo $row['product_name']; ?></td>
								<td><?php echo $row['product_price']; ?><sup>đ</sup></td>
								<td><?php echo $row['quanlity']; ?></td>
								<td><?php echo $row['total_price'] ?><sup>đ</sup></td>
							</tr>
						<?php } ?>
							<tr>
								<td colspan="6" class="text-right">total money: <?php echo $total_money; ?><sup>đ</sup></td>
							</tr>
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