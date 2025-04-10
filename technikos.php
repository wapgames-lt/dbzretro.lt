<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();
topbar();

$xa = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM technikos WHERE nick='$nick'"));
if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM technikos WHERE nick='$nick' ")))
{
	mysqli_query($conn,"INSERT INTO technikos SET nick='$nick' ");
}
top('Technikos');


function tech($idas){
global $xa;
if($xa[''.$idas.''] == "+"){
$kas = "<font color='red'>[Įvygdyta]</font>";
}
else{
$kas = "";
}
return $kas;
}

if($id == ''){

echo '<div class="meniuc"><img src="img/imgg/technikos.png" border="0" alt="**"></br></div>';


echo'

<div class="meniu" style="text-align: center;">Norint išmokti techniką ar ataką reikia turėti tam tikrą <img src="img/bicons/lvl.gif"> ir gausite tam tikrą kiekį <img src="img/bicons/attack.png"> , <img src="img/bicons/shield.png">.<br/>';

echo'
</div><div class="line"></div><div class="meniu">
   <img src=img/imgg/technikos.png border="1" width="16" height="16"> <a href="technikos.php?id=1"><b>Ki blast</b></a> '.tech("t1").' </br>Reikia būti 5 <img src="img/bicons/lvl.png"><br/>
Technikos metu įgausite <b>300</b> <img src="img/bicons/attack.png"> , <b>900</b> <img src="img/bicons/shield.png"></div>';
if($apie['lygis']> 9){   
echo'
</div><div class="meniu" style="text-align: left;">
  <img src=img/imgg/technikos.png border="1" width="16" height="16"><a href="technikos.php?id=2"><b>Kamehameha</b></a> '.tech("t2").' </br>Reikia būti 10 <img src="img/bicons/lvl.png"><br/>
Technikos metu įgausite <b>600</b> <img src="img/bicons/attack.png"> ,  <b>1800</b> <img src="img/bicons/shield.png"></div>';}
if($apie['lygis']> 14){   
echo'
</div><div class="meniu" style="text-align: left;">
  <img src=img/imgg/technikos.png border="1" width="16" height="16"><a href="technikos.php?id=3"><b>Solar flare</b></a> '.tech("t3").' </br>Reikia būti 15 <img src="img/bicons/lvl.png"><br/>
Technikos metu įgausite <b>1200</b> <img src="img/bicons/attack.png"> , <b>3600</b> <img src="img/bicons/shield.png"></div>';}
if($apie['lygis']> 19){   
echo'
</div><div class="meniu" style="text-align: left;">
   <img src=img/imgg/technikos.png border="1" width="16" height="16"> <a href="technikos.php?id=4"><b>Special beam cannon</b></a> '.tech("t4").' </br>Reikia būti 20 <img src="img/bicons/lvl.png"><br/>
Technikos metu įgausite <b>2000</b> <img src="img/bicons/attack.png"> , <b>6000</b> <img src="img/bicons/shield.png"></div>';}
if($apie['lygis']> 29){   
echo'
</div><div class="meniu" style="text-align: left;">
   <img src=img/imgg/technikos.png border="1" width="16" height="16"> <a href="technikos.php?id=5"><b>Death beam</b></a> '.tech("t5").' </br>Reikia būti  30 <img src="img/bicons/lvl.png"><br/>
Technikos metu įgausite <b>3000</b> <img src="img/bicons/attack.png"> , <b>9000</b> <img src="img/bicons/shield.png"></div>';}
if($apie['lygis']> 39){   
echo'
<div class="meniu" style="text-align: left;">
   <img src=img/imgg/technikos.png border="1" width="16" height="16"><a href="technikos.php?id=6"><b>Destructo disk</b> '.tech("t6").' </a></br>Reikia būti  40 <img src="img/bicons/lvl.png"><br>
Technikos metu įgausite <b>40000</b> <img src="img/bicons/attack.png"> , <b>120000</b> <img src="img/bicons/shield.png"></div>';}
if($apie['lygis']> 49){   
echo'
<div class="meniu" style="text-align: left;">   <img src=img/imgg/technikos.png border="1" width="16" height="16"><a href="technikos.php?id=7"><b>Solar kamehameha</b> '.tech("t7").' </a></br>Reikia būti  50 <img src="img/bicons/lvl.png"><br>
Technikos metu įgausite <b>500000</b> <img src="img/bicons/attack.png"> , <b>1500000</b> <img src="img/bicons/shield.png"></div>';}
if($apie['lygis']> 59){   
echo'
<div class="meniu" style="text-align: left;">
 <img src=img/imgg/technikos.png border="1" width="16" height="16"><a href="technikos.php?id=8"><b>Burning Attack</b></a> '.tech("t8").' </br>Reikia būti  60 <img src="img/bicons/lvl.png"><br/>
Technikos metu įgausite <b>800000</b> <img src="img/bicons/attack.png"> , <b>2400000</b> <img src="img/bicons/shield.png"></div>';}
if($apie['lygis']> 69){   
echo'
<div class="meniu" style="text-align: left;">
   <img src=img/imgg/technikos.png border="1" width="16" height="16"><a href="technikos.php?id=9"><b>Final Flash</b></a> '.tech("t9").' </br>Reikia būti  70 <img src="img/bicons/lvl.png"><br/>
Technikos metu įgausite <b>1000000</b> <img src="img/bicons/attack.png"> , <b>3000000</b> <img src="img/bicons/shield.png"></div>';}
if($apie['lygis']> 79){   
echo'
<div class="meniu" style="text-align: left;">
 <img src=img/imgg/technikos.png border="1" width="16" height="16"><a href="technikos.php?id=10"><b>Big Bang Kamehameha</b></a> '.tech("t10").' </br>Reikia būti  80 <img src="img/bicons/lvl.png"><br/>
Technikos metu įgausite <b>1200000</b> <img src="img/bicons/attack.png"> , <b>3600000</b> <img src="img/bicons/shield.png"></div>
';
}
}
if ($id == "1"){
if ($xa['t1'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta techniką.</div>
';

}elseif ($apie['lygis'] < 5){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 300;
	$gyx= $apie['gynyba'] + 900;
	mysqli_query($conn,"UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysqli_error());
mysqli_query($conn,"UPDATE technikos SET t1 = '+' WHERE nick = '$nick'") or die(mysqli_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}
if ($id == "2"){
if ($xa['t2'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta techniką.</div>
';

}elseif ($apie['lygis'] < 10){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 600;
	$gyx= $apie['gynyba'] + 1800;
	mysqli_query($conn,"UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysqli_error());
mysqli_query($conn,"UPDATE technikos SET t2 = '+' WHERE nick = '$nick'") or die(mysqli_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}
if ($id == "3"){
if ($xa['t3'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta techniką.</div>
';

}elseif ($apie['lygis'] < 15){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 1200;
	$gyx= $apie['gynyba'] + 3600;
	mysqli_query($conn,"UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysqli_error());
mysqli_query($conn,"UPDATE technikos SET t3 = '+' WHERE nick = '$nick'") or die(mysqli_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}

if ($id == "4"){
if ($xa['t4'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta techniką.</div>
';

}elseif ($apie['lygis'] < 20){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 2000;
	$gyx= $apie['gynyba'] + 6000;
	mysqli_query($conn,"UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysqli_error());
mysqli_query($conn,"UPDATE technikos SET t4 = '+' WHERE nick = '$nick'") or die(mysqli_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}	
if ($id == "5"){
if ($xa['t5'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta techniką.</div>
';

}elseif ($apie['lygis'] < 30){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 30000;
	$gyx= $apie['gynyba'] + 90000;
	mysqli_query($conn,"UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysqli_error());
mysqli_query($conn,"UPDATE technikos SET t5 = '+' WHERE nick = '$nick'") or die(mysqli_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}
if ($id == "6"){
if ($xa['t6'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta techniką.</div>
';

}elseif ($apie['lygis'] < 40){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 400000;
	$gyx= $apie['gynyba']  + 1200000;
	mysqli_query($conn,"UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysqli_error());
mysqli_query($conn,"UPDATE technikos SET t6 = '+' WHERE nick = '$nick'") or die(mysqli_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}
if ($id == "7"){
if ($xa['t7'] == "+"){
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
	$jex= $apie['jega'] + 500000;
	$gyx= $apie['gynyba'] + 1500000;
	mysqli_query($conn,"UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysqli_error());
mysqli_query($conn,"UPDATE technikos SET t7 = '+' WHERE nick = '$nick'") or die(mysqli_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}
if ($id == "8"){
if ($xa['t8'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta techniką.</div>
';

}elseif ($apie['lygis'] < 60){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 800000;
	$gyx= $apie['gynyba'] + 2400000;
	mysqli_query($conn,"UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysqli_error());
mysqli_query($conn,"UPDATE technikos SET t8 = '+' WHERE nick = '$nick'") or die(mysqli_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}

if ($id == "9"){
if ($xa['t9'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta techniką.</div>
';

}elseif ($apie['lygis'] < 70){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 1000000;
	$gyx= $apie['gynyba'] + 3000000;
	mysqli_query($conn,"UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysqli_error());
mysqli_query($conn,"UPDATE technikos SET t9 = '+' WHERE nick = '$nick'") or die(mysqli_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}
}
if ($id == "10"){
if ($xa['t10'] == "+"){
echo'
<div class="meniuc">
Jūs jau esate įšmokes pasirinkta techniką.</div>
';

}elseif ($apie['lygis'] < 80){
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.gif"> yra per mažas!</div>

';
}else{
	$jex= $apie['jega'] + 1200000;
	$gyx= $apie['gynyba'] + 3600000;
	mysqli_query($conn,"UPDATE zaidejai SET jega='$jex', gynyba='$gyx' WHERE nick = '$nick'") or die(mysqli_error());
mysqli_query($conn,"UPDATE technikos SET t10 = '+' WHERE nick = '$nick'") or die(mysqli_error());
echo'
<div class="meniuc">
Sėkmingai išmokai!</div>
';
}

}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skilai","Technikos");
	navigacija($g_n);
	
	

 foot();
?>
