<?php
    include("../../../../config/connectdb.php");
    $cat_name = $_POST['cat_name'];
    $cat_active = $_POST['cat_active'];
    if(isset($_POST['add-cat']))
    {
        if($cat_name==""){
            echo "<script language = 'javascript'> alert('Không được bỏ trống tên danh mục'); window.location= '../../../index.php?sidebar=category-add';</script>";
        }
        else{
            $ins_cat = "INSERT INTO tbl_categories(category_name,category_active) 
        VALUE('$cat_name',$cat_active);";
        mysqli_query($con,$ins_cat);
        echo "<script language = 'javascript'> alert('Thêm danh mục thành công'); window.location= '../../../index.php?sidebar=category-add';</script>";
        }

    }else if(isset($_POST['update-cat']))
    {
            $cat_id = $_GET['categoryId'];
            $update_category = "UPDATE tbl_categories SET category_name='$cat_name',category_active='$cat_active'
             WHERE category_id=$cat_id";
        mysqli_query($con,$update_category);
        header('Location:../../../index.php?sidebar=category-list');
    }
?>