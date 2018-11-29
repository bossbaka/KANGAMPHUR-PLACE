<?php
session_start();//session start for creating captcha
$random_string = md5(microtime());//generate random string with md5 encryption
$random_string = substr($random_string,0,6);//split substr(string,start,length) 
$_SESSION['captcha_code'] = $random_string;//store captcha value in session variable 
$createImage = imagecreatefromjpeg("captcha_bg.jpg");
$txtColor = imagecolorallocate($createImage, 0, 0, 0);
imagestring($createImage, 5, 5, 5, $random_string, $txtColor);
header("Content-type: image/jpeg");
imagejpeg($createImage);//this is the image for captcha
?>


