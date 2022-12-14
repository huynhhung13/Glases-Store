<?php
	$sql_brand = "SELECT * FROM tbl_brands ORDER BY brand_id DESC";
	$brand_query = mysqli_query($con,$sql_brand);
	$sql_product = "SELECT * FROM tbl_products, tbl_brands
	WHERE tbl_products.brand_id = tbl_brands.brand_id
	 ORDER BY product_id DESC LIMIT 9";
	$product_query = mysqli_query($con,$sql_product);
?>

<!--banner strat here-->
	<br>
	<div class="container">
		<video width="100%" height="auto" autoplay muted loop>
			<source src="images/videos/moncler.mp4" type="video/mp4">
		</video>
		</div>
<!--banner end here-->
<div class="home-block">
	<hr  width="100%" size="8px" align="center" color="black" />
	<h1 class="text-center" style="color: #847057;">SẢN PHẨM MỚI NHẤT</h4>
	<hr  width="100%" size="8px" align="center" color="black" /><br>
	<div class="container">
		<div class="home-block-main">
		<?php while($row_product = mysqli_fetch_array($product_query)) {?>
			<div class="col-md-4 home-grid">
				<div class="home-product-main">
				   <div class="home-product-top">
				      <a href="shop.php?header=detail&id=<?php echo $row_product['product_id'] ?>"><img src="images/product/<?php echo $row_product['product_img']; ?>" width="100%" height="265px!important" alt="" ></a>
					  <div class="home-product-bottom text-center">
						<h3 style="text-align: left!important;"><a href="shop.php?header=brand&id=<?php echo $row_product['brand_id'] ?>"><?php echo $row_product['brand_name'] ?></a></h3>
							<hr  width="100%" size="5px" align="center" color="black" />
							<h3><a href="shop.php?header=detail&id=<?php echo $row_product['product_id'] ?>"><?php echo $row_product['product_name'] ?></a></h3>
							<p><?php echo number_format($row_product['product_price'],0,'','.').'đ'; ?></p>						
						</div>
				   </div>
				</div>
			</div>
					<?php } ?>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--home-block start here-->
<div class="home-block">
	<hr  width="100%" size="8px" align="center" color="black" />
	<h1 class="text-center" style="color: #847057;">HÃNG SẢN XUẤT</h4>
	<hr  width="100%" size="8px" align="center" color="black" /><br>
	<div class="container">
		<div class="home-block-main">
		<?php while($row_brand = mysqli_fetch_array($brand_query)) {?>
			<div class="col-md-2 home-grid">
				<div class="home-brand-main">
				   <div class="home-brand-top">
				      <a href="shop.php?header=brand&id=<?php echo $row_brand['brand_id'] ?>"><img src="images/brand/<?php echo $row_brand['brand_img']; ?>" width="100%" height="auto" alt="" ></a>
				   </div>
				</div>
			</div>
					<?php } ?>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>	
<!--home block end here-->