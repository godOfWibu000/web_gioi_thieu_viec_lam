<!-- Hoc van -->
	<div class="hoc-van-ung-vien muc-thong-tin-bo-sung  muc-thong-tin-bo-sung-1 padding">
		<form method="post">
			<h4 style="display: inline;">
				Học vấn: 
			</h4>
			<select class="select" id="lua-chon-chinh-sua-hoc-van">
				<?php
					for ($i=0; $i < count($dsMaHocVan); $i++) { 
						if($dsMaHocVan[$i] == $maHocVan)
							echo '
				<option selected value="'.$dsMaHocVan[$i].'">
					'.$dsTenHocVan[$i].'
				</option>
							';
						else
							echo '
				<option value="'.$dsMaHocVan[$i].'">
					'.$dsTenHocVan[$i].'
				</option>
							';
					}
				?>
			</select>
			<button onclick="suaThongTinHocVanUngVien()" type="button" class="button button-create">Lưu</button>
		</form>

		<?php 
			if($dsChiTietHocVan->num_rows>0){
				while($row = $dsChiTietHocVan->fetch_assoc()){
		?>
		<div class="hoc-van thong-tin-bo-sung-item">
			<div class="noi-dung">
				<h5>
					<span class="material-symbols-outlined icon1">school</span> <?php echo $row['TenTruong'] ?>
				</h5>
				<h6><?php echo $row['TenChuyenNganh'] ?>(<?php echo $row['NamBatDau'] ?>-<?php echo $row['NamKetThuc'] ?>)-GPA: <?php echo $row['GPA'] ?></h6>
			</div>

			<div class="tuy-chon text-center">
				<span class="material-symbols-outlined color-create icon" onclick="moCuaSo('cua-so-sua-chi-tiet-hoc-van', 'nen-cua-so-sua-chi-tiet-hoc-van');loadSuaHocVanUngVien('<?php echo $row['MaHocVanUngVien'] ?>');">edit_square</span>
				<span class="material-symbols-outlined color-delete icon" onclick="xoaChiTietThongTinHocVanUngVien('<?php echo $row['MaHocVanUngVien'] ?>')">backspace</span>
			</div>
		</div>
		<hr>
		<?php
				}
			}
		?>

		<div class="button-tuy-chon">
			<button class="button button-create" onclick="moCuaSo('cua-so-them-chi-tiet-hoc-van', 'nen-cua-so-them-chi-tiet-hoc-van')">
				Thêm
			</button>
		</div>

	<!-- Them hoc van ung vien -->
		<div class="cua-so cua-so-nho padding" id="cua-so-them-chi-tiet-hoc-van">
			<h3>Thêm chi tiết học vấn</h3>
			<form>
				<label><h5>Nơi học tập:</h5></label><br>
				<input class="input width-100" id="them-noi-hoc-tap" type="text" name="">
				<h5 class="color-delete" id="message-them-noi-hoc-tap"></h5>

				<label><h5>Chuyên ngành:</h5></label><br>
				<select class="select width-100" id="lua-chon-them-moi-chuyen-nganh">
					<option disabled selected>Lựa chọn</option>
					<?php
						for ($i=0; $i < count($dsMaChuyenNganh); $i++) {
							echo '
					<option value="'.$dsMaChuyenNganh[$i].'">
						'.$dsTenChuyenNganh[$i].'
					</option>
							';	
						}
					?>
				</select>
				<h5 class="color-delete" id="message-lua-chon-them-moi-chuyen-nganh"></h5>

				<label><h5>Thời gian bắt đầu:</h5></label><br>
				<input class="input width-100" type="number" id="them-thoi-gian-bat-dau-hoc" min="1985" max="2050" value="2012"><br>
				<h5 class="color-delete" id="message-them-thoi-gian-bat-dau-hoc"></h5>

				<label><h5>Thời gian kết thúc:</h5></label><br>
				<input class="input width-100" type="number" id="them-thoi-gian-ket-thuc-hoc" min="1985" max="2050" value="2012">
				<h5 class="color-delete" id="message-them-thoi-gian-ket-thuc-hoc"></h5>
				<input type="checkbox" name="check-nam-ket-thuc" id="check-them-nam-ket-thuc" onclick="checkNamKetThuc('check-them-nam-ket-thuc', 'them-thoi-gian-ket-thuc-hoc')">
				<label for="check-nam-ket-thuc">Tôi đang học tại đây</label><br>

				<label><h5>GPA:</h5></label>
				<input class="input width-100" id="them-gpa" type="number" step="0.01" name=""><br><br>

				<button type="button" class="button button-create" onclick="validateThemChiTietHocVan('them-noi-hoc-tap', 'them-thoi-gian-bat-dau-hoc', 'them-thoi-gian-ket-thuc-hoc', 'lua-chon-them-moi-chuyen-nganh', 'them-gpa', 'message-them-noi-hoc-tap', 'message-them-thoi-gian-bat-dau-hoc', 'message-them-thoi-gian-ket-thuc-hoc', 'message-lua-chon-them-moi-chuyen-nganh')">Lưu</button>
				<button type="reset" class="button button-reset">Reset</button>
			</form>
		</div>
		<div class="nen-cua-so" id="nen-cua-so-them-chi-tiet-hoc-van" onclick="dongCuaSo('cua-so-them-chi-tiet-hoc-van', 'nen-cua-so-them-chi-tiet-hoc-van')">
			
		</div>

	<!-- Sua hoc van ung vien -->
		<div class="cua-so cua-so-nho padding" id="cua-so-sua-chi-tiet-hoc-van">
			
		</div>
		<div class="nen-cua-so" id="nen-cua-so-sua-chi-tiet-hoc-van" onclick="dongCuaSo('cua-so-sua-chi-tiet-hoc-van', 'nen-cua-so-sua-chi-tiet-hoc-van')">
			
		</div>
	</div>

<!-- Linh vuc -->
	<div class="chuyen-mon-ung-vien muc-thong-tin-bo-sung padding">
		<h4>Lĩnh vực:</h4>

		<?php
			if($dsLinhVucUngVien->num_rows>0){
				while($row = $dsLinhVucUngVien->fetch_assoc()){
		?>

		<div class="chuyen-mon thong-tin-bo-sung-item">
			<div class="noi-dung" style="width: 80%;">
				<h5>
					<span class="material-symbols-outlined icon1">integration_instructions</span>
					<span><?php echo $row['TenLinhVuc'] ?></span>
				</h5>
			</div>

			<div class="tuy-chon">
				<span class="material-symbols-outlined color-delete icon" onclick="xoaChiTietThongTinLinhVucUngVien('<?php echo $row['MaLinhVuc'] ?>')">backspace</span>
			</div>
		</div>
		<hr>
		
		<?php
				}
			}
		?>
		<div class="button-tuy-chon">
			<button class="button button-create" onclick="moCuaSo('cua-so-them-chuyen-mon', 'nen-cua-so-them-chuyen-mon')">
				Thêm
			</button>
		</div>

	<!-- Them linh vuc -->
		<div class="cua-so cua-so-nho padding" id="cua-so-them-chuyen-mon">
			<h3>Thêm lĩnh vực</h3>
			<form>
				<label><h5>Lĩnh vực:</h5></label><br>
				<select class="select width-100" id="lua-chon-them-moi-linh-vuc">
					<option selected disabled>Lựa chọn</option>
					<?php
						for ($i=0; $i < count($dsMaLinhVuc); $i++) { 
							echo'
					<option value="'.$dsMaLinhVuc[$i].'">'.$dsTenLinhVuc[$i].'</option>		
							';
						}
					?>
				</select>
				<h5 class="color-delete" id="message-lua-chon-them-moi-linh-vuc"></h5>

				<br>

				<button type="button" class="button button-create" onclick="validateThemChuyenMon()">Lưu lại</button>
				<button type="reset" class="button button-reset">Đặt lại</button>
			</form>
		</div>
		<div class="nen-cua-so" id="nen-cua-so-them-chuyen-mon" onclick="dongCuaSo('cua-so-them-chuyen-mon', 'nen-cua-so-them-chuyen-mon')">
			
		</div>
	</div>

<!-- Kinh nghiem -->
	<div class="kinh-nghiem-ung-vien muc-thong-tin-bo-sung muc-thong-tin-bo-sung-1 padding">
		<form method="post">
			<h4 style="display: inline;">
				Kinh nghiệm: 
			</h4>
			<select class="select" id="lua-chon-chinh-sua-kinh-nghiem">
				<?php
					for ($i=0; $i < count($dsMaKinhNghiem); $i++) { 
						if($dsMaKinhNghiem[$i] == $maKinhNghiem)
							echo '
				<option selected value="'.$dsMaKinhNghiem[$i].'">
					'.$dsTenKinhNghiem[$i].'
				</option>
							';
						elseif($dsTenKinhNghiem[$i] == 'Không yêu cầu')
							echo '';
						else
							echo '
				<option value="'.$dsMaKinhNghiem[$i].'">
					'.$dsTenKinhNghiem[$i].'
				</option>
							';
					}
				?>
			</select>
			<button onclick="suaThongTinKinhNghiemUngVien()" type="button" class="button button-create">Lưu</button>
		</form>

	<!-- DS noi lam viec -->
		<?php
			if($dsChiTietKinhNghiem->num_rows>0){
				while($row = $dsChiTietKinhNghiem->fetch_assoc()){
		?>

		<div class="kinh-nghiem thong-tin-bo-sung-item">
			<div class="noi-dung">
				<h5><span class="material-symbols-outlined icon1">work</span> <?php echo $row['TenNoiLamViec'] ?></h5>
				<h6><?php echo $row['ViTriCongViec'] ?>(<?php echo $row['NgayBatDauLamViec'] ?> đến <?php echo $row['NgayKetThucCongViec'] ?>)</h6>
			</div>

			<div class="tuy-chon">
				<span class="material-symbols-outlined color-create icon" onclick="moCuaSo('cua-so-sua-chi-tiet-kinh-nghiem', 'nen-cua-so-sua-chi-tiet-kinh-nghiem');loadSuaKinhNghiemUngVien('<?php echo $row['MaKinhNghiemUngVien'] ?>');">edit_square</span>
				<span class="material-symbols-outlined color-delete icon" onclick="xoaChiTietThongTinKinhNghiemUngVien('<?php echo $row['MaKinhNghiemUngVien'] ?>')">backspace</span>
			</div>
		</div>
		<hr>
		
		<?php
				}
			}
		?>

		<div class="button-tuy-chon">
			<button class="button button-create" onclick="moCuaSo('cua-so-them-chi-tiet-kinh-nghiem', 'nen-cua-so-them-chi-tiet-kinh-nghiem')">
				Thêm
			</button>
		</div>

	<!-- Them noi lam viec -->
		<div class="cua-so cua-so-nho padding" id="cua-so-them-chi-tiet-kinh-nghiem">
			<h3>Thêm nơi làm việc</h3>
			<form>
				<label><h5>Nơi làm việc:</h5></label><br>
				<input class="input width-100" id="them-noi-lam-viec" type="text" name="">
				<h5 class="color-delete" id="message-them-noi-lam-viec"></h5>

				<label><h5>Vị trí công việc:</h5></label><br>
				<input class="input width-100" id="them-vi-tri-cong-viec" type="text" name="">
				<h5 class="color-delete" id="message-them-vi-tri-cong-viec"></h5>

				<label><h5>Thời gian bắt đầu:</h5></label><br>
				<input class="input width-100" id="them-thoi-gian-bat-dau-cong-viec" type="date" name="" value="2022-01-01">
				<h5 class="color-delete" id="message-them-thoi-gian-bat-dau-cong-viec"></h5>

				<label><h5>Thời gian kết thúc:</h5></label><br>
				<input class="input width-100" id="them-thoi-gian-ket-thuc-cong-viec" type="date" name="" value="2022-01-01">
				<h5 class="color-delete" id="message-them-thoi-gian-ket-thuc-cong-viec"></h5>

				<br>

				<button type="button" class="button button-create" onclick="validateThemKinhNghiem('them-noi-lam-viec', 'them-vi-tri-cong-viec', 'them-thoi-gian-bat-dau-cong-viec', 'them-thoi-gian-ket-thuc-cong-viec', 'message-them-noi-lam-viec', 'message-them-vi-tri-cong-viec', 'message-them-thoi-gian-ket-thuc-cong-viec')">Lưu lại</button>
				<button class="button button-reset" type="reset">Đặt lại</button>
			</form>
		</div>
		<div class="nen-cua-so" id="nen-cua-so-them-chi-tiet-kinh-nghiem" onclick="dongCuaSo('cua-so-them-chi-tiet-kinh-nghiem', 'nen-cua-so-them-chi-tiet-kinh-nghiem')">
			
		</div>

	<!-- Sua noi lam viec -->
		<div class="cua-so cua-so-nho padding" id="cua-so-sua-chi-tiet-kinh-nghiem">
			<h3>Sửa nơi làm việc</h3>
		</div>
		<div class="nen-cua-so" id="nen-cua-so-sua-chi-tiet-kinh-nghiem" onclick="dongCuaSo('cua-so-sua-chi-tiet-kinh-nghiem', 'nen-cua-so-sua-chi-tiet-kinh-nghiem')">
			
		</div>
	</div>

<!-- Lien ket internet -->
	<div class="lien-ket-internet-ung-vien muc-thong-tin-bo-sung padding">
		<h4>
			Liên kết Internet: 
		</h4>
		<?php
			if($dsTenLienKetInternetUngVien != null){
				for($i=0; $i<count($dsTenLienKetInternetUngVien); $i++){
		?>

	<!-- DS lien ket -->
		<div class="thong-tin-bo-sung-item">
			<div class="noi-dung">
				<h5>
					<span class="lien-ket-internet"><?php echo $dsBieuTuongLienKetInternetUngVien[$i] ?></span>
					<?php echo $dsTenLienKetInternetUngVien[$i] ?>
				</h5>
				<h6><?php echo $dsDuongDanLienKetInternetUngVien[$i] ?></h6>
			</div>

			<div class="tuy-chon">
				<span class="material-symbols-outlined color-create icon" onclick="moCuaSo('cua-so-sua-lien-ket-internet', 'nen-cua-so-sua-lien-ket-internet');loadSuaLienKetInternetUngVien('<?php echo $dsMaLienKetInternetUngVien[$i] ?>', '<?php echo $dsTenLienKetInternetUngVien[$i] ?>', '<?php echo $dsDuongDanLienKetInternetUngVien[$i] ?>');">edit_square</span>

				<span class="material-symbols-outlined color-delete icon" onclick="xoaChiTietThongTinLienKetInternetUngVien('<?php echo $dsMaLienKetInternetUngVien[$i] ?>')">backspace</span>
			</div>
		</div>
		<hr>

		<?php
				}
			}
		?>

		<div class="button-tuy-chon">
			<button class="button button-create" onclick="moCuaSo('cua-so-them-lien-ket-internet', 'nen-cua-so-them-lien-ket-internet')">
				Thêm
			</button>
		</div>

	<!-- Them lien ket -->
		<div class="cua-so cua-so-nho padding" id="cua-so-them-lien-ket-internet">
			<h3>Thêm liên kết Internet</h3>

			<form>
				<label><h5>Chọn liên kết:</h5></label><br>
				<select class="select width-100" id="lua-chon-them-lien-ket">
					<option selected disabled>Lựa chọn</option>
					<?php
						for ($i=0; $i < count($dsMaLienKetInternet); $i++) {
							echo '
					<option value="'.$dsMaLienKetInternet[$i].'">'.$dsTenLienKetInternet[$i].'</option>
							';
						}
					?>
				</select>
				<h5 class="color-delete" id="message-them-lien-ket"></h5>

				<label><h5>Đường dẫn liên kết:</h5></label><br>
				<input class="input width-100" id="them-duong-dan-lien-ket" type="text" name="">
				<h5 class="color-delete" id="message-them-duong-dan-lien-ket"></h5>
				<br>

				<button type="button" class="button button-create" onclick="validateThemLienKet('them-duong-dan-lien-ket', 'message-them-duong-dan-lien-ket')">Lưu lại</button>
				<button class="button button-reset" type="reset">Đặt lại</button>
			</form>
		</div>
		<div class="nen-cua-so" id="nen-cua-so-them-lien-ket-internet" onclick="dongCuaSo('cua-so-them-lien-ket-internet', 'nen-cua-so-them-lien-ket-internet')">
			
		</div>

	<!-- Sua lien ket -->
		<div class="cua-so cua-so-nho padding" id="cua-so-sua-lien-ket-internet">
			
		</div>
		<div class="nen-cua-so" id="nen-cua-so-sua-lien-ket-internet" onclick="dongCuaSo('cua-so-sua-lien-ket-internet', 'nen-cua-so-sua-lien-ket-internet')">
			
		</div>
	</div>