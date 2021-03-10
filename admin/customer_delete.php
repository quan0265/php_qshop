<?php 
// session_start();

if(isset($_GET['id']) && isset($_SESSION['admin'])){

	$id= (int)$_GET['id'];

	$sql= "DELETE FROM customers WHERE id='$id'";
	
	$query= mysqli_query($conn, $sql);

	header('location: index.php?layout=customer_list');

}
else{
	header('location: index.php?layout=customer_list');
}
















 ?>