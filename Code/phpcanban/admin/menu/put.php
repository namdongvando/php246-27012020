<?php

use Model\Menu;

$modelMenu = new Menu();

if(isset($_POST["OK"])){
    var_dump($_POST["menu"]);
    $menuPost = $_POST["menu"];
    $id = $menuPost["Ma"];
    $menuDetail = $modelMenu->GetById($id);
    if($menuDetail){
         $menuDetail["Ma"] = $menuPost["Ma"];
         $menuDetail["Ten"] = $menuPost["Ten"];
         $menuDetail["Link"] = $menuPost["Link"];
         $menuDetail["STT"] = $menuPost["STT"];
         $menuDetail["HienThi"] = $menuPost["HienThi"];
         $menuDetail["ViTri"] = $menuPost["ViTri"];
         $menuDetail["Nhom"] = $menuPost["Nhom"];
         $menuDetail["CapCha"] = $menuPost["CapCha"];
         $menuDetail["GhiChu"] = $menuPost["GhiChu"];
         $modelMenu->Put($menuDetail);
    }    

}


$tong = 0;
$DSMenu = $modelMenu->GetAllPT("", 1, 1000, $tong);
// lấy id cua menu
echo $id = $_GET["id"];
// lấy thông tin của menu theo ID
$menuEdit = $modelMenu->GetById($id);
// khởi tạo đối tượng
$modelMenu = new Menu($menuEdit);
// xuất thông tin đối tượng
// echo $modelMenu->Ma;
// echo $modelMenu->Ten;
?>
<ol class="breadcrumb">
    <li>
        <a href="#">Trang Chủ</a>
    </li>
    <li>
        <a href="/admin.php?page=menu&action=index">Quản Lý Menu</a>
    </li>
    <li class="active">
        Sửa
    </li>
</ol>
<div class="container">
    <form action="" id="ThemMenu" method="POST" enctype="multipart/form-data">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Sửa Menu</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tiêu Đề <span style="color:red">(*)</span></label>
                            <input value="<?php echo $modelMenu->Ten ?>" id="TieuDe" name="menu[Ten]" class="form-control" type="text">
                            <input value="<?php echo $modelMenu->Ma ?>"  name="menu[Ma]" type="hidden">
                        </div>
                        <div class="form-group">
                            <label for="">Link <span style="color:red">(*)</span></label>
                            <input value="<?php echo $modelMenu->Link ?>" id="Link" name="menu[Link]" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">STT</label>
                            <input value="<?php echo $modelMenu->STT ?>" name="menu[STT]" class="form-control" type="number">
                        </div>
                        <div class="form-group">
                            <label for="">Hiển Thị</label>
                            <select name="menu[HienThi]" class="form-control">
                                <option <?php echo $modelMenu->HienThi == 0 ? 'selected' : '' ?> value="0">Không</option>
                                <option <?php echo $modelMenu->HienThi == 1 ? 'selected' : '' ?> value="1">Có</option>
                            </select>
                        </div>
                    </div>
                    <!-- cột phải -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Vị Trí</label>
                            <input value="<?php echo $modelMenu->ViTri ?>" name="menu[ViTri]" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Nhóm <span style="color:red">(*)</span></label>
                            <input value="<?php echo $modelMenu->Nhom ?>" id="Nhom" name="menu[Nhom]" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Cấp Cha</label>
                            <select name="menu[CapCha]" class="form-control">
                                <option value="0">Là Cấp Cha</option>
                                <?php
                                foreach ($DSMenu as $key => $value) {
                                    if ($value["Ma"] != $modelMenu->Ma) {
                                ?>
                                        <option <?php echo $modelMenu->CapCha == $value["Ma"] ? 'selected' : '' ?> value="<?php echo $value["Ma"] ?>">
                                            <?php echo $value["Ten"] ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Hình Ảnh</label>
                            <img style="height: 100px;" src="<?php echo $modelMenu->HinhAnh ?>" id="img" alt="">
                            <input name="hinhanh" id="HinhAnh" class="form-control" type="file">
                        </div>

                    </div>
                </div>
                <!-- cột trái -->

                <div class="form-group">
                    <label for="">Ghi Chú</label>
                    <input value="<?php echo $modelMenu->GhiChu ?>" name="menu[GhiChu]" class="form-control" type="text">
                </div>
                <button name="OK" style="min-width: 100px;" class="btn btn-success">Ok</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function() {

        $("#HinhAnh").change(function() {
            // console.log(this);
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });


        $("#ThemMenu").submit(function() {
            try {
                if ($("#TieuDe").val() == "") {
                    // Chưa nhap 
                    $("#TieuDe").focus();
                    throw "Bạn Chưa Nhập Tiêu Đề";
                }
                if ($("#Link").val() == "") {
                    // Chưa nhap 
                    $("#Link").focus();
                    throw "Bạn Chưa Nhập Link";
                }
                if ($("#Nhom").val() == "") {
                    // Chưa nhap 
                    $("#Nhom").focus();
                    throw "Bạn Chưa Nhập Nhóm";
                }
                return true;
            } catch (error) {
                alert(error);
                return false;
            }

        });



    });
</script>