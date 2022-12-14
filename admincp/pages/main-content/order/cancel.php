<?php
    include("../../../../config/connectdb.php");
    if($_GET['action']=='cancel' && isset($_GET['orderId']))
    {
        $order_id = $_GET['orderId'];
        $cancel_ord = "UPDATE tbl_order SET status_id=4 WHERE order_id=$order_id";
        mysqli_query($con, $cancel_ord);
        header('Location:../../../index.php?sidebar=order-list');
    }
?>