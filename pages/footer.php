<?php
    $sql_category = mysqli_query($con, "SELECT * FROM tbl_categories WHERE category_active = 1");
    $row_category = mysqli_fetch_array($sql_category);
?>
<!--footer strat here-->
<div class="footer">
	<div class="container">
		<div class="footer-main">
			<div class="ftr-grids-block">
				<div class="col-md-3 footer-grid">
					<ul>
						<li><h4 style="color: white !important;">Danh mục sản phẩm</h4><br></li>
						<?php while($row_category = mysqli_fetch_array($sql_category)) {?>
						<li><a href="shop.php?header=category&id=<?php echo $row_category['category_id'] ?>">
						<?php echo $row_category['category_name'];?>
						</a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="col-md-3 footer-grid">
					<ul>
						<li><h4 style="color: white !important;">Người dùng</h4><br></li>
						<li><a href="shop.php?header=login">Đăng nhập</a></li>
						<li><a href="shop.php?header=signup">Đăng ký</a></li>
						<li><a href="shop.php?header=cart">Giỏ hàng</a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-grid">
					<ul>
						<li><h4 style="color: white !important;">Thông tin</h4><br></li>
						<li><a href="shop.php?header=about-us">Về chúng tôi</a></li>
						<li><a href="shop.php?header=contact-us">Liên hệ</a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-grid">
					<ul>
						<li><h4 style="color: white !important;">Sinh viên thực hiện</h4><br></li>
						<li><a href="shop.php?header=contact-us">Huỳnh Công Hưng</a></li>
						<li><a href="shop.php?header=contact-us">Lê Tấn Hỷ</a></li>
						<li><a href="shop.php?header=contact-us">Nguyễn Phú Điền</a></li>
					</ul>
				</div>
		    <div class="clearfix"> </div>
		  </div>
		  <div class="copy-rights">
		     <p style="text-align: left !important; padding: 10px !important;">© 2022 GLASSES STORE</p>
			 <p>Rất hân hạnh phục vụ quý khách</p>
		   </div>
		</div>
	</div>
</div>
<!--footer end here-->
</body>
</html>