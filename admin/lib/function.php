<?php 

function check_name($table, $name, $name_value, $id='', $id_value=''){
	
	if($id=='' || $id_value==''){
		$sql= "SELECT * FROM '$table' WHERE $name='$name_value'";
	}
	else{
		$sql= "SELECT * FROM '$table' WHERE $name='$name_value' AND NOT $id=$id_value";
	}

	$query= mysqli_query($conn, $sql);

	if(mysqli_num_rows($query)>0){
		return 'true';
	}
	else{
		return 'false';
	}

}







 ?>