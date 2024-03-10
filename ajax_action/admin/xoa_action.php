<?php
	include('../../database/db.php');
	session_start();
?>

<!-- Xoa du lieu -->
	<?php
		if(isset($_POST['maDuLieu'])){
			if($_POST['xoa'] == 'xoa-hoc-van'){
				$result2 = $conn->query("Update vieclam Set MaHocVan='HV01' Where MaHocVan='".$_POST['maDuLieu']."'");
				$result3 = $conn->query("Update ungvien Set MaHocVan='HV01' Where MaHocVan='".$_POST['maDuLieu']."'");
				$result1 = $conn->query("Delete From hocvan Where MaHocVan='".$_POST['maDuLieu']."'");
			}
			if($_POST['xoa'] == 'xoa-khu-vuc'){
				$result2 = $conn->query("Update vieclam Set MaKhuVuc='KV01' Where MaKhuVuc='".$_POST['maDuLieu']."'");
				$result1 = $conn->query("Delete From khuvuc Where MaKhuVuc='".$_POST['maDuLieu']."'");
			}
			if($_POST['xoa'] == 'xoa-linh-vuc'){
				$result2 = $conn->query("Update vieclam Set MaLinhVuc='LV01' Where MaLinhVuc='".$_POST['maDuLieu']."'");
				$result3 = $conn->query("Delete From linhvucungvien Where MaLinhVuc='".$_POST['maDuLieu']."'");
				$result4 = $conn->query("Delete From linhvucnhatuyendung Where MaLinhVuc='".$_POST['maDuLieu']."'");
				$result1 = $conn->query("Delete From linhvuc Where MaLinhVuc='".$_POST['maDuLieu']."'");
			}
			if($_POST['xoa'] == 'xoa-kinh-nghiem'){
				$result2 = $conn->query("Update vieclam Set MaKinhNghiem='KN02' Where MaKinhNghiem='".$_POST['maDuLieu']."'");
				$result3 = $conn->query("Update ungvien Set MaKinhNghiem='KN02' Where MaKinhNghiem='".$_POST['maDuLieu']."'");
				$result1 = $conn->query("Delete From kinhnghiem Where MaKinhNghiem='".$_POST['maDuLieu']."'");
			}
			if($_POST['xoa'] == 'xoa-lien-ket'){
				$result2 = $conn->query("Delete From lienketinternetungvien Where MaLienKetInternet='".$_POST['maDuLieu']."'");
				$result3 = $conn->query("Delete From lienketinternetnhatuyendung Where MaLienKetInternet='".$_POST['maDuLieu']."'");
				$result1 = $conn->query("Delete From lienketinternet Where MaLienKetInternet='".$_POST['maDuLieu']."'");
			}
		}
	?>