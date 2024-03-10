<?php
	$title = 'Admin-Quản lý ứng viên';
	require '../inc/admin/header-admin.php';
?>
		<?php
			if(isset($_SESSION['loaiTaiKhoan']) && $_SESSION['loaiTaiKhoan'] == 'Admin'){
		?>
			<h2>Quản lý ứng viên</h2>

		<!-- Tim kiem -->
			<form class="flex-between margin" method="get" action="quan-ly-ung-vien.php">
				<input class="input width-100" type="text" name="tu-khoa">
				<button class="button button-create"><span class="material-symbols-outlined icon1">search</span></button>
			</form>

		<!-- Loc ung vien -->
			<div>
				<label><h5>Sắp xếp</h5></label>
				<select class="select" id="loc-ung-vien" onchange="loc('loc-ung-vien', 'ds-ung-vien', '<?php if(isset($_GET['tu-khoa'])) echo $_GET['tu-khoa'] ?>')">
					<option value="A-Z">A-Z</option>
					<option value="Z-A">Z-A</option>
				</select>
			</div>

		<!-- DS ung vien -->
			<div id="ds-ung-vien">
				<?php
					if(isset($_GET['tu-khoa'])){
				?>
				<div class="flex">
					<h3>Kết quả tìm kiếm cho '<?php echo $_GET['tu-khoa'] ?>'</h3>
					<a class="a" href="quan-ly-ung-vien.php"><h3>Quay lại</h3></a>
				</div>
				<?php
					}
				?>
				<table class="table table-striped">
					<tr>
					    <th>Id</th>
					    <th>Tên ứng viên</th>
					    <th>Ngày sinh</th>
					    <th>Số điện thoại</th>
					    <th>Email</th>
					    <th>Địa chỉ</th>
					    <th></th>
					    <th></th>
				    </tr>

				    <?php
				    	$sqlUngVien = "Select * From ungvien";
				    	if(isset($_GET['tu-khoa']))
				    		$sqlUngVien .= " Where TenUngVien Like '%".$_GET['tu-khoa']."%' or SDTUngVien Like '%".$_GET['tu-khoa']."%' or Email Like '%".$_GET['tu-khoa']."%' or DiaChiUngVien Like '%".$_GET['tu-khoa']."%'";
				    	$sqlUngVien .= " Order By TenUngVien ASC";
				    	$dsUngVien = mysqli_query($conn, $sqlUngVien);
				    	if($dsUngVien->num_rows > 0){
				    		while($row = $dsUngVien->fetch_assoc()){
				    ?>

				    <tr>
				    	<td><?php echo $row['MaUngVien'] ?></td>
				    	<td><?php echo $row['TenUngVien'] ?></td>
				    	<td><?php echo $row['NgaySinhUngVien'] ?></td>
				    	<td><?php echo $row['SDTUngVien'] ?></td>
				    	<td><?php echo $row['Email'] ?></td>
				    	<td><?php echo $row['DiaChiUngVien'] ?></td>
				    	<td><button class="button button-create" onclick="moCuaSo('cua-so-thong-tin-ung-vien', 'nen-cua-so-thong-tin-ung-vien');moCuaSoXemUngVien('<?php echo $row['MaUngVien'] ?>')">Xem</button></td>
				    	<td><button class="button button-delete">Xóa</button></td>
				    </tr>

				    <?php
				    		}
				    	}
				    ?>
				</table>
			</div>

		<!-- Thong tin ung vien -->
			<div class="cua-so cua-so-lon padding" id="cua-so-thong-tin-ung-vien">
				
			</div>

			<div class="nen-cua-so" id="nen-cua-so-thong-tin-ung-vien" onclick="dongCuaSo('cua-so-thong-tin-ung-vien', 'nen-cua-so-thong-tin-ung-vien')">
				
			</div>

		<?php } ?>
		</div>
	</div>
</body>
</html>