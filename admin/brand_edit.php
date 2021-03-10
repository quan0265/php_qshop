<?php 

$brand_id= $_GET['id'];
$sql= "SELECT * FROM brands WHERE brand_id='$brand_id'";
$query= mysqli_query($conn, $sql);
$row= mysqli_fetch_array($query);


if(isset($_POST['submit'])){
    $cate_id= $_POST['cate_id'];
    $brand_name= $_POST['brand_name'];
    

    if($brand_name!="1"){
        $sql= "UPDATE brands set cate_id='$cate_id',brand_name='$brand_name' WHERE brand_id='$brand_id'";
        if(mysqli_query($conn, $sql)){
            
            header('location: index.php?layout=brand_list');
        }
    }else{
        $thongbao= '<div class="alert alert-danger">thông tin không được để trống</div>';
    }
}







 ?>


<h3>Brands edit</h3>
<div class="main-body">
    <form action="" method="POST">
        <?php 
            if(isset($thongbao)) echo $thongbao;
             ?>
        <div class="form-group">
            <label>Category Name</label>
            <select class="d-block" name="cate_id">
                <?php 
                $sql1= "SELECT * FROM categories";
                $query1= mysqli_query($conn, $sql1);
                while($row1= mysqli_fetch_array($query1)){

                 ?>
                <option <?php if($row['cate_id']==$row1['cate_id']) echo "selected"; ?> value="<?php echo $row1['cate_id']; ?>"><?php echo $row1['cate_name']; ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" required="" value="<?php echo $row['brand_name']; ?>" name="brand_name" placeholder="Please Enter Name" />
            <?php 
            
             ?>
        </div>
        
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>
    </form> 
</div>