<?php
	include('../../database/db.php');

	if(isset($_POST['maViecLam']))
		$soNguoiQuanTam = getSingleData($conn, "Select SoNguoiQuanTam From vieclam Where MaViecLam='".$_POST['maViecLam']."'", "SoNguoiQuanTam");
	if(isset($_POST['maViecLam']) && $_POST['trangThai'] == 'Quan tâm'){
		$result1 = $conn->query("Insert into quantam(MaViecLam,Email) Values('".$_POST['maViecLam']."','".$_POST['email']."');");
		$soNguoiQuanTam++;
		$result2 = $conn->query("Update vieclam Set SoNguoiQuanTam=".$soNguoiQuanTam." Where MaViecLam='".$_POST['maViecLam']."'");
?>

	<button style="width: 200px;" class="button button-create" onclick="quanTam('<?php echo $_POST['maViecLam'] ?>', '<?php echo $_POST['email'] ?>', 'Bỏ quan tâm', 'ajax_action/viec_lam/quan_tam_action.php')">
		<span class="material-symbols-outlined icon1">playlist_add_check</span>
		<span>
		Đã quan tâm
	</button>
<?php
	}

	if(isset($_POST['maViecLam']) && $_POST['trangThai'] == 'Bỏ quan tâm'){
		$result1 = $conn->query("Delete From quantam Where MaViecLam='".$_POST['maViecLam']."' and Email='".$_POST['email']."'");
		$soNguoiQuanTam--;
		$result2 = $conn->query("Update vieclam Set SoNguoiQuanTam=".$soNguoiQuanTam." Where MaViecLam='".$_POST['maViecLam']."'");

?>
	<button style="width: 200px;" class="button button-reset" onclick="quanTam('<?php echo $_POST['maViecLam'] ?>', '<?php echo $_POST['email'] ?>', 'Quan tâm', 'ajax_action/viec_lam/quan_tam_action.php')" >
		<span class="material-symbols-outlined icon1">playlist_add</span>
		<span>
		Quan tâm
	</button>
<?php
	}
?>