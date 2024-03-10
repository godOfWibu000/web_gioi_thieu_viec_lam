<?php
	$title = "Ứng viên";
	require "inc/head.php";
?>
<link rel="stylesheet" type="text/css" href="css/ung-vien.css">
<?php
	require "inc/header.php";

	$thongTinUngVien = mysqli_query($conn, "Select * From ungvien inner join hocvan on ungvien.MaHocVan=hocvan.MaHocVan inner join kinhnghiem on ungvien.MaKinhNghiem=kinhnghiem.MaKinhNghiem Where MaUngVien='".$_GET['id']."'");
	if($thongTinUngVien->num_rows > 0){
		while($row = $thongTinUngVien->fetch_assoc()){
			$tenUngVien = $row['TenUngVien'];
			$ngaySinh = $row['NgaySinhUngVien'];
			$sdt = $row['SDTUngVien'];
			$email = $row['Email'];
			$diaChi = $row['DiaChiUngVien'];
			$moTa = $row['MoTaUngVien'];
			$tenHocVan = $row['TenHocVan'];
			$tenKinhNghiem = $row['TenKinhNghiem'];
		}
	}
?>
</head>

<div class="content padding">
	<div class="thong-tin-ung-vien margin">
	<!-- Thong tin co ban -->
		<div class="thong-tin-co-ban border-radius button-main padding">
			<div class="flex">
				<img src="img/user.png" width="100px">
				<div class="padding color-button">
					<h3><?php echo $tenUngVien ?></h3>
					<h4>Ứng viên</h4>
				</div>
			</div>

			<div class="flex-between margin" style="width: 50%;">
				<div>
					<h5 class="color-button">
						<span class="material-symbols-outlined icon1">calendar_month</span>
						<?php echo $ngaySinh ?>
					</h5>

					<h5 class="color-button">
						<span class="material-symbols-outlined icon1">call</span>
						<?php echo $sdt ?>
					</h5>

					<h5 class="color-button">
						<span class="material-symbols-outlined icon1">mail</span>
						<?php echo $email ?>
					</h5>

					<h5 class="color-button">
						<span class="material-symbols-outlined icon1">location_on</span>
						<?php echo $diaChi ?>
					</h5>
				</div>

				<div>
					<a href="#" class="a flex">
						<span class="lien-ket-internet">
							<i class="fab fa-facebook-f"></i>
						</span>
						<h5 class="color-button icon1">facebook.com<h5>
					</a>
					<br>
					<a href="#" class="a flex">
						<span class="lien-ket-internet">
							<i class="fab fa-twitter"></i>
						</span>
						<h5 class="color-button icon1">twitter.com</h5>
					</a>
				</div>
			</div>

			<div class="border border-radius padding color-button">
				<h5><?php echo $moTa ?></h5>
			</div>
		</div>

	<!-- Thong tin bo sung -->
		<div class="margin padding">
		<!-- Hoc van - Linh vuc -->
			<div class="hocvan-linhvuc">
				<div class="border border-radius padding">
					<h3>Học vấn: <?php echo $tenHocVan ?></h3>

					<?php
						$dsHocVan = mysqli_query($conn, "Select * From hocvanungvien inner join chuyennganh on hocvanungvien.MaChuyenNganh=chuyennganh.MaChuyenNganh Where MaUngVien='".$_GET['id']."'");
						if($dsHocVan->num_rows > 0){
							while($row = $dsHocVan->fetch_assoc()){
					?>

					<div class="thong-tin-bo-sung padding">
						<h4><?php echo $row['TenTruong'] ?></h4>
						<h5>Chuyên ngành: <?php echo $row['TenChuyenNganh'] ?></h5>
						<h6><?php echo $row['NamBatDau'] ?> - <?php echo $row['NamKetThuc'] ?></h6>
						<h5>GPA: <?php echo $row['GPA'] ?></h5>
					</div>

					<?php
							}
						}
					?>
				</div>
				<div class="border border-radius margin padding">
					<h3>Lĩnh vực làm việc:</h3>

					<?php
						$dsLinhVuc = mysqli_query($conn, "Select * From linhvucungvien inner join linhvuc on linhvucungvien.MaLinhVuc=linhvuc.MaLinhVuc Where MaUngVien='".$_GET['id']."'");
						if($dsLinhVuc->num_rows > 0){
							while($row = $dsLinhVuc->fetch_assoc()){
					?>
					<h5 class="chi-muc background-border2"><?php echo $row['TenLinhVuc'] ?></h5>
					<?php
							}
						}
					?>
				</div>
			</div>

		<!-- Kinh nghiem -->
			<div class="kinh-nghiem border border-radius padding">
				<h3>Kinh nghiệm làm việc: <?php echo $tenKinhNghiem ?></h3>

				<?php
					$dsKinhNghiem = mysqli_query($conn, "Select * From kinhnghiemungvien Where MaUngVien='".$_GET['id']."'");
					if($dsKinhNghiem->num_rows > 0){
						while($row = $dsKinhNghiem->fetch_assoc()){
				?>
				<div class="thong-tin-bo-sung padding">
					<h4><?php echo $row['TenNoiLamViec'] ?></h4>
					<h5>Vị trí: <?php echo $row['ViTriCongViec'] ?></h5>
					<h6><?php echo $row['NgayBatDauLamViec'] ?> đến <?php echo $row['NgayKetThucCongViec'] ?></h6>
				</div>
				<?php
						}
					}
				?>
			</div>
		</div>
	</div>
</div>

<?php
	if(!isset($_GET['id'])){
?>

<script type="text/javascript">
	window.location = 'index.php';
</script>

<?php
	}
?>

<?php
	require "inc/footer.php";
?>