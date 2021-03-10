<?php 
ob_start();
session_start();

include_once "lib/config.php";
include_once "lib/function.php";
include_once 'database.php';



if(!isset($_SESSION['admin'])){
	header('location: login.php');
}

$sql= "SELECT * FROM orders WHERE order_status=1";
$query= mysqli_query($conn, $sql);
$count_confirm= mysqli_num_rows($query);


if(isset($_SESSION['thongbao'])){
    echo $_SESSION['thongbao'];
    unset($_SESSION['thongbao']);
}



 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>admin</title>
    <link rel="stylesheet" href="css/all.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css"> -->
    <link rel="stylesheet" href="css/datatables.min.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckfinder/ckfinder.js"></script>
    <script type="text/javascript" src="js/datatables.min.js"></script>
    <!-- <script type="text/javascript" src="js/owl.carousel.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
       

</head>

<body>
   
<section id="header">
    <div class="container">
        <div class="header-left">
            <h1 class="logo"><a href="index.php">ADMIN</a></h1>
        </div>
        <div class="header-right">
            <div class="header-plus">
                <i class="fas fa-plus"></i>
                <span>New</span>
                <div class="plus-list">
                    <div class="user-item"><a href="index.php?layout=cate_add"><i class="fas fa-caret-right"></i><span>category</span></a></div>
                    <div class="user-item"><a href="index.php?layout=brand_add"><i class="fas fa-caret-right"></i><span>brand</span></a></div>
                    <div class="user-item"><a href="index.php?layout=product_add"><i class="fas fa-caret-right"></i><span>product</span></a></div>
                    <div class="user-item"><a href="index.php?layout=slider_add"><i class="fas fa-caret-right"></i><span>slider</span></a></div>
                    <div class="user-item"><a href=""><i class="fas fa-caret-right"></i><span>logout</span></a></div>
                </div>
            </div>
            <div class="header-user">
                <i class="fas fa-user"></i>
                <!-- <i class="fas fa-caret-down"></i> -->
                <span>quan</span>
                <div class="user-list">
                    <!-- <div class="user-item"><a href="index.php"><i class="fas fa-user"></i><span>profile</span></a></div> -->
                    <div class="user-item"><a href="index.php?layout=setting"><i class="fas fa-cog"></i><span>setting</span></a></div>
                    <div class="user-item"><a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>logout</span></a></div>
                </div>
            </div>
            <div class="header-bars">
                <i class="fas fa-bars"></i>
            </div>
        </div>          
    </div>
</section>

<section id="main">
    <div class="sidebar">
        <ul class="menu">
            <li><a href="index.php"><i class="fas fa-home"></i> home</a></li>
            <li><a href="index.php?layout=cate_list"><i class="fas fa-caret-right"></i>Categories</a></li>
            <li><a href="index.php?layout=product_list"><i class="fas fa-caret-right"></i>Products</a></li>
            <li><a href="index.php?layout=brand_list"><i class="fas fa-caret-right"></i>Brands</a></li>
            <li><a href="index.php?layout=customer_list"><i class="fas fa-caret-right"></i>Customers</a></li>
            <li><a href="index.php?layout=order_list"><i class="fas fa-caret-right"></i>Orders <span><?php if($count_confirm>0) echo "($count_confirm)"; ?></span></a></li>
            <li><a href="index.php?layout=slider_list"><i class="fas fa-caret-right"></i>Sliders</a></li>
            <li><a href="index.php?layout=setting"><i class="fas fa-cog"></i>setting</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        </ul>
    </div>
    <div class="main">
        <!-- layout -->
        <?php 
        if(isset($_GET['layout'])){
        	switch ($_GET['layout']) {
                case 'setting': include_once './setting.php';
                    break;
        		case 'cate_list': include_once './cate_list.php';
        			break;
    			case 'cate_add': include_once './cate_add.php';
        			break;
    			case 'cate_edit': include_once './cate_edit.php';
        			break;
                case 'cate_delete': include_once './cate_delete.php';
                    break;
                case 'brand_list': include_once './brand_list.php';
                    break;
                case 'brand_add': include_once './brand_add.php';
                    break;
                case 'brand_edit': include_once './brand_edit.php';
                    break;
                case 'brand_delete': include_once './brand_delete.php';
                    break;
        		case 'product_list': include_once './product_list.php';
        			break;
    			case 'product_add': include_once './product_add.php';
        			break;
    			case 'product_edit': include_once './product_edit.php';
        			break;
                case 'product_delete': include_once './product_delete.php';
                    break;
                case 'slider_list': include_once './slider_list.php';
                    break;
                case 'slider_add': include_once './slider_add.php';
                    break;
                case 'slider_edit': include_once './slider_edit.php';
                    break;
                case 'slider_delete': include_once './slider_delete.php';
                    break;
                case 'order_list': include_once './order_list.php';
                    break;
                case 'order_confirm': include_once './order_confirm.php';
                    break;
                case 'order_delete': include_once './order_delete.php';
                    break;
                case 'order_detail': include_once './order_detail.php';
                    break;
                case 'customer_list': include_once './customer_list.php';
                    break;
                case 'customer_delete': include_once './customer_delete.php';
                    break;

        		
        		default: include_once './product_list.php';
        			break;
        	}
        }
        else{
        	include_once './product_list.php';
        }










         ?>


    </div>
</section>
















</body>


<script type="text/javascript">
    
$(document).ready(function(){

    // click show menu
    $(".header-bars").click(function(){
        $(".menu").toggle(1);
    });

    $(window).resize(function(){
        if($(window).width()>=768){
            $(".menu").css("display", "block");
            
        }
    });

     $('#myTable').DataTable();


    
});




</script>







</html>