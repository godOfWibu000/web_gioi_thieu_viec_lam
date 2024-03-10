<!-- Header -->
<?php
	$title = "Danh mục việc làm " . $_GET['danh-muc-viec-lam'];
	require "inc/head.php";
?>
<link rel="stylesheet" type="text/css" href="css/side-bar.css">
<link rel="stylesheet" type="text/css" href="css/ds-viec-lam.css">
<?php
	require "inc/header.php";
?>

<div class="tieu-de-dau-trang-chung tieu-de-dau-trang">
	<div class="noi-dung text-center">
		<h1>Danh mục việc làm<br>Lĩnh vực <?php echo $_GET['danh-muc-viec-lam'] ?></h1>
	</div>
</div>

<div class="content padding">
	<?php require "inc/side-bar.php"; ?>
	<h2>Việc làm lĩnh vực <?php echo $_GET['danh-muc-viec-lam'] ?></h2>
	<div class="ds-vieclam row">
		<?php
			$sql = "Select * From vieclam inner join nhatuyendung on vieclam.MaNhaTuyenDung=nhatuyendung.MaNhaTuyenDung inner join khuvuc on vieclam.MaKhuVuc=khuvuc.MaKhuVuc inner join kinhnghiem on vieclam.MaKinhNghiem=kinhnghiem.MaKinhNghiem inner join linhvuc on vieclam.MaLinhVuc=linhvuc.MaLinhVuc inner join hocvan on vieclam.MaHocVan=hocvan.MaHocVan Where vieclam.MaLinhVuc='".$_GET['id']."'";
			getData($conn ,$sql, "inc/viec-lam/ds-viec-lam1.php");
		?>
	</div>
</div>


<!-- Footer -->
<?php require "inc/footer.php" ?>