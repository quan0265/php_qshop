<h4>danh mục sản phẩm</h4>
<?php 
$sql= "SELECT *, COUNT(products.product_id) AS count_product_cate FROM products INNER JOIN brands ON products.brand_id=brands.brand_id INNER JOIN categories ON brands.cate_id=categories.cate_id GROUP BY categories.cate_id";
$query= mysqli_query($conn, $sql);
while($row= mysqli_fetch_array($query)){


 ?>
<div class="cate <?php if($row['cate_id']==$cate_id) echo 'active' ?>">
	<h5><a href="index.php?layout=product&cate_id=<?php echo $row['cate_id']; ?>"><i class="fas fa-angle-right"></i><?php echo $row['cate_name']; ?></a><span><?php echo $row['count_product_cate']; ?></span></h5>
	<ul class="cate-list">
		<?php 

		$cate_id5= $row['cate_id'];
		$sql5= "SELECT brands.brand_name, brands.brand_id, COUNT(products.product_id) AS count_product_brand FROM products RIGHT JOIN brands ON products.brand_id=brands.brand_id WHERE brands.cate_id='$cate_id5' GROUP BY brands.brand_id ORDER BY brands.brand_name ASC";
		$query5= mysqli_query($conn, $sql5);
		while($row5= mysqli_fetch_array($query5)){

		 ?>

		<li><i class="fas fa-angle-right"></i><a href="index.php?layout=product&cate_id=<?php echo $row['cate_id']; ?>&brand_id=<?php echo $row5['brand_id']; ?>"><?php echo $row5['brand_name']; ?></a><span><?php echo $row5['count_product_brand']; ?></span></li>
	<?php } ?>
	</ul>
</div>
<?php } ?>
<!-- <div class="cate">
	<h5><a href=""><i class="fas fa-angle-right"></i>PIN LAPTOP</a><span>123</span></h5>
	<ul class="cate-list">
		<li><i class="fas fa-angle-right"></i><a href="">Pin Laptop Aser</a><span>123</span></li>
		<li><i class="fas fa-angle-right"></i><a href="">Pin Laptop Aser</a><span>123</span></li>
		<li><i class="fas fa-angle-right"></i><a href="">Pin Laptop Aser</a><span>123</span></li>
		<li><i class="fas fa-angle-right"></i><a href="">Pin Laptop Aser</a><span>123</span></li>
		<li><i class="fas fa-angle-right"></i><a href="">Pin Laptop Aser</a><span>123</span></li>
	</ul>
</div> -->
<h4>Sản phẩm bán chạy</h4>
<ul class="product-hot-list">
	<?php 
	$sql= 	"SELECT *,SUM(order_detail.quanlity) AS count_buy FROM order_detail INNER JOIN products ON order_detail.product_id=products.product_id GROUP BY order_detail.product_id ORDER BY count_buy DESC LIMIT 0,4";
	$query= mysqli_query($conn, $sql);
	while($row= mysqli_fetch_array($query)){

	 ?>
	<li>
		<a href="index.php?layout=product_detail&product_id=<?php echo $row['product_id']; ?>"><img src="images/product/<?php echo $row['product_image']; ?>" alt=""></a>
		<div class="hot-item-text">
			<a href="index.php?layout=product_detail&product_id=<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></a>
			<p><?php echo money($row['product_price']); ?><sup>đ</sup></p>
		</div>
	</li>
<?php } ?>
</ul>