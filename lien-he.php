<?php
	$title = "Liên hệ";
	require "inc/head.php";
?>

<link rel="stylesheet" type="text/css" href="css/lien-he.css">

<?php
	require "inc/header.php";
?>

<!-- Tieu de dau trang -->
	<div class="tieu-de-dau-trang-chung tieu-de-dau-trang">
		<div class="noi-dung">
			<h1>Liên hệ</h1>
		</div>
	</div>

<content>
	<div class="lien-he">
		<div class="thong-tin-lien-he">
			<h3>Thông tin liên hệ:</h3>
			<h4>Trung tâm giới thiệu việc làm sinh viên CNTT - Học viện Nông nghiệp Việt Nam</h4>
			<h4>Địa chỉ: P*** - Tầng 3 Nhà hành chính - Học viện Nông nghiệp Việt Nam - Ngô Xuân Quảng - Trâu Quỳ - Gia Lâm - Hà Nội</h4>
			<h4>MST: 011111111</h4>
			<h4>Số điện thoại: 0123.456.789</h4>
			<h4>Email: vieclam.svit@vnua.com.vn</h4>
			
			<div class="lien-ket-internet">
				<span>
					<a href="#"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-linkedin-in"></i></a>
					<a href="#"><i class="fab fa-instagram"></i></a>
				</span>
			</div>
		</div>

		<div class="form-lien-he">
	        	<h3>Liên hệ để biết thêm thông tin</h3>

	        	<form>
	        		<div>
	        			<label class="label1">Họ tên:</label><input class="ho-ten form-input" type="text" name="">
	        			<label style="width: 145px;">Số điện thoại:</label><input class="so-dien-thoai form-input" type="text" name="">
	        		</div>
	        		<div>
	        			<label class="label1">Email:</label><input class="email form-input" type="text" name="">
	        		</div>
	        		<div>
	        			<label>Nội dung liên hệ:</label><br><textarea class="form-input"></textarea>
	        		</div>

	        		<br><input type="submit" name="" value="Gửi ngay">
	        	</form>
	    </div>
	</div>
</content>


<!-- Footer -->
<?php require "inc/footer.php" ?>