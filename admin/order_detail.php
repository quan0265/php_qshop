<?php 
if(isset($_GET['order_id'])){
    $order_id= $_GET['order_id'];
}
else{
    header('location: index.php');
}

 ?>
<h3>Order detail</h3>
<div class="main-body">
    <div class="main-table">
        <table id="myTable"  class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>stt</th>
                    <th>image</th>
                    <th>name</th>
                    <th>price</th>
                    <th>quanlity</th>
                    <th>total price</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql= "SELECT * FROM order_detail INNER JOIN products ON order_detail.product_id=products.product_id WHERE order_id='$order_id' ORDER BY id ASC";

                $query= mysqli_query($conn, $sql);
                $stt=0;
                $total_money=0;
                while($row= mysqli_fetch_array($query)){
                    $stt++;
                    $total_money= $total_money + $row['total_price'];
                 ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><img width="50" src="../images/product/<?php echo $row['product_image']; ?>" alt=""></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['product_price']; ?><sup>đ</sup></td>
                    <td><?php echo $row['quanlity']; ?></td>
                    <td><?php echo $row['total_price'] ?><sup>đ</sup></td>
                </tr>
            <?php } ?>
                <tr>
                    <td colspan="6" class="text-right">total money: <?php echo $total_money; ?><sup>đ</sup></td>
                </tr>
            </tbody>
        </table>
    </div> 
</div>