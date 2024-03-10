<?php
	session_start();
	include('../database/db.php');

	if(isset($_POST['email'])){
		$email = $_POST['email'];
		$matkhau = $_POST['matKhau'];
		$taiKhoan = mysqli_query($conn, "Select * From taikhoan Where Email='$email' and MatKhau='$matkhau'");
		if($taiKhoan->num_rows > 0){
			while($row = $taiKhoan->fetch_assoc()){
				$loaiTaiKhoan = $row['LoaiTaiKhoan'];
				if($loaiTaiKhoan == 'Ứng viên'){
					$ungVien = mysqli_query($conn, "Select ungvien.MaUngVien, ungvien.TenUngVien From ungvien Where Email='$email'");
					if($ungVien->num_rows > 0){
						while($row = $ungVien->fetch_assoc()){
							$maUngVien = $row['MaUngVien'];
							$tenUngVien = $row['TenUngVien'];
						}
					}
				}else if($loaiTaiKhoan == 'Nhà tuyển dụng'){
					$nhaTuyenDung = mysqli_query($conn, "Select nhatuyendung.MaNhaTuyenDung, nhatuyendung.TenNhaTuyenDung From nhatuyendung Where Email='$email'");
					if($nhaTuyenDung->num_rows > 0){
						while($row = $nhaTuyenDung->fetch_assoc()){
							$maNhaTuyenDung = $row['MaNhaTuyenDung'];
							$tenNhaTuyenDung = $row['TenNhaTuyenDung'];
						}
					}
				}
			}
			$_SESSION['loaiTaiKhoan'] = $loaiTaiKhoan;
			$_SESSION["emailDangNhap"] = $email;
			$_SESSION["matKhau"] = $matkhau;
			if(isset($maUngVien)){
				$_SESSION["maUngVien"] = $maUngVien;
				$_SESSION["tenUngVien"] = $tenUngVien;
			}
			if(isset($maNhaTuyenDung)){
				$_SESSION["maNhaTuyenDung"] = $maNhaTuyenDung;
				$_SESSION["tenNhaTuyenDung"] = $tenNhaTuyenDung;
			}
			echo "Đăng nhập thành công!";
		}else
			echo "Thông tin đăng nhập không chính xác! Vui lòng kiểm tra lại email và mật khẩu!";
	}
?>