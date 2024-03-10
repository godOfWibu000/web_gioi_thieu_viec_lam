<?php
	include('../../database/db.php');
	session_start();
// Them hoc van
	if(isset($_POST['tenHocVan'])){
		$kiemTra = mysqli_query($conn, "Select * From hocvan Where TenHocVan='".$_POST['tenHocVan']."'");
		if($kiemTra->num_rows>0){
			echo 'Bị trùng';
		}else{
			$id = 'HV' . random_int(1111, 9999);
			$kiemTraId = mysqli_query($conn, "Select * From hocvan Where MaHocVan='".$id."'");
			while($kiemTraId->num_rows>0){
				$id = 'HV' . random_int(1111, 9999);
				$kiemTraId = mysqli_query($conn, "Select * From hocvan Where MaHocVan='".$id."'");
			}
			$sql = "Insert Into hocvan(MaHocVan, TenHocVan) Values('".$id."', '".$_POST['tenHocVan']."')";
			$result = $conn -> query($sql);
		}
	}

// Them khu vuc
	if(isset($_POST['tenKhuVuc'])){
		$kiemTra = mysqli_query($conn, "Select * From khuvuc Where TenKhuVuc='".$_POST['tenKhuVuc']."'");
		if($kiemTra->num_rows>0){
			echo 'Bị trùng';
		}else{
			$id = 'KV' . random_int(1111, 9999);
			$kiemTraId = mysqli_query($conn, "Select * From khuvuc Where MaKhuVuc='".$id."'");
			while($kiemTraId->num_rows>0){
				$id = 'KV' . random_int(1111, 9999);
				$kiemTraId = mysqli_query($conn, "Select * From khuvuc Where MaKhuVuc='".$id."'");
			}
			$sql = "Insert Into khuvuc(MaKhuVuc, TenKhuVuc) Values('".$id."', '".$_POST['tenKhuVuc']."')";
			$result = $conn -> query($sql);
		}
	}

// Them linh vuc
	if(isset($_POST['tenLinhVuc'])){
		$kiemTra = mysqli_query($conn, "Select * From linhvuc Where TenLinhVuc='".$_POST['tenLinhVuc']."'");
		if($kiemTra->num_rows>0){
			echo 'Bị trùng';
		}else{
			$id = 'LV' . random_int(1111, 9999);
			$kiemTraId = mysqli_query($conn, "Select * From linhvuc Where MaLinhVuc='".$id."'");
			while($kiemTraId->num_rows>0){
				$id = 'LV' . random_int(1111, 9999);
				$kiemTraId = mysqli_query($conn, "Select * From linhvuc Where MaLinhVuc='".$id."'");
			}
			$sql = "Insert Into linhvuc(MaLinhVuc, TenLinhVuc) Values('".$id."', '".$_POST['tenLinhVuc']."')";
			$result = $conn -> query($sql);
		}
	}

// Them kinh nghiem
	if(isset($_POST['tenKinhNghiem'])){
		$kiemTra = mysqli_query($conn, "Select * From kinhnghiem Where TenKinhNghiem='".$_POST['tenKinhNghiem']."'");
		if($kiemTra->num_rows>0){
			echo 'Bị trùng';
		}else{
			$id = 'KN' . random_int(1111, 9999);
			$kiemTraId = mysqli_query($conn, "Select * From kinhnghiem Where MaKinhNghiem='".$id."'");
			while($kiemTraId->num_rows>0){
				$id = 'KN' . random_int(1111, 9999);
				$kiemTraId = mysqli_query($conn, "Select * From kinhnghiem Where MaKinhNghiem='".$id."'");
			}
			$sql = "Insert Into kinhnghiem(MaKinhNghiem, TenKinhNghiem) Values ('".$id."', '".$_POST['tenKinhNghiem']."')";
			$result = $conn -> query($sql);
		}
	}

// Them lien ket
	if(isset($_POST['tenLienKet']) && isset($_POST['bieuTuongLienKet'])){
		$kiemTra = mysqli_query($conn, "Select * From lienketinternet Where TenLienKetInternet='".$_POST['tenLienKet']."'");
		if($kiemTra->num_rows>0){
			echo 'Bị trùng';
		}else{
			$id = 'LKI' . random_int(1111, 9999);
			$kiemTraId = mysqli_query($conn, "Select * From lienketinternet Where MaLienKetInternet='".$id."'");
			while($kiemTraId->num_rows>0){
				$id = 'LKI' . random_int(1111, 9999);
				$kiemTraId = mysqli_query($conn, "Select * From lienketinternet Where MaLienKetInternet='".$id."'");
			}
			$sql = "Insert Into lienketinternet(MaLienKetInternet, TenLienKetInternet, BieuTuongLienKetInternet) Values('".$id."', '".$_POST['tenLienKet']."', '".$_POST['bieuTuongLienKet']."')";
			$result = $conn -> query($sql);
		}
	}
?>