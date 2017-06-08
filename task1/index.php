<?php
header ("Content-type: image/png");
$width = 2000;
$height = 1000;
$im = imagecreatetruecolor($width, $height);


for($i=0;$i<40;$i++){
    $size = rand(20,150);
    $sqx = rand(0,$width-$size);
    $sqy = rand(0,$height-$size);
    $color = imagecolorallocate($im, 255,0,0);
    imagefilledrectangle($im,$sqx,$sqy,$sqx+$size,$sqy+$size,$color);
}

imagepng($im);
imagedestroy($im);

