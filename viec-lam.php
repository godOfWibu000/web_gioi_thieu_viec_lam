<?php
	$title = "Việc làm";
	require "inc/head.php";
?>
<link rel="stylesheet" type="text/css" href="css/trang-chu.css">
<link rel="stylesheet" type="text/css" href="css/side-bar.css">
<link rel="stylesheet" type="text/css" href="css/ds-viec-lam.css">
<?php
	require "inc/header.php";
?>

<div class="tieu-de-dau-trang-chung tieu-de-dau-trang">
	<div class="noi-dung">
		<h1>Việc làm</h1>
	</div>
</div>

<div class="content padding">
	<?php require "inc/side-bar.php"; ?>
	<div class="tieu-de-noi-dung">
		<h2>Việc làm mới nhất</h2>
	</div>

	<!-- Danh sach viec lam -->
	<div class="ds-vieclam row">
		<?php
			$sql = "Select * From vieclam 
					inner join nhatuyendung on vieclam.MaNhaTuyenDung=nhatuyendung.MaNhaTuyenDung 
					inner join khuvuc on vieclam.MaKhuVuc=khuvuc.MaKhuVuc 
					inner join kinhnghiem on vieclam.MaKinhNghiem=kinhnghiem.MaKinhNghiem 
					inner join linhvuc on vieclam.MaLinhVuc=linhvuc.MaLinhVuc 
					inner join hocvan on vieclam.MaHocVan=hocvan.MaHocVan Where TrangThaiViecLam=1 Order By ThoiGianUngTuyen DESC";
			if(!isset($_GET['trang']))
				$sql .= ' Limit 0,4';
			else{
				if($_GET['trang'] == 1)
					$sql .= ' Limit 0,4';
				else
					$sql .= ' Limit ' . (($_GET['trang']-1)*4) . ',4';
			}
			getData($conn ,$sql, "inc/viec-lam/ds-viec-lam1.php");
		?>
	</div>

	<!-- Phan trang -->
	<?php 
		$demViecLam = mysqli_query($conn, "Select * From vieclam");
		$soViecLam = mysqli_num_rows($demViecLam);
		$soTrang = $soViecLam / 4;
	?>
	<div class="phan-trang text-center">
		<a class="a chuyen-trang" href="#"><span class="material-symbols-outlined icon1">keyboard_double_arrow_left</span> Trước</a>

		<?php
			for ($i=1; $i <= $soTrang; $i++) {
		?>
		<a class="a" href="viec-lam.php?trang=<?php echo $i ?>">
			<button class="color-button"><?php echo $i ?></button>
		</a>
		<?php
			}
		?>

		<a class="a chuyen-trang" href="#">Sau <span class="material-symbols-outlined icon1">keyboard_double_arrow_right</span></a>
	</div>
	<hr>
</div>

<?php
	require "inc/footer.php";
?>