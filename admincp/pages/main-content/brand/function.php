<?php
    include("../../../../config/connectdb.php");
    $brand_name = $_POST['brand_name'];
    $brand_active = $_POST['brand_active'];
    //get images
    $brand_img = $_FILES['brand_img']['name'];
    $brand_img_tmp = $_FILES['brand_img']['tmp_name'];
    $folder_path ='../../../../images/brand/';
    $flag_ok = true;

    // check file type
    $ex = array('jpg','jpeg','jfif','png', 'webp');
    $file_type = strtolower(pathinfo($folder_path.$brand_img, PATHINFO_EXTENSION));
    if(!in_array($file_type,$ex)){
        $flag_ok = false;
    }
    if(isset($_POST['add-brand']))
    {
        $brand_img = time().'_'.$brand_img;
        if($brand_img!='' && $flag_ok && $brand_name!="")
        {
        $ins_brand = "INSERT INTO tbl_brands(brand_name,brand_active,brand_img) 
        VALUE('$brand_name',$brand_active, '$brand_img');";
        move_uploaded_file($brand_img_tmp,$folder_path.$brand_img);
        }else if($brand_name==""){
            echo "<script language = 'javascript'> alert('Không được bỏ trống tên hãng!'); window.location= '../../../index.php?sidebar=brand-add';</script>";
        }
        else{
            $ins_brand = "INSERT INTO tbl_brands(brand_name,brand_active) 
            VALUE('$brand_name',$brand_active);";
            echo "<script language = 'javascript'> alert('Thêm hãng thành công!'); window.location= '../../../index.php?sidebar=brand-add';</script>";
        }
        mysqli_query($con,$ins_brand);
        header('Location:../../../index.php?sidebar=brand-add');
    }else if(isset($_POST['update-brand']))
    {
        if($brand_img!='' && $flag_ok)
        {
            $brand_img = time().'_'.$brand_img;
            $brand_id = $_GET['brandId'];
            //get name img and delete img
            $sql_brand = "SELECT brand_img FROM tbl_brands WHERE brand_id=$brand_id";
            $brand_query = mysqli_query($con,$sql_brand);
            while($row_brand = mysqli_fetch_array($brand_query))
                unlink($folder_path.$row_brand['brand_img']);

            
            $update_brand = "UPDATE tbl_brands SET brand_name='$brand_name',brand_active='$brand_active', brand_img='$brand_img'
                WHERE brand_id=$brand_id";
            move_uploaded_file($brand_img_tmp,$folder_path.$brand_img);
        }else
        {
            $brand_id = $_GET['brandId'];
            $update_brand = "UPDATE tbl_brands SET brand_name='$brand_name',brand_active='$brand_active'
             WHERE brand_id=$brand_id";
        }
        mysqli_query($con,$update_brand);
        header('Location:../../../index.php?sidebar=brand-list');
    }
?>