<?php
ob_start();
session_start();

include_once("ConnectDB.php");
// lấy trang người dùng muốn hiển thị
$_page = isset($_GET["page"]) ? $_GET["page"] : "index";
$_action = isset($_GET["action"]) ? $_GET["action"] : null;
$_SESSION["QuanTri"] =
    isset($_SESSION["QuanTri"]) ? $_SESSION["QuanTri"] : null;

if ($_SESSION["QuanTri"] == null) {
    // Chưa đăng nhập
    // echo "Chưa Đăng Nhập";
    // chon trang dăng nhap
    $_page = "login";
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang Admin</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>

    <?php
    if ($_SESSION["QuanTri"] != null) {
    ?>
        <nav class="navbar navbar-default " style="margin-bottom: 0px;" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Quản Lý Nội Dung</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/admin.php?page=menu&action=index">Danh Sách Menu </a></li>
                            <li><a href="/admin.php?page=menu&action=post">Thêm </a></li>
                        </ul>
                    </li>
                    <li><a href="#">Link</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tài Khoản <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="/admin.php?page=logout">Thoát</a></li>
                            <!-- <li><a href="/phpcanban/admin.php?page=logout">Thoát</a></li> -->
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
       
    <?php
    }
    $_Content = "admin/{$_page}/{$_action}.php";
    if ($_action == null) {
        $_Content = "admin/{$_page}.php";
    }

    include_once($_Content);

    ?>




    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>