// Dong mo menu
	function moMenu(){
		document.getElementById('taskbar').style.transform = 'translateX(0)';
		document.getElementById('noi-dung-taskbar-quan-ly-nha-tuyen-dung').style.opacity = '1';
		document.getElementById('button-menu').onclick = function() {dongMenu()};
	}

	function dongMenu(){
		document.getElementById('taskbar').style.transform = 'translateX(-290px)';
		document.getElementById('noi-dung-taskbar-quan-ly-nha-tuyen-dung').style.opacity = '0';
		document.getElementById('button-menu').onclick = function() {moMenu()};
	}

// Nha tuyen dung
	function validateThemNhaTuyenDung(gui){
		let idMaNhaTuyenDung = document.getElementById('ma-nha-tuyen-dung');
		let maNhaTuyenDung = null;
		if(idMaNhaTuyenDung != null)
			maNhaTuyenDung = idMaNhaTuyenDung.value;
		let tenNhaTuyenDung = document.getElementById('them-ten-nha-tuyen-dung').value;
		let sdt = document.getElementById('them-so-dien-thoai').value;
		let diaChi = document.getElementById('them-dia-chi').value;
		let moTa = document.getElementById('them-mo-ta').value;

		let validateTenNhaTuyenDung1 = validateEmpty('them-ten-nha-tuyen-dung', 'message-them-ten-nha-tuyen-dung');
		let validateTenNhaTuyenDung2 = validateKyTuTen('them-ten-nha-tuyen-dung', 'message-them-ten-nha-tuyen-dung');
		let validateSDT1 = validateEmpty('them-so-dien-thoai', 'message-them-so-dien-thoai');
		let validateSDT2 = validateSDT('them-so-dien-thoai', 'message-them-so-dien-thoai');
		let validateDiaChi1 = validateEmpty('them-dia-chi', 'message-them-dia-chi');
		let validateDiaChi2 = validateKyTuDiaChi('them-dia-chi', 'message-them-dia-chi');
		let validateMoTa = validateKyTuMoTa('them-mo-ta', 'message-them-mo-ta');

		if(validateTenNhaTuyenDung1 == false || validateTenNhaTuyenDung2 == false || validateSDT1 == false || validateSDT2 == false || validateDiaChi1 == false || validateDiaChi2 == false || validateMoTa == false)
			return;
		else{
			if(gui == 'Thêm'){
				$.ajax({
					url: "../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/bo_sung_thong_tin_co_ban_action.php",
					method: "POST",
					data:{tenNhaTuyenDung:tenNhaTuyenDung, sdt:sdt, diaChi:diaChi, moTa:moTa},
					success:function(data){
						alert('Thêm thành công!');
						dongCuaSo('cua-so-bo-sung-thong-tin-co-ban-nha-tuyen-dung', 'nen-cua-so-bo-sung-thong-tin-co-ban-nha-tuyen-dung');
						location.reload();
					}
				});
			}else{
				$.ajax({
					url: "../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/cap_nhat_thong_tin_co_ban_action.php",
					method: "POST",
					data:{maNhaTuyenDung:maNhaTuyenDung, tenNhaTuyenDung:tenNhaTuyenDung, sdt:sdt, diaChi:diaChi, moTa:moTa},
					success:function(data){
						alert('Cập nhật thành công!');
						dongCuaSo('cua-so-sua-thong-tin-co-ban-nha-tuyen-dung', 'nen-cua-so-sua-thong-tin-co-ban-nha-tuyen-dung');
						location.reload();
					}
				});
			}
		}
	}

	function xoaThongTinNhaTuyenDung(){
		if(confirm('Bạn có chắc chắn muốn xóa thông tin nhà tuyển dụng?')){
			$.ajax({
				url: "../ajax_action/xoa_thong_tin_nha_tuyen_dung_action.php",
				method: "POST",
				data:{},
				success:function(data){
					alert(data);
					location.reload();
				}
			});
		}
	}

// Viec lam
	// Loc viec lam
		function locViecLam() {
			let locViecLamTheoTrangThai = document.querySelectorAll('#loc-viec-lam-theo-trang-thai input');
			let trangThai;
			for(key of locViecLamTheoTrangThai)
			{
				if(key.checked == true){
					trangThai = key.value;
				}
			}
			
			let thoiGian = document.getElementById('loc-viec-lam-theo-thoi-gian').value;

			let locVL = trangThai + '-' + thoiGian;
			let tuKhoa = null;
			let idTuKhoa = document.getElementById('tu-khoa-tim-kiem-viec-lam');
			if(idTuKhoa != null)
				tuKhoa = idTuKhoa.textContent;

			$.ajax({
				url: "../ajax_action/quan_ly_nha_tuyen_dung/loc_action.php",
				method: "POST",
				data:{locVL:locVL, tuKhoa:tuKhoa},
				success:function(data){
					document.getElementById('ds-viec-lam').innerHTML = data;
				}
			});
		}

	// Validate
		function validateViecLam(gui) {
			let tenViecLam = document.getElementById('them-ten-viec-lam').value;
			let mucLuong = document.getElementById('them-muc-luong-viec-lam').value;
			let moTa = document.getElementById('them-mo-ta-viec-lam').value;
			let thoiGianBatDau = document.getElementById('them-thoi-gian-ung-tuyen-viec-lam').value;
			let hanUngTuyen = document.getElementById('them-han-ung-tuyen-viec-lam').value;
			let soLuongTuyenDung = document.getElementById('them-so-luong-ung-tuyen-viec-lam').value;

			let validateTenViecLam = validateEmpty('them-ten-viec-lam', 'message-them-ten-viec-lam');
			let validateLinhVuc = validateSelect('lua-chon-them-linh-vuc-viec-lam', 'message-lua-chon-them-linh-vuc-viec-lam');
			let validateKhuVuc = validateSelect('lua-chon-them-khu-vuc-viec-lam', 'message-lua-chon-them-khu-vuc-viec-lam');
			let validateHocVan = validateSelect('lua-chon-them-hoc-van-viec-lam', 'message-lua-chon-them-hoc-van-viec-lam');
			let validateKinhNghiem = validateSelect('lua-chon-them-kinh-nghiem-viec-lam', 'message-lua-chon-them-kinh-nghiem-viec-lam');
			let validateMucLuong = validateEmpty('them-muc-luong-viec-lam', 'message-them-muc-luong-viec-lam');
			let validateThoiGianTuyenDung = validateEmpty('them-thoi-gian-ung-tuyen-viec-lam', 'message-them-thoi-gian-ung-tuyen-viec-lam');
			let validateHanUngTuyen = validateEmpty('them-han-ung-tuyen-viec-lam', 'message-them-han-ung-tuyen-viec-lam');
			let validateSoLuongTuyenDung = validateEmpty('them-so-luong-ung-tuyen-viec-lam', 'message-them-so-luong-ung-tuyen-viec-lam');

			if(thoiGianBatDau >= hanUngTuyen)
				document.getElementById('message-them-han-ung-tuyen-viec-lam').textContent = 'Vui lòng kiểm tra thời gian!';

			if (validateTenViecLam == false || validateLinhVuc == false || validateKhuVuc == false || validateHocVan == false || validateKinhNghiem == false || validateMucLuong == false || validateThoiGianTuyenDung == false || validateHanUngTuyen == false || validateSoLuongTuyenDung == false || thoiGianBatDau >= hanUngTuyen)
				return;
			else{
				let idLVVL = document.getElementById('lua-chon-them-linh-vuc-viec-lam').value;

				let idKVVL = document.getElementById('lua-chon-them-khu-vuc-viec-lam').value;

				let idHVVL = document.getElementById('lua-chon-them-hoc-van-viec-lam').value;

				let idKNVL = document.getElementById('lua-chon-them-kinh-nghiem-viec-lam').value;

				if(gui == 'Thêm'){
					thoiGianDangViecLam = getThoiGian();
					$.ajax({
						url: "../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/bo_sung_chi_tiet_thong_tin_bo_sung_action.php",
						method: "POST",
						data:{tenViecLam:tenViecLam, idLVVL:idLVVL, idKVVL:idKVVL, idHVVL:idHVVL, idKNVL:idKNVL, mucLuong:mucLuong, moTa:moTa, thoiGianDangViecLam:thoiGianDangViecLam, thoiGianBatDau:thoiGianBatDau, hanUngTuyen:hanUngTuyen, soLuongTuyenDung:soLuongTuyenDung},
						success:function(data){
							alert('Thêm thành công!');
							dongCuaSo('cua-so-them-viec-lam', 'nen-cua-so-them-viec-lam');
							location.reload();
						}
					});
				}else{
					let maViecLam = document.getElementById('ma-viec-lam').textContent;
					let trangThai = document.getElementById('lua-chon-them-trang-thai-viec-lam').value;
					$.ajax({
						url: "../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/cap_nhat_chi_tiet_thong_tin_bo_sung_action.php",
						method: "POST",
						data:{maViecLam:maViecLam, tenViecLam:tenViecLam, idLVVL:idLVVL, idKVVL:idKVVL, idHVVL:idHVVL, idKNVL:idKNVL, mucLuong:mucLuong, moTa:moTa, thoiGianBatDau:thoiGianBatDau, hanUngTuyen:hanUngTuyen, soLuongTuyenDung:soLuongTuyenDung, trangThai:trangThai},
						success:function(data){
							alert('Cập nhật thành công!');
							dongCuaSo('cua-so-sua-viec-lam', 'nen-cua-so-sua-viec-lam');
							location.reload();
						}
					});
				}
			}

		}

	// Xoa viec lam
		function xoaViecLam(){
			if(confirm('Bạn có chắc muốn xóa việc làm này?')){
				let maViecLam = document.getElementById('ma-viec-lam').textContent;
				$.ajax({
					url: "../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/xoa_chi_tiet_thong_tin_bo_sung_action.php",
					method: "POST",
					data:{maViecLam:maViecLam},
					success:function(data){
						alert('Xóa thành công!');
						window.location = 'quan-ly-viec-lam-nha-tuyen-dung.php';
					}
				});
			}
		}

// Tuyen dung
	function locHoSoUngTuyen(){
		let trangThai = document.getElementById('loc-theo-trang-thai').value;
		let thoiGian = document.getElementById('loc-theo-thoi-gian').value;
		let locUngTuyen = trangThai + '-' + thoiGian;

		let maViecLam = null;
		let idMaViecLam = document.getElementById('ma-viec-lam');
		if(idMaViecLam != null)
			maViecLam = idMaViecLam.textContent;

		let tuKhoa = null;
		let idTuKhoa = document.getElementById('tu-khoa-tim-kiem-ho-so');
		if(idTuKhoa != null)
			tuKhoa = idTuKhoa.textContent;
		$.ajax({
			url: "../ajax_action/quan_ly_nha_tuyen_dung/loc_action.php",
			method: "POST",
			data:{locUngTuyen:locUngTuyen, maViecLam:maViecLam, tuKhoa:tuKhoa},
			success:function(data){
				document.getElementById('ds-ho-so-ung-tuyen').innerHTML = data;
			}
		});
	}

	function locDanhGiaViecLam(){
		let locDanhGia = document.getElementById('loc-danh-gia').value;
		let maViecLam = null;
		let idMaViecLam = document.getElementById('ma-viec-lam');
		if(idMaViecLam != null)
			maViecLam = idMaViecLam.textContent;
		$.ajax({
			url: "../ajax_action/quan_ly_nha_tuyen_dung/loc_action.php",
			method: "POST",
			data:{locDanhGia:locDanhGia, maViecLam:maViecLam},
			success:function(data){
				document.getElementById('ds-danh-gia-viec-lam').innerHTML = data;
			}
		});
	}

	function chuyenTrangThaiUngTuyen(id1, id2, trangThai) {
		$.ajax({
			url: "../ajax_action/quan_ly_nha_tuyen_dung/chuyen_trang_thai_action.php",
			method: "POST",
			data:{maUngVien:id1, maViecLam:id2, trangThaiUngTuyen:trangThai},
			success:function(data){
				location.reload();
			}
		});
	}

	function xoaHoSoUngTuyen(id1, id2){
		if (confirm('Bạn có chắc muốn xóa hồ sơ này?')){
			$.ajax({
				url: "../ajax_action/quan_ly_nha_tuyen_dung/xoa_action.php",
				method: "POST",
				data:{maUngVien:id1, maViecLam:id2},
				success:function(data){
					location.reload();
				}
			});
		}
	}