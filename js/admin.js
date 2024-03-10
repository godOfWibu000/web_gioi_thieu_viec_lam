// Du lieu
	function validateDuLieu1(idItem1, idItem2Cu, idItem2, idMessage, idCuaSo, idNenCuaSo){
		let data1;
		if(idItem1 != '')
			data1 = document.getElementById(idItem1).value;
		if(idItem2Cu != '' )
			data2Cu = document.getElementById(idItem2Cu).value;
		let data2 = document.getElementById(idItem2).value;
		let validate1 = validateEmpty(idItem2, idMessage);
		let validate2 = validateKyTuTen(idItem2, idMessage);

		if(validate1 == false || validate2 == false)
			return;
		else{
			if(idItem2 == 'them-hoc-van'){
				$.ajax({
					url: "../ajax_action/admin/them_thong_tin_action.php",
					method: "POST",
					data:{tenHocVan:data2},
					success:function(data){
						if(data == 'Bị trùng'){
							alert('Dữ liệu đã tồn tại! Vui lòng kiểm tra lại!');
						}else{
							alert('Thêm thành công!');
							dongCuaSo(idCuaSo, idNenCuaSo);
							location.reload();
						}
					}
				});
			}
			if(idItem2 == 'them-khu-vuc'){
				$.ajax({
					url: "../ajax_action/admin/them_thong_tin_action.php",
					method: "POST",
					data:{tenKhuVuc:data2},
					success:function(data){
						if(data == 'Bị trùng'){
							alert('Dữ liệu đã tồn tại! Vui lòng kiểm tra lại!');
						}else{
							alert('Thêm thành công!');
							dongCuaSo(idCuaSo, idNenCuaSo);
							location.reload();
						}
					}
				});
			}
			if(idItem2 == 'them-linh-vuc'){
				$.ajax({
					url: "../ajax_action/admin/them_thong_tin_action.php",
					method: "POST",
					data:{tenLinhVuc:data2},
					success:function(data){
						if(data == 'Bị trùng'){
							alert('Dữ liệu đã tồn tại! Vui lòng kiểm tra lại!');
						}else{
							alert('Thêm thành công!');
							dongCuaSo(idCuaSo, idNenCuaSo);
							location.reload();
						}
					}
				});
			}
			if(idItem2 == 'them-kinh-nghiem'){
				$.ajax({
					url: "../ajax_action/admin/them_thong_tin_action.php",
					method: "POST",
					data:{tenKinhNghiem:data2},
					success:function(data){
						if(data == 'Bị trùng'){
							alert('Dữ liệu đã tồn tại! Vui lòng kiểm tra lại!');
						}else{
							alert('Thêm thành công!');
							dongCuaSo(idCuaSo, idNenCuaSo);
							location.reload();
						}
					}
				});
			}

			if(idItem2 == 'sua-hoc-van'){
				$.ajax({
					url: "../ajax_action/admin/sua_thong_tin_action.php",
					method: "POST",
					data:{maHocVan:data1,tenHocVan:data2, tenHocVanCu:data2Cu},
					success:function(data){
						if(data == 'Bị trùng'){
							alert('Dữ liệu đã tồn tại! Vui lòng kiểm tra lại!');
						}else{
							alert('Cập nhật thành công!');
							dongCuaSo(idCuaSo, idNenCuaSo);
							location.reload();
						}
					}
				});
			}
			if(idItem2 == 'sua-khu-vuc'){
				$.ajax({
					url: "../ajax_action/admin/sua_thong_tin_action.php",
					method: "POST",
					data:{maKhuVuc:data1,tenKhuVuc:data2,tenKhuVucCu:data2Cu},
					success:function(data){
						if(data == 'Bị trùng'){
							alert('Dữ liệu đã tồn tại! Vui lòng kiểm tra lại!');
						}else{
							alert('Cập nhật thành công!');
							dongCuaSo(idCuaSo, idNenCuaSo);
							location.reload();
						}
					}
				});
			}
			if(idItem2 == 'sua-linh-vuc'){
				$.ajax({
					url: "../ajax_action/admin/sua_thong_tin_action.php",
					method: "POST",
					data:{maLinhVuc:data1,tenLinhVuc:data2,tenLinhVucCu:data2Cu},
					success:function(data){
						if(data == 'Bị trùng'){
							alert('Dữ liệu đã tồn tại! Vui lòng kiểm tra lại!');
						}else{
							alert('Cập nhật thành công!');
							dongCuaSo(idCuaSo, idNenCuaSo);
							location.reload();
						}
					}
				});
			}
			if(idItem2 == 'sua-kinh-nghiem'){
				$.ajax({
					url: "../ajax_action/admin/sua_thong_tin_action.php",
					method: "POST",
					data:{maKinhNghiem:data1,tenKinhNghiem:data2,tenKinhNghiemCu:data2Cu},
					success:function(data){
						if(data == 'Bị trùng'){
							alert('Dữ liệu đã tồn tại! Vui lòng kiểm tra lại!');
						}else{
							alert('Cập nhật thành công!');
							dongCuaSo(idCuaSo, idNenCuaSo);
							location.reload();
						}
					}
				});
			}
		}
	}
	function validateDuLieu2(idItem1, idItem2Cu, idItem2, idItem3, idMessage2, idMessage3, idCuaSo, idNenCuaSo){
		let data1;
		if(idItem1 != '')
			data1 = document.getElementById(idItem1).value;
		if(idItem2Cu != '' )
			data2Cu = document.getElementById(idItem2Cu).value;
		let data2 = document.getElementById(idItem2).value;
		let data3 = document.getElementById(idItem3).value;
		let validate1 = validateEmpty(idItem2, idMessage2);
		let validate2 = validateEmpty(idItem3, idMessage3);
		let validate3 = validateKyTuTen(idItem2, idMessage2);
		let validate4 = validateKyTuTen(idItem3, idMessage3);

		if(validate1 == false || validate2 == false || validate3 == false || validate4 == false)
			return;
		else{
			if(idItem2 == 'them-ten-lien-ket-internet'){
				$.ajax({
					url: "../ajax_action/admin/them_thong_tin_action.php",
					method: "POST",
					data:{tenLienKet:data2, bieuTuongLienKet:data3},
					success:function(data){
						if(data == 'Bị trùng'){
							alert('Dữ liệu đã tồn tại! Vui lòng kiểm tra lại!');
						}else{
							alert('Thêm thành công!');
							dongCuaSo(idCuaSo, idNenCuaSo);
							location.reload();
						}
					}
				});
			}else{
				$.ajax({
					url: "../ajax_action/admin/sua_thong_tin_action.php",
					method: "POST",
					data:{maLienKet:data1, tenLienKet:data2, tenLienKetCu:data2Cu, bieuTuongLienKet:data3},
					success:function(data){
						if(data == 'Bị trùng'){
							alert('Dữ liệu đã tồn tại! Vui lòng kiểm tra lại!');
						}else{
							alert('Cập nhật thành công!');
							dongCuaSo(idCuaSo, idNenCuaSo);
							location.reload();
						}
					}
				});
			}
		}
	}
	function loc(idLoc, idDS, tuKhoa){
		let loc = document.getElementById(idLoc).value;
		$.ajax({
			url: "../ajax_action/admin/loc_action.php",
			method: "POST",
			data:{loaiLocDuLieu:idLoc,locDuLieu:loc, tuKhoa:tuKhoa},
			success:function(data){
				document.getElementById(idDS).innerHTML = data;
			}
		});
	}
	function loadSuaDuLieu(sua, id, cuaSo){
		$.ajax({
			url: "../ajax_action/admin/mo_cua_so_thong_tin_action.php",
			method: "POST",
			data:{sua:sua, maDuLieu:id},
			success:function(data){
				document.getElementById(cuaSo).innerHTML = data;
			}
		});
	}
	function xoaDuLieu(xoa, id){
		if(confirm('Bạn chắc chắn muốn xóa? Điều này có thể ảnh hưởng đến nhiều dữ liệu khác của người dùng!')){
			$.ajax({
				url: "../ajax_action/admin/xoa_action.php",
				method: "POST",
				data:{xoa:xoa, maDuLieu:id},
				success:function(data){
					alert('Xóa thành công!');
					location.reload();
				}
			});
		}
	}

// Ung vien
	function moCuaSoXemUngVien(id){
		$.ajax({
			url: "../ajax_action/admin/mo_cua_so_thong_tin_action.php",
			method: "POST",
			data:{maUngVien:id},
			success:function(data){
				document.getElementById('cua-so-thong-tin-ung-vien').innerHTML = data;
			}
		});
	}

// Viec lam
	function moCuaSoXemViecLam(id){
		$.ajax({
			url: "../ajax_action/admin/mo_cua_so_thong_tin_action.php",
			method: "POST",
			data:{maViecLam:id},
			success:function(data){
				document.getElementById('cua-so-thong-tin-viec-lam').innerHTML = data;
			}
		});
	}