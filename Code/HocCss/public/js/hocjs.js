var Tong =0;
// ngày tháng 

function NgayHienTai() {
	var date = new Date();	
	
	// console.log(date.getFullYear());
	// console.log(date.getMonth());
	// console.log(date.getDate());
	// console.log(date.getHours());
	// console.log(date.getMinutes());
	// console.log(date.getSeconds());
	// console.log(date.getMilliseconds());
	// console.log(date.getTime());
	var gioHienTai =
		date.getHours() +":" 
		+ date.getMinutes() +":" 
		+ date.getSeconds();
	// console.log(gioHienTai);
	document.getElementById("dongHo").innerHTML=gioHienTai;
}
setInterval(function(){
	NgayHienTai();
},1000)


function GiaiPTB1C2() {
	
	try{
		var SoA = document.getElementById("Pt1SoA");
		// lấy giá trị b
		var SoB = document.getElementById("Pt1SoB");
		// ep kiểu string->number
		var a= parseFloat(SoA.value);
		var b= parseFloat(SoB.value);
		if(a==0){
			if(b==0){
				throw "PT VSN";
			}else{
				throw "PT VN";
			}
		}
		alert(-b/a);
	}catch(ex){
		//alert(ex);
		console.log(ex)
	}	
}


function GiaiPTB1() {
	// lấy giá trị a
	var SoA = document.getElementById("Pt1SoA");
	// lấy giá trị b
	var SoB = document.getElementById("Pt1SoB");
	// ep kiểu string->number
	var a= parseFloat(SoA.value);
	var b= parseFloat(SoB.value);
	if(a==0){
		if(b==0){
			alert("PT VSN");
		}else{
			alert("PT VN");
		}
	}else{
		alert(-b/a);
	}
	
}

var HieuHaiSo = function(a,b){
	return a-b;
}

function TongHaiSo(a,b) {
			return a + b;
}

function XacDinhChanLe() {
	// bước 1  lấy giá trị số nguyên
	var soNguyen = document.getElementById("SoNguyen");
	// bước 2 ep kiểu
	var soNguyenInt = parseInt(soNguyen.value);
	// bước 3 chia lấy dư 2
	if(soNguyenInt%2==0){
		alert(soNguyenInt + " Là số chẵn");
	}else{
		alert(soNguyenInt + " Là số Lẻ");
	}

	// bước 4 kết luận	
		Tong ++;
		console.log("tong="+Tong);
}

function XinChao() {
	var name = document.getElementById('name');
	alert("xin chào! " + name.value);	
}
function TinhTong() {
	// lấy giá trị a
	var SoA = document.getElementById("SoThu1");
	// lấy giá trị b
	var SoB = document.getElementById("SoThu2");
	// ep kiểu string->number
	var a= parseFloat(SoA.value);
	var b= parseFloat(SoB.value);
	// xuất ra kiểu dữ liệu của các biếm
	console.log(typeof SoA.value);
	console.log(typeof SoB.value);
	console.log(typeof a);
	console.log(typeof b);
	// truyền tham số / tham trị
	alert(TongHaiSo(a,b));


}