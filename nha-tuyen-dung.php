<!-- Head -->
<?php
	$title = "Tìm việc làm sinh viên IT VNUA-Trang chủ";
	require "inc/head.php";
?>

<link rel="stylesheet" type="text/css" href="css/side-bar.css">

<!-- Header -->
<?php
	require "inc/header.php";
?>

<div class="content padding">
	<!-- Side-bar -->
		<?php
			require "inc/side-bar.php";
		?>

	<div id="ds-nha-tuyen-dung">
	<h3>Nhà tuyển dụng nổi bật</h3>
	<!-- DS nha tuyen dung -->
		<?php
			$dsNhaTuyenDung = mysqli_query($conn, "Select * From nhatuyendung Order By DanhGiaTrungBinh DESC");
			if($dsNhaTuyenDung->num_rows>0){
				while($row = $dsNhaTuyenDung->fetch_assoc()){
		?>
		<a class="a color-black" href="chi-tiet-nha-tuyen-dung.php?id=<?php echo $row['MaNhaTuyenDung'] ?>&ten-nha-tuyen-dung=<?php echo $row['TenNhaTuyenDung'] ?>">
			<div class="nha-tuyen-dung flex border border-radius cursor-pointer padding" style="overflow: auto;">
				<div style="width: 20%;">
					<img src="img/avatar.jpg" width="100%">
				</div>

				<div class="padding"style="width: 80%;">
					<h4><?php echo $row['TenNhaTuyenDung'] ?></h4>
					<?php
						$linhVucNTD = dsThongTinBoSung($conn, "Select TenLinhVuc From linhvucnhatuyendung inner join linhvuc on linhvucnhatuyendung.MaLinhVuc=linhvuc.MaLinhVuc Where MaNhaTuyenDung='".$row['MaNhaTuyenDung']."'", "TenLinhVuc");
						if($linhVucNTD != null){
							for ($i=0; $i < count($linhVucNTD); $i++) { 
								echo '
					<span class="chi-muc background-border2">'.$linhVucNTD[$i].'</span>
								';
							}
						}
					?>

					<div class="flex">
						<h4><?php echo $row['DanhGiaTrungBinh'] ?></h4>
						<h4><span class="material-symbols-outlined">star</span><h4>
					</div>

					<div class="padding">
						<div class="flex">
							<span class="material-symbols-outlined">call</span>
							<h5><?php echo $row['SDTNhaTuyenDung'] ?></h5>
						</div>
						<div class="flex">
							<span class="material-symbols-outlined">mail</span>
							<h5><?php echo $row['Email'] ?></h5>
						</div>
						<div class="flex">
							<span class="material-symbols-outlined">location_on</span>
							<h5><?php echo $row['DiaChiNhaTuyenDung'] ?></h5>
						</div>
					</div>
				</div>
			</div>
		</a>
		<hr>

		<?php
				}
			}
		?>
	</div>
</div>

<!-- Footer -->
<?php require "inc/footer.php" ?>