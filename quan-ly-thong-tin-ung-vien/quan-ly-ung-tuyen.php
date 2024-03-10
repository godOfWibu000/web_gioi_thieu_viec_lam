<?php
	$title = "Quản lý thông tin ứng viên - Ứng tuyển việc làm";
	require "../inc/head2.php";
?>

<link rel="stylesheet" type="text/css" href="../css/ds-viec-lam.css">
<link rel="stylesheet" type="text/css" href="../css/quan-ly-tai-khoan.css">

<?php
	require "../inc/header2.php";
	require "../inc/quan-ly-ung-vien/header.php";
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
<!-- DS ung tuyen -->
	<div class="border-radius box-shadow padding margin">
	<?php
		$sql = "Select * From ungtuyenvieclam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam Where ungtuyenvieclam.MaUngVien='".$_SESSION['maUngVien']."'";
		$result = mysqli_query($conn, $sql);

	?>
		<div>
			<table class="table">
				<tr>
			      <th>Tên việc làm</th>
			      <th>Chú thích</th>
			      <th>CV</th>
			      <th>Trạng thái</th>
			      <th></th>
			      <th></th>
			    </tr>

	<?php
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
	?>

				<tr>
					<td style="width: 22%;"><h5><?php echo $row['TenViecLam'] ?></h5></td>
					<td style="width: 22%;"><h5><?php echo $row['ChuThichUngTuyenViecLam'] ?></h5></td>
					<td style="width: 22%;">
						<h5>
							<span class="material-symbols-outlined icon1">folder_open</span>

							<?php if($row['TenFileCV'] != ''){ ?>
								<div id="cv">
									<?php echo $row['TenFileCV'] ?>
									<a class="a" href="../cv/<?php echo $row['TenFileCV'] ?>" target="_blank">Xem</a>
									<a href="../ajax_action/download.php?fileName=<?php echo $row['TenFileCV'] ?>"><span style="font-size: 35px;" class="material-symbols-outlined icon1 color-create">download</span></a>
									<button type="button" class="button button-delete" onclick="xoaCV('<?php echo $row['TenFileCV'] ?>', '<?php echo $row['MaViecLam'] ?>')">Xóa</span>
								</div>
							<?php } ?>
						</h5>
					</td>
					<td style="width: 22%;"><h5 class="chi-muc <?php if($row['TrangThaiUngTuyen'] == 'Chờ xét duyệt') echo 'background-border2'; else if($row['TrangThaiUngTuyen'] == 'Đã chấp nhận') echo 'button-create color-button'; else if($row['TrangThaiUngTuyen'] == 'Đã từ chối') echo 'button-delete  color-button'; else echo 'background-success  color-button' ?>"><?php echo $row['TrangThaiUngTuyen'] ?></h5></td>
					<td><button class="button button-create" onclick="moCuaSo('cua-so-sua-ung-tuyen-viec-lam', 'nen-cua-so-sua-ung-tuyen-viec-lam');loadSuaHoSoUngTuyen('<?php echo $row['MaUngVien'] ?>', '<?php echo $row['MaViecLam'] ?>');">Sửa</button></td>
					<td><button class="button button-delete" onclick="xoaUngTuyen('<?php echo $row['MaViecLam'] ?>')">Xóa</button></td>
				</tr>

	<?php
			}
		}
	?>

			</table>
		</div>
	</div>

<!-- Sua ung tuyen -->
	<div class="cua-so cua-so-nho padding" id="cua-so-sua-ung-tuyen-viec-lam">
		
	</div>
	<div class="nen-cua-so" id="nen-cua-so-sua-ung-tuyen-viec-lam" onclick="dongCuaSo('cua-so-sua-ung-tuyen-viec-lam', 'nen-cua-so-sua-ung-tuyen-viec-lam')">
		
	</div>
	<?php } ?>

</div>

<script type="text/javascript">
	function layTenFIleCV(){
		let tenFile = document.getElementById('ten-file-cv');

		const { files } = event.target;
		console.log("files", files);
		tenFile.value = files[0].name;
	}
</script>

<script src="../js/quan-ly-tai-khoan.js"></script>

<!-- Footer -->
<?php require "../inc/footer2.php" ?>