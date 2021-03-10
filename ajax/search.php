<?php
session_start();
include_once "../admin/database.php";
include_once "../lib/function.php";

$rowOnePage= 6;






if(isset($_POST['product_list'])){

	$search= $_POST['search'];
	$search= trim($search);
	$search= str_replace(' ', '%', $search);
	$search= '%'.$search.'%';

	$page= $_POST['page'];

	$rowStart= $page*$rowOnePage - $rowOnePage;

	$sql= "SELECT * FROM products  WHERE product_name LIKE '$search' ORDER BY product_id DESC LIMIT $rowStart,$rowOnePage ";

	// $sql= "SELECT * FROM products INNER JOIN brands ON products.brand_id=brands.brand_id INNER JOIN categories ON brands.cate_id=categories.cate_id WHERE categories.cate_id='$cate_id' ORDER BY products.product_id DESC LIMIT $rowStart,$rowOnePage ";

	// if(isset($_POST['brand_id']) && $_POST['brand_id']!='0'){
	// 	$brand_id= $_POST['brand_id'];
	// 	$sql= "SELECT * FROM products INNER JOIN brands ON products.brand_id=brands.brand_id INNER JOIN categories ON brands.cate_id=categories.cate_id WHERE categories.cate_id='$cate_id' AND brands.brand_id='$brand_id' ORDER BY products.product_id DESC LIMIT $rowStart,$rowOnePage ";

	// }

	$query= mysqli_query($conn, $sql);
	while($row= mysqli_fetch_array($query)){

	 ?>
	<div class="col-md-4 col-sm-6 col-12">
		<div class="product-item">
			<a href="index.php?layout=product_detail&product_id=<?php echo $row['product_id']; ?>"><img src="images/product/<?php echo $row['product_image']; ?>" alt=""></a>
			<p class="price-old"><?php if($row['product_price_old']!=0) {echo money($row['product_price_old']).'<sup>d</sup>';} ?></p>
			<p class="price"><?php echo number_format($row['product_price'],0,',','.'); ?><sup>d</sup></p>
			<h5><a href="index.php?layout=product_detail&product_id=<?php echo $row['product_id']; ?>"><?php echo $row['product_name'] ?></a></h5>
			<a href="index.php?layout=product_detail&product_id=<?php echo $row['product_id']; ?>" class="product-item-detail">chi tiet</a>
		</div>
	</div>
<?php 
	}
}
 ?>





<?php 


if(isset($_POST['product_more'])){

	$search= $_POST['search'];
	$search= trim($search);
	$search= str_replace(' ', '%', $search);
	$search= '%'.$search.'%';

	$page= $_POST['page'];

	$sql= "SELECT COUNT(product_id) AS count_product FROM products WHERE product_name LIKE '$search'";;

	$query= mysqli_query($conn, $sql);

	$row= mysqli_fetch_array($query);

	$totalRow= $row['count_product'];
	$totalPage= ceil($totalRow/$rowOnePage);

	if($page < $totalPage){
		echo "<button class='btn-more btn btn-primary' page='$page'>xem thêm</button>";
	}

}




 ?>
















