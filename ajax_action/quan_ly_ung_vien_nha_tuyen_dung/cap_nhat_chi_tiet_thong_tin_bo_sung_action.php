<?php
	include('../../database/db.php');
	session_start();
	if(isset($_POST['maHocVanUngVien'])){
		$sql = "Update hocvanungvien Set TenTruong='".$_POST['noiHocTap']."', MaChuyenNganh='".$_POST['idCN']."', NamBatDau='".$_POST['thoiGianBatDauHoc']."', NamKetThuc='".$_POST['thoiGianKetThucHoc']."', GPA=".$_POST['gpa']." Where MaHocVanUngVien='".$_POST['maHocVanUngVien']."'";
		
		$result = $conn -> query($sql);
	}

	if(isset($_POST['maKinhNghiemUngVien'])){
		$sql = "Update kinhnghiemungvien Set TenNoiLamViec='".$_POST['noiLamViec']."', ViTriCongViec='".$_POST['viTriCongViec']."', NgayBatDauLamViec='".$_POST['thoiGianBatDauCongViec']."', NgayKetThucCongViec='".$_POST['thoiGianKetThucCongViec']."' Where MaKinhNghiemUngVien='".$_POST['maKinhNghiemUngVien']."'";

		$result = $conn -> query($sql);
	}

	if(isset($_POST['idLK'])){
		if(isset($_SESSION['maUngVien'])){
			$sql = "Update lienketinternetungvien Set DuongDanLienKet='".$_POST['duongDanLienKet']."' Where MaUngVien='".$_SESSION['maUngVien']."' and MaLienKetInternet='".$_POST['idLK']."'";

			$result = $conn -> query($sql);
		}
		if(isset($_SESSION['maNhaTuyenDung'])){
			$sql = "Update lienketinternetnhatuyendung Set DuongDanLienKet='".$_POST['duongDanLienKet']."' Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and MaLienKetInternet='".$_POST['idLK']."'";

			$result = $conn -> query($sql);
		}
	}

	//Cap nhat thong tin viec lam
	if(isset($_POST['maViecLam'])){
		$sql = "Update vieclam Set TenViecLam='".$_POST['tenViecLam']."', MaKhuVuc='".$_POST['idKVVL']."', MaKinhNghiem='".$_POST['idKNVL']."', MaLinhVuc='".$_POST['idLVVL']."', MaHocVan='".$_POST['idHVVL']."', TienLuong=".$_POST['mucLuong'].", MoTaViecLam='".$_POST['moTa']."', ThoiGianUngTuyen='".$_POST['thoiGianBatDau']."', HanUngTuyen='".$_POST['hanUngTuyen']."', SoLuongTuyenDung=".$_POST['soLuongTuyenDung'].", TrangThaiViecLam=".$_POST['trangThai']." Where MaViecLam='".$_POST['maViecLam']."'";
		$result = $conn -> query($sql);
	}
?>