<?php 



if(isset($_POST['submit'])){
    $cate_name= $_POST['cate_name'];
   
    if($cate_name!=""){
        $sql= "INSERT INTO categories(cate_name) VALUES('$cate_name')";
        if(mysqli_query($conn, $sql)){
            $thongbao= '<div class="alert alert-success">
                            Thêm thành công
                        </div>';
        }
        else{
            $thongbao= '<div class="alert alert-success">
                            Thêm không thành công
                        </div>';
        }
    }
}







 ?>


<h3>Category add</h3>
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
            <input type="text" class="form-control" required="" name="cate_name" placeholder="Please Enter Category Name" />
            <?php 
            
             ?>
        </div>
        
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">ADD</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>
    </form> 
</div>