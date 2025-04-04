<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();
topbar();

$auraa = mysql_fetch_assoc(mysql_query("SELECT * FROM auros WHERE nick='$nick'"));
top('Auros');


function aura($idas){
global $auraa;
if($auraa[''.$idas.''] == "+"){
$kas = "<font color='red'>[Įvygdyta]</font>";
}
else{
$kas = "";
}
return $kas;
}

if($id == ''){

echo '<div class="meniuc"><img src="img/imgg/auros.png" border="0" alt="**"></br></div>';

echo'

<div class="meniu" style="text-align: center;">Norint išmokti aurą reikia turėti tam tikra lygį ir gausite tam tikra procenta jėgos ir gynybos.<br/>
</div><div class="meniu">
<img src=img/imgg/auros.png border="1" width="16" height="16"><a href="aura.php?id=1"><b>Standartinė aura</b></a> '.aura("aura1").' </br>Reikia būti 5 <img src="img/bicons/lvl.gif"><br/>
Ivaldę aurą  įgausite <b>300</b> <img src="img/bicons/attack.png"> , <b>900</b> <img src="img/bicons/shield.png"></div>';
if($apie['lygis']> 9){   
echo'
</div><div class="meniu" style="text-align: left;">
  <img src=img/imgg/auros.png border="1" width="16" height="16"> <a href="aura.php?id=2"><b>Purpurinė aura</a></b> '.aura("aura2").' </br>Reikia būti 10 <img src="img/bicons/lvl.gif"><br/>
Ivaldę aurą  įgausite <b>600</b> <img src="img/bicons/attack.png"> , <b>1800</b> <img src="img/bicons/shield.png"><br/>';}
if($apie['lygis']> 14){   
echo'
</div><div class="meniu" style="text-align: left;">
 <img src=img/imgg/auros.png border="1" width="16" height="16"><a href="aura.php?id=3"><b>Rožinė aura</b></a> '.aura("aura3").' </br>Reikia būti 15 <img src="img/bicons/lvl.gif"><br/>
Ivaldę aurą  įgausite <b>900</b> <img src="img/bicons/attack.png"> , <b>2700</b> <img src="img/bicons/shield.png"><br/>';}
if($apie['lygis']> 19){   
echo'
</div><div class="meniu" style="text-align: left;">
  <img src=img/imgg/auros.png border="1" width="16" height="16"> <a href="aura.php?id=4"><b>Kaio-Ken aura</b></a> '.aura("aura4").' </br>Reikia būti 20 <img src="img/bicons/lvl.gif"><br/>
Ivaldę aurą  įgausite <b>1200</b> <img src="img/bicons/attack.png"> , <b>3600</b> <img src="img/bicons/shield.png"><br/>';}
if($apie['lygis']> 24){   
echo'
</div><div class="meniu" style="text-align: left;">
<img src=img/imgg/auros.png border="1" width="16" height="16"><a href="aura.php?id=5"><b>Energy Barrier aura
</b></a> '.aura("aura5").' </br>Reikia būti  25 <img src="img/bicons/lvl.gif"><br/>
Ivaldę aurą  įgausite <b>1500</b> <img src="img/bicons/attack.png"> , <b>4500</b> <img src="img/bicons/shield.png"></div>';}
if($apie['lygis']> 29){   
echo'
<div class="meniu" style="text-align: left;">
  <img src=img/imgg/auros.png border="1" width="16" height="16"> <a href="aura.php?id=6"><b>Cells Dead Soul aura</b></a> '.aura("aura6").' </br>Reikia būti  30 <img src="img/bicons/lvl.gif"><br/>
Ivaldę aurą  įgausite <b>2000</b> <img src="img/bicons/attack.png"> , <b>6000</b> <img src="img/bicons/shield.png"></div>';}
if($apie['lygis']> 39){   
echo'
<div class="meniu" style="text-align: left;">
  <img src=img/imgg/auros.png border="1" width="16" height="16"> <a href="aura.php?id=7"><b>Super Saiyan aura</b></a> '.aura("aura7").' </br>Reikia būti  40 <img src="img/bicons/lvl.gif"><br/>
Ivaldę aurą  įgausite <b>30000</b> <img src="img/bicons/attack.png"> , <b>90000</b> <img src="img/bicons/shield.png"></div>';}
if($apie['lygis']> 49){   
echo'
<div class="meniu" style="text-align: left;">
<img src=img/imgg/auros.png border="1" width="16" height="16"><a href="aura.php?id=8"><b>Ultra Super Saiyan aura</b></a> '.aura("aura8").' </br>Reikia būti  50 <img src="img/bicons/lvl.gif"><br/>
Ivaldę aurą  įgausite <b>400000</b> <img src="img/bicons/attack.png"> , <b>1200000</b> <img src="img/bicons/shield.png"></div>';}
if($apie['lygis']> 59){   
echo'
<div class="meniu" style="text-align: left;">
  <img src=img/imgg/auros.png border="1" width="16" height="16"> <a href="aura.php?id=9"><b>Genki Dama aura</b></a> '.aura("aura9").' </br>Reikia būti  60 <img src="img/bicons/lvl.gif"><br/>
Ivaldę aurą  įgausite <b>500000</b> <img src="img/bicons/attack.png"> , <b>1500000</b> <img src="img/bicons/shield.png"></div>';}
if($apie['lygis']> 69){   
echo'
<div class="meniu" style="text-align: left;">
 <img src=img/imgg/auros.png border="1" width="16" height="16"> <a href="aura.php?id=10"><b>Pushing aura</b></a> '.aura("aura10").' </br>Reikia būti  70 <img src="img/bicons/lvl.gif"><br/>
Ivaldę aurą  įgausite <b>700000</b> <img src="img/bicons/attack.png"> , <b>2100000</b> <img src="img/bicons/shield.png"></div>';}
if($apie['lygis']> 79){   
echo'

<div class="meniu" style="text-align: left;">
<img src=img/imgg/auros.png border="1" width="16" height="16"><a href="aura.php?id=11"><b>Majin aura</b></a> '.aura("aura11").' </br>Reikia būti  80 <img src="img/bicons/lvl.gif"><br/>
Ivaldę aurą  įgausite <b>1000000</b> <img src="img/bicons/attack.png"> , <b>3000000</b> <img src="img/bicons/shield.png"></div></div>';}
if($apie['lygis']> 89){   
echo'

<div class="meniu" style="text-align: left;">
  <img src=img/imgg/auros.png border="1" width="16" height="16"><a href="aura.php?id=12"><b>Mystic aura</b></a> '.aura("aura12").' </br>Reikia būti  90 <img src="img/bicons/lvl.gif"><br/>
Ivaldę aurą  įgausite <b>1500000</b> <img src="img/bicons/attack.png"> , <b>4500000</b> <img src="img/bicons/shield.png"></div>';}
if($apie['lygis']> 99){   
echo'
<div class="meniu" style="text-align: left;">
  <img src=img/imgg/auros.png border="1" width="16" height="16"> <a href="aura.php?id=13"><b>Powering Super Saiyan aura</b></a> '.aura("aura13").' </br>Reikia būti  100 <img src="img/bicons/lvl.gif"><br/>
Ivaldę aurą  įgausite <b>3000000</b> <img src="img/bicons/attack.png"> , <b>9000000</b> <img src="img/bicons/shield.png"></div>';}
if($apie['lygis']> 109){   
echo'
<div class="meniu" style="text-align: left;">
 <img src=img/imgg/auros.png border="1" width="16" height="16"> <a href="aura.php?id=14"><b>Super Saiyan Attack aura</b></a> '.aura("aura14").' </br>Reikia būti  110 <img src="img/bicons/lvl.gif"><br/>
Ivaldę aurą  įgausite <b>7000000</b> <img src="img/bicons/attack.png"> , <b>21000000</b> <img src="img/bicons/shield.png"></div>


';
}
}

if ($id == "1"){
if ($auraa['aura1'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta aurą.</div>
';

}elseif ($apie['lygis'] < 5){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 300;
	$gyx= $apie['gynyba'] + 900;
	mysql_query("UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysql_error());
mysql_query("UPDATE auros SET aura1 = '+' WHERE nick = '$nick'") or die(mysql_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}
if ($id == "2"){
if ($auraa['aura2'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta aurą.</div>
';

}elseif ($apie['lygis'] < 10){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 600;
	$gyx= $apie['gynyba'] +1800;
	mysql_query("UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysql_error());
mysql_query("UPDATE auros SET aura2 = '+' WHERE nick = '$nick'") or die(mysql_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}
if ($id == "3"){
if ($auraa['aura3'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta aurą.</div>
';

}elseif ($apie['lygis'] < 15){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 900;
	$gyx= $apie['gynyba'] + 2700;
	mysql_query("UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysql_error());
mysql_query("UPDATE auros SET aura3 = '+' WHERE nick = '$nick'") or die(mysql_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}

if ($id == "4"){
if ($auraa['aura4'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta aurą.</div>
';

}elseif ($apie['lygis'] < 20){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 1200;
	$gyx= $apie['gynyba'] + 3600;
	mysql_query("UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysql_error());
mysql_query("UPDATE auros SET aura4 = '+' WHERE nick = '$nick'") or die(mysql_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}	
if ($id == "5"){
if ($auraa['aura5'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta aurą.</div>
';

}elseif ($apie['lygis'] < 25){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 1500;
	$gyx= $apie['gynyba'] + 4500;
	mysql_query("UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysql_error());
mysql_query("UPDATE auros SET aura5 = '+' WHERE nick = '$nick'") or die(mysql_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}
if ($id == "6"){
if ($auraa['aura6'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta aurą.</div>
';

}elseif ($apie['lygis'] < 30){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 2000;
	$gyx= $apie['gynyba'] + 6000;
	mysql_query("UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysql_error());
mysql_query("UPDATE auros SET aura6 = '+' WHERE nick = '$nick'") or die(mysql_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}
if ($id == "7"){
if ($auraa['aura7'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta aurą.</div>
';

}elseif ($apie['lygis'] < 40){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 40000;
	$gyx= $apie['gynyba'] + 120000;
	mysql_query("UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysql_error());
mysql_query("UPDATE auros SET aura7 = '+' WHERE nick = '$nick'") or die(mysql_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}
if ($id == "8"){
if ($auraa['aura8'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta techniką.</div>
';

}elseif ($apie['lygis'] < 50){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 400000;
	$gyx= $apie['gynyba'] + 1200000;
	mysql_query("UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysql_error());
mysql_query("UPDATE auros SET aura8 = '+' WHERE nick = '$nick'") or die(mysql_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}

if ($id == "9"){
if ($auraa['aura9'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta aurą.</div>
';

}elseif ($apie['lygis'] < 60){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 500000;
	$gyx= $apie['gynyba'] + 1500000;
	mysql_query("UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysql_error());
mysql_query("UPDATE auros SET aura9 = '+' WHERE nick = '$nick'") or die(mysql_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}
if ($id == "10"){
if ($auraa['aura10'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta aurą.</div>
';

}elseif ($apie['lygis'] < 70){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 700000;
	$gyx= $apie['gynyba'] + 2100000;
	mysql_query("UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysql_error());
mysql_query("UPDATE auros SET aura10 = '+' WHERE nick = '$nick'") or die(mysql_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}
if ($id == "11"){
if ($auraa['aura11'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta aurą.</div>
';

}elseif ($apie['lygis'] < 80){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 1000000;
	$gyx= $apie['gynyba']  + 3000000;
	mysql_query("UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysql_error());
mysql_query("UPDATE auros SET aura11 = '+' WHERE nick = '$nick'") or die(mysql_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}
if ($id == "12"){
if ($auraa['aura12'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta aurą.</div>
';

}elseif ($apie['lygis'] < 90){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 1500000;
	$gyx= $apie['gynyba'] + 4500000;
	mysql_query("UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysql_error());
mysql_query("UPDATE auros SET aura12 = '+' WHERE nick = '$nick'") or die(mysql_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}
if ($id == "13"){
if ($auraa['aura13'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta aurą.</div>
';

}elseif ($apie['lygis'] < 100){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 3000000;
	$gyx= $apie['gynyba'] + 9000000;
	mysql_query("UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysql_error());
mysql_query("UPDATE auros SET aura13 = '+' WHERE nick = '$nick'") or die(mysql_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}
if ($id == "14"){
if ($auraa['aura14'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta aurą.</div>
';

}elseif ($apie['lygis'] < 110){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 7000000;
	$gyx= $apie['gynyba'] + 21000000;
	mysql_query("UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysql_error());
mysql_query("UPDATE auros SET aura14 = '+' WHERE nick = '$nick'") or die(mysql_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}

$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skilai","Auros");
	navigacija($g_n);
	
	

 foot();
?>
