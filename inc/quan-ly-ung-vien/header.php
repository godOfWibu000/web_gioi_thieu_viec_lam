<?php
	require "../inc/muc-thong-tin-bo-sung.php";
?>
<!-- Dieu huong trang quan ly -->
<script type="text/javascript">
	<?php
		if(isset($_SESSION['loaiTaiKhoan']))
		{
			if($_SESSION['loaiTaiKhoan'] == 'Nhà tuyển dụng')
			{
	?>
	window.location = "../quan-ly-nha-tuyen-dung";

	<?php 
			}else if($_SESSION['loaiTaiKhoan'] == 'Admin'){
	?>

	window.location = "../admin";

	<?php
			}
		}
	?>
</script>

<!-- Tieu de dau trang -->
	<div class="tieu-de-dau-trang-chung tieu-de-dau-trang">
		<div class="noi-dung">
			<h1>Quản lý tài khoản ứng viên</h1>
		</div>
	</div>

<!-- Thong tin tai khoan -->
	<div class="thong-tin-tai-khoan margin box-shadow">
		<div class="taskbar">
			<div class="items">
				<div class="item"></div>
				<div class="item"></div>
				<div class="item"></div>
				<div class="item"></div>
				<div class="item"></div>
				<div class="item"></div>
			</div>
		</div>

		<div class="noi-dung padding">
			<div class="thong-tin">
				<div class="width-100">
					<?php
						if(isset($_SESSION['emailDangNhap'])){
					?>

					<div class="flex-between">
						<h3><?php echo $_SESSION['emailDangNhap'] ?></h4>
						<span style="font-size: 35px;" class="material-symbols-outlined icon-button color-create" onclick="moCuaSo('quan-ly-tai-khoan', 'nen-cua-so-quan-ly-tai-khoan')">settings</span>
					</div>

					<h5 class="color-delete cursor-pointer" id="dang-xuat" onclick="dangXuat('../ajax_action/dang_xuat_action.php', 'index.php')">
						<span class="material-symbols-outlined">logout</span>
						Đăng xuất
					</h5>

					<?php
						}else{
					?>

					<h3>Vui lòng đăng nhập để quản lý thông tin tài khoản</h3>
					<h5>hoặc <a class="a" href="../dang-ky-tai-khoan.php">Đăng ký</a></h5>

					<?php } ?>
							
					</h3>
				</div>
			</div>
		</div>
	</div>

	<div class="quan-ly-tai-khoan cua-so cua-so-nho padding" id="quan-ly-tai-khoan">
		<h3>Quản lý tài khoản</h3>
		<div class="tuy-chon">
			<button class="button-menu chon" id="quan-ly-tai-khoan_menu-thong-tin" onclick="quanLyTaiKhoan('quan-ly-tai-khoan_thong-tin','quan-ly-tai-khoan_doi-mat-khau','quan-ly-tai-khoan_menu-thong-tin','quan-ly-tai-khoan_menu-doi-mat-khau')">Thông tin</button>
			<button class="button-menu" onclick="quanLyTaiKhoan_xoaThongTin('Bạn có muốn xóa thông tin ứng viên?')">Xóa thông tin ứng viên</button>
			<button class="button-menu" onclick="quanLyTaiKhoan_xoaThongTin('Bạn có muốn xóa tài khoản?')">Xóa tài khoản</button>
		</div>

		<hr>
	</div>

	<div class="nen-cua-so nen-cua-so-quan-ly-tai-khoan" id="nen-cua-so-quan-ly-tai-khoan" onclick="dongCuaSo('quan-ly-tai-khoan', 'nen-cua-so-quan-ly-tai-khoan')">
		
	</div>

<!-- Tuy chon tai khoan -->
	<div class="tuy-chon-tai-khoan">
		<div class="flex-between">
			<a href="index.php">
				<button class="button-menu <?php if($title == 'Quản lý tài thông tin ứng viên') echo 'button-create color-button' ?>">
					Thông tin ứng viên
				</button>
			</a>

			<a href="quan-ly-viec-lam-quan-tam.php">
				<button class="button-menu <?php if($title == 'Quản lý thông tin ứng viên - Việc làm quan tâm') echo 'button-create color-button' ?>">
					Việc làm quan tâm
				</button>
			</a href="">

			<a href="quan-ly-ung-tuyen.php">
				<button class="button-menu <?php if($title == 'Quản lý thông tin ứng viên - Ứng tuyển việc làm') echo 'button-create color-button' ?>">
					Ứng tuyển việc làm
				</button>
			</a>
		</div>
	</div>

<!-- Dang nhap -->
	<?php
		if(!isset($_SESSION['emailDangNhap'])){
			require "../inc/form-dang-nhap-trang-quan-ly.php";
	?>

	<div class="dang-ky text-center">
		<h5 class="text-center">hoặc&nbsp;</h5>
		<a class="a" href="../dang-ky-tai-khoan.php"><h4>Đăng ký</h4></a>
	</div>

	<?php
		}
	?>