

<h3>Quản lý sản phẩm</h3>
<div class="main-body">
    <div class="main-table">
        <table id="myTable"  class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Price old</th>
                    <th>Image</th>
                    <th>Warranty</th>
                    <th>Quanlity</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql= "SELECT * FROM products INNER JOIN brands ON products.brand_id=brands.brand_id INNER JOIN categories ON brands.cate_id=categories.cate_id ";
                $query= mysqli_query($conn, $sql);
                while($row= mysqli_fetch_array($query)){

                 ?>
                <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['cate_name']; ?></td>
                    <td><?php echo $row['brand_name']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['product_price']; ?></td>
                    <td><?php echo $row['product_price_old']; ?></td>
                    <!-- <td><img width="50px" height="100px" src="images/product/<?php echo $row['product_image']; ?>" alt=""></td> -->
                    <td><img width="80px" height="80px" src="../images/product/<?php echo $row['product_image']; ?>" alt=""></td>
                    <td><?php echo $row['product_warranty']; ?></td>
                    <td>
                        <?php echo $row['product_quanlity']; ?>
                    </td>
                    <td><a href="index.php?layout=product_edit&id=<?php echo $row['product_id']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a></td>
                    <td><a href="index.php?layout=product_delete&id=<?php echo $row['product_id']; ?>" onclick="return confirm('bạn có chắc muốn xóa không');"  ><i class="fas fa-trash"></i> Delete</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div> 
</div>