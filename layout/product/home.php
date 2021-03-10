<?php 

$sql1= "SELECT *, COUNT(product_id) AS count_product FROM products INNER JOIN brands ON products.brand_id=brands.brand_id INNER JOIN categories ON brands.cate_id=categories.cate_id GROUP BY categories.cate_id HAVING count_product>3";

//so luong san pham theo category
// $sql= "SELECT COUNT(product_id) AS count_product, cate_id FROM products GROUP BY products.cate_id";

$query1= mysqli_query($conn, $sql1);

while($row1= mysqli_fetch_array($query1)){
	// echo $row['count_product'];

	// if($row1['count_product']>=4){
		$cate_id= $row1['cate_id'];
		?>
		<section class="product">
			<div class="container">
				<div class="product-title">
					<h3><a href="index.php?layout=product&cate_id=<?php echo $row1['cate_id']; ?>"><?php echo $row1['cate_name']; ?></a></h3>
					<span></span>
				</div>
				<div class="category owl-carousel owl-theme">
					<?php 
					$sql= "SELECT * FROM products INNER JOIN brands ON products.brand_id=brands.brand_id WHERE cate_id='$cate_id'";
					$query= mysqli_query($conn, $sql);
					while($row= mysqli_fetch_array($query)){

					 ?>
					<div class="product-item item">
						<a href="index.php?layout=product_detail&product_id=<?php echo $row['product_id']; ?>"><img  src="images/product/<?php echo $row['product_image']; ?>" alt=""></a>
						<p class="price-old"><?php if($row['product_price_old']!=0) {echo money($row['product_price_old']).'<sup>d</sup>';} ?></p>
						<p class="price"><?php echo money( $row['product_price']); ?><sup>d</sup></p>
						<h5><a href="index.php?layout=product_detail&product_id=<?php echo $row['product_id']; ?>">sac aus a421 dskd sksl skdk slkd sdd</a></h5>
						<a href="index.php?layout=product_detail&product_id=<?php echo $row['product_id']; ?>" class="product-item-detail">chi tiet</a>
					</div>
				<?php } ?>
				</div>
			</div>
		</section>

<?php

	// }
}


 ?>

