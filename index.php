<?php

//    echo "Xin chao PHP";
//    $hoTen = "Teo Nguyen";
//    echo "Xin chao" . $hoTen;
//    $a = 6;
//    $b = 5;
//    $tong = $a+ $b;
//    echo $tong;
//    echo "+=============";
//    echo $a/$b;
//    echo "+=============";
//    echo $a%$b;
//    echo "+=============";
//    echo $a;
//    echo $b;
//    echo "+=============";
//    $c = $a;
//    $a =$b;
//    $b= $c;
//    echo "+=============";
//    echo $a;
//    echo $b;
//$a = 6;
//$b=3;
//$c = 10;
//// xac dinh chẵn lẻ
//if ($a % 2 == 0) {
//    echo "{$a} là so chan";
//} else {
//    echo "{$a} là số lẻ";
//}
//$max = a;
//
//if($max < b)
//    $max = b;
//if($max < c)
//    $max = c;
//echo $max."lon nhat";
//
//if($a > $b && $a > $c)
//    echo $a."Lon nhat";
//if($b > $a && $b > $c)
//    echo $b."Lon nhat";
//if($c > $b && $c > $a)
//    echo $c."Lon nhat";
// giai phuong trinh bac 1
$a = 0;
$b = 4;
try {
    
} catch (Exception $ex) {
    
}


try {
    if($a == 0)
    {
        if ($b == 0) {
            throw new Exception("Pt vô số nghiệm");
        } else {
            throw new Exception("Pt vô nghiệm");
        }
    }
    echo -$b / $a;
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>

