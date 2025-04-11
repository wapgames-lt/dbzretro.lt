<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();
if($apie[istorija] == '0'){$img =' img'; $vieta = 'inv'; $reikia = 'Majin scroll'; $kiek ='10' ;}
if($apie[istorija] == '1'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Lygio'; $kiek ='20' ;}
if($apie[istorija] == '2'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Majin scroll'; $kiek ='250' ;}
if($apie[istorija] == '3'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='10000' ;}
if($apie[istorija] == '4'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Eurų'; $kiek ='100' ;}
if($apie[istorija] == '5'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Power Stone'; $kiek ='400' ;}
if($apie[istorija] == '6'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Μikroskemų'; $kiek ='600' ;}
if($apie[istorija] == '7'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Drakono rutulių'; $kiek ='30' ;}
if($apie[istorija] == '8'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Angelo sparnų'; $kiek ='800' ;}
if($apie[istorija] == '9'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Fusion Fail'; $kiek ='1000' ;}
if($apie[istorija] == '10'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Naikinimo galios'; $kiek ='1100' ;}
if($apie[istorija] == '11'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Lygio'; $kiek ='30' ;}
if($apie[istorija] == '12'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Majin scroll'; $kiek ='500' ;}
if($apie[istorija] == '13'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='50000' ;}
if($apie[istorija] == '14'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Eurų'; $kiek ='200' ;}
if($apie[istorija] == '15'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Power Stone'; $kiek ='600' ;}
if($apie[istorija] == '16'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Μikroskemų'; $kiek ='800' ;}
if($apie[istorija] == '17'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Drakono rutulių'; $kiek ='50' ;}
if($apie[istorija] == '18'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Angelo sparnų'; $kiek ='1000' ;}
if($apie[istorija] == '19'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Fusion Fail'; $kiek ='1300' ;}
if($apie[istorija] == '20'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Naikinimo galios'; $kiek ='1400' ;}
if($apie[istorija] == '21'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='10000' ;}
if($apie[istorija] == '22'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='20000' ;}
if($apie[istorija] == '23'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='50000' ;}
if($apie[istorija] == '24'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='100000' ;}
if($apie[istorija] == '25'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='200000' ;}
if($apie[istorija] == '26'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='300000' ;}
if($apie[istorija] == '27'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='400000' ;}
if($apie[istorija] == '28'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='500000' ;}
if($apie[istorija] == '29'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='700000' ;}
if($apie[istorija] == '30'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='1000000' ;}
if($apie[istorija] == '31'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='1000' ;}
if($apie[istorija] == '32'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='2000' ;}
if($apie[istorija] == '33'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='3000' ;}
if($apie[istorija] == '34'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='5000' ;}
if($apie[istorija] == '35'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='7000' ;}
if($apie[istorija] == '36'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='10000' ;}
if($apie[istorija] == '37'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='15000' ;}
if($apie[istorija] == '38'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='20000' ;}
if($apie[istorija] == '39'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='25000' ;}
if($apie[istorija] == '40'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='30000' ;}
if($apie[istorija] == '41'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='10000000' ;}
if($apie[istorija] == '42'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='20000000' ;}
if($apie[istorija] == '43'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='50000000' ;}
if($apie[istorija] == '44'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='100000000' ;}
if($apie[istorija] == '45'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='200000000' ;}
if($apie[istorija] == '46'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='300000000' ;}
if($apie[istorija] == '47'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='500000000' ;}
if($apie[istorija] == '48'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='1000000000' ;}
if($apie[istorija] == '49'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='2000000000' ;}
if($apie[istorija] == '50'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='5000000000' ;}
if($apie[istorija] == '51'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Lygio'; $kiek ='100' ;}
if($apie[istorija] == '52'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Majin scroll'; $kiek ='10000' ;}
if($apie[istorija] == '53'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='1000000' ;}
if($apie[istorija] == '54'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Eurų'; $kiek ='10000' ;}
if($apie[istorija] == '55'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Power Stone'; $kiek ='15000' ;}
if($apie[istorija] == '56'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Μikroskemų'; $kiek ='16000' ;}
if($apie[istorija] == '57'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Drakono rutulių'; $kiek ='500' ;}
if($apie[istorija] == '58'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Angelo sparnų'; $kiek ='10000' ;}
if($apie[istorija] == '59'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Fusion Fail'; $kiek ='20000' ;}
if($apie[istorija] == '60'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Naikinimo galios'; $kiek ='15000' ;}
if($apie[istorija] == '61'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Lygio'; $kiek ='120' ;}
if($apie[istorija] == '62'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Majin scroll'; $kiek ='15000' ;}
if($apie[istorija] == '63'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='2000000' ;}
if($apie[istorija] == '64'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Eurų'; $kiek ='20000' ;}
if($apie[istorija] == '65'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Power Stone'; $kiek ='20000' ;}
if($apie[istorija] == '66'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Μikroskemų'; $kiek ='25000' ;}
if($apie[istorija] == '67'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Drakono rutulių'; $kiek ='1000' ;}
if($apie[istorija] == '68'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Angelo sparnų'; $kiek ='15000' ;}
if($apie[istorija] == '69'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Fusion Fail'; $kiek ='30000' ;}
if($apie[istorija] == '70'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Naikinimo galios'; $kiek ='20000' ;}
if($apie[istorija] == '71'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='500000' ;}
if($apie[istorija] == '72'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='1000000' ;}
if($apie[istorija] == '73'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='2000000' ;}
if($apie[istorija] == '74'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='3000000' ;}
if($apie[istorija] == '75'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='4000000' ;}
if($apie[istorija] == '76'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='5000000' ;}
if($apie[istorija] == '77'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='7000000' ;}
if($apie[istorija] == '78'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='10000000' ;}
if($apie[istorija] == '79'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='12000000' ;}
if($apie[istorija] == '80'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='15000000' ;}
if($apie[istorija] == '81'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='50000' ;}
if($apie[istorija] == '82'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='100000' ;}
if($apie[istorija] == '83'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='200000' ;}
if($apie[istorija] == '84'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='350000' ;}
if($apie[istorija] == '85'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='500000' ;}
if($apie[istorija] == '86'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='1000000' ;}
if($apie[istorija] == '87'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='1500000' ;}
if($apie[istorija] == '88'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='2000000' ;}
if($apie[istorija] == '89'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='3000000' ;}
if($apie[istorija] == '90'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'Kreditų'; $kiek ='5000000' ;}
if($apie[istorija] == '91'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='100000000000000000000' ;}
if($apie[istorija] == '92'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='200000000000000000000' ;}
if($apie[istorija] == '93'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='300000000000000000000' ;}
if($apie[istorija] == '94'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='400000000000000000000' ;}
if($apie[istorija] == '95'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='500000000000000000000' ;}
if($apie[istorija] == '96'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='1000000000000000000000' ;}
if($apie[istorija] == '97'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='2000000000000000000000' ;}
if($apie[istorija] == '98'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='3000000000000000000000' ;}
if($apie[istorija] == '99'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='5000000000000000000000' ;}
if($apie[istorija] == '100'){$img ='nmisijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='10000000000000000000000' ;}
if($id == ''){
top('Žaidimo Istorija');
	if($user[istorijos_time]-time()> 0){
			top('ŽAIDIMO ISTORIJA');
			echo'<div class="meniuc">
<img src="img/bicons/like.png" />
Tu esi perėjas visas sagas!
<img src="img/bicons/like.png" />
</div>';
		
	
	}
	elseif($apie[istorija] != '101'){ 


echo '<div class="meniuc">
<b>Žaidimo istorija</b> - tai istorija kurioje reikia vygdyti misijas, atlikus tam tikrą kiekį misijų, gausite atlygį!:)</div>
<div class="meniuc">  <a href="?id=cognac"><font color="red"><small>Istorijos siekimo tikslas</font> </small></a>
</div>
<div class="meniuc">
<img src="img/imgg/'.$img.'.png"></div>
<div class="meniuc">
Reikia <b><font color="red">'.skaicius($kiek).' </font>'.$reikia.'</b> 




<br>
</div>
<div class="meniuc"> Dabar vygdai  '.$apie[istorija].' iš 100</div>
';



$ID = rand(100000,999999);
$_SESSION[no_refresh] = $ID;
echo'<div class="meniuc">  <a href="?id=istorija&ID='.$ID.'"><small><input type="submit" Value="Vygdyti istorijos misiją"/> </small></a>
</div>';}

else{
header('Location:istorija.php?id=cognac');
	echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo'<div class="meniuc">Tu perėjai visą žaidimo istoriją!</div>';
		
}


$g_n[] = array('pagrindinis.php?id=', 'Pagrindinis',"istorija.php","Žaidimo istorija", "Žaidimo Istorija vygdymas");
navigacija($g_n);

}
elseif($id == 'istorija'){
	
top('Žaidimo Istorija');	
	online('Žaidimo istorija');
////// istorija
if($apie[istorija] == 1){
if($apie['lygis'] < 19 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b> Neužtenka reikiamo lygio!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 2){
if($inv[Majinsroll] < 249 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Majin Scroll!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Majinsroll=Majinsroll-'250' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 3){
if($apie[auksiniai] < 9999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'10000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 4){
if($apie[sms_litai] < 99 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek eurų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', sms_litai=sms_litai-'100' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 5){
if($inv[Powerstone] < 399 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Power Stone!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Powerstone=Powerstone-'400' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 6){
if($inv[Microshem] < 599 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Mikroskemu!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Microshem=Microshem-'600' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 7){
if($inv[dball] < 29 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek drakono rutulių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  dball=dball-'30' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 8){
if($inv[angelwing] < 799 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Angelo sparnų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  angelwing=angelwing-'800' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 9){
if($inv[Fusionfail] < 999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Fusion Fail!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Fusionfail=Fusionfail-'1000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 10){
if($inv[naikinti] < 1099 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Naikinimo Galios!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b><br><small>Įvygdei 10 žaidimo istorijos misijų!</small><br>Už tai gauni <b>50,000 LVL</b> kasimo!</div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' , kasimolvl=kasimolvl+'50000' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  naikinti=naikinti-'1000' WHERE nick = '$nick'");
}
}	
if($apie[istorija] == 11){
if($apie['lygis'] < 29 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b> Neužtenka reikiamo lygio!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 12){
if($inv[Majinsroll] < 499 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Majin Scroll!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Majinsroll=Majinsroll-'500' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 13){
if($apie[auksiniai] < 49999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'50000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 14){
if($apie[sms_litai] < 199 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek eurų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', sms_litai=sms_litai-'200' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 15){
if($inv[Powerstone] < 599 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Power Stone!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Powerstone=Powerstone-'600' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 16){
if($inv[Microshem] < 799 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Mikroskemu!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Microshem=Microshem-'800' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 17){
if($inv[dball] < 49 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek drakono rutulių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  dball=dball-'50' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 18){
if($inv[angelwing] < 999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Angelo sparnų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  angelwing=angelwing-'1000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 19){
if($inv[Fusionfail] < 1299 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Fusion Fail!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Fusionfail=Fusionfail-'1300' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 20){
if($inv[naikinti] < 1399 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Naikinimo Galios!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b><br><small>Įvygdei 20 žaidimo istorijos misijų!</small><br>Už tai gauni <b>100,000 LVL</b> kasimo ir 30,000 '.$vipt.' </div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' , kasimolvl=kasimolvl+'100000', vipticket=vipticket+'30000' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  naikinti=naikinti-'1400' WHERE nick = '$nick'");
}
}	
if($apie[istorija] == 21){
if($apie[auksiniai] < 9999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'10000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 22){
if($apie[auksiniai] < 19999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'20000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 23){
if($apie[auksiniai] < 49999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'50000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 24){
if($apie[auksiniai] < 99999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'100000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 25){
if($apie[auksiniai] < 199999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'200000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 26){
if($apie[auksiniai] < 299999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'300000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 27){
if($apie[auksiniai] < 399999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'400000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 28){
if($apie[auksiniai] < 499999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'500000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 29){
if($apie[auksiniai] < 699999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'700000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 30){
if($apie[auksiniai] < 999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b><br><small>Įvygdei 30 žaidimo istorijos misijų!</small><br>Už tai gauni <b> 100,000 '.$vipt.' </div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'1000000', vipticket=vipticket+'100000' WHERE nick = '$nick'");
}
}	
if($apie[istorija] == 31){
if($apie[kred] < 999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'1000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 32){
if($apie[kred] < 1999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'2000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 33){
if($apie[kred] < 2999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'3000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 34){
if($apie[kred] < 4999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'5000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 35){
if($apie[kred] < 6999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'7000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 36){
if($apie[kred] < 9999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'10000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 37){
if($apie[kred] < 14999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'15000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 38){
if($apie[kred] < 19999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'20000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 39){
if($apie[kred] < 24999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'25000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 40){
if($apie[kred] < 29999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b><br><small>Įvygdei 40 žaidimo istorijos misijų!</small><br>Už tai gauni <b> 200,000 '.$vipt.' </div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'30000', vipticket=vipticket+'200000' WHERE nick = '$nick'");
}
}	
if($apie[istorija] == 41){
if($kg < 9999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1'  WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 42){
if($kg < 19999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1'  WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 43){
if($kg < 49999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1'  WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 44){
if($kg < 99999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1'  WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 45){
if($kg < 199999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1'  WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 46){
if($kg < 299999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1'  WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 47){
if($kg < 499999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1'  WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 48){
if($kg < 999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1'  WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 49){
if($kg < 1999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1'  WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 50){
if($kg < 4999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b><br><small>Įvygdei 50 žaidimo istorijos misijų!</small><br>Už tai gauni <b> 300,000 '.$vipt.'</b> ir <b>'.skaicius(500000000).'</b> KG!</div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', jega=jega+'500000000', gynyba=gynyba+'1500000000' WHERE nick = '$nick'");
}
}	
if($apie[istorija] == 51){
if($apie['lygis'] < 99 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b> Neužtenka reikiamo lygio!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 52){
if($inv[Majinsroll] < 9999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Majin Scroll!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Majinsroll=Majinsroll-'10000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 53){
if($apie[auksiniai] < 999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'1000000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 54){
if($apie[sms_litai] < 9999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek eurų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', sms_litai=sms_litai-'10000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 55){
if($inv[Powerstone] < 11999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Power Stone!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Powerstone=Powerstone-'12000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 56){
if($inv[Microshem] < 9999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Mikroskemu!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Microshem=Microshem-'10000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 57){
if($inv[dball] < 499 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek drakono rutulių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  dball=dball-'500' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 58){
if($inv[angelwing] < 9999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Angelo sparnų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  angelwing=angelwing-'10000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 59){
if($inv[Fusionfail] < 19999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Fusion Fail!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Fusionfail=Fusionfail-'20000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 60){
if($inv[naikinti] < 14999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Naikinimo Galios!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b><br><small>Įvygdei 60 žaidimo istorijos misijų!</small><br>Už tai gauni <b>1,000,000 LVL</b> kasimo!</div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' , kasimolvl=kasimolvl+'1000000' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  naikinti=naikinti-'15000' WHERE nick = '$nick'");
}
}	
if($apie[istorija] == 61){
if($apie['lygis'] < 119 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b> Neužtenka reikiamo lygio!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 62){
if($inv[Majinsroll] < 14999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Majin Scroll!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Majinsroll=Majinsroll-'15000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 63){
if($apie[auksiniai] < 1999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'2000000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 64){
if($apie[sms_litai] < 19999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek eurų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', sms_litai=sms_litai-'20000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 65){
if($inv[Powerstone] < 19999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Power Stone!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Powerstone=Powerstone-'20000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 66){
if($inv[Microshem] < 24999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Mikroskemu!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Microshem=Microshem-'25000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 67){
if($inv[dball] < 999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek drakono rutulių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  dball=dball-'1000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 68){
if($inv[angelwing] < 14999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Angelo sparnų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  angelwing=angelwing-'15000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 69){
if($inv[Fusionfail] < 29999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Fusion Fail!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Fusionfail=Fusionfail-'30000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 70){
if($inv[naikinti] < 19999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Naikinimo Galios!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b><br><small>Įvygdei 70 žaidimo istorijos misijų!</small><br>Už tai gauni <b>5,000,000 LVL</b> kasimo ir 30,000,000 '.$vipt.' </div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1' , kasimolvl=kasimolvl+'5000000', vipticket=vipticket+'30000000' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  naikinti=naikinti-'20000' WHERE nick = '$nick'");
}
}	
if($apie[istorija] == 71){
if($apie[auksiniai] < 499999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'500000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 72){
if($apie[auksiniai] < 999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'1000000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 73){
if($apie[auksiniai] < 1999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'2000000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 74){
if($apie[auksiniai] < 2999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'3000000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 75){
if($apie[auksiniai] < 3999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'4000000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 76){
if($apie[auksiniai] < 4999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'5000000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 77){
if($apie[auksiniai] < 6999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'7000000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 78){
if($apie[auksiniai] < 9999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'10000000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 79){
if($apie[auksiniai] < 11999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'12000000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 80){
if($apie[auksiniai] < 14999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b><br><small>Įvygdei 80 žaidimo istorijos misijų!</small><br>Už tai gauni <b> 200 '.$botas.' </div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', auksiniai=auksiniai-'15000000', botas=botas+'200' WHERE nick = '$nick'");
}
}	
if($apie[istorija] == 81){
if($apie[kred] < 49999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'50000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 82){
if($apie[kred] < 99999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'100000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 83){
if($apie[kred] < 199999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'200000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 84){
if($apie[kred] < 349999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'350000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 85){
if($apie[kred] < 499999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'500000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 86){
if($apie[kred] < 999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'1000000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 87){
if($apie[kred] < 1499999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'1500000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 88){
if($apie[kred] < 1999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'2000000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 89){
if($apie[kred] < 2999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'3000000' WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 90){
if($apie[kred] < 4999999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b><br><small>Įvygdei 90 žaidimo istorijos misijų!</small><br>Už tai gauni <b> 50,00,000 '.$vipt.'</b> ir <b>400</b>'.$botas.'</div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', kred=kred-'5000000', vipticket=vipticket+'50000000', botas=botas+'400' WHERE nick = '$nick'");
}
}	
if($apie[istorija] == 91){
if($kg < 100000000000000000000 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1'  WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 92){
if($kg < 200000000000000000000 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1'  WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 93){
if($kg < 300000000000000000000 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1'  WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 94){
if($kg < 400000000000000000000 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1'  WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 95){
if($kg < 500000000000000000000 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1'  WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 96){
if($kg < 1000000000000000000000 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1'  WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 97){
if($kg < 2000000000000000000000 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1'  WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 98){
if($kg < 3000000000000000000000 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1'  WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 99){
if($kg < 5000000000000000000000 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1'  WHERE nick = '$nick'");

}
}	
if($apie[istorija] == 100){
if($kg < 10000000000000000000000 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei žaidimo istorijos misiją!</b><br><small>Įvygdei 100 žaidimo istorijos misijų!</small><br>Už tai gauni <b> 100,000,000 '.$vipt.'</b> ir <b>1000</b>'.$botas.'!</div>';
	mysqli_query($conn,"UPDATE zaidejai SET  istorija =istorija+'1', vipticket=vipticket+'100000000', botas=botas+'1000' WHERE nick = '$nick'");
}
}	




$g_n[] = array('pagrindinis.php?id=', 'Pagrindinis',"istorija.php","Žaidimo istorija", "Žaidimo Istorija vygdymas");
navigacija($g_n);


}

elseif($id == "cognac"){
				top('Cognac');
	if($apie['istorija'] < 49   ){
	echo'	<div class="meniuc"><img src="img/veikejai/Cognac-0.jpg"></div>';
	echo'<div class="meniuc">
  Neesi įvygdęs <b><font color="red"><small>50 žaidimo istorijos misijų</small>!</b></font></div>';}

else{

echo' <div class="meniuc"> Kadangi esi įvygdęs <b>50</b> Žaidimo istorijos misijų, turi galimybę įsigyti šį veikėją!</div>';
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Cognac</b><br/>
'.$ico2.' Jėga: <font color="green"><b>+3250%</b></font><br/>
'.$ico2.' Gynyba: <font color="green"><b>+3250%</b></font><br/>
'.$ico2.' Gyvybes: <font color="green"><b>+3250%</b></font><br/>
'.$ico2.' Kaina: <b>1500	<img src="img/bicons/bitcoin.png"> <br><small> '.$ico2.'  Reikia įvygdyti 50 istorijos misijų</small></b><font color="red"><b></b></font><br/>
'.$ico2.' <small>Reikia atiduoti<b> '.skaicius(5000000).' LVL</b> kasimo!<small><br>
'.$ico2.'  Bonusas; Kovų zonoje gauna<b> 5 kartus daugiau</b> '.$pinigaii.'
		</td>
		<td>
		<img src="img/veikejai/Cognac-0.png">
		</td>
		</tr>
		</table> </div>	

		
<div class="meniu">'.$ico.' <b><a href="?id=perku_cognac">Pirkti šį veikėją</a></b></div>
		
		
		
		';}
		
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","istorija.php","Istorija", "Cognac");
	navigacija($g_n);


}

elseif($id == "perku_cognac"){
	top('Cognac');
	 online('Apžiūri Cognac');
if($apie['cognacb']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
	if($apie['bitcoin'] < 1499 || $apie['istorija'] < 49 || $apie['kasimolvl'] < 4999999  ){
	echo'	<div class="meniuc"><img src="img/veikejai/Cognac-0.png"></div>';
	echo'<div class="meniuc">
  Neužtenka  <img src="img/bicons/bitcoin.png"> arba neesi įvygdęs <b><font color="red"><small>50 istorijos misijų</small>!</b></font></div>';}

else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Cognac-0.png"></div><div class="meniuc"> Nusipirkai už <b>1500 </b> <b><font color="red"><img src="img/bicons/bitcoin.png"></b></font>
 </div> ';		
mysqli_query($conn,"UPDATE zaidejai SET  bitcoin=bitcoin-'1500', kasimolvl=kasimolvl-'5000000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Cognac', trans='0', sms_litai=sms_litai-'0' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");


mysqli_query($conn,"UPDATE zaidejai SET cognacb='$timxx' WHERE nick='$nick' ");
}}


elseif($apie['cognacb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","istorija.php","Istorijos misijos",  "Veikejo pirkimas");
	navigacija($g_n);
	
}







foot();
?>
