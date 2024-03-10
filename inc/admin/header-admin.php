<?php
	include('../database/db.php');
	session_start();	
	if(isset($_SESSION['loaiTaiKhoan'])){
		if($_SESSION['loaiTaiKhoan'] == 'Ứng viên')
			header("Location: ../index.php");
		else if($_SESSION['loaiTaiKhoan'] == 'Nhà tuyển dụng')
			header("Location: ../quan-ly-nha-tuyen-dung/quan-ly-nha-tuyen-dung.php");
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
	<link rel="stylesheet" type="text/css" href="../css/admin.css">

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
    <script src="../js/admin.js"></script>
</head>
<body>
	<div class="admin">
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
							<a class="a" href="admin.php">
								<span class="material-symbols-outlined icon1">arrow_right</span>
								Trang chủ
							</a>
						</li>

						<li>
							<a class="a" href="quan-ly-du-lieu.php">
								<span class="material-symbols-outlined icon1">arrow_right</span>
								Quản lý dữ liệu
							</a>
						</li>

						<li>
							<a class="a" href="quan-ly-viec-lam.php">
								<span class="material-symbols-outlined icon1">arrow_right</span>
								Quản lý việc làm
							</a>
						</li>

						<li>
							<a class="a" href="bao-cao-viec-lam.php">
								<span class="material-symbols-outlined icon1">arrow_right</span>
								Báo cáo việc làm
							</a>
						</li>

						<li>
							<a class="a" href="quan-ly-nha-tuyen-dung.php">
								<span class="material-symbols-outlined icon1">arrow_right</span>
								Quản lý nhà tuyển dụng
							</a>
						</li>

						<li>
							<a class="a" href="quan-ly-ung-vien.php">
								<span class="material-symbols-outlined icon1">arrow_right</span>
								Quản lý ứng viên
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

					<h5 class="dang-xuat" onclick="dangXuat('../ajax_action/dang_xuat_action.php', 'admin.php')">
						<span class="material-symbols-outlined">logout</span>
						Đăng xuất
					</h5>
				</div>

				<?php
					}
				?>
			</div>
		</div>

		<div class="noi-dung-quan-ly padding">
			<?php
				if(!isset($_SESSION['emailDangNhap']))
					require "../inc/form-dang-nhap-trang-quan-ly.php";
			?>