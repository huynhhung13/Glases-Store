<?php
    if(!isset($_SESSION['admin_name']))
          {
            header('Location:../../../index.php?sidebar=login');
          }
    $sql_brand = "SELECT * FROM tbl_brands ORDER BY brand_id DESC";
    $brand_query = mysqli_query($con,$sql_brand);
?>
<div class="container">
        <h3 class="title">Danh sách hãng sản xuất</h3>
    <table class="styled-table">
        <thead>
            <tr>
                <th width=60px>STT</th>
                <th >Tên hãng</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $id =0;
                while($row_brand = mysqli_fetch_array($brand_query))
                {
                    $id++;
            ?>
                <tr>
                    <td ><?php echo $id;?></td>
                    <td ><?php echo $row_brand['brand_name'];?></td>
                    <td>
                        <img width="100%" height="auto" src="../images/brand/<?php echo $row_brand['brand_img'];?>" alt="ảnh">
                    </td>
                    <td>
                    <?php 
                            if ($row_brand['brand_active']==1)
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
                    <a style="color:#009879" href="index.php?sidebar=brand-edit&brandId=<?php echo $row_brand['brand_id'];?>">
                        <h5>Chỉnh sửa</h5>
                    </a>
                    </td>
                    <td>
                    <a style="color:#009879" href="pages/main-content/brand/delete.php?action=delete&brandId=<?php echo $row_brand['brand_id'];?>">
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