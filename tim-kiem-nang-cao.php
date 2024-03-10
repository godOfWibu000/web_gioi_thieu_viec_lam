<!-- Head -->
<?php
	$title = "Tìm kiếm nâng cao";
	require "inc/head.php";
?>

<link rel="stylesheet" type="text/css" href="css/side-bar.css">
<link rel="stylesheet" type="text/css" href="css/ds-viec-lam.css">

<!-- Header -->
<?php
	require "inc/header.php";
?>

<!-- Tieu de dau trang -->
	<div class="tieu-de-dau-trang-chung tieu-de-dau-trang">
		<div class="noi-dung">
			<h1>Tìm kiếm nâng cao</h1>
		</div>
	</div>

<div class="content padding">
<!-- Side-bar -->
	<?php
		require "inc/side-bar.php";
	?>

<!-- DS viec lam -->
	<div class="ds-vieclam row">
	<?php
		$sql = "Select * From vieclam inner join nhatuyendung on vieclam.MaNhaTuyenDung=nhatuyendung.MaNhaTuyenDung inner join khuvuc on vieclam.MaKhuVuc=khuvuc.MaKhuVuc inner join kinhnghiem on vieclam.MaKinhNghiem=kinhnghiem.MaKinhNghiem inner join linhvuc on vieclam.MaLinhVuc=linhvuc.MaLinhVuc inner join hocvan on vieclam.MaHocVan=hocvan.MaHocVan";
		if(isset($_GET['tim-theo-khu-vuc'])) {
			$sql .= " Where vieclam.MaKhuVuc='".$_GET['tim-theo-khu-vuc']."'";
		}
		if(isset($_GET['tim-theo-linh-vuc']))
			$sql .= " and vieclam.MaLinhVuc='".$_GET['tim-theo-linh-vuc']."'";
		if(isset($_GET['tim-theo-kinh-nghiem']))
			$sql .= " and vieclam.MaKinhNghiem='".$_GET['tim-theo-kinh-nghiem']."'";
		$sql .= " Order By ThoiGianDangViecLam DESC";
		getData($conn ,$sql, "inc/viec-lam/ds-viec-lam1.php");
	?>
	</div>
</div>

<!-- Footer -->
<?php require "inc/footer.php" ?>