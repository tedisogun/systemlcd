<?php

  session_start();

 define('CAPTCHA_NUMCHARS',6);
 define('CAPTCHA_WIDTH',125);
 define('CAPTCHA_HEIGHT',30);

 $pass_phrase = "";

 for($i=0; $i < CAPTCHA_NUMCHARS ;$i++)
 {
    $pass_phrase .= chr(rand(97,122));
 }

  $_SESSION['captcha'] = sha1($pass_phrase);



 $img = imagecreatetruecolor(CAPTCHA_WIDTH,CAPTCHA_HEIGHT);

   $bg_color = imagecolorallocate($img,255,255,255);
   $text_color = imagecolorallocate($img,0,0,0);
   $grapich_color = imagecolorallocate($img,64,64,64);
   imagefilledrectangle($img,0,0, CAPTCHA_WIDTH,CAPTCHA_HEIGHT,$bg_color);

   for($i=0; $i<5; $i++)
   {
     imageline($img,0,rand() % CAPTCHA_HEIGHT, CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGHT, $grapich_color );
   }

   for($i=0; $i<50; $i++)
   {
     imagesetpixel($img, rand() % CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGHT, $grapich_color );
   }

   imagettftext($img, 18, 0, 5, CAPTCHA_HEIGHT - 5, $text_color,$_SERVER['DOCUMENT_ROOT'].'/fontku.ttf', $pass_phrase);

   header('Content-type: image/png');
   imagepng($img);

   imagedestroy($img);
?>
