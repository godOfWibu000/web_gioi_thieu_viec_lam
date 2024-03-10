<?php
	include('../../database/db.php');
	session_start();
	if(isset($_POST['id'])){
?>
<h3>Sửa liên kết Internet</h3>

<form>
	<input type="" name="" id="sua-ma-lien-ket" value="<?php echo $_POST['id'] ?>" hidden><br>
	<label><h5>Liên kết:</h5></label><br>
	<span class="chi-muc"><?php echo $_POST['tenLienKet'] ?></span><br>

	<label><h5>Đường dẫn liên kết:</h5></label><br>
	<input class="input width-100" id="sua-duong-dan-lien-ket" type="text" name="" value="<?php echo $_POST['duongDanLienKet'] ?>">
	<h5 class="color-delete" id="message-sua-duong-dan-lien-ket"></h5>
	<br>

	<hr>
	<button type="button" class="button button-create" onclick="validateThemLienKet('sua-duong-dan-lien-ket', 'message-sua-duong-dan-lien-ket')">Lưu lại</button>
	<button class="button button-reset" type="reset">Đặt lại</button>
</form>
<?php
	}
?>