<?php 

if(!isset($_GET['id'])){
   header('Location: index.php');
}

$id= (int)$_GET['id'];

$sql= "SELECT * FROM products INNER JOIN brands ON products.brand_id=brands.brand_id WHERE product_id=$id ";
$query= mysqli_query($conn, $sql);
$row= mysqli_fetch_array($query);


if(isset($_POST['submit'])){
    $brand_id= $_POST['brand_id'];
    $product_name= $_POST['name'];
    $product_price= (int)$_POST['price'];
    $product_price_old= (int)$_POST['price_old'];
    
    $product_quanlity= $_POST['quanlity'];
    $product_warranty= $_POST['warranty'];
    $product_detail= $_POST['detail'];

    if($_FILES['image']['name']==''){
      $product_image= $row['product_image'];
    }
    else{
      $product_image= $_FILES['image']['name'];
      $product_image= rand(1,10000).$product_image;

      $type= $_FILES['image']['type'];
      $tmp_name= $_FILES['image']['tmp_name'];
      echo $type;

      if($type!='image/jpg' && $type=='image/png' && $type!='image/jpeg' && $type!='image/JPG' && $type=='image/PNG' && $type!='image/JPEG'){
         $error_image= '<span class="error">ảnh phải định dạng jpg hoặc png hoặc jpeg</span>';
         
      }
    }

    if($brand_id!='' && $product_name!='' && $product_price!='' && $product_image!='' && $product_quanlity!='' && $product_warranty!='' && $product_detail!='' && !isset($error_image)){

         $sql= "UPDATE products SET brand_id='$brand_id',product_name='$product_name',product_price='$product_price',product_price_old='$product_price_old',product_image='$product_image',product_quanlity='$product_quanlity',product_warranty='$product_warranty',product_detail='$product_detail' WHERE product_id=$id ";
        
         if(mysqli_query($conn, $sql)){
             
             
             // xoa file cu
             if(file_exists('../images/product/'.$row['product_image']) && $_FILES['image']['name']!=''){
                unlink('../images/product/'.$row['product_image']);
             }

             move_uploaded_file($tmp_name, '../images/product/'.$product_image);

             header('location: index.php');
         }
         else{
             echo mysqli_error($conn);
         }
    }

               
}

 ?>
<h3>Product edit</h3>
<div class="main-body">
    

    <form action="" method="POST" enctype="multipart/form-data">
        <!-- <div class="alert alert-success">thêm thành công</div> -->
        <!-- <div class="alert alert-danger">thông tin không được để trống</div> -->
        
        <div class="form-group">
            <label>Category Name</label>
            <select id="cate_id" class="d-block" name="cate_id">
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
            <label>Brands Name</label>
            <select id="brand_id" brand_id="<?php echo $row['brand_id']; ?>" class="d-block" name="brand_id">
                

            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" value="<?php echo $row['product_name']; ?>"  name="name" required="" placeholder="Please Enter  Name" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" class="form-control" value="<?php echo $row['product_price']; ?>" name="price" required="" placeholder="Please Enter Price" />
        </div>
        <div class="form-group">
            <label>Price Old</label>
            <input type="number" class="form-control" value="<?php echo $row['product_price_old']; ?>" name="price_old" placeholder="Please Enter Price Old" />
        </div>
        <div class="form-group">
            <label>Warranty</label>
            <input type="text" class="form-control" value="<?php echo $row['product_warranty']; ?>" name="warranty" required="" placeholder="Please Enter Warranty" />
        </div>
        <div class="form-group">
            <label>Quanlity</label>
            <input type="number" class="form-control" value="<?php echo $row['product_quanlity']; ?>" name="quanlity" required="" placeholder="Please Enter Quanlity" />
        </div>
        <div class="form-group">
            <label>Images</label><?php if(isset($error_image)) echo $error_image; ?>
            <input class="d-block" value="123" type="file" name="image">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea id="editor" class="form-control" name="detail" required="" rows="3"><?php echo $row['product_detail']; ?></textarea>
        </div>
        <script type="text/javascript">
            // CKEDITOR.replace('detail');
            var editor = CKEDITOR.replace( 'editor' );
            CKFinder.setupCKEditor( editor );
        </script>
        
        
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>
    </form> 
</div>









<script type="text/javascript">

  $(document).ready(function(){

    var cate_id= $("#cate_id").val();
    var brand_id= $("#brand_id").attr("brand_id");
    $.post('ajax/action.php', {cate_id:cate_id, brand_id:brand_id}, function(data){
        $("#brand_id").html(data);
    });

    $("#cate_id").change(function(){
        var cate_id= $("#cate_id").val();
        var brand_id= $("#brand_id").attr("brand_id");
        $.post('ajax/action.php', {cate_id:cate_id, brand_id:brand_id}, function(data){
            $("#brand_id").html(data);
        });
    });


});



</script>