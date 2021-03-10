<?php 

if(isset($_POST['search']) && $_POST['search']!=''){
	$search= $_POST['search'];
}
else{
	header('location: index.php');
}







 ?>

<div class="container">
	<div class="bread-crumb">
		<a href="index.php">Home</a>

		<i class="fas fa-angle-right"></i>
		<span>Kết quả tìm kiếm: "<?php echo $search; ?>"</span>
	
	</div>
	<div class="product-main">
		<div class="row">
			<div class="col-md-9 col-sm-8 col-12">
				<div class="product-list" search="<?php echo $search; ?>" >
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

	var search= $(".product-list").attr("search");
	var page= 1;

	$.post("ajax/search.php", {product_more:1, search:search, page:page}, function(data){
		$(".product-more").html(data);
		// var page= $(".btn-more").attr("page");
	});


	$.post("ajax/search.php",{product_list:1, search:search, page:page}, function(data){
		$(".product-list .row").append(data);
	});


	// .btn-more duoc tao boi script nen dung delegate
	$("body").delegate(".btn-more", "click", function(){
		page++;
		// $(".btn-more").attr("page",page);
		$.post("ajax/search.php", {product_more:1, search:search, page:page}, function(data){
			$(".product-more").html(data);
			// var page= $(".btn-more").attr("page");
		});


		$.post("ajax/search.php",{product_list:1, search:search, page:page}, function(data){
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