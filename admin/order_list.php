<h3>Order list</h3>
<div class="main-body">
    <div class="main-table">
        <table id="myTable"  class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Total money</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql= "SELECT * FROM orders INNER JOIN customers ON orders.customer_id=customers.id";
                $query= mysqli_query($conn, $sql);
                while($row= mysqli_fetch_array($query)){

                 ?>
                <tr>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['full_name']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['total_money']; ?></td>
                    <td><?php echo $row['order_date']; ?></td>
                    <td>
                        <?php 
                        if($row['order_status']=='1'){
                            echo 'Đang xử lý...';
                        }
                        else if($row['order_status']=='2'){
                            echo 'Đang gửi hàng';
                        }
                        else if($row['order_status']=='3'){
                            echo 'Đã nhận hàng';
                        }

                         ?>
                    </td>
                    <td>
                        <?php 
                        if($row['order_status']=='1'){
                            echo '<a href="index.php?layout=order_confirm&order_id='.$row['order_id'].'&order_status=1" class="btn btn-primary">shipping</a>';
                        }
                        else if($row['order_status']=='2'){
                            echo '<a href="index.php?layout=order_confirm&order_id='.$row['order_id'].'&order_status=2" class="btn btn-success">confirm</a>';
                        }
                        else if($row['order_status']=='3'){

                         ?>
                         <a class="btn btn-danger" onclick="return confirm('bạn có chắc muốn xóa không');" href="index.php?layout=order_delete&order_id=<?php echo $row['order_id']; ?>">Delete</a>
                     <?php } ?>
                    </td>
                    <td><a href="index.php?layout=order_detail&order_id=<?php echo $row['order_id']; ?> ">detail</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div> 
</div>