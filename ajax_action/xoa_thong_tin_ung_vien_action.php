<?php
	include('../database/db.php');
	session_start();

	if(isset($_SESSION['maUngVien'])){
		$result2 = $conn->query("Delete From hocvanungvien Where MaUngVien='".$_SESSION['maUngVien']."'");
		$result3 = $conn->query("Delete From linhvucungvien Where MaUngVien='".$_SESSION['maUngVien']."'");
		$result4 = $conn->query("Delete From kinhnghiemungvien Where MaUngVien='".$_SESSION['maUngVien']."'");
		$result5 = $conn->query("Delete From lienketinternetungvien Where MaUngVien='".$_SESSION['maUngVien']."'");
		$result6 = $conn->query("Delete From ungtuyenvieclam Where MaUngVien='".$_SESSION['maUngVien']."'");
		$result1 = $conn->query("Delete From ungvien Where MaUngVien='".$_SESSION['maUngVien']."'");
		$_SESSION['maUngVien'] = null;
		$_SESSION["tenUngVien"] = null;
		echo 'Đã xóa thông tin ứng viên!';
	}else
		echo 'Bạn chưa thêm thông tin ứng viên!';
?>