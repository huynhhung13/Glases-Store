<?php
    if(!isset($_SESSION['admin_name']))
          {
            header('Location:../../../index.php?sidebar=login');
          }
    $sql_category = "SELECT * FROM tbl_categories
    WHERE category_id =".$_GET["categoryId"];
    $category_query = mysqli_query($con,$sql_category);
?>
<div class="content">
        <h3 class="title">Chỉnh sửa danh mục</h3>
    <form class="add-form" method="POST" action="pages/main-content/category/function.php?categoryId=<?php echo $_GET['categoryId'];?>">
    <?php 
            while($row_category = mysqli_fetch_array($category_query))
            {?>    
    <div>
            <label>Tên danh mục:</label>
            <input type="text" name="cat_name" value="<?php echo $row_category['category_name'] ?>">
        </div>
        <div>
            <label>Trạng thái: </label>
            <select name="cat_active" id="status">
                <option value="1">Hiển thị</option> 
                <option value="0">Ẩn</option> 
            </select>    
        </div>
        <?php } ?>
        <div>
            <input type="submit" value="Cập nhật" name="update-cat">
        </div>
    </form>
</div>