<?php 

if(!isset($_SESSION['admin'])){
    header('location: index.php');
}

$id= $_SESSION['admin']['id'];

$sql= "SELECT * FROM admin WHERE id='$id'";

$query= mysqli_query($conn, $sql);

$row= mysqli_fetch_array($query);



if(isset($_POST['submit'])){
    $username= $_POST['username'];

    $email= $_POST['email'];

    $password= $_POST['password'];

    if($username!="" && $email !="" && $password !=""){
        $sql= "UPDATE admin SET username='$username',password='$password',password='$password' WHERE id='id'";
        mysqli_query($conn, $sql);
        $thongbao= '<div class="alert alert-success">Sửa thành công</div>';
    }
    else{
        $thongbao= '<div class="alert alert-danger">thông tin không được để trống</div>';
    }

}




 ?>


<h3>Setting</h3>
<div class="main-body">
    <form action="" method="POST">
        <?php 
            if(isset($thongbao)) echo $thongbao;
             ?>
            <!-- <div class="alert alert-success">
                Thêm danh mục thành công
            </div>
            <div class="alert alert-danger">
                Thêm danh mục không thành công
            </div> -->
        <div class="form-group">
            <label >Username</label>
            <input class="form-control" type="text" name="username" value="<?php echo $row['username']; ?>" placeholder="Username" autocomplete="nope" required="">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input class="form-control" required="" type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Email" autocomplete="off">
        </div>
        <div class="form-group">
            <label >Password</label>
            <input class="form-control"  type="password" name="password" value="<?php ?>" placeholder="Password" autocomplete="new-password">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>
    </form> 
</div>