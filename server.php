<?php
ob_start();
include_once("cfg/sql.php");


$sk = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai"));
$on_viso = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai"));
header("Content-type:image/gif"); 
$image = imagecreatefromgif("img/auros/1.gif"); 

$color = imagecolorallocate($image,0,0,0); 
imagestring($image, 4, 121, 8, $sk, $color); 
imagestring($image, 4, 121, 24, $on_viso, $color); 
imagegif($image); 
imagedestroy($image); 


?>