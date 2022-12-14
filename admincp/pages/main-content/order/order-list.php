<?php
    if(!isset($_SESSION['admin_name']))
          {
            header('Location:../../../index.php?sidebar=login');
          }
    $sql_order = "SELECT tbl_order.*, tbl_ship_info.*,
    tbl_products.product_name, tbl_products.product_price AS price, tbl_customers.*, tbl_status.*, tbl_payment.*
    FROM tbl_order, tbl_ship_info, tbl_products, tbl_customers, tbl_payment, tbl_status
    WHERE tbl_order.product_id = tbl_products.product_id
    AND tbl_order.ship_id = tbl_ship_info.ship_id
    AND tbl_order.customer_id = tbl_customers.customer_id
    AND tbl_order.status_id = tbl_status.status_id
    AND tbl_order.payment_id = tbl_payment.payment_id
    ORDER BY order_id DESC";
    $order_query = mysqli_query($con,$sql_order);
?>
<div class="container">
        <h3 class="title">Danh sách đơn hàng</h3>
    <table class="styled-table">
        <thead>
            <tr>
                <th width=60px>STT</th>
                <th >Tên khách hàng</th>
                <th >Số lượng sản phẩm</th>
                <th >Phương thức thanh toán</th>
                <th>Tình trạng</th>
                <th>Thời gian tạo</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $id =0;
                while($row_order = mysqli_fetch_array($order_query))
                {
                    $id++;
            ?>
                <tr>
                    <td ><?php echo $id;?></td>
                    <td ><?php echo $row_order['name'];?></td>
                    <td ><?php
                        $total = $row_order['product_quantity'];
                        echo $total;
                    ?></td>
                    <td ><?php echo $row_order['payment_method'];?></td>
                    <td><?php echo $row_order['status_name']; ?></td>
                    <td><?php echo $row_order['create_at']; ?></td>
                    <td >
                    <a style="color:#009879" href="index.php?sidebar=order-detail&orderId=<?php echo $row_order['order_id'];?>">
                        <h5>Chi tiết đơn hàng</h5>
                        </a>
                    </td>
                    <td >
                    <a style="color:#009879" href="pages/main-content/order/cancel.php?action=cancel&orderId=<?php echo $row_order['order_id'];?>">
                        <h5>Hủy đơn</h5>
                    </a>
                    </td>
                </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
</div>