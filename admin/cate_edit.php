<?php 

$cate_id= $_GET['id'];
$sql= "SELECT * FROM categories WHERE cate_id='$cate_id'";
$query= mysqli_query($conn, $sql);
$row= mysqli_fetch_array($query);


if(isset($_POST['submit'])){
    $cate_name= $_POST['cate_name'];
    $check= 'false';

    if($cate_name!=""){
        $sql= "UPDATE categories set cate_name='$cate_name' WHERE cate_id='$cate_id'";
        if(mysqli_query($conn, $sql)){
            $thongbao= '<div class="alert alert-success">
                            Sửa thành công
                        </div>';
        }
        else{
            $thongbao= '<div class="alert alert-success">
                            Sửa không thành công
                        </div>';
        }
    }
}







 ?>


<h3>Category edit</h3>
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
            <label>Name</label>
            <input type="text" class="form-control" required="" value="<?php echo $row['cate_name']; ?>" name="cate_name" placeholder="Please Enter Category Name" />
            <?php 
            
             ?>
        </div>
        
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>
    </form> 
</div>