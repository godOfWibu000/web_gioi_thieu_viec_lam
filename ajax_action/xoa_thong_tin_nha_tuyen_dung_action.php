<?php
	include('../database/db.php');
	session_start();

	if(isset($_SESSION['maNhaTuyenDung'])){
		$result2 = $conn->query("Delete From linhvucnhatuyendung Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."'");
		$result3 = $conn->query("Delete From lienketinternetnhatuyendung Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."'");
		$result4 = $conn->query("Delete From lienketinternetnhatuyendung Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."'");
		$result5 = $conn->query("Delete From danhgiavieclam inner join vieclam on danhgiavieclam.MaViecLam=vieclam.MaViecLam Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."'");
		$result6 = $conn->query("Delete From baocaovieclam inner join vieclam on danhgiavieclam.MaViecLam=vieclam.MaViecLam Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."'");
		$result7 = $conn->query("Delete From quantam inner join vieclam on danhgiavieclam.MaViecLam=vieclam.MaViecLam Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."'");
		$result8 = $conn->query("Delete From ungtuyenvieclam inner join vieclam on danhgiavieclam.MaViecLam=vieclam.MaViecLam Where vieclam.MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."'");
		$result9 = $conn->query("Delete From vieclam Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."'");
		$result1 = $conn->query("Delete From nhatuyendung Where MaNhaTuyenDung='".$_SESSION['maNhaTuyenDung']."'");
		$_SESSION['maNhaTuyenDung'] = null;
		$_SESSION["tenNhaTuyenDung"] = null;
		echo 'Đã xóa thông tin ứng viên!';
	}
?>