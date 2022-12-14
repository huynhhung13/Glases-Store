<?php
    include("../../../../config/connectdb.php");
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_describe'];
    $product_size_desc = $_POST['product_size_describe'];
    if(isset($_POST['product_price']))
    {
    $product_price = $_POST['product_price'];
    }else {
        $product_price = 1;
    }
    if(isset($_POST['product_quantity']))
    {
    $product_quantity = $_POST['product_quantity'];
    }else {
        $product_quantity = 1;
    }
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];
    $product_active = $_POST['product_active'];
    //get images
    $product_img = $_FILES['product_img']['name'];
    $product_img_tmp = $_FILES['product_img']['tmp_name'];
    $folder_path ='../../../../images/product/';
    $flag_ok = true;

    // check file type
    $ex = array('jpg','jpeg','jfif','png', 'webp');
    $file_type = strtolower(pathinfo($folder_path.$product_img, PATHINFO_EXTENSION));
    if(!in_array($file_type,$ex)){
        $flag_ok = false;
    }

    if(isset($_POST['add-product']))
    {
        if($product_img!='' && $flag_ok)
        {
            $product_img = time().'_'.$product_img;
            $ins_product = "INSERT INTO tbl_products(product_name,product_describe,product_size_describe,product_price,product_quantity,product_img,category_id, brand_id, product_active) 
            VALUE('$product_name','$product_desc','$product_size_desc',$product_price, $product_quantity,'$product_img',$category_id, $brand_id, $product_active)";
            move_uploaded_file($product_img_tmp,$folder_path.$product_img);
            echo "<script language = 'javascript'> alert('Thêm sản phẩm thành công'); window.location= '../../../index.php?sidebar=product-add';</script>";
        }
        else if($product_name=="" || $product_quantity<0 || $product_price<0){
            echo "<script language = 'javascript'> alert('Thêm sản phẩm thất bại'); window.location= '../../../index.php?sidebar=product-add';</script>";
        }else{
            $ins_product = "INSERT INTO tbl_products(product_name,product_describe,product_size_describe,product_price,product_quantity,category_id, brand_id, product_active) 
            VALUE('$product_name','$product_desc','$product_size_desc',$product_price, $product_quantity,$category_id, $brand_id, $product_active)";
            echo "<script language = 'javascript'> alert('Thêm sản phẩm thành công'); window.location= '../../../index.php?sidebar=product-add';</script>";
        mysqli_query($con,$ins_product);
        }
    }else if(isset($_POST['update-product']))
    {
        $product_id = $_GET['productId'];
        if($product_img!='' && $flag_ok)
        {
            $product_img = time().'_'.$product_img;

            //get name img and delete img
            $sql_product = "SELECT product_img FROM tbl_products WHERE product_id=$product_id";
            $product_query = mysqli_query($con,$sql_product);
            while($row_product = mysqli_fetch_array($product_query))
                unlink($folder_path.$row_product['product_img']);

            $update_product = "UPDATE tbl_products SET product_name='$product_name', product_describe='$product_desc', product_size_describe='$product_size_desc',
             product_price=$product_price, product_quantity=$product_quantity, product_img='$product_img', category_id=$category_id, brand_id=$brand_id, product_active=$product_active
             WHERE product_id=$product_id";
            move_uploaded_file($product_img_tmp,$folder_path.$product_img);
            echo "<script language = 'javascript'> alert('Cập nhật sản phẩm thành công'); window.location= '../../../index.php?sidebar=list-product';</script>";
        }else
        {
            $update_product = "UPDATE tbl_products SET product_name='$product_name', product_describe='$product_desc', product_size_describe='$product_size_desc',
             product_price=$product_price, product_quantity=$product_quantity, category_id=$category_id, brand_id=$brand_id, product_active=$product_active
             WHERE product_id=$product_id";
             echo "<script language = 'javascript'> alert('Cập nhật sản phẩm thành công'); window.location= '../../../index.php?sidebar=list-product';</script>";
        }
        mysqli_query($con,$update_product);
        
    }
?>