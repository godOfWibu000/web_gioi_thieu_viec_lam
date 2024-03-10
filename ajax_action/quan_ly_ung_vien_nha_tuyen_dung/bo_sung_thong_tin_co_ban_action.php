<?php
	include('../../database/db.php');
	session_start();
// Dang ky tai khoan
	if(isset($_POST['email'])){
		$taiKhoan = mysqli_query($conn, "Select * From taikhoan Where Email='".$_POST['email']."'");
		if($taiKhoan->num_rows>0)
			echo 'Email này đã tồn tại, vui lòng nhập email khác!';
		else{
			$sql = "Insert Into taikhoan(Email, MatKhau, LoaiTaiKhoan) Values('".$_POST['email']."', '".$_POST['matKhau']."', '".$_POST['loaiTaiKhoan']."')";
			$result = $conn -> query($sql);
		}
	}

// Them ung vien
	if(isset($_POST['tenUngVien']))
	{
		$maUngVien = 'UV' . random_int(111111, 999999);
		$sql = null;
		$maHV = 'null';
		$maKN = 'null';
		if($_POST['idHV'] != 'Lựa chọn')
			$maHV = '\'' . $_POST['idHV'] . '\'';
		if($_POST['idKN'] != 'Lựa chọn')
			$maKN = '\'' . $_POST['idKN'] . '\'';
		$sql = "INSERT INTO ungvien(MaUngVien, Email, TenUngVien, NgaySinhUngVien, SDTUngVien, DiaChiUngVien, MoTaUngVien, MaHocVan, MaKinhNghiem) VALUES ('$maUngVien', '".$_SESSION['emailDangNhap']."', '".$_POST['tenUngVien']."', '".$_POST['ngaySinh']."', '".$_POST['sdt']."', '".$_POST['diaChi']."', '".$_POST['moTa']."',".$maHV.", ".$maKN.")";
		
		$result = $conn -> query($sql);
		$_SESSION['maUngVien'] = $maUngVien;
		$_SESSION['tenUngVien'] = $_POST['tenUngVien'];
	}

// Them nha tuyen dung
	if(isset($_POST['tenNhaTuyenDung'])){
		$maNTD = 'NTD' . random_int(1111111, 9999999);
		$sql = "Insert Into nhatuyendung(MaNhaTuyenDung, Email, TenNhaTuyenDung, SDTNhaTuyenDung, DiaChiNhaTuyenDung, MoTaNhaTuyenDung) Values ('".$maNTD."', '".$_SESSION['emailDangNhap']."', '".$_POST['tenNhaTuyenDung']."', '".$_POST['sdt']."', '".$_POST['diaChi']."', '".$_POST['moTa']."')";
		$result = $conn -> query($sql);
		$_SESSION['maNhaTuyenDung'] = $maNTD;
	}
?>