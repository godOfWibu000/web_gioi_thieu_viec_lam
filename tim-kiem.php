<!-- Header -->
<?php
	$title = "Kết quả tìm kiếm cho '".$_GET['tu-khoa']."'";
	require "inc/head.php";
?>

<link rel="stylesheet" type="text/css" href="css/tim-kiem.css">
<link rel="stylesheet" type="text/css" href="css/side-bar.css">
<link rel="stylesheet" type="text/css" href="css/ds-viec-lam.css">

<?php
	if(!isset($_GET['tu-khoa']))
		header("Location: index.php");

	require "inc/header.php";

	$dsLinhVuc = mysqli_query($conn, "Select * From linhvuc");
	$dsKinhNghiem = mysqli_query($conn, "Select * From kinhnghiem");
?>

<!-- Tieu de dau trang -->
	<div class="tieu-de-dau-trang-chung tieu-de-dau-trang">
		<div class="noi-dung">
			<h1>Tìm kiếm việc làm</h1>
		</div>
	</div>

<div class="content padding">
<!-- Sidebar -->
	<?php
		require "inc/side-bar.php";
	?>

<!-- Tim kiem -->
	<div class="tim-kiem" style="display: flex;">
		<!-- Ket qua tim kiem -->
		<div class="ket-qua-tim-kiem">
			<div>
				<div class="tieu-de-noi-dung">
					<h2>
						Kết quả tìm kiếm cho 
						<?php 
							echo "\"".$_GET['tu-khoa']."\"";
						?>
					</h2>
				</div>

				<h3>Việc làm</h3>
				<div class="ds-vieclam row" id="ds-viec-lam">
					<?php
						$sqlViecLam = "Select * From vieclam inner join nhatuyendung on vieclam.MaNhaTuyenDung=nhatuyendung.MaNhaTuyenDung inner join khuvuc on vieclam.MaKhuVuc=khuvuc.MaKhuVuc inner join kinhnghiem on vieclam.MaKinhNghiem=kinhnghiem.MaKinhNghiem inner join linhvuc on vieclam.MaLinhVuc=linhvuc.MaLinhVuc inner join hocvan on vieclam.MaHocVan=hocvan.MaHocVan Where vieclam.TenViecLam Like '%".$_GET['tu-khoa']."%' Order By ThoiGianDangViecLam DESC";
						getData($conn ,$sqlViecLam, "inc/viec-lam/ds-viec-lam2.php");
					?>
				</div>

				<h3>Nhà tuyển dụng</h3>
				<div id="ds-nha-tuyen-dung">
					<?php
						$sqlNhaTuyenDung = "Select * From nhatuyendung Where TenNhaTuyenDung Like '%".$_GET['tu-khoa']."%' Order By DanhGiaTrungBinh DESC";
						getData($conn ,$sqlNhaTuyenDung, "inc/quan-ly-nha-tuyen-dung/ds-nha-tuyen-dung.php");
					?>
				</div>
			</div>
		</div>

		<!-- Bo loc tim kiem -->
		<div class="border bo-loc-tim-kiem">	
			<h3>Bộ lọc tìm kiếm</h2>
			<hr>

			<input id="tu-khoa-tim-kiem" type="text" name="" value="<?php echo $_GET['tu-khoa'] ?>" hidden>
			<h4>Sắp xếp theo</h4>
			<div class="bo-loc sap-xep" id="loc-viec-lam-theo-trang-thai">
				<input type="radio" name="loc-trang-thai" value="Thời gian" checked onclick="locTimKiemViecLam()"><label>Thời gian</label>
				<input type="radio" name="loc-trang-thai" value="Mức độ quan tâm" onclick="locTimKiemViecLam()"><label>Mức độ quan tâm</label>
			</div>
			<hr>

			<h4>Lĩnh vực</h4>
			<select class="select width-100 bo-loc linh-vuc" id="loc-viec-lam-theo-linh-vuc" onchange="locTimKiemViecLam()">
				<option selected>Tất cả</option>
				<?php
					for ($i=0; $i < count($dsMaLinhVuc); $i++) {
						echo '
				<option>'.$dsTenLinhVuc[$i].'</option>
						';
					}
				?>
			</select>
			<hr>

			<h4>Kinh nghiệm</h4>
			<select class="select width-100 bo-loc kinh-nghiem" id="loc-viec-lam-theo-kinh-nghiem" onchange="locTimKiemViecLam()">
				<option selected>Tất cả</option>
				<?php 
					for ($i=0; $i < count($dsMaKinhNghiem); $i++) { 
						echo '
				<option>'.$dsTenKinhMghiem[$i].'</option>
						';
					}
				?>
			</select>
		</div>
	</div>
</div>

<!-- Footer -->
<script src="js/viec-lam.js"></script>
<?php require "inc/footer.php" ?>