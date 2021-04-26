<?php 

$file =  fopen("abc.txt","a+");
//fwrite($file,"abc");
$content = fread($file,filesize("abc.txt"));
fileperms("abc.txt");
fclose($file);
echo $content;
echo file_get_contents("abc.txt");


?>