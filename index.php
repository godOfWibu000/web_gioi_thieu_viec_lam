<!-- Head -->
<?php
	$title = "Tìm việc làm sinh viên IT VNUA-Trang chủ";
	require "inc/head.php";
?>

<!-- Link css,js... -->
<link rel="stylesheet" type="text/css" href="css/trang-chu.css">
<link rel="stylesheet" type="text/css" href="css/side-bar.css">
<link rel="stylesheet" type="text/css" href="css/ds-viec-lam.css">

<!-- Header -->
<?php
	require "inc/header.php";
?>

<!-- Tieu de dau trang -->
	<div class="tieu-de-dau-trang-chung tieu-de-dau-trang-chu">
		<div class="noi-dung">
			<h2>Trang tìm kiếm, giới thiệu việc làm cho sinh viên công nghệ thông tin Học viện Nông nghiệp Việt Nam</h2>
			<h4>Tiếp cận doanh nghiệp tuyển dụng uy tín. Việc làm mới mỗi ngày với mức lương cao, hấp dẫn, chế độ đãi ngộ cực tốt!
			</h4>
			<a href="viec-lam.php">
				<button class="button button-main">Xem ngay 
					<span class="material-symbols-outlined icon1">trending_flat</span>
				</button>
			</a>
		</div>
	</div>

<div class="content padding">
	<!-- Side-bar -->
		<?php
			require "inc/side-bar.php";
		?>
	<div>
		<div class="tieu-de-noi-dung">
			<h2>Việc làm hàng đầu</h2>
		</div>
	<!-- Danh sach viec lam -->
		<div class="ds-vieclam flex">
			<?php
				$sql = "Select * From vieclam 
				inner join nhatuyendung on vieclam.MaNhaTuyenDung=nhatuyendung.MaNhaTuyenDung 
				inner join khuvuc on vieclam.MaKhuVuc=khuvuc.MaKhuVuc 
				inner join kinhnghiem on vieclam.MaKinhNghiem=kinhnghiem.MaKinhNghiem 
				inner join linhvuc on vieclam.MaLinhVuc=linhvuc.MaLinhVuc 
				inner join hocvan on vieclam.MaHocVan=hocvan.MaHocVan Where TrangThaiViecLam=1 Order By SoNguoiQuanTam DESC";
				if(!isset($_GET['trang']))
					$sql .= ' Limit 0,9';
				else{
					if($_GET['trang'] == 1)
						$sql .= ' Limit 0,9';
					else
						$sql .= ' Limit ' . (($_GET['trang']-1)*9) . ',9';
				}
				getData($conn ,$sql, "inc/viec-lam/ds-viec-lam1.php");
			?>
		</div>

	<!-- Phan trang -->
		<?php 
			$demViecLam = mysqli_query($conn, "Select * From vieclam");
			$soViecLam = mysqli_num_rows($demViecLam);
			$soTrang = $soViecLam / 9 + 1;
		?>
		<div class="phan-trang">
			<?php
				for ($i=1; $i <= $soTrang; $i++) {
			?>
			<a class="a" href="index.php?trang=<?php echo $i ?>">
				<button class="color-button"><?php echo $i ?></button>
			</a>
			<?php
				}
			?>
		</div>
		<hr>

	<!-- Viec lam moi nhat -->
		<div class="tieu-de-noi-dung">
			<h2>Việc làm mới nhất</h2>
		</div>

		<!-- Danh sach viec lam -->
		<div class="ds-vieclam row">
			<?php
				$sql1 = "Select * From vieclam 
						inner join nhatuyendung on vieclam.MaNhaTuyenDung=nhatuyendung.MaNhaTuyenDung 
						inner join khuvuc on vieclam.MaKhuVuc=khuvuc.MaKhuVuc 
						inner join kinhnghiem on vieclam.MaKinhNghiem=kinhnghiem.MaKinhNghiem 
						inner join linhvuc on vieclam.MaLinhVuc=linhvuc.MaLinhVuc 
						inner join hocvan on vieclam.MaHocVan=hocvan.MaHocVan Where TrangThaiViecLam=1 Order By ThoiGianUngTuyen DESC Limit 0,2";
				getData($conn , $sql1, "inc/viec-lam/ds-viec-lam1.php");
			?>
			<a href="viec-lam.php" class="a vieclam col-lg-4 p-1 col-lg-4 col-md-6 text-center cursor-pointer color-create">
				<div class="noi-dung border-radius" style="height: 100%;">
					<span style="font-size: 50px;" class="material-symbols-outlined">more_horiz</span><br>
					<h3>Xem thêm</h3>
				</div>
			</a>
		</div>
	</div>
</div>

<!-- Footer -->
<?php require "inc/footer.php" ?>