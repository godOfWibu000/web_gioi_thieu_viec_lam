<?php
	include('../../database/db.php');
	session_start();

// Cap nhat thong tin ung vien
	if(isset($_POST['tenUngVien'])){
		$sql = "Update ungvien Set TenUngVien='".$_POST['tenUngVien']."', NgaySinhUngVien='".$_POST['ngaySinh']."', SDTUngVien='".$_POST['sdt']."', DiaChiUngVien='".$_POST['diaChi']."', MoTaUngVien='".$_POST['moTa']."' Where MaUngVien='".$_SESSION['maUngVien']."'";

		$result = $conn -> query($sql);
	}

// Cap nhat thong tin bo sung nha tuyen dung
	if(isset($_POST['tenNhaTuyenDung'])){
		$sql = "Update nhatuyendung Set TenNhaTuyenDung='".$_POST['tenNhaTuyenDung']."', SDTNhaTuyenDung='".$_POST['sdt']."', DiaChiNhaTuyenDung='".$_POST['diaChi']."', MoTaNhaTuyenDung='".$_POST['moTa']."' Where MaNhaTuyenDung='".$_POST['maNhaTuyenDung']."'";
		$result = $conn -> query($sql);
	}
?>