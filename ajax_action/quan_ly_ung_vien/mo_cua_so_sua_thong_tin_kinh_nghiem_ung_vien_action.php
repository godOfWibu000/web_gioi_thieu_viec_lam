<?php
	include('../../database/db.php');
	session_start();
	if(isset($_POST['id'])){
		$sql = "Select * From kinhnghiemungvien Where MaKinhNghiemUngVien='".$_POST['id']."'";
		$kinhNghiemUngVien = mysqli_query($conn, $sql);
		if($kinhNghiemUngVien->num_rows>0){
			while($row = $kinhNghiemUngVien->fetch_assoc()){
				$noiLamViec = $row['TenNoiLamViec'];
				$viTriCongViec = $row['ViTriCongViec'];
				$thoiGianBatDau = $row['NgayBatDauLamViec'];
				$thoiGianKetThuc = $row['NgayKetThucCongViec'];
			}
		}
	}
?>

<h3>Cập nhật thông tin nơi làm việc</h3>
<form>
	<input type="text" name="" id="ma-kinh-nghiem-ung-vien" value="<?php echo $_POST['id'] ?>" hidden><br>
	<label><h5>Nơi làm việc:</h5></label><br>
	<input class="input width-100" id="sua-noi-lam-viec" type="text" name="" value="<?php echo $noiLamViec ?>">
	<h5 class="color-delete" id="message-sua-noi-lam-viec"></h5>

	<label><h5>Vị trí công việc:</h5></label><br>
	<input class="input width-100" id="sua-vi-tri-cong-viec" type="text" name="" value="<?php echo $viTriCongViec ?>">
	<h5 class="color-delete" id="message-sua-vi-tri-cong-viec"></h5>

	<label><h5>Thời gian bắt đầu:</h5></label><br>
	<input class="input width-100" id="sua-thoi-gian-bat-dau-cong-viec" type="date" name="" value="<?php echo $thoiGianBatDau ?>">
	<h5 class="color-delete" id="message-sua-thoi-gian-bat-dau-cong-viec"></h5>

	<label><h5>Thời gian kết thúc:</h5></label><br>
	<input class="input width-100" id="sua-thoi-gian-ket-thuc-cong-viec" type="date" name="" value="<?php echo $thoiGianKetThuc ?>">
	<h5 class="color-delete" id="message-sua-thoi-gian-ket-thuc-cong-viec"></h5>

	<br>

	<button type="button" class="button button-create" onclick="validateThemKinhNghiem('sua-noi-lam-viec', 'sua-vi-tri-cong-viec', 'sua-thoi-gian-bat-dau-cong-viec', 'sua-thoi-gian-ket-thuc-cong-viec', 'message-sua-noi-lam-viec', 'message-sua-vi-tri-cong-viec', 'message-sua-thoi-gian-ket-thuc-cong-viec')">Lưu lại</button>
	<button class="button button-reset" type="reset">Đặt lại</button>
</form>