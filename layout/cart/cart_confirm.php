<?php 

if(!isset($_SESSION['customer'])){
	echo '<script type="text/javascript"> alert("bạn chưa đăng nhập"); </script>';
	
	echo '<script type="text/javascript">window.location.href="index.php?layout=login"</script>';
}

if(!isset($_SESSION['cart'])){
	echo '<script type="text/javascript"> alert("bạn chưa có sản phẩm nào trong giỏ hàng"); </script>';
	
	echo '<script type="text/javascript">window.location.href="index.php"</script>';
}


//
	$arrId= array();

	foreach ($_SESSION['cart'] as $id => $value) {
		$arrId[]= $id;
	}

	$strId= implode(',', $arrId);

	$sql= "SELECT * FROM products WHERE product_id IN($strId)";
	$query= mysqli_query($conn, $sql);



	//update cart
	if(isset($_POST['cart_update'])){
		if(isset($_POST['sl'])){

			foreach ($_POST['sl'] as $product_id => $value) {
				$_SESSION['cart'][$product_id]= $value;
			}
			
		}
	}



 ?>

<div class="container">
	<div class="bread-crumb">
		<a href="index.php">Home</a>

		<i class="fas fa-angle-right"></i>
		<span>xác nhận hóa đơn</span>
	
	</div>
	<div class="product-main">
		<div class="row">
			<div class="col-md-9 col-sm-8 col-12">
				<div class="shopping-cart">

					
					<form class="form-customer" action="" method="post">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th class="text-center" colspan="2">thông tin khách hàng</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Full name</td>
									<td><?php echo $_SESSION['customer']['full_name']; ?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><?php echo $_SESSION['customer']['email']; ?></td>
								</tr>
								<tr>
									<td>Phone</td>
									<td><?php echo $_SESSION['customer']['phone']; ?></td>
								</tr>
								<tr>
									<td>Address</td>
									<td><?php echo $_SESSION['customer']['address'];  ?></td>
								</tr>
								<tr><td colspan="2" class="text-center"><a href="index.php?layout=update&id=<?php echo $_SESSION['customer']['id']; ?>" class="btn btn-primary">update</a></td></tr>
							</tbody>
						</table>
					</form>

					<form action="" method="post">
						<table class="table table">
							<thead>
								<tr>
									<th>stt</th>
									<th>hình ảnh</th>
									<th>sản phẩm</th>
									<th>giá</th>
									<th>số lượng</th>
									<th class="text-center">tổng tiền</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$total_money= 0;
								$stt=1;
								while($row= mysqli_fetch_array($query)){
									$total_price= $row['product_price']*$_SESSION['cart'][$row['product_id']];
								 ?>
								<tr>
									<td><?php echo $stt; ?></td>
									<td><img width="40px" src="images/product/<?php echo $row['product_image']; ?>" alt=""></td>
									<td><?php echo $row['product_name']; ?></td>
									<td><?php echo money($row['product_price']); ?><sup>đ</sup></td>
									<td><?php echo $_SESSION['cart'][$row['product_id']]; ?></td>
									<td class="text-center"><span><?php echo money($total_price); ?><sup>đ</sup></span></td>
								</tr>

								<?php 
									$stt++;
									$total_money= $total_money + $total_price;
								} ?>

								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td class="text-right" colspan="2">tổng tiền hóa đơn: <span><?php echo money($total_money); ?><sup>đ</sup></span></td>
								</tr>
							</tbody>
						</table>

						<div class="form-group text-center"><a href="layout/cart/cart_insert_db.php?total_money=<?php echo  $total_money; ?>" class="btn btn-primary mt5" type="submit" name="submit" class="btn btn-primary">mua hàng</a></div>
					</form>
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




</script>

