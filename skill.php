<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
$apie = mysql_fetch_assoc(mysql_query("SELECT * FROM zaidejai WHERE nick='$nick'"));
 $fsn = mysql_fetch_assoc(mysql_query("SELECT * FROM susijungimas WHERE nick='$nick' "));
    $fsn2 = mysql_fetch_assoc(mysql_query("SELECT * FROM susijungimas WHERE nick='$fsn[kitas_zaidejas]' "));

baneris();
topbar();
	if($user[tech] == '1'){
 				$kgg = 10000;
					$lvlss = 5;
$eur = 5;
$jeg2 = 1000;
$gyn2 = 3000;
					$jeggg =$apie['jega'] + 1000;
					$gynnn = $apie['gynyba'] + 3000;
					$gavai = 2 ;
				}
				if($user[tech] == '2'){
 				$kgg = 50000;
					$lvlss =10;
    $eur = 10;
$jeg2 = 2000;
$gyn2 = 6000;
					$jeggg =$apie['jega'] + 2000;
					$gynnn = $apie['gynyba'] + 6000;
					$gavai = 4 ;}
				if($user[tech] == '3'){
 				$kgg = 120000;
					$lvlss = 20;
  $eur = 15;
$jeg2 = 5000;
$gyn2 = 15000;
						$jeggg =$apie['jega'] + 5000;
					$gynnn = $apie['gynyba'] + 15000;
					$gavai = 6 ;}
				if($user[tech] == '4'){
 				$kgg = 250000;
					$lvlss = 25;
  $eur = 20;
$jeg2 = 10000;
$gyn2 = 30000;
					$jeggg =$apie['jega'] + 10000;
					$gynnn = $apie['gynyba'] + 30000;
					$gavai = 8 ;}
				if($user[tech] == '5'){
 				$kgg = 500000;
					$lvlss = 30;
  $eur = 25;
$jeg2 = 15000;
$gyn2 = 45000;
				$jeggg =$apie['jega'] + 15000;
					$gynnn = $apie['gynyba'] + 45000;
					$gavai = 10 ;}
				if($user[tech] == '6'){
 				$kgg = 1000000;
					$lvlss =35;
  $eur = 30;
$jeg2 = 25000;
$gyn2 = 75000;
						$jeggg =$apie['jega'] + 25000;
					$gynnn = $apie['gynyba'] + 75000;
					$gavai = 20 ;}
				if($user[tech] == '7'){
 				$kgg = 2000000;
					$lvlss = 40;
  $eur = 35;
$jeg2 = 50000;
$gyn2 = 150000;
						$jeggg =$apie['jega'] + 50000;
					$gynnn = $apie['gynyba'] + 150000;
					$gavai = 30;}
				
				if($user[tech] == '8'){
 				$kgg = 5000000;
					$lvlss = 50;
  $eur = 50;
$jeg2 = 100000;
$gyn2 = 300000;
					$jeggg =$apie['jega'] + 100000;
					$gynnn = $apie['gynyba'] + 300000;
					$gavai = 50 ;}
if($id == ""){
   online('Skill\'s');
  top('Mano skillai');
   echo '  <div class="meniuc">
       
        	<img src="img/imgg/skilai.png"></div>';
   echo '<div class="meniuc">Skill\'s - čia galima mokytis auras, mokytis unikalių technikų, daryti transformacijas, išmokti Susijungimo šokį, už tai jūs įgaunate vis naujų statusų. </div>';
   echo '<div class="line"></div><div class="meniu">
 
<img src="img/veikejai/'.$apie['veikejas'].'-'.$apie[trans].'.png" border="1" width="16" height="16"><a href="transformacijos.php?id=">Transformacijos</a><br/></div>
  
<div class="meniu"><img src=img/imgg/technikos.png border="1" width="16" height="16"><a href="technikos.php?id=">Technikos</a><br/></div>
<div class="meniu"><img src=img/imgg/sokis.png border="1" width="16" height="16"> <a href="?id=mokytis">Susijungimo pamoka</a><br/></div>
<div class="meniu"><img src=img/imgg/sokis.png border="1" width="16" height="16"><a href="?id=fusion">Susijungimo šokis</a><br/></div>
<div class="meniu"><img src=img/imgg/auros.png border="1" width="16" height="16"> <a href="aura.php?id=">Auros</a><br/></div>
<div class="meniu"><img src=img/imgg/ttechnikos.png border="1" width="16" height="16"> <a href="?id=improve">Technikos tobulinimas</a><br/></div><div class="meniu">
 ';


if($apie['veikejas'] == "Gokas" or $apie['veikejas'] == "Vedzitas"){
	echo'  '.$ico.' <a href="?id=vegito">Tapk Vegito</a><br/>';}


echo'</div>';
echo "<div class='up'>Manevrai</div>";
echo "<div class='meniu'>
<img src=img/imgg/persikelimas.png border='1' width='16' height='16'><a href='?id=persikelimas'>Staigaus persikėlimo manevras</a></div>";
if($apie['veikejas'] == "Gokas" or $apie['veikejas'] == "Vedzitas"or $apie['veikejas'] == "Gohanas"or $apie['veikejas'] == "Tranksas"or $apie['veikejas'] == "Fryzas"or $apie['veikejas'] == "Buu"or $apie['veikejas'] == "Selas"or $apie['veikejas'] == "Pikolas"or $apie['veikejas'] == "Krilinas"or $apie['veikejas'] == "Kapitonas ginis"or $apie['veikejas'] == "Raditas"or $apie['veikejas'] == "Neilas"or $apie['veikejas'] == "Nappas"or $apie['veikejas'] == "Dendis"or $apie['veikejas'] == "Bulma"){
echo "<div class='up'>Unikalios Savybės</div>";
echo "<div class='meniu'>";
if($apie['veikejas'] == "Gokas"){
echo"<img src=img/unisavybes/kamehameha.jpg border='1' width='16' height='16'><a href='?id=kamehameha'>Kamehameha technika</a>";

echo"</div>";}
if($apie['veikejas'] == "Vedzitas"){
echo"<img src=img/unisavybes/finalflash.jpg border='1' width='16' height='16'><a href='?id=finalflash'>Final Flash technika</a>";

echo"</div>";}
if($apie['veikejas'] == "Gohanas"){
echo"<img src=img/unisavybes/masenko.jpeg border='1' width='16' height='16'><a href='?id=masenko'>Masenko technika</a>";

echo"</div>";}
if($apie['veikejas'] == "Tranksas"){
echo"<img src=img/unisavybes/galickgun.jpg border='1' width='16' height='16'><a href='?id=galickgun'>Galick Gun technika</a>";

echo"</div>";}

if($apie['veikejas'] == "Fryzas"){
echo"<img src=img/unisavybes/deathlaser.jpg border='1' width='16' height='16'><a href='?id=deathlaser'>Death Laser technika</a>";

echo"</div>";}
if($apie['veikejas'] == "Buu"){
echo"<img src=img/unisavybes/gack.jpg border='1' width='16' height='16'><a href='?id=gack'>Gack technika</a>";

echo"</div>";}

if($apie['veikejas'] == "Selas"){
echo"<img src=img/unisavybes/sayanpower.jpg border='1' width='16' height='16'><a href='?id=sayanpower'>Sayan Power technika</a>";

echo"</div>";}
if($apie['veikejas'] == "Pikolas"){
echo"<img src=img/unisavybes/makosen.jpg border='1' width='16' height='16'><a href='?id=makosen'>Makosen technika</a>";

echo"</div>";}
if($apie['veikejas'] == "Krilinas"){
echo"<img src=img/unisavybes/kamehameha2.jpg border='1' width='16' height='16'><a href='?id=kamehameha2'>Kamehameha technika</a>";

echo"</div>";}
if($apie['veikejas'] == "Kapitonas ginis"){
echo"<img src=img/unisavybes/changed.jpg border='1' width='16' height='16'><a href='?id=changed'>Changed technika</a>";

echo"</div>";}
if($apie['veikejas'] == "Raditas"){
echo"<img src=img/unisavybes/begone.jpg border='1' width='16' height='16'><a href='?id=begone'>Begone technika</a>";

echo"</div>";}
if($apie['veikejas'] == "Neilas"){
echo"<img src=img/unisavybes/regeneration.jpg border='1' width='16' height='16'><a href='?id=regeneration'>Regeneration technika</a>";

echo"</div>";}
if($apie['veikejas'] == "Nappas"){
echo"<img src=img/unisavybes/armbreak.jpg border='1' width='16' height='16'><a href='?id=armbreak'>ArmBreak technika</a>";

echo"</div>";}
if($apie['veikejas'] == "Dendis"){
echo"<img src=img/unisavybes/healing.jpg border='1' width='16' height='16'><a href='?id=healing'>Healing technika</a>";

echo"</div>";}
if($apie['veikejas'] == "Bulma"){
echo"<img src=img/unisavybes/angry.jpg border='1' width='16' height='16'><a href='?id=angry'>Angry Bulma technika</a>";

echo"</div>";}

}

   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Skillai");
	navigacija($g_n);

}
 if($id == "1"){
top('Kamehameha savybė');
if($apie['veikejas'] == "Gokas"){

if($apie[kenergija] < 49999){
echo'<div class="meniuc">Neturi tiek reikiamos '.$energyi.' energijos!</div>';}
elseif($apie['Kamehameha']=='+'){
    echo '<div class="meniuc"><img src=img/unisavybes/kamehameha.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b> Kamehameha</b> technika!</div>";
}
else{echo'<div class="meniuc">Sėkmingai gavai techniką!</div>';

mysql_query("UPDATE zaidejai SET Kamehameha='+' WHERE nick='$nick'");
}
}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($id == "2"){
top('Final flash savybė');
if($apie['veikejas'] == "Vedzitas"){

if($apie[kenergija2] < 49999){
echo'<div class="meniuc">Neturi tiek reikiamos '.$energyi.' energijos!</div>';}
elseif($apie['Finalflash']=='+'){
    echo '<div class="meniuc"><img src=img/unisavybes/finalflash.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi šią  technika!</div>";
}
else{echo'<div class="meniuc">Sėkmingai gavai techniką!</div>';
mysql_query("UPDATE zaidejai SET Finalflash='+' WHERE nick='$nick'");
}
}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($id == "3"){
top('Masenko savybė');
if($apie['veikejas'] == "Gohanas"){

if($apie[kenergija3] < 49999){
echo'<div class="meniuc">Neturi tiek reikiamos '.$energyi.' energijos!</div>';}
elseif($apie['Masenko']=='+'){
    echo '<div class="meniuc"><img src=img/unisavybes/masenko.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi šią  technika!</div>";
}
else{echo'<div class="meniuc">Sėkmingai gavai techniką!</div>';
mysql_query("UPDATE zaidejai SET Finalflash='+' WHERE nick='$nick'");
}
}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($id == "4"){
top('Galick Gun savybė');
if($apie['veikejas'] == "Tranksas"){

if($apie[kenergija4] < 49999){
echo'<div class="meniuc">Neturi tiek reikiamos '.$energyi.' energijos!</div>';}
elseif($apie['Galickgun']=='+'){
    echo '<div class="meniuc"><img src=img/unisavybes/galickgun.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi šią  technika!</div>";
}
mysql_query("UPDATE zaidejai SET Galickgun='+' WHERE nick='$nick'");

}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}

if($id == "5"){
top('Death Laser savybė');
if($apie['veikejas'] == "Fryzas"){

if($apie[kenergija5] < 49999){
echo'<div class="meniuc">Neturi tiek reikiamos '.$energyi.' energijos!</div>';}
elseif($apie['Deathlaser']=='+'){
    echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi šią  technika!</div>";
}
else{echo'<div class="meniuc">Sėkmingai gavai techniką!</div>';
mysql_query("UPDATE zaidejai SET Deathlaser='+' WHERE nick='$nick'");
}
}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($id == "6"){
top('Gack savybė');
if($apie['veikejas'] == "Buu"){

if($apie[kenergija6] < 49999){
echo'<div class="meniuc">Neturi tiek reikiamos '.$energyi.' energijos!</div>';}
elseif($apie['Gack']=='+'){
    echo '<div class="meniuc"><img src=img/unisavybes/gack.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi šią  technika!</div>";
}
else{echo'<div class="meniuc">Sėkmingai gavai techniką!</div>';
mysql_query("UPDATE zaidejai SET Gack='+' WHERE nick='$nick'");
}
}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($id == "7"){
top('Selas savybė');
if($apie['veikejas'] == "Selas"){

if($apie[kenergija7] < 49999){
echo'<div class="meniuc">Neturi tiek reikiamos '.$energyi.' energijos!</div>';}
elseif($apie['Sayanpower']=='+'){
    echo '<div class="meniuc"><img src=img/unisavybes/sayanpower.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi šią  technika!</div>";
}
else{echo'<div class="meniuc">Sėkmingai gavai techniką!</div>';
mysql_query("UPDATE zaidejai SET Sayanpower='+' WHERE nick='$nick'");
}
}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($id == "8"){
top('Makosen savybė');
if($apie['veikejas'] == "Pikolas"){

if($apie[kenergija8] < 49999){
echo'<div class="meniuc">Neturi tiek reikiamos '.$energyi.' energijos!</div>';}
elseif($apie['Makosen']=='+'){
    echo '<div class="meniuc"><img src=img/unisavybes/makosen.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi šią  technika!</div>";
}
else{echo'<div class="meniuc">Sėkmingai gavai techniką!</div>';
mysql_query("UPDATE zaidejai SET Makosen='+' WHERE nick='$nick'");
}
}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($id == "9"){
top('Kamehameha savybė');
if($apie['veikejas'] == "Krilinas"){

if($apie[kenergija9] < 49999){
echo'<div class="meniuc">Neturi tiek reikiamos '.$energyi.' energijos!</div>';}
elseif($apie['Kamehameha2']=='+'){
    echo '<div class="meniuc"><img src=img/unisavybes/kamehameha2.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi šią  technika!</div>";
}
else{echo'<div class="meniuc">Sėkmingai gavai techniką!</div>';
mysql_query("UPDATE zaidejai SET Kamehameha2='+' WHERE nick='$nick'");
}
}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($id == "10"){
top('Changed savybė');
if($apie['veikejas'] == "Kapitonas ginis"){

if($apie[kenergija10] < 49999){
echo'<div class="meniuc">Neturi tiek reikiamos '.$energyi.' energijos!</div>';}
elseif($apie['Changed']=='+'){
    echo '<div class="meniuc"><img src=img/unisavybes/changed.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi šią  technika!</div>";
}
else{echo'<div class="meniuc">Sėkmingai gavai techniką!</div>';
mysql_query("UPDATE zaidejai SET Changed='+' WHERE nick='$nick'");
}
}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($id == "11"){
top('Begone savybė');
if($apie['veikejas'] == "Raditas"){

if($apie[kenergija11] < 49999){
echo'<div class="meniuc">Neturi tiek reikiamos '.$energyi.' energijos!</div>';}
elseif($apie['Begone']=='+'){
    echo '<div class="meniuc"><img src=img/unisavybes/begone.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi šią  technika!</div>";
}
else{echo'<div class="meniuc">Sėkmingai gavai techniką!</div>';
mysql_query("UPDATE zaidejai SET Begone='+' WHERE nick='$nick'");
}
}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($id == "12"){
top('Regeneration savybė');
if($apie['veikejas'] == "Neilas"){

if($apie[kenergija12] < 49999){
echo'<div class="meniuc">Neturi tiek reikiamos '.$energyi.' energijos!</div>';}
elseif($apie['Regeneration']=='+'){
    echo '<div class="meniuc"><img src=img/unisavybes/regeneration.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi šią  technika!</div>";
}
else{echo'<div class="meniuc">Sėkmingai gavai techniką!</div>';
mysql_query("UPDATE zaidejai SET Regeneration='+' WHERE nick='$nick'");
}
}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}


if($id == "13"){
top('ArmBreak savybė');
if($apie['veikejas'] == "Nappas"){

if($apie[kenergija13] < 49999){
echo'<div class="meniuc">Neturi tiek reikiamos '.$energyi.' energijos!</div>';}
elseif($apie['ArmBreak']=='+'){
    echo '<div class="meniuc"><img src=img/unisavybes/armbreak.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi šią  technika!</div>";
}
else{echo'<div class="meniuc">Sėkmingai gavai techniką!</div>';
mysql_query("UPDATE zaidejai SET ArmBreak='+' WHERE nick='$nick'");
}
}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($id == "14"){
top('Healing savybė');
if($apie['veikejas'] == "Dendis"){

if($apie[kenergija14] < 49999){
echo'<div class="meniuc">Neturi tiek reikiamos '.$energyi.' energijos!</div>';}
elseif($apie['Healing']=='+'){
    echo '<div class="meniuc"><img src=img/unisavybes/healing.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi šią  technika!</div>";
}
else{echo'<div class="meniuc">Sėkmingai gavai techniką!</div>';
mysql_query("UPDATE zaidejai SET Healing='+' WHERE nick='$nick'");
}
}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}

if($id == "15"){
top('AngryBulma savybė');
if($apie['veikejas'] == "Bulma"){

if($apie[kenergija15] < 49999){
echo'<div class="meniuc">Neturi tiek reikiamos '.$energyi.' energijos!</div>';}
elseif($apie['AngryBulma']=='+'){
    echo '<div class="meniuc"><img src=img/unisavybes/angry.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi šią  technika!</div>";
}
else{echo'<div class="meniuc">Sėkmingai gavai techniką!</div>';
mysql_query("UPDATE zaidejai SET AngryBulma='+' WHERE nick='$nick'");
}
}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($id == "kamehameha"){
if($apie[kenergija] < 500000){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;

		top('Kamehameha savybė');
if($apie['veikejas'] == "Gokas"){

echo '<div class="meniuc"><img src=img/unisavybes/kamehameha.jpg border="1" width="180" height="90"></div><div class="meniuc">';if($apie[kenergija] < 50000){echo'Norint gauti <b>Kamehamha</b> technika pirma turite sukaupti jos energiją! <br><b>1 Kaupimas</b>  - 2 '.$eurui.'<br>';}echo'<b>Kamehameha</b> suteikia <b>4x</b> '.$pinigaii.' iš kovų zonos!</div>';
if($apie[kenergija] < 50000){
echo'<div class="meniuc">
<b>Kaupti <b>Kamehameha</b> energiją</b><br>
 <a href="?id=kaupiu&kodas='.$kodas.'">Kaupti '.$energyi.'energiją</a>('.$apie['kenergija'].'/<b>50000</b>) -2 '.$eurui.'
</div>';}
if($apie[kenergija] < 50000){
echo'<div class="meniuc"><a href="?id=sukaupimas"><b>Sukaupti '.$energyi.'energija iškarto</a></b>[<b>2000</b>'.$eurui.']</div>
';}
  }
}
if($apie[kenergija] > 50000){
echo'<div class="meniuc">Įvaldei šią techniką!</div>';}
if($apie['Kamehameha']==''){echo'
<div class="meniuc"><a href="?id=1">Pasiimk savo techniką!</a></div>
';}

$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
}

	if($id == "sukaupimas"){
    online('Kamehameha savybe');
  top('Kamehameha savybe');
if($apie['veikejas'] == "Gokas"){

if($apie['Kamehameha']> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/kamehameha.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b> Kamehameha</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($apie[sms_litai] < 1999){
echo '<div class="meniuc"><img src=img/unisavybes/kamehameha.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
else{
echo '<div class="meniuc"><img src=img/unisavybes/kamehameha.jpg border="1" width="180" height="90"></div>';
echo'<div class="meniuc">Sėkmingai! Sukaupėte visą <b>Kamehameha</b> '.$energyi.' energiją už <b>2000</b>'.$eurui.'!</div>';
mysql_query("UPDATE zaidejai SET kenergija=kenergija+'50000', sms_litai=sms_litai-'2000', Kamehameha='+' WHERE nick='$nick'");

}

}
}


if($id == "kaupiu"){
    online('Kamehameha savybe');
  top('Kamehameha savybe');
if($apie['veikejas'] == "Gokas"){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
      	if($kodas != $_SESSION[kd]){
	echo '<div class="meniuc"><img src=img/unisavybes/kamehameha.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
elseif($apie['Kamehameha']> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/kamehameha.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b> Kamehameha</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
elseif($apie[sms_litai] < 2){
echo '<div class="meniuc"><img src=img/unisavybes/kamehameha.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
	elseif($_SESSION[kaupimas] > time()){
	echo '<div class="meniuc"><img src=img/unisavybes/kamehameha.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Per greit kaupi! Kaupti galėsi už <b>'.laikas($_SESSION[kaupimas]-time(), 1).'</b>
</div>';
 echo'<div class="meniuc"><a href="?id=kaupiu&kodas='.$kodas.'">Kaupti toliau</a></div>';

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kaupimas] = time()+1;


       echo '<div class="meniuc"><img src=img/unisavybes/kamehameha.jpg border="1" width="180" height="90"></div>';
 echo '<div class="meniuc">Sėkmingai! +<b>100 '.$energyi.'energijos</b> Išviso sukaupęs: <b>'.$apie['kenergija'].'</b> '.$energyi.'energijos!</div>';

mysql_query("UPDATE zaidejai SET kenergija=kenergija+'100', sms_litai=sms_litai-'2' WHERE nick='$nick'");
echo'<div class="meniuc"><a href="?id=kaupiu&kodas='.$kodas.'">Kaupti toliau</a></div>';
}
}
}
/// vedzito
if($id == "finalflash"){
if($apie[kenergija2] < 500000){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;

		top('Final flash savybė');
if($apie['veikejas'] == "Vedzitas"){

echo '<div class="meniuc"><img src=img/unisavybes/finalflash.jpg border="1" width="180" height="90"></div><div class="meniuc">';if($apie[kenergija2] < 50000){echo'Norint gauti <b>Final Flash</b> techniką pirma turite sukaupti jos energiją! <br><b>1 Kaupimas</b>  - 2 '.$eurui.'<br>';}echo'<b>Final Flash</b> suteikia <b>3x</b> '.$expi.' iš kovų zonos!</div>';
if($apie[kenergija2] < 50000){
echo'<div class="meniuc">
<b>Kaupti <b>Final Flash</b> energiją</b><br>
 <a href="?id=kaupiu2&kodas='.$kodas.'">Kaupti '.$energyi.'energiją</a>('.$apie['kenergija2'].'/<b>50000</b>) -2 '.$eurui.'
</div>';}
if($apie[kenergija2] < 50000){
echo'<div class="meniuc"><a href="?id=sukaupimas2"><b>Sukaupti '.$energyi.'energija iškarto</a></b>[<b>2000</b>'.$eurui.']</div>
';}
  }
}
if($apie[kenergija2] > 49999){
echo'<div class="meniuc">Įvaldei šią techniką!</div>';}
if($apie['Finalflash']==''){echo'
<div class="meniuc"><a href="?id=2">Pasiimk savo techniką!</a></div>
';}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
}

	if($id == "sukaupimas2"){
    online('Final flash savybe');
  top('Final flash savybe');
if($apie['veikejas'] == "Vedzitas"){

if($apie['Finalflash']> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/finalflash.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b> Final Flash</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($apie[sms_litai] < 999){
echo '<div class="meniuc"><img src=img/unisavybes/finalflash.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
else{
echo '<div class="meniuc"><img src=img/unisavybes/finalflash.jpg border="1" width="180" height="90"></div>';
echo'<div class="meniuc">Sėkmingai! Sukaupėte visą <b>Final Flash</b> '.$energyi.'energiją už <b>2000</b>'.$eurui.'!</div>';
mysql_query("UPDATE zaidejai SET kenergija2=kenergija2+'50000', sms_litai=sms_litai-'2000', Finalflash='+' WHERE nick='$nick'");

}

}
}


if($id == "kaupiu2"){
    online('Final Flash savybe');
  top('Final flash savybe');
if($apie['veikejas'] == "Vedzitas"){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
      	if($kodas != $_SESSION[kd]){
	echo '<div class="meniuc"><img src=img/unisavybes/finalflash.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
elseif($apie['Finalflash']> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/finalflash.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b> Final Flash</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
elseif($apie[sms_litai] < 2){
echo '<div class="meniuc"><img src=img/unisavybes/finalflash.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
	elseif($_SESSION[kaupimas] > time()){
	echo '<div class="meniuc"><img src=img/unisavybes/finalflash.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Per greit kaupi! Kaupti galėsi už<b> '.laikas($_SESSION[kaupimas]-time(), 1).'</b>
</div>';
 echo'<div class="meniuc"><a href="?id=kaupiu2&kodas='.$kodas.'">Kaupti toliau</a></div>';

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kaupimas] = time()+1;


       echo '<div class="meniuc"><img src=img/unisavybes/finalflash.jpg border="1" width="180" height="90"></div>';
 echo '<div class="meniuc">Sėkmingai! +<b> 100 '.$energyi.'energijos</b> Išviso sukaupęs: <b>'.$apie['kenergija2'].'</b> '.$energyi.'energijos!</div>';

mysql_query("UPDATE zaidejai SET kenergija2=kenergija2+'100', sms_litai=sms_litai-'2' WHERE nick='$nick'");
echo'<div class="meniuc"><a href="?id=kaupiu2&kodas='.$kodas.'">Kaupti toliau</a></div>';
}
}
}


/// Gohano
if($id == "masenko"){
if($apie[kenergija3] < 500000){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;

		top('Masenko savybė');
if($apie['veikejas'] == "Gohanas"){

echo '<div class="meniuc"><img src=img/unisavybes/masenko.jpeg border="1" width="180" height="90"></div><div class="meniuc">';if($apie[kenergija3] < 50000){echo'Norint gauti <b>Masenko </b> techniką pirma turite sukaupti jos energiją! <br><b>1 Kaupimas</b>  - 1 '.$eurui.'<br>';}echo'<b>Masenko</b> suteikia <b>2x</b> '.$pinigaii.' , '.$expi.' iš kovų zonos!</div>';
if($apie[kenergija3] < 50000){
echo'<div class="meniuc">
<b>Kaupti <b>Masenko</b> energiją</b><br>
 <a href="?id=kaupiu3&kodas='.$kodas.'">Kaupti '.$energyi.' energiją</a>('.$apie['kenergija3'].'/<b>50000</b>) -1 '.$eurui.'
</div>';}
if($apie[kenergija3] < 50000){
echo'<div class="meniuc"><a href="?id=sukaupimas3"><b>Sukaupti '.$energyi.' energija iškarto</a></b>[<b>1000</b>'.$eurui.']</div>
';}
  }
}
if($apie[kenergija3] > 49999){
echo'<div class="meniuc">Įvaldei šią techniką!</div>';}
if($apie['Masenko']==''){echo'
<div class="meniuc"><a href="?id=3">Pasiimk savo techniką!</a></div>
';}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
}

	if($id == "sukaupimas3"){
    online('Masenko savybe');
  top('Masenko savybe');
if($apie['veikejas'] == "Gohanas"){

if($apie['Masenko']> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/masenko.jpeg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>Masenko</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($apie[sms_litai] < 999){
echo '<div class="meniuc"><img src=img/unisavybes/masenko.jpeg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
else{
echo '<div class="meniuc"><img src=img/unisavybes/masenko.jpeg border="1" width="180" height="90"></div>';
echo'<div class="meniuc">Sėkmingai! Sukaupėte visą <b>Masenko</b> '.$energyi.' energiją už <b>1000</b>'.$eurui.'!</div>';
mysql_query("UPDATE zaidejai SET kenergija3=kenergija3+'50000', sms_litai=sms_litai-'1000', Masenko='+' WHERE nick='$nick'");

}

}
}


if($id == "kaupiu3"){
    online('Masenko savybe');
  top('Masenko savybe');
if($apie['veikejas'] == "Gohanas"){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
      	if($kodas != $_SESSION[kd]){
	echo '<div class="meniuc"><img src=img/unisavybes/masenko.jpeg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
elseif($apie['Masenko']> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/masenko.jpeg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>Masenko</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
elseif($apie[sms_litai] < 1){
echo '<div class="meniuc"><img src=img/unisavybes/masenko.jpeg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
	elseif($_SESSION[kaupimas] > time()){
	echo '<div class="meniuc"><img src=img/unisavybes/masenko.jpeg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Per greit kaupi! Kaupti galėsi už <b> '.laikas($_SESSION[kaupimas]-time(), 1).'</b>
</div>';
 echo'<div class="meniuc"><a href="?id=kaupiu3&kodas='.$kodas.'">Kaupti toliau</a></div>';

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kaupimas] = time()+1;


       echo '<div class="meniuc"><img src=img/unisavybes/masenko.jpeg border="1" width="180" height="90"></div>';
 echo '<div class="meniuc">Sėkmingai! +<b> 100 '.$energyi.' energijos</b> Išviso sukaupęs: <b>'.$apie['kenergija3'].'</b> '.$energyi.' energijos!</div>';

mysql_query("UPDATE zaidejai SET kenergija3=kenergija3+'100', sms_litai=sms_litai-'1' WHERE nick='$nick'");
echo'<div class="meniuc"><a href="?id=kaupiu3&kodas='.$kodas.'">Kaupti toliau</a></div>';
}
}
}

/// Trankso
if($id == "galickgun"){
if($apie[kenergija4] < 500000){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;

		top('Galick Gun savybė');
if($apie['veikejas'] == "Tranksas"){

echo '<div class="meniuc"><img src=img/unisavybes/galickgun.jpg border="1" width="180" height="90"></div><div class="meniuc">';if($apie[kenergija4] < 50000){echo'Norint gauti <b>Galick Gun</b> techniką pirma turite sukaupti jos energiją! <br><b>1 Kaupimas</b>  - 3 '.$eurui.'<br>';}echo'<b>Galick Gun</b> suteikia <b>3.5x</b> '.$pinigaii.' ,   <b>4.5x</b> '.$expi.' iš kovų zonos!</div>';
if($apie[kenergija4] < 50000){
echo'<div class="meniuc">
<b>Kaupti <b>Galick Gun</b> energiją</b><br>
 <a href="?id=kaupiu4&kodas='.$kodas.'">Kaupti '.$energyi.' energiją</a>('.$apie['kenergija4'].'/<b>50000</b>) -3 '.$eurui.'
</div>';}
if($apie[kenergija4] < 50000){
echo'<div class="meniuc"><a href="?id=sukaupimas4"><b>Sukaupti '.$energyi.' energija iškarto</a></b>[<b>3000</b>'.$eurui.']</div>
';}
  }
}
if($apie[kenergija4] > 49999){
echo'<div class="meniuc">Įvaldei šią techniką!</div>';}
if($apie['Galickgun']==''){echo'
<div class="meniuc"><a href="?id=4">Pasiimk savo techniką!</a></div>
';}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
}

	if($id == "sukaupimas4"){
    online('Galick Gun savybe');
  top('Galick Gun savybe');
if($apie['veikejas'] == "Tranksas"){

if($apie['Galickgun']> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/galickgun.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>Galick Gun</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($apie[sms_litai] < 2999){
echo '<div class="meniuc"><img src=img/unisavybes/galickgun.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
else{
echo '<div class="meniuc"><img src=img/unisavybes/galickgun.jpg border="1" width="180" height="90"></div>';
echo'<div class="meniuc">Sėkmingai! Sukaupėte visą <b>Galick Gun</b> '.$energyi.' energiją už <b>3000</b>'.$eurui.'!</div>';
mysql_query("UPDATE zaidejai SET kenergija4=kenergija4+'50000', sms_litai=sms_litai-'3000', Galickgun='+' WHERE nick='$nick'");

}

}
}


if($id == "kaupiu4"){
    online('Galick Gun savybe');
  top('Galick Gun savybe');
if($apie['veikejas'] == "Tranksas"){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
      	if($kodas != $_SESSION[kd]){
	echo '<div class="meniuc"><img src=img/unisavybes/galickgun.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
elseif($apie['Galickgun']> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/galickgun.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>Galick Gun</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
elseif($apie[sms_litai] < 3){
echo '<div class="meniuc"><img src=img/unisavybes/galickgun.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
	elseif($_SESSION[kaupimas] > time()){
	echo '<div class="meniuc"><img src=img/unisavybes/galickgun.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Per greit kaupi! Kaupti galėsi už <b> '.laikas($_SESSION[kaupimas]-time(), 1).'</b>
</div>';
 echo'<div class="meniuc"><a href="?id=kaupiu4&kodas='.$kodas.'">Kaupti toliau</a></div>';

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kaupimas] = time()+1;


       echo '<div class="meniuc"><img src=img/unisavybes/galickgun.jpg border="1" width="180" height="90"></div>';
 echo '<div class="meniuc">Sėkmingai! +<b> 100 '.$energyi.' energijos</b> Išviso sukaupęs: <b>'.$apie['kenergija4'].'</b> '.$energyi.' energijos!</div>';

mysql_query("UPDATE zaidejai SET kenergija4=kenergija4+'100', sms_litai=sms_litai-'3' WHERE nick='$nick'");
echo'<div class="meniuc"><a href="?id=kaupiu4&kodas='.$kodas.'">Kaupti toliau</a></div>';
}
}
}

/// Fryzo
if($id == "deathlaser"){
if($apie[kenergija5] < 500000){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;

		top('Death Laser savybė');
if($apie['veikejas'] == "Fryzas"){

echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div><div class="meniuc">';if($apie[kenergija5] < 50000){echo'Norint gauti <b>Death Laser</b> techniką pirma turite sukaupti jos energiją! <br><b>1 Kaupimas</b>  - 2 '.$eurui.'<br>';}echo'<b>Death Laser</b> suteikia <b>2.5x</b> '.$pinigaii.' ,  <b>3.5x</b> '.$expi.'  iš kovų zonos!</div>';
if($apie[kenergija5] < 50000){
echo'<div class="meniuc">
<b>Kaupti <b>Death Laser</b> energiją</b><br>
 <a href="?id=kaupiu5&kodas='.$kodas.'">Kaupti '.$energyi.' energiją</a>('.$apie['kenergija5'].'/<b>50000</b>) -2 '.$eurui.'
</div>';}
if($apie[kenergija5] < 50000){
echo'<div class="meniuc"><a href="?id=sukaupimas5"><b>Sukaupti '.$energyi.' energija iškarto</a></b>[<b>2000</b>'.$eurui.']</div>
';}
  }
}
if($apie[kenergija5] > 49999){
echo'<div class="meniuc">Įvaldei šią techniką!</div>';}
if($apie['Deathlaser']==''){echo'
<div class="meniuc"><a href="?id=5">Pasiimk savo techniką!</a></div>
';}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
}

	if($id == "sukaupimas5"){
    online('Death Laser savybe');
  top('Death Laser savybe');
if($apie['veikejas'] == "Fryzas"){

if($apie['Deathlaser']> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>Death Laser</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($apie[sms_litai] < 1999){
echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
else{
echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div>';
echo'<div class="meniuc">Sėkmingai! Sukaupėte visą <b>Death Laser</b> '.$energyi.' energiją už <b>2000</b>'.$eurui.'!</div>';
mysql_query("UPDATE zaidejai SET kenergija5=kenergija5+'50000', sms_litai=sms_litai-'2000', Deathlaser='+' WHERE nick='$nick'");

}

}
}


if($id == "kaupiu5"){
    online('Death Laser savybe');
  top('Death Laser savybe');
if($apie['veikejas'] == "Fryzas"){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
      	if($kodas != $_SESSION[kd]){
	echo '<div class="meniuc"><img src=img/unisavybes/desthlaser.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
elseif($apie['Deathlaser']> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>Death Laser</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
elseif($apie[sms_litai] < 2){
echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
	elseif($_SESSION[kaupimas] > time()){
	echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Per greit kaupi! Kaupti galėsi už <b> '.laikas($_SESSION[kaupimas]-time(), 1).'</b>
</div>';
 echo'<div class="meniuc"><a href="?id=kaupiu5&kodas='.$kodas.'">Kaupti toliau</a></div>';

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kaupimas] = time()+1;


       echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div>';
 echo '<div class="meniuc">Sėkmingai! +<b> 100 '.$energyi.' energijos</b> Išviso sukaupęs: <b>'.$apie['kenergija5'].'</b> '.$energyi.' energijos!</div>';

mysql_query("UPDATE zaidejai SET kenergija5=kenergija5+'100', sms_litai=sms_litai-'2' WHERE nick='$nick'");
echo'<div class="meniuc"><a href="?id=kaupiu5&kodas='.$kodas.'">Kaupti toliau</a></div>';
}
}
}
///Buu
if($id == "gack"){
if($apie[$energija] < 500000){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;

		top('Gack savybė');
if($apie['veikejas'] == "Buu"){
$tech='gack';
$tech2='Gack';
$energija='kenergija6';
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div><div class="meniuc">';if($apie[$energija] < 50000){echo'Norint gauti <b>'.$tech2.'</b> techniką pirma turite sukaupti jos energiją! <br><b>1 Kaupimas</b>  - 1 '.$eurui.'<br>';}echo'<b>'.$tech2.'</b> suteikia <b>2x</b> kerta daugiau bosams!</div>';
if($apie[$energija] < 50000){
echo'<div class="meniuc">
<b>Kaupti <b>'.$tech2.'</b> energiją</b><br>
 <a href="?id=kaupiu6&kodas='.$kodas.'">Kaupti '.$energyi.' energiją</a>('.$apie[$energija].'/<b>50000</b>) -1 '.$eurui.'
</div>';}
if($apie[$energija] < 50000){
echo'<div class="meniuc"><a href="?id=sukaupimas6"><b>Sukaupti '.$energyi.' energija iškarto</a></b>[<b>1000</b>'.$eurui.']</div>
';}
  }
}
if($apie[kenergija6] > 49999){
echo'<div class="meniuc">Įvaldei šią techniką!</div>';}
if($apie['Gack']==''){echo'
<div class="meniuc"><a href="?id=6">Pasiimk savo techniką!</a></div>
';}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
}

	if($id == "sukaupimas6"){
    online('Death Laser savybe');
  top('Death Laser savybe');
$tech='gack';
$tech2='Gack';
$energija='kenergija6';

if($apie['veikejas'] == "Buu"){

if($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($apie[sms_litai] < 999){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
else{
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo'<div class="meniuc">Sėkmingai! Sukaupėte visą <b>'.$tech2.'</b> '.$energyi.' energiją už <b>1000</b>'.$eurui.'!</div>';
mysql_query("UPDATE zaidejai SET kenergija6=kenergija6+'50000', sms_litai=sms_litai-'1000', Gack='+' WHERE nick='$nick'");

}

}
}


if($id == "kaupiu6"){
    online('Gack savybe');
  top('Gack savybe');
$tech='gack';
$tech2='Gack';
$energija='kenergija6';

if($apie['veikejas'] == "Buu"){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
      	if($kodas != $_SESSION[kd]){
	echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
elseif($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
elseif($apie[sms_litai] < 1){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
	elseif($_SESSION[kaupimas] > time()){
	echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Per greit kaupi! Kaupti galėsi už <b> '.laikas($_SESSION[kaupimas]-time(), 1).'</b>
</div>';
 echo'<div class="meniuc"><a href="?id=kaupiu6&kodas='.$kodas.'">Kaupti toliau</a></div>';

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kaupimas] = time()+1;


       echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo '<div class="meniuc">Sėkmingai! +<b> 100 '.$energyi.' energijos</b> Išviso sukaupęs: <b>'.$apie[$energija].'</b> '.$energyi.' energijos!</div>';

mysql_query("UPDATE zaidejai SET kenergija6=kenergija6+'100', sms_litai=sms_litai-'1' WHERE nick='$nick'");
echo'<div class="meniuc"><a href="?id=kaupiu6&kodas='.$kodas.'">Kaupti toliau</a></div>';
}
}
}
///Cell
if($id == "sayanpower"){
if($apie[$energija] < 500000){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;

		top(' Sayan power savybė');
if($apie['veikejas'] == "Selas"){
$tech='sayanpower';
$tech2='Sayanpower';
$energija='kenergija7';
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div><div class="meniuc">';if($apie[$energija] < 50000){echo'Norint gauti <b>'.$tech2.'</b> techniką pirma turite sukaupti jos energiją! <br><b>1 Kaupimas</b>  - 4 '.$eurui.'<br>';}echo'<b>'.$tech2.'</b> suteikia <b>3x</b> '.$pinigaii.'  ir <b>3.5x</b> kerta daugiau bosams!</div>';
if($apie[$energija] < 50000){
echo'<div class="meniuc">
<b>Kaupti <b>'.$tech2.'</b> energiją</b><br>
 <a href="?id=kaupiu7&kodas='.$kodas.'">Kaupti '.$energyi.' energiją</a>('.$apie[$energija].'/<b>50000</b>) -4 '.$eurui.'
</div>';}
if($apie[$energija] < 50000){
echo'<div class="meniuc"><a href="?id=sukaupimas7"><b>Sukaupti '.$energyi.' energija iškarto</a></b>[<b>4000</b>'.$eurui.']</div>
';}
  }
}
if($apie[kenergija7] > 49999){
echo'<div class="meniuc">Įvaldei šią techniką!</div>';}
if($apie['Sayanpower']==''){echo'
<div class="meniuc"><a href="?id=7">Pasiimk savo techniką!</a></div>
';}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
}

	if($id == "sukaupimas7"){
    online('Sayan Power savybe');
  top('Sayan Power savybe');
$tech='sayanpower';
$tech2='Sayanpower';
$energija='kenergija7';

if($apie['veikejas'] == "Selas"){

if($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($apie[sms_litai] < 3999){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
else{
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo'<div class="meniuc">Sėkmingai! Sukaupėte visą <b>'.$tech2.'</b> '.$energyi.' energiją už <b>4000</b>'.$eurui.'!</div>';
mysql_query("UPDATE zaidejai SET kenergija7=kenergija7+'50000', sms_litai=sms_litai-'4000', Sayanpower='+' WHERE nick='$nick'");

}

}
}


if($id == "kaupiu7"){
    online('Sayan Power savybe');
  top('Sayan Power savybe');
$tech='sayanpower';
$tech2='Sayanpower';
$energija='kenergija7';

if($apie['veikejas'] == "Selas"){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
      	if($kodas != $_SESSION[kd]){
	echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
elseif($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
elseif($apie[sms_litai] < 4){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
	elseif($_SESSION[kaupimas] > time()){
	echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Per greit kaupi! Kaupti galėsi už <b> '.laikas($_SESSION[kaupimas]-time(), 1).'</b>
</div>';
 echo'<div class="meniuc"><a href="?id=kaupiu7&kodas='.$kodas.'">Kaupti toliau</a></div>';

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kaupimas] = time()+1;


       echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo '<div class="meniuc">Sėkmingai! +<b> 100 '.$energyi.' energijos</b> Išviso sukaupęs: <b>'.$apie[$energija].'</b> '.$energyi.' energijos!</div>';

mysql_query("UPDATE zaidejai SET kenergija7=kenergija7+'100', sms_litai=sms_litai-'4' WHERE nick='$nick'");
echo'<div class="meniuc"><a href="?id=kaupiu7&kodas='.$kodas.'">Kaupti toliau</a></div>';
}
}
}
///pikolas
if($id == "makosen"){
if($apie[$energija] < 500000){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;

		top(' Makosen savybė');
if($apie['veikejas'] == "Pikolas"){
$tech='makosen';
$tech2='Makosen';
$energija='kenergija8';
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div><div class="meniuc">';if($apie[$energija] < 50000){echo'Norint gauti <b>'.$tech2.'</b> techniką pirma turite sukaupti jos energiją! <br><b>1 Kaupimas</b>  - 5 '.$eurui.'<br>';}echo'<b>'.$tech2.'</b> suteikia <b>4x</b>  daugiau kerta <b>bosams</b> ir  <b>5x</b> '.$expi.' daugiau iš kovų zonos!</div>';
if($apie[$energija] < 50000){
echo'<div class="meniuc">
<b>Kaupti <b>'.$tech2.'</b> energiją</b><br>
 <a href="?id=kaupiu8&kodas='.$kodas.'">Kaupti '.$energyi.' energiją</a>('.$apie[$energija].'/<b>50000</b>) -5 '.$eurui.'
</div>';}
if($apie[$energija] < 50000){
echo'<div class="meniuc"><a href="?id=sukaupimas8"><b>Sukaupti '.$energyi.' energija iškarto</a></b>[<b>5000</b>'.$eurui.']</div>
';}
  }
}
if($apie[kenergija8] > 49999){
echo'<div class="meniuc">Įvaldei šią techniką!</div>';}
if($apie['Makosen']==''){echo'
<div class="meniuc"><a href="?id=8">Pasiimk savo techniką!</a></div>
';}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
}

	if($id == "sukaupimas8"){
    online('Makosen savybe');
  top('Makosen savybe');
$tech='makosen';
$tech2='Makosen';
$energija='kenergija8';

if($apie['veikejas'] == "Pikolas"){

if($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($apie[sms_litai] < 4999){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
else{
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo'<div class="meniuc">Sėkmingai! Sukaupėte visą <b>'.$tech2.'</b> '.$energyi.' energiją už <b>5000</b>'.$eurui.'!</div>';
mysql_query("UPDATE zaidejai SET kenergija8=kenergija8+'50000', sms_litai=sms_litai-'5000', Makosen='+' WHERE nick='$nick'");

}

}
}


if($id == "kaupiu8"){
    online('Makosen savybe');
  top('Makosen savybe');
$tech='makosen';
$tech2='Makosen';
$energija='kenergija8';

if($apie['veikejas'] == "Pikolas"){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
      	if($kodas != $_SESSION[kd]){
	echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
elseif($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
elseif($apie[sms_litai] < 5){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
	elseif($_SESSION[kaupimas] > time()){
	echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Per greit kaupi! Kaupti galėsi už <b> '.laikas($_SESSION[kaupimas]-time(), 1).'</b>
</div>';
 echo'<div class="meniuc"><a href="?id=kaupiu8&kodas='.$kodas.'">Kaupti toliau</a></div>';

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kaupimas] = time()+1;


       echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo '<div class="meniuc">Sėkmingai! +<b> 100 '.$energyi.' energijos</b> Išviso sukaupęs: <b>'.$apie[$energija].'</b> '.$energyi.' energijos!</div>';

mysql_query("UPDATE zaidejai SET kenergija8=kenergija8+'100', sms_litai=sms_litai-'5' WHERE nick='$nick'");
echo'<div class="meniuc"><a href="?id=kaupiu8&kodas='.$kodas.'">Kaupti toliau</a></div>';
}
}
}

///Krilinas
if($id == "kamehameha2"){
if($apie[$energija] < 500000){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;

		top(' Kamehameha2 savybė');
if($apie['veikejas'] == "Krilinas"){
$tech='kamehameha2';
$tech2='Kamehameha2';
$energija='kenergija9';
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div><div class="meniuc">';if($apie[$energija] < 50000){echo'Norint gauti <b>'.$tech2.'</b> techniką pirma turite sukaupti jos energiją! <br><b>1 Kaupimas</b>  - 2 '.$eurui.'<br>';}echo'<b>'.$tech2.'</b> suteikia kerta <b>3x</b> daugiau <b>bosams</b> !</div>';
if($apie[$energija] < 50000){
echo'<div class="meniuc">
<b>Kaupti <b>'.$tech2.'</b> energiją</b><br>
 <a href="?id=kaupiu9&kodas='.$kodas.'">Kaupti '.$energyi.' energiją</a>('.$apie[$energija].'/<b>50000</b>) -2 '.$eurui.'
</div>';}
if($apie[$energija] < 50000){
echo'<div class="meniuc"><a href="?id=sukaupimas9"><b>Sukaupti '.$energyi.' energija iškarto</a></b>[<b>2000</b>'.$eurui.']</div>
';}
  }
}
if($apie[kenergija9] > 49999){
echo'<div class="meniuc">Įvaldei šią techniką!</div>';}
if($apie['Kamehameha2']==''){echo'
<div class="meniuc"><a href="?id=9">Pasiimk savo techniką!</a></div>
';}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
}

	if($id == "sukaupimas9"){
    online('Kamehameha2 savybe');
  top('Kamehameha2 savybe');
$tech='kamehameha2';
$tech2='Kamehameha2';
$energija='kenergija9';

if($apie['veikejas'] == "Krilinas"){

if($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($apie[sms_litai] < 1999){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
else{
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo'<div class="meniuc">Sėkmingai! Sukaupėte visą <b>'.$tech2.'</b> '.$energyi.' energiją už <b>2000</b>'.$eurui.'!</div>';
mysql_query("UPDATE zaidejai SET kenergija9=kenergija9+'50000', sms_litai=sms_litai-'2000', Kamehameha2='+' WHERE nick='$nick'");

}

}
}


if($id == "kaupiu9"){
    online('Kamehameha2 savybe');
  top('Kamehameha2 savybe');
$tech='kamehameha2';
$tech2='Kamehameha2';
$energija='kenergija9';

if($apie['veikejas'] == "Krilinas"){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
      	if($kodas != $_SESSION[kd]){
	echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
elseif($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
elseif($apie[sms_litai] < 2){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
	elseif($_SESSION[kaupimas] > time()){
	echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Per greit kaupi! Kaupti galėsi už <b> '.laikas($_SESSION[kaupimas]-time(), 1).'</b>
</div>';
 echo'<div class="meniuc"><a href="?id=kaupiu9&kodas='.$kodas.'">Kaupti toliau</a></div>';

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kaupimas] = time()+1;


       echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo '<div class="meniuc">Sėkmingai! +<b> 100 '.$energyi.' energijos</b> Išviso sukaupęs: <b>'.$apie[$energija].'</b> '.$energyi.' energijos!</div>';

mysql_query("UPDATE zaidejai SET kenergija9=kenergija9+'100', sms_litai=sms_litai-'2' WHERE nick='$nick'");
echo'<div class="meniuc"><a href="?id=kaupiu9&kodas='.$kodas.'">Kaupti toliau</a></div>';
}
}
}

///Ginis
if($id == "changed"){
if($apie[$energija] < 500000){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;

		top(' Changed savybė');
if($apie['veikejas'] == "Kapitonas ginis"){
$tech='changed';
$tech2='Changed';
$energija='kenergija10';
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div><div class="meniuc">';if($apie[$energija] < 50000){echo'Norint gauti <b>'.$tech2.'</b> techniką pirma turite sukaupti jos energiją! <br><b>1 Kaupimas</b>  - 3 '.$eurui.'<br>';}echo'<b>'.$tech2.'</b> suteikia <b>2.5x</b> '.$pinigaii.' ,  <b>2.5x</b> '.$expi.'  iš kovų zonos!</div>';
if($apie[$energija] < 50000){
echo'<div class="meniuc">
<b>Kaupti <b>'.$tech2.'</b> energiją</b><br>
 <a href="?id=kaupiu10&kodas='.$kodas.'">Kaupti '.$energyi.' energiją</a>('.$apie[$energija].'/<b>50000</b>) -3 '.$eurui.'
</div>';}
if($apie[$energija] < 50000){
echo'<div class="meniuc"><a href="?id=sukaupimas10"><b>Sukaupti '.$energyi.' energija iškarto</a></b>[<b>3000</b>'.$eurui.']</div>
';}
  }
}
if($apie[kenergija10] > 49999){
echo'<div class="meniuc">Įvaldei šią techniką!</div>';}
if($apie['Changed']==''){echo'
<div class="meniuc"><a href="?id=10">Pasiimk savo techniką!</a></div>
';}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
}

	if($id == "sukaupimas10"){
    online('Changed savybe');
  top('Changed savybe');
$tech='changed';
$tech2='Changed';
$energija='kenergija10';

if($apie['veikejas'] == "Kapitonas ginis"){

if($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($apie[sms_litai] < 2999){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
else{
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo'<div class="meniuc">Sėkmingai! Sukaupėte visą <b>'.$tech2.'</b> '.$energyi.' energiją už <b>3000</b>'.$eurui.'!</div>';
mysql_query("UPDATE zaidejai SET kenergija10=kenergija10+'50000', sms_litai=sms_litai-'3000', Changed='+' WHERE nick='$nick'");

}

}
}


if($id == "kaupiu10"){
    online('Changed savybe');
  top('Changed savybe');
$tech='changed';
$tech2='Changed';
$energija='kenergija10';

if($apie['veikejas'] == "Kapitonas ginis"){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
      	if($kodas != $_SESSION[kd]){
	echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
elseif($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
elseif($apie[sms_litai] < 3){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
	elseif($_SESSION[kaupimas] > time()){
	echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Per greit kaupi! Kaupti galėsi už <b> '.laikas($_SESSION[kaupimas]-time(), 1).'</b>
</div>';
 echo'<div class="meniuc"><a href="?id=kaupiu10&kodas='.$kodas.'">Kaupti toliau</a></div>';

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kaupimas] = time()+1;


       echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo '<div class="meniuc">Sėkmingai! +<b> 100 '.$energyi.' energijos</b> Išviso sukaupęs: <b>'.$apie[$energija].'</b> '.$energyi.' energijos!</div>';

mysql_query("UPDATE zaidejai SET kenergija10=kenergija10+'100', sms_litai=sms_litai-'3' WHERE nick='$nick'");
echo'<div class="meniuc"><a href="?id=kaupiu10&kodas='.$kodas.'">Kaupti toliau</a></div>';
}
}
}


///Raditas
if($id == "begone"){
if($apie[$energija] < 500000){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;

		top('Begone savybė');
if($apie['veikejas'] == "Raditas"){
$tech='begone';
$tech2='Begone';
$energija='kenergija11';
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div><div class="meniuc">';if($apie[$energija] < 50000){echo'Norint gauti <b>'.$tech2.'</b> techniką pirma turite sukaupti jos energiją! <br><b>1 Kaupimas</b>  - 3 '.$eurui.'<br>';}echo'<b>'.$tech2.'</b> suteikia kerta <b>3x</b> daugiau <b>bosams</b> !</div>';
if($apie[$energija] < 50000){
echo'<div class="meniuc">
<b>Kaupti <b>'.$tech2.'</b> energiją</b><br>
 <a href="?id=kaupiu11&kodas='.$kodas.'">Kaupti '.$energyi.' energiją</a>('.$apie[$energija].'/<b>50000</b>) -3 '.$eurui.'
</div>';}
if($apie[$energija] < 50000){
echo'<div class="meniuc"><a href="?id=sukaupimas11"><b>Sukaupti '.$energyi.' energija iškarto</a></b>[<b>3000</b>'.$eurui.']</div>
';}
  }
}
if($apie[kenergija11] > 49999){
echo'<div class="meniuc">Įvaldei šią techniką!</div>';}
if($apie['Begone']==''){echo'
<div class="meniuc"><a href="?id=11">Pasiimk savo techniką!</a></div>
';}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
}

	if($id == "sukaupimas11"){
    online('Begone savybe');
  top('Begone savybe');
$tech='begone';
$tech2='Begone';
$energija='kenergija11';

if($apie['veikejas'] == "Raditas"){

if($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($apie[sms_litai] < 2999){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
else{
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo'<div class="meniuc">Sėkmingai! Sukaupėte visą <b>'.$tech2.'</b> '.$energyi.' energiją už <b>3000</b>'.$eurui.'!</div>';
mysql_query("UPDATE zaidejai SET kenergija11=kenergija11+'50000', sms_litai=sms_litai-'3000', Begone='+' WHERE nick='$nick'");

}

}
}


if($id == "kaupiu11"){
    online('Begone savybe');
  top('Begone savybe');
$tech='begone';
$tech2='Begone';
$energija='kenergija11';

if($apie['veikejas'] == "Raditas"){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
      	if($kodas != $_SESSION[kd]){
	echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
elseif($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
elseif($apie[sms_litai] < 3){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
	elseif($_SESSION[kaupimas] > time()){
	echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Per greit kaupi! Kaupti galėsi už <b> '.laikas($_SESSION[kaupimas]-time(), 1).'</b>
</div>';
 echo'<div class="meniuc"><a href="?id=kaupiu11&kodas='.$kodas.'">Kaupti toliau</a></div>';

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kaupimas] = time()+1;


       echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo '<div class="meniuc">Sėkmingai! +<b> 100 '.$energyi.' energijos</b> Išviso sukaupęs: <b>'.$apie[$energija].'</b> '.$energyi.' energijos!</div>';

mysql_query("UPDATE zaidejai SET kenergija11=kenergija11+'100', sms_litai=sms_litai-'3' WHERE nick='$nick'");
echo'<div class="meniuc"><a href="?id=kaupiu11&kodas='.$kodas.'">Kaupti toliau</a></div>';
}
}
}


///Neilas
if($id == "regeneration"){
if($apie[$energija] < 500000){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;

		top('Regeneration savybė');
if($apie['veikejas'] == "Neilas"){
$tech='regeneration';
$tech2='Regeneration';
$energija='kenergija12';
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div><div class="meniuc">';if($apie[$energija] < 50000){echo'Norint gauti <b>'.$tech2.'</b> techniką pirma turite sukaupti jos energiją! <br><b>1 Kaupimas</b>  - 6 '.$eurui.'<br>';}echo'<b>'.$tech2.'</b> suteikia kerta <b>2x</b> daugiau <b>bosams</b> ! <br>Duoda <b>4x</b>'.$pinigaii.' , '.$expi.' iš kovų zonos!</div>';
if($apie[$energija] < 50000){
echo'<div class="meniuc">
<b>Kaupti <b>'.$tech2.'</b> energiją</b><br>
 <a href="?id=kaupiu12&kodas='.$kodas.'">Kaupti '.$energyi.' energiją</a>('.$apie[$energija].'/<b>50000</b>) -6 '.$eurui.'
</div>';}
if($apie[$energija] < 50000){
echo'<div class="meniuc"><a href="?id=sukaupimas12"><b>Sukaupti '.$energyi.' energija iškarto</a></b>[<b>6000</b>'.$eurui.']</div>
';}
  }
}
if($apie[kenergija12] > 49999){
echo'<div class="meniuc">Įvaldei šią techniką!</div>';}
if($apie['Regeneration']==''){echo'
<div class="meniuc"><a href="?id=12">Pasiimk savo techniką!</a></div>
';}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
}

	if($id == "sukaupimas12"){
    online('Regeneration savybe');
  top('Regeneration savybe');
$tech='regeneration';
$tech2='Regeneration';
$energija='kenergija12';

if($apie['veikejas'] == "Neilas"){

if($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($apie[sms_litai] < 5999){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
else{
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo'<div class="meniuc">Sėkmingai! Sukaupėte visą <b>'.$tech2.'</b> '.$energyi.' energiją už <b>6000</b>'.$eurui.'!</div>';
mysql_query("UPDATE zaidejai SET kenergija12=kenergija12+'50000', sms_litai=sms_litai-'6000', Regeneration='+' WHERE nick='$nick'");

}

}
}


if($id == "kaupiu12"){
    online('Regeneration savybe');
  top('Regeneration savybe');
$tech='regeneration';
$tech2='Regeneration';
$energija='kenergija12';

if($apie['veikejas'] == "Neilas"){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
      	if($kodas != $_SESSION[kd]){
	echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
elseif($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
elseif($apie[sms_litai] < 6){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
	elseif($_SESSION[kaupimas] > time()){
	echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Per greit kaupi! Kaupti galėsi už <b> '.laikas($_SESSION[kaupimas]-time(), 1).'</b>
</div>';
 echo'<div class="meniuc"><a href="?id=kaupiu12&kodas='.$kodas.'">Kaupti toliau</a></div>';

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kaupimas] = time()+1;


       echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo '<div class="meniuc">Sėkmingai! +<b> 100 '.$energyi.' energijos</b> Išviso sukaupęs: <b>'.$apie[$energija].'</b> '.$energyi.' energijos!</div>';

mysql_query("UPDATE zaidejai SET kenergija12=kenergija12+'100', sms_litai=sms_litai-'6' WHERE nick='$nick'");
echo'<div class="meniuc"><a href="?id=kaupiu12&kodas='.$kodas.'">Kaupti toliau</a></div>';
}
}
}


///Nappas
if($id == "armbreak"){
if($apie[$energija] < 500000){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;

		top('ArmBreak savybė');
if($apie['veikejas'] == "Nappas"){
$tech='armbreak';
$tech2='ArmBreak';
$energija='kenergija13';
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div><div class="meniuc">';if($apie[$energija] < 50000){echo'Norint gauti <b>'.$tech2.'</b> techniką pirma turite sukaupti jos energiją! <br><b>1 Kaupimas</b>  - 5 '.$eurui.'<br>';}echo'<b>'.$tech2.'</b> suteikia kerta <b>3x</b> daugiau <b>bosams</b> ! <br>Duoda <b>3x</b>'.$pinigaii.' , '.$expi.' iš kovų zonos!</div>';
if($apie[$energija] < 50000){
echo'<div class="meniuc">
<b>Kaupti <b>'.$tech2.'</b> energiją</b><br>
 <a href="?id=kaupiu13&kodas='.$kodas.'">Kaupti '.$energyi.' energiją</a>('.$apie[$energija].'/<b>50000</b>) -5 '.$eurui.'
</div>';}
if($apie[$energija] < 50000){
echo'<div class="meniuc"><a href="?id=sukaupimas13"><b>Sukaupti '.$energyi.' energija iškarto</a></b>[<b>5000</b>'.$eurui.']</div>
';}
  }
}
if($apie[kenergija13] > 49999){
echo'<div class="meniuc">Įvaldei šią techniką!</div>';}
if($apie['ArmBreak']==''){echo'
<div class="meniuc"><a href="?id=13">Pasiimk savo techniką!</a></div>
';}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
}

	if($id == "sukaupimas13"){
    online('ArmBreak savybe');
  top('ArmBreak savybe');
$tech='armbreak';
$tech2='ArmBreak';
$energija='kenergija13';

if($apie['veikejas'] == "Nappas"){

if($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($apie[sms_litai] < 4999){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
else{
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo'<div class="meniuc">Sėkmingai! Sukaupėte visą <b>'.$tech2.'</b> '.$energyi.' energiją už <b>5000</b>'.$eurui.'!</div>';
mysql_query("UPDATE zaidejai SET kenergija13=kenergija13+'50000', sms_litai=sms_litai-'5000', ArmBreak='+' WHERE nick='$nick'");

}

}
}


if($id == "kaupiu13"){
 online('ArmBreak savybe');
  top('ArmBreak savybe');
$tech='armbreak';
$tech2='ArmBreak';
$energija='kenergija13';

if($apie['veikejas'] == "Nappas"){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
      	if($kodas != $_SESSION[kd]){
	echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
elseif($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
elseif($apie[sms_litai] < 5){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
	elseif($_SESSION[kaupimas] > time()){
	echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Per greit kaupi! Kaupti galėsi už <b> '.laikas($_SESSION[kaupimas]-time(), 1).'</b>
</div>';
 echo'<div class="meniuc"><a href="?id=kaupiu13&kodas='.$kodas.'">Kaupti toliau</a></div>';

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kaupimas] = time()+1;


       echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo '<div class="meniuc">Sėkmingai! +<b> 100 '.$energyi.' energijos</b> Išviso sukaupęs: <b>'.$apie[$energija].'</b> '.$energyi.' energijos!</div>';

mysql_query("UPDATE zaidejai SET kenergija13=kenergija13+'100', sms_litai=sms_litai-'5' WHERE nick='$nick'");
echo'<div class="meniuc"><a href="?id=kaupiu13&kodas='.$kodas.'">Kaupti toliau</a></div>';
}
}
}


///Dendis
if($id == "healing"){
if($apie[$energija] < 500000){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;

		top('Healing savybė');
if($apie['veikejas'] == "Dendis"){
$tech='healing';
$tech2='Healing';
$energija='kenergija14';
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div><div class="meniuc">';if($apie[$energija] < 50000){echo'Norint gauti <b>'.$tech2.'</b> techniką pirma turite sukaupti jos energiją! <br><b>1 Kaupimas</b>  - 7 '.$eurui.'<br>';}echo'<b>'.$tech2.'</b> suteikia kerta <b>5x</b> daugiau <b>bosams</b> ! </div>';
if($apie[$energija] < 50000){
echo'<div class="meniuc">
<b>Kaupti <b>'.$tech2.'</b> energiją</b><br>
 <a href="?id=kaupiu14&kodas='.$kodas.'">Kaupti '.$energyi.' energiją</a>('.$apie[$energija].'/<b>50000</b>) -7 '.$eurui.'
</div>';}
if($apie[$energija] < 50000){
echo'<div class="meniuc"><a href="?id=sukaupimas14"><b>Sukaupti '.$energyi.' energija iškarto</a></b>[<b>7000</b>'.$eurui.']</div>
';}
  }
}
if($apie[kenergija14] > 49999){
echo'<div class="meniuc">Įvaldei šią techniką!</div>';}
if($apie['Healing']==''){echo'
<div class="meniuc"><a href="?id=14">Pasiimk savo techniką!</a></div>
';}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
}

	if($id == "sukaupimas14"){
    online('Healing savybe');
  top('Healing savybe');
$tech='healing';
$tech2='Healing';
$energija='kenergija14';

if($apie['veikejas'] == "Dendis"){

if($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($apie[sms_litai] < 6999){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
else{
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo'<div class="meniuc">Sėkmingai! Sukaupėte visą <b>'.$tech2.'</b> '.$energyi.' energiją už <b>7000</b>'.$eurui.'!</div>';
mysql_query("UPDATE zaidejai SET kenergija14=kenergija14+'50000', sms_litai=sms_litai-'7000', Healing='+' WHERE nick='$nick'");

}

}
}


if($id == "kaupiu14"){
 online('Healing savybe');
  top('Healing savybe');
$tech='healing';
$tech2='Healing';
$energija='kenergija14';

if($apie['veikejas'] == "Dendis"){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
      	if($kodas != $_SESSION[kd]){
	echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
elseif($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
elseif($apie[sms_litai] < 7){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
	elseif($_SESSION[kaupimas] > time()){
	echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Per greit kaupi! Kaupti galėsi už <b> '.laikas($_SESSION[kaupimas]-time(), 1).'</b>
</div>';
 echo'<div class="meniuc"><a href="?id=kaupiu14&kodas='.$kodas.'">Kaupti toliau</a></div>';

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kaupimas] = time()+1;


       echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo '<div class="meniuc">Sėkmingai! +<b> 100 '.$energyi.' energijos</b> Išviso sukaupęs: <b>'.$apie[$energija].'</b> '.$energyi.' energijos!</div>';

mysql_query("UPDATE zaidejai SET kenergija14=kenergija14+'100', sms_litai=sms_litai-'7' WHERE nick='$nick'");
echo'<div class="meniuc"><a href="?id=kaupiu14&kodas='.$kodas.'">Kaupti toliau</a></div>';
}
}
}

///bulma
if($id == "angry"){
if($apie[$energija] < 500000){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;

		top('AngryBulma savybė');
if($apie['veikejas'] == "Bulma"){
$tech='angry';
$tech2='AngryBulma';
$energija='kenergija15';
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div><div class="meniuc">';if($apie[$energija] < 50000){echo'Norint gauti <b>'.$tech2.'</b> techniką pirma turite sukaupti jos energiją! <br><b>1 Kaupimas</b>  - 6 '.$eurui.'<br>';}echo'<b>'.$tech2.'</b> suteikia kerta <b>4x</b> daugiau <b>bosams</b> ! <br>Duoda <b>2x</b>'.$pinigaii.' , '.$expi.' iš kovų zonos!</div>';
if($apie[$energija] < 50000){
echo'<div class="meniuc">
<b>Kaupti <b>'.$tech2.'</b> energiją</b><br>
 <a href="?id=kaupiu15&kodas='.$kodas.'">Kaupti '.$energyi.' energiją</a>('.$apie[$energija].'/<b>50000</b>) -6 '.$eurui.'
</div>';}
if($apie[$energija] < 50000){
echo'<div class="meniuc"><a href="?id=sukaupimas15"><b>Sukaupti '.$energyi.' energija iškarto</a></b>[<b>6000</b>'.$eurui.']</div>
';}
  }
}
if($apie[kenergija15] > 49999){
echo'<div class="meniuc">Įvaldei šią techniką!</div>';}
if($apie['AngryBulma']==''){echo'
<div class="meniuc"><a href="?id=15">Pasiimk savo techniką!</a></div>
';}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
}

	if($id == "sukaupimas15"){
    online('AngryBulma savybe');
  top('AngryBulma savybe');
$tech='angry';
$tech2='AngryBulma';
$energija='kenergija15';

if($apie['veikejas'] == "Bulma"){

if($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
if($apie[sms_litai] < 5999){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
else{
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo'<div class="meniuc">Sėkmingai! Sukaupėte visą <b>'.$tech2.'</b> '.$energyi.' energiją už <b>6000</b>'.$eurui.'!</div>';
mysql_query("UPDATE zaidejai SET kenergija15=kenergija15+'50000', sms_litai=sms_litai-'6000', AngryBulma='+' WHERE nick='$nick'");

}

}
}


if($id == "kaupiu15"){
 online('AngryBulma savybe');
  top('AngryBulma savybe');
$tech='angry';
$tech2='AngryBulma';
$energija='kenergija15';

if($apie['veikejas'] == "Bulma"){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
      	if($kodas != $_SESSION[kd]){
	echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
elseif($apie[$tech2]> '+'){
    echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo "<div class='meniuc'>Tu jau turi<b>'.$tech2.'</b> technika!</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
elseif($apie[sms_litai] < 6){
echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");
echo'</div>';
	navigacija($g_n);
}
	elseif($_SESSION[kaupimas] > time()){
	echo '<div class="meniuc"><img src=img/unisavybes/deathlaser.jpg border="1" width="180" height="90"></div>';
	echo'<div class="meniuc">Per greit kaupi! Kaupti galėsi už <b> '.laikas($_SESSION[kaupimas]-time(), 1).'</b>
</div>';
 echo'<div class="meniuc"><a href="?id=kaupiu15&kodas='.$kodas.'">Kaupti toliau</a></div>';

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php?id=","Atgal","Unikali savybe");

	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kaupimas] = time()+1;


       echo '<div class="meniuc"><img src=img/unisavybes/'.$tech.'.jpg border="1" width="180" height="90"></div>';
 echo '<div class="meniuc">Sėkmingai! +<b> 100 '.$energyi.' energijos</b> Išviso sukaupęs: <b>'.$apie[$energija].'</b> '.$energyi.' energijos!</div>';

mysql_query("UPDATE zaidejai SET kenergija15=kenergija15+'100', sms_litai=sms_litai-'6' WHERE nick='$nick'");
echo'<div class="meniuc"><a href="?id=kaupiu15&kodas='.$kodas.'">Kaupti toliau</a></div>';
}
}
}

elseif($id == "vegito"){
	top('Vegito');
    online('Skill');
    if($apie['veikejas'] == "Gokas" or $apie['veikejas'] == "Vedzitas" ){
    echo '
 
    <div class="meniuc"><img src="img/veikejai/Vegito-0.png" border="0"></div>
 <div class="meniuc">
Norint tapti reikia:<br>
50 <img src="img/bicons/lvl.gif" ><br>
1250 <font color="red"><b>Pasiekimų taškų</b></font>
, 500 <img src="img/bicons/credit.png">, 200 <img src="img/bicons/euro.png">
<br>

</div>
    <div class="line"></div><div class="meniuc">
  <b></b> <a href="?id=vegito2">Tapti</a>
    </div>
    
  
   
    ';}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skilai","Vegito");
	navigacija($g_n);
}

elseif($id == "vegito2"){
	 online('Vedzeko tapimas');
	 top('Vedzekas');
if($apie['veikejas'] == "Gokas" or $apie['veikejas'] == "Vedzitas" ){

	if($apie['lygis'] < 50){
				
			 echo '<div class="meniuc">Galima tapti tik nuo 50 <img src="img/bicons/lvl.gif"></div>';
		
	}
elseif($inv['unikalus'] < 1250 || $apie['kred'] < 500 || $apie['sms_litai'] < 200) {
		echo'<div class="meniuc">
  Neužtenka <b><font color="red">Pasiekimų taškų </b></font> arba <img src="img/bicons/credit.png">, <img src="img/bicons/euro.png">!!</div>';}

		
			
else{
				
	echo'	<div class="meniuc">	<img src="img/veikejai/Vegito-0.png"><br> Nusipirkai už 1250  <b><font color="red">Pasiekimų taškų</b></font> , 500 <img src="img/bicons/credit.png">,  200 <img src="img/bicons/euro.png">
 </div> ';		

mysql_query("UPDATE inv SET  unikalus=unikalus-'1250' WHERE nick='$nick'");
	mysql_query("UPDATE zaidejai SET veikejas='Vegito', trans='0', sms_litai=sms_litai-'200', kred=kred-'500' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET billsb='$timxx' WHERE nick='$nick' ");
}

if($apie['vedzekasb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Vedzekas", "Veikejo pirkimas");
	navigacija($g_n);
	}
}
elseif($id == "vegito1112"){
    online('Skill');
	top('Vegito');
	if($apie['lygis'] < 60){
				
			 echo '<div class="meniuc">Tik nuo 60 <img src="img/bicons/lvl.gif"></div>';
		
	}else{
 
    if($apie['vegito'] == "+"){
        echo '<div class="meniuc">Tau jau buvai tapes vegito.</div>';
		 atgal('Atgal-?id=vegito&Į Pradžią-pagrindinis.php?id=');
	}else{
	if($apie['veikejas'] == "Gokas" or $apie['veikejas'] == "Vedzitas" ){
		
    
        echo '<div class="meniuc">Atlikta, tapai vegito.</div>';
		
        
   
	    mysql_query("UPDATE zaidejai SET  veikejas='Vegito', trans='0', vegito='+' WHERE nick='$nick'");
		  mysql_query("DELETE FROM transformacijos WHERE nick='$nick'");
    }
 
	}}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skilai","Vegito");
	navigacija($g_n);

}


	elseif($id == "gotenks"){
    online('Skill');
      top('Gotenks');
    echo '
   
    <div class="meniuc"><img src="img/veikejai/Gotenks-0.png" border="0"></div>
    <div class="line"></div><div class="meniu">
  '.$ico.' <a href="?id=gotenks2">Tapti</a>
    </div>
    
  
   
    ';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skilai","Gotenks");
	navigacija($g_n);
}
elseif($id == "gotenks2"){
    online('Skill');
   top('Gotenks');
    if($apie['gotenks'] == "+"){
        echo '<div class="meniuc">Tau jau buvai tapes gotenks.</div>';
	}else{
	if($apie['veikejas'] == "Tranksas" or $apie['veikejas'] == "Gotenas" ){
		
    
        echo '<div class="meniuc">Atlikta, tapai Gotens.</div>';
		
        
   
	    mysql_query("UPDATE zaidejai SET  veikejas='Gotenks', trans='0', gotenks='+' WHERE nick='$nick'");
	      mysql_query("DELETE FROM transformacijos WHERE nick='$nick'");
    }}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skilai","Gotenks");
	navigacija($g_n);
	}
if($id == "trans"){
    online('Transformacijos');
   top('Trasnsformacijos');
   $rrr =	mysql_fetch_assoc(mysql_query("SELECT * FROM veikejai WHERE name = '$apie[veikejas]'"));
    if($ka == "OK"){
        if($apie['trans'] >= $rrr[trans]){
            echo '<div class="meniuc">Jūs daugiau nebegalitę transformuotis!</div>';
        }
        elseif($jega < $trans_jegos){
            echo '<div class="meniuc">Transformacijai neužtenka Jėgos!</div>';
        }
		elseif($apie['lygis']< $reike_level){
            echo '<div class="meniuc">Tavo lygis per mažas!</div>';
        }
        elseif($gynyba < $trans_gynybos){
            echo '<div class="meniuc">Transformacijai neužtenka Gynybos!</div>';
        } else {
            echo '<div class="meniuc">Transformaciją pavyko! Gavai <b>'.sk($kiek_kg).'%</b> Kovinės galios.</div>';
            $tr = $apie['trans']+1;
            
           
            mysql_query("UPDATE zaidejai SET jega='$trans_jegos2', gynyba='$trans_gynybos2', trans=trans+'1' WHERE nick='$nick' ") or die(mysql_meniuc());
            
        }
    } else {
    	
    echo '<div class="meniuc"><img src="img/veikejai/'.$apie['veikejas'].'-'.$apie[trans].'.png" alt="*"></div>';
    echo '<div class="meniuc">Transformuoti gali visi veikėjai, kiek trasformacijų turėsite priklauso nuo jūsų pasirinkto veikėjo. Trasformuotis galima tik tada kai pasieksit tam tikra kieki jėgos ir gynybos.</div>';
    echo '<div class="meniu">
     Jūs galite transformuotis: <b>'.$rrr[trans].'</b> kartus.<br/>
     Jūsų transformacijos lygis: <b>'.$apie['trans'].'</b>.
    </div>';

    if($apie['trans'] >= $rrr[trans]){
        echo '<div class="meniuc">Jūsų veikėjas daugiau nebegali transformuotis !!!</div>';
    } else {
        echo '<div class="meniu"> <b>Transformacijai reikia</b>:</div>
        <div class="meniu">
        '.sk($trans_jegos).'</b> Jėgos.<br/>
        '.sk($trans_gynybos).'</b> Gynybos.</br>
        '.sk($reike_level).'</b> Lygio.';
        echo '</div>
        <div class="meniu">
        [&#8226;] <a href="skill.php?id=trans&ka=OK">Transformuotis</a>
        </div>';
    }
    }
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Transformacijos");
	navigacija($g_n);
}
 //////////////////////////////////////
if($id == 'mokytis'){
	top('Dvigubas susijungimo šokis');
	  echo '<div class="meniuc"><img src="img/imgg/sokis.png" alt="*"></div>';
	
	 
       echo '<div class="meniuc">Susijungimo šokis - išmoke šią technika jūs galėsite susijungti su kitu žaidėju ir jūs gausite <b>5%</b> jo <img src="img/bicons/kovines.png"> 
        Norint išmokti <b>Susijungimo šokį</b> jūs turite buti didesnio <img src="img/bicons/lvl.gif"> nei 30, atnešti 500 Fusion Fail.<br/>
        Dvigubas susijungimo šokis tai techniką kurią išmoke galėsite kovose uždirbti <img src="img/bicons/exp.png"> žaidėjui kuris su susijunges su jumis, bei taip pat jis uždirbs <img src="img/bicons/exp.png"> jums, norint išmokt dvigubą susijungimo šokį reikia 500 Fusion Fail!
    </div>
    <div class="meniu"> '.$ico.' <a href="?id=ismokti">Išmokti susijungimo šokį</a><br/>
    '.$ico.' <a href="?id=ismokti2">Išmokti Dvigubą susijungimo šokį</a><br/>
       </div>';
	   
	    if(!empty($fsn['double_fussion_dance'])){
      
       echo '<div class="meniuc">Išmokę dvigubą susijungimo šokį galite išmokyti žaidėją susijungimo šokio tai jums kainuos 500 Fusion fail!</div><div class="meniuc">
       <form action="?id=mokau_kita" method="POST">
        Ką mokysite: <br/> <input name="mokau" type="text"><br/>
       <input type="submit" name="submit" value="Mokyti"/></form>
       </form></div>';
    }else{
    	
    }
    
    
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);
}
if($id == 'mokau_kita'){
	
top("Susijungimo šokis");
$mokau = post($_POST[mokau]);
$k_zai = mysql_fetch_assoc(mysql_query("SELECT * FROM susijungimas WHERE nick='$mokau'"));
if(mysql_num_rows(mysql_query("SELECT * FROM zaidejai WHERE nick='$mokau'"))== false){
	
	 echo '<div class="meniuc">Tokio žaidėjo nėra</div>';
	
}
elseif($k_zai['fusion_dance'] == '+'){
		       echo '<div class="meniuc">'.statusas($mokau).' jau moka <b>Susijungimo šokį</b>.</div>';
	     }
	   elseif($fsn['double_fussion_dance'] != '+'){
		       echo '<div class="meniuc">Tu nemoki susijungimo šokio todėl negali mokyti</div>';
	     }
       
		 elseif($inv['Fusionfail'] < 500 ){
   echo '<div class="meniuc">Neturi pakankamai Fusion fail!</div>'; 	
   
       } else {
          echo '<div class="meniuc">Sėkmingai išmokiai '.statusas($mokau).' <b>Susijungimo šokio</b>.</div>';
          mysql_query("UPDATE susijungimas SET fusion_dance='+' WHERE nick='$mokau' ");
          mysql_query("UPDATE inv SET Fusionfail=Fusionfail-'500' WHERE nick='$nick' ")or die(mysql_error());
		  mysql_query("UPDATE zaidejai set potara = '+' WHERE nick = '$mokau'");
		  $txt =''.statusas($nick).' išmokė tave susijungimo šokio.';	
		    mysql_query("INSERT INTO pm SET what='SUPPORT', txt='$txt', gavejas='$mokau', time='".time()."', nauj='NEW' ") or die(mysql_error());
         
       }
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);}
	   
	
	
	

  if($id == "fusion"){
   	top('Susijungimo šokis');
    online('Susijungimo šokis');
    $fsn = mysql_fetch_assoc(mysql_query("SELECT * FROM susijungimas WHERE nick='$nick' "));
    $fsn2 = mysql_fetch_assoc(mysql_query("SELECT * FROM susijungimas WHERE nick='$fsn[kitas_zaidejas]' "));
    if($fsn['ar_susijungias'] == "") $su_kuo = 'Niekuo'; else $su_kuo = $fsn['kitas_zaidejas'];
    
    echo '<div class="meniuc"><img src="img/imgg/sokis.png" alt="*"></div>';
   
  
  
   
     
  
   
  
   
    if(empty($fsn['fusion_dance'])){
       echo '<div class="meniuc">Susijungimo šokis - išmokę šią technika jūs galėsite susijungti su kitu žaidėju ir jūs gausite <b>5%</b> jo <img src="img/bicons/kovines.png"> 
      
   
       </div>';
    
    } else {
       if(!empty($fsn['ar_kvieti'])){
          echo '<div class="meniu">
           <font color="red">Tu siūlai susijungti žaidėjui</font> <b>'.statusas($fsn['ka_kvieti']).'</b> <font color="red">!!!</font> <a href="?id=atsaukti">[X]</a>
          </div>';
       }
       echo '<div class="meniu">
     '.$ico2.'    Tu esi susijungęs su: <b>'.statusas($su_kuo).'</b> <a href="?id=delete&ID='.$su_kuo.'">[X]</a><br/>
      '.$ico2.'  Jums žaidėjas prideda: '.sk($prideda_jegos).' <img src="img/bicons/attack.png"> ir '.sk($prideda_gynybos).' <img src="img/bicons/shield.png"><br/>
        '.$ico2.' Jūs uždirbote <img src="img/bicons/exp.png">: <b>'.sk($fsn['uzdirbo_exp']).'</b><br/>
      '.$ico2.' Tau uždirbo <img src="img/bicons/exp.png">: <b>'.sk($fsn2['uzdirbo_exp']).'</b><br/>
       </div>';
       if(!empty($fsn['ar_susijungias'])){ } else {
      
       echo '<div class="meniuc">
       <form action="?id=kviesti" method="POST">
        Ką kviesite: <br/> <input name="kvieciu" type="text"><br/>
       <input type="submit" name="submit" value="Kviesti"/></form>
       </form></div>';
    }
    }
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);
    }
    
      if($id == "delete"){
      top('Susijungimo šokis');
       if($ID != $fsn['kitas_zaidejas']){
          echo '<div class="meniuc">Tu nesi susijunges su <b>'.statusas($ID).'</b>!</div>';
       } else {
          echo '<div class="meniuc">Sėkmingai atsijungei nuo <b>'.statusas($ID).'</b>!</div>';
          mysql_query("UPDATE susijungimas SET ar_susijungias='', kitas_zaidejas='', uzdirbo_exp='0' WHERE nick='$nick'");
          mysql_query("UPDATE susijungimas SET ar_susijungias='', kitas_zaidejas='', uzdirbo_exp='0' WHERE nick='$ID'");
       }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);
}
    
     if($id == "ismokti"){
     	top("Susijungimo šokis");
       	if($fsn['fusion_dance'] == '+'){
		       echo '<div class="meniuc">Tu jau moki <b>Susijungimo šokį</b>.</div>';
	     }
	     elseif($lygis < 30){
	        echo '<div class="meniuc">Tavo <img src="img/bicons/lvl.gif"> per žemas! Reikia 30 <img src="img/bicons/lvl.gif">.</div>';
       }
       
		 elseif($inv['Fusionfail'] < 499 ){
   echo '<div class="meniuc">Neturi pakankamai Fusion Tail</div>'; 	
   
       } else {
          echo '<div class="meniuc">Sėkmingai išmokai <b>Susijungimo šokį</b>.</div>';
          mysql_query("UPDATE susijungimas SET fusion_dance='+' WHERE nick='$nick' ");
          mysql_query("UPDATE inv SET Fusionfail=Fusionfail-'500' WHERE nick='$nick' ")or die(mysql_error());
		  mysql_query("UPDATE zaidejai set potara = '+' WHERE nick = '$nick'");
         
       }
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);}
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
     if($id == "ismokti2"){
     	top("Susijungimo šokis");
       	if($fsn['dauble_fussion_dance'] == '+'){
		       echo '<div class="meniuc">Tu jau moki <b>Susijungimo šokį</b>.</div>';
	     }
		elseif($fsn['fusion_dance'] == ''){
		       echo '<div class="meniuc">Pirma turi mokėti paprastą susujungimo šokį</div>';
	     }
	     elseif($lygis < 30){
	        echo '<div class="meniuc">Tavo <img src="img/bicons/lvl.gif"> per žemas! </div>';
       }
       
		 elseif($inv['Fusionfail'] < 500 ){
   echo '<div class="meniuc">Neturi pakankamai Fusion fail!</div>'; 	
   
       } else {
          echo '<div class="meniuc">Sėkmingai išmokai <b>Susijungimo šokį</b>.</div>';
          mysql_query("UPDATE susijungimas SET double_fussion_dance='+' WHERE nick='$nick' ");
          mysql_query("UPDATE inv SET Fusionfail=Fusionfail-'500' WHERE nick='$nick' ")or die(mysql_error());
		  mysql_query("UPDATE zaidejai set potara = '+' WHERE nick = '$nick'");
         
       }
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);}
	   
	
		
		 if($id == "atsaukti"){
		 	top('Susijungimo šokis');
       if(empty($fsn['ar_kvieti'])){
          echo '<div class="meniuc">Tu nieko nekvieti susijungti!</div>';
       } else {
          $fsnn = mysql_fetch_assoc(mysql_query("SELECT * FROM susijungimas WHERE nick='$nick' "));
          echo '<div class="meniuc">Sėkmingai atšauktas kvietmas!</div>';
          mysql_query("UPDATE susijungimas SET kas_kviecia='' WHERE nick='$fsnn[ka_kvieti]' ");
          mysql_query("UPDATE susijungimas SET ar_kvieti='', ka_kvieti='' WHERE nick='$nick' ");
       } $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);}
		 
		    if($id == "priimti"){
		    	top("Susijungimo šokis");
       if(empty($fsn['kas_kviecia'])){
          echo '<div class="meniuc">Taves niekas nekviečia susijungti!</div>';
       }
       elseif(mysql_num_rows(mysql_query("SELECT * FROM zaidejai WHERE nick='$ID'")) == 0){
          echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';
       } else {
          echo '<div class="meniuc">Sėkmingai priėmei <b>'.statusas($ID).'</b> pasiūlymą susijungti!</div>';
          mysql_query("UPDATE susijungimas SET ar_susijungias='+', kitas_zaidejas='$nick', ar_kvieti='', ka_kvieti='' WHERE nick='$ID'");
          mysql_query("UPDATE susijungimas SET ar_susijungias='+', kitas_zaidejas='$ID', kas_kviecia='' WHERE nick='$nick'");
       }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);
       }
  if($ka == "priimti"){
       if(empty($fsn['kas_kviecia'])){
          echo '<div class="meniuc">Taves niekas nekviečia susijungti!</div>';
       }
       elseif(mysql_num_rows(mysql_query("SELECT * FROM zaidejai WHERE nick='$ID'")) == 0){
          echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';
       } else {
          echo '<div class="meniuc">Sėkmingai priėmei <b>'.statusas($ID).'</b> pasiūlymą susijungti!</div>';
          mysql_query("UPDATE susijungimas SET ar_susijungias='+', kitas_zaidejas='$nick', ar_kvieti='', ka_kvieti='' WHERE nick='$ID'");
          mysql_query("UPDATE susijungimas SET ar_susijungias='+', kitas_zaidejas='$ID', kas_kviecia='' WHERE nick='$nick'");
       }}
  
   if($id == "atmesti"){
   	top("Susijungimo šokis");
       if(empty($fsn['kas_kviecia'])){
          echo '<div class="meniuc">Tu nesi susijungęs!</div>';
       }
       elseif(mysql_num_rows(mysql_query("SELECT * FROM zaidejai WHERE nick='$ID'")) == 0){
          echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';
       } else {
          echo '<div class="meniuc">Sėkmingai atmetei <b>'.statusas($ID).'</b> pasiūlymą susijungti!</div>';
          mysql_query("UPDATE susijungimas SET ar_kvieti='', ka_kvieti='' WHERE nick='$ID'");
	        mysql_query("UPDATE susijungimas SET kas_kviecia='' WHERE nick='$nick'");
       } $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);}
   if($id == 'kviesti'){
   	top("Susijungimo šokis");
	 if(isset($_POST['submit'])){
          $kak = post($_POST['kvieciu']);
          $fsnn = mysql_fetch_assoc(mysql_query("SELECT * FROM susijungimas WHERE nick='$kak' "));
          if(empty($kak)){
             echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
          }
          
		    elseif(apsas($kak) == apsas($apie['nick'])){
             echo '<div class="meniuc">Saves kviesti negalimą!</div>';
          }
		  
          elseif(empty($fsn['fusion_dance'])){
             echo '<div class="meniuc">Tu nemoki <b>Susijungimo šokio</b>!</div>';
          }
          elseif(empty($fsnn['fusion_dance'])){
             echo '<div class="meniuc">Žaidėjas <b>'.statusas($kak).'</b> nemoka <b>Susijungimo šokio</b>!</div>';
          }
          elseif(!empty($fsn['ar_susijungias'])){
             echo '<div class="meniuc">Tu jau susijungęs su <b>'.statusas($su_kuo).'</b>!</div>';
          }
          elseif(!empty($fsnn['ar_susijungias'])){
             echo '<div class="meniuc">Žaidėjas <b>'.statusas($kak).'</b> jau susijungęs!</div>';
          }
          elseif(!empty($fsn['kas_kviecia'])){
             echo '<div class="meniuc">Tave jau kažkas kviečia susijungti!</div>';
          }
          elseif(!empty($fsnn['kas_kviecia'])){
             echo '<div class="meniuc">Žaidėją <b>'.statusas($kak).'</b> jau kviečia susijungti!</div>';
          }
          elseif(mysql_num_rows(mysql_query("SELECT * FROM zaidejai WHERE nick='$kak'")) == 0){
             echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';
          }
          elseif(!empty($fsn['ar_kvieti'])){
             echo '<div class="meniuc">Tu jau kažką kvieti susijungti!</div>';
          } else {
             echo '<div class="meniuc">Kvietimas susijungti sėkmingai išsiūstas žaidėjui <b>'.statusas($kak).'</b>!</div>';
             mysql_query("UPDATE susijungimas SET ar_kvieti='taip', ka_kvieti='$kak' WHERE nick='$nick' ");
             mysql_query("UPDATE susijungimas SET kas_kviecia='$nick' WHERE nick='$kak' ");
          }

       }
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);
   }
    //////////////////////
 if($id =='improve'){
 			top('Technikos tobulinimas');
 			echo'<div class="meniuc"><img src="img/imgg/ttechnikos.png"></div><div class="line"></div>
 			<div class="meniuc">Jūs galite ištobulinti savo nuosavą techniką, kas kartą pakėlus jai  <img src="img/bicons/lvl.gif"> jūs įgausite tam tikrą kiekį <img src="img/bicons/attack.png">, <img src="img/bicons/shield.png"></div>
 			<div class="line"></div>';
 		if(($user[tech]) != 9){echo'	<div class="meniu">

<img src=img/imgg/ttechnikos.png border="1" width="16" height="16">Dabartinis technikos lygis: <b>'.$user['tech'].'</b><br>
<img src=img/imgg/ttechnikos.png border="1" width="16" height="16"> Lygio pakėlimui reikia:  <b> '.$kgg.'</b> <img src="img/bicons/kovines.png">, <b>'.$lvlss.'</b> <img src="img/bicons/lvl.gif"><br><img src=img/imgg/ttechnikos.png border="1" width="16" height="16">Pakėlimo kaina:  '.$eur.'</b> <img src="img/bicons/euro.png"></div> ';
if($kg > $kgg){   
echo'
 			<div class="meniuc"> <img src="img/bicons/lvl.gif"><a href="?id=improve2">Kelti</a></div>';}}
		else 
	echo'	<div class="meniuc"> Pakėliai didžiausią <img src="img/bicons/lvl.gif"> !</div>';
 		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skilai","Technikos tobulinimas");
	navigacija($g_n);
 	
 }

if($id == 'improve2'){
		top('Technikos tobulinimas');
	if($apie['lygis'] < $lvlss || $apie['sms_litai'] < $eur ){
	echo'	<div class="meniuc">Per mažas <img src="img/bicons/lvl.gif"> arba neužtenka  <img src="img/bicons/euro.png"></div>';
	}
	elseif($kg < $kgg){
				
		echo'	<div class="meniuc">Per mažai turi <img src="img/bicons/kovines.png"></div>';	
		
	}
	elseif($user[tech] > 9 or $user[tech] < 1){
		
		echo'	<div class="meniuc">Tokios technikos nėra</div>';	
	}
	elseif($user[tech] == 9){
		
		echo'	<div class="meniuc">Pakėliai didžiausią galimą lygį.</div>';	
	}
	
	else{
		
		mysql_query("UPDATE zaidejai SET jega='$jeggg', gynyba = '$gynnn', sms_litai=sms_litai-'$eur' WHERE nick='$nick'")or die(mysql_error());
		mysql_query("UPDATE user SET tech=tech+'1' WHERE nick='$nick'")or die(mysql_error());
		echo'	<div class="meniuc"><img src="img/bicons/lvl.gif"> sėkmingai pakeltas!<br> Už pakeltą <img src="img/bicons/lvl.gif"> gavai: <b>'.$jeg2.' </b> <img src="img/bicons/attack.png"> ir <b>'.$gyn2.' <img src="img/bicons/shield.png">!</div>';	
	}
	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skilai","Technikos tobulinimas");
	navigacija($g_n);
	
}


if($id == 'energ444y'){
			top('Energijos anplitude');
		echo'<div class="meniuc">Energija jums leidžia kovoti, nebeturint energijos jūs tiesiog negalite pulti.<br/>
Su kiekviena kova jus prarandate -1 energijos, energija atsinaujina kas 30 minučių.</div>
<div class="meniuc"> Energija susikaups už '.laikas($apie[energy_time]-time(),1).'</div>
<div class="meniu">
'.$ico2.' Jūsų eneriją: <b>'.sk($apie[energy]).'</b><br/>
'.$ico2.' Jūsų enerijos amplitude: <b>'.sk($apie[energy_max]).'</b>
</div>
<div class="meniu">
'.$ico.' <a href="?id=sukaupti">Sukaupti energija</a></br>
'.$ico.' <a href="?id=didinti">Didinti anplitude</a></div>
	';
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Energijos anplitude");
	navigacija($g_n);
	
}

if($id == suka444upti){
		top('Energijos sukaupimas');		
			
		if($inv[Pupos] < 1){
			
			echo'<div class="meniuc">Tu neturi stebuklingų pupų</div>';
		}	
		elseif($apie[energy] == $apie[energy_max]){
			
			
			echo'<div class="meniuc">Tu jau turi maksimalę energiją</div>';
			
		}
		else{
			
			
			mysql_query("UPDATE inv SET Pupos=Pupos-'1' WHERE nick='$nick'");
			mysql_query("UPDATE zaidejai SET energy='$apie[energy_max]' WHERE nick='$nick'");	
			echo'<div class="meniuc">Energija sukaupta</div>';
			
				}
			
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Energijos anplitude");
	navigacija($g_n);
}


		if($id=='didi444nti'){
			top('Energijos anplitudės didinimas');
			echo'<div class="meniuc">1 Kreditas - 10 energijos lygio</div>';
        echo '<div class="titlec">
        <form action="?id=didinti2" method="post"/>
        Kiek kelsite:<br /><input type="text" name="lvl"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","skill.php?id=energy","Energijos anplitude", "Energijos anplitudės didinimas");
	navigacija($g_n);
	 
}
if($id =='didinti2'){
		top('Energijos anplitudės didinimas');
 
    
   
   
        if(isset($_POST['submit'])){
            $lvl= isset($_POST['lvl']) ? preg_replace("/[^0-9]/","",$_POST['lvl']) : null;
         
			$kiekis = $lvl * 10;
		
            
            if(empty($lvl)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($lvl > $apie['kred']){
	              echo '<div class="meniuc">Neturi pakankamai kreditų!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Pasididinai energijos antplitude</div>';
	           
	            mysql_query("UPDATE zaidejai SET energy_max=energy_max +'$kiekis', kred=kred-'$lvl' WHERE nick='$nick' ");
			  }
		
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","skill.php?id=energy","Energijos anplitude", "Energijos anplitudės didinimas");
	navigacija($g_n);
		}}
		
		
if($id == 'persikelimas'){
top('Persikėlimo Manevro informacija');

echo "<div class='meniuc'><img src='img/imgg/persikelimas.png'></div>
<div class='meniuc'>Išmokus šį manevrą tu galėsi persikelti į kai kurias planetas, kurios bus sukurtos vėliau! Tai labai paprasta ir greita.
</div>";
if(empty($apie['persikelimo_manevras'])){
echo "<div class='meniuc'>Norint išmokti šį manevrą tau reikės: pasiekti <b>50</b> <img src='img/bicons/lvl.gif' />, atnešti <b>100</b> <img src='img/bicons/euro.png'>, <b>1,000</b>  <img src='img/bicons/credit.png'>  ir būti padarius daugiau negu <b>10,000</b> veiksmų.
</div>";

echo "<div class='meniu'>".$ico." <a href='?id=mokytis_p_m'>Mokytis persikėlimo manevrą</a></div>";
}
else{
echo "<div class='meniu'>".$ico." Šį manevrą tu jau moki.</div>";
}

$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Persikėlimo manevras");
navigacija($g_n);
}

if($id == 'mokytis_p_m'){
top('Persikėlimo manevro mokymasis');
echo "<div class='meniuc'><img src='img/imgg/persikelimas.png'></div>";
if($apie['lygis'] < 50){
echo "<div class='meniuc'>Tu neesi pasiekęs 50  <img src='img/bicons/lvl.gif'>!</div>";
}
elseif($apie['sms_litai'] < 100){
echo "<div class='meniuc'>Tu neturi 100  <img src='img/bicons/euro.png'>!</div>";
}
elseif($apie['kred'] < 1000){
echo "<div class='meniuc'>Tu neturi 1,000  <img src='img/bicons/credit.png'>!</div>";
}
elseif($apie['veiksmai'] < 10000){
echo "<div class='meniuc'> Tu neesi pasiekęs 10,000 padarytų veiksmų!</div>";
}
elseif(!empty($apie['persikelimo_manevras'])){
echo "<div class='meniuc'>Šį manevrą tu jau moki!</div>";
}
else{
echo "<div class='meniuc'>Sėkmingai išmokai persikėlimo manevrą</div>";
mysql_query("UPDATE zaidejai SET sms_litai=sms_litai-30, kred=kred-1000, persikelimo_manevras='+' WHERE nick='$nick'");
}

$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","?id=persikelimas", "Persikėlimo manevras", "Persikėlimo manevro mokymasis");
navigacija($g_n);
}

 foot();
?>
