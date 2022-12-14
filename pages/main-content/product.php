	<?php
	$sql_product = mysqli_query($con,'SELECT tbl_products.*, tbl_brands.* 
	FROM tbl_products,tbl_brands 
	WHERE tbl_products.brand_id = tbl_brands.brand_id
	AND tbl_products.product_active = 1
	ORDER BY product_id DESC');
	?>	
	<div class="col-md-12 product-block"><h2 class="text-center">Tất cả sản phẩm</h2></br>
	<?php while($row_product = mysqli_fetch_array($sql_product)) {?>
		<div class="col-md-3 home-grid">
		<div class="home-product-main">
			<div class="home-product-top">
				<a href="shop.php?header=detail&id=<?php echo $row_product['product_id'] ?>"><img src="images/product/<?php echo $row_product['product_img'] ?>" alt="" class="img-responsive zoom-img"></a>
			</div>
			<div class="home-product-bottom text-center">
			<h3 style="text-align: left!important;"><a href="shop.php?header=brand&id=<?php echo $row_product['brand_id'] ?>"><?php echo $row_product['brand_name'] ?></a></h3>
				<hr  width="100%" size="5px" align="center" color="black" />
				<h3><a href="shop.php?header=detail&id=<?php echo $row_product['product_id'] ?>"><?php echo $row_product['product_name'] ?></a></h3>
				<p><?php echo number_format($row_product['product_price'],0,'','.').'đ'; ?></p>						
			</div>
		</div>
		</div>
		<?php } ?>
		<div class="clearfix"> </div>
	</div>
	</div>
	</div>
	</div>
<!--product end here-->