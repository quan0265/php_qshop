<?php 
// session_start();

if(isset($_GET['id']) && isset($_SESSION['admin'])){

	$sql= "SELECT * FROM products WHERE product_id='$id'";

	$query= mysqli_query($conn, $sql);

	$row= mysqli_fetch_array($query);

	if(file_exists('../images/product/'.$row['product_image'])){
		unlink('../images/product/'.$row['product_image']);
	}

	$id= $_GET['id'];

	$sql= "DELETE FROM products WHERE product_id='$id'";
	
	$query= mysqli_query($conn, $sql);

	header('location: index.php?layout=product_list');

}
else{
	header('location: index.php?layout=product_list');
}
















 ?>