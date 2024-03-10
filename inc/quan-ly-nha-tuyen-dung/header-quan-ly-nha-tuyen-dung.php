<?php
	include('../database/db.php');
	session_start();	
	if(isset($_SESSION['loaiTaiKhoan'])){
		if($_SESSION['loaiTaiKhoan'] == 'Ứng viên')
			header("Location: ../index.php");
		else if($_SESSION['loaiTaiKhoan'] == 'Admin')
			header("Location: ../admin/admin.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title ?></title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/public.css">
	<link rel="stylesheet" type="text/css" href="../css/quan-ly-nha-tuyen-dung.css">

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

	<!-- Font Google -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

	<!-- Icon Google -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

	<!-- Icon Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

	<!-- Icon Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

	<!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Icon -->
    <link rel="shortcut icon" type="image/png" href="../img/logo.png" />

    <!-- JS -->
    <script src="../js/main.js"></script>
    <script src="../js/quan-ly-tai-khoan.js"></script>
    <script src="../js/quan-ly-nha-tuyen-dung.js"></script>
</head>
<body>
	<div class="quan-ly-nha-tuyen-dung">
		<div class="taskbar" id="taskbar">
			<div class="phan-dau">
				<h3>Menu</h3>

				<button class="button button-create" id="button-menu" onclick="moMenu()">
					<span style="font-size: 30px;" class="material-symbols-outlined icon1">menu</span>
				</button>
			</div>
			<hr>	

			<div id="noi-dung-taskbar-quan-ly-nha-tuyen-dung">
				<div class="menu">
					<ul>
						<li>
							<a class="a" href="index.php">
								<span class="material-symbols-outlined icon1">arrow_right</span>
								Thông tin nhà tuyển dụng
							</a>
						</li>

						<li>
							<a class="a" href="quan-ly-tai-khoan-nha-tuyen-dung.php">
								<span class="material-symbols-outlined icon1">arrow_right</span>
								Tài khoản
							</a>
						</li>

						<li>
							<a class="a" href="quan-ly-viec-lam-nha-tuyen-dung.php">
								<span class="material-symbols-outlined icon1">arrow_right</span>
								Việc làm
							</a>
						</li>

						<li>
							<a class="a" href="../index.php">
								<span class="material-symbols-outlined icon1">arrow_right</span>
								Quay về trang chủ
							</a>
						</li>
					</ul>
				</div>

				<?php
					if(isset($_SESSION['emailDangNhap'])){
				?>

				<div class="tai-khoan-nha-tuyen-dung">
					<img src="../img/user.png" width="50px" height="50px">
					<h5>
						<?php echo $_SESSION['emailDangNhap'] ?>
					</h5>

					<h5 class="dang-xuat" onclick="dangXuat('../ajax_action/dang_xuat_action.php', '../quan-ly-nha-tuyen-dung')">
						<span class="material-symbols-outlined">logout</span>
						Đăng xuất
					</h5>
				</div>

				<?php
					}
				?>
			</div>
		</div>

		<div class="noi-dung-quan-ly padding" id="noi-dung-quan-ly-nha-tuyen-dung">
			<?php
				if(!isset($_SESSION['emailDangNhap']))
					require "../inc/form-dang-nhap-trang-quan-ly.php";
			?>
			<?php
				if(!isset($_SESSION['maNhaTuyenDung']) && isset($_SESSION['emailDangNhap'])){
			?>

			<div class="thong-bao-bo-sung-thong-tin">
					<div class="background">
						<img src="https://i.pinimg.com/originals/ae/01/bd/ae01bd89d2d14acd68d92f5f74cef4a0.jpg" width="50%">
					</div>

					<h2>Vui lòng bổ sung thông tin để đăng bài tuyển dụng!</h2>

					<div>
						<span class="material-symbols-outlined button color-create button-bo-sung-thong-tin" onclick="moCuaSo('cua-so-bo-sung-thong-tin-co-ban-nha-tuyen-dung', 'nen-cua-so-bo-sung-thong-tin-co-ban-nha-tuyen-dung')">add_circle</span>
					</div>
				</div>

			<div class="cua-so cua-so-lon padding" id="cua-so-bo-sung-thong-tin-co-ban-nha-tuyen-dung">
				<h2>Bổ sung thông tin nhà tuyển dụng:</h2>
				<br>
				<form>
					<h5>Tên doanh nghiệp của bạn:</h5>
					<input class="input width-100" id="them-ten-nha-tuyen-dung" type="text" name="">
					<h5 class="color-delete" id="message-them-ten-nha-tuyen-dung"></h5>

					<h5>Số điện thoại:</h5>
					<input class="input width-100" id="them-so-dien-thoai" name="" placeholder="0123456789">
					<h5 class="color-delete" id="message-them-so-dien-thoai"></h5>

					<h5>Địa chỉ:</h5>
					<input class="input width-100" id="them-dia-chi" type="text" name="">
					<h5 class="color-delete" id="message-them-dia-chi"></h5>

					<h5>Mô tả:</h5>
					<textarea class="textarea width-100" id="them-mo-ta" name=""></textarea>
					<h5 class="color-delete" id="message-them-mo-ta"></h5>

					<br><br>
					<button class="button button-create" type="button" onclick="validateThemNhaTuyenDung('Thêm')">Gửi</button>
					<button class="button button-reset" type="reset">Đặt lại</button>
				</form>
			</div>

			<div class="nen-cua-so" id="nen-cua-so-bo-sung-thong-tin-co-ban-nha-tuyen-dung" onclick="dongCuaSo('cua-so-bo-sung-thong-tin-co-ban-nha-tuyen-dung', 'nen-cua-so-bo-sung-thong-tin-co-ban-nha-tuyen-dung')">
				
			</div>

			<?php } ?>