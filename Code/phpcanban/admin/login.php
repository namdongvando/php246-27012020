<?php
if (isset($_POST["TaiKhoan"])) {
    try {

        // if($_POST["TaiKhoan"] == "admin" && $_POST["MatKhau"] == "123456"){
        $user = Login($_POST["TaiKhoan"], $_POST["MatKhau"]);
        if ($user) {
            // Dang nhap thanh cong
            $_SESSION["QuanTri"] = $user;
            // chuyển trang
            header("Location: /admin.php");
            echo "ok";
        } else {
            throw new Exception("Tài Khoản Hoặc Mật Khẩu Không Đúng");
        }
    } catch (Exception $ex) {
        $ThongBao = $ex->getMessage();
    }
}

?>
<div class="container">
    <div class="col-md-3 col-lg-3">

    </div>
    <div class="col-md-6 col-lg-6">

        <form action="" method="POST" role="form">
            <legend>Đăng Nhập</legend>
            <p><?php echo isset($ThongBao) ? $ThongBao : "";  ?></p>
            <div class="form-group">
                <label for="">Tài Khoản</label>
                <input name="TaiKhoan" required title="Bạn Chưa Nhập Tài Khoản" type="text" class="form-control" placeholder="Tài Khoản">
            </div>
            <div class="form-group">
                <label for="">Mật Khẩu</label>
                <input name="MatKhau" required title="Bạn Chưa Nhập Mật Khẩu" type="password" class="form-control" placeholder="Mật Khẩu">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Đăng Nhập</button>
            </div>

        </form>

    </div>

</div>