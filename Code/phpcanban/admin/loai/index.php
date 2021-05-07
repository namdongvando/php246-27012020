<?php
// admin 

use Model\Common;
use Model\Loai;

//Common::BoDauTiengViet("asdasd");


$modelLoai = new Loai();
$isYes =  PhanQuyen([Admin, QuanLy, NhanVien], null, Loi403);

if (isset($_REQUEST["idXoa"])) {
    try {
        if (PhanQuyen([Admin, QuanLy]) == false) {
            throw new Exception("Bạn không thể xóa Menu Này. Hay Lien Hệ");
        }
        $idMenu = intval($_REQUEST["idXoa"]);
        $modelLoai->Delete($idMenu);
        toUrl($_SERVER["HTTP_REFERER"]);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

$tong = 0;
$pageIndex = !empty($_GET["p"]) ? intval($_GET["p"]) : 1;
$pageIndex = max($pageIndex, 1);
$pageNumber = !empty($_GET["pn"]) ? intval($_GET["pn"]) : 1;
$pageNumber = max($pageNumber, 1);
$keyword = !empty($_GET["key"]) ? $_GET["key"] : "";



$DSLoai = $modelLoai->GetAllPT($keyword, $pageIndex, $pageNumber, $tong);

?>

<ol class="breadcrumb">
    <li>
        <a href="#">Trang Chủ</a>
    </li>
    <li class="active">
        Quản Lý Loại
    </li>
</ol>

<div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div style="margin-top: -8px;" class="btn-group pull-right">
                <a class="btn btn-success" href="/admin.php?page=loai&action=post">Thêm</a>
            </div>
            <h3 class="panel-title">Danh Sách Loại <?php echo $tong; ?></h3>
        </div>
        <div class="panel-body" style="min-height: 300px;">
            <form action="/admin.php" method="get">
                <div class="form-inline">
                    <input type="hidden" name="page" value="loai" placeholder="Tìm Kiêm" class="form-control">
                    <input type="hidden" name="action" value="index" placeholder="Tìm Kiêm" class="form-control">
                    <input type="text" value="<?php echo $keyword; ?>" name="key" placeholder="Tìm Kiêm" class="form-control">
                    <button class="btn btn-primary">Tìm Kiếm</button>
                </div>
            </form>


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên Loại </th>
                        <th>SLSP </th>
                        <th>Ẩn Hiện </th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($DSLoai as $key => $Menu) {
                        $_loai = new Loai($Menu);
                        $tt = ($pageIndex - 1) * $pageNumber;
                    ?>
                        <tr>
                            <th><?php echo $tt + $key + 1; ?></th>
                            <th><?php echo $_loai->TenLoai; ?></th>
                            <th><?php echo $_loai->SoLuongSanPham; ?></th>
                            <th><?php echo $_loai->AnHien; ?></th>

                            <th>

                                <?php
                                if (PhanQuyen([Admin, QuanLy])) {
                                ?>
                                    <a class="btn btn-primary" href="/admin.php?page=loai&action=put&id=<?php echo $_loai->MaLoai; ?>">Sửa</a>
                                <?php
                                }
                                if (PhanQuyen([Admin, QuanLy])) {
                                ?>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa menu này không?')" href="/admin.php?page=loai&action=index&idXoa=<?php echo $_loai->MaLoai ?>">
                                        Xóa</a>
                                <?php
                                }
                                ?>

                            </th>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">
                            <div class="dropdown pull-right">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                    Hiện <?php echo $pageNumber; ?>
                                </button>
                                <ul class="dropdown-menu">
                                    <?php
                                    $linkPT = "/admin.php?page=loai&action=index&p=1&pn=";
                                    for ($i = 1; $i < 5; $i++) {
                                    ?>
                                        <li>
                                            <a href="<?php echo $linkPT . ($i * 5) ?>">
                                                <?php echo ($i * 5) ?>
                                            </a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>

                            <?php
                            $TongTrang = ceil($tong / $pageNumber);
                            $linkPT = "/admin.php?page=loai&action=index&key={$keyword}&pn={$pageNumber}&p=[i]";
                            echo Common::PhanTrang($TongTrang, $pageIndex, $linkPT);
                            ?>
                        </td>
                    </tr>


                </tfoot>
            </table>
        </div>
    </div>
</div>