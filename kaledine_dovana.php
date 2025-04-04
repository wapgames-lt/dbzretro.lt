<?php
ob_start();

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
topbar();

if(date("m-d") == "12-25" AND $apie['kaledine_dovana'] != '+' AND $apie['lygis'] > 0){

switch($id){

case '':
online("Kalėdinė Dovana");
top("Kalėdinė Dovana");

echo "<div class='meniu'><center><img src='img/dbz.jpg'><br/>
<div class='lin'></div>
Su Šventomis kalėdomis, ".$nick."!
<br/> Ta proga pasiimk dovanėlę, kurią siunčia <b>sajanas.us.lt</b>
Administracija. :) </center>";

echo "<div class='lin'></div>";
echo "".$ico." <a href='?id=pasiimti'>Pasiimti kalėdinę dovaną</a>";
echo "</div>";

$g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php", "Miestas", "Kalėdinė dovana");
navigacija($g_n);


break;

case 'pasiimti':

online("Kalėdinės dovanos imimas");
top("Kalėdinės dovanos ėmimas");

echo "<div class='meniu'><center><img src='img/dbz.jpg'></center><br/>

".$ico." Pasiimiai kalėdinę dovaną ir gavai: <b>800</b> Litų, <b>100trln</b> Pinigų, <b>800</b> auksinių ir po <b>5%</b> jėgos bei ginybos!

</div>";

$jega=($apie['jega']*5/100);
$ginyba=($apie['gynyba']/5/100);
$litu=800;
$pinigu=1000000000000000;
$auksiniu=800;

/*
Kintamuosius padariau tam, kad jei kas netiks pakeistum. :D
*/

mysql_query("UPDATE zaidejai SET kaledine_dovana='+', jega=jega + $jega, gynyba=gynyba+$ginyba, sms_litai=sms_litai+$litu, auksiniai=auksiniai+$auksiniu WHERE nick='$nick'");

$g_n[] = array("pagrindinis.php?id=","Pagrindinis", "miestas.php", "Miestas", "Dovanos pasiimimas");
navigacija($g_n);

}}
else{

echo "<div class='meniuc'>Šiandien ne gruodžio 25-ktoji arba tu jau pasiimiai dovaną. :)</div>";

$g_n[] = array("pagrindinis.php?id=","Pagrindinis", "miestas.php", "Miestas", "Klaida");
navigacija($g_n);

}

foot();

?>
