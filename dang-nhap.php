<?php
	$title = "Đăng ký tài khoản";
	require "inc/head.php";
?>
<!-- Link css,js... -->
<link rel="stylesheet" type="text/css" href="css/dang-ky-tai-khoan.css">

<?php
	include('database/db.php');
	session_start();
?>
</head>
<body>
	<div class="dang-ky-tai-khoan background-border2">
		<div class="noi-dung padding">
			<div class="logo text-center">
				<img src="img/logo.png" width="100px">
				<h2>Việc làm sinh viên IT Nông nghiệp</h2>
			</div>
			<?php require "inc/form-dang-nhap.php"; ?>
		</div>
	</div>
	<script src="js/main.js"></script>
	<?php
		if(isset($_SESSION['emailDangNhap'])){
	?>
	<script type="text/javascript">
		window.location = 'index.php';
	</script>
	<?php
		}
	?>
</body>
</html>
