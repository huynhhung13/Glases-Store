<div class="login">
	<div class="container">
		<div class="login-main">
			  <h1>Đăng ký</h1>
		  <div class="col-md-6 login-left">
			<h2>Đăng ký tài khoản</h2>
			<form action="pages/main-content/function.php" method="POST">
				<input type="text" placeholder="Tên tài khoản" required="" name="username">
				<input type="text" placeholder="Họ và tên" required="" name="fullname">
				<input type="text" placeholder="Email" required="" name="email">
				<input type="text" placeholder="Địa chỉ" required="" name="address">
				<input type="text" placeholder="Số điện thoại" required="" name="phone">
				<input type="password" placeholder="Mật khẩu" required="" name="password">
				<input type="password" placeholder="Nhập lại mật khẩu" required="" name="re_enter_password">
				<input type="submit" value="Đăng ký" name="user-sign-up">
			</form>
		  </div>
		  <div class="col-md-6 login-right">
		  	 <h3>Bạn đã có tài khoản?</h3>
		  	 <p>Glasses Store rất vui vì bạn quay trở lại!</p>
		     <a href="shop.php?menu=login" class="login-btn">Đăng nhập tại đây </a>
		  </div>
		  <div class="clearfix"> </div>
		</div>
	</div>
</div>