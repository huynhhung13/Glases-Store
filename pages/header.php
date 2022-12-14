<?php session_start(); ?>
<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Cửa hàng mắt kính</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoplist Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Hind:400,500,300,600,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
<!-- //end-smoth-scrolling -->
<script src="js/simpleCart.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</head>
<body>
<!--header strat here-->
<div class="header">
	<div class="container">
		<div class="header-main">
			<div class="top-nav">
				<div class="content white">
	              <nav class="navbar navbar-default" role="navigation">
					    <div class="navbar-header">
					        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
					        </button>
					        <div class="navbar-brand logo">
								<a href="index.php"><h2>Glasses Store</h2></a>
							</div>
					    </div>
					    <!--/.navbar-header-->
                        <?php
                            $sql_category = mysqli_query($con,'SELECT * FROM tbl_categories WHERE category_active = 1 ORDER BY category_id DESC');
							$sql_brand = mysqli_query($con,'SELECT * FROM tbl_brands WHERE brand_active = 1 ORDER BY brand_id DESC');
                        ?>
					 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					        <ul class="nav navbar-nav">
					        	   <li><a href="index.php">Trang chủ</a></li>
						             <li class="dropdown">
						        	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Danh mục sản phẩm<b class="caret"></b></a>
						            <ul class="dropdown-menu">
							            <div class="row">
								            <div class="col-sm-12">
									            <ul class="multi-column-dropdown">
                                                    <?php while($row_category = mysqli_fetch_array($sql_category)) {?>
										            <li><a href="shop.php?header=category&id=<?php echo $row_category['category_id'] ?>"><?php echo $row_category['category_name'] ?></a></li>
                                                    <?php } ?>
									            </ul>
								            </div>
							            </div>
						            </ul>
									 </li>
									<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hãng sản xuất<b class="caret"></b></a>
										<ul class="dropdown-menu">
											<div class="row">
												<div class="col-sm-12">
													<ul class="multi-column-dropdown">
														<?php while($row_brand = mysqli_fetch_array($sql_brand)) {?>
														<li><a href="shop.php?header=brand&id=<?php echo $row_brand['brand_id'] ?>"><?php echo $row_brand['brand_name'] ?></a></li>
														<?php } ?>
													</ul>
												</div>
											</div>
										</ul>
									</li>
						        </li>
                                <li><a href="shop.php?header=about-us">Về chúng tôi</a></li>
						        <li><a href="shop.php?header=contact-us">Liên hệ</a></li>
					        </ul>
					    </div>
					    <!--/.navbar-collapse-->
					</nav>
					<!--/.navbar-->
				</div>
			</div>
			<div class="header-right">
				<div class="search">
					<div class="search-text">
					    <input class="serch" type="text" value="Bạn tìm gì..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"/>
					</div>
					<div class="cart box_1">
						<a href="shop.php?header=cart">
							<h3>
							<img src="images/cart.png" alt=""/> Giỏ hàng
							</h3>
						</a>
					</div>    
					<div class="head-signin">
						<?php 
							if(isset($_SESSION['customer_name']))
							{
						?>
							<h5><a href="pages/main-content/function.php?action=log-out"><i class="hd-dign"></i>Đăng xuất</a></h5>
							<?php echo 'Xin chào, '.$_SESSION['customer_name'];?>
						<?php 
							} 
							else{
						?>
							<h5><a href="shop.php?header=login"><i class="hd-dign"></i>Đăng nhập</a></h5>
						<?php } ?>
					</div>              
                     <div class="clearfix"> </div>					
				</div>
			</div>
		 <div class="clearfix"> </div>
		</div>
	</div>
</div>
<hr  width="100%" size="5px" align="center" color="black" />
<!--header end here-->