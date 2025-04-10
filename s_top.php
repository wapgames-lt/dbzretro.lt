<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();

switch($id){

case '':

online("Savaitės TOP");
top("Savaitės veiksmų TOP");


echo "<div class='meniuc'>
Šią savaitę visi varžosi dėl   <b><font color ='red'>".sk($nust['savdtop_priz'])."</b></font> <img src='img/bicons/euro.png'/> ir    <b><font color ='red'>".sk($nust['savdtop_priz2'])." ".$vipt."</b></font><br>

<div class='lin'></div>
Norint laimėti pinigus jums tiesiog reikia padaryti kuo daugiau veiksmų, kovojant prieš įvairius mobus.
<div class='lin'></div>
Iki šios savaitės TOP'o pabaigos liko <b>".laikas($nust['savaites_topas_liko']-time(),1)."</b>
</div>";

echo "<div class='up'>Šios savaitės TOP3:</div>";
echo "<div class='meniu'>";
$query = mysqli_query($conn,"SELECT * FROM s_top ORDER BY (0+ vksm) DESC LIMIT 0,3");
while($row = mysqli_fetch_assoc($query)){
$vt++;
echo " <b>".$vt."</b>. <a href='pagrindinis.php?id=apie&ka=".$row['nick']."'>  ".$row['nick']."</a> -  ".sk($row['vksm'])." <img src='img/bicons/attack1.png'/><br/>";
}

echo "</div>";

$g_n[] = array("pagrindinis.php?id=","Pagrindinis","Savaitės kovų topas");
navigacija($g_n);

break;

}

foot();

?>
