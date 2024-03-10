<?php
	$title = 'Admin-Quản lý nhà tuyển dụng';
	require '../inc/admin/header-admin.php';
?>
		<?php
			if(isset($_SESSION['loaiTaiKhoan']) && $_SESSION['loaiTaiKhoan'] == 'Admin'){
		?>
			<h2>Quản lý nhà tuyển dụng</h2>

		<!-- Tim kiem -->
			<form class="flex-between margin" method="get" action="quan-ly-nha-tuyen-dung.php">
				<input class="input width-100" type="text" name="tu-khoa">
				<button class="button button-create"><span class="material-symbols-outlined icon1">search</span></button>
			</form>

		<!-- Loc ung vien -->
			<div>
				<label><h5>Sắp xếp</h5></label>
				<select class="select" id="loc-nha-tuyen-dung" onchange="loc('loc-nha-tuyen-dung', 'ds-nha-tuyen-dung', '<?php if(isset($_GET['tu-khoa'])) echo $_GET['tu-khoa'] ?>')">
					<option value="A-Z">A-Z</option>
					<option value="Z-A">Z-A</option>
				</select>
			</div>

		<!-- DS nha tuyen dung -->
			<div id="ds-nha-tuyen-dung">
				<?php
					if(isset($_GET['tu-khoa'])){
				?>
				<div class="flex">
					<h3>Kết quả tìm kiếm cho '<?php echo $_GET['tu-khoa'] ?>'</h3>
					<a class="a" href="quan-ly-nha-tuyen-dung.php"><h3>Quay lại</h3></a>
				</div>
				<?php
					}
				?>
				<table class="table table-striped">
					<tr>
				    	<th>Id</th>
				        <th>Tên nhà tuyển dụng</th>
				        <th>Số điện thoại</th>
				        <th>Email</th>
				        <th>Địa chỉ</th>
				        <th></th>
				        <th></th>
				    </tr>

				    <?php
				    	$sqlNhaTuyenDung = "Select * From nhatuyendung";
				    	if(isset($_GET['tu-khoa']))
				    		$sqlNhaTuyenDung .= " Where TenNhaTuyenDung Like '%".$_GET['tu-khoa']."%' or SDTNhaTuyenDung Like '%".$_GET['tu-khoa']."%' or Email Like '%".$_GET['tu-khoa']."%' or DiaChiNhaTuyenDung Like '%".$_GET['tu-khoa']."%'";
				    	$sqlNhaTuyenDung .= " Order By TenNhaTuyenDung ASC";

				    	$dsNhaTuyenDung = mysqli_query($conn, $sqlNhaTuyenDung);
				    	if($dsNhaTuyenDung->num_rows > 0){
				    		while($row = $dsNhaTuyenDung->fetch_assoc()){
				    ?>

				    <tr>
				    	<td><?php echo $row['MaNhaTuyenDung'] ?></td>
				    	<td><?php echo $row['TenNhaTuyenDung'] ?></td>
				    	<td><?php echo $row['SDTNhaTuyenDung'] ?></td>
				    	<td><?php echo $row['Email'] ?></td>
						<td><?php echo $row['DiaChiNhaTuyenDung'] ?></td>

				    	<td><a href="thong-tin-nha-tuyen-dung.php?id=<?php echo $row['MaNhaTuyenDung'] ?>"><button class="button button-create">Xem</button></a></td>
				    	<td><button class="button button-delete">Xóa</button></td>
				    </tr>

				    <?php
				    		}
				    	}
				    ?>
				</table>
			</div>
		<?php } ?>

		</div>
	</div>
</body>
</html>