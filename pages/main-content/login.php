<!--log in start here-->
<div class="login">
	<div class="container">
		<div class="login-main">
			  <h1>Đăng nhập</h1>
		  <div class="col-md-6 login-left">
			<h2>Đã có tài khoản? Đăng nhập tại đây nhé!</h2>
			<form action="pages/main-content/function.php" method="POST">
				<input type="text" placeholder="Tên tài khoản..." name="username" required="">
				<input type="password" placeholder="Mật khẩu..." name="password" required="">
				<input type="submit" value="Đăng nhập" name="user-login">
			</form>
		  </div>
		  <div class="col-md-6 login-right">
		  	 <h3>Bạn là người dùng mới? Hãy đăng ký tài khoản nhé</h3>
		  	 <p>Glasses Store rất vui mừng khi có khách hàng mới!</p>
		     <a href="shop.php?header=signup" class="login-btn">Đăng ký tại đây </a>
		  </div>
		  <div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--log in end here-->
