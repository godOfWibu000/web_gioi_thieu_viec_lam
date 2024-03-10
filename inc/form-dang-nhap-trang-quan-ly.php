<div id="login-frame" class="">
	<h3 style="clear: both;padding: 0 2%;">Đăng nhập</h3>
	<form method="post">
		<label>Email:</label><br>
		<input class="input" type="Email" name="" class="truong-nhap" id="dang-nhap-email-trang-quan-ly" required><br>
		<label>Mật khẩu:</label><br>

		<input class="input truong-nhap password" type="password" name="" id="nhap-mat-khau-trang-quan-ly" required>
		<button type="button" onclick="anHienMatKhau('nhap-mat-khau-trang-quan-ly', 'an-hien-mat-khau-trang-quan-ly')" class="an-hien-mat-khau"><span class="material-symbols-outlined" id="an-hien-mat-khau-trang-quan-ly" style="position: relative;top: 2px;">visibility</span></button>

		<p id="message-dang-nhap-trang-quan-ly"></p>

		<button type="button" onclick="kiemTraDangNhap('dang-nhap-email-trang-quan-ly', 'nhap-mat-khau-trang-quan-ly', 'message-dang-nhap-trang-quan-ly', '../ajax_action/dang_nhap_action.php')" id="dang-nhap-trang-quan-ly" class="button gui-dang-nhap">Đăng nhập</button>
	</form>
	<br>
</div>