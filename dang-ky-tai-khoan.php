<?php
	$title = "Đăng ký tài khoản";
	require "inc/head.php";
?>

<!-- Link css,js... -->
<link rel="stylesheet" type="text/css" href="css/dang-ky-tai-khoan.css">

<?php
	include('database/db.php');
	session_start();
?>
</head>
<body>
	<div class="dang-ky-tai-khoan background-border2 width-100">
		<div class="noi-dung padding">
			<div class="logo text-center">
				<img src="img/logo.png" width="100px">
				<h2>Việc làm sinh viên IT Nông nghiệp</h2>
			</div>

			<h3>Đăng ký tài khoản:</h3>
			<form>
				<h5>Loại tài khoản:</h5>
				<select class="select width-100" id="lua-chon-loai-tai-khoan">
					<option value="Ứng viên">Ứng viên</option>
					<option value="Nhà tuyển dụng">Nhà tuyển dụng</option>
				</select>

				<h5>Email:</h5>
				<input class="input width-100" id="email" type="text" name="">
				<h5 class="color-delete" id="message-email"></h5>

				<h5>Mật khẩu:</h5>
				<input class="input width-100" id="mat-khau-1" type="password" name="">
				<h5 class="color-delete" id="message-mat-khau-1"></h5>

				<h5>Nhập lại mật khẩu:</h5>
				<input class="input width-100" id="mat-khau-2" type="password" name="">
				<h5 class="color-delete" id="message-mat-khau-2"></h5>

				<br><br>
				<button class="button button-create" type="button" onclick="validateThemTaiKhoan()">Đăng ký</button>
				<button class="button button-reset" type="reset">Đặt lại</button>
			</form>

			<br>
			<a class="a" href="index.php"><h5>Quay về trang chủ</h5></a>
		</div>
	</div>
<script src="js/main.js"></script>
<script src="js/quan-ly-tai-khoan.js"></script>
</body>
</html>