<?php 
session_start();

if(isset($_GET['product_id'])){
	$product_id= $_GET['product_id'];
	if($product_id=='all'){
		unset($_SESSION['cart']);
	}
	else{
		unset($_SESSION['cart'][$product_id]);
	}
}

header('location: ../../index.php?layout=cart');











 ?>