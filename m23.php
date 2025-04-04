<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
echo'
<div class="up">
<img src="img/baneriai/botasm.png" /></div>';


topbar();

switch($id){

case '':

online("M2 Planetoje");
top("M2 Planeta");

echo "<div class='meniuc'><img src='img/m2.png'></div>";

if($apie['persikelimo_manevras'] == '+'){
echo "<div class='meniuc'>Ką veiksi šioje planetoje? :)</div>";
echo "<div class='meniu'>
".$ico." <a href='?id=kovos'>Kovų zona</a><br/>
".$ico." <a href='?id=misija'>M2 Misija</a><br/>
".$ico." <a href='?id=gilas'>Gilas</a><br/>
".$ico." Bus matyt dar 
</div>"; 
}
else{
echo "<div class='meniu'>
".$ico." Norint patekti į šią planetą jums reikia išmokti staigaus persikėlimo manevrą.
</div>";
}

$g_n[] = array("pagrindinis.php?id=","Pagrindinis","M2 Planeta");
navigacija($g_n);

break;


case 'kovos':

$KD = rand(9999,99999);
$_SESSION['kovv'] = $KD;

echo "<div class='meniuc'><img src='img/m2.png'></div>";
echo "<div class='meniuc'>Tavo kovinė galia yra <b>".sk($kg)."</b> (".skaicius($kg).")</div>";
echo "<div class='meniu'>";

if(empty($apie['persikelimo_manevras'])){
echo "".$ico." Norint patekti į šią planetą jums reikia išmokti staigaus persikėlimo manevrą.";
}
else{
$kiek=mysql_query("SELECT * FROM m2_mobai");


if(mysql_num_rows($kiek) == 0){
echo " ".$ico." Šiuo metu mobų čia nėra.";
}
else{
 
while($mobai = mysql_fetch_array($kiek)){

if($kg > $mobai['kg']){
$busena = "[<font color='green'>Už šį priešą tu stipresnis!</font>]";
}
else{
$busena = '';
}
echo "".$ico." <a href='?id=pulti&ka=".$mobai['id']."&kd=".$KD."'>".$mobai['name']."</a> (".sk($mobai['kg']).") ".$busena."<br/>";
}
}
}

echo "</div>";

$g_n[] = array("pagrindinis.php?id=","Pagrindinis","?id=", "M2 Planeta", "Kovų zona");
navigacija($g_n);

break;


}
foot();

?>
