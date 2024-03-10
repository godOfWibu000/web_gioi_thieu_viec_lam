<?php
	$title = 'Admin-Thông tin nhà tuyển dụng';
	require '../inc/admin/header-admin.php';
?>
		<?php
			if(isset($_SESSION['loaiTaiKhoan']) && $_SESSION['loaiTaiKhoan'] == 'Admin'){
				$result = mysqli_query($conn, "Select * From nhatuyendung Where MaNhaTuyenDung='".$_GET['id']."'");
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
						$tenNhaTuyenDung = $row['TenNhaTuyenDung'];
						$sdt = $row['SDTNhaTuyenDung'];
						$email = $row['Email'];
						$diaChi = $row['DiaChiNhaTuyenDung'];
						$moTa = $row['MoTaNhaTuyenDung'];
					}
				}
		?>

		<!-- Thong tin -->
			<h2>Thông tin nhà tuyển dụng</h2>
			<div>
				<div class="box-shadow border-radius padding">
					<div class="phan-dau flex" style="justify-content: space-between;">
						<div class="anh-va-ten">
							<div style="margin-top: 20px;">
								<h3><?php echo $tenNhaTuyenDung ?></h3>
							</div>
						</div>
					</div>
					<?php
						$dsLinhVuc = mysqli_query($conn, "Select * from linhvucnhatuyendung inner join linhvuc on linhvucnhatuyendung.MaLinhVuc=linhvuc.MaLinhVuc Where MaNhaTuyenDung='".$_GET['id']."'");
						if($dsLinhVuc->num_rows > 0){
							while($row1 = $dsLinhVuc->fetch_assoc()){
					?>

					<span class="chi-muc background-border2"><?php echo $row1['TenLinhVuc'] ?></span>

					<?php
							}
						}
					?>

					<div class="phan-than">
						<h5 class="so-dien-thoai">
							<span class="material-symbols-outlined icon1">
														call
							</span> <?php echo $sdt ?>
						</h5>

						<h5 class="email">
							<span class="material-symbols-outlined icon1">
														mail
							</span> <?php echo $email ?>
						</h5>

						<h5 class="dia-chi">
							<span class="material-symbols-outlined icon1">
														location_on
							</span> <?php echo $diaChi ?>
						</h5>

						<h5 class="mo-ta border padding border-radius">
							<?php echo $moTa ?>
						</h5>

						<div class="ds-lien-ket-internet text-center">
							<?php
								$dsLienKetInternet = mysqli_query($conn, "Select * From lienketinternetnhatuyendung inner join lienketinternet on lienketinternetnhatuyendung.MaLienKetInternet=lienketinternet.MaLienKetInternet Where MaNhaTuyenDung='".$_GET['id']."'");
								if($dsLienKetInternet->num_rows > 0){
									while($row2 = $dsLienKetInternet->fetch_assoc()){
							?>
								
							<a class="a" href="<?php echo $row2['DuongDanLienKet'] ?>" target="_blank">
								<span class="lien-ket-internet"><?php echo $row2['BieuTuongLienKetInternet'] ?></span>
							</a>

							<?php
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>

		<!-- Viec lam -->
			<div class="margin">
				<h3>Việc làm nhà tuyển dụng</h3>
				<table class="table table-striped">
					<tr>
				    	<th>Id</th>
				        <th>Tên việc làm</th>
				        <th>Thời gian</th>
				        <th>Trạng thái</th>
				        <th></th>
				        <th></th>
				    </tr>

				    <?php
				    	$dsViecLam = mysqli_query($conn, "Select * From vieclam Where MaNhaTuyenDung='".$_GET['id']."'");
				    	if($dsViecLam->num_rows > 0){
				    		while($row3 = $dsViecLam->fetch_assoc()){
				    ?>

				    <tr>
				    	<td><?php echo $row3['MaViecLam'] ?></td>
				    	<td><?php echo $row3['TenViecLam'] ?></td>
				    	<td><?php echo $row3['ThoiGianDangViecLam'] ?></td>
				    	<td>
				    	<?php
				    		if($row3['TrangThaiViecLam'] == 1)
				    			echo 'Mở';
				    		else
				    			echo 'Đóng';
				    	?>
				    	</td>

				    	<td><button class="button button-create" onclick="moCuaSo('cua-so-thong-tin-viec-lam', 'nen-cua-so-thong-tin-viec-lam');moCuaSoXemViecLam('<?php echo $row3['MaViecLam'] ?>')">Xem</button></td>
					    <td><button class="button button-delete">Xóa</button></td>
				    </tr>

				    <?php
				    		}
				    	}
				    ?>
				</table>
			</div>

			<div class="cua-so cua-so-lon padding" id="cua-so-thong-tin-viec-lam">
				
			</div>

			<div class="nen-cua-so" id="nen-cua-so-thong-tin-viec-lam" onclick="dongCuaSo('cua-so-thong-tin-viec-lam', 'nen-cua-so-thong-tin-viec-lam')">
				
			</div>

			<?php } ?>
		</div>
	</div>
</body>
</html>