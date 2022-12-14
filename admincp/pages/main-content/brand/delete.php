<?php
    include("../../../../config/connectdb.php");
    if($_GET['action']=='delete' && isset($_GET['brandId']))
    {
        $brand_id = $_GET['brandId'];
        $del_brand = "DELETE FROM tbl_brands WHERE brand_id=$brand_id";
        mysqli_query($con, $del_brand);
        header('Location:../../../index.php?sidebar=brand-list');
    }
?>
<?php
    if(null !== mysqli_query($con, $del_brand))
    {
?>
    <script>alert("Xóa thành công!");</script>
<?php
    }else{
?>
    <script>alert("Xóa không thành công");</script>
<?php
    }
?>