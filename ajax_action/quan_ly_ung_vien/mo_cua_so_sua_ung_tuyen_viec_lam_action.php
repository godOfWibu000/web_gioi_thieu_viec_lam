<?php
	session_start();
	include('../../database/db.php');
	if(isset($_POST['maUngVien']) && isset($_POST['maViecLam'])){
		$sql = "Select * From ungtuyenvieclam Where MaUngVien='".$_POST['maUngVien']."' and MaViecLam='".$_POST['maViecLam']."'";
		$result = mysqli_query($conn, $sql);
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				$maViecLam = $row['MaViecLam'];
				$chuThich = $row['ChuThichUngTuyenViecLam'];
				$cv = $row['TenFileCV'];
			}
		}
	}
?>
<h2>Cập nhật thông tin ứng tuyển việc làm:</h2>
<form action="../ajax_action/ung_tuyen/cap_nhat_action.php" method="post" enctype="multipart/form-data">
	<input type="" name="ma-viec-lam" value="<?php echo $maViecLam ?>" hidden>
	<h5>Chú thích:</h5>
	<textarea class="textarea width-100" name="chu-thich"><?php echo $chuThich ?></textarea><br>

	<h5>CV:</h5>
	<?php if($cv != ''){ ?>
	<h5>
		<span class="material-symbols-outlined">folder_open</span>
		<?php echo $cv ?>
	</h5>
	<?php } ?>
	<input type="file" accept=".doc,.docx,.pdf" name="file" onchange="layTenFIleCV()">
	<input type="text" name="ten-file-cv-cu" value="<?php echo $cv ?>" hidden>
	<input type="" name="ten-file-cv" id="ten-file-cv" value="" hidden>
	<br><br>

	<button class="button button-create">Lưu</button>
	<button class="button button-reset" type="reset">Đặt lại</button>
</form>