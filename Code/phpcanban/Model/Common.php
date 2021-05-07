<?php

namespace Model;

class Common
{

    public static function PhanTrang($tongTrang, $trangHienTai, $link = "[i]")
    {
        ob_start();
        $start = $trangHienTai - 4;
        $start = max(1,$start);

        $truoc = $trangHienTai - 1;
        $truoc = max(1,$truoc);

        $end= $trangHienTai + 4;
        $end = min($end,$tongTrang);

        $sau = $trangHienTai + 1;
        $sau = min($tongTrang,$sau);

        $linkPTDau = str_replace('[i]', 1, $link);
        $linkPTTruoc = str_replace('[i]', $truoc, $link);
        $linkPTSau = str_replace('[i]', $sau, $link);
        $linkPTCuoi = str_replace('[i]', $tongTrang, $link);
?>
        <ul class="pagination">
            <li><a href="<?php echo $linkPTDau ?>">Đầu</a></li>
            <li><a href="<?php echo $linkPTTruoc ?>">Trước</a></li>
            <?php
            for ($i = $start; $i <= $end; $i++) {
                $linkPT = str_replace('[i]', $i, $link);
            ?>
                <li class="<?php echo $trangHienTai == $i ? 'active' : '' ?>">
                    <a href="<?php echo $linkPT; ?>"><?php echo $i; ?></a>
                </li>
            <?php
            }
            ?>
            <li><a href="<?php echo $linkPTSau ?>">Sau</a></li>
            <li><a href="<?php echo $linkPTCuoi; ?>">Cuối</a></li>
        </ul>
<?php
        $str = ob_get_clean();
        return $str;
    }

    public static  function UpLoadImg($file, $path)
    {
        // kiem tra có thư muc chưa?
        if (is_dir($path) == false) {
            mkdir($path, 0777);
        }
        // tao tên file
        $name = microtime();
        $name = str_replace(".", "", $name);
        $name = str_replace(" ", "_", $name);
        $file["name"] = BoDauTiengViet($file["name"]);
        $fileName = $name . $file["name"];
        // dường dẫn trên server
        $path = $path . $fileName;
        copy($file["tmp_name"], $path);
        return "/$path";
    }
    public static function BoDauTiengViet($str)
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
}
