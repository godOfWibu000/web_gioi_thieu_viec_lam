<?php
	$title = 'Trang quản trị';
	require '../inc/admin/header-admin.php';
?>	
		<?php
			if(isset($_SESSION['loaiTaiKhoan']) && $_SESSION['loaiTaiKhoan'] == 'Admin'){
		?>
			<h2>Quản lý dữ liệu</h2>
			<div class="flex flex-between quan-ly-du-lieu">
			<!-- Hoc van -->
				<div class="quan-ly quan-ly-hoc-van padding margin box-shadow border-radius">
					<div class="flex-between">
						<h3>Quản lý học vấn</h3>
						<button class="button button-create" onclick="moCuaSo('cua-so-them-hoc-van', 'nen-cua-so-them-hoc-van')">Thêm</button>
					</div>

				<!-- Tim kiem -->
					<form class="flex-between margin" method="get" action="quan-ly-du-lieu.php">
						<input class="input width-100" type="text" name="tu-khoa-tim-kiem-hoc-van">
						<button class="button button-create"><span class="material-symbols-outlined icon1">search</span></button>
					</form>

				<!-- Loc -->
					<div>
						<label><h5>Sắp xếp</h5></label>
						<select class="select" id="loc-hoc-van" onchange="loc('loc-hoc-van', 'ds-hoc-van', '<?php if(isset($_GET['tu-khoa-tim-kiem-hoc-van'])) echo $_GET['tu-khoa-tim-kiem-hoc-van'] ?>')">
							<option value="A-Z">A-Z</option>
							<option value="Z-A">Z-A</option>
						</select>
					</div>

				<!-- DS -->
					<div id="ds-hoc-van">
						<?php
							$sqlMaHocVan = "Select MaHocVan From hocvan";
							$sqlTenHocVan = "Select TenHocVan From hocvan";
							if(isset($_GET['tu-khoa-tim-kiem-hoc-van'])){
						?>
						<div class="flex">
							<h4>Kết quả tìm kiếm cho '<?php echo $_GET['tu-khoa-tim-kiem-hoc-van'] ?>'</h4>
							<a class="a" href="quan-ly-du-lieu.php"><h4>Quay lại</h4></a>
						</div>
						<?php
								$where = " Where TenHocVan Like '%".$_GET['tu-khoa-tim-kiem-hoc-van']."%'";
								$sqlMaHocVan .= $where;
								$sqlTenHocVan .= $where;
							}
							$orderBy1 = " Order By TenHocVan ASC";
							$sqlMaHocVan .= $orderBy1;
							$sqlTenHocVan .= $orderBy1;
							$dsMaHocVan = dsThongTinBoSung($conn, $sqlMaHocVan, "MaHocVan");
							$dsTenHocVan = dsThongTinBoSung($conn, $sqlTenHocVan, "TenHocVan");
						?>
						<table class="table table-striped">
							<tr>
								<th>Id</th>
								<th>Tên học vấn</th>
								<th></th>
								<th></th>
							</tr>
							<?php
								for ($i=0; $i < count($dsMaHocVan); $i++) { 
							?>

							<tr>
								<td><?php echo $dsMaHocVan[$i] ?></td>
								<td><?php echo $dsTenHocVan[$i] ?></td>
								<?php if($dsTenHocVan[$i] != 'Trung học phổ thông'){ ?>
								<td><button class="button button-reset" onclick="moCuaSo('cua-so-sua-hoc-van', 'nen-cua-so-sua-hoc-van');loadSuaDuLieu('sua-hoc-van', '<?php echo $dsMaHocVan[$i] ?>', 'cua-so-sua-hoc-van')">Sửa</button></td>
								<td>
								<button class="button button-delete" onclick="xoaDuLieu('xoa-hoc-van' ,'<?php echo $dsMaHocVan[$i] ?>')">Xóa</button>
								</td>
								<?php }else echo '<td></td><td></td>' ?>
							</tr>

							<?php
								}
							?>
						</table>
					</div>

				<!-- Them -->
					<div class="cua-so cua-so-nho padding" id="cua-so-them-hoc-van">
						<form>
							<h3>Thêm học vấn</h3>
							<h5>Tên học vấn:</h5>
							<input class="input width-100" type="text" name="" id="them-hoc-van">
							<h5 class="color-delete" id="message-them-hoc-van"></h5>
							<br>
							<button class="button button-create" type="button" onclick="validateDuLieu1('', '', 'them-hoc-van', 'message-them-hoc-van', 'cua-so-them-hoc-van', 'nen-cua-so-them-hoc-van')">Lưu</button>
							<button class="button button-reset" type="reset">Đặt lại</button>
						</form>
					</div>
					<div class="nen-cua-so" id="nen-cua-so-them-hoc-van" onclick="dongCuaSo('cua-so-them-hoc-van', 'nen-cua-so-them-hoc-van')">
						
					</div>

				<!-- Sua -->
					<div class="cua-so cua-so-nho padding" id="cua-so-sua-hoc-van">
						
					</div>
					<div class="nen-cua-so" id="nen-cua-so-sua-hoc-van" onclick="dongCuaSo('cua-so-sua-hoc-van', 'nen-cua-so-sua-hoc-van')">
						
					</div>
				</div>

			<!-- Khu vuc -->
				<div class="quan-ly quan-ly-khu-vuc padding margin box-shadow border-radius">
					<div class="flex-between">
						<h3>Quản lý khu vực</h3>
						<button class="button button-create" onclick="moCuaSo('cua-so-them-khu-vuc', 'nen-cua-so-them-khu-vuc')">Thêm</button>
					</div>

				<!-- Tim kiem -->
					<form class="flex-between margin" method="get" action="quan-ly-du-lieu.php">
						<input class="input width-100" type="text" name="tu-khoa-tim-kiem-khu-vuc">
						<button class="button button-create"><span class="material-symbols-outlined icon1">search</span></button>
					</form>

				<!-- Loc -->
					<div>
						<label><h5>Sắp xếp</h5></label>
						<select class="select" id="loc-khu-vuc" onchange="loc('loc-khu-vuc', 'ds-khu-vuc', '<?php if(isset($_GET['tu-khoa-tim-kiem-khu-vuc'])) echo $_GET['tu-khoa-tim-kiem-khu-vuc'] ?>')">
							<option value="A-Z">A-Z</option>
							<option value="Z-A">Z-A</option>
						</select>
					</div>

				<!-- DS -->
					<div id="ds-khu-vuc">
						<?php
							$sqlMaKhuVuc = "Select MaKhuVuc From khuvuc";
							$sqlTenKhuVuc = "Select TenKhuVuc From khuvuc";
							if(isset($_GET['tu-khoa-tim-kiem-khu-vuc'])){
						?>
						<div class="flex">
							<h4>Kết quả tìm kiếm cho '<?php echo $_GET['tu-khoa-tim-kiem-khu-vuc'] ?>'</h4>
							<a class="a" href="quan-ly-du-lieu.php"><h4>Quay lại</h4></a>
						</div>
						<?php
								$where = " Where TenKhuVuc Like '%".$_GET['tu-khoa-tim-kiem-khu-vuc']."%'";
								$sqlMaKhuVuc .= $where;
								$sqlTenKhuVuc .= $where;
							}
							$orderBy2 = " Order By TenKhuVuc ASC";
							$sqlMaKhuVuc .= $orderBy2;
							$sqlTenKhuVuc .= $orderBy2;
							$dsMaKhuVuc = dsThongTinBoSung($conn, $sqlMaKhuVuc, "MaKhuVuc");
							$dsTenKhuVuc = dsThongTinBoSung($conn, $sqlTenKhuVuc, "TenKhuVuc");
						?>
						<table class="table table-striped">
							<tr>
								<th>Id</th>
								<th>Tên khu vực</th>
								<th></th>
								<th></th>
							</tr>
							<?php
								for ($i=0; $i < count($dsMaKhuVuc); $i++) { 
							?>

							<tr>
								<td><?php echo $dsMaKhuVuc[$i] ?></td>
								<td><?php echo $dsTenKhuVuc[$i] ?></td>
								<?php if($dsTenKhuVuc[$i] != 'Gia Lâm'){ ?>
								<td><button class="button button-reset" onclick="moCuaSo('cua-so-sua-khu-vuc', 'nen-cua-so-sua-khu-vuc');loadSuaDuLieu('sua-khu-vuc', '<?php echo $dsMaKhuVuc[$i] ?>', 'cua-so-sua-khu-vuc');">Sửa</button></td>
								<td><button class="button button-delete" onclick="xoaDuLieu('xoa-khu-vuc', '<?php echo $dsMaKhuVuc[$i] ?>')">Xóa</button></td>
								<?php }else echo '<td></td><td></td>' ?>
							</tr>

							<?php
								}
							?>
						</table>
					</div>

				<!-- Them -->
					<div class="cua-so cua-so-nho padding" id="cua-so-them-khu-vuc">
						<form>
							<h3>Thêm khu vực</h3>
							<h5>Tên khu vực:</h5>
							<input class="input width-100" type="text" name="" id="them-khu-vuc">
							<h5 class="color-delete" id="message-them-khu-vuc"></h5>
							<br>
							<button class="button button-create" type="button" onclick="validateDuLieu1('', '', 'them-khu-vuc', 'message-them-khu-vuc', 'cua-so-them-khu-vuc', 'nen-cua-so-them-khu-vuc')">Lưu</button>
							<button class="button button-reset" type="reset">Đặt lại</button>
						</form>
					</div>
					<div class="nen-cua-so" id="nen-cua-so-them-khu-vuc" onclick="dongCuaSo('cua-so-them-khu-vuc', 'nen-cua-so-them-khu-vuc')">
						
					</div>

				<!-- Sua -->
					<div class="cua-so cua-so-nho padding" id="cua-so-sua-khu-vuc">
						
					</div>
					<div class="nen-cua-so" id="nen-cua-so-sua-khu-vuc" onclick="dongCuaSo('cua-so-sua-khu-vuc', 'nen-cua-so-sua-khu-vuc')">
						
					</div>
				</div>

			<!-- Linh vuc -->
				<div class="quan-ly quan-ly-linh-vuc margin padding box-shadow border-radius">
					<div class="flex-between">
						<h3>Quản lý lĩnh vực</h3>
						<button class="button button-create" onclick="moCuaSo('cua-so-them-linh-vuc', 'nen-cua-so-them-linh-vuc')">Thêm</button>
					</div>

				<!-- Tim kiem -->
					<form class="flex-between margin" method="get" action="quan-ly-du-lieu.php">
						<input class="input width-100" type="text" name="tu-khoa-tim-kiem-linh-vuc">
						<button class="button button-create"><span class="material-symbols-outlined icon1">search</span></button>
					</form>

				<!-- Loc -->
					<div>
						<label><h5>Sắp xếp</h5></label>
						<select class="select" id="loc-linh-vuc" onchange="loc('loc-linh-vuc', 'ds-linh-vuc', '<?php if(isset($_GET['tu-khoa-tim-kiem-linh-vuc'])) echo $_GET['tu-khoa-tim-kiem-linh-vuc'] ?>')">
							<option value="A-Z">A-Z</option>
							<option value="Z-A">Z-A</option>
						</select>
					</div>

				<!-- DS -->
					<div id="ds-linh-vuc">
						<?php
							$sqlMaLinhVuc = "Select MaLinhVuc From linhvuc";
							$sqlTenLinhVuc = "Select TenLinhVuc From linhvuc";
							if(isset($_GET['tu-khoa-tim-kiem-linh-vuc'])){
						?>
						<div class="flex">
							<h4>Kết quả tìm kiếm cho '<?php echo $_GET['tu-khoa-tim-kiem-linh-vuc'] ?>'</h4>
							<a class="a" href="quan-ly-du-lieu.php"><h4>Quay lại</h4></a>
						</div>
						<?php
								$where = " Where TenLinhVuc Like '%".$_GET['tu-khoa-tim-kiem-linh-vuc']."%'";
								$sqlMaLinhVuc .= $where;
								$sqlTenLinhVuc .= $where;
							}
							$orderBy3 = " Order By TenLinhVuc ASC";
							$sqlMaLinhVuc .= $orderBy3;
							$sqlTenLinhVuc .= $orderBy3;
							$dsMaLinhVuc = dsThongTinBoSung($conn, $sqlMaLinhVuc, "MaLinhVuc");
							$dsTenLinhVuc = dsThongTinBoSung($conn, $sqlTenLinhVuc, "TenLinhVuc");
						?>
						<table class="table table-striped">
							<tr>
								<th>Id</th>
								<th>Tên lĩnh vực</th>
								<th></th>
								<th></th>
							</tr>
							<?php
								for ($i=0; $i < count($dsMaLinhVuc); $i++) { 
							?>

							<tr>
								<td><?php echo $dsMaLinhVuc[$i] ?></td>
								<td><?php echo $dsTenLinhVuc[$i] ?></td>
								<?php if($dsTenLinhVuc[$i] != 'Phát triển phần mềm'){ ?>
								<td><button class="button button-reset" onclick="moCuaSo('cua-so-sua-linh-vuc', 'nen-cua-so-sua-linh-vuc');loadSuaDuLieu('sua-linh-vuc', '<?php echo $dsMaLinhVuc[$i] ?>', 'cua-so-sua-linh-vuc');">Sửa</button></td>
								<td><button class="button button-delete" onclick="xoaDuLieu('xoa-linh-vuc', '<?php echo $dsMaLinhVuc[$i] ?>')">Xóa</button></td>
								<?php }else echo '<td></td><td></td>' ?>
							</tr>

							<?php
								}
							?>
						</table>
					</div>

				<!-- Them -->
					<div class="cua-so cua-so-nho padding" id="cua-so-them-linh-vuc">
						<form>
							<h3>Thêm lĩnh vực</h3>
							<h5>Tên lĩnh vực:</h5>
							<input class="input width-100" type="text" name="" id="them-linh-vuc">
							<h5 class="color-delete" id="message-them-linh-vuc"></h5>
							<br>
							<button class="button button-create" type="button" onclick="validateDuLieu1('', '', 'them-linh-vuc', 'message-them-linh-vuc', 'cua-so-them-linh-vuc', 'nen-cua-so-them-linh-vuc')">Lưu</button>
							<button class="button button-reset" type="reset">Đặt lại</button>
						</form>
					</div>
					<div class="nen-cua-so" id="nen-cua-so-them-linh-vuc" onclick="dongCuaSo('cua-so-them-linh-vuc', 'nen-cua-so-them-linh-vuc')">
						
					</div>

				<!-- Sua -->
					<div class="cua-so cua-so-nho padding" id="cua-so-sua-linh-vuc">
						
					</div>
					<div class="nen-cua-so" id="nen-cua-so-sua-linh-vuc" onclick="dongCuaSo('cua-so-sua-linh-vuc', 'nen-cua-so-sua-linh-vuc')">
						
					</div>
				</div>

			<!-- Kinh nghiem -->
				<div class="quan-ly quan-ly-kinh-nghiem margin padding box-shadow border-radius">
					<div class="flex-between">
						<h3>Quản lý kinh nghiệm</h3>
						<button class="button button-create" onclick="moCuaSo('cua-so-them-kinh-nghiem', 'nen-cua-so-them-kinh-nghiem')">Thêm</button>
					</div>

				<!-- Tim kiem -->
					<form class="flex-between margin" method="get" action="quan-ly-du-lieu.php">
						<input class="input width-100" type="text" name="tu-khoa-tim-kiem-kinh-nghiem">
						<button class="button button-create"><span class="material-symbols-outlined icon1">search</span></button>
					</form>

				<!-- Loc -->
					<div>
						<label><h5>Sắp xếp</h5></label>
						<select class="select" id="loc-kinh-nghiem" onchange="loc('loc-kinh-nghiem', 'ds-kinh-nghiem', '<?php if(isset($_GET['tu-khoa-tim-kiem-kinh-nghiem'])) echo $_GET['tu-khoa-tim-kiem-kinh-nghiem'] ?>')">
							<option value="A-Z">A-Z</option>
							<option value="Z-A">Z-A</option>
						</select>
					</div>

				<!-- DS -->
					<div id="ds-kinh-nghiem">
						<?php
							$sqlMaKinhNghiem = "Select MaKinhNghiem From kinhnghiem";
							$sqlTenKinhNghiem = "Select TenKinhNghiem From kinhnghiem";
							if(isset($_GET['tu-khoa-tim-kiem-kinh-nghiem'])){
						?>
						<div class="flex">
							<h4>Kết quả tìm kiếm cho '<?php echo $_GET['tu-khoa-tim-kiem-kinh-nghiem'] ?>'</h4>
							<a class="a" href="quan-ly-du-lieu.php"><h4>Quay lại</h4></a>
						</div>
						<?php
								$where = " Where TenKinhNghiem Like '%".$_GET['tu-khoa-tim-kiem-kinh-nghiem']."%'";
								$sqlMaKinhNghiem .= $where;
								$sqlTenKinhNghiem .= $where;
							}
							$orderBy4 = " Order By TenKinhNghiem ASC";
							$sqlMaKinhNghiem .= $orderBy4;
							$sqlTenKinhNghiem .= $orderBy4;
							$dsMaKinhNghiem = dsThongTinBoSung($conn, $sqlMaKinhNghiem, "MaKinhNghiem");
							$dsTenKinhNghiem = dsThongTinBoSung($conn, $sqlTenKinhNghiem, "TenKinhNghiem");
						?>
						<table class="table table-striped">
							<tr>
								<th>Id</th>
								<th>Tên kinh nghiệm</th>
								<th></th>
								<th></th>
							</tr>
							<?php
								for ($i=0; $i < count($dsMaKinhNghiem); $i++) { 
							?>

							<tr>
								<td><?php echo $dsMaKinhNghiem[$i] ?></td>
								<td><?php echo $dsTenKinhNghiem[$i] ?></td>
								<?php if($dsTenKinhNghiem[$i] != 'Dưới 1 năm'){ ?>
								<td><button class="button button-reset" onclick="moCuaSo('cua-so-sua-kinh-nghiem', 'nen-cua-so-sua-kinh-nghiem');loadSuaDuLieu('sua-kinh-nghiem', '<?php echo $dsMaKinhNghiem[$i] ?>', 'cua-so-sua-kinh-nghiem');">Sửa</button></td>
								<td><button class="button button-delete" onclick="xoaDuLieu('xoa-kinh-nghiem', '<?php echo $dsMaKinhNghiem[$i] ?>')">Xóa</button></td>
								<?php }else echo '<td></td><td></td>' ?>
							</tr>

							<?php
								}
							?>
						</table>
					</div>

				<!-- Them -->
					<div class="cua-so cua-so-nho padding" id="cua-so-them-kinh-nghiem">
						<form>
							<h3>Thêm kinh nghiệm</h3>
							<h5>Tên kinh nghiệm:</h5>
							<input class="input width-100" type="text" name="" id="them-kinh-nghiem">
							<h5 class="color-delete" id="message-them-kinh-nghiem"></h5>
							<br>
							<button class="button button-create" type="button" onclick="validateDuLieu1('', '', 'them-kinh-nghiem', 'message-them-kinh-nghiem', 'cua-so-them-kinh-nghiem', 'nen-cua-so-them-kinh-nghiem')">Lưu</button>
							<button class="button button-reset" type="reset">Đặt lại</button>
						</form>
					</div>
					<div class="nen-cua-so" id="nen-cua-so-them-kinh-nghiem" onclick="dongCuaSo('cua-so-them-kinh-nghiem', 'nen-cua-so-them-kinh-nghiem')">
						
					</div>

				<!-- Sua -->
					<div class="cua-so cua-so-nho padding" id="cua-so-sua-kinh-nghiem">
						
					</div>
					<div class="nen-cua-so" id="nen-cua-so-sua-kinh-nghiem" onclick="dongCuaSo('cua-so-sua-kinh-nghiem', 'nen-cua-so-sua-kinh-nghiem')">
						
					</div>
				</div>

			<!-- Lien ket Internet -->
				<div class="quan-ly quan-ly-lien-ket-internet padding margin box-shadow border-radius">
					<div class="flex-between">
						<h3>Quản lý liên kết Internet</h3>
						<button class="button button-create" onclick="moCuaSo('cua-so-them-lien-ket-internet', 'nen-cua-so-them-lien-ket-internet')">Thêm</button>
					</div>

				<!-- Tim kiem -->
					<form class="flex-between margin" method="get" action="quan-ly-du-lieu.php">
						<input class="input width-100" type="text" name="tu-khoa-tim-kiem-lien-ket-internet">
						<button class="button button-create"><span class="material-symbols-outlined icon1">search</span></button>
					</form>

				<!-- Loc -->
					<div>
						<label><h5>Sắp xếp</h5></label>
						<select class="select" id="loc-lien-ket" onchange="loc('loc-lien-ket', 'ds-lien-ket', '<?php if(isset($_GET['tu-khoa-tim-kiem-lien-ket-internet'])) echo $_GET['tu-khoa-tim-kiem-lien-ket-internet'] ?>')">
							<option value="lien-ket-AZ">A-Z</option>
							<option value="lien-ket-ZA">Z-A</option>
						</select>
					</div>

				<!-- DS -->
					<div id="ds-lien-ket">
						<?php
							$sqlMaLienKetInternet = "Select MaLienKetInternet From lienketinternet";
							$sqlTenLienKetInternet = "Select TenLienKetInternet From lienketinternet";
							$sqlBieuTuongLienKetInternet = "Select BieuTuongLienKetInternet From lienketinternet";
							if(isset($_GET['tu-khoa-tim-kiem-lien-ket-internet'])){
						?>
						<div class="flex">
							<h4>Kết quả tìm kiếm cho '<?php echo $_GET['tu-khoa-tim-kiem-lien-ket-internet'] ?>'</h4>
							<a class="a" href="quan-ly-du-lieu.php"><h4>Quay lại</h4></a>
						</div>
						<?php
								$where = " Where TenLienKetInternet Like '%".$_GET['tu-khoa-tim-kiem-lien-ket-internet']."%'";
								$sqlMaLienKetInternet .= $where;
								$sqlTenLienKetInternet .= $where;
								$sqlBieuTuongLienKetInternet .= $where;
							}
							$orderBy5 = " Order By TenLienKetInternet ASC";
							$sqlMaLienKetInternet .= $orderBy5;
							$sqlTenLienKetInternet .= $orderBy5;
							$sqlBieuTuongLienKetInternet .= $orderBy5;
							$dsMaLienKetInternet = dsThongTinBoSung($conn, $sqlMaLienKetInternet, "MaLienKetInternet");
							$dsTenLienKetInternet = dsThongTinBoSung($conn, $sqlTenLienKetInternet, "TenLienKetInternet");
							$dsBieuTuongLienKetInternet = dsThongTinBoSung($conn, $sqlBieuTuongLienKetInternet, "BieuTuongLienKetInternet");
						?>
						<table class="table table-striped">
							<tr>
								<th>Id</th>
								<th>Tên liên kết</th>
								<th>Biểu tượng</th>
								<th></th>
								<th></th>
							</tr>
							<?php
								for ($i=0; $i < count($dsMaLienKetInternet); $i++) { 
							?>

							<tr>
								<td><?php echo $dsMaLienKetInternet[$i] ?></td>
								<td><?php echo $dsTenLienKetInternet[$i] ?></td>
								<td><?php echo $dsBieuTuongLienKetInternet[$i] ?></td>
								<?php if($dsTenLienKetInternet[$i] != 'Facebook'){ ?>
								<td><button class="button button-reset" onclick="moCuaSo('cua-so-sua-lien-ket-internet', 'nen-cua-so-sua-lien-ket-internet');loadSuaDuLieu('sua-lien-ket', '<?php echo $dsMaLienKetInternet[$i] ?>', 'cua-so-sua-lien-ket-internet');">Sửa</button></td>
								<td><button class="button button-delete" onclick="xoaDuLieu('xoa-lien-ket', '<?php echo $dsMaLienKetInternet[$i] ?>')">Xóa</button></td>
								<?php }else echo '<td></td><td></td>' ?>
							</tr>

							<?php
								}
							?>
						</table>
					</div>

				<!-- Them -->
					<div class="cua-so cua-so-nho padding" id="cua-so-them-lien-ket-internet">
						<form>
							<h3>Thêm liên kết Internet</h3>
							<h5>Tên liên kết Internet:</h5>
							<input class="input width-100" type="text" name="" id="them-ten-lien-ket-internet">
							<h5 class="color-delete" id="message-them-ten-lien-ket-internet"></h5>
							<h5>Biểu tượng liên kết Internet:</h5>
							<input class="input width-100" type="text" name="" id="them-bieu-tuong-lien-ket-internet">
							<h5 class="color-delete" id="message-them-bieu-tuong-lien-ket-internet"></h5>
							<br>
							<button class="button button-create" type="button" onclick="validateDuLieu2('', '', 'them-ten-lien-ket-internet', 'them-bieu-tuong-lien-ket-internet', 'message-them-ten-lien-ket-internet', 'message-them-bieu-tuong-lien-ket-internet', 'cua-so-them-lien-ket-internet', 'nen-cua-so-them-lien-ket-internet')">Lưu</button>
							<button class="button button-reset" type="reset">Đặt lại</button>
						</form>
					</div>
					<div class="nen-cua-so" id="nen-cua-so-them-lien-ket-internet" onclick="dongCuaSo('cua-so-them-lien-ket-internet', 'nen-cua-so-them-lien-ket-internet')">
						
					</div>

				<!-- Sua -->
					<div class="cua-so cua-so-nho padding" id="cua-so-sua-lien-ket-internet">
						
					</div>
					<div class="nen-cua-so" id="nen-cua-so-sua-lien-ket-internet" onclick="dongCuaSo('cua-so-sua-lien-ket-internet', 'nen-cua-so-sua-lien-ket-internet')">
						
					</div>
				</div>
			</div>
		<?php } ?>

		</div>
	</div>
</body>
</html>