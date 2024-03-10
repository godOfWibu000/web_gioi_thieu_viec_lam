<?php
	session_start();
	include('../../database/db.php');
	if(isset($_SESSION['maUngVien']) && isset($_POST['ma-viec-lam'])){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			echo '<pre>';
			print_r($_FILES);
			echo '</pre>';
			//Tao folder chua file
			$target_dir = "../cv/";
			//Tao duong dan
			$target_file = $target_dir.basename($_FILES['file']['name']);
			//Kiem tra dieu kien upload
			if(empty($error)){
				if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file))
					echo 'upload thanh cong';
				else
					echo 'upload that bai';
			}
		}

		$sql = "Insert Into ungtuyenvieclam(MaUngVien, MaViecLam, ChuThichUngTuyenViecLam, TenFileCV, ThoiGianUngVienUngTuyen) Values('".$_SESSION['maUngVien']."', '".$_POST['ma-viec-lam']."', '".$_POST['chu-thich-ung-tuyen']."', '".$_POST['ten-file-cv']."', '".$_POST['thoi-gian-ung-tuyen']."')";
		$result1 = $conn->query($sql);

		$soLuongUngTuyen = getSingleData($conn, "Select SoLuongUngTuyen From vieclam Where MaViecLam='".$_POST['ma-viec-lam']."'", "SoLuongUngTuyen");
		$soLuongUngTuyen++;
		$result2 = $conn->query("Update vieclam Set SoLuongUngTuyen=".$soLuongUngTuyen." Where MaViecLam='".$_POST['ma-viec-lam']."'");

		header("Location: ../../thong-bao-da-ung-tuyen.php");
	}
?>