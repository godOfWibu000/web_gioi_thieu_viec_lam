<?php
	include('../../database/db.php');
	session_start();
?>

<!-- Ung vien -->
	<?php
		if(isset($_POST['maUngVien'])){
			$result = mysqli_query($conn, "Select * From ungvien inner join hocvan on ungvien.MaHocVan=hocvan.MaHocVan inner join kinhnghiem on ungvien.MaKinhNghiem=kinhnghiem.MaKinhNghiem Where MaUngVien='".$_POST['maUngVien']."'");
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
	?>

	<div>
		<h3>Thông tin ứng viên:</h3>

	<!-- Thong tin co ban -->
		<h4>Mã ứng viên: <?php echo $row['MaUngVien'] ?></h4>
		<h4>Tên ứng viên: <?php echo $row['TenUngVien'] ?></h4>
		<h4>Ngày sinh: <?php echo $row['NgaySinhUngVien'] ?></h4>
		<h4>Số điện thoại: <?php echo $row['SDTUngVien'] ?></h4>
		<h4>Địa chỉ: <?php echo $row['DiaChiUngVien'] ?></h4>
		<h4>Mô tả: <?php echo $row['MoTaUngVien'] ?></h4>
		<?php
			$dsLienKetInternet = mysqli_query($conn, "Select * From lienketinternetungvien inner join lienketinternet on lienketinternetungvien.MaLienKetInternet=lienketinternet.MaLienKetInternet Where MaUngVien='".$_POST['maUngVien']."'");
			if($dsLienKetInternet->num_rows > 0){
				while($row4 = $dsLienKetInternet->fetch_assoc()){
		?>

		<a href="<?php echo $row4['DuongDanLienKet'] ?>">
			<span class="lien-ket-internet">
				<?php echo $row4['BieuTuongLienKetInternet'] ?>
			</span>
		</a>

		<?php
				}
			}
		?>

	<!-- Hoc van -->
		<h4>Học vấn: <?php echo $row['TenHocVan'] ?></h4>
		<table class="table table-striped">
			<tr>
			    <th>Tên trường</th>
			    <th>Chuyên ngành</th>
			    <th>Năm bắt đầu</th>
			    <th>Năm kết thúc</th>
			    <th>GPA</th>
		    </tr>

			    <?php
			    	$dsHocVan = mysqli_query($conn, "Select * From hocvanungvien inner join chuyennganh on hocvanungvien.MaChuyenNganh=chuyennganh.MaChuyenNganh Where MaUngVien='".$_POST['maUngVien']."'");
			    	if($dsHocVan->num_rows > 0){
			    		while($row1 = $dsHocVan->fetch_assoc()){
			    ?>

		    <tr>
			    <td><?php echo $row1['TenTruong'] ?></td>
			    <td><?php echo $row1['TenChuyenNganh'] ?></td>
			    <td><?php echo $row1['NamBatDau'] ?></td>
			    <td><?php echo $row1['NamKetThuc'] ?></td>
			    <td><?php echo $row1['GPA'] ?></td>
		    </tr>

			    <?php
			    		}
			    	}
			    ?>
		</table>

	<!-- Linh vuc -->
		<h4>Lĩnh vực làm việc:</h4>
		<div>
				<?php
			    	$dsLinhVuc = mysqli_query($conn, "Select * From linhvucungvien inner join linhvuc on linhvucungvien.MaLinhVuc=linhvuc.MaLinhVuc Where MaUngVien='".$_POST['maUngVien']."'");
			    	if($dsLinhVuc->num_rows > 0){
			    		while($row2 = $dsLinhVuc->fetch_assoc()){
			    ?>

			<span class="chi-muc background-border2"><?php echo $row2['TenLinhVuc'] ?></span>

			    <?php
			    		}
			    	}
			    ?>
		</div>

	<!-- Kinh nghiem -->
		<h4>Kinh nghiệm: <?php echo $row['TenKinhNghiem'] ?></h4>
		<table class="table table-striped">
			<tr>
			    <th>Tên nơi làm việc</th>
			    <th>Vị trí công việc</th>
			    <th>Ngày bắt đầu</th>
			    <th>Ngày kết thúc</th>
		    </tr>

		    	<?php
			    	$dsKinhNghiem = mysqli_query($conn, "Select * From kinhnghiemungvien Where MaUngVien='".$_POST['maUngVien']."'");
			    	if($dsKinhNghiem->num_rows > 0){
			    		while($row3 = $dsKinhNghiem->fetch_assoc()){
			    ?>

			<tr>
			    <td><?php echo $row3['TenNoiLamViec'] ?></td>
			    <td><?php echo $row3['ViTriCongViec'] ?></td>
			    <td><?php echo $row3['NgayBatDauLamViec'] ?></td>
			    <td><?php echo $row3['NgayKetThucCongViec'] ?></td>
		    </tr>

			    <?php
			    		}
			    	}
			    ?>
		</table>
	</div>

	<?php

				}
			}
		}
	?>

<!-- Viec lam -->
	<?php
		if(isset($_POST['maViecLam'])){
			$viecLam = mysqli_query($conn, "Select * From vieclam inner join nhatuyendung on vieclam.MaNhaTuyenDung=NhaTuyenDung.MaNhaTuyenDung inner join khuvuc on viecLam.MaKhuVuc=khuvuc.MaKhuVuc inner join hocvan on viecLam.MaHocVan=hocvan.MaHocVan inner join linhvuc on viecLam.MaLinhVuc=linhvuc.MaLinhVuc inner join kinhnghiem on viecLam.MaKinhNghiem=kinhnghiem.MaKinhNghiem Where MaViecLam='".$_POST['maViecLam']."'");
			if($viecLam->num_rows > 0){
				while($row = $viecLam->fetch_assoc()){
	?>

	<h3>Thông tin việc làm</h3>
	<table class="table table-striped">
		<tr>
			<th>Mã việc làm:</th>
			<td><?php echo $row['MaViecLam'] ?></td>
		</tr>
		<tr>
			<th>Tên việc làm:</th>
			<td><?php echo $row['TenViecLam'] ?></td>
		</tr>
		<tr>
			<th>Nhà tuyển dụng:</th>
			<td>
				<?php echo $row['TenNhaTuyenDung'] ?>
				<a class="a" href="thong-tin-nha-tuyen-dung.php?id=<?php echo $row['MaNhaTuyenDung'] ?>">Xem</a>
			</td>
		</tr>
		<tr>
			<th>Khu vực:</th>
			<td><?php echo $row['TenKhuVuc'] ?></td>
		</tr>
		<tr>
			<th>Học vấn:</th>
			<td><?php echo $row['TenHocVan'] ?></td>
		</tr>
		<tr>
			<th>Lĩnh vực:</th>
			<td><?php echo $row['TenLinhVuc'] ?></td>
		</tr>
		<tr>
			<th>Kinh nghiệm:</th>
			<td><?php echo $row['TenKinhNghiem'] ?></td>
		</tr>
		<tr>
			<th>Mức lương:</th>
			<td><?php echo $row['TienLuong'] ?> $</td>
		</tr>
		<tr>
			<th>Thời gian bắt đầu ứng tuyển: </th>
			<td><?php echo $row['ThoiGianUngTuyen'] ?></td>
		</tr>
		<tr>
			<th>Hạn ứng tuyển:</th>
			<td><?php echo $row['HanUngTuyen'] ?></td>
		</tr>
		<tr>
			<th>Số lượng tuyển dụng:</th>
			<td><?php echo $row['SoLuongTuyenDung'] ?></td>
		</tr>
		<tr>
			<th>Số lượng ứng tuyển:</th>
			<td><?php echo $row['SoLuongDaUngTuyen'] ?></td>
		</tr>
		<tr>
			<th>Số người quan tâm:</th>
			<td><?php echo $row['SoNguoiQuanTam'] ?></td>
		</tr>
		<tr>
			<th>Trạng thái:</th>
			<td>
				<?php
					if($row['TrangThaiViecLam'] == 1)
						echo 'Mở';
					else
						echo 'Đóng';
				?>		
			</td>
		</tr>
	</table>
	Đăng lúc: <?php echo $row['ThoiGianDangViecLam'] ?>

	<?php
				}
			}
		}
	?>

<!-- Du lieu -->
	<?php
		if(isset($_POST['maDuLieu'])){
	?>

	<!-- Hoc van -->
		<?php
			if($_POST['sua'] == 'sua-hoc-van'){
				$maHocVan = dsThongTinBoSung($conn, "Select MaHocVan From hocvan Where MaHocVan='".$_POST['maDuLieu']."'", "MaHocVan");
				$tenHocVan = dsThongTinBoSung($conn, "Select TenHocVan From hocvan Where MaHocVan='".$_POST['maDuLieu']."'", "TenHocVan");
		?>

		<form>
			<h3>Sửa học vấn</h3>
			<h5>ID:</h5>
			<input class="input width-100" type="" name="" id="ma-hoc-van" value="<?php echo $maHocVan[0] ?>" disabled>
			<h5>Tên học vấn:</h5>
			<input class="input width-100" type="text" name="" id="sua-hoc-van-cu" value="<?php echo $tenHocVan[0] ?>" hidden>
			<input class="input width-100" type="text" name="" id="sua-hoc-van" value="<?php echo $tenHocVan[0] ?>">
			<h5 class="color-delete" id="message-sua-hoc-van"></h5>
			<br>
			<button class="button button-create" type="button" onclick="validateDuLieu1('ma-hoc-van', 'sua-hoc-van-cu', 'sua-hoc-van', 'message-sua-hoc-van', 'cua-so-sua-hoc-van', 'nen-cua-so-sua-hoc-van')">Lưu</button>
			<button class="button button-reset" type="reset">Đặt lại</button>
		</form>

		<?php } ?>

	<!-- Khu vuc -->
		<?php
			if($_POST['sua'] == 'sua-khu-vuc'){
				$maKhuVuc = dsThongTinBoSung($conn, "Select MaKhuVuc From khuvuc Where MaKhuVuc='".$_POST['maDuLieu']."'", "MaKhuVuc");
				$tenKhuVuc = dsThongTinBoSung($conn, "Select TenKhuVuc From khuvuc Where MaKhuVuc='".$_POST['maDuLieu']."'", "TenKhuVuc");
		?>

		<form>
			<h3>Sửa khu vực</h3>
			<h5>ID:</h5>
			<input class="input width-100" type="" name="" id="ma-khu-vuc" value="<?php echo $maKhuVuc[0] ?>" disabled>
			<h5>Tên khu vực:</h5>
			<input class="input width-100" type="text" name="" id="sua-khu-vuc-cu" value="<?php echo $tenKhuVuc[0] ?>" hidden>
			<input class="input width-100" type="text" name="" id="sua-khu-vuc" value="<?php echo $tenKhuVuc[0] ?>">
			<h5 class="color-delete" id="message-sua-khu-vuc"></h5>
			<br>
			<button class="button button-create" type="button" onclick="validateDuLieu1('ma-khu-vuc', 'sua-khu-vuc-cu', 'sua-khu-vuc', 'message-sua-khu-vuc', 'cua-so-sua-khu-vuc', 'nen-cua-so-sua-khu-vuc')">Lưu</button>
			<button class="button button-reset" type="reset">Đặt lại</button>
		</form>

		<?php }	?>

	<!-- Linh vuc -->
		<?php
			if($_POST['sua'] == 'sua-linh-vuc'){
				$maLinhVuc = dsThongTinBoSung($conn, "Select MaLinhVuc From linhvuc Where MaLinhVuc='".$_POST['maDuLieu']."'", "MaLinhVuc");
				$tenLinhVuc = dsThongTinBoSung($conn, "Select TenLinhVuc From linhvuc Where MaLinhVuc='".$_POST['maDuLieu']."'", "TenLinhVuc");
		?>

		<form>
			<h3>Sửa lĩnh vực</h3>
			<h5>ID:</h5>
			<input class="input width-100" type="" name="" id="ma-linh-vuc" value="<?php echo $maLinhVuc[0] ?>" disabled>
			<h5>Tên lĩnh vực:</h5>
			<input class="input width-100" type="text" name="" id="sua-linh-vuc-cu" value="<?php echo $tenLinhVuc[0] ?>" hidden>
			<input class="input width-100" type="text" name="" id="sua-linh-vuc" value="<?php echo $tenLinhVuc[0] ?>">
			<h5 class="color-delete" id="message-sua-linh-vuc"></h5>
			<br>
			<button class="button button-create" type="button" onclick="validateDuLieu1('ma-linh-vuc', 'sua-linh-vuc-cu', 'sua-linh-vuc', 'message-sua-linh-vuc', 'cua-so-sua-linh-vuc', 'nen-cua-so-sua-linh-vuc')">Lưu</button>
			<button class="button button-reset" type="reset">Đặt lại</button>
		</form>

		<?php } ?>

	<!-- Kinh nghiem -->
		<?php
			if($_POST['sua'] == 'sua-kinh-nghiem'){
				$maKinhNghiem = dsThongTinBoSung($conn, "Select MaKinhNghiem From kinhnghiem Where MaKinhNghiem='".$_POST['maDuLieu']."'", "MaKinhNghiem");
				$tenKinhNghiem = dsThongTinBoSung($conn, "Select TenKinhNghiem From kinhnghiem Where MaKinhNghiem='".$_POST['maDuLieu']."'", "TenKinhNghiem");
		?>

		<form>
			<h3>Sửa kinh nghiệm</h3>
			<h5>ID:</h5>
			<input class="input width-100" type="" name="" id="ma-kinh-nghiem" value="<?php echo $maKinhNghiem[0] ?>" disabled>
			<h5>Tên kinh nghiệm:</h5>
			<input class="input width-100" type="text" name="" id="sua-kinh-nghiem-cu" value="<?php echo $tenKinhNghiem[0] ?>" hidden>
			<input class="input width-100" type="text" name="" id="sua-kinh-nghiem" value="<?php echo $tenKinhNghiem[0] ?>">
			<h5 class="color-delete" id="message-sua-kinh-nghiem"></h5>
			<br>
			<button class="button button-create" type="button" onclick="validateDuLieu1('ma-kinh-nghiem', 'sua-kinh-nghiem-cu', 'sua-kinh-nghiem', 'message-sua-kinh-nghiem', 'cua-so-sua-kinh-nghiem', 'nen-cua-so-sua-kinh-nghiem')">Lưu</button>
			<button class="button button-reset" type="reset">Đặt lại</button>
		</form>

		<?php } ?>

	<!-- Lien ket -->
		<?php
			if($_POST['sua'] == 'sua-lien-ket'){
				$maLienKetInternet = dsThongTinBoSung($conn, "Select MaLienKetInternet From lienketinternet Where MaLienKetInternet='".$_POST['maDuLieu']."'", "MaLienKetInternet");
				$tenLienKetInternet = dsThongTinBoSung($conn, "Select TenLienKetInternet From lienketinternet Where MaLienKetInternet='".$_POST['maDuLieu']."'", "TenLienKetInternet");
				$bieuTuongLienKetInternet = dsThongTinBoSung($conn, "Select BieuTuongLienKetInternet From lienketinternet Where MaLienKetInternet='".$_POST['maDuLieu']."'", "BieuTuongLienKetInternet");
		?>

		<form>
			<h3>Sửa liên kết Internet</h3>
			<h5>ID:</h5>
			<input class="input width-100" type="text" name="" id="ma-lien-ket-internet" value="<?php echo $maLienKetInternet[0] ?>" disabled>
			<h5>Tên liên kết Internet:</h5>
			<input class="input width-100" type="text" name="" id="sua-ten-lien-ket-internet-cu" value="<?php echo $tenLienKetInternet[0] ?>" hidden>
			<input class="input width-100" type="text" name="" id="sua-ten-lien-ket-internet" value="<?php echo $tenLienKetInternet[0] ?>">
			<h5 class="color-delete" id="message-sua-ten-lien-ket-internet"></h5>
			<h5>Biểu tượng liên kết Internet:</h5>
			<input class="input width-100" type="text" name="" id="sua-bieu-tuong-lien-ket-internet" value="<?php echo $bieuTuongLienKetInternet[0] ?> ">
			<h5 class="color-delete" id="message-sua-bieu-tuong-lien-ket-internet"></h5>
			<br>
			<button class="button button-create" type="button" onclick="validateDuLieu2('ma-lien-ket-internet', 'sua-ten-lien-ket-internet-cu', 'sua-ten-lien-ket-internet', 'sua-bieu-tuong-lien-ket-internet', 'message-sua-ten-lien-ket-internet', 'message-sua-bieu-tuong-lien-ket-internet', 'cua-so-sua-lien-ket-internet', 'nen-cua-so-sua-lien-ket-internet')">Lưu</button>
			<button class="button button-reset" type="reset">Đặt lại</button>
		</form>

		<?php } ?>

	<?php } ?>