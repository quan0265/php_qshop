<?php 



if(isset($_POST['submit'])){
    $cate_id= $_POST['cate_id'];
    $brand_name= $_POST['brand_name'];
   
    if($brand_name!=""){
        $sql= "INSERT INTO brands(cate_id,brand_name) VALUES('$cate_id','$brand_name')";
        if(mysqli_query($conn, $sql)){
            $thongbao= '<div class="alert alert-success">
                            Thêm thành công
                        </div>';
        }
        else{
            $thongbao= '<div class="alert alert-success">
                            Thêm không thành công
                        </div>';
                        echo mysqli_error($conn);
        }
    }
}







 ?>


<h3>Brands add</h3>
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
            <label>Category Name</label>
            <select class="d-block" name="cate_id">
                <?php 
                $sql1= "SELECT * FROM categories";
                $query1= mysqli_query($conn, $sql1);
                while($row1= mysqli_fetch_array($query1)){

                 ?>
                <option value="<?php echo $row1['cate_id']; ?>"><?php echo $row1['cate_name']; ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" required="" name="brand_name" placeholder="Please Enter Name" />
            <?php 
            
             ?>
        </div>
        
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">ADD</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>
    </form> 
</div>