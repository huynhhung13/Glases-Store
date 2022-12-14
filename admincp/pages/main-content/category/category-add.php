<?php
    if(!isset($_SESSION['admin_name']))
          {
            header('Location:../../../index.php?sidebar=login');
          }
?>
<div class="content">
        <h3 class="title">Thêm danh mục</h3>
    <form class="add-form" method="POST" action="pages/main-content/category/function.php">
        <div>
            <label>Tên danh mục:</label>
            <input type="text" name="cat_name">
        </div>
        <div>
            <label for="brand">Trạng thái: </label>
            <select name="cat_active" id="status">
                <option value="1">Hiển thị</option> 
                <option value="0">Ẩn</option> 
            </select>    
        </div>
        <div>
            <input type="submit" value="Thêm danh mục" name="add-cat">
        </div>
    </form>
</div>