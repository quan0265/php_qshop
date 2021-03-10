<?php 

// if(isset($_GET['cate_id'])){
// 	$cate_id= (int)$_GET['cate_id'];
// }
// else{
// 	header('location: index.php');
// }

// if(isset($_GET['brand_id'])){
// 	$brand_id= $_GET['brand_id'];
// }

if(isset($_GET['product_id'])){
	$product_id= (int)$_GET['product_id'];
}
else{
	header('location: index.php');
}

$sql= "SELECT * FROM products INNER JOIN brands ON products.brand_id=brands.brand_id INNER JOIN categories ON brands.cate_id=categories.cate_id WHERE products.product_id='$product_id'";
$query= mysqli_query($conn, $sql);
$row= mysqli_fetch_array($query);



 ?>

<div class="container">
	<div class="bread-crumb">
		<a href="index.php">Home</a>

		<i class="fas fa-angle-right"></i>
		<a href=""><?php echo $row['cate_name']; ?></a>

		<i class="fas fa-angle-right"></i>
		<a href="index.php?layout=product&cate_id=<?php echo $row['cate_id'] ?>&brand=<?php echo $row['brand_id']; ?>"><?php echo $row['brand_name']; ?></a>
		<i class="fas fa-angle-right"></i>
		<span><?php echo $row['product_name']; ?> </span>
	
	</div>
	<div class="product-main">
		<div class="row">
			<div class="col-md-9 col-sm-8 col-12">
				<div class="product-detail">
					<div class="row">
						<div class="col-md-5 col-sm-5 col-12">
							<div class="product-detail-left">
								<img src="images/product/<?php echo $row['product_image']; ?>" alt="">
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-12">
							<div class="product-detail-right">
								<h4><?php echo $row['product_name']; ?></h4>
								<p>tình trạng: <?php if($row['product_quanlity']>0){ echo '<span>còn hàng</span>';} else{ echo '<span>hết hàng</span>'; } ?></p>
								<p>bảo hành: <span>12 tháng</span></p>
								<p>Giá: <span class="detail-price"><?php echo money($row['product_price']); ?><sup>đ</sup></span></p>

								<?php if($row['product_quanlity']>0){ ?>
								<a href="layout/cart/cart_add.php?product_id=<?php echo $row['product_id']; ?>" class="cart-add btn btn-primary">Mua ngay</a>
							<?php }else{ ?>
								<button class="btn btn-primary" onclick="alert('sản phẩm hết hàng')">Mua ngay</button>
							<?php } ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="product-detail-content">
							<?php echo $row['product_detail']; ?>
						</div>
					</div>
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