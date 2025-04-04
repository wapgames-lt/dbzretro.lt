<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

		topbar();

   
if($id == ""){
      top('Gravitacijos kambarys');
        echo '<div class="meniuc"><img src="img/imgg/kambarys.png"></div>';

    if ($apie['lygis'] < 15) {
        echo '
<div class="meniuc">Norint gauti treniruočių tavo <img src="img/bicons/lvl.png"> turi būti mažiausiai <b>15</b>! </div>';
    }

    renderAvailableWorkouts();

    if($apie['lygis']> 119){   
 echo '<div class="up">Penktoji Treniruotė</div>
<div class="meniuc">
        Gravitacijos kambaryje galima treniruotis kas <b>48</b> valandas, pasitreniravę gausite <b>100000000</b> <img src="img/bicons/attack.png"> , <b> 300000000</b> <img src="img/bicons/shield.png"> bei <b>80</b><img src="img/bicons/euro.png"><br>Treniruotis galima tik nuo 120  <img src="img/bicons/lvl.png"></div>';


  echo '<div class="meniuc"><img src=img/imgg/kambarys.png border="1" width="16" height="16"> <a href="?id=treniruotis5">Treniruotis</a></b></div>';
} 

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Gravitacijos kambarys");
	navigacija($g_n);
    }


elseif($id == 'treniruotis'){
	top('Gravitacijos kambarys');
	

if ($zaidejai['gravitacija'] > time()){
	    echo '<div class="meniuc"><img src="img/imgg/kambarys.png"></div>';
echo'
	<div class="meniuc"><b>Treniruotis galima kas <b>3</b> valandas!</b><br> Treniruotis galėsi už <b><font color="red">  '.laikas($apie['gravitacija']-time(), 1).'</b></font></div>
'; 

	}
elseif ($apie['lygis'] < 14){
    echo '<div class="meniuc"><img src="img/imgg/kambarys.png"></div>';
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.png"> yra per mažas!</div>';


}
else{
    $powerReward = resolveReward(calculatePowerIncreaseByPercentage(1), 1000);
    $defenceReward = resolveReward(calculateDefenceIncreaseByPercentage(1), 3000);
    echo '<div class="meniuc"><img src="img/imgg/kambarys.png"></div>';
	echo '
		<div class="meniuc">	Gavai <b><b>'.skaicius($powerReward).'</b></b>  <img src="img/bicons/attack.png"> , <b><b>'.skaicius($defenceReward).'</b></b>  <img src="img/bicons/shield.png"> bei  <b>5 </b> <img src="img/bicons/euro.png"></div>

	';

    $je = $zaidejai['jega'] + $powerReward;
    $gy = $zaidejai['gynyba'] + $defenceReward;
$laikas = time() + 60 * 60 * 3;
mysql_query("UPDATE zaidejai SET gravitacija = '$laikas' WHERE nick = '$nick' ")or die(mysql_error());
mysql_query("UPDATE zaidejai SET jega='$je', gynyba = '$gy', sms_litai=sms_litai+'5' WHERE nick = '$nick' ")or die(mysql_error());}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","gravitacija.php?id=","Atgal","Gravitacijos kambarys");
	navigacija($g_n);}


elseif($id == 'treniruotis2'){
	top('Gravitacijos kambarys > Antroji treniruotė');


    if ($zaidejai['gravitacija'] > time()) {
        echo '<div class="meniuc"><img src="img/imgg/kambarys.png"></div>';
        echo'
	<div class="meniuc"><b>Esate pavargęs po pirmosios treniruotės!</b><br> Treniruotis galėsi už <b><font color="red">  '.laikas($apie['gravitacija']-time(), 1).'</b></font></div>
';
    }
    elseif ($zaidejai['gravitacija2'] > time()){
    echo '<div class="meniuc"><img src="img/imgg/kambarys.png"></div>';
	echo'
	<div class="meniuc"><b>Treniruotis galima kas 6 valandas!</b><br> Treniruotis galėsi už <b><font color="red">  '.laikas($apie['gravitacija2']-time(), 1).'</b></font></div>
'; 
}
elseif ($apie['lygis'] < 29){
    echo '<div class="meniuc"><img src="img/imgg/kambarys.png"></div>';
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.png"> yra per mažas!</div>';


}
else{
    $powerReward = resolveReward(calculatePowerIncreaseByPercentage(3), 20000);
    $defenceReward = resolveReward(calculateDefenceIncreaseByPercentage(3), 60000);

    echo '<div class="meniuc"><img src="img/imgg/kambarys.png"></div>';
	echo '
		<div class="meniuc">	Gavai <b>'.skaicius($powerReward).'</b>  <img src="img/bicons/attack.png"> , <b>'.skaicius($defenceReward).'</b>  <img src="img/bicons/shield.png"> bei  <b>20 </b> <img src="img/bicons/euro.png"></div>

	';
    $je = $zaidejai['jega'] + $powerReward;
    $gy = $zaidejai['gynyba'] + $defenceReward;
    $laikas = time() + 60 * 60 * 6;
mysql_query("UPDATE zaidejai SET gravitacija2 = '$laikas' WHERE nick = '$nick' ")or die(mysql_error());
mysql_query("UPDATE zaidejai SET jega='$je', gynyba = '$gy', sms_litai=sms_litai+'20' WHERE nick = '$nick' ")or die(mysql_error());}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","gravitacija.php?id=","Atgal","Gravitacijos kambarys");
	navigacija($g_n);}

elseif($id == 'treniruotis3'){
	top('Gravitacijos kambarys');


    if ($zaidejai['gravitacija2'] > time()) {
        echo '<div class="meniuc"><img src="img/imgg/kambarys.png"></div>';
        echo'
	<div class="meniuc"><b>Esate pavargęs po antrosios treniruotės!</b><br> Treniruotis galėsi už <b><font color="red">  '.laikas($apie['gravitacija2']-time(), 1).'</b></font></div>
';
    }
    elseif ($zaidejai['gravitacija3'] > time()){
    echo '<div class="meniuc"><img src="img/imgg/kambarys.png"></div>';
	echo'
	<div class="meniuc"><b>Treniruotis galima kas 12 valandų!</b><br> Treniruotis galėsi už <b><font color="red">  '.laikas($apie['gravitacija3']-time(), 1).'</b></font></div>
'; 
}
elseif ($apie['lygis'] < 59){
    echo '<div class="meniuc"><img src="img/imgg/kambarys.png"></div>';
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.png"> yra per mažas!</div>';


}
else{
    $powerReward = resolveReward(calculatePowerIncreaseByPercentage(5), 600000);
    $defenceReward = resolveReward(calculateDefenceIncreaseByPercentage(5), 1800000);

    echo '<div class="meniuc"><img src="img/imgg/kambarys.png"></div>';
	echo '
		<div class="meniuc">	Gavai <b> '.skaicius($powerReward).' </b> <img src="img/bicons/attack.png"> , <b>'.skaicius($defenceReward).' </b> <img src="img/bicons/shield.png"> bei  <b>30</b> <img src="img/bicons/euro.png"></div>

	';
    $je = $zaidejai['jega'] + $powerReward;
    $gy = $zaidejai['gynyba'] + $defenceReward;
$laikas = time() + 60 * 60 * 12;
mysql_query("UPDATE zaidejai SET gravitacija3 = '$laikas' WHERE nick = '$nick' ")or die(mysql_error());
mysql_query("UPDATE zaidejai SET jega='$je', gynyba = '$gy', sms_litai=sms_litai+'30' WHERE nick = '$nick' ")or die(mysql_error());}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","gravitacija.php?id=","Atgal","Gravitacijos kambarys");
	navigacija($g_n);}
elseif($id == 'treniruotis4'){
	top('Gravitacijos kambarys');
	

if ($zaidejai['gravitacija4'] > time()){
    echo '<div class="meniuc"><img src="img/imgg/kambarys.png"></div>';
	echo'
	<div class="meniuc"><b>Treniruotis galima kas 24 valandas!</b><br> Treniruotis galėsi už <b><font color="red">  '.laikas($apie['gravitacija4']-time(), 1).'</b></font></div>
'; 
}
elseif ($apie['lygis'] < 89){
    echo '<div class="meniuc"><img src="img/imgg/kambarys.png"></div>';
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.png"> yra per mažas!</div>';


}
else{
    $powerReward = resolveReward(calculatePowerIncreaseByPercentage(8), 20000);
    $defenceReward = resolveReward(calculateDefenceIncreaseByPercentage(8), 60000);


    echo '<div class="meniuc"><img src="img/imgg/kambarys.png"></div>';
	echo '
				<div class="meniuc">	Gavai <b> '.skaicius($powerReward).' </b> <img src="img/bicons/attack.png"> , <b>'.skaicius($defenceReward).' </b> <img src="img/bicons/shield.png"> bei  <b>40</b> <img src="img/bicons/euro.png"></div>

	'; 
$je= $zaidejai['jega'] + $powerReward;
$gy=$zaidejai['gynyba'] + $defenceReward;
$laikas = time() + 60 * 60 * 24;
mysql_query("UPDATE zaidejai SET gravitacija4 = '$laikas' WHERE nick = '$nick' ")or die(mysql_error());
mysql_query("UPDATE zaidejai SET jega='$je', gynyba = '$gy', sms_litai=sms_litai+'40' WHERE nick = '$nick' ")or die(mysql_error());}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","gravitacija.php?id=","Atgal","Gravitacijos kambarys");
	navigacija($g_n);}

elseif($id == 'treniruotis5'){
	top('Gravitacijos kambarys');
	

if ($zaidejai['gravitacija5'] > time()){
    echo '<div class="meniuc"><img src="img/imgg/kambarys.png"></div>';
	echo'
	<div class="meniuc"><b>Treniruotis galima kas 48 valandas!</b><br> Treniruotis galėsi už <b><font color="red">  '.laikas($apie['gravitacija5']-time(), 1).'</b></font></div>
'; 
}
elseif ($apie['lygis'] < 119){
    echo '<div class="meniuc"><img src="img/imgg/kambarys.png"></div>';
echo'
<div class="meniuc">
Jūsų <img src="img/bicons/lvl.png"> yra per mažas!</div>';


}
else{
    echo '<div class="meniuc"><img src="img/imgg/kambarys.png"></div>';
	echo '
		<div class="meniuc">	Gavai <b>100000000</b>  <img src="img/bicons/attack.png"> , <b>30000000</b>  <img src="img/bicons/shield.png"> bei  <b>80 </b> <img src="img/bicons/euro.png"> </div>

	'; 
$je= $zaidejai['jega'] + 100000000;
$gy=$zaidejai['gynyba'] + 300000000;
$laikas = time() + 60 * 60 * 48;
mysql_query("UPDATE zaidejai SET gravitacija5 = '$laikas' WHERE nick = '$nick' ")or die(mysql_error());
mysql_query("UPDATE zaidejai SET jega='$je', gynyba = '$gy', sms_litai=sms_litai+'80' WHERE nick = '$nick' ")or die(mysql_error());}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","gravitacija.php?id=","Atgal","Gravitacijos kambarys");
	navigacija($g_n);}




  foot();

  function renderRewardInfo($hours, $power, $defence, $euro)
{
    echo '<div class="meniuc">
       Treniruotė truks <b>'.$hours.'</b> valandas, pasitreniravę gausite:<br>
         <b>'.skaicius($power).'</b> - <img src="img/bicons/attack.png">,<br>
         <b>'.skaicius($defence).'</b> - <img src="img/bicons/shield.png">,<br>
         <b>'.skaicius($euro).'</b> - <img src="img/bicons/euro.png">
</div>';
}

function renderTrainButton($workoutId, $name = 'Treniruotis')
{
    echo '<div class="meniuc">
<img src=img/imgg/kambarys.png border="1" width="16" height="16">
 <b><a href="?id='.$workoutId.'">'.$name.'</a></b>
    </div>';
}

function renderAvailableWorkouts()
{
    global $apie;

    if ($apie['lygis'] > 14) {
        echo '<div class="up">Pirmoji Treniruotė</div>';
        $powerReward = resolveReward(calculatePowerIncreaseByPercentage(1), 1000);
        $defenceReward = resolveReward(calculateDefenceIncreaseByPercentage(1), 3000);
        renderRewardInfo(3, $powerReward, $defenceReward, 5);
        renderTrainButton('treniruotis');
    }

    if ($apie['lygis'] > 29) {
        echo '<div class="up">Antroji Treniruotė</div>';
        $powerReward = resolveReward(calculatePowerIncreaseByPercentage(3), 20000);
        $defenceReward = resolveReward(calculateDefenceIncreaseByPercentage(3), 60000);
        renderRewardInfo(6, $powerReward, $defenceReward, 20);
        renderTrainButton('treniruotis2');
    }

    if ($apie['lygis'] > 59) {
        echo '<div class="up">Trečioji Treniruotė</div>';
        $powerReward = resolveReward(calculatePowerIncreaseByPercentage(5), 600000);
        $defenceReward = resolveReward(calculateDefenceIncreaseByPercentage(5), 1800000);
        renderRewardInfo(12, $powerReward, $defenceReward, 30);
        renderTrainButton('treniruotis3');
    }

    if ($apie['lygis'] > 89) {
        echo '<div class="up">Ketvirtoji Treniruotė</div>';
        $powerReward = resolveReward(calculatePowerIncreaseByPercentage(8), 600000);
        $defenceReward = resolveReward(calculateDefenceIncreaseByPercentage(8), 1800000);
        renderRewardInfo(24, $powerReward, $defenceReward, 40);
        renderTrainButton('treniruotis4');
    }
}