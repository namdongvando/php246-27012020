<?php
if (isset($_POST["OK"])) {
    
    //echo "Đã Bấm Nút OK";
    $menu = $_POST["menu"];
    $menu["HinhAnh"] = "";
    //var_dump($menu);
    $idMenu = PostMenu($menu);
    toUrl("/admin.php?page=menu&action=index");
}

$DSMenu = GetMenu();

?>
<ol class="breadcrumb">
    <li>
        <a href="#">Trang Chủ</a>
    </li>
    <li>
        <a href="/admin.php?page=menu&action=index">Quản Lý Menu</a>
    </li>
    <li class="active">
        Thêm
    </li>
</ol>


<div class="container">
    <form action="" id="ThemMenu" method="POST" enctype="multipart/form-data">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Thêm Menu</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tiêu Đề <span style="color:red">(*)</span></label>
                            <input id="TieuDe" name="menu[Ten]" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Link <span style="color:red">(*)</span></label>
                            <input id="Link" name="menu[Link]" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">STT</label>
                            <input name="menu[STT]" class="form-control" type="number">
                        </div>
                        <div class="form-group">
                            <label for="">Hiển Thị</label>
                            <select name="menu[HienThi]" class="form-control">
                                <option value="0">Không</option>
                                <option value="1">Có</option>
                            </select>
                        </div>
                    </div>
                    <!-- cột phải -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Vị Trí</label>
                            <input name="menu[ViTri]" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Nhóm <span style="color:red">(*)</span></label>
                            <input id="Nhom" name="menu[Nhom]" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Cấp Cha</label>
                            <select name="menu[CapCha]" class="form-control">
                                <option value="0">Là Cấp Cha</option>
                                <?php
                                foreach ($DSMenu as $key => $value) {
                                ?>
                                    <option value="<?php echo $value["Ma"] ?>">
                                        <?php echo $value["Ten"] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Hình Ảnh</label>
                            <img style="height: 100px;" src="" id="img" alt="">
                            <input name="hinhanh" id="HinhAnh" class="form-control" type="file">
                        </div>

                    </div>
                </div>
                <!-- cột trái -->

                <div class="form-group">
                    <label for="">Ghi Chú</label>
                    <input name="menu[GhiChu]" class="form-control" type="text">
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