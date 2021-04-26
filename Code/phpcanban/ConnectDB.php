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
