<?php
    if(!isset($_SESSION['admin_name']))
          {
            header('Location:../../../index.php?sidebar=login');
          }
    $sql_brand = "SELECT * FROM tbl_brands
    WHERE brand_id =".$_GET["brandId"];
    $brand_query = mysqli_query($con,$sql_brand);
?>
<div class="content">
        <h3 class="title">Chỉnh sửa thông tin hãng</h3>
    <form class="add-form" method="POST" enctype="multipart/form-data" action="pages/main-content/brand/function.php?brandId=<?php echo $_GET['brandId'];?>">
    <?php 
            while($row_brand = mysqli_fetch_array($brand_query))
            {?>    
    <div>
            <label>Tên hãng:</label>
            <input type="text" name="brand_name" value="<?php echo $row_brand['brand_name'] ?>">
        </div>
        <div>
            <label>Logo hãng:</label>
            <img width="200px" height="auto" src="../images/brand/<?php echo $row_brand['brand_img'];?>" alt="ảnh">
        </div>
        <div>
            <label>Thay đổi logo:</label>
            <input type="file" name="brand_img" value="<?php echo $row_product['brand_img'];?>">
        </div>
        <div>
            <label>Trạng thái: </label>
            <select name="brand_active" id="status">
                <option value="1">Hiển thị</option> 
                <option value="0">Ẩn</option> 
            </select>    
        </div>
        <?php } ?>
        <div>
            <input type="submit" value="Cập nhật" name="update-brand">
        </div>
    </form>
</div>