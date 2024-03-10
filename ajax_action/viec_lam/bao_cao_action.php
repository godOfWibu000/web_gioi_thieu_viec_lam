<?php
	session_start();
	include('../../database/db.php');

	if(isset($_POST['noi-dung'])){
		$maBaoCao = 'BC' . random_int(11111111, 99999999);
		$result = $conn->query("Insert Into baocaovieclam(MaBaoCaoViecLam, MaViecLam, Email, NoiDungBaoCao, ThoiGianBaoCao) Values('".$maBaoCao."', '".$_POST['ma-viec-lam']."', '".$_SESSION['emailDangNhap']."', '".$_POST['noi-dung']."', '".$_POST['thoi-gian']."')");
	}
?>