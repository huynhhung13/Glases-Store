<?php
    if(!isset($_SESSION['admin_name']))
          {
            header('Location:../../../index.php?sidebar=login');
          }
    $sql_category = "SELECT * FROM tbl_categories ORDER BY category_id DESC";
    $category_query = mysqli_query($con,$sql_category);
?>
<div class="container">
        <h3 class="title">Danh mục sản phẩm</h3>
    <table class="styled-table">
        <thead>
            <tr>
                <th width=60px>STT</th>
                <th >Tên danh mục</th>
                <th>Trạng thái</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $id =0;
                while($row_category = mysqli_fetch_array($category_query))
                {
                    $id++;
            ?>
                <tr>
                    <td ><?php echo $id;?></td>
                    <td ><?php echo $row_category['category_name'];?></td>
                    <td >
                        <?php 
                            if ($row_category['category_active']==1)
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
                    <a style="color:#009879" href="index.php?sidebar=category-edit&categoryId=<?php echo $row_category['category_id'];?>">
                        <h5>Chỉnh sửa</h5>
                    </a>
                    </td>
                    <td>
                    <a style="color:#009879" href="pages/main-content/category/delete.php?action=delete&categoryId=<?php echo $row_category['category_id'];?>">
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