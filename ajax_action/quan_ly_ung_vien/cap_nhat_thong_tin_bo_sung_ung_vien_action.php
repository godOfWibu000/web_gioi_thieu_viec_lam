<?php
	include('../../database/db.php');
	session_start();

	if(isset($_POST['idHV'])){
		$sql = "Update ungvien set MaHocVan='".$_POST['idHV']."' Where MaUngVien='".$_SESSION['maUngVien']."'";
		$suaHocVan = $conn -> query($sql);
	}
	if(isset($_POST['idKN'])){
		$sql = "Update ungvien set MaKinhNghiem='".$_POST['idKN']."' Where MaUngVien='".$_SESSION['maUngVien']."'";
		$suaKinhNghiem = $conn -> query($sql);
	}
?>