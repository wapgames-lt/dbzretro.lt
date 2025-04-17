<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();
if($apie['kasimom'] == '1'){$img =' img'; $vieta = 'inv'; $reikia = 'Alavo rūdų'; $kiek ='1000' ;}
if($apie['kasimom'] == '2'){$img =' img'; $vieta = 'inv'; $reikia = 'Alavo rūdų'; $kiek ='2000' ;}
if($apie['kasimom'] == '3'){$img =' img'; $vieta = 'inv'; $reikia = 'Alavo rūdų'; $kiek ='3000' ;}
if($apie['kasimom'] == '4'){$img =' img'; $vieta = 'inv'; $reikia = 'Alavo rūdų'; $kiek ='4000' ;}
if($apie['kasimom'] == '5'){$img =' img'; $vieta = 'inv'; $reikia = 'Alavo rūdų'; $kiek ='5000' ;}
if($apie['kasimom'] == '6'){$img =' img'; $vieta = 'inv'; $reikia = 'Alavo rūdų'; $kiek ='7000' ;}
if($apie['kasimom'] == '7'){$img =' img'; $vieta = 'inv'; $reikia = 'Alavo rūdų'; $kiek ='10000' ;}
if($apie['kasimom'] == '8'){$img =' img'; $vieta = 'inv'; $reikia = 'Alavo rūdų'; $kiek ='15000' ;}
if($apie['kasimom'] == '9'){$img =' img'; $vieta = 'inv'; $reikia = 'Alavo rūdų'; $kiek ='30000' ;}
if($apie['kasimom'] == '10'){$img =' img'; $vieta = 'inv'; $reikia = 'Alavo rūdų'; $kiek ='50000' ;}
if($id == ''){
top('Kasimo Misijos');
	if((int)$user['istorijos_time']-time()> 0){
			top('ŽAIDIMO ISTORIJA');
			echo'<div class="meniuc">
<img src="img/bicons/like.png" />
Tu esi perėjas visas sagas!
<img src="img/bicons/like.png" />
</div>';
		
	
	}
	elseif($apie['kasimom'] != '11'){ 


echo '<div class="meniuc">
<b>Kasimo misijos</b> - tai misijos kuriose reikia atiduot tam tikrą kiekį rūdų, atlikus tam tikrą kiekį misijų, gausite atlygį!:)</div>

<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>
<div class="meniuc">
Reikia <b><font color="red">'.skaicius($kiek).' </font>'.$reikia.'</b> 




<br>
</div>
<div class="meniuc"> Dabar vygdai  '.$apie['kasimom'].' iš 10</div>
';



$ID = rand(100000,999999);
$_SESSION['no_refresh'] = $ID;
echo'<div class="meniuc">  <a href="?id=kasimo&ID='.$ID.'"><small><input type="submit" Value="Vygdyti kasimo misiją"/> </small></a>
</div>';}

else{

	echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
	echo'<div class="meniuc">Tu įvygdęs visas kasimo misijas!</div>';
		
}


$g_n[] = array('pagrindinis.php?id=', 'Pagrindinis',"kasimo_misijos.php","Kasimo misijos", "Kasimo misijų vygdymas");
navigacija($g_n);

}
elseif($id == 'kasimo'){
	
top('Kasimo misijos');	
	online('Kasimo misijos');
////// istorija
if($apie['kasimom'] == 1){
if($inv['alavas'] < 999 ){
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
		echo'<div class="meniuc">
 <b> Neužtenka reikiamo kiekio!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei kasimo misiją!</b></div>';
mysqli_query($conn,"UPDATE inv SET  alavas=alavas-'1000' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  kasimom=kasimom+'1' WHERE nick = '$nick'");

}
}	
if($apie['kasimom'] == 2){
if($inv['alavas'] < 1999 ){
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
		echo'<div class="meniuc">
 <b> Neužtenka reikiamo kiekio!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei kasimo misiją!</b></div>';
mysqli_query($conn,"UPDATE inv SET  alavas=alavas-'2000' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  kasimom=kasimom+'1' WHERE nick = '$nick'");

}
}	
if($apie['kasimom'] == 3){
if($inv['alavas'] < 3000 ){
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
		echo'<div class="meniuc">
 <b> Neužtenka reikiamo kiekio!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei kasimo misiją!</b></div>';
mysqli_query($conn,"UPDATE inv SET  alavas=alavas-'3000' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  kasimom=kasimom+'1' WHERE nick = '$nick'");

}
}	
if($apie['kasimom'] == 4){
if($inv['alavas'] < 4000 ){
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
		echo'<div class="meniuc">
 <b> Neužtenka reikiamo kiekio!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei kasimo misiją!</b></div>';
mysqli_query($conn,"UPDATE inv SET  alavas=alavas-'4000' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  kasimom=kasimom+'1' WHERE nick = '$nick'");

}
}	
if($apie['kasimom'] == 5){
if($inv['alavas'] < 5000 ){
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
		echo'<div class="meniuc">
 <b> Neužtenka reikiamo kiekio!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei kasimo misiją!</b></div>';
mysqli_query($conn,"UPDATE inv SET  alavas=alavas-'5000' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  kasimom=kasimom+'1' WHERE nick = '$nick'");

}
}	
if($apie['kasimom'] == 6){
if($inv['alavas'] < 7000 ){
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
		echo'<div class="meniuc">
 <b> Neužtenka reikiamo kiekio!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei kasimo misiją!</b></div>';
mysqli_query($conn,"UPDATE inv SET  alavas=alavas-'7000' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  kasimom=kasimom+'1' WHERE nick = '$nick'");

}
}	
if($apie['kasimom'] == 7){
if($inv['alavas'] < 10000 ){
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
		echo'<div class="meniuc">
 <b> Neužtenka reikiamo kiekio!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei kasimo misiją!</b></div>';
mysqli_query($conn,"UPDATE inv SET  alavas=alavas-'10000' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  kasimom=kasimom+'1' WHERE nick = '$nick'");

}
}	
if($apie['kasimom'] == 8){
if($inv['alavas'] < 15000 ){
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
		echo'<div class="meniuc">
 <b> Neužtenka reikiamo kiekio!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei kasimo misiją!</b></div>';
mysqli_query($conn,"UPDATE inv SET  alavas=alavas-'15000' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  kasimom=kasimom+'1' WHERE nick = '$nick'");

}
}	
if($apie['kasimom'] == 9){
if($inv['alavas'] < 30000 ){
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
		echo'<div class="meniuc">
 <b> Neužtenka reikiamo kiekio!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei kasimo misiją!</b></div>';
mysqli_query($conn,"UPDATE inv SET  alavas=alavas-'30000' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  kasimom=kasimom+'1' WHERE nick = '$nick'");

}
}	
if($apie['kasimom'] == 10){
if($inv['alavas'] < 50000 ){
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi reikiamo kiekio!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/kasimas/kasykla.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai įvygdei kasimo misiją!</b><br><small>Įvygdei 10 kasimo misijų!</small><br>Už tai gauni <b>500,000 LVL</b> kasimo!</div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kasimom=kasimom+'1' , kasimolvl=kasimolvl+'500000' WHERE nick = '$nick'");
	mysqli_query($conn,"UPDATE inv SET  alavas=alavas-'50000' WHERE nick = '$nick'");
mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='Žaidėjas <b>".$apie['nick']."</b> įvygdė <small>10 kasimo misijų!</small> :) ', data='".time()."'");
}
}	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimo_misijos.php","Kasimo misijos",  "Misijų vygdymas");
	navigacija($g_n);
	
}







foot();
?>
