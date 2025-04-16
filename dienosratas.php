<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include("cfg/sql.php");
include_once 'cfg/funkcijos.php';
head2();
baneris();

		topbar();
	
	if($id == ''){		
		online('Dienos Rate');
   top('Dienos ratas');
	echo'	<div class="meniuc"><img src=img/imgg/ratas.png border="1"width="150" height="100"></br>Suk ratą ir išmėgink savo sėkmę!</div>';
	echo'	<div class="meniuc"> <a href="?id=sukti"><b>Sukti ratą</a></div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","Dienos ratas");
	navigacija($g_n);}
	
		if($id == "sukti"){
	online('Dienos Rate');
   top('Dienos ratas');
   
   if((int)$apie['rato_time'] > time()){
   	echo'	<div class="meniuc"><img src=img/imgg/ratas.png border="1" width="150" height="100"></br>Sukti galėsi po <b> '.laikas($apie['rato_time']-time(),1).'</b></div>';
	
	
   }else{
   $rr = rand(1,50);
   if($rr == '2'){
   	echo'	<div class="meniuc"><img src=img/imgg/ratas.png border="1" width="150" height="100"></br><b>Sveikiname, sugebėjote išsukti ratą!</b><br><small>Gaunate 1000'.$dailyp.' </small></div>';
	mysqli_query($conn,"UPDATE zaidejai SET lab='+', dailyp=dailyp+'1000' WHERE  nick='$nick'");
   }else{
   		
   	 	echo'	<div class="meniuc"><img src=img/imgg/ratas.png border="1" width="150" height="100"></br><b>Dėja nesugebėjote išsukti rato!</b><br> <small>Nenusimink, kitą kartą irgi nepavyks. :) </small></div>';
		$t= time()+3600*24;
	mysqli_query($conn,"UPDATE zaidejai SET rato_time='$t' WHERE  nick='$nick'");
   }
  }
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Dienos ratas");
	navigacija($g_n);
		}

		foot();
	?>
	
