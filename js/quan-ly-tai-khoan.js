// Dang ky tai khoan
	function validateThemTaiKhoan(){
		let validateEmail1 = validateEmpty('email', 'message-email');
		let validateEmail2 = validateKyTuTen('email', 'message-email');
		let validateEmail3 = validateEmail('email', 'message-email');
		let validateMatKhau1 = validateEmpty('mat-khau-1', 'message-mat-khau-1');
		let validateMatKhau2 = validateEmpty('mat-khau-2', 'message-mat-khau-2');
		let validateMatKhau3 = validateMatKhau('mat-khau-1', 'message-mat-khau-1')

		let loaiTaiKhoan = document.getElementById('lua-chon-loai-tai-khoan').value;
		let email = document.getElementById('email').value;
		let matKhau1 = document.getElementById('mat-khau-1').value;
		let matKhau2 = document.getElementById('mat-khau-2').value;

		if(matKhau1 != matKhau2)
			document.getElementById('message-mat-khau-2').textContent = 'Vui lòng kiểm tra lại mật khẩu!';

		if(validateEmail1 == false || validateEmail2 == false || validateEmail3 == false || validateMatKhau1 == false || validateMatKhau2 == false || validateMatKhau3 == false || matKhau1 != matKhau2)
			return;
		else{
			$.ajax({
				url: "ajax_action/quan_ly_ung_vien_nha_tuyen_dung/bo_sung_thong_tin_co_ban_action.php",
				method: "POST",
				data:{email:email, matKhau:matKhau1, loaiTaiKhoan:loaiTaiKhoan},
				success:function(data){
					if(data == 'Email này đã tồn tại, vui lòng nhập email khác!')
						alert(data);
					else{
						alert('Đăng ký thành công!');
						window.location = "dang-nhap.php";
					}
				}
			});
		}
	}

// Quan ly tai khoan
	function quanLyTaiKhoan(cuaSoHien, cuaSoAn, menuHien, menuAn){
		document.getElementById(cuaSoHien).style.display = 'block';
		document.getElementById(cuaSoAn).style.display = 'none';
		document.getElementById(menuHien).style.border = '1px solid var(--main-color2)';
		document.getElementById(menuAn).style.border = '1px solid var(--border-color1)';
	}

	function quanLyTaiKhoan_xoaThongTin(txt) {
		if (confirm(txt)) {
		    if(txt == 'Bạn có muốn xóa thông tin ứng viên?'){
		    	$.ajax({
		            url: "ajax_action/xoa_thong_tin_ung_vien_action.php",
		            method: "POST",
		            data:{},
		            success:function(data){
		                alert(data);
		                location.reload();
		            }
		        });
		    }
		    else{
		    	$.ajax({
		            url: "ajax_action/xoa_tai_khoan_action.php",
		            method: "POST",
		            data:{},
		            success:function(data){
		                alert(data);
		            }
		        });
		    }
		}else{

		}
	}

// Validate thong tin
	function validateUngVien(gui){
		let validateHoTen1 = validateEmpty('them-ho-ten', 'message-them-ho-ten');
		let validateHoTen2 = validateKyTuTen('them-ho-ten', 'message-them-ho-ten');
		let validateSDT1 = validateSDT('them-so-dien-thoai', 'message-them-so-dien-thoai');
		let validateDiaChi1 = validateEmpty('them-dia-chi', 'message-them-dia-chi');
		let validateDiaChi2 = validateKyTuDiaChi('them-dia-chi', 'message-them-dia-chi');
		let validateMoTa = validateKyTuMoTa('them-mo-ta', 'message-them-mo-ta'); 

		let tenUngVien = document.getElementById('them-ho-ten').value;
		let ngaySinh = document.getElementById('them-ngay-sinh').value;
		let sdt = document.getElementById('them-so-dien-thoai').value;
		let diaChi = document.getElementById('them-dia-chi').value;
		let moTa = document.getElementById('them-mo-ta').value;

		if(validateHoTen1 == false || validateHoTen2 == false || validateSDT1 == false || validateDiaChi1 == false || validateDiaChi2 == false || validateMoTa == false)
			return;
		else{
			if(gui == 'Thêm')
				themThongTinUngVien(tenUngVien, ngaySinh, sdt, diaChi, moTa);
			else{
				$.ajax({
					url: "../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/cap_nhat_thong_tin_co_ban_action.php",
					method: "POST",
					data:{tenUngVien:tenUngVien, ngaySinh:ngaySinh, sdt:sdt, diaChi:diaChi, moTa:moTa},
					success:function(data){
						alert('Cập nhật thành công!');
						dongCuaSo('cua-so-sua-thong-tin-ung-vien', 'nen-cua-so-sua-thong-tin-ung-vien');
						location.reload();
					}
				});
			}
		}
	}

	function themThongTinUngVien(tenUngVien, ngaySinh, sdt, diaChi, moTa){
		let idHocVan = document.getElementById('lua-chon-them-moi-hoc-van').value;

		let idKinhNghiem = document.getElementById('lua-chon-them-moi-kinh-nghiem').value;

		$.ajax({
			url: "../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/bo_sung_thong_tin_co_ban_action.php",
			method: "POST",
			data:{tenUngVien:tenUngVien, ngaySinh:ngaySinh, sdt:sdt, diaChi:diaChi, moTa:moTa, idHV:idHocVan, idKN:idKinhNghiem},
			success:function(data){
				alert('Thêm thành công!');
				location.reload();
			}
		});
	}

// Sua thong tin ung vien
	function suaThongTinHocVanUngVien(){
		let id = document.getElementById('lua-chon-chinh-sua-hoc-van').value;
		$.ajax({
			url: "../ajax_action/quan_ly_ung_vien/cap_nhat_thong_tin_bo_sung_ung_vien_action.php",
			method: "POST",
			data:{idHV:id},
			success:function(data){
				alert('Cập nhật thành công!');
			}
		});
	}

	function suaThongTinKinhNghiemUngVien() {
		let id = document.getElementById('lua-chon-chinh-sua-kinh-nghiem').value;
		$.ajax({
			url: "../ajax_action/quan_ly_ung_vien/cap_nhat_thong_tin_bo_sung_ung_vien_action.php",
			method: "POST",
			data:{idKN:id},
			success:function(data){
				alert('Cập nhật thành công!');
			}
		});
	}

// Them thong tin chi tiet ung vien
	// Hoc van-ok
		function validateThemChiTietHocVan(idNoiHocTap, idThoiGianBatDau, idThoiGianKetThuc, idChonChuyenNganh, idGPA, messageNoiHocTap, messageThoiGianBatDau, messageThoiGianKetThuc, messageChonChuyenNganh){
			let noiHocTap = document.getElementById(idNoiHocTap).value;
			let thoiGianBatDauHoc = document.getElementById(idThoiGianBatDau).value;
			let thoiGianKetThucHoc = document.getElementById(idThoiGianKetThuc).value;
			let gpa = document.getElementById(idGPA).value;

			let validate1 = validateEmpty(idNoiHocTap, messageNoiHocTap);
			let validate2 = validateEmpty(idThoiGianBatDau, messageThoiGianBatDau);
			let validate3 = validateEmpty(idThoiGianKetThuc, messageThoiGianKetThuc);
			let validate4 = validateSelect(idChonChuyenNganh, messageChonChuyenNganh);

			if(thoiGianBatDauHoc == thoiGianKetThucHoc || parseInt(thoiGianBatDauHoc) > parseInt(thoiGianKetThucHoc))
				document.getElementById(messageThoiGianKetThuc).textContent = 'Vui lòng kiểm tra thời gian bắt đầu và kết thúc!';

			if(thoiGianBatDauHoc == thoiGianKetThucHoc || parseInt(thoiGianBatDauHoc) > parseInt(thoiGianKetThucHoc) || validate1 == false || validate2 == false || validate3 == false || validate4 == false)
				return;
			else{
				let idCN = document.getElementById(idChonChuyenNganh).value;
				if(idNoiHocTap == 'them-noi-hoc-tap'){
					$.ajax({
						url: "../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/bo_sung_chi_tiet_thong_tin_bo_sung_action.php",
						method: "POST",
						data:{noiHocTap:noiHocTap,idCN:idCN,thoiGianBatDauHoc:thoiGianBatDauHoc,thoiGianKetThucHoc:thoiGianKetThucHoc,gpa:gpa},
						success:function(data){
							alert('Thêm thành công!');
							dongCuaSo('cua-so-them-chi-tiet-hoc-van', 'nen-cua-so-them-chi-tiet-hoc-van');
							location.reload();
						}
					});
				}else{
					let maHocVanUngVien = document.getElementById('ma-hoc-van-ung-vien').value;
					$.ajax({
						url: "../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/cap_nhat_chi_tiet_thong_tin_bo_sung_action.php",
						method: "POST",
						data:{maHocVanUngVien:maHocVanUngVien,noiHocTap:noiHocTap,idCN:idCN,thoiGianBatDauHoc:thoiGianBatDauHoc,thoiGianKetThucHoc:thoiGianKetThucHoc,gpa:gpa},
						success:function(data){
							alert('Cập nhật thành công!');
							dongCuaSo('cua-so-sua-chi-tiet-hoc-van', 'nen-cua-so-sua-chi-tiet-hoc-van');
							location.reload();
						}
					});
				}
			}
		}

		function checkNamKetThuc(idCheckbox, idThoiGianKetThucHoc){
			let checkbox = document.getElementById(idCheckbox);
			let thoiGianKetThucHoc = document.getElementById(idThoiGianKetThucHoc);
			if(checkbox.checked == true){
				thoiGianKetThucHoc.type = 'text';
				thoiGianKetThucHoc.value = 'nay';
				thoiGianKetThucHoc.disabled = true;
			}
			else{
				thoiGianKetThucHoc.type = 'number';
				thoiGianKetThucHoc.value = '2012';
				thoiGianKetThucHoc.disabled = false;
			}
		}

	// Linh vuc-ok
		function validateThemChuyenMon(){
			if(validateSelect('lua-chon-them-moi-linh-vuc', 'message-lua-chon-them-moi-linh-vuc') == false)
				return;
			else{
				let idLV = document.getElementById('lua-chon-them-moi-linh-vuc').value;

				$.ajax({
					url: "../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/bo_sung_chi_tiet_thong_tin_bo_sung_action.php",
					method: "POST",
					data:{idLV:idLV},
					success:function(data){
						if(data == 'Bạn đã thêm thông tin này rồi! Vui lòng chọn thông tin khác!')
							alert(data);
						else{
							alert('Thêm thành công!');
							dongCuaSo('cua-so-them-chuyen-mon', 'nen-cua-so-them-chuyen-mon');
							location.reload();
						}
					}
				});
			}	
		}

	// Kinh nghiem-ok
		function validateThemKinhNghiem(idNoiLamViec, idViTriCongViec, idThoiGianBatDauCongViec, idThoiGianKetThucCongViec, messageNoiLamViec, messageViTriCongViec, messageThoiGianKetThucCongViec){
			let noiLamViec = document.getElementById(idNoiLamViec).value;
			let viTriCongViec = document.getElementById(idViTriCongViec).value;
			let thoiGianBatDauCongViec = document.getElementById(idThoiGianBatDauCongViec).value;
			let thoiGianKetThucCongViec = document.getElementById(idThoiGianKetThucCongViec).value;
			let validate1 = validateEmpty(idNoiLamViec, messageNoiLamViec);
			let validate2 = validateEmpty(idViTriCongViec, messageViTriCongViec);

			if (thoiGianBatDauCongViec == thoiGianKetThucCongViec || thoiGianBatDauCongViec > thoiGianKetThucCongViec)
				document.getElementById(messageThoiGianKetThucCongViec).textContent = 'Vui lòng kiểm tra thời gian bắt đầu và kết thúc!';
			else
				document.getElementById(messageThoiGianKetThucCongViec).textContent = '';

			if(thoiGianBatDauCongViec == thoiGianKetThucCongViec || thoiGianBatDauCongViec > thoiGianKetThucCongViec || validate1 == false || validate2 == false)
				return;
			else{
				if(idNoiLamViec == 'them-noi-lam-viec'){
					$.ajax({
						url: "../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/bo_sung_chi_tiet_thong_tin_bo_sung_action.php",
						method: "POST",
						data:{noiLamViec:noiLamViec, viTriCongViec:viTriCongViec, thoiGianBatDauCongViec:thoiGianBatDauCongViec, thoiGianKetThucCongViec:thoiGianKetThucCongViec},
						success:function(data){
							alert('Thêm thành công!');
							dongCuaSo('cua-so-them-chi-tiet-kinh-nghiem', 'nen-cua-so-them-chi-tiet-kinh-nghiem');
							location.reload();
						}
					});
				}else{
					let maKinhNghiemUngVien = document.getElementById('ma-kinh-nghiem-ung-vien').value;
					$.ajax({
						url: "../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/cap_nhat_chi_tiet_thong_tin_bo_sung_action.php",
						method: "POST",
						data:{maKinhNghiemUngVien:maKinhNghiemUngVien, noiLamViec:noiLamViec, viTriCongViec:viTriCongViec, thoiGianBatDauCongViec:thoiGianBatDauCongViec, thoiGianKetThucCongViec:thoiGianKetThucCongViec},
						success:function(data){
							alert('Cập nhật thành công!');
							dongCuaSo('cua-so-sua-chi-tiet-kinh-nghiem', 'nen-cua-so-sua-chi-tiet-kinh-nghiem');
							location.reload();
						}
					});
				}
			}

				
		}

	// Lien ket Internet-ok
		function validateThemLienKet(idDuongDanLienKet, messageDuongDanLienKet){
			let duongDanLienKet = document.getElementById(idDuongDanLienKet).value;
			let validate1 = validateSelect('lua-chon-them-lien-ket', 'message-them-lien-ket');
			let validate2 = validateEmpty(idDuongDanLienKet, messageDuongDanLienKet);

			if(idDuongDanLienKet == 'them-duong-dan-lien-ket')
			{
				if(validate1 == false || validate2 == false)
					return;
				else{
					let idLK = document.getElementById('lua-chon-them-lien-ket').value;
					$.ajax({
						url: "../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/bo_sung_chi_tiet_thong_tin_bo_sung_action.php",
						method: "POST",
						data:{idLK:idLK,duongDanLienKet:duongDanLienKet},
						success:function(data){
							if(data == 'Bạn đã thêm thông tin này rồi! Vui lòng chọn thông tin khác!')
								alert(data);
							else{
								alert('Thêm thành công!');
								dongCuaSo('cua-so-them-lien-ket-internet', 'nen-cua-so-them-lien-ket-internet');
								location.reload();
							}
						}
					});
				}
			}else{
				if(validate2 == false)
					return;
				else{
					let id = document.getElementById('sua-ma-lien-ket').value;
					$.ajax({
						url: "../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/cap_nhat_chi_tiet_thong_tin_bo_sung_action.php",
						method: "POST",
						data:{idLK:id, duongDanLienKet:duongDanLienKet},
						success:function(data){
							alert('Cập nhật thành công!');
							dongCuaSo('cua-so-sua-lien-ket-internet', 'nen-cua-so-sua-lien-ket-internet');
							location.reload();
						}
					});
				}
			}
		}

// Sua thong tin chi tiet ung vien
	function loadSuaHocVanUngVien(id){
		$.ajax({
			url: "../ajax_action/quan_ly_ung_vien/mo_cua_so_sua_thong_tin_hoc_van_ung_vien_action.php",
			method: "POST",
			data:{id:id},
			success:function(data){
				document.getElementById('cua-so-sua-chi-tiet-hoc-van').innerHTML = data;
			}
		});
	}

	function loadSuaKinhNghiemUngVien(id){
		$.ajax({
			url: "../ajax_action/quan_ly_ung_vien/mo_cua_so_sua_thong_tin_kinh_nghiem_ung_vien_action.php",
			method: "POST",
			data:{id:id},
			success:function(data){
				document.getElementById('cua-so-sua-chi-tiet-kinh-nghiem').innerHTML = data;
			}
		});
	}

	function loadSuaLienKetInternetUngVien(id, tenLienKet, duongDanLienKet){
		$.ajax({
			url: "../ajax_action/quan_ly_ung_vien/mo_cua_so_sua_thong_tin_lien_ket_internet_ung_vien_action.php",
			method: "POST",
			data:{id:id, tenLienKet:tenLienKet, duongDanLienKet:duongDanLienKet},
			success:function(data){
				document.getElementById('cua-so-sua-lien-ket-internet').innerHTML = data;
			}
		});
	}

// Xoa thong tin chi tiet ung vien
	function xoaChiTietThongTinHocVanUngVien(id){
		if (confirm('Bạn chắc chắn muốn xóa?')) {
		    $.ajax({
				url: "../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/xoa_chi_tiet_thong_tin_bo_sung_action.php",
				method: "POST",
				data:{idHV:id},
				success:function(data){
					alert('Xóa thành công!');
					location.reload();
				}
			});
		}else{

		}
	}

	function xoaChiTietThongTinLinhVucUngVien(id){
		if (confirm('Bạn chắc chắn muốn xóa?')) {
		    $.ajax({
				url: "../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/xoa_chi_tiet_thong_tin_bo_sung_action.php",
				method: "POST",
				data:{idLV:id},
				success:function(data){
					alert('Xóa thành công!');
					location.reload();
				}
			});
		}else{

		}
	}

	function xoaChiTietThongTinKinhNghiemUngVien(id){
		if (confirm('Bạn chắc chắn muốn xóa?')) {
		    $.ajax({
				url: "../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/xoa_chi_tiet_thong_tin_bo_sung_action.php",
				method: "POST",
				data:{idKN:id},
				success:function(data){
					alert('Xóa thành công!');
					location.reload();
				}
			});
		}else{

		}
	}

	function xoaChiTietThongTinLienKetInternetUngVien(id){
		if (confirm('Bạn chắc chắn muốn xóa?')) {
		    $.ajax({
				url: "../ajax_action/quan_ly_ung_vien_nha_tuyen_dung/xoa_chi_tiet_thong_tin_bo_sung_action.php",
				method: "POST",
				data:{idLK:id},
				success:function(data){
					alert('Xóa thành công!');
					location.reload();
				}
			});
		}else{

		}
	}

// Sua thong tin ung tuyen viec lam
	function loadSuaHoSoUngTuyen(id1, id2){
		$.ajax({
			url: "../ajax_action/quan_ly_ung_vien/mo_cua_so_sua_ung_tuyen_viec_lam_action.php",
			method: "POST",
			data:{maUngVien:id1, maViecLam:id2},
			success:function(data){
				document.getElementById('cua-so-sua-ung-tuyen-viec-lam').innerHTML = data;
			}
		});
	}

	function xoaCV(tenCV, maViecLam){
		if(confirm('Bạn có muốn xóa CV " ' + tenCV + '"?')){
			$.ajax({
				url: "../ajax_action/ung_tuyen/xoa_cv_action.php",
				method: "POST",
				data:{tenCV:tenCV, maViecLam:maViecLam},
				success:function(data){
					alert('Đã xóa thành công!');
					document.getElementById('cv').innerHTML = '';
				}
			});
		}
	}

	function xoaUngTuyen(id){
		if(confirm('Bạn có chắc chắn muốn xóa hồ sơ ứng tuyển này?')){
			$.ajax({
				url: "../ajax_action/ung_tuyen/xoa_action.php",
				method: "POST",
				data:{maViecLam:id},
				success:function(data){
					alert('Đã xóa thành công!');
					location.reload();
				}
			});
		}
	}