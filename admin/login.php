<?php 
ob_start();
session_start();

include_once "database.php";

if(isset($_SESSION['admin'])){
    header('location: index.php');
}

if(isset($_POST["btn_login"])){
    $username= $_POST['txt_username'];
    $password= sha1($_POST['txt_password']);

    $sql= "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $query= mysqli_query($conn, $sql);
    $count= mysqli_num_rows($query);
    if($count>0){
        $_SESSION['admin']= mysqli_fetch_array($query); 
        header('location: index.php');
    }
}





 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <base href="">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
       

</head>

<body>
   

<div class="login">
    <h3>Login</h3>
    <form action="" method="post">
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" name="txt_username">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="txt_password">
        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input">
                Rememmber me
            </label>
        </div>
        <div class="form-group text-center">
            <button role="button" name="btn_login" class="btn btn-primary">Login</button>
            <!-- <input type="submit" name="btn_login" class="btn btn-primary"> -->
        </div>
    </form>
</div>


</body>










</html>