<?php
// admin 

use Model\Menu;

$modelMenu = new Menu(); 

$isYes =  PhanQuyen([Admin, QuanLy,NhanVien], null, Loi403);
if ($isYes == true) {
    echo "có quyen";
} else {
    echo "không có quyen";
}
 
 

if (isset($_REQUEST["idXoa"])) {
    try {
        if(PhanQuyen([Admin, QuanLy])==false){
            throw new Exception("Bạn không thể xóa Menu Này. Hay Lien Hệ");
        }
        $idMenu = intval($_REQUEST["idXoa"]);
        $modelMenu->Delete($idMenu);
        //DeleteMenuById($idMenu);
        toUrl($_SERVER["HTTP_REFERER"]);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

?>

<ol class="breadcrumb">
    <li>
        <a href="#">Trang Chủ</a>
    </li>
    <li class="active">
        Quản Lý Menu
    </li>
</ol>

<div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div style="margin-top: -8px;" class="btn-group pull-right">
                <a class="btn btn-success" href="/admin.php?page=menu&action=post">Thêm</a>
            </div>
            <h3 class="panel-title">Danh Sách Menu</h3>

        </div>
        <div class="panel-body" style="min-height: 300px;">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tiêu Đề </th>
                        <th>Link </th>
                        <th>Cấp CHa </th>
                        <th>STT </th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $DSMenu = GetMenu();
                    foreach ($DSMenu as $key => $Menu) {
                        $_menu = new Menu($Menu);
                    ?>
                        <tr>
                            <th><?php echo $key + 1; ?></th>
                            <th><?php echo $Menu["Ten"] ?> </th>
                            <th><?php echo $Menu["Link"] ?> </th>
                            <th><?php echo $_menu->CapCha()->Ten; ?> </th>
                            <th><?php echo $Menu["STT"] ?> </th>
                            <th>
                                
                               <?php
                               if(PhanQuyen([Admin,QuanLy])){
                                ?> 
                                <a class="btn btn-primary" 
                                href="/admin.php?page=menu&action=put&id=<?php echo $Menu["Ma"]; ?>"
                                >Sửa</a>
                                <?php 
                               }
                               if(PhanQuyen([Admin,QuanLy])){
                                ?> 
                                <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa menu này không?')" href="/admin.php?page=menu&action=index&idXoa=<?php echo $Menu["Ma"] ?>">
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
            </table>
        </div>
    </div>
</div>