<div class="border-radius box-shadow padding margin">
<?php
	include('../../database/db.php');
	session_start();

	$sql = "Select * From ungtuyenvieclam inner join ungvien on ungtuyenvieclam.MaUngVien=ungvien.MaUngVien inner join vieclam on ungtuyenvieclam.MaViecLam=vieclam.MaViecLam Where ungtuyenvieclam.MaUngVien='".$_SESSION['maUngVien']."'";
	$result = mysqli_query($conn, $sql);

?>

	<div>
		<table class="table">
			<tr>
		      <th>Tên việc làm</th>
		      <th>Chú thích</th>
		      <th>CV</th>
		      <th>Trạng thái</th>
		      <th></th>
		      <th></th>
		    </tr>

<?php
	if($result->num_rows>0){
		while($row = $result->fetch_assoc()){
?>
			<tr>
				<td style="width: 22%;"><h5><?php echo $row['TenViecLam'] ?></h5></td>
				<td style="width: 22%;"><h5><?php echo $row['ChuThichUngTuyenViecLam'] ?></h5></td>
				<td style="width: 22%;">
					<h5>
						<span class="material-symbols-outlined icon1">folder_open</span>

						<?php if($row['TenFileCV'] != ''){ ?>
							<div id="cv">
								<?php echo $row['TenFileCV'] ?>
								<a class="a" href="cv/<?php echo $row['TenFileCV'] ?>" target="_blank">Xem</a>
								<a href="ajax_action/download.php?fileName=<?php echo $row['TenFileCV'] ?>"><span style="font-size: 35px;" class="material-symbols-outlined icon1 color-create">download</span></a>
								<button type="button" class="button button-delete" onclick="xoaCV('<?php echo $row['TenFileCV'] ?>', '<?php echo $row['MaViecLam'] ?>')">Xóa</span>
							</div>
						<?php } ?>
					</h5>
				</td>
				<td style="width: 22%;"><h5 class="chi-muc <?php if($row['TrangThaiUngTuyen'] == 'Chờ xét duyệt') echo 'background-border2'; else if($row['TrangThaiUngTuyen'] == 'Đã chấp nhận') echo 'button-create color-button'; else if($row['TrangThaiUngTuyen'] == 'Đã từ chối') echo 'button-delete  color-button'; else echo 'background-success  color-button' ?>"><?php echo $row['TrangThaiUngTuyen'] ?></h5></td>
				<td><button class="button button-create" onclick="moCuaSo('cua-so-sua-ung-tuyen-viec-lam', 'nen-cua-so-sua-ung-tuyen-viec-lam');loadSuaHoSoUngTuyen('<?php echo $row['MaUngVien'] ?>', '<?php echo $row['MaViecLam'] ?>');">Sửa</button></td>
				<td><button class="button button-delete">Xóa</button></td>
			</tr>
<?php
		}
	}
?>
		</table>
	</div>
</div>

<div class="cua-so cua-so-nho padding" id="cua-so-sua-ung-tuyen-viec-lam">
	
</div>
<div class="nen-cua-so" id="nen-cua-so-sua-ung-tuyen-viec-lam" onclick="dongCuaSo('cua-so-sua-ung-tuyen-viec-lam', 'nen-cua-so-sua-ung-tuyen-viec-lam')">
	
</div>