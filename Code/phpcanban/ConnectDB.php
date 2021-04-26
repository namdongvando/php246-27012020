<?php
function DB()
{
    $mysqli = new mysqli("localhost", "root", "", "banhang");
    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }
    $mysqli->set_charset("utf8");
    return $mysqli;
    // $sql = "SELECT * FROM `nn_admin` WHERE 1";
    // $res = $mysqli->query($sql);
    // var_dump($res->fetch_array());
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
