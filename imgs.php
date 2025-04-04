<?php  
include_once 'cfg/sql.php';
// set the type of data (Content-Type) to PNG image  
header("Content-Type: image/png");  

// extract GET global array  
extract($_GET);  

// set defaults  
if(! isset($max)) $max = 100;  
if(! isset($val)) $val = 100;  

// this method prepare blank true color image with given width and height  
$im = imagecreatetruecolor(120, 10);  

// set background color (light-blue)  
$c_bg = imagecolorallocate($im, 222, 236, 247);  
// set foreground color (dark-blue)  
$c_fg = imagecolorallocate($im, 27, 120, 179);  

// calculate the width of bar indicator  
$val_w = round(($val * 117) / $max);  

// create a rectangle for background and append to the image  
imagefilledrectangle($im, 0, 0, 120, 10, $c_bg);  
// create a rectangle for the indicator and appent to the image  
imagefilledrectangle($im, 0, 0, $val_w, 10, $c_fg);  

// render the image as a PNG  
imagepng($im);  

// finally destroy image resources  
imagedestroy($im);  
?>   