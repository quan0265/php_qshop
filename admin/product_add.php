<?php 

if(isset($_POST['submit'])){
    // $cate_id= $_POST['cate_id'];
    $brand_id= $_POST['brand_id'];
    $product_name= $_POST['name'];
    $product_price= (int)$_POST['price'];
    $product_price_old= (int)$_POST['price_old'];
    $product_image= $_FILES['image']['name'];
    $product_quanlity= $_POST['quanlity'];
    $product_warranty= $_POST['warranty'];
    $product_detail= $_POST['detail'];

    if($brand_id!='' && $product_name!='' && $product_price!='' && $product_image!=''  && $product_quanlity!='' && $product_warranty!='' && $product_detail!=''){
        $type= $_FILES['image']['type'];
        $tmp_name= $_FILES['image']['tmp_name'];
        if($type=='image/jpg' || $type=='image/png' || $type=='image/jpeg'){
            // echo $type;
            $product_image= rand(1,10000).$product_image;

            $sql= "INSERT INTO products(brand_id,product_name,product_price,product_price_old,product_image,product_quanlity,product_warranty,product_detail) VALUES('$brand_id','$product_name','$product_price','$product_price_old','$product_image','$product_quanlity','$product_warranty','$product_detail')";
           
            if(mysqli_query($conn, $sql)){
                move_uploaded_file($tmp_name, '../images/product/'.$product_image);
                $thongbao= '<div class="alert alert-success">thêm thành công</div>';
            }
            else{
                echo mysqli_error($conn);
            }

            
        }
        else{
            $error_image= '<span class="error">ảnh phải định dạng jpg hoặc png hoặc jpeg</span>';
        }
    }
    else{
        $error= '<div class="alert alert-danger">thông tin không được để trống</div>';
    }

    
}

 ?>
<h3>Product add</h3>
<div class="main-body">
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- <div class="alert alert-success">thêm thành công</div> -->
        <!-- <div class="alert alert-danger">thông tin không được để trống</div> -->
        <?php 
        if(isset($thongbao)) echo $thongbao;
        if(isset($error)) echo $error;

         ?>
        <div class="form-group">
            <label>Category Name</label>
            <select id="cate_id" class="d-block" name="cate_id">
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
            <label>Brands Name</label>
            <select id="brand_id" class="d-block" name="brand_id">
               <!-- ajax -->

            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" required="" placeholder="Please Enter  Name" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" class="form-control" name="price" required="" placeholder="Please Enter Price" />
        </div>
        <div class="form-group">
            <label>Price Old</label>
            <input type="number" class="form-control" name="price_old" placeholder="Please Enter Price Old" />
        </div>
        <div class="form-group">
            <label>Warranty</label>
            <input type="text" class="form-control" name="warranty" required="" placeholder="Please Enter Warranty" />
        </div>
        <div class="form-group">
            <label>Quanlity</label>
            <input type="number" class="form-control" value="0" name="quanlity" required="" placeholder="Please Enter Quanlity" />
        </div>
        <div class="form-group">
            <label>Images</label><?php if(isset($error_image)) echo $error_image; ?>
            <input class="d-block" type="file" required="" name="image">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea id="editor" class="form-control" name="detail" required="" rows="3"></textarea>
        </div>
        <script type="text/javascript">
            // CKEDITOR.replace('detail');
            var editor = CKEDITOR.replace( 'editor' );
            CKFinder.setupCKEditor( editor );
        </script>
        
        
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Add</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>
    </form> 
</div>









<script type="text/javascript">

$(document).ready(function(){

    var cate_id= $("#cate_id").val();
    $.post('ajax/action.php', {cate_id:cate_id}, function(data){
        $("#brand_id").html(data);
    });

    $("#cate_id").change(function(){
        var cate_id= $("#cate_id").val();
        $.post('ajax/action.php', {cate_id:cate_id}, function(data){
            $("#brand_id").html(data);
        });
    });


});
    



</script>