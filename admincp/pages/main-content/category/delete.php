<?php
    include("../../../../config/connectdb.php");
    if($_GET['action']=='delete' && isset($_GET['categoryId']))
    {
        $category_id = $_GET['categoryId'];
        $del_category = "DELETE FROM tbl_categories WHERE category_id=$category_id";
        mysqli_query($con, $del_category);
        header('Location:../../../index.php?sidebar=category-list');
    }
?>