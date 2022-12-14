<?php
    if(!isset($_SESSION['admin_name']))
          {
            header('Location:../../../index.php?sidebar=login');
          }
    $id =$_GET["orderId"];
    $sql_order = "SELECT tbl_order.*, tbl_ship_info.*,
    tbl_products.product_name, tbl_products.product_img, tbl_products.product_price AS price,
    tbl_customers.*, tbl_status.*, tbl_payment.*
    FROM tbl_order, tbl_ship_info, tbl_products, tbl_customers, tbl_payment, tbl_status
    WHERE tbl_order.product_id = tbl_products.product_id
    AND tbl_order.ship_id = tbl_ship_info.ship_id
    AND tbl_order.customer_id = tbl_customers.customer_id
    AND tbl_order.status_id = tbl_status.status_id
    AND tbl_order.payment_id = tbl_payment.payment_id
    AND tbl_order.order_id = $id
    ORDER BY order_id DESC";
    $order_query = mysqli_query($con,$sql_order);
?>
<div class="container">
        <h3 class="title">Chi tiết đơn hàng</h3>
    <table class="styled-table">
        <thead>
            <tr>
                <th> </th>
                <th >Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th >Số lượng</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($row_order = mysqli_fetch_array($order_query))
                {
            ?>
                <tr>
                    <td ><img width="100px" height="auto" src="../images/product/<?php echo $row_order['product_img'];?>" alt="ảnh"></td>
                    <td ><?php echo $row_order['product_name'];?></td>
                    <td><?php echo number_format($row_order['price'],0,'','.').'đ';?></td>
                    <td ><?php
                        echo $row_order['product_quantity'];
                    ?></td>
                    <td ><?php
                        $subtotal = 0;
                        $subtotal = $row_order['price'] * $row_order['product_quantity'];
                        echo number_format($subtotal,0,'','.').'đ';
                    ?></td>
                </tr>
            <?php 
                }
            ?>
            <tr bgcolor="#009879 !important" style="color:black; float:left;">
                    <td><h3 >Tổng thanh toán: <?php
                        $total = 0;
                        $total += $subtotal;
                        echo number_format($total,0,'','.').'đ';
                    ?></h3></td>
                </tr>
        </tbody>
    </table>
</div>
<br>
<div class="container">
        <h3 class="title">Chi tiết vận chuyển</h3>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Tên người nhận</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th >Ghi chú</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $id =$_GET["orderId"];
                $sql_ship = "SELECT tbl_order.*, tbl_ship_info.* FROM tbl_order, tbl_ship_info
                WHERE tbl_order.ship_id = tbl_ship_info.ship_id
                AND tbl_order.order_id = $id ";
                $ship_query = mysqli_query($con,$sql_ship);
                while($row_ship = mysqli_fetch_array($ship_query))
                {
            ?>
                <tr>
                    <td ><?php echo $row_ship['name'];?></td>
                    <td ><?php echo $row_ship['address'];?></td>
                    <td><?php echo $row_ship['phone'];?></td>
                    <td ><?php
                        echo $row_ship['note'];
                    ?></td>
                </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
</div>