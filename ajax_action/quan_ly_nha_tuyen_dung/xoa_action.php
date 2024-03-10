<?php
	session_start();
	include('../../database/db.php');
	if(isset($_POST['maUngVien']) && isset($_POST['maViecLam'])){
		$sql = "Delete From ungtuyenvieclam Where MaUngVien='".$_POST['maUngVien']."' and MaViecLam='".$_POST['maViecLam']."'";

		$result = $conn -> query($sql);
	}
?>