<?php
	$title = 'Trang quản lý nhà tuyển dụng';
	require "../inc/quan-ly-nha-tuyen-dung/header-quan-ly-nha-tuyen-dung.php";
?>
		<?php
			if(isset($_SESSION['maNhaTuyenDung'])){
				$sqlNhaTuyenDung = "Select * From nhatuyendung Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."'";
				$nhaTuyenDung = mysqli_query($conn, $sqlNhaTuyenDung);
				if($nhaTuyenDung->num_rows>0){
					while($row = $nhaTuyenDung->fetch_assoc()){
						$maNhaTuyenDung = $row['MaNhaTuyenDung'];
						$tenNhaTuyenDung = $row['TenNhaTuyenDung'];
						$sdtNhaTuyenDung = $row['SDTNhaTuyenDung'];
						$diaChiNhaTuyenDung = $row['DiaChiNhaTuyenDung'];
						$moTaNhaTuyenDung = $row['MoTaNhaTuyenDung'];
					}
				}

				// Linh vuc
					$dsMaLinhVuc = dsThongTinBoSung($conn, "Select MaLinhVuc From linhvuc", "MaLinhVuc");
					$dsTenLinhVuc = dsThongTinBoSung($conn, "Select TenLinhVuc From linhvuc", "TenLinhVuc");
					$dsMaLinhVucNhaTuyenDung = dsThongTinBoSung($conn, "Select linhvucnhatuyendung.MaLinhVuc From linhvucnhatuyendung inner join linhvuc on linhvucnhatuyendung.MaLinhVuc=linhvuc.MaLinhVuc Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."'", "MaLinhVuc");
					$dsTenLinhVucNhaTuyenDung = dsThongTinBoSung($conn, "Select linhvuc.TenLinhVuc From linhvucnhatuyendung inner join linhvuc on linhvucnhatuyendung.MaLinhVuc=linhvuc.MaLinhVuc Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."'", "TenLinhVuc");

				// Lien ket
					$dsMaLienKetInternetNhaTuyenDung = dsThongTinBoSung($conn, "Select lienketinternetnhatuyendung.MaLienKetInternet From lienketinternetnhatuyendung inner join lienketinternet on lienketinternetnhatuyendung.MaLienKetInternet=lienketinternet.MaLienKetInternet Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."'", "MaLienKetInternet");
					$dsTenLienKetInternetNhaTuyenDung = dsThongTinBoSung($conn, "Select lienketinternet.TenLienKetInternet From lienketinternetnhatuyendung inner join lienketinternet on lienketinternetnhatuyendung.MaLienKetInternet=lienketinternet.MaLienKetInternet Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."'", "TenLienKetInternet");
					$dsBieuTuongLienKetInternetNhaTuyenDung = dsThongTinBoSung($conn, "Select lienketinternet.BieuTuongLienKetInternet From lienketinternetnhatuyendung inner join lienketinternet on lienketinternetnhatuyendung.MaLienKetInternet=lienketinternet.MaLienKetInternet Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."'", "BieuTuongLienKetInternet");
					$dsDuongDanLienKetInternetNhaTuyenDung = dsThongTinBoSung($conn, "Select lienketinternetnhatuyendung.DuongDanLienKet From lienketinternetnhatuyendung Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."'", "DuongDanLienKet");
		?>
			<div class="quan-ly-thong-tin-nha-tuyen-dung">
			<!-- Thong tin co ban -->
				<div class="margin border-radius box-shadow">
					<div class="padding">
						<div class="phan-dau flex" style="justify-content: space-between;">
							<div class="anh-va-ten">
								<div style="margin-top: 20px;">
									<h3><?php echo $tenNhaTuyenDung ?></h3>
								</div>
							</div>

							<span style="font-size: 30px;margin: auto 0;" class="material-symbols-outlined mo-cua-so-sua-thong-tin-co-ban icon-button color-create" onclick="moCuaSo('cua-so-sua-thong-tin-co-ban-nha-tuyen-dung', 'nen-cua-so-sua-thong-tin-co-ban-nha-tuyen-dung')">
								edit_square
							</span>
						</div>
						<?php
							if($dsTenLinhVucNhaTuyenDung != null){
								for ($i=0; $i < count($dsTenLinhVucNhaTuyenDung); $i++) { 
						?>

						<span class="chi-muc background-border2"><?php echo $dsTenLinhVucNhaTuyenDung[$i] ?></span>

						<?php
								}
							}
						?>

						<div class="phan-than">
							<h5 class="so-dien-thoai">
								<span class="material-symbols-outlined icon1">
															call
								</span> <?php echo $sdtNhaTuyenDung ?>
							</h5>

							<h5 class="email">
								<span class="material-symbols-outlined icon1">
															mail
								</span> <?php echo $_SESSION['emailDangNhap'] ?>
							</h5>

							<h5 class="dia-chi">
								<span class="material-symbols-outlined icon1">
															location_on
								</span> <?php echo $diaChiNhaTuyenDung ?>
							</h5>

							<h5 class="mo-ta border padding border-radius">
								<?php echo $moTaNhaTuyenDung ?>
							</h5>

							<div class="ds-lien-ket-internet text-center">
								<?php
									if($dsMaLienKetInternetNhaTuyenDung != null){
										for ($i=0; $i <count($dsMaLienKetInternetNhaTuyenDung); $i++) {
								?>
									
								<a class="a" href="<?php echo $dsDuongDanLienKetInternetNhaTuyenDung[$i] ?>" target="_blank">
									<span class="lien-ket-internet"><?php echo $dsBieuTuongLienKetInternetNhaTuyenDung[$i] ?></span>
								</a>

								<?php
										}
									}
								?>
							</div>
						</div>
					</div>

					<div class="cua-so cua-so-lon padding" id="cua-so-sua-thong-tin-co-ban-nha-tuyen-dung">
						<h2>Sửa thông tin nhà tuyển dụng:</h2>
						<br>
						<form>
							<input type="" name="" id="ma-nha-tuyen-dung" value="<?php echo $maNhaTuyenDung ?>" hidden>
							<h5>Tên doanh nghiệp của bạn:</h5>
							<input class="input width-100" id="them-ten-nha-tuyen-dung" type="text" name="" value="<?php echo $tenNhaTuyenDung ?>">
							<h5 class="color-delete" id="message-them-ten-nha-tuyen-dung"></h5>

							<h5>Số điện thoại:</h5>
							<input class="input width-100" id="them-so-dien-thoai" type="text" name="" placeholder="0123456789" value="<?php echo $sdtNhaTuyenDung ?>">
							<h5 class="color-delete" id="message-them-so-dien-thoai"></h5>

							<h5>Địa chỉ:</h5>
							<input class="input width-100" id="them-dia-chi" type="text" name="" value="<?php echo $diaChiNhaTuyenDung ?>">
							<h5 class="color-delete" id="message-them-dia-chi"></h5>

							<h5>Mô tả:</h5>
							<textarea class="textarea width-100" id="them-mo-ta"><?php echo $moTaNhaTuyenDung ?></textarea>
							<h5 class="color-delete" id="message-them-mo-ta"></h5>

							<br><br>
							<button class="button button-create" type="button" onclick="validateThemNhaTuyenDung('Sửa')">Gửi</button>
							<button class="button button-reset" type="reset">Đặt lại</button>
						</form>
					</div>

					<div class="nen-cua-so" id="nen-cua-so-sua-thong-tin-co-ban-nha-tuyen-dung" onclick="dongCuaSo('cua-so-sua-thong-tin-co-ban-nha-tuyen-dung', 'nen-cua-so-sua-thong-tin-co-ban-nha-tuyen-dung')">
						
					</div>
				</div>

			<!-- Thong tin bo sung -->
				<div class="quan-ly-thong-tin-bo-sung-nha-tuyen-dung padding margin border-radius box-shadow">
				<!-- Linh vuc -->
					<div class="linh-vuc-chuyen-mon-nha-tuyen-dung">
						<h3>Lĩnh vực:</h3>

					<!-- DS linh vuc -->
						<div class="ds-linh-vuc-nha-tuyen-dung">
							<?php
							if($dsMaLinhVucNhaTuyenDung != null){
								for ($i=0; $i < count($dsTenLinhVucNhaTuyenDung); $i++) { 
							?>

							<div class="linh-vuc-nha-tuyen-dung flex-between">
								<div class="noi-dung flex" style="width: 80%;">
									<span class="material-symbols-outlined">integration_instructions</span>
									<h5> <?php echo $dsTenLinhVucNhaTuyenDung[$i] ?></h5>
								</div>

								<div class="tuy-chon">
									<span class="material-symbols-outlined color-delete cursor-pointer" onclick="xoaChiTietThongTinLinhVucUngVien('<?php echo $dsMaLinhVucNhaTuyenDung[$i] ?>')">backspace</span>
								</div>
							</div>
							<hr>

							<?php
									}
								}
							?>
						</div>

						<div class="button-tuy-chon">
							<button class="button button-create" onclick="moCuaSo('cua-so-them-chuyen-mon', 'nen-cua-so-them-chuyen-mon')">
								Thêm
							</button>
						</div>
					</div>
					<hr>

				<!-- Them linh vuc -->
					<div class="cua-so cua-so-nho padding" id="cua-so-them-chuyen-mon">
						<h3>Thêm lĩnh vực</h3>
						<form>
							<label><h5>Lĩnh vực:</h5></label><br>
							<select class="select width-100" id="lua-chon-them-moi-linh-vuc">
								<option selected disabled>Lựa chọn</option>
								<?php
									$dsLinhVuc = getListData($conn, "Select * From linhvuc");
									while($row = $dsLinhVuc->fetch_assoc()){
								?>

								<option value="<?php echo $row['MaLinhVuc'] ?>"><?php echo $row['TenLinhVuc'] ?></option>		

								<?php
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

				<!-- Lien ket internet nha tuyen dung -->
					<div class="lien-ket-internet-nha-tuyen-dung">
						<h3>Liên kết:</h3>
					<!-- DS lien ket-->
						<div class="ds-lien-ket-internet-nha-tuyen-dung">
							<?php
								if($dsMaLienKetInternetNhaTuyenDung != null){
									for ($i=0; $i <count($dsMaLienKetInternetNhaTuyenDung); $i++) {
							?>

							<div class="lien-ket-internet-nha-tuyen-dung flex-between">
								<div class="noi-dung">
									<h5>
										<span class="lien-ket-internet"><?php echo $dsBieuTuongLienKetInternetNhaTuyenDung[$i] ?></span>
										<?php echo $dsTenLienKetInternetNhaTuyenDung[$i] ?>
									</h5>
									<h6><?php echo $dsDuongDanLienKetInternetNhaTuyenDung[$i] ?></h6>
								</div>

								<div class="tuy-chon">
									<span class="material-symbols-outlined color-create cursor-pointer" onclick="moCuaSo('cua-so-sua-lien-ket-internet', 'nen-cua-so-sua-lien-ket-internet');loadSuaLienKetInternetUngVien('<?php echo $dsMaLienKetInternetNhaTuyenDung[$i] ?>', '<?php echo $dsTenLienKetInternetNhaTuyenDung[$i] ?>', '<?php echo $dsDuongDanLienKetInternetNhaTuyenDung[$i] ?>')">edit_square</span>

									<span class="material-symbols-outlined color-delete cursor-pointer" onclick="xoaChiTietThongTinLienKetInternetUngVien('<?php echo $dsMaLienKetInternetNhaTuyenDung[$i] ?>', '../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/xoa_chi_tiet_thong_tin_bo_sung_action.php')">backspace
									</span>
								</div>
							</div>
							<hr>
							
							<?php
									}
								}
							?>
						</div>

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
										$dsLienKetInternet = getListData($conn, "Select * From lienketinternet");
										while($row = $dsLienKetInternet->fetch_assoc()){
									?>

									<option value="<?php echo $row['MaLienKetInternet'] ?>"><?php echo $row['TenLienKetInternet'] ?></option>

									<?php
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
				</div>
			</div>
		<?php
			}
		?>
		
		</div>
	</div>
</body>
</html>