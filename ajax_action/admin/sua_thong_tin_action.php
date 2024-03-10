<?php
	include('../../database/db.php');
	session_start();

// Sua hoc van
	if(isset($_POST['maHocVan'])){
		$kiemTra = mysqli_query($conn, "Select * From hocvan Where TenHocVan='".$_POST['tenHocVan']."'");
		if($kiemTra->num_rows>0 && $_POST['tenHocVan'] != $_POST['tenHocVanCu']){
			echo 'Bị trùng';
		}else{
			$sql = "Update hocvan Set TenHocVan='".$_POST['tenHocVan']."' Where MaHocVan='".$_POST['maHocVan']."'";
			$result = $conn->query($sql);
		}
	}

// Sua khu vuc
	if(isset($_POST['maKhuVuc'])){
		$kiemTra = mysqli_query($conn, "Select * From khuvuc Where TenKhuVuc='".$_POST['tenKhuVuc']."'");
		if($kiemTra->num_rows>0 && $_POST['tenKhuVuc'] != $_POST['tenKhuVucCu']){
			echo 'Bị trùng';
		}else{
			$sql = "Update khuVuc Set TenKhuVuc='".$_POST['tenKhuVuc']."' Where MaKhuVuc='".$_POST['maKhuVuc']."'";
			$result = $conn->query($sql);
		}
	}

// Sua linh vuc
	if(isset($_POST['maLinhVuc'])){
		$kiemTra = mysqli_query($conn, "Select * From linhvuc Where TenLinhVuc='".$_POST['tenLinhVuc']."'");
		if($kiemTra->num_rows>0 && $_POST['tenLinhVuc'] != $_POST['tenLinhVucCu']){
			echo 'Bị trùng';
		}else{
			$sql = "Update linhvuc Set TenLinhVuc='".$_POST['tenLinhVuc']."' Where MaLinhVuc='".$_POST['maLinhVuc']."'";
			$result = $conn->query($sql);
		}
	}

// Sua kinh nghiem
	if(isset($_POST['maKinhNghiem'])){
		$kiemTra = mysqli_query($conn, "Select * From kinhnghiem Where TenKinhNghiem='".$_POST['tenKinhNghiem']."'");
		if($kiemTra->num_rows>0 && $_POST['tenKinhNghiem'] != $_POST['tenKinhNghiemCu']){
			echo 'Bị trùng';
		}else{
			$sql = "Update kinhnghiem Set TenKinhNghiem='".$_POST['tenKinhNghiem']."' Where MaKinhNghiem='".$_POST['maKinhNghiem']."'";
			$result = $conn->query($sql);
		}
	}

// Sua lien ket
		if(isset($_POST['maLienKet'])){
			$kiemTra = mysqli_query($conn, "Select * From lienketinternet Where TenLienKetInternet='".$_POST['tenLienKet']."'");
			if($kiemTra->num_rows>0 && $_POST['tenLienKet'] != $_POST['tenLienKetCu']){
				echo 'Bị trùng';
			}else{
				$sql = "Update lienketinternet Set TenLienKetInternet='".$_POST['tenLienKet']."', BieuTuongLienKetInternet='".$_POST['bieuTuongLienKet']."' Where MaLienKetInternet='".$_POST['maLienKet']."'";
				$result = $conn->query($sql);
			}
		}
?>