<!-- Head -->
<?php
	$title = "Nhà tuyển dụng " . $_GET['ten-nha-tuyen-dung'];
	require "inc/head.php";
?>

<!-- Link css/js... -->
<link rel="stylesheet" type="text/css" href="css/side-bar.css">
<link rel="stylesheet" type="text/css" href="css/ds-viec-lam.css">
<link rel="stylesheet" type="text/css" href="css/nha-tuyen-dung.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Header -->
<?php
	require "inc/header.php";

	//Lay thong tin nha tuyen dung
	$nhaTuyenDung = mysqli_query($conn, "Select * From nhatuyendung Where MaNhaTuyenDung='".$_GET['id']."'");
	if($nhaTuyenDung -> num_rows > 0){
		while($row = $nhaTuyenDung -> fetch_assoc()){
			$maNhaTuyenDung = $row['MaNhaTuyenDung'];
			$tenNhaTuyenDung = $row['TenNhaTuyenDung'];
			$diaChi = $row['DiaChiNhaTuyenDung'];
			$sdt = $row['SDTNhaTuyenDung'];
			$email = $row['Email'];
			$moTa = $row['MoTaNhaTuyenDung'];
		}
	}
?>

<div class="content padding">
<!-- Thong tin nha tuyen dung -->
	<div class="nha-tuyen-dung">
		<div>
			<div id="anh-bia-nha-tuyen-dung" class="anh-bia">
			</div>

			<div class="noi-dung">
				<div class="phan-dau">
					<div class="anh-dai-dien">
						<img src="img/avatar.jpg" width="100%">
					</div>
					<div class="ten-nha-tuyen-dung">
						<h2><?php echo $tenNhaTuyenDung ?></h2>
					</div>
				</div>

				<div class="phan-than">
					<div class="linh-vuc-hoat-dong">
						<div class="linh-vuc">
							<h3>Lĩnh vực hoạt động</h3>
							<?php
								$sqlLinhVucNhaTuyenDung = "Select * From linhvucnhatuyendung inner join linhvuc on linhvucnhatuyendung.MaLinhVuc=linhvuc.MaLinhVuc Where MaNhaTuyenDung='".$maNhaTuyenDung."'";
								$dsLinhVucNhaTuyenDung = mysqli_query($conn, $sqlLinhVucNhaTuyenDung);
								if($dsLinhVucNhaTuyenDung->num_rows>0){
									while($row = $dsLinhVucNhaTuyenDung->fetch_assoc()){
										echo '
									<span class="chi-muc background-border2">'.$row['TenLinhVuc'].'</span>
										';
									}
								}
							?>
						</div>
					</div>

					<div class="thong-tin-co-ban">
						<div class="dia-chi">
							<h5>
								<span class="material-symbols-outlined icon1">location_city</span>
								<?php echo $diaChi ?>
							</h5>
						</div>

						<div class="dien-thoai">
							<h5>
								<span class="material-symbols-outlined icon1">phone_in_talk</span> <?php echo $sdt ?>
							</h5>
						</div>

						<div class="email">
							<h5><span class="material-symbols-outlined icon1">mail</span> <?php echo $email ?></h5>
						</div>
					</div>

					<div style="text-align: center;">
						<?php
							$sqlLienKetNhaTuyenDung = "SELECT * FROM lienketinternetnhatuyendung inner join lienketinternet on lienketinternetnhatuyendung.MaLienKetInternet=lienketinternet.MaLienKetInternet Where MaNhaTuyenDung='".$maNhaTuyenDung."'";
							$dsLienKetNhaTuyenDung = mysqli_query($conn, $sqlLienKetNhaTuyenDung);
							if($dsLienKetNhaTuyenDung->num_rows>0){
								while($row = $dsLienKetNhaTuyenDung->fetch_assoc()){
									echo '
						<a href="'.$row['DuongDanLienKet'].'" target="_blank">
							<span class="lien-ket-internet">
								'.$row['BieuTuongLienKetInternet'].'
							</span>
						</a>
									';
								}
							}
						?>
					</div>

					<hr>
					<div>
						<h5><?php echo $moTa ?></h5>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Viec lam cua nha tuyen dung -->
	<hr>
	<h3 class="title">Việc làm của nhà tuyển dụng</h2>
	<div class="viec-lam-nha-tuyen-dung ds-vieclam row">
		<?php
			$sql = "Select * From vieclam 
					inner join nhatuyendung on vieclam.MaNhaTuyenDung=nhatuyendung.MaNhaTuyenDung 
					inner join khuvuc on vieclam.MaKhuVuc=khuvuc.MaKhuVuc 
					inner join kinhnghiem on vieclam.MaKinhNghiem=kinhnghiem.MaKinhNghiem 
					inner join linhvuc on vieclam.MaLinhVuc=linhvuc.MaLinhVuc 
					inner join hocvan on vieclam.MaHocVan=hocvan.MaHocVan Where nhatuyendung.MaNhaTuyenDung='".$_GET['id']."'";
			getData($conn ,$sql, "inc/viec-lam/ds-viec-lam1.php");
		?>
	</div>

<!-- Nha tuyen dung lien quan -->
	<hr>
	<h3 class="title">Nhà tuyển dụng liên quan</h3>
	<div class="container" style="padding: 10px;">
		<div id="wapper">
		    <div class="row filtering ds-nha-tuyen-dung">
		        <div class="col-md-12 col-sm-12 col-xs-12 nha-tuyen-dung">
		        	<div class="anh-dai-dien">
						<img src="https://img.freepik.com/free-vector/bird-colorful-logo-gradient-vector_343694-1365.jpg" width="50%">
					</div>
					<h4>Nhà tuyển dụng</h4>
		        </div>

		        <div class="col-md-12 col-sm-12 col-xs-12 nha-tuyen-dung">
		        	<div class="anh-dai-dien">
						<img src="https://img.freepik.com/free-vector/bird-colorful-logo-gradient-vector_343694-1365.jpg" width="50%">
					</div>
					<h4>Nhà tuyển dụng</h4>
		        </div>

		        <div class="col-md-12 col-sm-12 col-xs-12 nha-tuyen-dung">
		        	<div class="anh-dai-dien">
						<img src="https://img.freepik.com/free-vector/bird-colorful-logo-gradient-vector_343694-1365.jpg" width="50%">
					</div>
					<h4>Nhà tuyển dụng</h4>
		        </div>

		        <div class="col-md-12 col-sm-12 col-xs-12 nha-tuyen-dung">
		        	<div class="anh-dai-dien">
						<img src="https://img.freepik.com/free-vector/bird-colorful-logo-gradient-vector_343694-1365.jpg" width="50%">
					</div>
					<h4>Nhà tuyển dụng</h4>
		        </div>

		        <div class="col-md-12 col-sm-12 col-xs-12 nha-tuyen-dung">
		        	<div class="anh-dai-dien">
						<img src="https://img.freepik.com/free-vector/bird-colorful-logo-gradient-vector_343694-1365.jpg" width="50%">
					</div>
					<h4>Nhà tuyển dụng</h4>
		        </div>
		    </div>
		</div>
	</div>

	<?php require "inc/side-bar.php"; ?>
</div>


<!-- Slick slider JS -->
<script type="text/javascript" src="frontend/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
	$('.filtering').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  arrows:true,
	  speed:300
	});

	var filtered = false;

	$('.js-filter').on('click', function(){
	  if (filtered === false) {
	    $('.filtering').slick('slickFilter',':even');
	    $(this).text('Unfilter Slides');
	    filtered = true;
	  } else {
	    $('.filtering').slick('slickUnfilter');
	    $(this).text('Filter Slides');
	    filtered = false;
	  }
	});
</script>

<?php
	if(!isset($_GET['id']) || !isset($_GET['ten-nha-tuyen-dung'])){
?>

<script type="text/javascript">
	window.location = 'index.php';
</script>

<?php
	}
?>


<!-- Footer -->
<?php
	require "inc/footer.php";
?>