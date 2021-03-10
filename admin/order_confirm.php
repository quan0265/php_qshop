<?php 
if(isset($_GET['order_id']) && isset($_GET['order_status'])){

	$order_status= $_GET['order_status'];
	if($order_status<3){
		$order_status++;
	}
	$order_id= $_GET['order_id'];

	$sql= "UPDATE orders SET order_status='$order_status' WHERE order_id='$order_id'";
	$query= mysqli_query($conn, $sql);
	header('location: index.php?layout=order_list');

}
else{
	header('location: index.php?layout=order_list');
}









 ?>