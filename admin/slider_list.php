<?php 

if(isset($_GET['id']) && isset($_GET['display'])){

    $id= (int)$_GET['id'];
    $display= (int)$_GET['display'];

    $display= $display==1? 2:1;

    $sql= "UPDATE sliders SET display='$display' WHERE id='$id'";

    $query= mysqli_query($conn, $sql);



}





 ?>

<h3>Slider list</h3>
<div class="main-body">
    <div class="main-table">
        <table id="myTable"  class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Display</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql= "SELECT * FROM sliders";
                $query= mysqli_query($conn, $sql);
                while($row= mysqli_fetch_array($query)){

                 ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><img src="../images/slider/<?php echo $row['image']; ?>" width="80px" height="auto" alt=""></td>
                    <td><a href="index.php?layout=slider_list&id=<?php echo $row['id']; ?>&display=<?php echo $row['display']; ?>">
                        <?php if($row['display']=='1'){ echo 'On'; } else{ echo 'Off'; } ?>
                    </a></td>
                    <td><a href="index.php?layout=slider_edit&id=<?php echo $row['id']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a></td>
                    <td><a href="index.php?layout=slider_delete&id=<?php echo $row['id']; ?>" onclick="return confirm('bạn có chắc muốn xóa không');"  ><i class="fas fa-trash"></i> Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div> 
</div>


