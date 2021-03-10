<?php 

if(!isset($_GET['id'])){
   header('Location: index.php');
}

$id= (int)$_GET['id'];

$sql= "SELECT * FROM sliders WHERE id=$id";
$query= mysqli_query($conn, $sql);
$row= mysqli_fetch_array($query);


if(isset($_POST['submit'])){
    $name= $_POST["name"];
    $display= (int)$_POST["display"];

    if($_FILES['image']['name']==''){
      $image= $row['image'];
    }
    else{
      $image= $_FILES['image']['name'];
      $image= rand(1,10000).$image;

      $type= $_FILES['image']['type'];
      $tmp_name= $_FILES['image']['tmp_name'];
      // echo $type;

      if($type!='image/jpg' && $type=='image/png' && $type!='image/jpeg' && $type!='image/JPG' && $type=='image/PNG' && $type!='image/JPEG'){
         $error_image= '<span class="error">ảnh phải định dạng jpg hoặc png hoặc jpeg</span>';
         
      }
    }
    echo $image;
    if($name!="" && $image!="" && $display!="" && !isset($error_image)){
      
         $sql= "UPDATE sliders SET name='$name',image='$image',display='$display' WHERE id=$id ";
        
         if(mysqli_query($conn, $sql)){
             
             
             // xoa file cu
             if(file_exists('../images/slider/'.$row['image']) && $_FILES['image']['name']!=''){
                unlink('../images/slider/'.$row['image']);
             }

             move_uploaded_file($tmp_name, '../images/slider/'.$image);

             header('location: index.php?layout=slider_list');
         }
         else{
             echo mysqli_error($conn);
         }
    }

               
}

 ?>
<h3>Slider edit</h3>
<div class="main-body">
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- <div class="alert alert-success">thêm thành công</div> -->
        <!-- <div class="alert alert-danger">thông tin không được để trống</div> -->
        
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" value="<?php if(isset($row['name'])) echo $row['name']; ?>" name="name" required="" placeholder="Please Enter  Name" />
        </div>
        <div class="form-group">
            <label>Images</label><?php if(isset($error_image)) echo $error_image; ?>
            <input class="d-block" type="file" name="image">
        </div>
        <div class="form-group">
            <label>Display</label>
            <div class="d-block">
                <label><input type="radio" name="display" value="1" <?php if(isset($row['display']) && $row['display']=="1") echo 'checked=""'; ?> >On</label>
                <label><input type="radio" name="display" value="2" <?php if(isset($row['display']) && $row['display']=="2") echo 'checked=""'; ?> >Off</label>
            </div>
        </div>
        
        
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>
    </form> 
</div>









<script type="text/javascript">

    



</script>