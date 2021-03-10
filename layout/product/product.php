<?php 

if(isset($_GET['cate_id'])){
	$cate_id= (int)$_GET['cate_id'];
}
else{
	header('location: index.php');
}

if(isset($_GET['brand_id'])){
	$brand_id= $_GET['brand_id'];
}





 ?>

<div class="container">
	<div class="bread-crumb">
		<a href="index.php">Home</a>
		<?php 
		if(isset($cate_id)){
			$sql1= "SELECT * FROM categories WHERE cate_id='$cate_id'";
			$query1= mysqli_query($conn, $sql1);
			$row1= mysqli_fetch_array($query1);
		}

		 ?>

		<i class="fas fa-angle-right"></i>
		<a href=""><?php echo $row1['cate_name']; ?></a>
		<?php 
		if(isset($brand_id)){
			$sql2= "SELECT * FROM brands WHERE brand_id='$brand_id'";
			$query2= mysqli_query($conn, $sql2);
			$row2= mysqli_fetch_array($query2);
		

		 ?>

		<i class="fas fa-angle-right"></i>
		<a href="index.php?layout=product&cate_id=<?php echo $cate_id ?>&brand=<?php echo $brand_id; ?>"><?php echo $row2['brand_name']; ?></a>
	<?php } ?>
	</div>
	<div class="product-main">
		<div class="row">
			<div class="col-md-9 col-sm-8 col-12">
				<div class="product-list" cate_id="<?php echo $_GET['cate_id']; ?>" brand_id="<?php if(isset($_GET['brand_id'])){ echo $_GET['brand_id']; }else{ echo '0'; } ?>">
					<div class="row">
						<!-- ajax -->



					</div>			
				</div>

				<!-- <ul class="pagination justify-content-center">
				  <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-left"></i></a></li>
				  <li class="page-item active"><a class="page-link" href="#">1</a></li>
				  <li class="page-item"><a class="page-link" href="#">2</a></li>
				  <li class="page-item"><a class="page-link" href="#">3</a></li>
				  <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>
				</ul> -->

				<div class="product-more text-center mt-5">
					<!-- ajax -->


					<!-- <button class="btn-more btn btn-primary" page="0">xem thêm</button> -->
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

	var cate_id= $(".product-list").attr("cate_id");
	var brand_id= $(".product-list").attr("brand_id");
	var page= 1;

	$.post("ajax/product.php", {product_more:1, cate_id:cate_id, brand_id:brand_id, page:page}, function(data){
		$(".product-more").html(data);
		// var page= $(".btn-more").attr("page");
	});


	$.post("ajax/product.php",{product_list:1, cate_id:cate_id, brand_id:brand_id, page:page}, function(data){
		$(".product-list .row").append(data);
	});


	// .btn-more duoc tao boi script nen dung delegate
	$("body").delegate(".btn-more", "click", function(){
		page++;
		// $(".btn-more").attr("page",page);
		$.post("ajax/product.php", {product_more:1, cate_id:cate_id, brand_id:brand_id, page:page}, function(data){
			$(".product-more").html(data);
			// var page= $(".btn-more").attr("page");
		});

		$.post("ajax/product.php",{product_list: 1, cate_id:cate_id, brand_id:brand_id, page:page}, function(data){
			$(".product-list .row").append(data);
		});
	});


	// $(".btn-more").click(function(){
	// 	page++;
	// 	// $(".btn-more").attr("page",page);
	// 	$.post("ajax/product.php", {product_more:1, cate_id:cate_id, brand_id:brand_id, page:page}, function(data){
	// 		$(".product-more").html(data);
	// 		var page= $(".btn-more").attr("page");
	// 	});

	// 	$.post("ajax/product.php",{product_list: 1, cate_id:cate_id, brand_id:brand_id, page:page}, function(data){
	// 		$(".product-list .row").append(data);
	// 	});
	// });

});




</script>