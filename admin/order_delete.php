<?php 
session_start();

if(isset($_GET['order_id']) && isset($_SESSION['admin'])){

	$order_id= (int)$_GET['order_id'];

	$sql= "DELETE FROM orders WHERE order_id='$order_id'";

	mysqli_query($conn, $sql);

	$sql= "DELETE FROM order_detail WHERE order_id='$order_id'";
	
	if(mysqli_query($conn, $sql)){

		$_SESSION['thongbao']= '<script>alert("xóa thành công")</script>';
	}
	else{
		$_SESSION['thongbao']= '<script>alert("bạn không thể xóa")</script>';
	}

	header('location: index.php?layout=order_list');

}
else{
	header('location: index.php?layout=order_list');
}
















 ?>