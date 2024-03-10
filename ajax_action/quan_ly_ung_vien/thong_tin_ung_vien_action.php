<?php
	include('../../database/db.php');
	session_start();

	$sql = "Select * From ungvien Where Email='".$_SESSION['emailDangNhap']."'";
		$ungVien = mysqli_query($conn, $sql);

	if($ungVien->num_rows > 0){
		while($row = $ungVien->fetch_assoc()){
			$tenUngVien = $row['TenUngVien'];
			$ngaySinh = $row['NgaySinhUngVien'];;
			$sdt = $row['SDTUngVien'];
			$diaChi = $row['DiaChiUngVien'];
			$moTa = $row['MoTaUngVien'];
			$maKinhNghiem= $row['MaKinhNghiem'];
			$maHocVan = $row['MaHocVan'];
		}
	}
	
	if(isset($_SESSION['maUngVien'])){
		require "../../inc/quan-ly-tai-khoan/quan-ly-thong-tin-ca-nhan.php";
	}else{
		require "../../inc/quan-ly-tai-khoan/them-moi-thong-tin-ca-nhan.php";
	}
?>