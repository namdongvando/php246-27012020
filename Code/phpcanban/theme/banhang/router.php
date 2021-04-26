<!-- điều hướng của theme -->
<?php
// lấy tên trang hiển thị
$page = isset($_GET["page"])?$_GET["page"]:"home";
if(isset($_GET["page"])){
    $page = $_GET["page"];
}else{
    $page = "home";
}
// đường dẩn file chứa nội dung
$_Content = __DIR__."/pages/{$page}.php";
// kiểm tra có file noi dung không
if(file_exists($_Content)==false){
// không có file này
echo $_Content;
exit("không có file này");
}
// include layout
include_once("layout.php");

?>