<?php
	include('../../database/db.php');
	session_start();

	if(isset($_POST['maViecLam'])){
		$result1 = $conn->query("Delete From ungtuyenvieclam Where MaUngVien='".$_SESSION['maUngVien']."' and MaViecLam='".$_POST['maViecLam']."'");
		$soLuongUngTuyen = getSingleData($conn, "Select SoLuongUngTuyen From vieclam Where MaViecLam='".$_POST['maViecLam']."'", "SoLuongUngTuyen");
		$soLuongUngTuyen--;
		$result2 = $conn->query("Update vieclam Set SoLuongUngTuyen=".$soLuongUngTuyen." Where MaViecLam='".$_POST['maViecLam']."'");
	}
?>