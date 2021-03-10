<h3>Brands list</h3>
<div class="main-body">
    <div class="main-table">
        <table id="myTable"  class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql= "SELECT * FROM brands INNER JOIN categories ON brands.cate_id=categories.cate_id";
                $query= mysqli_query($conn, $sql);
                while($row= mysqli_fetch_array($query)){

                 ?>
                <tr>
                    <td><?php echo $row['brand_id']; ?></td>
                    <td><?php echo $row['cate_name']; ?></td>
                    <td><?php echo $row['brand_name']; ?></td>
                    <td><a href="index.php?layout=brand_edit&id=<?php echo $row['brand_id']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a></td>
                    <td><a href="index.php?layout=brand_delete&id=<?php echo $row['brand_id']; ?>" onclick="return confirm('bạn có chắc muốn xóa không');"  ><i class="fas fa-trash"></i> Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div> 
</div>