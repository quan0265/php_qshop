<?php 
// session_start();

if(isset($_GET['id']) && isset($_SESSION['admin'])){

	$id= (int)$_GET['id'];

	$sql= "DELETE FROM brands WHERE brand_id='$id'";
	
	$query= mysqli_query($conn, $sql);

	header('location: index.php?layout=brand_list');

}
else{
	header('location: index.php?layout=brand_list');
}
















 ?>