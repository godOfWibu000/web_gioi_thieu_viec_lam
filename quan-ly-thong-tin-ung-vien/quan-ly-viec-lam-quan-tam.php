<?php
	$title = "Quản lý thông tin ứng viên - Việc làm quan tâm";
	require "../inc/head2.php";
?>

<link rel="stylesheet" type="text/css" href="../css/ds-viec-lam.css">
<link rel="stylesheet" type="text/css" href="../css/quan-ly-tai-khoan.css">

<?php
	require "../inc/header2.php";
	require "../inc/quan-ly-ung-vien/header.php";
?>

<?php if(isset($_SESSION['emailDangNhap'])){ ?>
<div class="content padding">
	<div class="ds-vieclam margin padding box-shadow border-radius">
		<?php
			$sql = "Select * From quantam
				inner join vieclam on quantam.MaViecLam=vieclam.MaViecLam
				inner join nhatuyendung on vieclam.MaNhaTuyenDung=nhatuyendung.MaNhaTuyenDung 
				inner join khuvuc on vieclam.MaKhuVuc=khuvuc.MaKhuVuc 
				inner join kinhnghiem on vieclam.MaKinhNghiem=kinhnghiem.MaKinhNghiem 
				inner join linhvuc on vieclam.MaLinhVuc=linhvuc.MaLinhVuc 
				inner join hocvan on vieclam.MaHocVan=hocvan.MaHocVan where quantam.Email='" . $_SESSION['emailDangNhap'] . "'";
		?>

		<table class="table">
			<tr>
				<th><h5><b>Tên việc làm</b></h5></th>
				<th><h5><b>Thời gian</b></h5></th>
				<th><h5><b>Số người quan tâm</b></h5></th>
				<th></th>
				<th></th>
			</tr>
		<?php
			$result = mysqli_query($conn, $sql);
			if($result->num_rows>0){
				while($row = $result->fetch_assoc()){
		?>

			<tr>
				<td><h5><?php echo $row['TenViecLam'] ?></h5></td>
				<td><h5><?php echo $row['ThoiGianDangViecLam'] ?></h5></td>
				<td><h5><?php echo $row['SoNguoiQuanTam'] ?></h5></td>
				<td>
					<a href="../chi-tiet-viec-lam.php?id=<?php echo $row['MaViecLam'] ?>&viec-lam=<?php echo $row['TenViecLam'] ?>"><button class="button button-create">Xem</button></a>
				</td>
				<td>
					<button class="button button-delete" onclick="quanTam('<?php echo $row['MaViecLam'] ?>', '<?php echo $_SESSION['emailDangNhap'] ?>', 'Bỏ quan tâm', '../ajax_action/viec_lam/quan_tam_action.php')">Bỏ quan tâm</button>
				</td>
			</tr>

		<?php
				}
			}
		?>
		</table>
	</div>
</div>
<?php } ?>

<script src="../js/quan-ly-tai-khoan.js"></script>


<!-- Footer -->
<?php require "../inc/footer2.php" ?>