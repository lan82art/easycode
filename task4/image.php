<?php
session_start();

$width = 300;
$height = 100;
$im = imagecreatetruecolor($width, $height);

$color = ImageColorAllocate ($im, rand(0,255), rand(0,255), rand(0,255));
ImageString ($im, 7, 5, rand(5,70), $_SESSION['captcha'][0], $color);
$color = ImageColorAllocate ($im, rand(0,255), rand(0,255), rand(0,255));
ImageString ($im, 7, 20, rand(5,70), $_SESSION['captcha'][1], $color);
$color = ImageColorAllocate ($im, rand(0,255), rand(0,255), rand(0,255));
ImageString ($im, 7, 35, rand(5,70), $_SESSION['captcha'][2], $color);
$color = ImageColorAllocate ($im, rand(0,255), rand(0,255), rand(0,255));
ImageString ($im, 7, 50, rand(5,70), $_SESSION['captcha'][3], $color);
$color = ImageColorAllocate ($im, rand(0,255), rand(0,255), rand(0,255));
ImageString ($im, 7, 65, rand(5,70), $_SESSION['captcha'][4], $color);

header ("Content-type: image/png");
imagepng($im);
imagedestroy($im);