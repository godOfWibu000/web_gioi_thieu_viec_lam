<?php
	$title = $_GET['viec-lam'];
	require "inc/head.php";
?>

<link rel="stylesheet" type="text/css" href="css/chi-tiet-viec-lam.css">
<link rel="stylesheet" type="text/css" href="css/side-bar.css">

<?php
	require "inc/header.php";

	$vieclam = mysqli_query($conn, "Select * From vieclam inner join nhatuyendung on vieclam.MaNhaTuyenDung=nhatuyendung.MaNhaTuyenDung inner join linhvuc on vieclam.MaLinhVuc=linhvuc.MaLinhVuc inner join hocvan on vieclam.MaHocVan=hocvan.MaHocVan inner join kinhnghiem on vieclam.MaKinhNghiem=kinhnghiem.MaKinhNghiem Where MaViecLam='".$_GET['id']."'");

	if($vieclam->num_rows > 0){
		while($row = $vieclam->fetch_assoc()){
			$maViecLam = $row['MaViecLam'];
			$tenViecLam = $row['TenViecLam'];
			$maLinhVuc = $row['MaLinhVuc'];
			$tenLinhVuc = $row['TenLinhVuc'];
			$tienLuong = $row['TienLuong'];
			$thoiGianDang = $row['ThoiGianDangViecLam'];
			$thoiGianUngTuyen = $row['ThoiGianUngTuyen'];
			$hanUngTuyen = $row['HanUngTuyen'];
			$soLuongTuyenDung = $row['SoLuongTuyenDung'];
			$soLuongUngTuyen = $row['SoLuongUngTuyen'];
			$soLuongQuanTam = $row['SoNguoiQuanTam'];
			$moTa = $row['MoTaViecLam'];
			$soSao = $row['SoSao'];

			$maNhaTuyenDung = $row['MaNhaTuyenDung'];
			$tenNhaTuyenDung = $row['TenNhaTuyenDung'];
			$diaChi = $row['DiaChiNhaTuyenDung'];

			$linhVuc = $row['TenLinhVuc'];
			$hocVan = $row['TenHocVan'];
			$kinhNghiem = $row['TenKinhNghiem'];
		}
	}
?>


<div class="content padding">
	<?php require "inc/side-bar.php"; ?>
	<div class="chi-tiet-viec-lam row">
	<!-- Noi dung viec lam -->
		<div class="thong-tin-viec-lam col-lg-8">
		<!-- Ten viec lam va so nguoi quan tam -->
			<div class="nguoi-quan-tam">
				<div class="so-nguoi-quan-tam">
					<h3><?php echo $tenViecLam ?></h3>
					<div class="flex">
						<h6>
							<span class="material-symbols-outlined icon1">schedule</span>
							<?php echo $thoiGianDang ?>
						</h6>
						&nbsp;&nbsp;&nbsp;
						<h6>
							<span class="material-symbols-outlined icon1">record_voice_over</span>
							<?php echo $soLuongQuanTam ?> người quan tâm
						</h6>
					</div>
				</div>
			<!-- Quan tam -->
				<div class="<?php echo $maViecLam ?>">
				<?php
					if(isset($_SESSION["emailDangNhap"])){
						$quanTam = mysqli_query($conn, "Select * From quantam Where MaViecLam='".$maViecLam."' and Email='".$_SESSION["emailDangNhap"]."'");
						if($quanTam->num_rows > 0){
				?>
				<button style="width: 200px;" class="button button-create" onclick="quanTam('<?php echo $maViecLam ?>', '<?php echo $_SESSION['emailDangNhap'] ?>', 'Bỏ quan tâm')">
					<span class="material-symbols-outlined icon1" style="">playlist_add_check</span>
					<span>
					Đã quan tâm
				</button>
				<?php
						}else{
				?>
				<button style="width: 200px;" class="button button-reset" onclick="quanTam('<?php echo $maViecLam ?>', '<?php echo $_SESSION['emailDangNhap'] ?>', 'Quan tâm')">
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

		<!-- Danh gia va so sao -->
			<div class="danh-gia" style="display: flex;">
				<div class="sao" style="font-size: 20px;color: #f1c40f;">
					<div id="stars" style="">
						<i id="star1"><i class="far fa-star"></i></i>
						<i id="star2"><i class="far fa-star"></i></i>
						<i id="star3"><i class="far fa-star"></i></i>
						<i id="star4"><i class="far fa-star"></i></i>
						<i id="star5"><i class="far fa-star"></i></i>
					</div>
				</div>
				<h5>&nbsp;
					<h5 id="number-star"><?php echo $soSao ?></h5>
					<h5>/5</h5>
				</h5>
			</div>
			<br>

		<!-- Thong tin chi tiet -->
			<div class="thong-tin-chi-tiet">
			<!-- Thong tin nha tuyen dung -->
				<div class="nha-tuyen-dung">
					<img src="img/avatar.png" width="50px">
					<h5 class="ten-nha-tuyen-dung"><a href="chi-tiet-nha-tuyen-dung.php?id=<?php echo $maNhaTuyenDung ?>&ten-nha-tuyen-dung=<?php echo $tenNhaTuyenDung ?>"><?php echo $tenNhaTuyenDung ?></a></h5><br>
				</div>
				<br>

			<!-- Ung tuyen va chia se -->
				<div class="ung-tuyen">
					<?php
						$kiemTraUngTuyen = 0;
						if(isset($_SESSION['maUngVien'])){
							$result = mysqli_query($conn, "Select * From ungtuyenvieclam Where MaUngVien='".$_SESSION['maUngVien']."' and MaViecLam='".$_GET['id']."'");
							if($result->num_rows>0)
								$kiemTraUngTuyen = 1;
						}
						if($kiemTraUngTuyen == 0){
					?>

					<button class="button button-main" onclick="ungTuyenViecLam('<?php if(isset($_SESSION['emailDangNhap'])) echo $_SESSION['emailDangNhap'] ?>', '<?php if(isset($_SESSION['loaiTaiKhoan'])) echo $_SESSION['loaiTaiKhoan'] ?>', '<?php if(isset($_SESSION['maUngVien'])) echo $_SESSION['maUngVien'] ?>', '<?php echo $maViecLam ?>')">
						<span class="material-symbols-outlined icon1">touch_app</span> Ứng tuyển
					</button>

					<?php
						}else{
					?>

					<button class="button button-create"><span class="material-symbols-outlined icon1">done</span>Đã ứng tuyển</button>

					<?php
						}
					?>

					<button class="button button-create" id="button-mo-cua-so-chia-se" onclick="moCuaSoChiaSeViecLam()">
						<span class="material-symbols-outlined icon1">share</span> Chia sẻ
					</button>
				</div>

			<!-- So luong tuyen dung -->
				<div class="flex margin">
					<span>
						<h5>Số lượng tuyển dụng: <?php echo $soLuongTuyenDung ?></h5>
					</span>
					<h5>&nbsp;|&nbsp;</h5>
					<span>
						<h5>Đã ứng tuyển: <?php echo $soLuongUngTuyen ?></h5>
					</span>
				</div>

			<!-- Thoi gian ung tuyen -->
				<h5>Thời gian ứng tuyển: <?php echo $thoiGianUngTuyen ?> đến <?php echo $hanUngTuyen ?></h5>

			<!-- Chia se -->
				<div class="chia-se" id="chia-se">
					<div class="noi-dung">
						<a class="a" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=https://google.com/">
							<span class="lien-ket-internet"><i class="fab fa-facebook-f"></i></span>
						</a>
						<a class="a" href="#">
							<span class="lien-ket-internet"><i class="fab fa-twitter"></i></span>
						</a>
						<a class="a" href="#">
							<span class="lien-ket-internet"><i class="fab fa-instagram"></i></span>
						</a>
						<a class="a" href="#">
							<span class="lien-ket-internet"><i class="fab fa-linkedin-in"></i></span>
						</a>
					</div>
				</div>

				<hr>

			<!-- Muc luong -->
				<div class="muc-luong">
					<h5>
						<b>
							<span class="material-symbols-outlined icon1">attach_money</span>Mức lương dự kiến: <?php echo $tienLuong ?> USD
						</b>
					</h5>
				</div>

			<!-- Linh vuc -->
				<div class="linh-vuc">
					<h5>
						<b>
							<span class="material-symbols-outlined icon1">work</span> Lĩnh vực làm việc: <?php echo $linhVuc ?>
						</b>
					</h5>
				</div>

			<!-- Hoc van -->
				<div class="hoc-van">
					<h5>
						<b>
							<span class="material-symbols-outlined icon1">school</span> Trình độ học vấn: <?php echo $hocVan ?>
						</b>
					</h5>
				</div>
				
			<!-- Kinh nghiem -->
				<div class="kinh-nghiem">
					<h5>
						<b>
							<span class="material-symbols-outlined icon1">exercise</span> Kinh nghiệm: <?php echo $kinhNghiem ?>
						</b>
					</h5>
				</div>

			<!-- Mo ta cong viec -->
				<div class="mo-ta-cong-viec">
					<h5>
						<b>
							<span class="material-symbols-outlined icon1">assignment</span> Mô tả công việc:
						</b>
					</h5>
					<h5><?php echo $moTa ?></h5>
				</div>

			<!-- Bao cao cong viec -->
				<div class="bao-cao-cong-viec">
					<?php
						if(isset($_SESSION['emailDangNhap'])){
					?>
					<h4 onclick="moCuaSo('cua-so-bao-cao', 'nen-cua-so-bao-cao')">
						<span class="material-symbols-outlined icon1">report</span>
						 Báo cáo công việc này
					</h4>
					<?php
						}else{
					?>

					<h4 onclick="moCuaSo('login-frame', 'nen-cua-so-dang-nhap')">
						<span class="material-symbols-outlined icon1">report</span>
						 Báo cáo công việc này
					</h4>

					<?php
						}
					?>
				</div>

				<div class="cua-so cua-so-nho padding" id="cua-so-bao-cao">
					<h3>Báo cáo công việc</h3>
					<form action="ajax_action/viec_lam/bao_cao_action.php" method="post">
						<input type="" name="ma-viec-lam" value="<?php echo $_GET['id'] ?>" hidden>
						<input type="" name="ten-viec-lam" value="<?php echo $_GET['viec-lam'] ?>" hidden>
						<input id="thoi-gian-bao-cao" type="" name="thoi-gian" hidden>
						<h5>Nội dung báo cáo:</h5>
						<textarea class="textarea" name="noi-dung" required></textarea>
						<button class="button button-delete" onclick="document.getElementById('thoi-gian-bao-cao').value=getThoiGian()">Báo cáo</button>
					</form>
				</div>
				<div class="nen-cua-so" id="nen-cua-so-bao-cao" onclick="dongCuaSo('cua-so-bao-cao', 'nen-cua-so-bao-cao')">
					
				</div>

			<!-- Danh gia cua ung vien -->
				<div class="border-radius box-shadow padding">
					<h4>Đánh giá về công việc:</h4>
				<!-- DS danh gia -->
					<div>
					<?php
						$sql = "Select * From danhgiavieclam inner join ungvien on danhgiavieclam.MaUngVien=ungvien.MaUngVien Where MaViecLam='".$maViecLam."'";
						getData($conn, $sql, "inc/viec-lam/danh-gia-viec-lam.php");
					?>
					</div>
					<hr>

				<!-- Danh gia -->
					<?php
						if(isset($_SESSION['emailDangNhap'])){
							if(isset($_SESSION['maUngVien'])){
								$kiemTraDanhGia = mysqli_query($conn, "Select * From danhgiavieclam Where MaViecLam='".$_GET['id']."' and MaUngVien='".$_SESSION['maUngVien']."'");
								if($kiemTraDanhGia->num_rows>0)
									echo '<h5 class="color-create">Bạn đã đánh giá việc làm này</h5>';
								else{
					?>
					<div class="margin">
						<h4>Viết đánh giá</h4>
						<form action="ajax_action/viec_lam/danh_gia_action.php" method="post">
							<input type="" name="ma-viec-lam" value="<?php echo $_GET['id'] ?>" hidden>
							<input type="" name="ten-viec-lam" value="<?php echo $_GET['viec-lam'] ?>" hidden>
							<h5>Số sao đánh giá:</h5>
							<h4 class="color-reset">
								<span class="cursor-pointer">
									<i id="star-1" onclick="doiSoSaoDanhGia('1')"><i class="fas fa-star"></i></i>
									<i id="star-2" onclick="doiSoSaoDanhGia('2')"><i class="fas fa-star"></i></i>
									<i id="star-3" onclick="doiSoSaoDanhGia('3')"><i class="fas fa-star"></i></i>
									<i id="star-4" onclick="doiSoSaoDanhGia('4')"><i class="fas fa-star"></i></i>
									<i id="star-5" onclick="doiSoSaoDanhGia('5')"><i class="fas fa-star"></i></i>
								</span>
								<input id="so-sao-danh-gia" name="so-sao" value="5" readonly>
							</h4>
							<h5>Bình luận:</h5>
							<textarea class="textarea" name="binh-luan"></textarea>
							<input id="thoi-gian-danh-gia" name="thoi-gian" type="" name="" value="" hidden>

							<button class="button button-create" onclick="document.getElementById('thoi-gian-danh-gia').value = getThoiGian()">Đánh giá</button>
						</form>
					</div>
					<?php
								}
							}else if(!isset($_SESSION['maUngVien']) && !isset($_SESSION['maNhaTuyenDung'])){
					?>

					<h5><a href="quan-ly-tai-khoan.php" class="cursor-pointer color-create a">Bổ sung thông tin</a> để đánh giá</h5>

					<?php
							}else{
					?>

					<h5>Đăng nhập tài khoản ứng viên để đánh giá</h5>

					<?php
							}
						}else{
					?>

					<h5><b class="cursor-pointer color-create" onclick="moCuaSo('login-frame', 'nen-cua-so-dang-nhap')">Đăng nhập</b> để đánh giá</h5>

					<?php } ?>
				</div>
			</div>
		</div>

	<!-- Side-bar -->
		<div class="side-bar col-lg-4">
			<h4 class="tieu-de">Việc làm liên quan</h4>

			<?php
				getData($conn, "Select * From vieclam 
					inner join nhatuyendung on vieclam.MaNhaTuyenDung=nhatuyendung.MaNhaTuyenDung 
					inner join khuvuc on vieclam.MaKhuVuc=khuvuc.MaKhuVuc 
					inner join kinhnghiem on vieclam.MaKinhNghiem=kinhnghiem.MaKinhNghiem 
					inner join linhvuc on vieclam.MaLinhVuc=linhvuc.MaLinhVuc 
					inner join hocvan on vieclam.MaHocVan=hocvan.MaHocVan Where linhvuc.MaLinhVuc='".$maLinhVuc."' Limit 0,4", "inc/viec-lam/viec-lam-lien-quan.php");
			?>

			<a href="danh-muc-viec-lam.php?id=<?php echo $maLinhVuc ?>&danh-muc-viec-lam=<?php echo $tenLinhVuc ?>">
				<button class="button button-create width-100">Xem thêm</button>
			</a>
		</div>
	</div>
</div>

<script src="js/chi-tiet-viec-lam.js"></script>
<?php
	if(!isset($_GET['id']) || !isset($_GET['viec-lam'])){
?>
<script type="text/javascript">
	window.location = 'index.php';
</script>
<?php } ?>

<?php
	require "inc/footer.php";
?>