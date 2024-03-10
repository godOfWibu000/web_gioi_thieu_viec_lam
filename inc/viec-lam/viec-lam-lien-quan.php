<?php
	if($row['MaViecLam'] != $_GET['id']){
?>

<div class="viec-lam-lien-quan">
	<a class="a" href="chi-tiet-viec-lam.php?id=<?php echo $row['MaViecLam'] ?>&viec-lam=<?php echo $row['TenViecLam'] ?>">
		<h4><?php echo $row['TenViecLam'] ?></h4>
		<h6 class="color-black">
			<span class="material-symbols-outlined icon1">location_on</span> <?php echo $row['TenKhuVuc'] ?>
		</h6>
		<h6 class="color-black">
			<span class="material-symbols-outlined icon1">attach_money</span> <?php echo $row['TienLuong'] ?>
		</h6>
		<h6 class="color-black">
			<span class="material-symbols-outlined icon1">work</span> <?php echo $row['TenLinhVuc'] ?>
		</h6>
		<h6 class="color-black">
			<span class="material-symbols-outlined icon1">exercise</span> <?php echo $row['TenKinhNghiem'] ?>
		</h6>

		<div class="color-black">
			<h6 class="thoi-gian"><span class="material-symbols-outlined icon1">schedule</span> <?php echo $row['ThoiGianUngTuyen'] ?></h6>
		</div>
	</a>
</div>

<?php } ?>