<!-- Head -->
<?php
	$title = "Ứng tuyển việc làm";
	require "inc/head.php";
?>

<!-- Link css,js... -->
<link rel="stylesheet" type="text/css" href="css/ung-tuyen.css">

<!-- Header -->
<?php
	require "inc/header.php";

	$tenUngVien = $sdtUngVien = $ngaySinhUngVien = $diaChiUngVien = $maHocVanUngVien = $maKinhNghiemUngVien = null;
	if(isset($_SESSION['maUngVien'])){
		$ungVien = mysqli_query($conn, "Select * From ungvien inner join hocvan on ungvien.MaHocVan=hocvan.MaHocVan inner join kinhnghiem on ungVien.MaKinhNghiem=kinhnghiem.MaKinhNghiem Where MaUngVien='".$_SESSION['maUngVien']."'");
		if($ungVien->num_rows>0){
			while($row = $ungVien->fetch_assoc()){
				$tenUngVien = $row['TenUngVien'];
				$sdtUngVien = $row['SDTUngVien'];
				$ngaySinhUngVien = $row['NgaySinhUngVien'];
				$diaChiUngVien = $row['DiaChiUngVien'];
				$tenHocVanUngVien = $row['TenHocVan'];
				$tenKinhNghiemUngVien = $row['TenKinhNghiem'];
			}
		}
	}

	$viecLam = mysqli_query($conn, "Select * From vieclam inner join nhatuyendung on viecLam.MaNhaTuyenDung=nhatuyendung.MaNhaTuyenDung Where MaViecLam='".$_GET['id']."'");
	if($viecLam->num_rows>0){
		while($row = $viecLam->fetch_assoc()){
			$tenViecLam = $row['TenViecLam'];
			$tenNhaTuyenDung = $row['TenNhaTuyenDung'];
			$sdtNhaTuyenDung = $row['SDTNhaTuyenDung'];
			$emailNhaTuyenDung = $row['Email'];
			$diaChiNhaTuyenDung = $row['DiaChiNhaTuyenDung'];
		}
	}

	$dsKinhNghiem = mysqli_query($conn, "Select * From kinhnghiem");
?>

<div class="content padding">
	<div class="ung-tuyen-viec-lam">
		<h2>
			Ứng tuyển công việc
		</h2>
		<div class="thong-tin-viec-lam">
			<div class="viec-lam">
				<h3>
					<b><?php echo $tenViecLam ?></b>
				</h3>
				<h4 class="chi-muc background-border2">Phát triển phần mềm</h4>
				<span class="flex">
					<h5>Số lượng ứng tuyển: 5 | </h5>
					<h5>Đã ứng tuyển: 15</h5>
				</span>
			</div>

			<hr>

			<div class="nha-tuyen-dung">
				<h4><a class="a" href="#"><?php echo $tenNhaTuyenDung ?></a></h4>
				<h5><span class="material-symbols-outlined icon1">call</span> <?php echo $sdtNhaTuyenDung ?></h5>
				<h5><span class="material-symbols-outlined icon1">mail</span> <?php echo $emailNhaTuyenDung ?></h5>
				<h5><span class="material-symbols-outlined icon1">location_on</span> <?php echo $diaChiNhaTuyenDung ?></h5>
			</div>
		</div>

		<div class="ung-tuyen">
			<form action="ajax_action/ung_tuyen/ung_tuyen_viec_lam_action.php" method="post" enctype="multipart/form-data">
				<div class="border border-radius padding">
					<h4>
						<b>Thông tin của bạn:</b>
					</h4>
					<h5>Họ tên: <?php echo $tenUngVien ?></h5>
					<h5>Số điện thoại: <?php echo $sdtUngVien ?></h5>
					<h5>Email: <?php if(isset($_SESSION['emailDangNhap']))echo $_SESSION['emailDangNhap']; ?></h5>
					<h5>Ngày sinh: <?php echo $ngaySinhUngVien ?></h5>
					<h5>Địa chỉ: <?php echo $diaChiUngVien ?></h5>
					<h5>Học vấn: <?php echo $tenHocVanUngVien ?></h5>
					<h5>Kinh nghiệm: <?php echo $tenKinhNghiemUngVien ?></h5>

					<a class="a" href="quan-ly-tai-khoan.php"><h5>Cập nhật thông tin</h5></a>
				</div>

				<input type="" name="ma-viec-lam" value="<?php echo $_GET['id'] ?>" hidden>
				<h5>Chú thích thêm:</h5>
				<textarea class="input textarea" name="chu-thich-ung-tuyen"></textarea><br>
				<input type="text" name="thoi-gian-ung-tuyen" id="thoi-gian-ung-tuyen" hidden>
				<h5>Tải lên CV(nếu có):</h5>
				<input id="file-upload" type="file" name="file" accept=".doc,.docx,.pdf" onchange="layTenFIleCV()">
				<input type="" name="ten-file-cv" id="ten-file-cv" hidden>

				<br><br>

				<div class="tuy-chon">
					<button type="submit" class="button button-create" onclick="document.getElementById('thoi-gian-ung-tuyen').value = getThoiGian()">
						Gửi
					</button>
					<button type="reset" class="button button-reset">
						Đặt lại
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
	if(!isset($_GET['id']) || !isset($_SESSION['emailDangNhap']) || !isset($_SESSION['maUngVien'])){
?>
<script type="text/javascript">
	window.onload = function(){
		window.location = "index.php";
	}
</script>
<?php } ?>

<script type="text/javascript">
	function layTenFIleCV(){
		let tenFile = document.getElementById('ten-file-cv');

		const { files } = event.target;
		console.log("files", files);
		tenFile.value = files[0].name;
	}
</script>

<!-- Footer -->
<?php require "inc/footer.php" ?>