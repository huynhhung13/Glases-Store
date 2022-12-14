<?php
    include("../../../../config/connectdb.php");
    if($_GET['action']=='delete' && isset($_GET['productId']))
    {
        $product_id = $_GET['productId'];
        $sql_product = "SELECT product_img FROM tbl_products WHERE product_id=$product_id";
        $product_query = mysqli_query($con,$sql_product);
        while($row_product = mysqli_fetch_array($product_query))
            unlink($folder_path.$row_product['product_img']);

        $del_product = "DELETE FROM tbl_products WHERE product_id=$product_id";
        mysqli_query($con, $del_product);
        header('Location:../../../index.php?sidebar=product-list');
    }
?>