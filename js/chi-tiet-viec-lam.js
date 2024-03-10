function ungTuyenViecLam(email, loaiTaiKhoan, maUngVien, maViecLam){
	if(email == '')
		moCuaSo('login-frame', 'nen-cua-so-dang-nhap');
	if(email != '' && maUngVien == '' && loaiTaiKhoan == 'Ứng viên')
		window.location = "quan-ly-thong-tin-ung-vien";
	if(email != '' && maUngVien != '')
		window.location = "ung-tuyen.php?id=" + maViecLam;
	if(loaiTaiKhoan == 'Nhà tuyển dụng')
	{
		alert('Bạn cần đăng nhập tài khoản ứng viên để ứng tuyển!');
	}
}

function moCuaSoChiaSeViecLam(){
    document.getElementById('chia-se').style.display = 'block';
    document.getElementById('button-mo-cua-so-chia-se').onclick = function() {dongCuaSoChiaSeViecLam()};
}

function dongCuaSoChiaSeViecLam(){
	document.getElementById('chia-se').style.display = 'none';
	document.getElementById('button-mo-cua-so-chia-se').onclick = function() {moCuaSoChiaSeViecLam()};
}