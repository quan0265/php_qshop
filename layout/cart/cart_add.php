<?php 
session_start();

if(isset($_GET['product_id'])){
	$product_id= $_GET['product_id'];
}
else{
	header('location: ../../index.php');
}

if(isset($_SESSION['cart'][$product_id])){
	$_SESSION['cart'][$product_id]++;
}
else{
	$_SESSION['cart'][$product_id]= 1;
}

header('location: ../../index.php?layout=cart');







 ?>