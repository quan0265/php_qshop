<?php 
ob_start();
session_start();
include_once "../database.php";


if(isset($_POST['cate_id'])){
	$cate_id= $_POST['cate_id'];

	$sql= "SELECT * FROM brands WHERE cate_id='$cate_id'";

	$query= mysqli_query($conn, $sql);

	while($row= mysqli_fetch_array($query)){

		$brand_id= $row['brand_id'];
		$brand_name= $row['brand_name'];

		if(isset($_POST['brand_id'])){
			if($_POST['brand_id']==$brand_id){
				echo "<option selected='' value='$brand_id'>$brand_name</option>";
			}
			else{
				echo "<option value='$brand_id'>$brand_name</option>";
			}
		}
		else{
			echo "<option value='$brand_id'>$brand_name</option>";
		}
	}

}












 ?>