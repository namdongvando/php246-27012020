<?php
define("Admin", "Admin");
define("QuanLy", "QuanLy");
define("NhanVien", "NhanVien");
define("Loi403", "/admin.php?page=loi403");
// php 5.6+
global $mysqli;
$mysqli = new mysqli("localhost", "root", "", "banhang");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
$mysqli->set_charset("utf8");


spl_autoload_register(function($className){
    //echo $className;
    $className = str_replace("\\","/",$className);
    //echo $className;
    include_once("{$className}.php");
});

function DB()
{ 
    global $mysqli;
    return  $mysqli; 
}
function GetRows($sql = null)
{
    $res =  DB()->query($sql);
    if ($res == null) {
        return null;
    }
    $a = [];
    while ($row = $res->fetch_assoc()) {
        $a[] = $row;
    }
    return $a;
}
function GetRow($sql = null)
{
    $res =  DB()->query($sql);
    if ($res == null) {
        return null;
    }
    return $res->fetch_assoc();
}
function Login($taiKhoan, $MatKhau)
{
    echo $sql = "SELECT * FROM `nn_admin` 
    WHERE `TaiKhoan` ='{$taiKhoan}' 
    and `MatKhau`= '{$MatKhau}'";
    return GetRow($sql);
}
function GetMenu()
{
    $sql = "SELECT * FROM `nn_menu` ORDER BY `STT` ASC";
    return GetRows($sql);
}
function PostMenu($menu)
{

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // sql insert
    $sql = "INSERT INTO `nn_menu`(`Ten`, `Link`, `HinhAnh`, `STT`, `HienThi`, `ViTri`, `Nhom`, `CapCha`, `GhiChu`) 
    VALUES ( 
        '{$menu["Ten"]}', 
        '{$menu["Link"]}', 
        '{$menu["HinhAnh"]}', 
        '{$menu["STT"]}', 
        '{$menu["HienThi"]}', 
        '{$menu["ViTri"]}', 
        '{$menu["Nhom"]}', 
        '{$menu["CapCha"]}', 
        '{$menu["GhiChu"]}')";
    DB()->query($sql);
    return DB()->insert_id;
}
function toUrl($url)
{
    header("Location: {$url}");
}
function DeleteMenuById($idMenu)
{
    $sql = "DELETE FROM `nn_menu` WHERE `Ma` = {$idMenu}";
    return DB()->query($sql);
}

function GetNhomUser($idUser = null)
{
    // lấy nhóm của user dang dang nhap
    if ($idUser == null) {
        $idUser = $_SESSION["QuanTri"]["MaUser"];
    }
    $sql = "SELECT * FROM `nn_admin_quyen` 
    WHERE MaUser = '{$idUser}'";
    return GetRows($sql);
}

function PhanQuyen($allow, $deny = null, $url = null)
{
    //var_dump($_SESSION["QuanTri"]);
    $DsNhom = GetNhomUser();
    foreach ($DsNhom as $key => $Nhom) {
        if (in_array($Nhom["MaNhom"], $allow)) {
            return true;
        }
    }

    if ($url != null) {
        toUrl($url);
        return;
    }
    return false;
}
function BoDauTiengViet($str)
{
    $unicode = array( 
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ', 
        'd' => 'đ', 
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ', 
        'i' => 'í|ì|ỉ|ĩ|ị', 
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ', 
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự', 
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ', 
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ', 
        'D' => 'Đ', 
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ', 
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị', 
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ', 
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự', 
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ', 
    ); 
    foreach ($unicode as $nonUnicode => $uni) { 
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    $str = str_replace(' ', '_', $str); 
    return $str;
}
function UpLoadImg($file, $path)
{
    // kiem tra có thư muc chưa?
    if(is_dir($path)==false){
        mkdir($path,0777);
    }
    // tao tên file
    $name = microtime();
    $name = str_replace(".", "", $name);
    $name = str_replace(" ", "_", $name);
    $file["name"] = BoDauTiengViet($file["name"]);
    $fileName = $name . $file["name"];
    // dường dẫn trên server
    $path = $path.$fileName;    
    copy($file["tmp_name"],$path);
    return "/$path";

}
