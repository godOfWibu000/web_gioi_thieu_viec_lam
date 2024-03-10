function locTimKiemViecLam(){
	let tuKhoa = document.getElementById('tu-khoa-tim-kiem').value;

	let locViecLamTheoTrangThai = document.querySelectorAll('#loc-viec-lam-theo-trang-thai input');
	let locTimKiem;
	for(key of locViecLamTheoTrangThai)
	{
		if(key.checked == true){
			locTimKiem = key.value;
		}
	}

	let linhVuc = document.getElementById('loc-viec-lam-theo-linh-vuc').value;
	let kinhNghiem = document.getElementById('loc-viec-lam-theo-kinh-nghiem').value;

	$.ajax({
		url: "ajax_action/viec_lam/loc_action.php",
		method: "POST",
		data:{locTimKiem:locTimKiem, linhVuc:linhVuc, kinhNghiem:kinhNghiem, tuKhoa:tuKhoa},
		success:function(data){
			document.getElementById('ds-viec-lam').innerHTML = data;
		}
	});
}