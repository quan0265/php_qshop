<h3>Quản lý sản phẩm</h3>
<div class="main-body">
    <div class="main-table">
        <table id="myTable"  class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql= "SELECT * FROM categories";
                $query= mysqli_query($conn, $sql);
                while($row= mysqli_fetch_array($query)){

                 ?>
                <tr>
                    <td><?php echo $row['cate_id']; ?></td>
                    <td><?php echo $row['cate_name']; ?></td>
                    <td><a href="index.php?layout=cate_edit&id=<?php echo $row['cate_id']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a></td>
                    <td><a href="index.php?layout=cate_delete&id=<?php echo $row['cate_id']; ?>" onclick="return confirm('bạn có chắc muốn xóa không');"  ><i class="fas fa-trash"></i> Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div> 
</div>