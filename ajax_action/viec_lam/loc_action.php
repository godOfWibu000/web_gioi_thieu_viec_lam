<?php
	session_start();
	include('../../database/db.php');
	// Loc tim kiem
	if(isset($_POST['locTimKiem'])){
		$sql = "Select * From vieclam inner join nhatuyendung on vieclam.MaNhaTuyenDung=nhatuyendung.MaNhaTuyenDung inner join khuvuc on vieclam.MaKhuVuc=khuvuc.MaKhuVuc inner join kinhnghiem on vieclam.MaKinhNghiem=kinhnghiem.MaKinhNghiem inner join linhvuc on vieclam.MaLinhVuc=linhvuc.MaLinhVuc inner join hocvan on vieclam.MaHocVan=hocvan.MaHocVan Where vieclam.TenViecLam Like '%".$_POST['tuKhoa']."%'";
		if($_POST['locTimKiem'] == "Thời gian" && $_POST['linhVuc'] == "Tất cả" && $_POST['kinhNghiem'] == "Tất cả")
			$sql .= " Order By ThoiGianDangViecLam DESC";
		if($_POST['locTimKiem'] == "Mức độ quan tâm" && $_POST['linhVuc'] == "Tất cả" && $_POST['kinhNghiem'] == "Tất cả")
			$sql .= " Order By SoNguoiQuanTam DESC";

		if($_POST['locTimKiem'] == "Thời gian" && $_POST['linhVuc'] != "Tất cả" && $_POST['kinhNghiem'] == "Tất cả")
			$sql .= " and linhVuc.TenLinhVuc='".$_POST['linhVuc']."' Order By ThoiGianDangViecLam DESC";
		if($_POST['locTimKiem'] == "Mức độ quan tâm" && $_POST['linhVuc'] != "Tất cả" && $_POST['kinhNghiem'] == "Tất cả")
			$sql .= " and linhVuc.TenLinhVuc='".$_POST['linhVuc']."' Order By SoNguoiQuanTam DESC";

		if($_POST['locTimKiem'] == "Thời gian" && $_POST['linhVuc'] == "Tất cả" && $_POST['kinhNghiem'] != "Tất cả")
			$sql .= " and kinhnghiem.TenKinhNghiem='".$_POST['kinhNghiem']."' Order By ThoiGianDangViecLam DESC";
		if($_POST['locTimKiem'] == "Mức độ quan tâm" && $_POST['linhVuc'] == "Tất cả" && $_POST['kinhNghiem'] != "Tất cả")
			$sql .= " and kinhnghiem.TenKinhNghiem='".$_POST['kinhNghiem']."' Order By SoNguoiQuanTam DESC";

		if($_POST['locTimKiem'] == "Thời gian" && $_POST['linhVuc'] != "Tất cả" && $_POST['kinhNghiem'] != "Tất cả")
			$sql .= " and kinhnghiem.TenKinhNghiem='".$_POST['kinhNghiem']."' and linhVuc.TenLinhVuc='".$_POST['linhVuc']."' Order By ThoiGianDangViecLam DESC";
		if($_POST['locTimKiem'] == "Mức độ quan tâm" && $_POST['linhVuc'] != "Tất cả" && $_POST['kinhNghiem'] != "Tất cả")
			$sql .= " and kinhnghiem.TenKinhNghiem='".$_POST['kinhNghiem']."' and linhVuc.TenLinhVuc='".$_POST['linhVuc']."' Order By SoNguoiQuanTam DESC";

		getData($conn ,$sql, "../../inc/viec-lam/ds-viec-lam2.php");
	}
?>