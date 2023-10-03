<?php

global $name, $work, $email, $phone;

$gd = imagecreate(423, 139);
$colorWhite = imagecolorallocate($gd, 255, 255, 255);
$colorRed = imagecolorallocate($gd, 255, 0, 0);
imagefilledrectangle($gd, 0, 0, 423, 139, $colorWhite);

$font = './fonts/ubuntu.ttf';
$fontBold = './fonts/ubuntubold.ttf';
$text = "This is a sunset!";

imagettftext($gd, 14, 0, 12, 35, $colorRed, $fontBold, $name);
imagettftext($gd, 11, 0, 12, 55, $colorRed, $font, $work);
imagettftext($gd, 11, 0, 12, 90, $colorRed, $font, $email);
imagettftext($gd, 11, 0, 12, 112, $colorRed, $font, $phone);
imagettftext($gd, 11, 0, 12, 133, $colorRed, $font, 'www.clubedeferias.com');
imageline($gd, 12, 66, 390, 66, $colorRed);

$fileName = str_replace(' ', '_', $name);

if (!file_exists('./images/')) {
	mkdir('./images/', 0777, true);
}

imagejpeg($gd, './images/'.$fileName.'.jpeg', 100);
imagedestroy($gd);