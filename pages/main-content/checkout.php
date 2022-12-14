<?php if(isset($_SESSION['customer_home'])){ 
?>
<div class="checkout-left">
    <div class="address_form_agile mt-sm-5 mt-4">
        <h4 class="mb-sm-4 mb-3">Thêm địa chỉ giao hàng</h4>
        <form action="" method="post" class="creditly-card-form agileinfo_form">
            <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                <div class="information-wrapper">
                    <div class="first-row">
                        <div class="controls form-group">
                            <input class="billing-address-name form-control" type="text" name="name" placeholder="Điền tên" required="">
                        </div>
                        <div class="w3_agileits_card_number_grids">
                            <div class="w3_agileits_card_number_grid_left form-group">
                                <div class="controls">
                                    <input type="text" class="form-control" placeholder="Số phone" name="phone" required="">
                                </div>
                            </div>
                            <div class="w3_agileits_card_number_grid_right form-group">
                                <div class="controls">
                                    <input type="text" class="form-control" placeholder="Địa chỉ" name="address" required="">
                                </div>
                            </div>
                        </div>
                        <div class="controls form-group">
                            <input type="text" class="form-control" placeholder="Email" name="email" required="">
                        </div>
                        <div class="controls form-group">
                            <input type="text" class="form-control" placeholder="Password" name="password" required="">
                        </div>
                        <div class="controls form-group">
                            <textarea style="resize: none;" class="form-control" placeholder="Ghi chú" name="note" required=""></textarea>  
                        </div>
                        <div class="controls form-group">
                            <select class="option-w3ls" name="giaohang">
                                <option>Chọn hình thức giao hàng</option>
                                <option value="1">Thanh toán ATM</option>
                                <option value="0">Nhận tiền tại nhà</option>
                                

                            </select>
                        </div>
                    </div>
                    <?php
                    $sql_lay_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");
                    while($row_thanhtoan = mysqli_fetch_array($sql_lay_giohang)){ 
                    ?>
                        <input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_thanhtoan['sanpham_id'] ?>">
                        <input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_thanhtoan['soluong'] ?>">
                    <?php
                    } 
                    ?>
                    <input type="submit" name="thanhtoan" class="btn btn-success" style="width: 20%" value="Thanh toán">
                    
                </div>
            </div>
        </form>
        
    </div>
</div>
<?php
}
?>