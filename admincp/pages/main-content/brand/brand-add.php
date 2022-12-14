<?php
    if(!isset($_SESSION['admin_name']))
          {
            header('Location:../../../index.php?sidebar=login');
          }
?>
<div class="content">
        <h3 class="title">Thêm hãng sản xuất</h3>
    <form class="add-form" method="POST" action="pages/main-content/brand/function.php" enctype="multipart/form-data">
        <div>
            <label>Tên hãng:</label>
            <input type="text" name="brand_name">
        </div>
        <div>
            <label>Logo hãng:</label>
            <input type="file" name="brand_img">
        </div>
        <div>
            <label for="brand">Trạng thái: </label>
            <select name="brand_active" id="status">
                <option value="1">Hiển thị</option> 
                <option value="0">Ẩn</option> 
            </select>    
        </div>
        <div>
            <input type="submit" value="Thêm hãng" name="add-brand">
        </div>
    </form>
</div>