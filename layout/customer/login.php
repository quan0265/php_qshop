<?php 

if(isset($_POST['login'])){

	$username= $_POST['username'];

	$password= sha1($_POST['password']);

	$sql= "SELECT * FROM customers WHERE username='$username' AND password='$password'";
	$query= mysqli_query($conn, $sql);

	if(mysqli_num_rows($query)>0){


		$row= mysqli_fetch_array($query);
		$_SESSION['customer']= $row;

		header('location: index.php');
	}
	else{
		$error= '<div class="alert alert-danger">username hoặc password không đúng</div>';
	}
}



 ?>

<div class="container">
	<div class="bread-crumb">
		<a href="index.php">Home</a>

		<i class="fas fa-angle-right"></i>
		<span>login</span>
	
	</div>
	<div class="product-main">
		<div class="row">
			<div class="col-md-9 col-sm-8 col-12">
				<div class="page-login">
					<form action="" method="post" autocomplete="off">
						<!-- <h4>Login</h4> -->
						<!-- <div class="alert alert-danger">username hoặc password không đúng</div> -->
						<?php if(isset($error)) echo $error; ?>
						<div class="form-group">
							<label for="">Username</label>
							<input type="text" name="username" value="" placeholder="Username" autocomplete="nope">
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" name="password" value="" placeholder="Password" autocomplete="new-password">
						</div>
						<div class="form-group text-center">
							<button type="submit" name="login" class="btn btn-primary">Login</button>
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

