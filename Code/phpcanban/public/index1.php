<?php 
include "simple_html_dom.php";
$link = "https://www.thegioididong.com/phu-kien";
$html = file_get_html($link);

foreach($html->find('.navaccessories2019') as $element){
    $dsHinh[] = $element->innertext;
}
 var_dump($dsHinh);