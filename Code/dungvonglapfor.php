<?php

//
//echo "Dung Vòng Lap For";
//for ($index = 1; $index <= 100; $index++) {
//    if ($index % 2 == 0) {
//        echo $index . "<br>";
//    } else {
//        echo $index . "<br>";
//    }
//}
//echo "Xuât bang cuu chuong <br>";
// 
//for ($i = 2; $i <= 9; $i++) {
//    for ($j = 1; $j <= 10; $j++) {
//        $kq = $i * $j;
//        echo "{$i} x {$j} = {$kq} <br>";    
//    }
//}
//intval($_GET["n"]);
//ep kieu từ chuỗi thành số
//cách 1
//$n = isset($_GET["n"]) ? intval($_GET["n"]) : 2;
////cach 2
//if (isset($_GET["n"])) {
//    $n = intval($_GET["n"]);
//} else {
//    $n = 2;
//}
//for ($i = 2; $i <= $n; $i++) {
//    if ($n % $i == 0) {
//        if ($n == $i) {
//            echo "La Nguyen To";
//        } else {
//            echo "{$n} không Phai La So Nguyen To";
//        }
//        break;
//    }
//}
$i = 1;
while ($i <= 100) {
   // echo $i."<br>:";
    echo rand(1, 100);
    echo "<br>";
    $i++;
}
date_default_timezone_set("Asia/Ho_Chi_Minh");
echo time();

echo date("d-m-Y H:i:s",time());
echo "<br>";
echo date("d-m-Y H:i:s", strtotime("2000-01-01 23:00:00"));

$BangChuCai = range("A", "Z");

var_dump($BangChuCai);
foreach ($BangChuCai as $value) {
    echo $value."<br>";
}

$BangChuCaiHoa = range("A", "Z");
$BangChuCaiThuong = range("a", "z");
$bangSo = range(0, 9);
echo "========";
// vi tri tri của các giá trị
echo $viTri1 = rand(0, count($BangChuCaiHoa)-1);
echo $viTri2 = rand(0, count($BangChuCaiThuong)-1);
echo $viTri3 = rand(0, count($bangSo)-1);

echo $BangChuCaiHoa[$viTri1]
        .$BangChuCaiThuong[$viTri2]
        .$bangSo[$viTri3];

$chuoiGoc = "123456";
echo "<br>";
echo md5($chuoiGoc);
echo "<br>";
echo sha1($chuoiGoc);
echo "<br>";

echo hash("sha256", $chuoiGoc);
echo "<br>";
echo $ChuoiMaHoa = base64_encode($chuoiGoc);
echo "<br>";
echo base64_decode($ChuoiMaHoa);
$chuoi = "abc_ced_efhg";
$mangChuoi = explode("_", $chuoi);
var_dump($mangChuoi);


?>
