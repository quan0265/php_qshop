<?php 
session_start();

include_once "../../admin/database.php";

if(isset($_SESSION['cart']) && isset($_SESSION['customer'])){


	// insert table order

	$customer_id= $_SESSION['customer']['id'];

	$ship_fullname= $_SESSION['customer']['full_name'];

	$ship_email= $_SESSION['customer']['email'];

	$ship_phone= $_SESSION['customer']['phone'];

	$ship_address= $_SESSION['customer']['address'];

	$total_money= $_GET['total_money'];

	$order_date= date("Y-m-d H:i:s");

	$order_status= "1";

	$sql= "INSERT INTO orders(customer_id,ship_fullname,ship_email,ship_phone,ship_address,total_money,order_date,order_status) VALUES('$customer_id','$ship_fullname','$ship_email','$ship_phone','$ship_address','$total_money','$order_date','$order_status')";

	if(mysqli_query($conn, $sql)){

		//selct order_id is create

		$sql1= "SELECT * FROM orders ORDER BY order_id DESC LIMIT 0,1";

		$query1 = mysqli_query($conn, $sql1);

		$row1= mysqli_fetch_array($query1);

		$order_id= $row1['order_id'];



		//insert order_detail;
		$arrId= array();

		foreach ($_SESSION['cart'] as $id => $value) {
			$arrId[]= $id;
		}

		$strId= implode(',', $arrId);

		$sql2= "SELECT * FROM products WHERE product_id in($strId)";
		
		$query2= mysqli_query($conn, $sql2);

		while($row2= mysqli_fetch_array($query2)){

			$product_id= $row2['product_id'];

			$quanlity= $_SESSION['cart'][$product_id];

			$total_price= $row2['product_price'] * $quanlity;
			
			$sql3= "INSERT INTO order_detail(order_id,product_id,quanlity,total_price) VALUES('$order_id','$product_id','$quanlity','$total_price')";

			if(mysqli_query($conn, $sql3)){

				header("location: send_mail.php?order_id=$order_id");

				// unset($_SESSION['cart']);
				// $_SESSION['thongbao']='<script>alert("Bạn đã mua hàng thành công")</script>';
				// header('location: ../../index.php');
			}
			else{
				echo mysqli_error($conn);
			}
		}
	}
	else{
		echo mysqli_error($conn);
	}



	



}	
else{
	header('location: ../../index.php');
}















 ?>