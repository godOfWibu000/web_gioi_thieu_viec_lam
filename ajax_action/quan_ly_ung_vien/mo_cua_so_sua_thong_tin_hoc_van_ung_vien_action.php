<?php
	include('../../database/db.php');
	session_start();
	$dsHocVan = mysqli_query($conn, "Select * From hocvan");
	$dsChuyenNganh = mysqli_query($conn, "Select * From chuyennganh");
	// Hoc van
		$dsMaHocVan = $dsTenHocVan = null;
		if($dsHocVan->num_rows>0){
			$i = 0;
			while($row = $dsHocVan->fetch_assoc()){
				$dsMaHocVan[$i] = $row['MaHocVan'];
				$dsTenHocVan[$i] = $row['TenHocVan'];
				$i++;
			}
		}

	// Chuyen nganh
		$dsMaChuyenNganh = $dsTenChuyenNganh = null;
		if($dsChuyenNganh->num_rows>0){
			$i = 0;
			while($row = $dsChuyenNganh->fetch_assoc()){
				$dsMaChuyenNganh[$i] = $row['MaChuyenNganh'];
				$dsTenChuyenNganh[$i] = $row['TenChuyenNganh'];
				$i++;
			}
		}

	$thongTinHocVanUngVien = mysqli_query($conn, "SELECT * FROM hocvanungvien Where MaHocVanUngVien='".$_POST['id']."'");
	if($thongTinHocVanUngVien->num_rows>0){
		while($row = $thongTinHocVanUngVien->fetch_assoc()){
			$maChuyenNganhUngVien = $row['MaChuyenNganh'];
			$noiHocTap = $row['TenTruong'];
			$thoiGianBatDau = $row['NamBatDau'];
			$thoiGianKetThuc = $row['NamKetThuc'];
			$gpa = $row['GPA'];
		}
	}

?>
<h3>Sửa chi tiết học vấn</h3>
<form>
	<input type="text" name="" id="ma-hoc-van-ung-vien" value="<?php echo $_POST['id'] ?>" hidden><br>

	<label><h5>Nơi học tập:</h5></label><br>
	<input class="input width-100" id="sua-noi-hoc-tap" type="text" name="" value="<?php echo $noiHocTap ?>">
	<h5 class="color-delete" id="message-sua-noi-hoc-tap"></h5>

	<label><h5>Chuyên ngành:</h5></label><br>
	<select class="select width-100" id="lua-chon-sua-chuyen-nganh">
		<option disabled selected>Lựa chọn</option>
		<?php
			for ($i=0; $i < count($dsMaChuyenNganh); $i++) {
				if($dsMaChuyenNganh[$i] == $maChuyenNganhUngVien)
					echo '
		<option selected value="'.$dsMaChuyenNganh[$i].'">
			'.$dsTenChuyenNganh[$i].'
		</option>
					';	
				else
					echo '
		<option value="'.$dsMaChuyenNganh[$i].'">
			'.$dsTenChuyenNganh[$i].'
		</option>
					';	
			}
		?>
	</select>
	<h5 class="color-delete" id="message-lua-chon-sua-chuyen-nganh"></h5>

	<label><h5>Thời gian bắt đầu:</h5></label><br>
	<input class="input width-100" type="number" id="sua-thoi-gian-bat-dau-hoc" min="1985" max="2050" value="<?php echo $thoiGianBatDau ?>"><br>
	<h5 class="color-delete" id="message-sua-thoi-gian-bat-dau-hoc"></h5>

	<label><h5>Thời gian kết thúc:</h5></label><br>
	<input class="input width-100" type="number" id="sua-thoi-gian-ket-thuc-hoc" min="1985" max="2050" value="<?php echo $thoiGianKetThuc ?>">
	<h5 class="color-delete" id="message-sua-thoi-gian-ket-thuc-hoc"></h5>
	<input type="checkbox" name="check-nam-ket-thuc" id="check-sua-nam-ket-thuc" onclick="checkNamKetThuc('check-sua-nam-ket-thuc', 'sua-thoi-gian-ket-thuc-hoc')">
		<label for="check-nam-ket-thuc">Tôi đang học tại đây</label><br>

	<label><h5>GPA:</h5></label>
	<input class="input width-100" id="sua-gpa" type="number" step="0.01" name="" value="<?php echo $gpa ?>"><br><br>

	<button type="button" class="button button-create" onclick="validateThemChiTietHocVan('sua-noi-hoc-tap', 'sua-thoi-gian-bat-dau-hoc', 'sua-thoi-gian-ket-thuc-hoc', 'lua-chon-sua-chuyen-nganh', 'sua-gpa', 'message-sua-noi-hoc-tap', 'message-sua-thoi-gian-bat-dau-hoc', 'message-sua-thoi-gian-ket-thuc-hoc', 'message-lua-chon-sua-chuyen-nganh')">Lưu</button>
	<button type="reset" class="button button-reset">Reset</button>
</form>