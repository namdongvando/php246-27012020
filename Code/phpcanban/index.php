<?php

$Theme = "banhang";
$RootDir = "/phpcanban";
//Load Composer's autoloader
require 'vendor/autoload.php';
//include_once("./theme/banhang/router.php");
include_once("./theme/{$Theme}/router.php");
?>