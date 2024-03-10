<?php
	session_start();
	include('../../database/db.php');
	if (isset($_POST['maUngVien']) && isset($_POST['maViecLam'])) {
		$sql = "Update ungtuyenvieclam Set TrangThaiUngTuyen='".$_POST['trangThaiUngTuyen']."' Where MaUngVien='".$_POST['maUngVien']."' and MaViecLam='".$_POST['maViecLam']."'";
		$result = $conn->query($sql);
	}
?>