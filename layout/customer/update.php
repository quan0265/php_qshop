<?php 

if(isset($_GET['id'])){
	$id= $_GET['id'];
}
else{
	header('location: index.php');
}

$sql= "SELECT * FROM customers WHERE id='$id'";
$query= mysqli_query($conn, $sql);
$row= mysqli_fetch_array($query);

if(isset($_POST['register'])){

	$full_name= $_POST["full_name"];

	$username= $_POST["username"];

	$email= $_POST["email"];

	$password= sha1($_POST["password"]);

	$phone= $_POST["phone"];

	$address= $_POST["address"];


	if($full_name!="" && $username!="" && $email!="" && $_POST["password"]!="" && $phone!="" && $address!=""){

		$sql= "SELECT * FROM customers WHERE username='$username' AND id<>'$id'";
		$query= mysqli_query($conn, $sql);
		$row_count= mysqli_num_rows($query);

		if($row_count<=0){
			$sql= "UPDATE customers SET full_name='$full_name',username='$username',email='$email',password='$password',phone='$phone',address='$address'";

			if(mysqli_query($conn, $sql)){
				$thongbao= '<div class="alert alert-success">update tài khoản thành công</div>
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
							<input type="text" value="<?php echo $row['full_name']; ?>" name="full_name" placeholder="Fullname">
						</div>
						<div class="form-group">
							<label >Username</label>
							<input type="text" name="username" value="<?php echo $row['username']; ?>" placeholder="Username" autocomplete="nope">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Email" autocomplete="off">
						</div>
						<div class="form-group">
							<label >Password</label>
							<input type="password" name="password" value="<?php ?>" placeholder="Password" autocomplete="new-password">
						</div>
						<div class="form-group">
							<label for="">Phone</label>
							<input type="number" name="phone" value="<?php echo $row['phone']; ?>" placeholder="Phone">
						</div>
						<div class="form-group">
							<label for="">Address</label>
							<input type="text" name="address" value="<?php echo $row['address']; ?>" placeholder="Address">
						</div>
						<div class="form-group text-center">
							<button type="submit" name="register" class="btn btn-primary">Update</button>
							<button type="reset" name="reset" class="btn btn-primary">Reset</button>
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

