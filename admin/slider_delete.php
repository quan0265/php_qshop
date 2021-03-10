<?php 
// session_start();

if(isset($_GET['id']) && isset($_SESSION['admin'])){

	$id= $_GET['id'];

	$sql= "SELECT * FROM sliders WHERE id='$id'";

	$query= mysqli_query($conn, $sql);

	$row= mysqli_fetch_array($query);

	if(file_exists('../images/slider/'.$row['image'])){
		unlink('../images/slider/'.$row['image']);
	}

	$sql= "DELETE FROM sliders WHERE id='$id'";
	
	$query= mysqli_query($conn, $sql);

	header('location: index.php?layout=slider_list');

}
else{
	header('location: index.php?layout=slider_list');
}
















 ?>