<?php
    $sql_product = mysqli_query($con,"SELECT tbl_products.*, tbl_brands.*, tbl_categories.* FROM tbl_products, tbl_categories, tbl_brands
    WHERE tbl_products.category_id = tbl_categories.category_id
	AND tbl_products.brand_id = tbl_brands.brand_id
    AND tbl_products.category_id ='$_GET[id]' 
	AND tbl_products.product_active = 1
	ORDER BY tbl_products.product_id DESC");
    $sql_category = mysqli_query($con, "SELECT * FROM tbl_categories WHERE category_id ='$_GET[id]' LIMIT 1");
    $row_category = mysqli_fetch_array($sql_category);

    //get url current
    $_SESSION['url_current'] = $_SERVER['REQUEST_URI'];    
?>
	
	
	<div class="col-md-12 product-block"><h2 class="text-center"><?php echo $row_category['category_name'] ?></h2></br>
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
