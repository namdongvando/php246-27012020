 // kiềm tra tình trang cua thong báo
var tinhTrang = sessionStorage.getItem("HienThongBao");
if(tinhTrang == "0"){
	AnHienThongBao(true);
}else{
	sessionStorage.setItem("HienThongBao", 1);
}

function AnHienThongBao(isShow) {
	// xóa các id mong muốn ThongBao | NoiDungThongBao
	 thongBao = document.getElementById('ThongBao');
	 // noiDungThongBao = document.getElementById('NoiDungThongBao');
	 thongBao.style.display = "none";	
	 // noiDungThongBao.style.display = "none";	
	 sessionStorage.setItem("HienThongBao", 0);

}
setTimeout(function(){
	AnHienThongBao(true);
},5000);

function KiemTraDangNhap(form) {
	// console.log(form.TaiKhoan.value);
	// console.log(form.MatKhau.value);
	try{

		var taiKhoan = document.getElementById("TaiKhoan");
		var matKhau = document.getElementById("MatKhau");
		if(taiKhoan.value == ""){
			taiKhoan.focus();
			throw "Bạn Chưa Nhập Tài Khoản!";
		}
		if(matKhau.value == ""){
			matKhau.focus();
			throw "Bạn Chưa Nhập Mật Khẩu!";
		}
		return true;
	}catch(ex){
		// alert(ex);
		document.getElementById("ThongBaoDangNhap").innerHTML=ex;

	}


	return false;
}

// $(document).ready(function(){

// });
$(function(){
	$(".LeftMenu ul li").click(function(){
		//console.log(this);
		$(".LeftMenu ul li ul").hide(1000);
		$(this).children("ul").toggle(1000);
	});

	$(".Menu ul li").click(function(){
		$(".Menu ul li").removeClass("active");
		$(this).toggleClass("active");	
	});

	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
	    }
	});

});
