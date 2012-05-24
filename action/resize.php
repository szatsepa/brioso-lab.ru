<?php

/*
 * 24/5/2012 spizjeno http://www.codenet.ru/webmast/php/Image-Resize-GD/
 */

// f - имя файла 
// type - способ масштабирования 
// q - качество сжатия 
// src - исходное изображение 
// dest - результирующее изображение 
// w - ширниа изображения 
// ratio - коэффициент пропорциональности 
// str - текстовая строка 

// тип преобразования, если не указаны размеры 
if ($type == 0) $w = 70;  // квадратная 70x70 
if ($type == 1) $w = 90;  // квадратная 90x90 
if ($type == 2) $w = 218; // пропорциональная шириной 218 


// качество jpeg по умолчанию 
if (!isset($q)) $q = 100;

// создаём исходное изображение на основе 
// исходного файла и опеределяем его размеры 
$src = imagecreatefromjpeg($f); 
$w_src = imagesx($src); 
$h_src = imagesy($src);

header("Content-type: image/jpeg"); 

// если размер исходного изображения 
// отличается от требуемого размера 
if ($w_src != $w) 
{
// операции для получения прямоугольного файла 
   if ($type==2) 
   { 
       // вычисление пропорций 
       $ratio = $w_src/$w; 
       $w_dest = round($w_src/$ratio); 
       $h_dest = round($h_src/$ratio); 

       // создаём пустую картинку 
       // важно именно truecolor!, иначе будем иметь 8-битный результат 
       $dest = imagecreatetruecolor($w_dest,$h_dest); 
       $str = "foxweb.net.ru"; 
       imagecopyresized($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src); 
               // определяем координаты вывода текста 
        $size = 2; // размер шрифта 
        $x_text = $w_dest-imagefontwidth($size)*strlen($str)-3; 
        $y_text = $h_dest-imagefontheight($size)-3; 

        // определяем каким цветом на каком фоне выводить текст 
        $white = imagecolorallocate($dest, 255, 255, 255); 
        $black = imagecolorallocate($dest, 0, 0, 0); 
        $gray = imagecolorallocate($dest, 127, 127, 127); 
        if (imagecolorat($dest,$x_text,$y_text)>$gray) $color = $black; 
        if (imagecolorat($dest,$x_text,$y_text)<$gray) $color = $white; 

        // выводим текст 
        imagestring($dest, $size, $x_text-1, $y_text-1, $str,$white-$color); 
        imagestring($dest, $size, $x_text+1, $y_text+1, $str,$white-$color); 
        imagestring($dest, $size, $x_text+1, $y_text-1, $str,$white-$color); 
        imagestring($dest, $size, $x_text-1, $y_text+1, $str,$white-$color); 

        imagestring($dest, $size, $x_text-1, $y_text,   $str,$white-$color); 
        imagestring($dest, $size, $x_text+1, $y_text,   $str,$white-$color); 
        imagestring($dest, $size, $x_text,   $y_text-1, $str,$white-$color); 
        imagestring($dest, $size, $x_text,   $y_text+1, $str,$white-$color); 

        imagestring($dest, $size, $x_text,   $y_text,   $str,$color); 
    } 
        // операции для получения квадратного файла 
    if (($type==0)||($type==1)) 
    { 
         // создаём пустую квадратную картинку 
         // важно именно truecolor!, иначе будем иметь 8-битный результат 
         $dest = imagecreatetruecolor($w,$w); 

         // вырезаем квадратную серединку по x, если фото горизонтальное 
         if ($w_src>$h_src) 
         imagecopyresized($dest, $src, 0, 0,
                          round((max($w_src,$h_src)-min($w_src,$h_src))/2),
                          0, $w, $w, min($w_src,$h_src), min($w_src,$h_src)); 

         // вырезаем квадратную верхушку по y, 
         // если фото вертикальное (хотя можно тоже серединку) 
         if ($w_src<$h_src) 
         imagecopyresized($dest, $src, 0, 0, 0, 0, $w, $w,
                          min($w_src,$h_src), min($w_src,$h_src)); 

         // квадратная картинка масштабируется без вырезок 
         if ($w_src==$h_src) 
         imagecopyresized($dest, $src, 0, 0, 0, 0, $w, $w, $w_src, $w_src); 
     } 

	// вывод картинки и очистка памяти 
	imagejpeg($dest,'',$q); 
	imagedestroy($dest); 
	imagedestroy($src); 
} 
    ?>