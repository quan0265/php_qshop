<?php 

if(isset($_POST['register'])){

	$full_name= $_POST["full_name"];

	$username= $_POST["username"];

	$email= $_POST["email"];

	$password= sha1($_POST["password"]);

	$phone= $_POST["phone"];

	$address= $_POST["address"];


	if($full_name!="" && $username!="" && $email!="" && $_POST["password"]!="" && $phone!="" && $address!=""){

		$sql= "SELECT * FROM customers WHERE username='$username'";
		$query= mysqli_query($conn, $sql);
		$row_count= mysqli_num_rows($query);

		if($row_count<=0){
			$sql= "INSERT INTO customers(full_name,username,email,password,phone,address) VALUES('$full_name','$username','$email','$password','$phone','$address')";

			if(mysqli_query($conn, $sql)){
				$thongbao= '<div class="alert alert-success">đăng kí tài khoản thành công</div>
';
			}
		}
		else{
			$e_username= '<div class="alert alert-danger">username đã tồn tại</div>';
		}

	}
	else{
		$error= '<div class="alert alert-danger">thông tin không được để trống</div>';
	}




}














 ?>
<div class="container">
	<div class="bread-crumb">
		<a href="index.php">Home</a>

		<i class="fas fa-angle-right"></i>
		<span>register</span>
	
	</div>
	<div class="product-main">
		<div class="row">
			<div class="col-md-9 col-sm-8 col-12">
				<div class="page-login">
					<form action="" method="post" autocomplete="off">
						<!-- <h4>Login</h4> -->
						<!-- <div class="alert alert-danger">thông tin không được để trống</div> -->
						<?php 
						if(isset($error)) echo $error;
						if(isset($e_username)) echo $e_username;
						if(isset($thongbao)) echo $thongbao;

						 ?>
						<div class="form-group">
							<label for="">Fullname</label>
							<input type="text" name="full_name" placeholder="Fullname">
						</div>
						<div class="form-group">
							<label >Username</label>
							<input type="text" name="username" placeholder="Username" autocomplete="nope">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="email" name="email" placeholder="Email" autocomplete="off">
						</div>
						<div class="form-group">
							<label >Password</label>
							<input type="password" name="password" placeholder="Password" autocomplete="new-password">
						</div>
						<div class="form-group">
							<label for="">Phone</label>
							<input type="number" name="phone" placeholder="Phone">
						</div>
						<div class="form-group">
							<label for="">Address</label>
							<input type="text" name="address" placeholder="Address">
						</div>
						<div class="form-group text-center">
							<button type="submit" name="register" class="btn btn-primary">Register</button>
						</div>
					</form>
				</div>

			</div>

			<div class="col-md-3 col-sm-4 col-12">
				<div class="sidebar">
					
					<?php 
					include_once "block/sidebar.php";

					 ?>


				</div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	
$(document).ready(function(){

	

});




</script>

