<?php 
ob_start();
session_start();

include_once "admin/database.php";
include_once "lib/function.php";


if(isset($_SESSION['thongbao'])){
	echo $_SESSION['thongbao'];
	unset($_SESSION['thongbao']);
}








 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="css/product.css?v=<?php echo time(); ?>">
	<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>

<header id="header">

<div class="header-top">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-12">
				<div class="social">
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fab fa-facebook"></i></a>
				<a href="#"><i class="fab fab fa-google"></i></a>
			</div>
			</div>
			<div class="col-md-9 col-sm-6 col-12">
				<div class="top-right">
					<?php if(isset($_SESSION['customer'])){  ?>
					<i class="fas fa-user"></i>
					<a href="" class="login"><?php echo $_SESSION['customer']['username']; ?></a>
					<div class="user-list">
	                    <div class="user-item"><a href="index.php?layout=order"><i class="fas fa-ship"></i><span>order</span></a></div>
	                    <div class="user-item"><a href="index.php?layout=cart"><i class="fas fa-shopping-cart"></i><span>cart</span></a></div>
	                    <div class="user-item"><a href="index.php?layout=update&id=<?php echo $_SESSION['customer']['id']; ?>"><i class="fas fa-cog"></i><span>setting</span></a></div>
	                    <div class="user-item"><a href="layout/customer/logout.php"><i class="fas fa-sign-out-alt"></i><span>logout</span></a></div>
	                </div>

	                <?php }else{ ?>
	                <i class="fas fa-user"></i>
					<a href="index.php?layout=login" class="login">dang nhap</a>
					<span>|</span>
					<a href="index.php?layout=register" class="logout">dang kí</a>
					`<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="header-main">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-12">
				<div class="logo">
					<h1><a href="index.php">Qshop</a></h1>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-12">
				<div class="search">
					<form action="index.php?layout=search" method="post">
						<input type="text" name="search" placeholder="search">
						<input type="submit" name="submit" value="Search">
					</form>
				</div>
			</div>
			<div class="col-md-2 col-sm-2 col-12">
				<div class="cart">
					<a href="index.php?layout=cart"><i class="fas fa-shopping-cart"></i></a>
					<span><?php 
					if(isset($_SESSION['cart'])){
						$count=0;
						foreach ($_SESSION['cart'] as $key => $value) {
							$count= $count + $value;
						}
						echo $count;
					}
					else{
						echo 0;
					}

					 ?></span>
				</div>
			</div>
		</div>      
	</div>

</div>

<nav class="header-bottom">
	<div class="container">
		<ul class="menu">
			<li>
				<a href="#">Danh mục sản phẩm</a>
				<ul id="menu2" class="menu2">
					<?php 
					$sql= "SELECT * FROM categories";
					$query= mysqli_query($conn, $sql);

					while($row= mysqli_fetch_array($query)){

					 ?>
					<li>
						<a href="index.php?layout=product&cate_id=<?php echo $row['cate_id']; ?>"><?php echo $row['cate_name']; ?></a>
						<ul id="menu3" class="menu3">
							<?php 
							$cate_id= $row['cate_id'];
							$sql1= "SELECT * FROM brands WHERE cate_id='$cate_id'";
							$query1= mysqli_query($conn, $sql1);
							while($row1= mysqli_fetch_array($query1)){

							 ?>
							<li><a href="index.php?layout=product&cate_id=<?php echo $row['cate_id']; ?>&brand_id=<?php echo $row1['brand_id']; ?>"><?php echo $row1['brand_name']; ?></a></li>
						<?php } ?>
						</ul>
					</li>
				<?php } ?>
				</ul>
			</li>

			<li><a href="#">home</a></li>
			<li><a href="#">giới thiệu</a></li>
			<li><a href="#">liên hệ</a></li>
			<li>
				<a href="#">nhãn hiệu</a>
				<ul class="menu2">
					<?php 
					$sql= "SELECT * FROM brands";
					$query= mysqli_query($conn, $sql);

					while($row= mysqli_fetch_array($query)){

					 ?>
					<li><a href="index.php?layout=product&brand_id=<?php echo $row['brand_id']; ?>"><?php echo $row['brand_name']; ?></a></li>
				<?php } ?>
				</ul>
			</li>
		</ul>
	</div>
</nav>

</header>


<section id="slide">
	<div class="container">
		<div class="owl-carousel owl-theme slide">
			<?php 
			$sql= "SELECT * FROM sliders";

			$query= mysqli_query($conn, $sql);

			while($row= mysqli_fetch_array($query)){

			 ?>
		    <div class="item"><img src="images/slider/<?php echo $row['image']; ?>" alt=""></div>
		<?php } ?>
		</div>
	</div>			
</section>

<div id="main">
	
	<?php 

	if(isset($_GET['layout'])){
		switch($_GET['layout']){

			case 'home': include_once "layout/product/home.php"; break;

			case 'product': include_once "layout/product/product.php"; break;
			
			case 'product_detail': include_once "layout/product/product_detail.php"; break;

			case 'search': include_once "layout/product/search.php"; break;

			case 'cart': include_once "layout/cart/cart.php"; break;

			case 'cart_confirm': include_once "layout/cart/cart_confirm.php"; break;

			case 'login': include_once "layout/customer/login.php"; break;

			case 'register': include_once "layout/customer/register.php"; break;

			case 'update': include_once "layout/customer/update.php"; break;

			case 'order': include_once "layout/customer/order.php"; break;

			case 'order_detail': include_once "layout/customer/order_detail.php"; break;
			
			// case 'home': include_once "home.php"; break;
			
			// case 'home': include_once "home.php"; break;
			
			// case 'home': include_once "home.php"; break;

			default: include_once "layout/product/home.php";
			
		}
	}
	else{
		include_once "layout/product/home.php";
	}









	 ?>
	

</div>


<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-6 col-12">
				<div class="logo f-logo">
					<h1><a href="">Qshop</a></h1>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-12">
				<div class="f-contact">
					<h6>tong dai ho tro</h6>
					<div class="f-contact-item">
						<i class="fas fa-phone-alt"></i>
						<span>09123456789</span>
					</div>
					<div class="f-contact-item">
						<i class="fas fa-envelope"></i>
						<span>09123456789</span>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-12">
				<div class="f-address">
					<h6>Address</h6>
					<div class="f-address-item">
						<i class="fas fa-map-marker-alt"></i>
						<span>251, Đội Cấn - Ba Đình - Hà Nội</span>
					</div>
					<div class="f-address-item">
						<i class="fas fa-map-marker-alt"></i>
						<span>251, Đội Cấn - Ba Đình - Hà Nội</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>









<script type="text/javascript">
	

$(document).ready(function(){

	$('.slide').owlCarousel({
        loop: true,
        dots: true,
        margin: 30,
        nav: true,
        navText: [
            '<span class="prev"><i class="fas fa-chevron-left"></i></span>','<span class="next"><i class="fas fa-chevron-right"></i></span>'
        ],
        navClass: ['owl-prev', 'owl-next'],
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });


    $('.category').owlCarousel({
        loop: true,
        dots: false,
        margin: 30,
        nav: false,
        // navText: [
            // '<span class="prev">prev</span>','<span class="prev">prev</span>'
        // ],
        // navClass: ['owl-prev', 'owl-next'],
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 4
            }
        }
    });















});










</script>











</body>
</html>