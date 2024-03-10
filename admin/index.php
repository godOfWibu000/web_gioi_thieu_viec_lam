<?php
	$title = 'Trang quản trị';
	require '../inc/admin/header-admin.php';
?>
		<?php
			if(isset($_SESSION['loaiTaiKhoan']) && $_SESSION['loaiTaiKhoan'] == 'Admin'){
		?>
			<div class="text-center">
				<img src="../img/logo.png" width="100px">
				<h2>Trang quản trị website vieclamsinhvienit.vnua.com.vn</h2>
			</div>
			<hr>

			<div class="padding box-shadow border-radius">
				<h3>Việc làm mới đăng</h3>
				<div>
					<?php
						$dsViecLam = mysqli_query($conn, "Select * From vieclam order By ThoiGianDangViecLam DESC Limit 0,3");
						if($dsViecLam->num_rows>0){
							while($row = $dsViecLam->fetch_assoc()){
					?>

					<div class="border border-radius margin padding">
						<h4><?php echo $row['TenViecLam'] ?></h4>

						<h5><?php echo $row['ThoiGianDangViecLam'] ?></h5>
						<a class="a" href="#"><h5>Xem chi tiết</h5></a>
					</div>

					<?php
							}
						}
					?>
				</div>
				<a class="a" href="#"><h4>Xem thêm</h4></a>
			</div>
		<?php } ?>
			
		</div>
	</div>
</body>
</html>
