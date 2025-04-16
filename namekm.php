<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();
if($apie['namekm'] == '0'){$img =' img'; $vieta = 'inv'; $reikia = 'Majin scroll'; $kiek ='10' ;}
if($apie['namekm'] == '1'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Lygio'; $kiek ='40' ;}
if($apie['namekm'] == '2'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Majin scroll'; $kiek ='500' ;}
if($apie['namekm'] == '3'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='20000' ;}
if($apie['namekm'] == '4'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Eurų'; $kiek ='200' ;}
if($apie['namekm'] == '5'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Power Stone'; $kiek ='800' ;}
if($apie['namekm'] == '6'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Μikroskemų'; $kiek ='1200' ;}
if($apie['namekm'] == '7'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Drakono rutulių'; $kiek ='60' ;}
if($apie['namekm'] == '8'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Angelo sparnų'; $kiek ='1600' ;}
if($apie['namekm'] == '9'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Fusion Fail'; $kiek ='2000' ;}
if($apie['namekm'] == '10'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Naikinimo galios'; $kiek ='2200' ;}
if($apie['namekm'] == '11'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Lygio'; $kiek ='80' ;}
if($apie['namekm'] == '12'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Majin scroll'; $kiek ='5000' ;}
if($apie['namekm'] == '13'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Auksinių'; $kiek ='200000' ;}
if($apie['namekm'] == '14'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Eurų'; $kiek ='2000' ;}
if($apie['namekm'] == '15'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Power Stone'; $kiek ='8000' ;}
if($apie['namekm'] == '16'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Μikroskemų'; $kiek ='12000' ;}
if($apie['namekm'] == '17'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Drakono rutulių'; $kiek ='600' ;}
if($apie['namekm'] == '18'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Angelo sparnų'; $kiek ='16000' ;}
if($apie['namekm'] == '19'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Fusion Fail'; $kiek ='20000' ;}
if($apie['namekm'] == '20'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Naikinimo galios'; $kiek ='22000' ;}
if($apie['namekm'] == '21'){$img ='nmisijos2'; $vieta = 'inv'; $reikia ='Eurų'; $kiek ='500' ;}
if($apie['namekm'] == '22'){$img ='nmisijos2'; $vieta = 'inv'; $reikia ='Eurų'; $kiek ='1000' ;}
if($apie['namekm'] == '23'){$img ='nmisijos2'; $vieta = 'inv'; $reikia ='Eurų'; $kiek ='1500' ;}
if($apie['namekm'] == '24'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Eurų'; $kiek ='2000' ;}
if($apie['namekm'] == '25'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Eurų'; $kiek ='2500' ;}
if($apie['namekm'] == '26'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Eurų'; $kiek ='3000' ;}
if($apie['namekm'] == '27'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Eurų'; $kiek ='3500' ;}
if($apie['namekm'] == '28'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Eurų'; $kiek ='4000' ;}
if($apie['namekm'] == '29'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Eurų'; $kiek ='4500' ;}
if($apie['namekm'] == '30'){$img ='nmisijos2'; $vieta = 'inv'; $reikia = 'Eurų'; $kiek ='5000' ;}
if($apie['namekm'] == '31'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Kreditų'; $kiek ='10000' ;}
if($apie['namekm'] == '32'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Kreditų'; $kiek ='20000' ;}
if($apie['namekm'] == '33'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Kreditų'; $kiek ='30000' ;}
if($apie['namekm'] == '34'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Kreditų'; $kiek ='40000' ;}
if($apie['namekm'] == '35'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Kreditų'; $kiek ='50000' ;}
if($apie['namekm'] == '36'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Kreditų'; $kiek ='60000' ;}
if($apie['namekm'] == '37'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Kreditų'; $kiek ='70000' ;}
if($apie['namekm'] == '38'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Kreditų'; $kiek ='80000' ;}
if($apie['namekm'] == '39'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Kreditų'; $kiek ='90000' ;}
if($apie['namekm'] == '40'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Kreditų'; $kiek ='100000' ;}
if($apie['namekm'] == '41'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Bitacoin'; $kiek ='50' ;}
if($apie['namekm'] == '42'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Bitacoin'; $kiek ='60' ;}
if($apie['namekm'] == '43'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Bitacoin'; $kiek ='70' ;}
if($apie['namekm'] == '44'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Bitacoin'; $kiek ='80' ;}
if($apie['namekm'] == '45'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Bitacoin'; $kiek ='90' ;}
if($apie['namekm'] == '46'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Bitacoin'; $kiek ='100' ;}
if($apie['namekm'] == '47'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Bitacoin'; $kiek ='110' ;}
if($apie['namekm'] == '48'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Bitacoin'; $kiek ='120' ;}
if($apie['namekm'] == '49'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Bitacoin'; $kiek ='130' ;}
if($apie['namekm'] == '50'){$img ='nmisijos2'; $vieta = 'inv'; $reikia =' Bitacoin'; $kiek ='150' ;}

if($id == ''){
top('Namek misijos');

if($apie['lygis'] < 59){
		
echo '<div class="meniuc"><img src=img/namek.png border="1" width="180" height="90"><alt="**"></br></br>Į namek planeta galima tik nuo 60 <img src="img/bicons/lvl.gif" /> !</div>


';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Namek planeta");
	navigacija($g_n);
}else{
	
	if($apie['k_laivas'] <'1' OR $apie['persikelimo_manevras'] < ''){
		
echo '<div class="meniuc"><img src=img/k_laivas.png></br></br>Tu neturi kosminio laivo, jį gali pasigaminti <b>Kapsulių korporacijoje</div>


';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Namek planeta");
	navigacija($g_n);
}
else{

	
	if($apie['namekm'] != '51'){ 


echo '<div class="meniuc">
<b>Namek misijos</b> - tai misijos kurias reikia vygdyti, atlikus tam tikrą kiekį misijų, gausite atlygį!:)</div>

<div class="meniuc">
<img src="img/imgg/'.$img.'.png"></div>
<div class="meniuc">
Reikia <b><font color="red">'.skaicius($kiek).' </font>'.$reikia.'</b> 




<br>
</div>
<div class="meniuc"> Dabar vygdai  '.$apie['namekm'].' iš 50</div>
';



$ID = rand(100000,999999);
$_SESSION['no_refresh'] = $ID;
echo'<div class="meniuc">  <a href="?id=namekm&ID='.$ID.'"><small><input type="submit" Value="Vygdyti Namek misiją"/> </small></a>
</div>';}

else{

	echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo'<div class="meniuc">Tu perėjai visas namek misijas!</div>';
	}	



$g_n[] = array('pagrindinis.php?id=', 'Pagrindinis',"namek.php","Namek planeta", "Misijų vygdymas");
navigacija($g_n);
}
}
}
elseif($id == 'namekm'){
	
top('Namek misijos');	
	online('Namek misijos');
////// misijos
if($apie['namekm'] == 1){
if($apie['lygis'] < 39 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b> Neužtenka reikiamo lygio!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 2){
if($inv['Majinsroll'] < 499 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Majin Scroll!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Majinsroll=Majinsroll-'500' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 3){
if($apie['auksiniai'] < 19999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  auksiniai=auksiniai-'20000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 4){
if($apie['sms_litai'] < 199 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek eurų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  sms_litai=sms_litai-'200' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 5){
if($inv['Powerstone'] < 799 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Power Stone!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Powerstone=Powerstone-'800' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 6){
if($inv['Microshem'] < 1199 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Mikroskemu!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Microshem=Microshem-'1200' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 7){
if($inv['dball'] < 59 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek drakono rutulių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  dball=dball-'60' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 8){
if($inv['angelwing'] < 1599 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Angelo sparnų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  angelwing=angelwing-'1600' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 9){
if($inv['Fusionfail'] < 1999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Fusion Fail!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Fusionfail=Fusionfail-'2000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 10){
if($inv['naikinti'] < 2199 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Naikinimo Galios!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b><br><small>Įvygdei 10 Namek misijų!</small><br>Už tai gauni po <b>5000 </b> Κario tobulėjimo, Angelo sparnų,` Naikinimo galios!</div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1'  WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  tobulas=tobulas+'5000', angelwing=angelwing+'5000', naikinti=naikinti+'5000' WHERE nick = '$nick'");
mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='Žaidėjas <b>".$apie['nick']."</b> įvygdė <small>10 Namek misijų!</small> :) ', data='".time()."'");
}
}	
if($apie['namekm'] == 11){
if($apie['lygis'] < 79 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b> Neužtenka reikiamo lygio!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 12){
if($inv['Majinsroll'] < 4999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Majin Scroll!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Majinsroll=Majinsroll-'5000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 13){
if($apie['auksiniai'] < 199999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek auksinių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  auksiniai=auksiniai-'200000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 14){
if($apie['sms_litai'] < 1999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek eurų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  sms_litai=sms_litai-'2000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 15){
if($inv['Powerstone'] < 7999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Power Stone!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Powerstone=Powerstone-'8000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 16){
if($inv['Microshem'] < 11999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Mikroskemu!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Microshem=Microshem-'12000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 17){
if($inv['dball'] < 599 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek drakono rutulių!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  dball=dball-'600' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 18){
if($inv['angelwing'] < 15999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Angelo sparnų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  angelwing=angelwing-'16000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 19){
if($inv['Fusionfail'] < 19999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Fusion Fail!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  Fusionfail=Fusionfail-'20000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 20){
if($inv['naikinti'] < 21999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Naikinimo Galios!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b><br><small>Įvygdei 20 Namek misijų!</small><br>Už tai gauni po <b>10,000 </b> Κario tobulėjimo, Angelo sparnų,` Naikinimo galios!</div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1'  WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  tobulas=tobulas+'10000', angelwing=angelwing+'10000', naikinti=naikinti+'10000', naikinti=naikinti-'22000'  WHERE nick = '$nick'");
mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='Žaidėjas <b>".$apie['nick']."</b> įvygdė <small>20 Namek misijų!</small> :) ', data='".time()."'");
}
}	
if($apie['namekm'] == 21){
if($apie['sms_litai'] < 499 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$eurui.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  sms_litai=sms_litai-'500' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 22){
if($apie['sms_litai'] < 999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$eurui.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  sms_litai=sms_litai-'1000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 23){
if($apie['sms_litai'] < 1499 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$eurui.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  sms_litai=sms_litai-'1500' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 24){
if($apie['sms_litai'] < 1999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$eurui.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  sms_litai=sms_litai-'2000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 25){
if($apie['sms_litai'] < 2499 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$eurui.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  sms_litai=sms_litai-'2500' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 26){
if($apie['sms_litai'] < 2999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$eurui.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  sms_litai=sms_litai-'3000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 27){
if($apie['sms_litai'] < 3499 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$eurui.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  sms_litai=sms_litai-'3500' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 28){
if($apie['sms_litai'] < 3999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$eurui.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  sms_litai=sms_litai-'4000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 29){
if($apie['sms_litai'] < 4499 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$eurui.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  sms_litai=sms_litai-'4500' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 30){
if($apie['sms_litai'] <4999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Eurų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b><br><small>Įvygdei 30 Namek misijų!</small><br>Už tai gauni <b>20,000 </b> VIP tickets!</div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1', sms_litai=sms_litai-'5000',  vipticket=vipticket+'20000' WHERE nick = '$nick'");
	
mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='Žaidėjas <b>".$apie['nick']."</b> įvygdė <small>30 Namek misijų!</small> :) ', data='".time()."'");
}
}	
if($apie['namekm'] == 31){
if($apie['kred'] < 9999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$kreditaii.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  kred=kred-'10000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 32){
if($apie['kred'] < 19999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$kreditaii.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  kred=kred-'20000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 33){
if($apie['kred'] < 29999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$kreditaii.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  kred=kred-'30000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 34){
if($apie['kred'] < 39999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$kreditaii.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  kred=kred-'40000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 35){
if($apie['kred'] < 49999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$kreditaii.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  kred=kred-'50000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 36){
if($apie['kred'] < 59999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$kreditaii.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  kred=kred-'60000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 37){
if($apie['kred'] < 69999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$kreditaii.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  kred=kred-'70000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 38){
if($apie['kred'] < 79999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$kreditaii.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  kred=kred-'80000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 39){
if($apie['kred'] < 89999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$kreditaii.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  kred=kred-'90000' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 40){
if($apie['kred'] <99999 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek Kreditų!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b><br><small>Įvygdei 40 Namek misijų!</small><br>Už tai gauni  <b>50,000 </b> VIP tickets!</div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1', kred=kred-'100000',  vipticket=vipticket+'50000' WHERE nick = '$nick'");
	
mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='Žaidėjas <b>".$apie['nick']."</b> įvygdė <small>40 Namek misijų!</small> :) ', data='".time()."'");
}
}	
if($apie['namekm'] == 41){
if($apie['bitcoin'] < 49 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$kreditaii.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  bitcoin=bitcoin-'50' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 42){
if($apie['bitcoin'] < 59 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$kreditaii.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  bitcoin=bitcoin-'60' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 43){
if($apie['bitcoin'] < 69 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$kreditaii.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  bitcoin=bitcoin-'70' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 44){
if($apie['bitcoin'] < 79 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$kreditaii.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  bitcoin=bitcoin-'80' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 45){
if($apie['bitcoin'] < 89 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$kreditaii.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  bitcoin=bitcoin-'90' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 46){
if($apie['bitcoin'] < 99 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$kreditaii.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  bitcoin=bitcoin-'100' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 47){
if($apie['bitcoin'] < 109 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$kreditaii.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  bitcoin=bitcoin-'110' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 48){
if($apie['bitcoin'] < 119 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$kreditaii.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  bitcoin=bitcoin-'120' WHERE nick = '$nick'");

}
}	
if($apie['namekm'] == 49){
if($apie['bitcoin'] < 129 ){echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek '.$kreditaii.'!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  bitcoin=bitcoin-'130' WHERE nick = '$nick'");

}
}	

if($apie['namekm'] == 50){
if($apie['bitcoin'] <149 ){
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek BitCoin!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos2.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei Namek misiją!</b><br><small>Įvygdei 50 Namek misijų!</small><br>Už tai gauni  <b>100,000 </b> VIP tickets!</div>';
	mysqli_query($conn,"UPDATE zaidejai SET  namekm=namekm+'1', bitcoin=bitcoin-'150',  vipticket=vipticket+'100000' WHERE nick = '$nick'");
	
mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='Žaidėjas <b>".$apie['nick']."</b> įvygdė <small>50 Namek misijų!</small> :) ', data='".time()."'");
}
}	

$g_n[] = array('pagrindinis.php?id=', 'Pagrindinis',"namek.php","Namek planeta", "Misijų vygdymas");
navigacija($g_n);


}
foot();
?>

