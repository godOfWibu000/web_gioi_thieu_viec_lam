//Mo cua so
    function moCuaSo(cuaSo, nenCuaSo){
        document.getElementById(nenCuaSo).style.display = 'block';
        document.getElementById(cuaSo).style.transform = 'translateY(0)';
    }

//Dong cua so
    function dongCuaSo(cuaSo, nenCuaSo){
        document.getElementById(nenCuaSo).style.display = 'none';
        document.getElementById(cuaSo).style.transform = 'translateY(-150%)';
    }

// Dang nhap dang xuat
    //An hien mat khau
    function anHienMatKhau(idMatKhau, idIcon){
        let password = document.getElementById(idMatKhau);
        let icon = document.getElementById(idIcon);
        if(password.type == 'text'){
            password.type = 'password';
            icon.innerHTML = 'visibility'
        }
        else{
            password.type = 'text';
            icon.innerHTML = 'visibility_off'
        }
    }

    // Kiem tra dang nhap
    function kiemTraDangNhap(idEmail, idMatKhau, idMessage, action){
        let email = document.getElementById(idEmail).value;
        let matKhau = document.getElementById(idMatKhau).value;
        let message = document.getElementById(idMessage);
        $.ajax({
            url: action,
            method: "POST",
            data:{email:email, matKhau:matKhau},
            success:function(data){
                message.innerHTML = data;
                if(message.innerHTML == "Đăng nhập thành công!"){
                    message.style.color = 'green';
                    setTimeout("location.reload(true);", 2000);
                }else{
                    if(email == '' || matKhau == ''){
                        message.innerHTML = 'Vui lòng nhập đầy đủ thông tin!';
                    }
                    else if(matKhau.length < 8){
                        message.innerHTML = 'Mật khẩu phải từ 8 ký tự trở lên!';
                    }else{
                        message.innerHTML = data;
                    }
                    message.style.color = 'red';
                }
            }
        });
    }

    // Dang xuat
    function dangXuat(action, location){
        if (confirm('Bạn chắc chắn muốn đăng xuất?')){
            $.ajax({
                url: action,
                method: "POST",
                data:{},
                success:function(data){
                    alert('Đã đăng xuất!');
                    window.location = location;
                }
            });
        }
    }

// Menu
    $(document).ready(function(){
            $('#toggle').click(function(){
            $('#menu').slideToggle();
        });
    })

// Up-top
    window.addEventListener('scroll', function(){
        let header = document.querySelector("header");
        let uptop = document.getElementById("up-top");
        let anhbia = document.getElementById("anh-bia-nha-tuyen-dung");
        header.classList.toggle("sticky", window.scrollY > 0);
        uptop.classList.toggle("up-top-top", window.scrollY > 0);
        anhbia.classList.toggle("opacity-anh-bia", window.scrollY > 0);
    })
    $("#up-top").click(function(){
        $('html, body').animate({scrollTop: 0}, 700);
    });

//Dieu huong trang
    function ctViecLam(link){
        window.location=link;
    }

    function dieuHuongTrang(link){
        window.location = link;
    }

// Chia se

function rateStar(){
    let numberStar = document.getElementById('number-star');
    let star1 = document.getElementById('star1');
    let star2 = document.getElementById('star2');
    let star3 = document.getElementById('star3');
    let star4 = document.getElementById('star4');
    let star5 = document.getElementById('star5');
    if(numberStar.innerHTML == '1'){
        star1.innerHTML = '<i class="fas fa-star"></i>'; 
    }else if(numberStar.innerHTML == '2'){
        star1.innerHTML = '<i class="fas fa-star"></i>';
        star2.innerHTML = '<i class="fas fa-star"></i>'; 
    }else if(numberStar.innerHTML == '3'){
        star1.innerHTML = '<i class="fas fa-star"></i>'; 
        star2.innerHTML = '<i class="fas fa-star"></i>';
        star3.innerHTML = '<i class="fas fa-star"></i>'; 
    }else if(numberStar.innerHTML == '4'){
        star1.innerHTML = '<i class="fas fa-star"></i>'; 
        star2.innerHTML = '<i class="fas fa-star"></i>';
        star3.innerHTML = '<i class="fas fa-star"></i>';
        star4.innerHTML = '<i class="fas fa-star"></i>';
    }else if(numberStar.innerHTML == '5'){
        star1.innerHTML = '<i class="fas fa-star"></i>'; 
        star2.innerHTML = '<i class="fas fa-star"></i>';
        star3.innerHTML = '<i class="fas fa-star"></i>';
        star4.innerHTML = '<i class="fas fa-star"></i>';
        star5.innerHTML = '<i class="fas fa-star"></i>';
    }else{
        for (let i = 1; i <= 9; i++) {
            if(numberStar.innerHTML == '1.' + i){
                star1.innerHTML = '<i class="fas fa-star"></i>';
                star2.innerHTML = '<i class="fas fa-star-half-alt"></i>';
            }else if(numberStar.innerHTML == '2.' + i){
                star1.innerHTML = '<i class="fas fa-star"></i>';
                star2.innerHTML = '<i class="fas fa-star"></i>';
                star3.innerHTML = '<i class="fas fa-star-half-alt"></i>';
            }else if(numberStar.innerHTML == '3.' + i){
                star1.innerHTML = '<i class="fas fa-star"></i>';
                star2.innerHTML = '<i class="fas fa-star"></i>';
                star3.innerHTML = '<i class="fas fa-star"></i>';
                star4.innerHTML = '<i class="fas fa-star-half-alt"></i>';
            }else if(numberStar.innerHTML == '4.' + i){
                star1.innerHTML = '<i class="fas fa-star"></i>';
                star2.innerHTML = '<i class="fas fa-star"></i>';
                star3.innerHTML = '<i class="fas fa-star"></i>';
                star4.innerHTML = '<i class="fas fa-star"></i>';
                star5.innerHTML = '<i class="fas fa-star-half-alt"></i>';
            }
        }
    }
}

function loadPage(){
    let stars = document.getElementById('stars');
    if(stars != null)
        rateStar();
}

function ungTuyen(){
    let buttonDangNhap = document.getElementById('button-dang-nhap');
    if(buttonDangNhap.innerHTML.trim() == 'Đăng nhập'){
        let loginFrame = document.getElementById("login-frame");
        loginFrame.style.display = 'block';
    }else{
        window.location="ung-tuyen.php";
    }
}

// Danh gia
    function doiSoSaoDanhGia(soSao){
        let star1 = document.getElementById('star-1');
        let star2 = document.getElementById('star-2');
        let star3 = document.getElementById('star-3');
        let star4 = document.getElementById('star-4');
        let star5 = document.getElementById('star-5');
        let soSaoDanhGia = document.getElementById('so-sao-danh-gia');

        if(soSao == '1'){
            star1.innerHTML = '<i class="fas fa-star"></i>';
            star2.innerHTML = star3.innerHTML = star4.innerHTML = star5.innerHTML = '<i class="far fa-star"></i>';
            soSaoDanhGia.value = '1';
        }
        if(soSao == '2'){
            star1.innerHTML = star2.innerHTML = '<i class="fas fa-star"></i>';
            star3.innerHTML = star4.innerHTML = star5.innerHTML = '<i class="far fa-star"></i>';
            soSaoDanhGia.value = '2';
        }
        if(soSao == '3'){
            star1.innerHTML = star2.innerHTML = star3.innerHTML = '<i class="fas fa-star"></i>';
            star4.innerHTML = star5.innerHTML = '<i class="far fa-star"></i>';
            soSaoDanhGia.value = '3';
        }
        if(soSao == '4'){
            star1.innerHTML = star2.innerHTML = star3.innerHTML = star4.innerHTML = '<i class="fas fa-star"></i>';
            star5.innerHTML = '<i class="far fa-star"></i>';
            soSaoDanhGia.value = '4';
        }
        if(soSao == '5'){
            star1.innerHTML = star2.innerHTML = star3.innerHTML = star4.innerHTML = star5.innerHTML = '<i class="fas fa-star"></i>';
            soSaoDanhGia.value = '5';
        }
    }

// Quan tam
    function quanTam(maViecLam, email, trangThai, action){
        let ds = document.getElementsByClassName(maViecLam);
        $.ajax({
            url: action,
            method: "POST",
            data:{maViecLam:maViecLam, email:email, trangThai:trangThai},
            success:function(data){
                if(action == "ajax_action/viec_lam/quan_tam_action.php"){
                    for(x of ds)
                        x.innerHTML = data;
                }else
                    location.reload();
            }
        });
    }

// Validate
    function validateEmpty(item, message){
        let validateItem = document.getElementById(item);
        let validateMessage = document.getElementById(message);

        if(validateItem.value == ''){
            validateMessage.textContent = 'Vui lòng nhập vào trường này!';
            return false;
        }
        else{
            validateMessage.textContent = '';
            return true;
        }
    }
    function validateSelect(item, message){
        let validateItem = document.getElementById(item);
        let validateMessage = document.getElementById(message);
        if(validateItem.value == 'Lựa chọn'){
            validateMessage.textContent = 'Vui lòng chọn 1 lựa chọn!';
            return false;
        }
        else{
            validateMessage.textContent = '';
            return true;
        }
    }
    function validateKyTuTen(item, message){
        let validateItem = document.getElementById(item);
        let validateMessage = document.getElementById(message);

        if(validateItem.value.length > 100 && validateItem.value != ''){
            validateMessage.textContent = 'Số ký tự giới hạn là 100! Vui lòng kiểm tra lại!';
            return false;
        }
        else if(validateItem.value.length > 0){
            validateMessage.textContent = '';
            return true;
        }
    }
    function validateKyTuDiaChi(item, message){
        let validateItem = document.getElementById(item);
        let validateMessage = document.getElementById(message);

        if(validateItem.value.length > 500 && validateItem.value != ''){
            validateMessage.textContent = 'Số ký tự giới hạn là 500! Vui lòng kiểm tra lại!';
            return false;
        }
        else if(validateItem.value.length > 0){
            validateMessage.textContent = '';
            return true;
        }
    }
    function validateKyTuMoTa(item, message){
        let validateItem = document.getElementById(item);
        let validateMessage = document.getElementById(message);

        if(validateItem.value.length > 1000 && validateItem.value != ''){
            validateMessage.textContent = 'Số ký tự giới hạn là 1000! Vui lòng kiểm tra lại!';
            return false;
        }
        else if(validateItem.value.length > 0){
            validateMessage.textContent = '';
            return true;
        }
    }
    function validateSDT(item, message){
        let validateItem = document.getElementById(item);
        let validateMessage = document.getElementById(message);
        let validateDot = 1;
        for(x of validateItem.value){
            if(x == '.')
                validateDot = 0;
        }

        if(validateItem.value.length > 10 || validateItem.value.length < 10 || isNaN(validateItem.value) || validateItem.value['0'] != '0' || validateDot == 0){
            validateMessage.textContent = 'Số điện thoại không hợp lệ! Vui lòng kiểm tra lại!';
            return false;
        }
        else if(validateItem.value.length == 10 && !isNaN(validateItem.value)){
            validateMessage.textContent = '';
            return true;
        }
    }
    function validateEmail(item, message){
        let validateItem = document.getElementById(item);
        let validateMessage = document.getElementById(message);
        for(x of validateItem.value){
            if(x == '@'){
                validateMessage.textContent = '';
                return true;
            }
            else{
                validateMessage.textContent = 'Email không hợp lệ! Vui lòng kiểm tra lại!';
            }
        }
        return false;
    }
    function validateMatKhau(item, message){
        let validateItem = document.getElementById(item);
        let validateMessage = document.getElementById(message);

        if(validateItem.value.length < 8 && validateItem.value != ''){
            validateMessage.textContent = 'Mật khẩu phải có từ 8 ký tự trở lên! Vui lòng kiểm tra lại!';
            return false;
        }
        else if(validateItem.value.length >= 8){
            validateMessage.textContent = '';
            return true;
        }
    }

// Get ngay thang
    function getThoiGian(){
        let d = new Date;
        let thoiGian = d.getFullYear();
        let thang = d.getMonth()+1;
        if(thang<10)
            thang = '0' + thang;
        let ngay = d.getDate();
        if(ngay<10)
            ngay = '0' + ngay;
        let gio = d.getHours();
        if(gio<10)
            gio = '0' + gio;
        let phut = d.getMinutes();
        if(phut<10)
            phut = '0' + phut;
        let giay = d.getSeconds();
        if(giay<10)
            giay = '0' + giay;
        thoiGian += ('-' + thang + '-' + ngay + ' ' + gio + ':' + phut + ':' + giay);

        return thoiGian;
    }

    function getNgayThang(){
        let d = new Date;
        let thoiGian = d.getFullYear();
        let thang = d.getMonth()+1;
        if(thang<10)
            thang = '0' + thang;
        let ngay = d.getDate();
        if(ngay<10)
            ngay = '0' + ngay;
        thoiGian += ('-' + thang + '-' + ngay);

        return thoiGian;
    }