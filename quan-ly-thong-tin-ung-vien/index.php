<!-- Header -->
<?php
	$title = "Quản lý tài thông tin ứng viên";
	require "../inc/head2.php";
?>

<link rel="stylesheet" type="text/css" href="../css/ds-viec-lam.css">
<link rel="stylesheet" type="text/css" href="../css/quan-ly-tai-khoan.css">

<?php
	require "../inc/header2.php";
	require "../inc/quan-ly-ung-vien/header.php";
	
	if(isset($_SESSION['maUngVien'])){
		$sql = "Select * From ungvien Where Email='".$_SESSION['emailDangNhap']."'";
		$ungVien = mysqli_query($conn, $sql);

		if($ungVien->num_rows > 0){
			while($row = $ungVien->fetch_assoc()){
				$tenUngVien = $row['TenUngVien'];
				$ngaySinh = $row['NgaySinhUngVien'];;
				$sdt = $row['SDTUngVien'];
				$diaChi = $row['DiaChiUngVien'];
				$moTa = $row['MoTaUngVien'];
				$maKinhNghiem = $row['MaKinhNghiem'];
				$maHocVan = $row['MaHocVan'];
			}
		}
	}else{

	}
?>

<?php
	if(isset($_SESSION['maUngVien'])){
		// Truy van Sql
		// Sql hoc van
			$sqlHocVanUngVien = "Select * From hocvanungvien inner join hocvan on hocvanungvien.MaHocVan=hocvan.MaHocVan inner join chuyennganh on hocvanungvien.MaChuyenNganh=chuyennganh.MaChuyenNganh Where MaUngVien='".$_SESSION['maUngVien']."'";

		//Query
		// Hoc van
			$dsChiTietHocVan = mysqli_query($conn, "Select * From hocvanungvien inner join chuyennganh on hocvanungvien.MaChuyenNganh=chuyennganh.MaChuyenNganh Where MaUngVien='".$_SESSION['maUngVien']."'");

		//Linh vuc
			$dsLinhVucUngVien = mysqli_query($conn, "Select * From linhvucungvien inner join linhvuc on linhvucungvien.MaLinhVuc=linhvuc.MaLinhVuc Where MaUngVien='".$_SESSION['maUngVien']."'");

		// Kinh nghiem
			$dsChiTietKinhNghiem = mysqli_query($conn, "Select * From kinhnghiemungvien Where MaUngVien='".$_SESSION['maUngVien']."'");

		// Lien ket internet
			$dsLienKetInternetUngVien = mysqli_query($conn, "Select * From lienketinternetungvien inner join lienketinternet on lienketinternetungvien.MaLienKetInternet=lienketinternet.MaLienKetInternet Where MaUngVien='".$_SESSION['maUngVien']."'");

		// Lien ket internet ung vien
		 	$dsTenLienKetInternetUngVien = $dsDuongDanLienKetInternetUngVien = $dsBieuTuongLienKetInternetUngVien = null;
			if($dsLienKetInternetUngVien->num_rows>0){
				$i = 0;
				while($row = $dsLienKetInternetUngVien->fetch_assoc()){
					$dsMaLienKetInternetUngVien[$i] = $row['MaLienKetInternet'];
					$dsTenLienKetInternetUngVien[$i] = $row['TenLienKetInternet'];
					$dsDuongDanLienKetInternetUngVien[$i] = $row['DuongDanLienKet'];
					$dsBieuTuongLienKetInternetUngVien[$i] = $row['BieuTuongLienKetInternet'];
					$i++;
				}
			}
	}
?>

<div class="content padding">
	<?php if(!isset($_SESSION['maUngVien']) && isset($_SESSION['emailDangNhap'])){
		$dsHocVan = mysqli_query($conn, "Select * From hocvan");
		$dsKinhNghiem = mysqli_query($conn, "Select * From kinhnghiem");
	?>

	<div class="chinh-sua-thong-tin-ung-vien bo-sung-thong-tin-ung-vien" id="sua-thong-tin-ung-vien">
	<!-- Thong tin co ban -->
		<div class="bo-sung-thong-tin-co-ban">
			<h3>Bổ sung thông tin của bạn</h3>
			<form>
				<label><h5>Họ tên:</h5></label>
				<input class="input" type="text" placeholder="Nguyễn Văn A" name="" id="them-ho-ten">
				<h5 class="error color-delete" id="message-them-ho-ten"></h5>

				<label><h5>Ngày sinh:</h5></label>
				<input class="input" type="date" value="2005-01-01" name="" id="them-ngay-sinh">
				<h5 class="error color-delete" id="message-them-ngay-sinh"></h5>

				<label><h5>Số điện thoại:</h5></label>
				<input class="input" type="tel" name="" id="them-so-dien-thoai" placeholder="0123456789">
				<h5 class="error color-delete" id="message-them-so-dien-thoai"></h5>

				<label><h5>Địa chỉ:</h5></label>
				<input class="input" type="text" placeholder="số xxx - Đường A - Quận B - TP. C" name="" id="them-dia-chi">
				<h5 class="error color-delete" id="message-them-dia-chi"></h5>

				<label><h5>Mô tả:</h5></label>
				<textarea class="textarea" name="" id="them-mo-ta"></textarea>
				<h5 class="error color-delete" id="message-them-mo-ta"></h5>

				<br><br>

				<div class="lua-chon">
					<button type="button" class="button button-create" onclick="validateUngVien('Thêm')">
						Lưu
					</button>
					<button type="reset" class="button button-delete">
						Đặt lại
					</button>
				</div>
			</form>
		</div>

	<!-- Thong tin bo sung -->
		<div class="bo-sung-thong-tin-chi-tiet">
			<h3>Thêm thông tin chi tiết</h3>

			<div class="noi-dung" id="noi-dung-bo-sung-thong-tin-chi-tiet">
				<div class="hoc-van">
					<h4>Học vấn:</h4>
					<select class="select width-100" id="lua-chon-them-moi-hoc-van">
						<option disabled selected>Lựa chọn</option>
						<?php
							if($dsHocVan->num_rows>0){
								while($row = $dsHocVan->fetch_assoc()){
									echo '
						<option value="'.$row['MaHocVan'].'">'.$row['TenHocVan'].'</option>
									';
								}
							}
						?>
					</select>
				</div>

				<div class="kinh-nghiem">
					<h4>Kinh nghiệm:</h4>
					<select class="select width-100" id="lua-chon-them-moi-kinh-nghiem">
						<option disabled selected>Lựa chọn</option>
						<?php
							if($dsKinhNghiem->num_rows>0){
								while($row = $dsKinhNghiem->fetch_assoc()){
									if($row['TenKinhNghiem'] == 'Không yêu cầu')
										echo '';
									else
										echo '
						<option value="'.$row['MaKinhNghiem'].'">'.$row['TenKinhNghiem'].'</option>
										';
								}
							}
						?>
					</select>
				</div>

				<hr>
			</div>
		</div>
	</div>

	<?php } ?>
	
	<?php if(isset($_SESSION['maUngVien'])){ ?>
<!-- Thong tin ung vien -->
	<div class="thong-tin-ung-vien">
	<!-- Thong tin co ban -->
		<div class="thong-tin-co-ban margin box-shadow">
			<div class="taskbar">
				<div class="items">
					<div class="item"></div>
					<div class="item"></div>
					<div class="item"></div>
				</div>
				<div class="items">
					<div class="item"></div>
					<div class="item"></div>
					<div class="item"></div>
				</div>
			</div>

			<div class="noi-dung padding">
				<div class="phan-dau flex-between">
					<div class="anh-va-ten flex">
						<div class="anh-dai-dien">
							<h1 class="avatar" id="avatar">
								<?php echo  strtoupper($_SESSION['emailDangNhap'][0]) ?>
							</h1>
						</div>
						<div style="margin-top: 20px;">
							<h3><?php echo $tenUngVien ?></h3>
						</div>
					</div>

					<span class="material-symbols-outlined mo-cua-so-sua-thong-tin-co-ban icon-button color-create" style="font-size: 35px;" onclick="moCuaSo('cua-so-sua-thong-tin-ung-vien', 'nen-cua-so-sua-thong-tin-ung-vien')">
						edit_square
					</span>
				</div>

				<div class="phan-than">
					<div class="ngay-sinh">
						<span class="material-symbols-outlined icon1">
													cake
						</span> <?php echo $ngaySinh ?>
					</div>

					<div class="so-dien-thoai">
						<span class="material-symbols-outlined icon1">
													call
						</span> <?php echo $sdt ?>
					</div>

					<div class="email">
						<span class="material-symbols-outlined icon1">
													mail
						</span> <?php echo $_SESSION['emailDangNhap'] ?>
					</div>

					<div class="dia-chi">
						<span class="material-symbols-outlined icon1">
													location_on
						</span> <?php echo $diaChi ?>
					</div>

					<h5 class="mo-ta margin text-center">
						<?php echo $moTa ?>
					</h5>

					<div class="ds-lien-ket-internet text-center">
						<?php
							if($dsTenLienKetInternetUngVien != null) {
								for($i=0; $i<count($dsTenLienKetInternetUngVien); $i++){
									echo '
						<a class="a" href="'.$dsDuongDanLienKetInternetUngVien[$i].'" target="_blank">
							<span class="lien-ket-internet">'.$dsBieuTuongLienKetInternet[$i].'</span>
						</a>
									';

								}
							}
						?>
					</div>
				</div>
			</div>
		</div>

	<!-- Sua thong tin co ban -->
		<div class="chinh-sua-thong-tin-ung-vien sua-thong-tin-ung-vien cua-so cua-so-lon" id="cua-so-sua-thong-tin-ung-vien">
			<div class="phan-dau">
				<h3>Cập nhật thông tin của bạn</h3>
				<span class="material-symbols-outlined dong" onclick="dongCuaSo('sua-thong-tin-ung-vien', 'nen-cua-so-sua-thong-tin-ung-vien')">close</span>
			</div>
			<form>
				<label><h5>Họ tên:</h5></label>
				<input class="input" type="text" placeholder="Nguyễn Văn A" name="" id="them-ho-ten" value="<?php echo $tenUngVien ?>">
				<h5 class="error color-delete" id="message-them-ho-ten"></h5>

				<label><h5>Ngày sinh:</h5></label>
				<input class="input" type="date" value="<?php echo $ngaySinh ?>" name="" id="them-ngay-sinh">
				<h5 class="error color-delete" id="message-them-ngay-sinh"></h5>

				<label><h5>Số điện thoại:</h5></label>
				<input class="input" type="tel" name="" id="them-so-dien-thoai" placeholder="0123456789" value="<?php echo $sdt ?>">
				<h5 class="error color-delete" id="message-them-so-dien-thoai"></h5>

				<label><h5>Địa chỉ:</h5></label>
				<input class="input" type="text" placeholder="số xxx - Đường A - Quận B - TP. C" name="" id="them-dia-chi" value="<?php echo $diaChi ?>">
				<h5 class="error color-delete" id="message-them-dia-chi"></h5>

				<label><h5>Mô tả:</h5></label>
				<textarea class="textarea" name="" id="them-mo-ta"><?php echo $moTa ?></textarea>
				<h5 class="error color-delete" id="message-them-mo-ta"></h5>

				<br><br>

				<div class="lua-chon">
					<button type="button" class="button button-create" onclick="validateUngVien('Sửa')">
						Lưu
					</button>
					<button type="reset" class="button button-reset">
						Đặt lại
					</button>
				</div>
			</form>
		</div>

		<div class="nen-cua-so nen-cua-so-sua-thong-tin-ung-vien" id="nen-cua-so-sua-thong-tin-ung-vien" onclick="dongCuaSo('cua-so-sua-thong-tin-ung-vien', 'nen-cua-so-sua-thong-tin-ung-vien')">
			
		</div>

	<!-- Thong tin bo sung -->
		<div class="thong-tin-bo-sung margin box-shadow">
			<div class="taskbar">
				<div class="items">
					<div class="item"></div>
					<div class="item"></div>
					<div class="item"></div>
				</div>
			</div>

			<div class="noi-dung">
				<?php require "../inc/quan-ly-ung-vien/quan-ly-thong-tin-bo-sung.php" ?>
			</div>
		</div>
	</div>
	<?php } ?>
</div>

<script src="../js/quan-ly-tai-khoan.js"></script>

<!-- Footer -->
<?php require "../inc/footer2.php" ?>