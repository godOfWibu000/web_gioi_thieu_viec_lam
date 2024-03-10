<?php
	include('../../database/db.php');
	session_start();
	// Xoa hoc van
	if(isset($_POST['idHV'])){
		$sql = "Delete From hocvanungvien Where MaHocVanUngVien='".$_POST['idHV']."'";
		$result = $conn -> query($sql);
	}

	// Xoa linh vuc
	if(isset($_POST['idLV'])){
		if(isset($_SESSION['maUngVien'])){
			$sql = "Delete From linhvucungvien Where MaUngVien='".$_SESSION['maUngVien']."' and MaLinhVuc='".$_POST['idLV']."'";
			$result = $conn -> query($sql);
		}
		if(isset($_SESSION['maNhaTuyenDung'])){
			$sql = "Delete From linhvucnhatuyendung Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and MaLinhVuc='".$_POST['idLV']."'";
			$result = $conn -> query($sql);
		}
	}

	// Xoa kinh nghiem
	if(isset($_POST['idKN'])){
		$sql = "Delete From kinhnghiemungvien Where MaKinhNghiemUngVien='".$_POST['idKN']."'";
		$result = $conn -> query($sql);
	}

	// Xoa lien ket Internet
	if(isset($_POST['idLK'])){
		if(isset($_SESSION['maUngVien'])){
			$sql = "Delete From lienketinternetungvien Where MaUngVien='".$_SESSION['maUngVien']."' and MaLienKetInternet='".$_POST['idLK']."'";

			$result = $conn -> query($sql);
		}

		if (isset($_SESSION['maNhaTuyenDung'])) {
			$sql = "Delete From lienketinternetnhatuyendung Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."' and MaLienKetInternet='".$_POST['idLK']."'";

			$result = $conn -> query($sql);
		}
	}

	// Xoa viec lam
	if(isset($_POST['maViecLam'])){
		$sql = "Delete From vieclam Where MaViecLam='".$_POST['maViecLam']."'";
		$result = $conn -> query($sql);
	}
?>