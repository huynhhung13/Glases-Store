<?php
    if(!isset($_SESSION['admin_name']))
          {
            header('Location:../../../index.php?sidebar=login');
          }
    $sql_product ="SELECT * FROM tbl_products WHERE product_id =".$_GET["productId"];
    $product_query = mysqli_query($con,$sql_product);

    $sql_category = "SELECT * FROM tbl_categories ORDER BY category_id, category_name";
    $category_query = mysqli_query($con,$sql_category);

    $sql_brand = "SELECT * FROM tbl_brands";
    $brand_query = mysqli_query($con,$sql_brand);
?>
<div class="content">
        <h3 class="title">Chỉnh sửa sản phẩm</h3>
    <form class="add-form" method="POST" enctype="multipart/form-data" action="pages/main-content/product/function.php?productId=<?php echo $_GET['productId'];?>">
    <?php 
            while($row_product = mysqli_fetch_array($product_query))
            {?>    
    <div>
            <label>Tên sản phẩm:</label>
            <input type="text" name="product_name" value="<?php echo $row_product['product_name'];?>">
        </div>
        <div>
            <label>Mô tả sản phẩm:</label>
            <input type="text" name="product_describe" value="<?php echo $row_product['product_describe'];?>">
        </div>
        <div>
            <label>Mô tả size:</label>
            <input type="text" name="product_size_describe" value="<?php echo $row_product['product_size_describe'];?>">
        </div>
        <div>
            <label>Đơn giá sản phẩm:</label>
            <input type="text" name="product_price" value="<?php echo $row_product['product_price'];?>">
        </div>
        <div>
            <label>Hình ảnh sản phẩm:</label>
            <img width="200px" height="auto" src="../images/product/<?php echo $row_product['product_img'];?>" alt="ảnh">
        </div>
        <div>
            <label>Thay đổi hình ảnh:</label>
            <input type="file" name="product_img" value="<?php echo $row_product['product_img'];?>">
        </div>
        <div>
            <label>Số lượng tồn:</label>
            <input type="text" name="product_quantity" value="<?php echo $row_product['product_quantity'];?>">
        </div>
        <div>
                <label for="category">Tên danh mục: </label>
                <select name="category_id" id="category">
                    <?php 
                        while($row_category = mysqli_fetch_array($category_query)) 
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
                        while($row_brand = mysqli_fetch_array($brand_query)) 
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
    <?php
        }
    ?>    
        </div>
            <input type="submit" value="Cập nhật" name="update-product">
    </form>
</div>