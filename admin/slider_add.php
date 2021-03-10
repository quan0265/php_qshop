<?php 

if(isset($_POST['submit'])){
    $name= $_POST["name"];

    $image= $_FILES['image']['name'];

    $display= (int)$_POST["display"];

    if($name!="" && $image!="" && $display!=""){
        $type= $_FILES['image']['type'];
        $tmp_name= $_FILES['image']['tmp_name'];
        if($type=='image/jpg' || $type=='image/png' || $type=='image/jpeg'){
            // echo $type;
            $image= rand(1,10000).$image;

            $sql= "INSERT INTO sliders(name,image,display) VALUES('$name','$image','$display')";
           
            if(mysqli_query($conn, $sql)){
                move_uploaded_file($tmp_name, '../images/slider/'.$image);
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
            <label>Name</label>
            <input type="text" class="form-control" name="name" required="" placeholder="Please Enter  Name" />
        </div>
        <div class="form-group">
            <label>Images</label><?php if(isset($error_image)) echo $error_image; ?>
            <input class="d-block" type="file" required="" name="image">
        </div>
        <div class="form-group">
            <label>Display</label>
            <div class="d-block">
                <label><input type="radio" name="display" value="1" checked="">On</label>
                <label><input type="radio" name="display" value="2" >Off</label>
            </div>
        </div>
        
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Add</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>
    </form> 
</div>









<script type="text/javascript">

    



</script>