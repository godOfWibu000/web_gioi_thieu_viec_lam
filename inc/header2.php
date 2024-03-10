<?php
	include("../database/db.php");
	session_start();
?>
</head>
<body onload="loadPage();">
	
<!-- Container -->
	<div class="page">
	<!-- Form dang nhap -->
		<div id="login-frame" class="cua-so cua-so-nho">
			<button class="dong" onclick="dongCuaSo('login-frame', 'nen-cua-so-dang-nhap')">
				<span class="material-symbols-outlined">close</span>
			</button>

			<br>
			<br>

			<h3 style="clear: both;padding: 0 2%;">Đăng nhập</h3>
			<form method="post">
				<label>Email:</label><br>
				<input class="input" type="Email" name="" class="truong-nhap" id="dang-nhap-email"><br>
				<label>Mật khẩu:</label><br>

				<input class="input truong-nhap password" type="password" name="" id="nhap-mat-khau">
				<button type="button" onclick="anHienMatKhau('nhap-mat-khau', 'an-hien-mat-khau')" class="an-hien-mat-khau"><span class="material-symbols-outlined" id="an-hien-mat-khau" style="position: relative;top: 2px;">visibility</span></button>

				<p id="message-dang-nhap"></p>

				<button type="button" onclick="kiemTraDangNhap('dang-nhap-email', 'nhap-mat-khau', 'message-dang-nhap', 'ajax_action/dang_nhap_action.php')" id="dang-nhap" class="button gui-dang-nhap">Đăng nhập</button>
			</form>
			<br>
			<div class="dang-ky">
				<h5 class="text-center">hoặc&nbsp;</h5>
				<a class="text-decoration-none" href="../dang-ky-tai-khoan.php"><h4>Đăng ký</h4></a>
			</div>
		</div>

		<div class="nen-cua-so" id="nen-cua-so-dang-nhap" onclick="dongCuaSo('login-frame', 'nen-cua-so-dang-nhap')">
			
		</div>

	<!-- Dau trang -->
		<header>
		<!-- Phan dau -->
			<div class="head row">
				<div class="logo col-lg-2 col-2">
					<a href="index.php"><img src="../img/logo.png" width="50px"></a>
				</div>

				<div class="tim-kiem col-lg-8 col-10">
					<form class="input-group mb-3" method="get" action="tim-kiem.php">
					  <input type="text" class="form-control" name="tu-khoa" placeholder="Nhập từ khóa..." required aria-label="Example text with button addon" aria-describedby="button-addon1">
					  <button class="btn btn-outline-secondary" type="submit" id="button-addon1"><span class="material-symbols-outlined" style="position: relative;top: 3px;">search</span></button>
					</form>	
				</div>

				<div class="login col-lg-2">
					<span>
						<span id="button-dang-nhap" onclick="moCuaSo('login-frame', 'nen-cua-so-dang-nhap')" style="color: var(--main-color2);cursor: pointer;">
							<?php
								if(!isset($_SESSION["emailDangNhap"]))
									echo "Đăng nhập";
							?>
						</span>

						<span><a id="mo-dang-nhap" style="width: 70px;" href="<?php
							if(isset($_SESSION['loaiTaiKhoan'])){
								if($_SESSION['loaiTaiKhoan'] == 'Ứng viên')
									echo '../quan-ly-thong-tin-ung-vien';
								else if($_SESSION['loaiTaiKhoan'] == 'Nhà tuyển dụng')
									echo 'quan-ly-nha-tuyen-dung';
								else
									echo 'admin';
							}
						?>">
							<?php
								if(isset($_SESSION["tenUngVien"]))
									echo substr($_SESSION["tenUngVien"], 0, 9) . "...";
								else if(isset($_SESSION["emailDangNhap"]))
									echo substr($_SESSION["emailDangNhap"], 0, 8) . "...";

							?>
						</a></span>
					</span>
				</div>
			</div>
		 <!-- Menu -->
			<div id="toggle">
                <span class="material-symbols-outlined">menu</span>
                <span class="menu-icon-text">Menu</span>
            </div>

			<div class="nav">
				<ul id="menu">
					<li><a id="menu-trang-chu" href="../index.php" id="home">Trang chủ</a></li>
					<li>
						<a id="menu-viec-lam" href="../viec-lam.php">Việc làm</a>
					</li>
					<li><a id="menu-lien-he" href="../lien-he.php">Giới thiệu</a></li>
				</ul>
			</div>
		</header>