<?php
    if(!isset($_SESSION['admin_name']))
        {
            header('Location:../../../index.php?sidebar=login');
        }
    $sql_category = "SELECT * FROM tbl_categories ORDER BY category_id, category_name";
    $category_query = mysqli_query($con,$sql_category);

    $sql_brand = "SELECT * FROM tbl_brands";
    $brand_query = mysqli_query($con,$sql_brand);
?>
<div class="content">
        <h3 class="title">Thêm sản phẩm</h3>
    <form class="add-form" method="POST" enctype="multipart/form-data" action="pages/main-content/product/function.php" name="frm" onsubmit="return data_check();">
        <div>
            <label>Tên sản phẩm:</label>
            <input type="text" name="product_name">
            <span style="color:red" id="product_name_error"></span>
        </div>
        <div>
            <label>Mô tả sản phẩm:</label>
            <input type="text" name="product_describe">
        </div>
        <div>
            <label>Mô tả size:</label>
            <input type="text" name="product_size_describe">
        </div>
        <div>
            <label>Đơn giá sản phẩm:</label>
            <input type="text" name="product_price">
            <span style="color:red" id="product_price_error"></span>
        </div>
        <div>
            <label>Hình ảnh sản phẩm:</label>
            <input type="file" name="product_img">
        </div>
        <div>
            <label>Số lượng thêm:</label>
            <input type="text" name="product_quantity">
            <span style="color:red" id="product_price_error"></span>
        </div>
        <div>
                <label for="category">Tên danh mục: </label>
                <select name="category_id" id="category">
                    <?php 
                        while($row_category = mysqli_fetch_array($category_query)) //show category and classify
                        {
                    ?>
                            <option value="<?php echo $row_category['category_id']?>"><?php echo $row_category['category_name']?></option>  
                    <?php
                        }
                    ?> 
                </select>    
        </div>
        <div>
                <label for="brand">Tên hãng: </label>
                <select name="brand_id" id="brand">
                    <?php 
                        while($row_brand = mysqli_fetch_array($brand_query)) //show category and classify
                        {
                    ?>
                            <option value="<?php echo $row_brand['brand_id']?>"><?php echo $row_brand['brand_name']?></option>  
                    <?php
                        }
                    ?> 
                </select>    
        </div>
        <div>
            <label for="brand">Trạng thái: </label>
            <select name="product_active" id="status">
                <option value="1">Hiển thị</option> 
                <option value="0">Ẩn</option> 
            </select>    
        </div>
            <input type="submit" value="Thêm sản phẩm" name="add-product">
    </form>
</div>