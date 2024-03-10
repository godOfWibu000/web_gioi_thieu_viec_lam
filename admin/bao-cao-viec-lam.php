<?php
	$title = 'Trang quản trị';
	require '../inc/admin/header-admin.php';
?>
		<?php
			if(isset($_SESSION['loaiTaiKhoan']) && $_SESSION['loaiTaiKhoan'] == 'Admin'){
		?>

		<h2>Báo cáo việc làm</h2>
		<div id="ds-bao-cao-viec-lam">
			<table class="table table-striped">
				<tr>
					<th>Việc làm</th>
					<th>Người báo cáo</th>
					<th>Nội dung báo cáo</th>
					<th>Thời gian báo cáo</th>
					<th></th>
				</tr>
				<?php
					$dsBaoCao = mysqli_query($conn, "Select * From baocaovieclam inner join vieclam on baocaovieclam.MaViecLam=vieclam.MaViecLam Order By ThoiGianBaoCao DESC");
					if($dsBaoCao->num_rows>0){
						while($row = $dsBaoCao->fetch_assoc()){
				?>

				<tr>
					<td><?php echo $row['TenViecLam'] ?></td>
					<td><?php echo $row['Email'] ?></td>
					<td><?php echo $row['NoiDungBaoCao'] ?></td>
					<td><?php echo $row['ThoiGianBaoCao'] ?></td>
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