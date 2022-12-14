<?php
	if (isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id="";
	}
    $sql_product = mysqli_query($con,"SELECT * FROM tbl_products WHERE product_id = '$id' LIMIT 1");
    $row_product = mysqli_fetch_array($sql_product);

    //url product
    $sql_url = "SELECT tbl_categories.*,tbl_products.*,tbl_brands.* FROM tbl_products, tbl_categories, tbl_brands
        WHERE tbl_products.category_id = tbl_categories.category_id
		AND tbl_products.brand_id = tbl_brands.brand_id
        AND product_id = '$id' LIMIT 1";
    $url_query = mysqli_query($con,$sql_url);
    $row_url = mysqli_fetch_array($url_query);
	$quantity_max = $row_product['product_quantity'];
	$category_id = $row_product['category_id'];
?>
<div class="single">
   <div class="container">
   	 <div class="single-main">
		<div class="single-top-main">
	   		<div class="col-md-5 single-top">	
			   <div class="flexslider">
				  <ul class="slides">
				    <li style="list-style-type:none">
				       <div class="thumb-image"> <img src="images/product/<?php echo $row_product['product_img']; ?>" data-imagezoom="true" > </div>
				    </li> 
				  </ul>
			</div>
			</div>
			<div class="col-md-7 single-top-left simpleCart_shelfItem">
				<h2><?php echo $row_url['brand_name'] ?></h2>
				<h1><?php echo $row_url['product_name'] ?></h1>
				<h6 class="item_price"><?php echo number_format($row_product['product_price'],0,'','.').'đ'; ?></h6>			
				<p>Mô tả sản phẩm: <?php echo $row_url['product_describe'] ?></p>
				<h4><?php echo $row_url['product_size_describe'] ?></h4>
				<ul class="bann-btns">
					<li>
					<div class="product-quantity">
						<p>Số lượng:</p>
						<form action="shop.php?header=cart" method="POST">
							<fieldset>
								<input type="hidden" name="product_name" value="<?php echo $row_product['product_name']; ?>">
								<input type="hidden" name="product_id" value="<?php echo $row_product['product_id']; ?>">
								<input type="hidden" name="product_price" value="<?php echo $row_product['product_price']; ?>">
								<input type="hidden" name="product_img" value="<?php echo $row_product['product_img']; ?>">
							<input class="minus is-form" type="button" value="-">
							<input aria-label="quantity" class="input-qty" max="<?php echo $quantity_max ?>" min="1" name="quantity" type="number" value="1" readonly>
							<input class="plus is-form" type="button" value="+">
							</fieldset>
							<?php 
							if( $quantity_max != 0)
							{
								?>
									<br><input type="submit" name="add-to-cart" value="Thêm vào giỏ hàng">
								<?php 
									} 
									else
										echo '<p class="text-message color--error">Sản phẩm đã hết hàng!!!</p>';
								?>
						</form>				
					</div>
					</li>
	            </ul>
			</div>

			<!-- Increase & Decrease bt script-->
			<script>//<![CDATA[
			$('input.input-qty').each(function() {
			var $this = $(this),
				qty = $this.parent().find('.is-form'),
				min = Number($this.attr('min')),
				max = Number($this.attr('max'))
			if (min == 0) {
				var d = 0
			} else d = min
			$(qty).on('click', function() {
				if ($(this).hasClass('minus')) {
				if (d > min) d += -1
				} else if ($(this).hasClass('plus')) {
				var x = Number($this.val()) + 1
				if (x <= max) d += 1
				}
				$this.attr('value', d).val(d)
			})
			})
			//]]></script>

		   <div class="clearfix"> </div>
	   </div>
		</br>
		</br>
			<?php
			$sql_relative_product = mysqli_query($con,"SELECT tbl_products.*, tbl_categories.* FROM tbl_products, tbl_categories 
			WHERE tbl_products.category_id = tbl_categories.category_id
			AND tbl_products.product_id != $row_product[product_id]
			AND tbl_products.category_id = $category_id
			ORDER BY RAND() LIMIT 4");
			?>	
	   <h2>Các sản phẩm liên quan:</h2>
	   <div class="singlepage-product">
	   <?php while($row_relative_product = mysqli_fetch_array($sql_relative_product)) {?>
		<div class="col-md-3 home-grid">
		<div class="home-product-main">
			<div class="home-product-top">
				<a href="shop.php?menu=detail&id=<?php echo $row_relative_product['product_id'] ?>"><img src="images/product/<?php echo $row_relative_product['product_img'] ?>" alt="" class="img-responsive zoom-img"></a>
			</div>
			<div class="home-product-bottom-related text-center">
					<h3><a href="shop.php?menu=detail&id=<?php echo $row_relative_product['product_id'] ?>"><?php echo $row_relative_product['product_name'] ?></a></h3>
					<p><?php echo number_format($row_relative_product['product_price'],0,'','.').'đ'; ?></p>						
			</div>
		</div>
		</div>
		<?php } ?>
		  <div class="clearfix"> </div>
	   </div>
   	 </div>
   </div>
</div>
<!--single end here-->