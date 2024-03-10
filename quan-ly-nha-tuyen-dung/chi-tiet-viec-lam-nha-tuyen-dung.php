<?php
	$title = 'Quản lý tuyển dụng';
	require "../inc/quan-ly-nha-tuyen-dung/header-quan-ly-nha-tuyen-dung.php";
	require "../inc/muc-thong-tin-bo-sung.php";
?>
<?php
	if(!isset($_GET['id'])){
?>

<script type="text/javascript">
	window.location = 'quan-ly-viec-lam-nha-tuyen-dung.php';
</script>

<?php
	}
?>

<?php
	if(isset($_GET['id']))
		$sqlViecLam = "Select * From vieclam inner join khuvuc on vieclam.MaKhuVuc=khuvuc.MaKhuVuc inner join kinhnghiem on vieclam.MaKinhNghiem=kinhnghiem.MaKinhNghiem inner join linhvuc on vieclam.MaLinhVuc=linhvuc.MaLinhVuc inner join hocvan on vieclam.MaHocVan=hocvan.MaHocVan Where MaViecLam='".$_GET['id']."'";
		$viecLam = mysqli_query($conn, $sqlViecLam);
		if($viecLam->num_rows>0){
			while($row = $viecLam->fetch_assoc()){
				$maViecLam = $row['MaViecLam'];
				$tenViecLam = $row['TenViecLam'];
				$maKhuVuc = $row['MaKhuVuc'];
				$tenKhuVuc = $row['TenKhuVuc'];
				$tienLuong = $row['TienLuong'];
				$maLinhVuc = $row['MaLinhVuc'];
				$tenLinhVuc = $row['TenLinhVuc'];
				$maHocVan = $row['MaHocVan'];
				$tenHocVan = $row['TenHocVan'];
				$maKinhNghiem = $row['MaKinhNghiem'];
				$tenKinhNghiem = $row['TenKinhNghiem'];
				$thoiGianDang = $row['ThoiGianDangViecLam'];
				$soNguoiQuanTam = $row['SoNguoiQuanTam'];
				$thoiGianUngTuyen = $row['ThoiGianUngTuyen'];
				$hanUngTuyen = $row['HanUngTuyen'];
				$soLuongTuyenDung = $row['SoLuongTuyenDung'];
				$soLuongUngTuyen = $row['SoLuongUngTuyen'];
				$moTa = $row['MoTaViecLam'];
				$trangThai = $row['TrangThaiViecLam'];
				$soSao = $row['SoSao'];
			}
	}
?>

<?php
	if(isset($_SESSION['maNhaTuyenDung'])){
?>
<!-- Thong tin viec lam -->
	<h3>Thông tin việc làm</h3>
	<div class="border-radius box-shadow padding">
		<div class="flex-between">
			<h4 id="ma-viec-lam" hidden><?php echo $maViecLam ?></h4>
			<h4><?php echo $tenViecLam ?></h4>
			<span style="font-size: 30px;" class="material-symbols-outlined color-create cursor-pointer" onclick="moCuaSo('cua-so-sua-viec-lam', 'nen-cua-so-sua-viec-lam')">edit_square</span>
		</div>

		<div class="flex">
			<h5>
				<?php echo $soSao ?>
				<i class="fas fa-star color-reset"></i>
			</h5>
		</div>

		<div class="flex">
			<h6 style="line-height: 35px;">
				<span class="material-symbols-outlined icon1">schedule</span>
				<?php echo $thoiGianDang ?>
			</h6>
			&nbsp;&nbsp;&nbsp;
			<h6><span class="material-symbols-outlined icon1">record_voice_over</span> <?php echo $soNguoiQuanTam ?> người quan tâm</h6>
		</div>

		<div>
			<h5>
				<span>
					<span class="material-symbols-outlined icon1">location_on</span> <?php echo $tenKhuVuc ?>
				</span>
			</h5>

			<h5>
				<span>
					<span class="material-symbols-outlined icon1">attach_money</span> <?php echo $tienLuong ?> USD
				</span>
			</h5>

			<h5>
				<span>
					<span class="material-symbols-outlined icon1">integration_instructions</span> <?php echo $tenLinhVuc ?>
				</span>
			</h5>

			<h5>
				<span>
					<span class="material-symbols-outlined icon1">school</span> <?php echo $tenHocVan ?>
				</span>
			</h5>

			<h5>
				<span>
					<span class="material-symbols-outlined icon1">work</span> <?php echo $tenKinhNghiem ?>
				</span>
			</h5>

			<h5>
				Mô tả: <?php echo $moTa ?>
			</h5>
		</div>

		<div>
			<h5><b>Thời gian bắt đầu ứng tuyển:</b> <?php echo $thoiGianUngTuyen ?></h5>
			<h5><b>Hạn ứng tuyển:</b> <?php echo $hanUngTuyen ?></h5>
		</div>

		<div class="flex">
			<h5><b>Số lượng tuyển dụng:</b> <?php echo $soLuongTuyenDung ?></h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<h5><b>Số lượng ứng tuyển:</b> <?php echo $soLuongUngTuyen ?></h5>
		</div>

		<?php
			if($trangThai == 1)
				echo '<h5>Trạng thái: Mở</h5>';
			else
				echo '<h5>Trạng thái: Đóng</h5>'
		?>

		<button class="button button-delete" onclick="xoaViecLam()">Xóa</button>
	</div>

<!-- Sua viec lam -->
	<div class="cua-so cua-so-lon padding" id="cua-so-sua-viec-lam">
		<h3 class="text-center">Cập nhật thông tin việc làm</h3>

		<form>
			<h5></h5>
			<h5>Tên việc làm:</h5>
			<input class="input width-100" id="them-ten-viec-lam" type="text" name="" value="<?php echo $tenViecLam ?>">
			<h5 class="color-delete" id="message-them-ten-viec-lam"></h5>

			<h5>Lĩnh vực:</h5>
			<select class="select width-100" id="lua-chon-them-linh-vuc-viec-lam">
				<?php
					if($dsMaLinhVuc != null){
						for ($i=0; $i < count($dsMaLinhVuc); $i++) { 
							if($dsMaLinhVuc[$i] == $maLinhVuc){
				?>

				<option value="<?php echo $dsMaLinhVuc[$i] ?>" selected><?php echo $dsTenLinhVuc[$i] ?></option>

				<?php
							}else{
				?>

				<option value="<?php echo $dsMaLinhVuc[$i] ?>"><?php echo $dsTenLinhVuc[$i] ?></option>

				<?php
							}
						}
					}
				?>
			</select>
			<h5 class="color-delete" id="message-lua-chon-them-linh-vuc-viec-lam"></h5>

			<h5>Khu vực:</h5>
			<select class="select width-100" id="lua-chon-them-khu-vuc-viec-lam">
				<?php
					if($dsMaKhuVuc != null){
						for ($i=0; $i < count($dsMaKhuVuc); $i++) { 
							if($dsMaKhuVuc[$i] == $maKhuVuc){
				?>

				<option value="<?php echo $dsMaKhuVuc[$i] ?>" selected><?php echo $dsTenKhuVuc[$i] ?></option>

				<?php
							}else{
				?>

				<option value="<?php echo $dsMaKhuVuc[$i] ?>"><?php echo $dsTenKhuVuc[$i] ?></option>

				<?php
							}
						}
					}
				?>
			</select>
			<h5 class="color-delete" id="message-lua-chon-them-khu-vuc-viec-lam"></h5>

			<h5>Học vấn:</h5>
			<select class="select width-100" id="lua-chon-them-hoc-van-viec-lam">
				<?php
					if($dsMaHocVan != null){
						for ($i=0; $i < count($dsMaHocVan); $i++) { 
							if($dsMaHocVan[$i] == $maHocVan){
				?>

				<option value="<?php echo $dsMaHocVan[$i] ?>" selected><?php echo $dsTenHocVan[$i] ?></option>

				<?php
							}else{
				?>

				<option value="<?php echo $dsMaHocVan[$i] ?>"><?php echo $dsTenHocVan[$i] ?></option>

				<?php
							}
						}
					}
				?>
			</select>
			<h5 class="color-delete" id="message-lua-chon-them-hoc-van-viec-lam"></h5>

			<h5>Kinh nghiệm:</h5>
			<select class="select width-100" id="lua-chon-them-kinh-nghiem-viec-lam">
				<?php
					if($dsMaKinhNghiem != null){
						for ($i=0; $i < count($dsMaKinhNghiem); $i++) { 
							if($dsMaKinhNghiem[$i] == $maKinhNghiem){
				?>

				<option value="<?php echo $dsMaKinhNghiem[$i] ?>" selected><?php echo $dsTenKinhNghiem[$i] ?></option>

				<?php
							}else{
				?>

				<option value="<?php echo $dsMaKinhNghiem[$i] ?>"><?php echo $dsTenKinhNghiem[$i] ?></option>

				<?php
							}
						}
					}
				?>
			</select>
			<h5 class="color-delete" id="message-lua-chon-them-kinh-nghiem-viec-lam"></h5>

			<h5>Mức lương(USD):</h5>
			<input class="input width-100" id="them-muc-luong-viec-lam" class="" type="number" name="" min="0" max="100000" value="<?php echo $tienLuong ?>">
			<h5 class="color-delete" id="message-them-muc-luong-viec-lam"></h5>

			<h5>Mô tả(Tối đa 1000 ký tự):</h5>
			<textarea class="textarea width-100" id="them-mo-ta-viec-lam"><?php echo $moTa ?></textarea>
			<h5 class="color-delete" id="message-them-mo-ta-viec-lam"></h5>

			<h5>Thời gian bắt đầu ứng tuyển:</h5>
			<input class="input width-100" type="date" name="" id="them-thoi-gian-ung-tuyen-viec-lam" value="<?php echo $thoiGianUngTuyen ?>">
			<h5 class="color-delete" id="message-them-thoi-gian-ung-tuyen-viec-lam"></h5>

			<h5>Hạn ứng tuyển:</h5>
			<input class="input width-100" type="date" name="" id="them-han-ung-tuyen-viec-lam" value="<?php echo $hanUngTuyen ?>">
			<h5 class="color-delete" id="message-them-han-ung-tuyen-viec-lam"></h5>

			<h5>Số lượng tuyển dụng:</h5>
			<input class="input width-100" type="number" name="" id="them-so-luong-ung-tuyen-viec-lam" min="1" max="1000" value="<?php echo $soLuongTuyenDung ?>">
			<h5 class="color-delete" id="message-them-so-luong-ung-tuyen-viec-lam"></h5>

			<h5>Số lượng còn lại:</h5>
			<input class="input width-100" type="number" name="" id="them-so-luong-ung-tuyen-viec-lam" min="1" max="1000" value="<?php echo $soLuongConLai ?>">
			<h5 class="color-delete" id="message-them-so-luong-ung-tuyen-viec-lam"></h5>

			<h5>Trạng thái:</h5>
			<select class="select width-100" id="lua-chon-them-trang-thai-viec-lam">
			<?php
				if($trangThai == 1)
					echo '
				<option selected value="1">Đang mở</option>
				<option value="0">Đóng</option>
					';
				else
					echo '
				<option value="1">Đang mở</option>
				<option selected value="0">Đóng</option>
					';
			?>
			</select>
			<br><br>

			<button class="button button-create" type="button" onclick="validateViecLam('Sửa')">Lưu lại</button>
			<button class="button button-reset" type="reset">Đặt lại</button>
		</form>
	</div>

	<div class="nen-cua-so" id="nen-cua-so-sua-viec-lam" onclick="dongCuaSo('cua-so-sua-viec-lam', 'nen-cua-so-sua-viec-lam')">
			
	</div>

<!-- Ung tuyen va danh gia -->
	<div class="margin">
	<!-- Ung tuyen -->
		<div>
			<h3 class="margin">Danh sách ứng tuyển</h3>
			<div class="border-radius box-shadow padding">
			<!-- Tim kiem -->
				<form class="flex-between" method="get" action="../quan-ly-nha-tuyen-dung/chi-tiet-viec-lam-nha-tuyen-dung.php">
					<input type="" name="id" value="<?php echo $_GET['id'] ?>" hidden>
					<input class="input width-100" type="text" name="tu-khoa">
					&nbsp;&nbsp;
					<button class="button button-create"><span class="material-symbols-outlined icon1">search</span></button>
				</form>

			<!-- Tu khoa tim kiem -->

			<?php
				if(isset($_GET['tu-khoa'])){
			?>

			<h3>Kết quả tìm kiếm cho '<span id="tu-khoa-tim-kiem-ho-so"><?php echo $_GET['tu-khoa'] ?></span>' <span><a class="a" href="../quan-ly-nha-tuyen-dung/chi-tiet-viec-lam-nha-tuyen-dung.php?id=<?php echo $_GET['id'] ?>">Quay lại</a></span></h3>

			<?php } ?>
			<!-- Loc ho so -->
				<div class="loc flex-between padding">
					<div>
						<label><h5>Trạng thái</h5></label>
						<select class="select" id="loc-theo-trang-thai" onchange="locHoSoUngTuyen()">
							<option value="Tất cả" selected>Tất cả</option>
							<option value="Chờ xét duyệt">Chờ xét duyệt</option>
							<option value="Đã chấp nhận">Đã chấp nhận</option>
							<option value="Đã từ chối">Đã từ chối</option>
							<option value="Đã hoàn thành">Đã hoàn thành</option>
						</select>
					</div>

					<div>
						<label><h5>Sắp xếp theo</h5></label>
						<select class="select" id="loc-theo-thoi-gian" onchange="locHoSoUngTuyen()">
							<option value="Mới hơn" selected>Mới hơn</option>
							<option value="Cũ hơn">Cũ hơn</option>
						</select>
					</div>
				</div>

			<!-- DS ho so ung tuyen -->
				<div id="ds-ho-so-ung-tuyen">
				<?php
					$sqlHoSoUngTuyen = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where ungtuyenvieclam.MaViecLam='".$_GET['id']."'";
					if(isset($_GET['tu-khoa']))
						$sqlHoSoUngTuyen .= " and ungvien.TenUngVien Like '%".$_GET['tu-khoa']."%'";
					$sqlHoSoUngTuyen .= " Order By ThoiGianUngVienUngTuyen DESC";
				?>

					<table class="table">
						<tr>
							<th style="width: 20%;"><h5><b>Tên ứng viên</b></h5></th>
							<th><h5><b>Chú thích</b></h5></th>
							<th><h5><b>CV</b></h5></th>
							<th><h5><b>Thời gian</b></h5></th>
							<th><h5><b>Trạng thái</b></h5></th>
						</tr>

				<?php
					$dsHoSoUngTuyen = mysqli_query($conn, $sqlHoSoUngTuyen);
					if($dsHoSoUngTuyen->num_rows>0){
						while($row = $dsHoSoUngTuyen->fetch_assoc()){
				?>

						<tr>
							<td>
								<a class="a" href="../ung-vien.php?id=<?php echo $row['MaUngVien'] ?>"><h5><?php echo $row['TenUngVien'] ?></h5></a>
							</td>
							<td><h5><?php echo $row['ChuThichUngTuyenViecLam'] ?></h5></td>
							<td>
								<h5><span class="material-symbols-outlined icon1">folder_open</span> <?php echo $row['TenFileCV'] ?> 
								<?php if($row['TenFileCV'] != ''){ ?>
									<a class="a" href="../cv/<?php echo $row['TenFileCV'] ?>" target="_blank">Xem</a>
									<a href="../ajax_action/download.php?fileName=<?php echo $row['TenFileCV'] ?>"><span style="font-size: 35px;" class="material-symbols-outlined icon1 color-create">download</span></a>
								<?php } ?>
								</h5>
							</td>
							<td><h5><?php echo $row['ThoiGianUngVienUngTuyen'] ?></h5></td>
							<td><h5><?php echo $row['TrangThaiUngTuyen'] ?></h5></td>

							<tr>
								<?php 
									if($row['TrangThaiUngTuyen'] == 'Đã hoàn thành'){ ?>
								<td>
									<button class="button button-delete" onclick="xoaHoSoUngTuyen('<?php echo $row['MaUngVien'] ?>', '<?php echo $row['MaViecLam'] ?>')">
										Xóa
									</button>
								</td>
								<?php }else if($row['TrangThaiUngTuyen'] == 'Đã chấp nhận'){ ?>
								<td>
									<button class="button button-delete" onclick="chuyenTrangThaiUngTuyen('<?php echo $row['MaUngVien'] ?>', '<?php echo $row['MaViecLam'] ?>', 'Đã từ chối')">Từ chối</button>
								</td>
								<td>
									<button class="button button-success" onclick="chuyenTrangThaiUngTuyen('<?php echo $row['MaUngVien'] ?>', '<?php echo $row['MaViecLam'] ?>', 'Đã hoàn thành')">Hoàn thành</button>
								</td>
								<td>
									<button class="button button-delete" onclick="xoaHoSoUngTuyen('<?php echo $row['MaUngVien'] ?>', '<?php echo $row['MaViecLam'] ?>')">
									Xóa
									</button>
								</td>
								<?php } else if($row['TrangThaiUngTuyen'] == 'Đã từ chối'){ ?>
								<td>
									<button class="button button-create" onclick="chuyenTrangThaiUngTuyen('<?php echo $row['MaUngVien'] ?>', '<?php echo $row['MaViecLam'] ?>', 'Đã chấp nhận')">Chấp nhận</button>
								</td>
								<td>
									<button class="button button-success" onclick="chuyenTrangThaiUngTuyen('<?php echo $row['MaUngVien'] ?>', '<?php echo $row['MaViecLam'] ?>', 'Đã hoàn thành')">Hoàn thành</button>
								</td>
								<td>
									<button class="button button-delete" onclick="xoaHoSoUngTuyen('<?php echo $row['MaUngVien'] ?>', '<?php echo $row['MaViecLam'] ?>')">
									Xóa
									</button>
								</td>
								<?php }else{ ?>
								<td>
									<button class="button button-create" onclick="chuyenTrangThaiUngTuyen('<?php echo $row['MaUngVien'] ?>', '<?php echo $row['MaViecLam'] ?>', 'Đã chấp nhận')">Chấp nhận</button>
								</td>
								<td>
									<button class="button button-delete" onclick="chuyenTrangThaiUngTuyen('<?php echo $row['MaUngVien'] ?>', '<?php echo $row['MaViecLam'] ?>', 'Đã từ chối')">Từ chối</button>
								</td>
								<td>
									<button class="button button-success" onclick="chuyenTrangThaiUngTuyen('<?php echo $row['MaUngVien'] ?>', '<?php echo $row['MaViecLam'] ?>', 'Đã hoàn thành')">Hoàn thành</button>
								</td>
								<td>
									<button class="button button-delete" onclick="xoaHoSoUngTuyen('<?php echo $row['MaUngVien'] ?>', '<?php echo $row['MaViecLam'] ?>')">
									Xóa
									</button>
								</td>
								<?php } ?>
							</tr>
						</tr>

				<?php
						}
					} 
				?>
					</table>
				</div>

			</div>
		</div>

	<!-- Danh gia -->
		<div>
			<h3 class="margin">Đánh giá</h3>
			<div class="border-radius box-shadow padding" >
				<!-- Loc -->
				<div class="loc flex-between padding">
					<div>
						<label><h5>Sắp xếp theo</h5></label>
						<select class="select" id="loc-danh-gia" onchange="locDanhGiaViecLam()">
							<option value="Mới hơn" selected>Mới hơn</option>
							<option value="Cũ hơn">Cũ hơn</option>
						</select>
					</div>
				</div>
				<!-- Ds viec lam -->
				<div id="ds-danh-gia-viec-lam">
				<?php
					getData($conn, "Select * From danhgiavieclam inner join ungvien on danhgiavieclam.MaUngVien=ungvien.MaUngVien Where MaViecLam='".$_GET['id']."' Order By ThoiGianDanhGia DESC", "../inc/viec-lam/danh-gia-viec-lam.php");
				?>
				</div>
			</div>
		</div>
	</div>

<?php } ?>