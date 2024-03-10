<?php
	session_start();
	include('../../database/db.php');
	if(isset($_POST['so-sao'])){
		$result1 = $conn->query("Insert Into danhgiavieclam(MaUngVien, MaViecLam, SoSaoDanhGia, BinhLuanDanhGia, ThoiGianDanhGia) Values ('".$_SESSION['maUngVien']."', '".$_POST['ma-viec-lam']."', ".$_POST['so-sao'].", '".$_POST['binh-luan']."', '".$_POST['thoi-gian']."')");
		$soSaoTBViecLam;
		$tongSoSaoViecLam = 0;
		$soDanhGia = 0;
		$dsDanhGia = mysqli_query($conn, "Select * From danhgiavieclam Where MaViecLam='".$_POST['ma-viec-lam']."'");
		if($dsDanhGia->num_rows>0){
			while($row = $dsDanhGia->fetch_assoc()){
				$tongSoSaoViecLam += $row['SoSaoDanhGia'];
				$soDanhGia++;
			}
		}
		if($soDanhGia == 1)
			$soSaoTBViecLam = $tongSoSaoViecLam;
		else
			$soSaoTBViecLam = $tongSoSaoViecLam / $soDanhGia;
		$result2 = $conn->query("Update vieclam Set SoSao=".$soSaoTBViecLam." Where MaViecLam='".$_POST['ma-viec-lam']."'");

		header('Location: ../../chi-tiet-viec-lam.php?id='.$_POST['ma-viec-lam'] . '&viec-lam='.$_POST['ten-viec-lam']);
	}
?>