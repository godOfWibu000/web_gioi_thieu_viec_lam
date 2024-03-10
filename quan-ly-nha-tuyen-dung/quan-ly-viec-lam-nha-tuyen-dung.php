<?php
	$title = 'Quản lý tuyển dụng';
	require "../inc/quan-ly-nha-tuyen-dung/header-quan-ly-nha-tuyen-dung.php";
	require "../inc/muc-thong-tin-bo-sung.php";
?>

		<?php
			if(isset($_SESSION['maNhaTuyenDung'])){
		?>
		<div class="quan-ly-viec-lam">
		<!-- Phan dau -->
			<div class="flex-between">
				<h3>Việc làm</h3>
				<form class="flex-between" style="width: fit-content;" method="get" action="../quan-ly-nha-tuyen-dung/quan-ly-viec-lam-nha-tuyen-dung.php">
					<input class="input" type="text" name="tu-khoa">
					&nbsp;&nbsp;
					<button class="button button-create"><span class="material-symbols-outlined icon1">search</span></button>
				</form>
				<h5 class="color-create cursor-pointer" onclick="moCuaSo('cua-so-them-viec-lam', 'nen-cua-so-them-viec-lam');document.getElementById('them-han-ung-tuyen-viec-lam').value 
					= document.getElementById('them-thoi-gian-ung-tuyen-viec-lam').value = getNgayThang();">
					<span class="material-symbols-outlined icon1" style="font-size: 30px;">new_window</span>
					Thêm
				</h5>
			</div>

		<!-- DS viec lam -->
			<div class="viec-lam-nha-tuyen-dung border-radius box-shadow padding">
			<!-- Tu khoa tim kiem -->
				<?php
					if(isset($_GET['tu-khoa'])){
				?>

				<h3>Kết quả tìm kiếm cho '<span id="tu-khoa-tim-kiem-viec-lam"><?php echo $_GET['tu-khoa'] ?></span>' <span><a class="a" href="../quan-ly-nha-tuyen-dung/quan-ly-viec-lam-nha-tuyen-dung.php">Quay lại</a></span></h3>

				<?php } ?>

			<!-- Loc viec lam -->
				<div class="loc flex-between padding">
					<div id="loc-viec-lam-theo-trang-thai">
						<input type="radio" id="" name="loc-viec-lam" value="Trạng thái mở" checked onclick="locViecLam()">
						<label for=""><h5>Đang mở</h5></label>

						<input type="radio" id="" name="loc-viec-lam" value="Trạng thái đóng" onclick="locViecLam()">
						<label for=""><h5>Đã đóng</h5></label>
					</div>

					<div>
						<label><h5>Sắp xếp theo</h5></label>
						<select class="select" id="loc-viec-lam-theo-thoi-gian" onchange="locViecLam()">
							<option value="Mới hơn">Mới hơn</option>
							<option value="Cũ hơn">Cũ hơn</option>
						</select>
					</div>
				</div>

			<!-- DS viec lam -->
				<div class="ds-viec-lam" id="ds-viec-lam">
					<table class="table">
						<tr>
							<th><h5><b>Id</b></h5></th>
							<th><h5><b>Tên việc làm</b><b></h5></th>
							<th><h5><b>Thời gian đăng</b></h5></th>
							<th></th>
						</tr>
					<?php
						$sqlViecLamNhaTuyenDung = "Select * From vieclam inner join khuvuc on vieclam.MaKhuVuc=khuvuc.MaKhuVuc inner join kinhnghiem on vieclam.MaKinhNghiem=kinhnghiem.MaKinhNghiem inner join linhvuc on vieclam.MaLinhVuc=linhvuc.MaLinhVuc inner join hocvan on vieclam.MaHocVan=hocvan.MaHocVan Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and TrangThaiViecLam=1";
						if(isset($_GET['tu-khoa'])){
							$sqlViecLamNhaTuyenDung .= " and TenViecLam Like '%".$_GET['tu-khoa']."%'"; 
						}
						$sqlViecLamNhaTuyenDung .= " Order By ThoiGianUngTuyen DESC";
						if(!isset($_GET['trang']))
							$sqlViecLamNhaTuyenDung .= ' Limit 0,3';
						else{
							if($_GET['trang'] == 1)
								$sqlViecLamNhaTuyenDung .= ' Limit 0,3';
							else
								$sqlViecLamNhaTuyenDung .= ' Limit ' . (($_GET['trang']-1)*3) . ',3';
						}
						$dsViecLamNhaTuyenDung = mysqli_query($conn, $sqlViecLamNhaTuyenDung);
						if($dsViecLamNhaTuyenDung->num_rows>0){
							while($row = $dsViecLamNhaTuyenDung->fetch_assoc()){
					?>
						<tr>
							<td><h5><?php echo $row['MaViecLam'] ?></h5></td>
							<td><h5><?php echo $row['TenViecLam'] ?></h5></h5></td>
							<td><h5><?php echo $row['ThoiGianDangViecLam'] ?></h5></td>
							<td><a href="chi-tiet-viec-lam-nha-tuyen-dung.php?id=<?php echo $row['MaViecLam'] ?>"><button class="button button-create">Xem chi tiết</button></a></td>
						</tr>

					<?php
							}
						}
					?>
					</table>
				</div>

			<!-- Phan trang -->
				<?php 
					$sqlDemViecLam = "Select * From vieclam Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and TrangThaiViecLam=1";
					if(isset($_GET['tu-khoa'])){
						$sqlDemViecLam .= " and TenViecLam Like '%".$_GET['tu-khoa']."%'"; 
					}
					$demViecLam = mysqli_query($conn, $sqlDemViecLam );
					$soViecLam = mysqli_num_rows($demViecLam);
					$soTrang = $soViecLam / 3 + 1;
				?>

				<div class="phan-trang text-center">
				<!-- DS trang -->
					<?php
						for ($i=1; $i <= $soTrang; $i++) {
					?>
					<a class="a" href="quan-ly-viec-lam-nha-tuyen-dung.php?trang=<?php echo $i ?>">
						<button class="button color-button button-main"><?php echo $i ?></button>
					</a>
					<?php
						}
					?>
			</div>

		<!-- Them viec lam -->
			<div class="cua-so cua-so-lon padding" id="cua-so-them-viec-lam">
				<h3 class="text-center">Thêm việc làm</h3>
				<form>
					<h5>Tên việc làm:</h5>
					<input class="input width-100" id="them-ten-viec-lam" type="text" name="">
					<h5 class="color-delete" id="message-them-ten-viec-lam"></h5>

					<h5>Lĩnh vực:</h5>
					<select class="select width-100" id="lua-chon-them-linh-vuc-viec-lam">
						<option selected disabled>Lựa chọn</option>
						<?php
							if($dsMaLinhVuc != null){
								for ($i=0; $i < count($dsMaLinhVuc); $i++) { 
						?>

						<option value="<?php echo $dsMaLinhVuc[$i] ?>"><?php echo $dsTenLinhVuc[$i] ?></option>

						<?php
								}
							}
						?>
					</select>
					<h5 class="color-delete" id="message-lua-chon-them-linh-vuc-viec-lam"></h5>

					<h5>Khu vực:</h5>
					<select class="select width-100" id="lua-chon-them-khu-vuc-viec-lam">
						<option selected disabled>Lựa chọn</option>
						<?php
							if($dsMaKhuVuc != null){
								for ($i=0; $i < count($dsMaKhuVuc); $i++) { 
						?>

						<option value="<?php echo $dsMaKhuVuc[$i] ?>"><?php echo $dsTenKhuVuc[$i] ?></option>

						<?php
								}
							}
						?>
					</select>
					<h5 class="color-delete" id="message-lua-chon-them-khu-vuc-viec-lam"></h5>

					<h5>Học vấn:</h5>
					<select class="select width-100" id="lua-chon-them-hoc-van-viec-lam">
						<option selected disabled>Lựa chọn</option>
						<?php
							if($dsMaHocVan != null){
								for ($i=0; $i < count($dsMaHocVan); $i++) { 
						?>

						<option value="<?php echo $dsMaHocVan[$i] ?>"><?php echo $dsTenHocVan[$i] ?></option>

						<?php
								}
							}
						?>
					</select>
					<h5 class="color-delete" id="message-lua-chon-them-hoc-van-viec-lam"></h5>

					<h5>Kinh nghiệm:</h5>
					<select class="select width-100" id="lua-chon-them-kinh-nghiem-viec-lam">
						<option selected disabled>Lựa chọn</option>
						<?php
							if($dsMaKinhNghiem != null){
								for ($i=0; $i < count($dsMaKinhNghiem); $i++) {
						?>

						<option value="<?php echo $dsMaKinhNghiem[$i] ?>"><?php echo $dsTenKinhNghiem[$i] ?></option>

						<?php
								}
							}
						?>
					</select>
					<h5 class="color-delete" id="message-lua-chon-them-kinh-nghiem-viec-lam"></h5>

					<h5>Mức lương(USD):</h5>
					<input class="input width-100" id="them-muc-luong-viec-lam" class="" type="number" name="" min="0" max="100000">
					<h5 class="color-delete" id="message-them-muc-luong-viec-lam"></h5>

					<h5>Mô tả(Tối đa 1000 ký tự):</h5>
					<textarea class="textarea width-100" id="them-mo-ta-viec-lam"></textarea>
					<h5 class="color-delete" id="message-them-mo-ta-viec-lam"></h5>

					<h5>Thời gian bắt đầu ứng tuyển:</h5>
					<input class="input width-100" type="date" name="" id="them-thoi-gian-ung-tuyen-viec-lam">
					<h5 class="color-delete" id="message-them-thoi-gian-ung-tuyen-viec-lam"></h5>

					<h5>Hạn ứng tuyển:</h5>
					<input class="input width-100" type="date" name="" id="them-han-ung-tuyen-viec-lam">
					<h5 class="color-delete" id="message-them-han-ung-tuyen-viec-lam"></h5>

					<h5>Số lượng tuyển dụng:</h5>
					<input class="input width-100" type="number" name="" id="them-so-luong-ung-tuyen-viec-lam" min="1" max="1000">
					<h5 class="color-delete" id="message-them-so-luong-ung-tuyen-viec-lam"></h5>


					<button class="button button-create" type="button" onclick="validateViecLam('Thêm')">Lưu lại</button>
					<button class="button button-reset" type="reset">Đặt lại</button>
				</form>
			</div>

			<div class="nen-cua-so" id="nen-cua-so-them-viec-lam" onclick="dongCuaSo('cua-so-them-viec-lam', 'nen-cua-so-them-viec-lam')">
					
			</div>
		</div>
		<?php
			}
		?>

		</div>
	</div>
</body>
</html>