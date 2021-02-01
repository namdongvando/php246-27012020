<?php
// duong dan file
$filename = "abc/config.txt";
// kiem tra có thư muc "abc" chưa

if(is_dir("abc")==FALSE){
    // tao thu muc 
    mkdir("abc",0777);
}
// mo file
$fileObj =  fopen($filename, "w+");
fwrite($fileObj, "abc");
// doc file
echo file_get_contents($filename);
$pathFile = "https://i.pinimg.com/originals/ad/35/31/ad3531a813e748db93931c69f23abfba.jpg";
$pathFile = "http://nhatnghe.com/";

file_put_contents("nhanght.com.txt"
        ,file_get_contents($pathFile));

if(file_exists($filename)){
    // file da có
}

// kich thước file
filesize($filename);
fileatime($filename);
filectime($filename);



?>