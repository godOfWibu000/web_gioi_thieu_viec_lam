<?php
	include('../../database/db.php');
	session_start();
?>

<?php
	if(isset($_POST['locDuLieu'])){
?>
<!-- Loc du lieu -->
	<!-- Loc hoc van -->
		<?php
			if($_POST['loaiLocDuLieu'] == 'loc-hoc-van'){
				$sqlMaHocVan = "Select MaHocVan From hocvan";
				$sqlTenHocVan = "Select TenHocVan From hocvan";
				if($_POST['tuKhoa'] != ''){
		?>

		<div class="flex">
			<h4>Kết quả tìm kiếm cho '<?php echo $_POST['tuKhoa'] ?>'</h4>
			<a class="a" href="quan-ly-du-lieu.php"><h4>Quay lại</h4></a>
		</div>

		<?php
					$where = " Where TenHocVan Like '%".$_POST['tuKhoa']."%'";
					$sqlMaHocVan .= $where;
					$sqlTenHocVan .= $where;
				}
				if($_POST['locDuLieu'] == 'A-Z'){
					$orderBy = " Order By TenHocVan ASC";
					$sqlMaHocVan .= $orderBy;
					$sqlTenHocVan .= $orderBy;
				}else{
					$orderBy = " Order By TenHocVan DESC";
					$sqlMaHocVan .= $orderBy;
					$sqlTenHocVan .= $orderBy;
				}
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
				<td><button class="button button-reset" onclick="moCuaSo('cua-so-sua-hoc-van', 'nen-cua-so-sua-hoc-van');loadSuaDuLieu('sua-hoc-van', '<?php echo $dsMaHocVan[$i] ?>', 'cua-so-sua-hoc-van');">Sửa</button></td>
				<td><button class="button button-delete" onclick="xoaDuLieu('xoa-hoc-van' ,'<?php echo $dsMaHocVan[$i] ?>')">Xóa</button></td>
				<?php }else echo '<td></td><td></td>' ?>
			</tr>

			<?php
				}
			?>
		</table>

		<?php
			}
		?>

	<!-- Loc khu vuc -->
		<?php
			if($_POST['loaiLocDuLieu'] == 'loc-khu-vuc'){
				$sqlMaKhuVuc = "Select MaKhuVuc From khuvuc";
				$sqlTenKhuVuc = "Select TenKhuVuc From khuvuc";
				if($_POST['tuKhoa'] != ''){
		?>

		<div class="flex">
			<h4>Kết quả tìm kiếm cho '<?php echo $_POST['tuKhoa'] ?>'</h4>
			<a class="a" href="quan-ly-du-lieu.php"><h4>Quay lại</h4></a>
		</div>

		<?php
					$where = " Where TenKhuVuc Like '%".$_POST['tuKhoa']."%'";
					$sqlMaKhuVuc .= $where;
					$sqlTenKhuVuc .= $where;
				}
				if($_POST['locDuLieu'] == 'A-Z'){
					$orderBy = " Order By TenKhuVuc ASC";
					$sqlMaKhuVuc .= $orderBy;
					$sqlTenKhuVuc .= $orderBy;
				}else{
					$orderBy = " Order By TenKhuVuc DESC";
					$sqlMaKhuVuc .= $orderBy;
					$sqlTenKhuVuc .= $orderBy;
				}
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

		<?php
			}
		?>

	<!-- Loc linh vuc -->
		<?php
			if($_POST['loaiLocDuLieu'] == 'loc-linh-vuc'){
				$sqlMaLinhVuc = "Select MaLinhVuc From linhvuc";
				$sqlTenLinhVuc = "Select TenLinhVuc From linhvuc";
				if($_POST['tuKhoa'] != ''){
		?>

		<div class="flex">
			<h4>Kết quả tìm kiếm cho '<?php echo $_POST['tuKhoa'] ?>'</h4>
			<a class="a" href="quan-ly-du-lieu.php"><h4>Quay lại</h4></a>
		</div>

		<?php
					$where = " Where TenLinhVuc Like '%".$_POST['tuKhoa']."%'";
					$sqlMaLinhVuc .= $where;
					$sqlTenLinhVuc .= $where;
				}
				if($_POST['locDuLieu'] == 'A-Z'){
					$orderBy = " Order By TenLinhVuc ASC";
					$sqlMaLinhVuc .= $orderBy;
					$sqlTenLinhVuc .= $orderBy;
				}else{
					$orderBy = " Order By TenLinhVuc DESC";
					$sqlMaLinhVuc .= $orderBy;
					$sqlTenLinhVuc .= $orderBy;
				}
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

		<?php
			}
		?>

	<!-- Loc kinh nghiem -->
		<?php
			if($_POST['loaiLocDuLieu'] == 'loc-kinh-nghiem'){
				$sqlMaKinhNghiem = "Select MaKinhNghiem From kinhnghiem";
				$sqlTenKinhNghiem = "Select TenKinhNghiem From kinhnghiem";
				if($_POST['tuKhoa'] != ''){
		?>

		<div class="flex">
			<h4>Kết quả tìm kiếm cho '<?php echo $_POST['tuKhoa'] ?>'</h4>
			<a class="a" href="quan-ly-du-lieu.php"><h4>Quay lại</h4></a>
		</div>

		<?php
					$where = " Where TenKinhNghiem Like '%".$_POST['tuKhoa']."%'";
					$sqlMaKinhNghiem .= $where;
					$sqlTenKinhNghiem .= $where;
				}
				if($_POST['locDuLieu'] == 'A-Z'){
					$orderBy = " Order By TenKinhNghiem ASC";
					$sqlMaKinhNghiem .= $orderBy;
					$sqlTenKinhNghiem .= $orderBy;
				}else{
					$orderBy = " Order By TenKinhNghiem DESC";
					$sqlMaKinhNghiem .= $orderBy;
					$sqlTenKinhNghiem .= $orderBy;
				}
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

		<?php
			}
		?>

	<!-- Loc lien ket -->
		<?php
			if($_POST['loaiLocDuLieu'] == 'loc-lien-ket'){
				$sqlMaLienKetInternet = "Select MaLienKetInternet From lienketinternet";
				$sqlTenLienKetInternet = "Select TenLienKetInternet From lienketinternet";
				$sqlBieuTuongLienKetInternet = "Select BieuTuongLienKetInternet From lienketinternet";
				if($_POST['tuKhoa'] != ''){
		?>

		<div class="flex">
			<h4>Kết quả tìm kiếm cho '<?php echo $_POST['tuKhoa'] ?>'</h4>
			<a class="a" href="quan-ly-du-lieu.php"><h4>Quay lại</h4></a>
		</div>

		<?php
					$where = " Where TenLienKetInternet Like '%".$_POST['tuKhoa']."%'";
					$sqlMaLienKetInternet .= $where;
					$sqlTenLienKetInternet .= $where;
					$sqlBieuTuongLienKetInternet .= $where;
				}
				if($_POST['locDuLieu'] == 'A-Z'){
					$orderBy = " Order By TenKinhNghiem ASC";
					$sqlMaLienKetInternet .= $orderBy;
					$sqlTenLienKetInternet .= $orderBy;
					$sqlBieuTuongLienKetInternet .= $orderBy;
				}else{
					$orderBy = " Order By TenLienKetInternet DESC";
					$sqlMaLienKetInternet .= $orderBy;
					$sqlTenLienKetInternet .= $orderBy;
					$sqlBieuTuongLienKetInternet .= $orderBy;
				}
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

		<?php
			}
		?>

<!-- Loc ung vien -->
	<?php
		if($_POST['loaiLocDuLieu'] == 'loc-ung-vien'){
			$sqlUngVien = "Select * From ungvien";
			if($_POST['tuKhoa'] != ''){
				$sqlUngVien .= " Where TenUngVien Like '%".$_POST['tuKhoa']."%' or SDTUngVien Like '%".$_POST['tuKhoa']."%' or Email Like '%".$_POST['tuKhoa']."%' or DiaChiUngVien Like '%".$_POST['tuKhoa']."%'";
			}
			if($_POST['locDuLieu'] == 'A-Z'){
				$sqlUngVien .= " Order By TenUngVien ASC";
			}else{
				$sqlUngVien .= " Order By TenUngVien DESC";
			}
	?>

	<?php
		if(isset($_POST['tuKhoa'])){
	?>
	<div class="flex">
		<h3>Kết quả tìm kiếm cho '<?php echo $_POST['tuKhoa'] ?>'</h3>
		<a class="a" href="quan-ly-ung-vien.php"><h3>Quay lại</h3></a>
	</div>
	<?php
		}
	?>
	<table class="table table-striped">
		<tr>
		    <th>Id</th>
		    <th>Tên ứng viên</th>
		    <th>Ngày sinh</th>
		    <th>Số điện thoại</th>
		    <th>Email</th>
		    <th>Địa chỉ</th>
		    <th></th>
		    <th></th>
	    </tr>

	    <?php
	    	$dsUngVien = mysqli_query($conn, $sqlUngVien);
	    	if($dsUngVien->num_rows > 0){
	    		while($row = $dsUngVien->fetch_assoc()){
	    ?>

	    <tr>
	    	<td><?php echo $row['MaUngVien'] ?></td>
	    	<td><?php echo $row['TenUngVien'] ?></td>
	    	<td><?php echo $row['NgaySinhUngVien'] ?></td>
	    	<td><?php echo $row['SDTUngVien'] ?></td>
	    	<td><?php echo $row['Email'] ?></td>
	    	<td><?php echo $row['DiaChiUngVien'] ?></td>
	    	<td><button class="button button-create" onclick="moCuaSo('cua-so-thong-tin-ung-vien', 'nen-cua-so-thong-tin-ung-vien');moCuaSoXemUngVien('<?php echo $row['MaUngVien'] ?>')">Xem</button></td>
	    	<td><button class="button button-delete">Xóa</button></td>
	    </tr>
		<?php
	    		}
	    	}
	    ?>
	</table>

	<?php
		}
	?>

<!-- Loc nha tuyen dung -->
	<?php
		if($_POST['loaiLocDuLieu'] == 'loc-nha-tuyen-dung'){
			$sqlNhaTuyenDung = "Select * From nhatuyendung";
			if($_POST['tuKhoa'] != ''){
				$sqlNhaTuyenDung .= " Where TenNhaTuyenDung Like '%".$_POST['tuKhoa']."%' or SDTNhaTuyenDung Like '%".$_POST['tuKhoa']."%' or Email Like '%".$_POST['tuKhoa']."%' or DiaChiNhaTuyenDung Like '%".$_POST['tuKhoa']."%'";
			}
			if($_POST['locDuLieu'] == 'A-Z'){
				$sqlNhaTuyenDung .= " Order By TenNhaTuyenDung ASC";
			}else{
				$sqlNhaTuyenDung .= " Order By TenNhaTuyenDung DESC";
			}
	?>

	<?php
		if(isset($_POST['tuKhoa'])){
		?>
		<div class="flex">
			<h3>Kết quả tìm kiếm cho '<?php echo $_POST['tuKhoa'] ?>'</h3>
			<a class="a" href="quan-ly-nha-tuyen-dung.php"><h3>Quay lại</h3></a>
		</div>
		<?php
			}
		?>
		<table class="table table-striped">
			<tr>
		    	<th>Id</th>
		        <th>Tên nhà tuyển dụng</th>
		        <th>Số điện thoại</th>
		        <th>Email</th>
		        <th>Địa chỉ</th>
		        <th></th>
		        <th></th>
		    </tr>

		    <?php
		    	$dsNhaTuyenDung = mysqli_query($conn, $sqlNhaTuyenDung);
		    	if($dsNhaTuyenDung->num_rows > 0){
		    		while($row = $dsNhaTuyenDung->fetch_assoc()){
		    ?>

		    <tr>
		    	<td><?php echo $row['MaNhaTuyenDung'] ?></td>
		    	<td><?php echo $row['TenNhaTuyenDung'] ?></td>
		    	<td><?php echo $row['SDTNhaTuyenDung'] ?></td>
		    	<td><?php echo $row['Email'] ?></td>
				<td><?php echo $row['DiaChiNhaTuyenDung'] ?></td>

		    	<td><a href="thong-tin-nha-tuyen-dung.php?id=<?php echo $row['MaNhaTuyenDung'] ?>"><button class="button button-create">Xem</button></a></td>
		    	<td><button class="button button-delete">Xóa</button></td>
		    </tr>

		    <?php
		    		}
		    	}
		    ?>
		</table>

	<?php
		}
	?>
<?php
	}
?>