<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>

</head>

<body>
    <?php
    echo "xin chào";
    $a = 2;
    $b = 3;
    echo $a + $b;
    echo "===========<br>";
    print_r($a + $b);
    echo "===========<br>";
    var_dump($a + $b);
    if ($a == true) {
        echo "dung";
    } else {
        echo "sai";
    }

    if ($a % 2 == 0) {
        echo "So Chan";
    } else {
        echo "So Lẻ";
    }

    for ($i = 0; $i < 100; $i++) {
        echo $i . "<br>";
    }

    $a = 0;
    while ($a < 100) {
        echo $a . "<br>";
        echo "$a<br>";
        echo '$a<br>';
        $a++;
    }
    $a = 0;
    do {
        $a++;
        echo $a;
    } while ($a <= 10);

    $array = [1, 2, "Do", "Nguyen", 5, 6, 7, 8, 9];
    $array2 = [[1, 2, 3], [1, 2, 3], [1, 2, 3], [1, 2, 3]];

    foreach ($array as $key => $value) {
        echo "<br>$key ---- $value <br>";
    }

    try {
        // ax+b = 0;        
        $a = 4;
        $b = 0;
        if ($a == 0) {
            if ($b == 0) {
                throw new Exception("PTVSN");
            } else {
                throw new Exception("PTVN");
            }
        }
        echo -$b / $a;
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }



    $dsHinh = [
        "https://dulichkhampha24.com/wp-content/uploads/2020/11/dia-diem-chup-hinh-dep-o-ba-na-hills-2.jpg", "https://9mobi.vn/cf/images/2015/03/nkk/hinh-dep-1.jpg",
        "https://cdn.tgdd.vn/2021/04/campaign/Hinhsanpham-465x431-1.png"
    ];

    foreach ($dsHinh as $key => $value) {
        $img = file_get_contents($value);
        file_put_contents("abc{$key}.jpg", $img);
    ?>
        <img src="<?php echo "abc{$key}.jpg"; ?>" alt="">
    <?php
    }

    ?>

</body>

</html>