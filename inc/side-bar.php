<?php
	$dsKhuVuc = mysqli_query($conn, "Select * From khuvuc");
	$dsLinhVuc = mysqli_query($conn, "Select * From linhvuc");
	$dsKinhNghiem = mysqli_query($conn, "Select * From kinhnghiem");

	$dsMaLinhVuc = $dsTenLinhVuc = $dsMaKinhNghiem = $dsTenKinhMghiem = null;
	if($dsLinhVuc->num_rows>0){
		$i = 0;
		while($row = $dsLinhVuc->fetch_assoc()){
			$dsMaLinhVuc[$i] = $row['MaLinhVuc'];
			$dsTenLinhVuc[$i] = $row['TenLinhVuc'];
			$i++;
		}
	}

	if($dsKinhNghiem->num_rows>0){
		$i = 0;
		while($row = $dsKinhNghiem->fetch_assoc()){
			$dsMaKinhNghiem[$i] = $row['MaKinhNghiem'];
			$dsTenKinhMghiem[$i] = $row['TenKinhNghiem'];
			$i++;
		}
	}
?>

<!-- Tim kiem nang cao-Danh muc -->
		<hr>

		<div class="row">
			<!-- Tim kiem nang cao -->
			<div class="tim-kiem-nang-cao col-lg-8">
				<div class="noi-dung row">
					<div class="form-tim-kiem">
						<form action="tim-kiem-nang-cao.php" class="box-shadow" method="get">
							<h3>Tìm kiếm nâng cao</h3>
							<label>Theo khu vực:</label>
							<select name="tim-theo-khu-vuc">
								<option disabled selected>Lựa chọn</option>
								<?php 
									if($dsKhuVuc->num_rows>0){
										while($row = $dsKhuVuc->fetch_assoc()){
												echo '
								<option value="'.$row['MaKhuVuc'].'">
								'.$row['TenKhuVuc'].'
								</option>
												';
										}
									}

								?>
							</select>
							<br>

							<label>Theo lĩnh vực:</label>
							<select name="tim-theo-linh-vuc">
								<option disabled selected>Lựa chọn</option>
								<?php 
									for ($i=0; $i < count($dsMaLinhVuc); $i++) { 
										echo '
								<option value="'.$dsMaLinhVuc[$i].'">
								'.$dsTenLinhVuc[$i].'
								</option>
										';
									}
								?>
							</select>
							<br>

							<label>Theo kinh nghiệm:</label>
							<select name="tim-theo-kinh-nghiem">
								<option disabled selected>Lựa chọn</option>
								<?php
									for ($i=0; $i < count($dsMaKinhNghiem); $i++) {
										echo '
								<option value="'.$dsMaKinhNghiem[$i].'">
								'.$dsTenKinhMghiem[$i].'
								</option>
										';
									}
								?>
							</select>
							<br>
							
							<input type="submit" name="" value="Tìm kiếm">
						</form>
					</div>
				</div>
			</div>

			<!-- Danh muc -->
			<div class="danh-muc col-lg-4 col-12" >
				<h3>Danh mục việc làm</h3>
				<div class="noi-dung box-shadow">
					<table>
					<?php
						for ($i=0; $i < count($dsTenLinhVuc); $i++){
							echo'
							<tr>
									<th><a href="danh-muc-viec-lam.php?id='.$dsMaLinhVuc[$i].'&danh-muc-viec-lam='.$dsTenLinhVuc[$i].'">'.$dsTenLinhVuc[$i].'</a>
									</th>
							<tr>
							';
						}
						// $tenLinhVucs = dsThongTinBoSung($conn, 'Select TenLinhVuc From linhvuc', 'TenLinhVuc');
						// $maLinhVucs = dsThongTinBoSung($conn, 'Select MaLinhVuc From linhvuc', 'MaLinhVuc');

						// for ($i=0; $i < count($tenLinhVucs); $i++) { 
						// 	echo "
						// 		<tr>
						// 			<th><a href=\"danh-muc-viec-lam.php?id=".$maLinhVucs[$i]."&danh-muc-viec-lam=".$tenLinhVucs[$i]."\">".$tenLinhVucs[$i]."</a></th>
						// 		<tr>
						// 	";
						// }
					?>
				</table>
				</div>
			</div>
		</div>

		<hr>