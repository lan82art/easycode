<?php
$data = file_get_contents('text.txt');
$arr = explode(" ", $data);
sort($arr);

$data = implode(" ",$arr);
$file = file_put_contents('text2.txt',$data);

foreach ($arr as $value){
    echo $value.'<br />';
}