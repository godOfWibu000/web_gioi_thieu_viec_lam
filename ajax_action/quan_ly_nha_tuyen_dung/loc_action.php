<?php
	session_start();
	include('../../database/db.php');

	$sql = null;
?>

<!-- Loc viec lam -->
<?php
	if(isset($_POST['locVL'])){
		if($_POST['locVL'] == 'Trạng thái mở-Mới hơn'){
			$sql = "Select * From vieclam inner join khuvuc on vieclam.MaKhuVuc=khuvuc.MaKhuVuc inner join kinhnghiem on vieclam.MaKinhNghiem=kinhnghiem.MaKinhNghiem inner join linhvuc on vieclam.MaLinhVuc=linhvuc.MaLinhVuc inner join hocvan on vieclam.MaHocVan=hocvan.MaHocVan Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and TrangThaiViecLam=1";
			if(isset($_POST['tuKhoa'])){
				$sql .= " and TenViecLam Like '%".$_POST['tuKhoa']."%'"; 
			}
			$sql .= " Order By ThoiGianUngTuyen DESC";
		}
		if($_POST['locVL'] == 'Trạng thái mở-Cũ hơn'){
			$sql = "Select * From vieclam inner join khuvuc on vieclam.MaKhuVuc=khuvuc.MaKhuVuc inner join kinhnghiem on vieclam.MaKinhNghiem=kinhnghiem.MaKinhNghiem inner join linhvuc on vieclam.MaLinhVuc=linhvuc.MaLinhVuc inner join hocvan on vieclam.MaHocVan=hocvan.MaHocVan Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and TrangThaiViecLam=1";
			if(isset($_POST['tuKhoa'])){
				$sql .= " and TenViecLam Like '%".$_POST['tuKhoa']."%'"; 
			}
			$sql .= " Order By ThoiGianUngTuyen ASC"; 
		}
		if($_POST['locVL'] == 'Trạng thái đóng-Mới hơn'){
			$sql = "Select * From vieclam inner join khuvuc on vieclam.MaKhuVuc=khuvuc.MaKhuVuc inner join kinhnghiem on vieclam.MaKinhNghiem=kinhnghiem.MaKinhNghiem inner join linhvuc on vieclam.MaLinhVuc=linhvuc.MaLinhVuc inner join hocvan on vieclam.MaHocVan=hocvan.MaHocVan Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and TrangThaiViecLam=0";
			if(isset($_POST['tuKhoa'])){
				$sql .= " and TenViecLam Like '%".$_POST['tuKhoa']."%'"; 
			}
			$sql .= " Order By ThoiGianUngTuyen DESC";
		}
		if($_POST['locVL'] == 'Trạng thái đóng-Cũ hơn'){
			$sql = "Select * From vieclam inner join khuvuc on vieclam.MaKhuVuc=khuvuc.MaKhuVuc inner join kinhnghiem on vieclam.MaKinhNghiem=kinhnghiem.MaKinhNghiem inner join linhvuc on vieclam.MaLinhVuc=linhvuc.MaLinhVuc inner join hocvan on vieclam.MaHocVan=hocvan.MaHocVan Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and TrangThaiViecLam=0";
			if(isset($_POST['tuKhoa'])){
				$sql .= " and TenViecLam Like '%".$_POST['tuKhoa']."%'"; 
			}
			$sql .= " Order By ThoiGianUngTuyen ASC";
		}

		if(!isset($_GET['trang']))
			$sql .= ' Limit 0,3';
		else{
			if($_GET['trang'] == 1)
				$sql .= ' Limit 0,3';
			else
				$sql .= ' Limit ' . (($_GET['trang']-1)*3) . ',3';
		}
?>

<table class="table">
	<tr>
		<th><h5><b>Id</b></h5></th>
		<th><h5><b>Tên việc làm</b><b></h5></th>
		<th><h5><b>Thời gian đăng</b></h5></th>
		<th></th>
	</tr>

<?php

		$result = mysqli_query($conn, $sql);
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
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
	}
?>
</table>

<!-- Loc ho so -->
<?php
	if(isset($_POST['locUngTuyen'])){
		if($_POST['maViecLam'] == ''){
			if($_POST['locUngTuyen'] == 'Tất cả-Mới hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."'";
				if(isset($_POST['tuKhoa']))
					$sql .= " and (ungvien.TenUngVien Like '%".$_POST['tuKhoa']."%' or vieclam.TenViecLam Like '%".$_POST['tuKhoa']."%')";
				$sql .= " Order By ThoiGianUngVienUngTuyen DESC";
			}
			if($_POST['locUngTuyen'] == 'Chờ xét duyệt-Mới hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and TrangThaiUngTuyen='Chờ xét duyệt'";
				if(isset($_POST['tuKhoa']))
					$sql .= " and (ungvien.TenUngVien Like '%".$_POST['tuKhoa']."%' or vieclam.TenViecLam Like '%".$_POST['tuKhoa']."%')";
				$sql .= " Order By ThoiGianUngVienUngTuyen DESC";
			}
			if($_POST['locUngTuyen'] == 'Đã chấp nhận-Mới hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and TrangThaiUngTuyen='Đã chấp nhận'";
				if(isset($_POST['tuKhoa']))
					$sql .= " and (ungvien.TenUngVien Like '%".$_POST['tuKhoa']."%' or vieclam.TenViecLam Like '%".$_POST['tuKhoa']."%')";
				$sql .= " Order By ThoiGianUngVienUngTuyen DESC";
			}
			if($_POST['locUngTuyen'] == 'Đã từ chối-Mới hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and TrangThaiUngTuyen='Đã từ chối'";
				if(isset($_POST['tuKhoa']))
					$sql .= " and (ungvien.TenUngVien Like '%".$_POST['tuKhoa']."%' or vieclam.TenViecLam Like '%".$_POST['tuKhoa']."%')";
				$sql .= " Order By ThoiGianUngVienUngTuyen DESC";
			}
			if($_POST['locUngTuyen'] == 'Đã hoàn thành-Mới hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and TrangThaiUngTuyen='Đã hoàn thành'";
				if(isset($_POST['tuKhoa']))
					$sql .= " and (ungvien.TenUngVien Like '%".$_POST['tuKhoa']."%' or vieclam.TenViecLam Like '%".$_POST['tuKhoa']."%')";
				$sql .= " Order By ThoiGianUngVienUngTuyen DESC";
			}
			if($_POST['locUngTuyen'] == 'Tất cả-Cũ hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' Order By ThoiGianUngVienUngTuyen ASC";
			}
			if($_POST['locUngTuyen'] == 'Chờ xét duyệt-Cũ hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and TrangThaiUngTuyen='Chờ xét duyệt' Order By ThoiGianUngVienUngTuyen ASC";
			}
			if($_POST['locUngTuyen'] == 'Đã chấp nhận-Cũ hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and TrangThaiUngTuyen='Đã chấp nhận' Order By ThoiGianUngVienUngTuyen ASC";
			}
			if($_POST['locUngTuyen'] == 'Đã từ chối-Cũ hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and TrangThaiUngTuyen='Đã từ chối' Order By ThoiGianUngVienUngTuyen ASC";
			}
			if($_POST['locUngTuyen'] == 'Đã hoàn thành-Cũ hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and TrangThaiUngTuyen='Đã hoàn thành' Order By ThoiGianUngVienUngTuyen ASC";
			}
		}else{
			if($_POST['locUngTuyen'] == 'Tất cả-Mới hơn' ){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where ungtuyenvieclam.MaViecLam='".$_POST['maViecLam']."'";
				if(isset($_POST['tuKhoa']))
					$sql .= " and ungvien.TenUngVien Like '%".$_POST['tuKhoa']."%'";
				$sql .= " Order By ThoiGianUngVienUngTuyen DESC";
			}
			if($_POST['locUngTuyen'] == 'Chờ xét duyệt-Mới hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and ungtuyenvieclam.MaViecLam='".$_POST['maViecLam']."' and TrangThaiUngTuyen='Chờ xét duyệt'";
				if(isset($_POST['tuKhoa']))
					$sql .= " and ungvien.TenUngVien Like '%".$_POST['tuKhoa']."%'";
				$sql .= " Order By ThoiGianUngVienUngTuyen DESC";
			}
			if($_POST['locUngTuyen'] == 'Đã chấp nhận-Mới hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and ungtuyenvieclam.MaViecLam='".$_POST['maViecLam']."' and TrangThaiUngTuyen='Đã chấp nhận'";
				if(isset($_POST['tuKhoa']))
					$sql .= " and ungvien.TenUngVien Like '%".$_POST['tuKhoa']."%'";
				$sql .= " Order By ThoiGianUngVienUngTuyen DESC";
			}
			if($_POST['locUngTuyen'] == 'Đã từ chối-Mới hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and ungtuyenvieclam.MaViecLam='".$_POST['maViecLam']."' and TrangThaiUngTuyen='Đã từ chối'";
				if(isset($_POST['tuKhoa']))
					$sql .= " and ungvien.TenUngVien Like '%".$_POST['tuKhoa']."%'";
				$sql .= " Order By ThoiGianUngVienUngTuyen DESC";
			}
			if($_POST['locUngTuyen'] == 'Đã hoàn thành-Mới hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and ungtuyenvieclam.MaViecLam='".$_POST['maViecLam']."' and TrangThaiUngTuyen='Đã hoàn thành'";
				if(isset($_POST['tuKhoa']))
					$sql .= " and 	ungvien.TenUngVien Like '%".$_POST['tuKhoa']."%'";
				$sql .= " Order By ThoiGianUngVienUngTuyen DESC";
			}
			if($_POST['locUngTuyen'] == 'Tất cả-Cũ hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where ungtuyenvieclam.MaViecLam='".$_POST['maViecLam']."'";
				if(isset($_POST['tuKhoa']))
					$sql .= " and ungvien.TenUngVien Like '%".$_POST['tuKhoa']."%'";
				$sql .= " Order By ThoiGianUngVienUngTuyen ASC";
			}
			if($_POST['locUngTuyen'] == 'Chờ xét duyệt-Cũ hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and ungtuyenvieclam.MaViecLam='".$_POST['maViecLam']."' and TrangThaiUngTuyen='Chờ xét duyệt'";
				if(isset($_POST['tuKhoa']))
					$sql .= " and ungvien.TenUngVien Like '%".$_POST['tuKhoa']."%'";
				$sql .= " Order By ThoiGianUngVienUngTuyen ASC";
			}
			if($_POST['locUngTuyen'] == 'Đã chấp nhận-Cũ hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and ungtuyenvieclam.MaViecLam='".$_POST['maViecLam']."' and TrangThaiUngTuyen='Đã chấp nhận'";
				if(isset($_POST['tuKhoa']))
					$sql .= " and ungvien.TenUngVien Like '%".$_POST['tuKhoa']."%'";
				$sql .= " Order By ThoiGianUngVienUngTuyen ASC";
			}
			if($_POST['locUngTuyen'] == 'Đã từ chối-Cũ hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and ungtuyenvieclam.MaViecLam='".$_POST['maViecLam']."' and TrangThaiUngTuyen='Đã từ chối'";
				if(isset($_POST['tuKhoa']))
					$sql .= " and ungvien.TenUngVien Like '%".$_POST['tuKhoa']."%'";
				$sql .= " Order By ThoiGianUngVienUngTuyen ASC";
			}
			if($_POST['locUngTuyen'] == 'Đã hoàn thành-Cũ hơn'){
				$sql = "SELECT * FROM ungtuyenvieclam inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and ungtuyenvieclam.MaViecLam='".$_POST['maViecLam']."' and TrangThaiUngTuyen='Đã hoàn thành'";
				if(isset($_POST['tuKhoa']))
					$sql .= " and ungvien.TenUngVien Like '%".$_POST['tuKhoa']."%'";
				$sql .= " Order By ThoiGianUngVienUngTuyen ASC";
			}
		}
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

		$result = mysqli_query($conn, $sql);
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
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

<?php
	}
?>

<!-- Loc danh gia -->
<?php
	if(isset($_POST['locDanhGia'])){
		if($_POST['locDanhGia'] == 'Mới hơn')
			getData($conn, "Select * From danhgiavieclam inner join ungvien on danhgiavieclam.MaUngVien=ungvien.MaUngVien Where MaViecLam='".$_POST['maViecLam']."' Order By ThoiGianDanhGia DESC", "../../inc/viec-lam/danh-gia-viec-lam.php");
		if($_POST['locDanhGia'] == 'Cũ hơn')
			getData($conn, "Select * From danhgiavieclam inner join ungvien on danhgiavieclam.MaUngVien=ungvien.MaUngVien Where MaViecLam='".$_POST['maViecLam']."' Order By ThoiGianDanhGia ASC", "../../inc/viec-lam/danh-gia-viec-lam.php");
	}
?>