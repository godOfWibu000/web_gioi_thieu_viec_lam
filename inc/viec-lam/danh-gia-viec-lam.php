<div class="danh-gia-cua-ung-vien border border-radius padding">
	<div class="phan-dau">
		<div class="flex">
			<img src="https://cdn-icons-png.flaticon.com/512/6596/6596121.png" width="40px">
			<h5 class="icon1"><?php echo $row['TenUngVien'] ?></h5>
		</div>
	</div>

	<div class="noi-dung">
		<h5 class="color-reset"><?php echo $row['SoSaoDanhGia'] ?>&nbsp;
			<?php
				for ($i=0; $i < $row['SoSaoDanhGia']; $i++) { 
					echo '<i class="fas fa-star"></i>';
				}
			?>

		</h5>
		<div class="binh-luan">
			<?php echo $row['BinhLuanDanhGia'] ?>
		</div>
	</div>

	<p class="thoi-gian-danh-gia"><span class="material-symbols-outlined icon1">schedule</span> <?php echo $row['ThoiGianDanhGia'] ?></p>
</div>