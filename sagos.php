<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";


include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();

baneris();

topbar();
online('Sagos');
if($apie[sagos] == '1'){$mob = 'Raditz'; $kgg = '100';}
if($apie[sagos] == '2'){$mob = 'Saibamanus'; $kgg = '300';}
if($apie[sagos] == '3'){$mob = 'Nappa'; $kgg = '500';}
if($apie[sagos] == '4'){$mob = 'Vegeta'; $kgg = '900';}
if($apie[sagos] == '5'){$mob = 'Vegeta Great Ape.'; $kgg = '1450';}
if($apie[sagos] == '6'){$mob = 'Cui'; $kgg = '1900';}
if($apie[sagos] == '7'){$mob = 'Zarbon'; $kgg = '2500';}
if($apie[sagos] == '8'){$mob = 'Zarbon monster'; $kgg = '3500';}
if($apie[sagos] == '9'){$mob = 'Guldo'; $kgg = '4300';}
if($apie[sagos] == '10'){$mob = 'Recoome'; $kgg = '4450';}
if($apie[sagos] == '11'){$mob = 'Burter'; $kgg = '5000';}
if($apie[sagos] == '12'){$mob = 'Jeice'; $kgg = '6300';}
if($apie[sagos] == '13'){$mob = 'Captain ginyu'; $kgg = '7000';}
if($apie[sagos] == '14'){$mob = 'Captain ginyu (Goku body)'; $kgg = '8500';}
if($apie[sagos] == '15'){$mob = 'Frieza'; $kgg = '9000';}
if($apie[sagos] == '16'){$mob = 'Frieza (2 forma)'; $kgg = '10000';}
if($apie[sagos] == '17'){$mob = 'Frieza (3 forma)'; $kgg = '12500';}
if($apie[sagos] == '18'){$mob = 'Frieza (4 forma)'; $kgg = '14700';}
if($apie[sagos] == '19'){$mob = 'Frieza (100% forma)'; $kgg = '17000';}



if($apie[sagos] == '20'){$mob = 'Bulma'; $kgg = '20000';}
if($apie[sagos] == '21'){$mob = 'ChiChi'; $kgg = '24000';}
if($apie[sagos] == '22'){$mob = 'Yamcha'; $kgg = '27000';}
if($apie[sagos] == '23'){$mob = 'Master roshi'; $kgg = '31500';}
if($apie[sagos] == '24'){$mob = 'Piccolo'; $kgg = '35000';}
if($apie[sagos] == '25'){$mob = 'Spice'; $kgg = '37000';}
if($apie[sagos] == '26'){$mob = 'Vengiar'; $kgg = '39000';}
if($apie[sagos] == '27'){$mob = 'Mustard'; $kgg = '41000';}
if($apie[sagos] == '28'){$mob = 'Salt'; $kgg = '43000';}
if($apie[sagos] == '29'){$mob = 'Garlick junior'; $kgg = '45000';}
if($apie[sagos] == '30'){$mob = 'Garlcik junior (2 froma)'; $kgg = '47000';}
if($apie[sagos] == '31'){$mob = 'Mecha frieza'; $kgg = '50000';}
if($apie[sagos] == '32'){$mob = 'King cold'; $kgg = '58000';}
if($apie[sagos] == '33'){$mob = 'Future trunks'; $kgg = '62000';}
if($apie[sagos] == '34'){$mob = 'Future trunks super saiyan'; $kgg = '67000';}
if($apie[sagos] == '35'){$mob = 'Android 19'; $kgg = '70000';}
if($apie[sagos] == '36'){$mob = 'Android 20'; $kgg = '75000';}
if($apie[sagos] == '37'){$mob = 'Android 18'; $kgg = '80000';}
if($apie[sagos] == '38'){$mob = 'Android 17'; $kgg = '86000';}
if($apie[sagos] == '39'){$mob = 'Imperfect cell'; $kgg = '91000';}
if($apie[sagos] == '40'){$mob = 'Semi perfect cell'; $kgg = '100000';}
if($apie[sagos] == '41'){$mob = 'Trunks'; $kgg = '112000';}
if($apie[sagos] == '42'){$mob = 'Perfect cell'; $kgg = '130000';}
if($apie[sagos] == '43'){$mob = 'Gohan'; $kgg = '150000';}
if($apie[sagos] == '44'){$mob = 'Perfect cell'; $kgg = '160000';}
if($apie[sagos] == '45'){$mob = 'Cell juniors'; $kgg = '170000';}
if($apie[sagos] == '46'){$mob = 'Super perfect cell'; $kgg = '190000';}
if($apie[sagos] == '47'){$mob = 'Pikkon'; $kgg = '210000';}
if($apie[sagos] == '48'){$mob = 'Spopovitch'; $kgg = '225000';}
if($apie[sagos] == '49'){$mob = 'Kibito'; $kgg = '235000';}
if($apie[sagos] == '50'){$mob = 'Dabura'; $kgg = '250000';}
if($apie[sagos] == '51'){$mob = 'Pui Pui'; $kgg = '260000';}
if($apie[sagos] == '52'){$mob = 'Yakon'; $kgg = '275000';}
if($apie[sagos] == '53'){$mob = 'Dabura'; $kgg = '285000';}
if($apie[sagos] == '54'){$mob = 'Majin Vegeta'; $kgg = '300000';}
if($apie[sagos] == '55'){$mob = 'Majin Buu'; $kgg = '320000';}
if($apie[sagos] == '56'){$mob = 'Goku ssj3'; $kgg = '350000';}
if($apie[sagos] == '57'){$mob = 'Majin Buu'; $kgg = '400000';}
if($apie[sagos] == '58'){$mob = 'Evil Buu'; $kgg = '460000';}
if($apie[sagos] == '59'){$mob = 'Gotranks'; $kgg = '590000';}
if($apie[sagos] == '60'){$mob = 'Gotranks ssj'; $kgg = '640000';}
if($apie[sagos] == '61'){$mob = 'Gotranks ssj3'; $kgg = '700000';}
if($apie[sagos] == '62'){$mob = 'Buu (Absorbation gotrunks)'; $kgg = '790000';}
if($apie[sagos] == '63'){$mob = 'Buu (Absorbation piccolo)'; $kgg = '820000';}
if($apie[sagos] == '64'){$mob = 'Buu (Absorbation gohan)'; $kgg = '870000';}
if($apie[sagos] == '65'){$mob = 'Vegito'; $kgg = '900000';}
if($apie[sagos] == '66'){$mob = 'Vegito ssj'; $kgg = '1000000';}
if($apie[sagos] == '67'){$mob = 'Kid buu'; $kgg = '1100000';}
if($apie[sagos] == '68'){$mob = 'Uub (Kid buu)'; $kgg = '1250000';}
if($apie[sagos] == '69'){$mob = 'Emperor Pilaf'; $kgg = '1300000';}
if($apie[sagos] == '70'){$mob = 'Gilu'; $kgg = '1500000';}
if($apie[sagos] == '71'){$mob = 'Don kear'; $kgg = '1800000';}
if($apie[sagos] == '72'){$mob = 'Ledgic'; $kgg = '2100000';}
if($apie[sagos] == '73'){$mob = 'Dalltaki'; $kgg = '3000000';}
if($apie[sagos] == '74'){$mob = 'Lord lud'; $kgg = '4500000';}
if($apie[sagos] == '75'){$mob = 'Lord lud(full power)'; $kgg = '6200000';}
if($apie[sagos] == '76'){$mob = 'General rildo'; $kgg = '7400000';}
if($apie[sagos] == '77'){$mob = 'General rildo (2 forma)'; $kgg = '9000000';}
if($apie[sagos] == '78'){$mob = 'General rildo (3 forma)'; $kgg = '12000000';}
if($apie[sagos] == '79'){$mob = 'Dr myuu'; $kgg = '15000000';}
if($apie[sagos] == '80'){$mob = 'Baby gohan'; $kgg = '18000000';}
if($apie[sagos] == '81'){$mob = 'Baby goten'; $kgg = '21000000';}
if($apie[sagos] == '82'){$mob = 'Baby trunks'; $kgg = '25000000';}
if($apie[sagos] == '83'){$mob = 'Baby'; $kgg = '30000000';}
if($apie[sagos] == '84'){$mob = 'Baby vegeta'; $kgg = '40000000';}
if($apie[sagos] == '85'){$mob = 'Baby vegeta (2 stadija)'; $kgg = '50000000';}
if($apie[sagos] == '86'){$mob = 'Baby gvegeta(Gold oozaru)'; $kgg = '70000000';}
if($apie[sagos] == '87'){$mob = 'Nappa'; $kgg = '80000000';}
if($apie[sagos] == '88'){$mob = 'Zarbon'; $kgg = '95000000';}
if($apie[sagos] == '89'){$mob = 'Dodoria'; $kgg = '110000000';}
if($apie[sagos] == '90'){$mob = 'Recoome'; $kgg = '130000000';}
if($apie[sagos] == '91'){$mob = 'Guldo'; $kgg = '150000000';}
if($apie[sagos] == '92'){$mob = 'King cold'; $kgg = '300000000';}
if($apie[sagos] == '93'){$mob = 'Jeice'; $kgg = '400000000';}
if($apie[sagos] == '94'){$mob = 'Babidi'; $kgg = '600000000';}
if($apie[sagos] == '95'){$mob = 'Pui pui'; $kgg = '900000000';}
if($apie[sagos] == '96'){$mob = 'Android 19'; $kgg = '1200000000';}
if($apie[sagos] == '97'){$mob = 'Appule'; $kgg = '1500000000';}
if($apie[sagos] == '98'){$mob = 'Cooler'; $kgg = '1800000000';}
if($apie[sagos] == '99'){$mob = 'General rildo'; $kgg = '2100000000';}
if($apie[sagos] == '100'){$mob = 'Dr. myuu ir D.r gerro'; $kgg = '3500000000';}
if($apie[sagos] == '101'){$mob = 'Fryza ir Cell'; $kgg = '5000000000';}
if($apie[sagos] == '102'){$mob = 'Super Android18'; $kgg = '7000000000';}
if($apie[sagos] == '103'){$mob = 'Black smoke shenron'; $kgg = '8000000000';}
if($apie[sagos] == '104'){$mob = 'Haze shenron'; $kgg = '9000000000';}
if($apie[sagos] == '105'){$mob = 'Rage shenron'; $kgg = '10000000000';}
if($apie[sagos] == '106'){$mob = 'Ocenus shenron'; $kgg = '13000000000';}
if($apie[sagos] == '107'){$mob = 'Naturon shenron'; $kgg = '16000000000';}
if($apie[sagos] == '108'){$mob = 'Nuova shenron'; $kgg = '18000000000';}
if($apie[sagos] == '109'){$mob = 'Eis shenron'; $kgg = '22000000000';}
if($apie[sagos] == '110'){$mob = 'Omega shenron'; $kgg = '30000000000';}


if($apie['sagos'] >= 1 && $apie['sagos'] <= 5){ $name = 'Sajanu saga';}
if($apie['sagos'] >= 6 && $apie['sagos'] <= 10){ $name = 'Namek saga';}
if($apie['sagos'] >= 11 && $apie['sagos'] <= 15){ $name = 'Captain ginyu saga';}
if($apie['sagos'] >= 15 && $apie['sagos'] <= 19){ $name = 'Frieza saga';}
if($apie['sagos'] >= 20 && $apie['sagos'] <= 30){ $name = 'Garlick junior saga';}
if($apie['sagos'] >= 31 && $apie['sagos'] <= 34){ $name = 'Trunks saga';}
if($apie['sagos'] >= 35 && $apie['sagos'] <= 38){ $name = 'Androids saga';}
if($apie['sagos'] >= 39 && $apie['sagos'] <= 40){ $name = 'Imperfect Cell saga';}
if($apie['sagos'] >= 40 && $apie['sagos'] <= 42){ $name = 'Perfect Cell saga';}
if($apie['sagos'] >= 43 && $apie['sagos'] <= 46){ $name = 'Cell game saga';}
if($apie['sagos'] >= 47 && $apie['sagos'] <= 47){ $name = 'Great saiyaman saga';}
if($apie['sagos'] >= 48 && $apie['sagos'] <= 49){ $name = 'World tournament saga';}
if($apie['sagos'] >= 50 && $apie['sagos'] <= 54){ $name = 'Babidi saga';}
if($apie['sagos'] >= 55 && $apie['sagos'] <= 57){ $name = 'Majin Buu saga';}
if($apie['sagos'] >= 58 && $apie['sagos'] <= 66){ $name = 'Fussion saga';}
if($apie['sagos'] >= 67 && $apie['sagos'] <= 68){ $name = 'Kid buu saga';}
if($apie['sagos'] >= 69 && $apie['sagos'] <= 78){ $name = 'Black star dragon saga';}
if($apie['sagos'] >= 79 && $apie['sagos'] <= 86){ $name = 'Babibi';}
if($apie['sagos'] >= 87 && $apie['sagos'] <= 102){ $name = 'Super android18';}
if($apie['sagos'] >= 103 && $apie['sagos'] <= 110){ $name = 'Black dragon';}

if($id == ''){

	if($user[sagu_time]-time()> 0){
			top('Sagos');
			echo'<div class="meniuc">
<img src="img/bicons/like.png" />
Tu esi perėjas visas sagas!
<img src="img/bicons/like.png" />
</div>';
		
	
	}
	elseif($apie[sagos] != '110'){ 
top(''.$name.'');	

echo '<div class="meniuc">

<img src="img/sagos/'.$apie[sagos].'.png"></br>
Jūs  <img src="img/bicons/kovines.png" /> <b><font color="red">'.skaicius($kg).'</font></b> VS <b>'.$mob.'</b> 



 <b>'.skaicius($kgg).'</b><img src="img/bicons/kovines.png" />
<br>
</div>
<div class="up"> Vygdai '.$apie[sagos].' iš 111</div>
';

if($kg < $kgg){
$ID = rand(100000,999999);
$_SESSION[no_refresh] = $ID;
echo'<div class="meniuc"> '.$ico.' <s>Pulti  '.$mob.' </s>
</div>';}
if($kg > $kgg){
$ID = rand(100000,999999);
$_SESSION[no_refresh] = $ID;
echo'<div class="meniuc"> '.$ico.' <a href="?id=supisam&ID='.$ID.'">Pulti '.$mob.' </a>
</div>';}}

else{
	top('Įvygdyta');
	echo'<div class="meniuc">Tu perėjai visas sagas!</div>';
		
}
$g_n[] = array('pagrindinis.php?id=', 'Pagrindinis', "misijos.php", "Misijos", "Sagos");
navigacija($g_n);

}
if($id == 'nera'){
	
top(''.$name.'');	
	online('Sagos');
		if($apie[sagos] == 5){
		$j = $apie[jega] +160;
			$gy = $apie[gynyba] +500;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'5' WHERE nick = '$nick'");
	}


else{
	top('Perejai sajanu saga');
	echo'<div class="meniu">Sveikinu, perejai sajanu saga! Gauni: 5 kreditus<br>160jėgos<br>500gynybos!</div>';
		
}
$g_n[] = array('pagrindinis.php?id=', 'Pagrindinis', "misijos.php", "Misijos", "Sagos");
navigacija($g_n);

}


if($id == 'supisam'){
	
top(''.$name.'');	
	online('Sagos');
////// kiek duoda uz sagas
if($apie[sagos] == 5){
		$j = $apie[jega]+300;
			$gy = $apie[gynyba]+900;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'5' WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
	} 

if($apie[sagos] == 10){
		$j = $apie[jega]+600;
			$gy = $apie[gynyba]+1800;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'10', sms_litai=sms_litai+'1' WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
	} 

if($apie[sagos] == 14){
		$j = $apie[jega]+1200;
			$gy = $apie[gynyba]+3600;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'15', sms_litai=sms_litai+'2' WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
	} 

if($apie[sagos] == 19){
		$j = $apie[jega]+2400;
			$gy = $apie[gynyba]+7200;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'20', sms_litai=sms_litai+'4' WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
	} 

if($apie[sagos] == 30){
		$j = $apie[jega]+4800;
			$gy = $apie[gynyba]+14400;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'30', sms_litai=sms_litai+'7' WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
	} 

if($apie[sagos] == 34){
		$j = $apie[jega]+9600;
			$gy = $apie[gynyba]+28800;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'35', sms_litai=sms_litai+'10'  WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
	} 

if($apie[sagos] == 38){
		$j = $apie[jega]+12000;
			$gy = $apie[gynyba]+36000;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'40', sms_litai=sms_litai+'12' WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
	} 
if($apie[sagos] == 40){
		$j = $apie[jega]+15000;
			$gy = $apie[gynyba]+45000;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'45', sms_litai=sms_litai+'15' WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
	} 
if($apie[sagos] == 46){
		$j = $apie[jega]+20000;
			$gy = $apie[gynyba]+60000;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'50', sms_litai=sms_litai+'20' WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
	} 

if($apie[sagos] == 49){
		$j = $apie[jega]+30000;
			$gy = $apie[gynyba]+90000;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'55', sms_litai=sms_litai+'22' WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
	} 

if($apie[sagos] == 54){
		$j = $apie[jega]+35000;
			$gy = $apie[gynyba]+105000;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'60', sms_litai=sms_litai+'25' WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");

	} 
if($apie[sagos] == 57){
		$j = $apie[jega]+40000;
			$gy = $apie[gynyba]+120000;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'70' WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
///duoda 
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Baby Vegeta', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");
		
	


	} 

if($apie[sagos] == 66){
		$j = $apie[jega]+80000;
			$gy = $apie[gynyba]+240000;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'80', sms_litai=sms_litai+'30' WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
	} 

if($apie[sagos] == 78){
		$j = $apie[jega]+150000;
			$gy = $apie[gynyba]+450000;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'110' sms_litai=sms_litai+'35' WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
	} 

	if($apie[sagos] == 68){
		$j = $apie[jega]+100000;
			$gy = $apie[gynyba]+300000;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'100' WHERE nick = '$nick'");
	} 
	
if($apie[sagos] == 86){
		$j = $apie[jega]+250000;
			$gy = $apie[gynyba]+750000;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'150', sms_litai=sms_litai+'50' WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
	} 
if($apie[sagos] == 102){
		$j = $apie[jega]+1000000;
			$gy = $apie[gynyba]+3000000;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'175', sms_litai=sms_litai+'75' WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
	} 
 
		if($apie[sagos] == 109){
		$j = $apie[jega] *1.1;
			$gy = $apie[gynyba] *1.3;
		mysqli_query($conn,"UPDATE zaidejai SET jega='$j', gynyba='$gy', kred=kred+'300', sms_litai=sms_litai+'100' WHERE nick = '$nick'");
		/// gold fryza uz sagas
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Gold Fryzas', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");
		
	


	}

if($kg < $kgg){
	header('Location:sagos.php');
	echo '<div class="meniuc">
<img src="img/bicons/dislike.png" />
Dėja, tu negali įveikti šio priešo!
<img src="img/bicons/dislike.png" />
<br><b>Neturi  pakankamai <img src="img/bicons/kovines.png" /></b> !
</div>';
	
}	
elseif($user[sagu_time]-time()> 0){
		echo '<div class="meniuc">Sagas galėsi vygdyti už <b>'.laikas($user[sagu_time]-time(),1).'</b></div>';
	
}
elseif($apie[sagos] >= 110){
	echo '<div class="meniuc">
<img src="img/bicons/like.png" />
Tu jau esi perėjas visas sagas!
<img src="img/bicons/like.png" />
</div>';
}	


//// sagu atlygiu uzrasas
elseif($apie[sagos] == 5){
	echo '<div class="meniuc">Sekmingai perejai sajanų sagą! <br>Gauni:<br>300 <img src="img/bicons/attack.png" /><br>900 <img src="img/bicons/shield.png" /><br>5 <img src="img/bicons/credit.png" />.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 10){
	echo '<div class="meniuc">Sekmingai perejai namek sagą! <br>Gauni:<br>600 <img src="img/bicons/attack.png" /><br>1800 <img src="img/bicons/shield.png" /><br>10 <img src="img/bicons/credit.png" /><br>1 <img src="img/bicons/euro.png" />!</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}


elseif($apie[sagos] == 14){
	echo '<div class="meniuc">Sekmingai perejai kapitono ginio sagą! <br>Gauni:<br>1200 <img src="img/bicons/attack.png" /><br>3600 <img src="img/bicons/shield.png" /><br>15 <img src="img/bicons/credit.png" />.<br>2 <img src="img/bicons/euro.png" />!</div>';
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 19){
	echo '<div class="meniuc">Sekmingai perejai fryzo sagą! <br>Gauni:<br>2400 <img src="img/bicons/attack.png" /><br>7200 <img src="img/bicons/shield.png" /><br>  20 <img src="img/bicons/credit.png" /><br>4 <img src="img/bicons/euro.png" />!</div>';
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");

}	

elseif($apie[sagos] == 30){
	echo '<div class="meniuc">Sekmingai perejai garlick jaunelio  sagą! <br>Gauni:<br>4800 <img src="img/bicons/attack.png" /><br>14400 <img src="img/bicons/shield.png" /><br>30 <img src="img/bicons/credit.png" /><br> 7 <img src="img/bicons/euro.png" />!</div>';
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 34){
	echo '<div class="meniuc">Sekmingai perejai trankso sagą!  <br>Gauni:<br>9600 <img src="img/bicons/attack.png" /><br>28800 <img src="img/bicons/shield.png" /><br>35 <img src="img/bicons/credit.png" /><br> 9 <img src="img/bicons/euro.png" />!</div>';
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 38){
	echo '<div class="meniuc">Sekmingai perejai androidų sagą!  <br>Gauni:<br>12000 <img src="img/bicons/attack.png" /><br>36000 <img src="img/bicons/shield.png" /><br>40 <img src="img/bicons/credit.png" /><br> 12 <img src="img/bicons/euro.png" />!</div>';
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 40){
	echo '<div class="meniuc">Sekmingai perejai imperfect celo sagą!  <br>Gauni:<br>15000 <img src="img/bicons/attack.png" /><br>45000 <img src="img/bicons/shield.png" /><br>45 <img src="img/bicons/credit.png" /><br> 15 <img src="img/bicons/euro.png" />!</div>';
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 46){
	echo '<div class="meniuc">Sekmingai perejai visas celo sagas sagas!  <br>Gauni:<br>20000 <img src="img/bicons/attack.png" /><br>60000 <img src="img/bicons/shield.png" /><br>50 <img src="img/bicons/credit.png" /><br> 20 <img src="img/bicons/euro.png" />!</div>';
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 49){
	echo '<div class="meniuc">Sekmingai perejai pasaulio čempianato sagą!  <br>Gauni:<br>30000 <img src="img/bicons/attack.png" /><br>90000 <img src="img/bicons/shield.png" /><br>55 <img src="img/bicons/credit.png" /><br> 22 <img src="img/bicons/euro.png" />!</div>';
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 54){
	echo '<div class="meniuc">Sekmingai perejai babidžio sagą!  <br>Gauni:<br>35000 <img src="img/bicons/attack.png" /><br>105000 <img src="img/bicons/shield.png" /><br>65 <img src="img/bicons/credit.png" /><br> 25 <img src="img/bicons/euro.png" />!</div>';
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 57){
	echo '<div class="meniuc">Sekmingai perejai majin buu sagą!<br> Gauni:<br>40000 <img src="img/bicons/attack.png" /><br>120000 <img src="img/bicons/shield.png" /><br>70 <img src="img/bicons/credit.png" /><br><img src="img/bicons/euro.png" /> negavai..<br><b>Bet tapai Baby veikėju!</b></div>';
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 66){
	echo '<div class="meniuc">Sekmingai perejai susijungimo sagą! <br>Gauni:<br>80000 <img src="img/bicons/attack.png" /><br>120000 <img src="img/bicons/shield.png" /><br>80 <img src="img/bicons/credit.png" /><br>30 <img src="img/bicons/euro.png" />!</div>';
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 68){
	echo '<div class="meniuc">Sekmingai perejai kid buu sagą! <br>Gauni:<br>100000 <img src="img/bicons/attack.png" /><br>300000 <img src="img/bicons/shield.png" /><br>100 <img src="img/bicons/credit.png" /><br><img src="img/bicons/euro.png" /> negavai..</div>';
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 78){
	echo '<div class="meniuc">Sekmingai perejai juodujų rutulių sagą! <br>Gauni:<br>150000 <img src="img/bicons/attack.png" /><br>450000 <img src="img/bicons/shield.png" /><br>110 <img src="img/bicons/credit.png" /><br>35 <img src="img/bicons/euro.png" />!</div>';
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 86){
	echo '<div class="meniuc">Sekmingai perejai naująją babidi sagą! <br>Gauni:<br>250000 <img src="img/bicons/attack.png" /><br>750000 <img src="img/bicons/shield.png" /><br>150 <img src="img/bicons/credit.png" /><br>50 <img src="img/bicons/euro.png" />!</div>';
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 102){
	echo '<div class="meniuc">Sekmingai perejai super android 17 sagą! <br>Gauni:<br>1000000 <img src="img/bicons/attack.png" /><br>3000000 <img src="img/bicons/shield.png" /><br>175 <img src="img/bicons/shield.png" /><br>75 <img src="img/bicons/euro.png" />!</div>';
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 109){
	echo '<div class="meniuc">Sekmingai perejai visas sagas!!! <br>Gauni:<br>10% <img src="img/bicons/kovines.png" /><br>300 <img src="img/bicons/credit.png" /><br>100 <img src="img/bicons/euro.png" />!<br><b>Bei tapai Gold Fryza!!</div>';
mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	


elseif($apie[gyvybes] < 1){
	echo '<div class="meniuc">
<img src="img/bicons/dislike.png" />
Neturi gyvybių
<img src="img/bicons/dislike.png" />
</div>';
}
elseif($ID != $_SESSION[no_refresh]){
	
	echo '<div class="meniuc">Perkraudinėti puslapį draudžiama!</div>';
	
	
}
/////sagos be atlygio

elseif($apie[sagos] == 1){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 2){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 3){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 4){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 6){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 7){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 8){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 9){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 11){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 12){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 13){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 14){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 16){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 17){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 18){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 20){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 21){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 22){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 23){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 25){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 26){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 27){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 28){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 24){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 29){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 31){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 32){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 33){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 35){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 36){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 37){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 39){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 41){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 42){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 43){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 44){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 45){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 47){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 48){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 50){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 51){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 52){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 53){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 55){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 56){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	


elseif($apie[sagos] == 58){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	


elseif($apie[sagos] == 59){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 60){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 61){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 62){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	


elseif($apie[sagos] == 63){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 64){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 65){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 67){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	


elseif($apie[sagos] == 69){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 70){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 71){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 72){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 73){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 74){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 75){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 76){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 77){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 79){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 80){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 81){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 82){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	


elseif($apie[sagos] == 83){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 84){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 85){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 87){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 88){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 89){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 90){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 91){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	


elseif($apie[sagos] == 92){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 93){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 94){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 95){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 96){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 97){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 98){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 99){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 100){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 101){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 103){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	

elseif($apie[sagos] == 104){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 105){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 106){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 107){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	
elseif($apie[sagos] == 108){
	echo '<div class="meniuc">Sekmingai įvygdei sagą.</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}	



//kita
else{
	$_SESSION[no_refresh] = rand(100000,999999);
	echo '<div class="meniuc">Ivygdei sėkmingai</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sagos =sagos+'1' WHERE nick = '$nick'");
}

	if($apie[sagos] == 1100){
		$tmas = time()+3600*4800;
	mysqli_query($conn,"UPDATE user SET sagu_time='$tmas' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET sagos='1' WHERE nick='$nick'");
}
	$g_n[] = array('pagrindinis.php?id=', 'Pagrindinis', "misijos.php", "Misijos","sagos.php","Sagos","Sagų vygdymas");
navigacija($g_n);
}
foot();
?>
