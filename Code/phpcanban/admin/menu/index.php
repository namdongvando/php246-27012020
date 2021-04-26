<?php 
if(isset($_REQUEST["idXoa"])){
    $idMenu = intval($_REQUEST["idXoa"]);
    DeleteMenuById($idMenu);
    toUrl($_SERVER["HTTP_REFERER"]);
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
                <a class="btn btn-success"
                 href="/admin.php?page=menu&action=post">Thêm</a> 
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
                    ?>
                        <tr>
                            <th><?php echo $key + 1; ?></th>
                            <th><?php echo $Menu["Ten"] ?> </th>
                            <th><?php echo $Menu["Link"] ?> </th>
                            <th><?php echo $Menu["CapCha"] ?> </th>
                            <th><?php echo $Menu["STT"] ?> </th>
                            <th>
                                <a class="btn btn-primary" href="">Sửa</a>
                                <a class="btn btn-danger" 
                                onclick="return confirm('Bạn có muốn xóa menu này không?')"
                                href="/admin.php?page=menu&action=index&idXoa=<?php echo $Menu["Ma"] ?>">
                                Xóa</a>
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


 

