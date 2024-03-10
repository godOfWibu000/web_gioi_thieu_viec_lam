<?php
// Khu vuc
	$dsMaKhuVuc = dsThongTinBoSung($conn, "Select MaKhuVuc From khuvuc", "MaKhuVuc");
	$dsTenKhuVuc = dsThongTinBoSung($conn, "Select TenKhuVuc From khuvuc", "TenKhuVuc");

// Hoc van
	$dsMaHocVan = dsThongTinBoSung($conn, "Select MaHocVan From hocvan", "MaHocVan");
	$dsTenHocVan = dsThongTinBoSung($conn, "Select TenHocVan From hocvan", "TenHocVan");

// Linh vuc
	$dsMaLinhVuc = dsThongTinBoSung($conn, "Select MaLinhVuc From linhvuc", "MaLinhVuc");
	$dsTenLinhVuc = dsThongTinBoSung($conn, "Select TenLinhVuc From linhvuc", "TenLinhVuc");

// Kinh nghiem
	$dsMaKinhNghiem = dsThongTinBoSung($conn, "Select MaKinhNghiem From kinhnghiem", "MaKinhNghiem");
	$dsTenKinhNghiem = dsThongTinBoSung($conn, "Select TenKinhNghiem From kinhnghiem", "TenKinhNghiem");

// Chuyen nganh
	$dsMaChuyenNganh = dsThongTinBoSung($conn, "Select MaChuyenNganh From chuyennganh", "MaChuyenNganh");
	$dsTenChuyenNganh = dsThongTinBoSung($conn, "Select TenChuyenNganh From chuyennganh", "TenChuyenNganh");

// Lien ket
	$dsMaLienKetInternet = dsThongTinBoSung($conn, "Select MaLienKetInternet From lienketinternet", "MaLienKetInternet");
	$dsTenLienKetInternet = dsThongTinBoSung($conn, "Select TenLienKetInternet From lienketinternet", "TenLienKetInternet");
	$dsBieuTuongLienKetInternet = dsThongTinBoSung($conn, "Select BieuTuongLienKetInternet From lienketinternet", "BieuTuongLienKetInternet");
?>