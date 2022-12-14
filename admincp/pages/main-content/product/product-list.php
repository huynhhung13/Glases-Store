<?php
    if(!isset($_SESSION['admin_name']))
          {
            header('Location:../../../index.php?sidebar=login');
          }
    $sql_product = "SELECT tbl_products.*, category_name, brand_name FROM tbl_products, tbl_categories, tbl_brands
        WHERE tbl_products.category_id = tbl_categories.category_id
        AND tbl_products.brand_id = tbl_brands.brand_id
        ORDER BY product_id DESC";
    $product_query = mysqli_query($con,$sql_product);
?>
<div class="container">
        <h3 class="title">Danh sách sản phẩm</h3>
    <table class="styled-table">
        <thead>
            <tr>
                <th width=60px>STT</th>
                <th >Tên sản phẩm</th>
                <th >Hãng sản xuất</th>
                <th >Thuộc danh mục</th>
                <th >Hình ảnh</th>
                <th >Đơn giá</th>
                <th >Số lượng tồn</th>
                <th>Trạng thái</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $id =0;
                while($row_product = mysqli_fetch_array($product_query))
                {
                    $id++;
            ?>
                <tr>
                    <td ><?php echo $id;?></td>
                    <td ><?php echo $row_product['product_name'];?></td>
                    <td ><?php echo $row_product['brand_name'];?></td>
                    <td ><?php echo $row_product['category_name'];?></td>
                    <td >
                        <img width="100px" height="auto" src="../images/product/<?php echo $row_product['product_img'];?>" alt="ảnh">
                    </td>
                    <td ><?php echo number_format($row_product['product_price'],0,'','.').'đ';?></td>
                    <td ><?php echo $row_product['product_quantity'];?></td>
                    <td>
                    <?php 
                            if ($row_product['product_active']==1)
                            {?>
                                <p>Đang hiển thị</p>
                        <?php 
                            }else{ 
                        ?>
                                <p>Đang ẩn</p>
                        <?php }
                        ?>
                    </td>
                    <td >
                    <a style="color:#009879" href="index.php?sidebar=product-edit&productId=<?php echo $row_product['product_id'];?>">
                        <h5>Chỉnh sửa</h5>
                        </a>
                    </td>
                    <td >
                    <a style="color:#009879" href="pages/main-content/product/delete.php?action=delete&productId=<?php echo $row_product['product_id'];?>">
                        <h5>Xóa</h5>
                    </a>
                    </td>
                </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
</div>