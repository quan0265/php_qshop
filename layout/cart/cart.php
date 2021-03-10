<?php 

if(!isset($_SESSION['cart'])){
	echo '<script type="text/javascript"> alert("bạn chưa có sản phẩm nào trong giỏ hàng"); </script>';
	
	echo '<script type="text/javascript">window.location.href="index.php"</script>';
}

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
				header('location: index.php?layout=cart');
			}
			
		}
	}



 ?>

<div class="container">
	<div class="bread-crumb">
		<a href="index.php">Home</a>

		<i class="fas fa-angle-right"></i>
		<span>shopping cart</span>
	
	</div>
	<div class="product-main">
		<div class="row">
			<div class="col-md-9 col-sm-8 col-12">
				<div class="shopping-cart">
					<form action="" method="post">
						<table class="table table">
							<thead>
								<tr>
									<th>hình ảnh</th>
									<th>sản phẩm</th>
									<th>giá</th>
									<th>số lượng</th>
									<th class="text-center">tổng tiền</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$total_money= 0;
								while($row= mysqli_fetch_array($query)){
									$total_price= $row['product_price']*$_SESSION['cart'][$row['product_id']];
								 ?>
								<tr>
									<td><img width="40px" src="images/product/<?php echo $row['product_image']; ?>" alt=""></td>
									<td><?php echo $row['product_name']; ?></td>
									<td><?php echo money($row['product_price']); ?><sup>đ</sup></td>
									<td><input type="number" min="1" max="<?php echo $row['product_quanlity']; ?>" name="sl[<?php echo $row['product_id']; ?>]" value="<?php echo $_SESSION['cart'][$row['product_id']];  ?>" ></td>
									<td class="text-center"><span><?php echo money($total_price); ?><sup>đ</sup></span></td>
									<td class="text-center"><a href="layout/cart/cart_delete.php?product_id=<?php echo $row['product_id']; ?>" >xóa</a></td>
								</tr>

								<?php 
									$total_money= $total_money + $total_price;
								} ?>

								<tr>
									<td><a href="index.php" class="btn btn-warning">tiếp tục mua hàng</a></td>
									<td><button type="submit" name="cart_update" class="btn btn-info">cập nhật giỏ hàng</button></td>
									<!-- <td></td> -->
									<td colspan="2"><a href="layout/cart/cart_delete.php?product_id=all" class="btn btn-light">xóa hết sản phẩm</a></td>
									<td colspan="1" class="text-center">tổng tiền giỏ hàng: <span><?php echo money($total_money); ?><sup>đ</sup></span></td>
									<td><a href="index.php?layout=cart_confirm" class="btn btn-success">thanh toán</a></td>
								</tr>
							</tbody>
						</table>
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

