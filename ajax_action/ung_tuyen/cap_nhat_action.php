<?php
	session_start();
	include('../../database/db.php');

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		echo '<pre>';
		print_r($_FILES);
		echo '</pre>';
		//Tao folder chua file
		$target_dir = "../../cv/";
		//Tao duong dan
		$target_file = $target_dir.basename($_FILES['file']['name']);
		//Kiem tra dieu kien upload
		if(empty($error)){
			if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
				echo 'upload thanh cong';
				$result = $conn->query("Update ungtuyenvieclam Set TenFileCV='".$_POST['ten-file-cv']."' Where MaUngVien='".$_SESSION['maUngVien']."' and MaViecLam='".$_POST['ma-viec-lam']."'");
				echo "Update ungtuyenvieclam Set TenFileCV='".$_POST['ten-file-cv']."' Where MaUngVien='".$_SESSION['maUngVien']."' and MaViecLam='".$_POST['ma-viec-lam']."'";
				if($_POST['ten-file-cv-cu'] != '')
					$status = unlink('../../cv/'.$_POST['ten-file-cv-cu']);
			}
			else
				echo 'upload that bai';
		}

		$result = $conn->query("Update ungtuyenvieclam Set ChuThichUngTuyenViecLam='".$_POST['chu-thich']."' Where MaUngVien='".$_SESSION['maUngVien']."' and MaViecLam='".$_POST['ma-viec-lam']."'");

		header('Location: ../../quan-ly-thong-tin-ung-vien/quan-ly-ung-tuyen.php');
	}
?>