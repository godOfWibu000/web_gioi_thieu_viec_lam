<?php
	$title = 'Admin-Quản lý việc làm';
	require '../inc/admin/header-admin.php';
?>
		<?php
			if(isset($_SESSION['loaiTaiKhoan']) && $_SESSION['loaiTaiKhoan'] == 'Admin'){
		?>
			<h2>Quản lý việc làm</h2>

		<!-- Tim kiem -->
			<form class="flex-between margin" method="get" action="quan-ly-viec-lam.php">
				<input class="input width-100" type="text" name="tu-khoa">
				<button class="button button-create"><span class="material-symbols-outlined icon1">search</span></button>
			</form>

		<!-- Loc ung vien -->
			<div class="flex-between">
				<div>
					<label><h5>Trạng thái:</h5></label>
					<select class="select" id="loc-trang-thai">
						<option value="Tất cả">Tất cả</option>
						<option value="Mở">Mở</option>
						<option value="Đóng">Đóng</option>
					</select>
				</div>

				<div>
					<label><h5>Sắp xếp:</h5></label>
					<select class="select" id="loc-sap-xep">
						<option value="A-Z">A-Z</option>
						<option value="Z-A">Z-A</option>
					</select>
				</div>

				<div>
					<label><h5>Thời gian:</h5></label>
					<select class="select" id="loc-thoi-gian">
						<option value="Mới nhất">Mới hơn</option>
						<option value="Cũ nhất">Cũ hơn</option>
					</select>
				</div>
			</div>

		<!-- DS vien lam -->
			<div>
				<?php
					if(isset($_GET['tu-khoa'])){
				?>
				<div class="flex">
					<h3>Kết quả tìm kiếm cho '<?php echo $_GET['tu-khoa'] ?>'</h3>
					<a class="a" href="quan-ly-viec-lam.php"><h3>Quay lại</h3></a>
				</div>
				<?php
					}
				?>
				<table class="table table-striped">
					<tr>
				      <th>Id</th>
				      <th>Tên việc làm</th>
				      <th>Nhà tuyển dụng</th>
				      <th>Thời gian</th>
				      <th>Trạng thái</th>
				      <th></th>
				      <th></th>
				    </tr>

				    <?php
				    	$sqlViecLam = "Select * From vieclam inner join nhatuyendung on vieclam.MaNhaTuyenDung=nhatuyendung.MaNhaTuyenDung";
				    	if(isset($_GET['tu-khoa']))
				    		$sqlViecLam .= " Where TenViecLam Like '%".$_GET['tu-khoa']."%' or TenNhaTuyenDung Like '%".$_GET['tu-khoa']."%'";
				    	$sqlViecLam .= " Order By TenViecLam ASC";
				    	$dsViecLam = mysqli_query($conn, $sqlViecLam);
				    	if($dsViecLam->num_rows > 0){
				    		while($row = $dsViecLam->fetch_assoc()){
				    ?>

				    <tr>
				    	<td><?php echo $row['MaViecLam'] ?></td>
				    	<td><?php echo $row['TenViecLam'] ?></td>
				    	<td><?php echo $row['TenNhaTuyenDung'] ?></td>
				    	<td><?php echo $row['ThoiGianDangViecLam'] ?></td>
				    	<td>
				    		<?php
				    			if($row['TrangThaiViecLam'] == 1)
				    				echo 'Mở';
				    			else
				    				echo 'Đóng';
				    		?>
				    	</td>
				    	<td><button class="button button-create" onclick="moCuaSo('cua-so-thong-tin-viec-lam', 'nen-cua-so-thong-tin-viec-lam');moCuaSoXemViecLam('<?php echo $row['MaViecLam'] ?>')">Xem</button></td>
				    	<td><button class="button button-delete">Xóa</button></td>
				    </tr>

				    <?php
				    		}
				    	}
				    ?>
				</table>
			</div>

			<div class="cua-so cua-so-lon padding" id="cua-so-thong-tin-viec-lam">
				
			</div>

			<div class="nen-cua-so" id="nen-cua-so-thong-tin-viec-lam" onclick="dongCuaSo('cua-so-thong-tin-viec-lam', 'nen-cua-so-thong-tin-viec-lam')">
				
			</div>
		<?php } ?>

		</div>
	</div>

	
</body>
</html>