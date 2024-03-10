<?php
	$title = 'Quản lý tuyển dụng';
	require "../inc/quan-ly-nha-tuyen-dung/header-quan-ly-nha-tuyen-dung.php";
	if(isset($_SESSION['maNhaTuyenDung'])){
		$sqlNhaTuyenDung = "Select * From nhatuyendung Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."'";
		$nhaTuyenDung = mysqli_query($conn, $sqlNhaTuyenDung);
		if($nhaTuyenDung->num_rows>0){
			while($row = $nhaTuyenDung->fetch_assoc()){
				$tenNhaTuyenDung = $row['TenNhaTuyenDung'];
				$sdtNhaTuyenDung = $row['SDTNhaTuyenDung'];
				$diaChiNhaTuyenDung = $row['DiaChiNhaTuyenDung'];
			}
		}
	}
?>

<?php if(isset($_SESSION['emailDangNhap'])){ ?>
	<div class="border-radius box-shadow padding">
		<h3>Thông tin tài khoản</h3>

		<div class="flex-between">
			<div class="flex">
				<img src="../img/user.png" width="70px" height="70px">
				<h4 style="line-height: 70px;"><?php echo $_SESSION['emailDangNhap'] ?></h4>
			</div>
		</div>
		<div class="flex">
			<h5 class="color-create cursor-pointer">Đổi mật khẩu</h5>&nbsp;&nbsp;&nbsp;
			<h5 class="cursor-pointer color-delete">Xóa tài khoản</h5>
		</div>
	<?php if(isset($_SESSION['maNhaTuyenDung'])){ ?>
		<div class="border border-radius padding">
			<h4>Nhà tuyển dụng:</h4>
			<h5>Tên nhà tuyển dụng: <?php echo $tenNhaTuyenDung ?></h5>
			<h5>Số điện thoại: <?php echo $sdtNhaTuyenDung ?></h5>
			<h5>Email: <?php echo $_SESSION['emailDangNhap'] ?></h5>
			<h5>Địa chỉ: <?php echo $diaChiNhaTuyenDung ?></h5>
			<div class="flex">
				<a class="a" href="quan-ly-nha-tuyen-dung.php"><h5>Sửa thông tin</h5></a>
				&nbsp;&nbsp;&nbsp;
				<h5 class="cursor-pointer color-delete" onclick="xoaThongTinNhaTuyenDung()">Xóa thông tin</h5>
			</div>
		</div>
	<?php } ?>
		<h5 class="cursor-pointer color-delete" onclick="dangXuat('../ajax_action/dang_xuat_action.php', '../quan-ly-nha-tuyen-dung/quan-ly-nha-tuyen-dung.php')">
			<span class="material-symbols-outlined">logout</span>
				Đăng xuất
		</h5>
	</div>
<?php } ?>

		</div>
	</div>
</body>
</html>