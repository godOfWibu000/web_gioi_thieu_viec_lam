<?php
	if($row['HanUngTuyen'] == date("Y-m-d")){
		$capNhatTrangThaiViecLam = $conn->query("Update vieclam Set TrangThaiViecLam=0 Where MaViecLam='".$row['MaViecLam']."'");
	}
?>

<div class="vieclam p-1 col-lg-4 col-md-6 mb-2">
	<div class="noi-dung border-radius">
		<div class="head">
			<h4 class="tieu-de"><?php echo $row['TenViecLam'] ?></h4>
		</div>

		<div>
			<a href="#" class="ten-nha-tuyen-dung"><h5><?php echo substr($row['TenNhaTuyenDung'], 0, 30) ?>...</h5></a>
		</div>

		<h6>
			<span class="material-symbols-outlined icon1">location_on</span> <?php echo $row['TenKhuVuc'] ?>
		</h6>

		<h6>
			<span class="material-symbols-outlined icon1">attach_money</span> <?php echo $row['TienLuong']?> USD
		</h6>

		<h6>
			<span class="material-symbols-outlined icon1">integration_instructions</span> <?php echo $row['TenLinhVuc'] ?>
		</h6>

		<h6>
			<span class="material-symbols-outlined icon1">school</span> <?php echo $row['TenHocVan'] ?>
		</h6>

		<h6>
			<span class="material-symbols-outlined icon1">work</span> <?php echo $row['TenKinhNghiem'] ?>
		</h6>

		<div style="display: flex;justify-content: space-between;">
			<h5 style="color: var(--main-color1);"><?php echo $row['SoNguoiQuanTam'] ?> quan tâm</h5>
			
			<div class="<?php echo $row['MaViecLam'] ?>">
				<?php
					if(isset($_SESSION["emailDangNhap"])){
						$quanTam = mysqli_query($conn, "Select * From quantam Where MaViecLam='".$row['MaViecLam']."' and Email='".$_SESSION["emailDangNhap"]."'");
						if($quanTam->num_rows > 0){
				?>
				<button style="width: 200px;" class="button button-create" onclick="quanTam('<?php echo $row['MaViecLam'] ?>', '<?php echo $_SESSION['emailDangNhap'] ?>', 'Bỏ quan tâm', 'ajax_action/viec_lam/quan_tam_action.php')">
					<span class="material-symbols-outlined icon1" style="">playlist_add_check</span>
					<span>
					Đã quan tâm
				</button>
				<?php
						}else{
				?>
				<button style="width: 200px;" class="button button-reset" onclick="quanTam('<?php echo $row['MaViecLam'] ?>', '<?php echo $_SESSION['emailDangNhap'] ?>', 'Quan tâm', 'ajax_action/viec_lam/quan_tam_action.php')">
					<span class="material-symbols-outlined icon1">playlist_add
					</span>
					Quan tâm
				</button>
				<?php
						}
					}
					else{
				?>
				<button style="width: 200px;" class="button button-reset" onclick="moCuaSo('login-frame', 'nen-cua-so-dang-nhap')">
					<span class="material-symbols-outlined icon1">playlist_add
					</span>
					Quan tâm
				</button>
				<?php
					}
				?>
			</div>
		</div>

		<div class="foot">
			<h6 class="thoi-gian"><span class="material-symbols-outlined icon1">schedule</span> <?php echo $row['ThoiGianDangViecLam'] ?></h6>
		</div>

		<a href="chi-tiet-viec-lam.php?id=<?php echo $row['MaViecLam'] ?>&viec-lam=<?php echo $row['TenViecLam'] ?>"><button class="xem-chi-tiet button button-create">Xem chi tiết</button></a>
	</div>
</div>