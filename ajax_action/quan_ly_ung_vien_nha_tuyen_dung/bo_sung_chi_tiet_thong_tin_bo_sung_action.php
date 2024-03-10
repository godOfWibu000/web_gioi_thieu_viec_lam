<?php
	include('../../database/db.php');
	session_start();
// Them hoc van
	if(isset($_POST['noiHocTap'])){
		$maHVUV = 'HVUV' . random_int(111111, 999999);
		$gpa = 'null';
		if($_POST['gpa'] != '')
			$gpa = $_POST['gpa'];
		$sql = "INSERT INTO hocvanungvien(MaHocVanUngVien, MaUngVien, TenTruong, MaChuyenNganh, NamBatDau, NamKetThuc, GPA) VALUES ('".$maHVUV."','".$_SESSION['maUngVien']."','".trim($_POST['noiHocTap'])."','".$_POST['idCN']."',".$_POST['thoiGianBatDauHoc'].",".$_POST['thoiGianKetThucHoc'].",".$gpa.")";

		$result = $conn -> query($sql);
	}

// Them linh vuc
	if(isset($_POST['idLV'])){
		if(isset($_SESSION['maUngVien'])){
			$linhVuc = mysqli_query($conn, "Select * From linhvucungvien Where MaUngVien='".$_SESSION['maUngVien']."' and MaLinhVuc='".$_POST['idLV']."'");
			if($linhVuc->num_rows>0){
				echo 'Bạn đã thêm thông tin này rồi! Vui lòng chọn thông tin khác!';
			}else{
				$sql = "Insert Into linhvucungvien(MaUngVien,MaLinhVuc) Values('".$_SESSION['maUngVien']."', '".$_POST['idLV']."')";

				$result = $conn -> query($sql);
			}
		}
		if(isset($_SESSION['maNhaTuyenDung'])){
			$linhVuc = mysqli_query($conn, "Select * From linhvucnhatuyendung Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and MaLinhVuc='".$_POST['idLV']."'");
			if($linhVuc->num_rows>0){
				echo 'Bạn đã thêm thông tin này rồi! Vui lòng chọn thông tin khác!';
			}else{
				$sql = "Insert Into linhvucnhatuyendung(MaNhaTuyenDung,MaLinhVuc) Values('".$_SESSION['maNhaTuyenDung']."', '".$_POST['idLV']."')";

				$result = $conn -> query($sql);
			}
		}
	}

// Them noi lam viec
	if(isset($_POST['noiLamViec'])){
		$maKNUV = 'KNUV' . random_int(111111, 999999);
		$sql = "Insert Into kinhnghiemungvien(MaKinhNghiemUngVien,MaUngVien,TenNoiLamViec,ViTriCongViec,NgayBatDauLamViec,NgayKetThucCongViec) Values('".$maKNUV."', '".$_SESSION['maUngVien']."', '".$_POST['noiLamViec']."', '".$_POST['viTriCongViec']."', '".$_POST['thoiGianBatDauCongViec']."', '".$_POST['thoiGianKetThucCongViec']."')";
		$themNoiLamViec = $conn -> query($sql);
	}

// Them lien ket
	if(isset($_POST['idLK'])){
		if(isset($_SESSION['maUngVien'])){
			$lienKetInternet = mysqli_query($conn, "Select * From lienketinternetungvien Where MaUngVien='".$_SESSION['maUngVien']."' and MaLienKetInternet='".$_POST['idLK']."'");
			if($lienKetInternet->num_rows>0)
				echo 'Bạn đã thêm thông tin này rồi! Vui lòng chọn thông tin khác!';
			else{
				$sql = "Insert Into lienketinternetungvien(MaUngVien,MaLienKetInternet,DuongDanLienKet) Values('".$_SESSION['maUngVien']."', '".$_POST['idLK']."', '".$_POST['duongDanLienKet']."')";
				$result = $conn -> query($sql);
			}
		}

		if(isset($_SESSION['maNhaTuyenDung'])){
			$lienKetInternet = mysqli_query($conn, "Select * From lienketinternetnhatuyendung Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and MaLienKetInternet='".$_POST['idLK']."'");
			if($lienKetInternet->num_rows>0)
				echo 'Bạn đã thêm thông tin này rồi! Vui lòng chọn thông tin khác!';
			else{
				$sql = "Insert Into lienketinternetnhatuyendung(MaNhaTuyenDung,MaLienKetInternet,DuongDanLienKet) Values('".$_SESSION['maNhaTuyenDung']."', '".$_POST['idLK']."', '".$_POST['duongDanLienKet']."')";
				$result = $conn -> query($sql);
			}
		}
	}

// Them viec lam
	if(isset($_POST['tenViecLam'])){
		$maVL = 'VL' . random_int(11111111, 99999999);
		$sql = "INSERT INTO vieclam(MaViecLam, TenViecLam, MaNhaTuyenDung, MaKhuVuc, MaKinhNghiem, MaLinhVuc, MaHocVan, TienLuong, MoTaViecLam, ThoiGianDangViecLam, ThoiGianUngTuyen, HanUngTuyen, SoLuongTuyenDung) VALUES ('".$maVL."', '".$_POST['tenViecLam']."', '".$_SESSION['maNhaTuyenDung']."', '".$_POST['idKVVL']."', '".$_POST['idKNVL']."', '".$_POST['idLVVL']."', '".$_POST['idHVVL']."', ".$_POST['mucLuong'].", '".$_POST['moTa']."', '".$_POST['thoiGianDangViecLam']."', '".$_POST['thoiGianBatDau']."', '".$_POST['hanUngTuyen']."', ".$_POST['soLuongTuyenDung'].")";
		$result = $conn -> query($sql);
	}
?>