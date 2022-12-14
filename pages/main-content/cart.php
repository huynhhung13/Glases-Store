<?php
    include("config/connectdb.php");
    if (isset($_POST['add-to-cart'])){
		$product_name = $_POST['product_name'];
		$product_id = $_POST['product_id'];
		$product_price = $_POST['product_price'];
		$product_img = $_POST['product_img'];
		$product_quantity = $_POST['quantity'];
		$sql_select_cart = mysqli_query($con,"SELECT * FROM tbl_cart WHERE product_id='$product_id'");
 		$count = mysqli_num_rows($sql_select_cart);
 		if($count>0){
			$row_cart = mysqli_fetch_array($sql_select_cart);
			$soluong = $row_cart['product_quantity'] + $product_quantity;
			$sql_cart = "UPDATE tbl_cart SET product_quantity='$soluong' WHERE product_id='$product_id'";
 		}else{
			$soluong = $product_quantity;
			$sql_cart = "INSERT INTO tbl_cart(product_name, product_price, product_quantity, product_img, product_id)
		VALUES ('$product_name', '$product_price', '$product_quantity', '$product_img', '$product_id')";
		 }
		$cart_query = mysqli_query($con,$sql_cart);
	}else if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$sql_delete = mysqli_query($con,"DELETE FROM tbl_cart WHERE cart_id='$id'");
	}elseif(isset($_POST['update-cart'])){
			$id = $_POST['alter_id'];
			$quantity = $_POST['product_quantity'];
			if($quantity<=0){
				$sql_delete = mysqli_query($con,"DELETE FROM tbl_cart WHERE product_id='$id'");
			}else{
				$sql_update = mysqli_query($con,"UPDATE tbl_cart SET product_quantity='$quantity' WHERE product_id='$id'");
			}
	}elseif(isset($_POST['check-out'])){
		$customer_id = $_SESSION['customer_id'];
		$ship_name = $_POST['name'];
		$ship_phone = $_POST['phone'];
		$ship_address = $_POST['address'];
		$ship_note = $_POST['note'];
		$ship_payment = $_POST['payment'];
		$ins_ship = mysqli_query($con, "INSERT INTO tbl_ship_info(customer_id, name, phone, address, note) VALUES ($customer_id,'$ship_name','$ship_phone','$ship_address','$ship_note')");
		$sel_ship ="SELECT ship_id FROM tbl_ship_info ORDER BY ship_id DESC LIMIT 1";
		$row_ship = mysqli_fetch_array(mysqli_query($con,$sel_ship));
		$_SESSION['ship_id'] = $row_ship['ship_id'];
		$ship_id = $_SESSION['ship_id'];	
		for($i=0;$i<count($_POST['checkout_product_id']);$i++){
				$product_id = $_POST['checkout_product_id'][$i];
				$soluong = $_POST['checkout_product_quantity'][$i];
				$sql_order = mysqli_query($con,"INSERT INTO tbl_order(product_id,customer_id, ship_id, payment_id, product_quantity) values ($product_id,$customer_id,$ship_id, $ship_payment,'$soluong')");
				$sql_del_cart = mysqli_query($con,"DELETE FROM tbl_cart WHERE product_id='$product_id'");
			}
		$_SESSION['message']="<h4>Cảm ơn đã đặt hàng! Chúng tôi sẽ giao hàng cho bạn trong thời gian sớm nhất!</h4></br>";
		echo $_SESSION['message'];	
	}	
?>
<?php
	$sql_cart_detail = "SELECT * FROM tbl_cart";
	$cart_detail_query = mysqli_query($con,$sql_cart_detail);
?> 

<!--start-ckeckout-->
<div class="container">
	<div class="ckeckout-top">
		<div class=" cart-items heading">
		<h1 class="text-center">Giỏ hàng của bạn</h1>
		<div class="container">
			<form action="" method="POST">
			<table class="styled-table">
				<thead>
					<tr>
						<th></th>
						<th >Tên sản phẩm</th>
						<th>Đơn giá</th>
						<th>Số lượng</th>
						<th>Thành tiền</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php
					$total = 0;
					$cart_total = 0;
					$empty_cart = mysqli_num_rows($cart_detail_query);
					if($empty_cart == 0)
					{
				?>
					<tr>
					<td colspan="7"><h4>Giỏ hàng trống!</h4></td>
					</tr>
				<?php
					}else{	
						while($row_cart_detail = mysqli_fetch_array($cart_detail_query)){
							$subtotal = $row_cart_detail['product_quantity'] * $row_cart_detail['product_price'];
							$total+=$subtotal;
							$cart_total += $row_cart_detail['product_quantity'];
							$id = $row_cart_detail['product_id'];
							$sql_product = mysqli_query($con,"SELECT * FROM tbl_products WHERE product_id = '$id' LIMIT 1");
							$row_product = mysqli_fetch_array($sql_product);
							$quantity_max = $row_product['product_quantity'];
					?>
					<tr>
						<td><img width="150px" src="images/product/<?php echo $row_cart_detail['product_img']; ?>" alt=""></td>
						<td><h4><?php echo $row_cart_detail['product_name']; ?></h4></td>
						<td><h4><?php echo number_format($row_cart_detail['product_price']).' đ' ; ?></h4></td>
						<td>
							<input type="hidden" name="alter_id" value="<?php echo $row_cart_detail['product_id'] ?>">
							<h4><input aria-label="quantity" class="input-qty" max="<?php echo $quantity_max ?>" min="1" name="product_quantity" type="number" value="<?php echo $row_cart_detail['product_quantity']?>"></h4>
						</td>
						<td><h4><?php echo number_format($subtotal).' đ' ?></h4></td>
						<td><h4><a href="?header=cart&delete=<?php echo $row_cart_detail['cart_id'] ?>">Xóa</a></h4></td>	
					</tr>
					<?php } ?>
					<tr>
						<td colspan="4">	
								<input type="submit" class="btn btn-success" value="Cập nhật giỏ hàng" name="update-cart">
						</td>
						<td colspan="3" bgcolor="#337AB7" style="color:white">
							<h3 style="text-align:center;">Tổng thanh toán (<?php echo $cart_total; ?>): <?php echo number_format($total).' đ' ?></h3>
						</td>
					</tr>	
					<?php } ?>
				</tbody>
			</table>
			</form>
			<hr  width="100%" size="8px" align="center" color="black" />
			<?php
				$sql_cart_select = mysqli_query($con,"SELECT * FROM tbl_cart");
				$count_cart_select = mysqli_num_rows($sql_cart_select);
			 	if(!isset($_SESSION['customer_name']) && $count_cart_select>0){ 
			?>
			<div class="container text-center">
			<h4>Để thanh toán các sản phẩm có trong giỏ hàng, bạn hãy
				<a href="shop.php?header=login">Đăng nhập</a> nếu đã có tài khoản hoặc <a href="shop.php?header=signup">Đăng ký thành viên mới</a> 
			</h4><br>
			</div>
			<?php }else{ ?>
				<form action="" method="post">
				<div class="container text-center">
				<?php 
					if($count_cart_select>0){
						while($row_1 = mysqli_fetch_array($sql_cart_select)){
					?>
					<input type="hidden" name="checkout_product_id[]" value="<?php echo $row_1['product_id'] ?>">
					<input type="hidden" name="checkout_product_quantity[]" value="<?php echo $row_1['product_quantity'] ?>">
					<?php 
					}	
					?>
					<?php
						$customer_id = $_SESSION['customer_id'];
						$sql_customer = "SELECT * FROM tbl_customers WHERE customer_id = $customer_id ";
						$customer_query = mysqli_query($con,$sql_customer);
						$sql_payment = "SELECT * FROM tbl_payment";
						$payment_query = mysqli_query($con,$sql_payment);
						while($row_customer = mysqli_fetch_array($customer_query)){
					?>
					<h1>Thông tin vận chuyển</h1><br>
						<div class="controls form-group">
							<input class="form-control" type="text" name="name" placeholder="Điền tên" value="<?php echo $row_customer['customer_name']?>" required="">
						</div>
						<div class="w3_agileits_card_number_grids">
							<div class="w3_agileits_card_number_grid_left form-group">
								<div class="controls">
									<input type="text" class="form-control" placeholder="Số điện thoại" value="<?php echo $row_customer['customer_phone']?>" name="phone" required="">
								</div>
							</div>
							<div class="w3_agileits_card_number_grid_right form-group">
								<div class="controls">
									<input type="text" class="form-control" placeholder="Địa chỉ" value="<?php echo $row_customer['customer_address']?>" name="address" required="">
								</div>
							</div>
						</div>
						<div class="controls form-group">
							<textarea style="resize: none;" class="form-control" placeholder="Ghi chú..." name="note"></textarea>  
						</div>
						<?php } ?>
						<div class="controls form-group">
							<label for="payment">Chọn phương thức thanh toán:</label>
							<select class="option-w3ls" name="payment">
								<?php while ($row_payment = mysqli_fetch_array($payment_query)){ ?>
								<option value="<?php echo $row_payment['payment_id']?>"><?php echo $row_payment['payment_method']?></option>
							<?php } ?>

							</select>
						</div>
					
					<input style="width:300px !important; height: auto;" type="submit" class="btn btn-primary" value="Thanh toán giỏ hàng" name="check-out">
					<?php } ?>
				</div>
				</form><br>
			<?php } ?>
		</div>
		</div>  
	</div>
</div>
<!--end-ckeckout-->
