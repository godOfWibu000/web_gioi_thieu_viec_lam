<?php
	include('../../database/db.php');
	session_start();
	$status = unlink('../../cv/'.$_POST['tenCV']);
	$result = $conn->query("Update ungtuyenvieclam Set TenFileCV=null Where MaUngVien='".$_SESSION['maUngVien']."' and MaViecLam='".$_POST['maViecLam']."'");
?>