<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
$invis = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM inv WHERE nick='$nick'"));
head2();
baneris();
		topbar();
		$suma =  $invis['Microshem'] + $invis['Fusionfail']+$invis['Sayiantail'] +$invis['Stone']+$invis['angelwing']
		+ $invis['Soul'] + $invis['Energystone']
+ $invis['naikinti']+ $invis['tobulas']
 + $invis['Pragarovaisius'] +$invis['Majinsroll'] + $invis['Goldstone'] +$invis['Magicball']+$invis['Powerstone']+$invis['Pupos'];
$suma1 = $invis['Dball1'] +$invis['Dball2'] + $invis['Dball3'] + $invis['Dball4'] + $invis['Dball5'] + $invis['Dball6'] + $invis['Dball7'] + $invis['Jball'] +$invis['Nball'];
$suma2 = $invis['red_key'] + $invis['blue_key'] +$invis['yellow_key']+$invis['black_key']+$invis['green_key']
;
		if($id == ''){
	top('Inventorius');
	echo'<div class="meniuc">
	<img src="img/imgg/inventorius.png"></div>
	<div class="meniu">'.$ico.' <a href="?id=daigtai">Mano turimi daiktai</a></br>
	'.$ico.' <a href="?id=rutuliai">Drakonų rutuliai</a></br>
		
		'.$ico.' <a href="?id=corpitem">Mano <b>Sword</b>/<b>Armor</b>/<b>Amulet</b></a></br>
	'.$ico.' <a href="?id=ginkluote">Uždėti daiktai</a></br>
	</div>';

echo' <div class="up">Išviso daiktų:</div>';
echo'<div class="meniuc">Išviso daiktų: <b>'.$suma.'</b></div>
	';
	
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Inventorius");
	navigacija($g_n);
}
		if($id == 'keyx2s'){
	top('Inventorius');
echo'	<div class="meniu">';		
//mysqli_query($conn,"UPDATE inv SET red_key='0', blue_key='0', black_key='0', green_key='0', yellow_key='0'");
			 if($invis['red_key'] > 0){echo'<img src="img/keys/red_key.gif"> Raudonas raktas: <b>'.$invis['red_key'].'</b></br>';}
			 if($invis['blue_key'] > 0){echo'<img src="img/keys/blue_key.gif"> Mėlinas raktas: <b>'.$invis['blue_key'].'</b></br>';}
	 if($invis['yellow_key'] > 0){echo'<img src="img/keys/yellow_key.gif"> Geltonas raktas: <b>'.$invis['yellow_key'].'</b></br>';}
if($invis['black_key'] > 0){echo'<img src="img/keys/black_key.gif"> Juodas raktas: <b>'.$invis['black_key'].'</b></br>';}
 if($invis['green_key'] > 0){echo'<img src="img/keys/green_key.gif"> Žalias raktas: <b>'.$invis['green_key'].'</b></br>';}
  
   echo'</div>';
    online('Inventoriuje');
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Drakonų rutuliai");
	navigacija($g_n);
		}
if($id == "rutuliai"){
top('Inventorius');
echo'<div class="meniuc">
	<img src="img/imgg/inventorius.png"></div>';
echo'	<div class="up">Paprasti rutuliai</div>
<div class="meniu">';
  
 if($invis['dball'] > 0){echo''.$ico2.' Paprasti Drakono rutuliai: <b>'.$invis['dball'].'</b>';}

echo'</div>';
echo'	<div class="up">Geri rutuliai</div>
<div class="meniu">';

   
  if($invis['Nball'] > 0){echo''.$ico2.' Namek drakono rutuliai: <b>'.$invis['Nball'].'</b></br>';}
 if($invis['jball'] > 0){echo''.$ico2.' Juodieji drakono rutuliai: <b>'.$invis['jball'].'</b></br>';}
    if($invis['Sball'] > 0){echo''.$ico2.' Samungo drakono rutuliai: <b>'.$invis['Sball'].'</b></br>';}
echo'</div>';
echo'	<div class="up">Unikalūs rutuliai</div>
<div class="meniu">';
if($invis['sdball'] > 0){echo''.$ico2.' <font color="red"><b>Super drakono rutuliai:</b></font> <b>'.$invis['sdball'].'</b></br>';}
   echo'</div>';
    online('Inventoriuje');
	
	
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Drakonų rutuliai");
	navigacija($g_n);
}
if($id == "corpitem"){
top('Inventorius');

	echo'<div class="meniuc">
	<img src="img/imgg/inventorius.png"></div>';
echo'	
<div class="up">Swordai</div>
<div class="meniu">';
   if($invis['Trankso_kardas'] > 0){echo''.$ico2.' Trankso kardas: <b>'.$invis['Trankso_kardas'].'</b><a href="?id=use_tranksos&ID=Trankso kardas">[u]</a></br>';}
if($invis['Gold_sword'] > 0){echo''.$ico2.' <b>Gold Sword</b>: <b>'.$invis['Gold_sword'].'</b><a href="?id=use_golds&ID=Gold sword">[u]</a></br>';}
if($invis['Time_sword'] > 0){echo''.$ico2.' <b>Time Sword</b>: <b>'.$invis['Time_sword'].'</b><a href="?id=use_times&ID=Time sword">[u]</a></br>';}
if($invis['Money_sword'] > 0){echo''.$ico2.' <b>Money Sword</b>: <b>'.$invis['Money_sword'].'</b><a href="?id=use_moneys&ID=Money sword">[u]</a></br>';}
if($invis['Super_money_sword'] > 0){echo''.$ico2.' <b>Super Money Sword</b>: <b>'.$invis['Super_money_sword'].'</b><a href="?id=use_supermoneys&ID=Super money sword">[u]</a></br>';}
if($invis['One_tap_sword'] > 0){echo''.$ico2.' <b>Vieno kircio Sword</b>: <b>'.$invis['One_tap_sword'].'</b><a href="?id=use_kircios&ID=Vieno kircio sword">[u]</a></br>';}
if($invis['kg_sword'] > 0){echo''.$ico2.' <b>Galios Sword</b>: <b>'.$invis['kg_sword'].'</b><a href="?id=use_galioss&ID=Galios sword">[u]</a></br>';}
if($invis['Infinity_sword'] > 0){echo''.$ico2.' <b>Infinity Sword</b>: <b>'.$invis['Infinity_sword'].'</b><a href="?id=use_infinitys&ID=Infinity sword">[u]</a></br>';}
if($invis['mirties_sword'] > 0){echo''.$ico2.' <font color="red"><b>Mirties Sword</b></font>: <b>'.$invis['mirties_sword'].'</b><a href="?id=use_mirtiess&ID=Mirties sword">[u]</a></br>';}
if($invis['atgimimo_sword'] > 0){echo''.$ico2.' <font color="red"><b>Atgimimo Sword</b></font>: <b>'.$invis['atgimimo_sword'].'</b><a href="?id=use_atgimimos&ID=Atgimimo sword">[u]</a></br>';}
if($invis['ad16kard'] > 0){echo''.$ico2.' <b>AD 16 Kardas</b>: <b>'.$invis['ad16kard'].'</b><a href="?id=use_ad16kards&ID=AD16 Kardas">[u]</a></br>';}
if($invis['ad17kard'] > 0){echo''.$ico2.' <b>AD 17 Kardas</b>: <b>'.$invis['ad17kard'].'</b><a href="?id=use_ad17kards&ID=AD17 Kardas">[u]</a></br>';}
if($invis['ad18kard'] > 0){echo''.$ico2.' <b>AD 18 Kardas</b>: <b>'.$invis['ad18kard'].'</b><a href="?id=use_ad18kards&ID=AD18 Kardas">[u]</a></br>';}
if($invis['ad19kard'] > 0){echo''.$ico2.' <b>AD 19 Kardas</b>: <b>'.$invis['ad19kard'].'</b><a href="?id=use_ad19kards&ID=AD19 Kardas">[u]</a></br>';}
if($invis['ad20kard'] > 0){echo''.$ico2.' <b>AD 20 Kardas</b>: <b>'.$invis['ad20kard'].'</b><a href="?id=use_ad20kards&ID=AD20 Kardas">[u]</a></br>';}
echo'</div>';
echo'	
<div class="up">Armorai</div>
<div class="meniu">';

   if($invis['Vedzito_sarvai'] > 0){echo''.$ico2.' Vedzito sarvai: <b>'.$invis['Vedzito_sarvai'].'</b><a href="?id=use_vedzitoa&ID=Vedzito sarvai">[u]</a></br>';}
     if($invis['Gold_armor'] > 0){echo''.$ico2.' <b>Gold Armor</b>: <b>'.$invis['Gold_armor'].'</b><a href="?id=use_golda&ID=Gold armor">[u]</a></br>';}
   if($invis['Time_armor'] > 0){echo''.$ico2.' <b>Time Armor</b>: <b>'.$invis['Time_armor'].'</b><a href="?id=use_timea&ID=Time armor">[u]</a></br>';}
   if($invis['Money_armor'] > 0){echo''.$ico2.' <b>Money Armor</b>: <b>'.$invis['Money_armor'].'</b><a href="?id=use_moneya&ID=Money armor">[u]</a></br>';}
 if($invis['Super_money_armor'] > 0){echo''.$ico2.' <b>Super Money Armor</b>: <b>'.$invis['Super_money_armor'].'</b><a href="?id=use_supermoneya&ID=Super money armor">[u]</a></br>';}
 if($invis['One_tap_armor'] > 0){echo''.$ico2.' <b>Vieno Kircio Armor</b>: <b>'.$invis['One_tap_armor'].'</b><a href="?id=use_kircioa&ID=Vieno kircio armor">[u]</a></br>';}
 if($invis['kg_armor'] > 0){echo''.$ico2.' <b>Galios Armor</b>: <b>'.$invis['kg_armor'].'</b><a href="?id=use_galiosa&ID=Galios armor">[u]</a></br>';}
 if($invis['Infinity_armor'] > 0){echo''.$ico2.' <b>Infinity Armor</b>: <b>'.$invis['Infinity_armor'].'</b><a href="?id=use_infinitya&ID=Infinity armor">[u]</a></br>';}
if($invis['mirties_armor'] > 0){echo''.$ico2.' <font color="red"><b>Mirties Armor</b></font>: <b>'.$invis['mirties_armor'].'</b><a href="?id=use_mirtiesa&ID=Mirties armor">[u]</a></br>';}
if($invis['atgimimo_armor'] > 0){echo''.$ico2.' <font color="red"><b>Atgimimo Armor</b></font>: <b>'.$invis['atgimimo_armor'].'</b><a href="?id=use_atgimimoa&ID=Atgimimo armor">[u]</a></br>';}

if($invis['ad16sarv'] > 0){echo''.$ico2.' <b>AD 16 Šarvai</b>: <b>'.$invis['ad16sarv'].'</b><a href="?id=use_ad16sarva&ID=AD16 Sarvai">[u]</a></br>';}
if($invis['ad17sarv'] > 0){echo''.$ico2.' <b>AD 17 Šarvai</b>: <b>'.$invis['ad17sarv'].'</b><a href="?id=use_ad17sarva&ID=AD17 Sarvai">[u]</a></br>';}
if($invis['ad18sarv'] > 0){echo''.$ico2.' <b>AD 18 Šarvai</b>: <b>'.$invis['ad18sarv'].'</b><a href="?id=use_ad18sarva&ID=AD18 Sarvai">[u]</a></br>';}
if($invis['ad19sarv'] > 0){echo''.$ico2.' <b>AD 19 Šarvai</b>: <b>'.$invis['ad19sarv'].'</b><a href="?id=use_ad19sarva&ID=AD19 Sarvai">[u]</a></br>';}
if($invis['ad20sarv'] > 0){echo''.$ico2.' <b>AD 20 Šarvai</b>: <b>'.$invis['ad20sarv'].'</b><a href="?id=use_ad20sarva&ID=AD20 Sarvai">[u]</a></br>';}
echo'</div>';
echo'	
<div class="up">Amuletai</div>
<div class="meniu">';
 if($invis['Super_amulet'] > 0){echo''.$ico2.' <b>Super Amulet</b>: <b>'.$invis['Super_amulet'].'</b><a href="?id=use_superam&ID=Super amulet">[u]</a></br>';}

if($invis['naikinimo_amulet'] > 0){echo''.$ico2.' <b>Naikinimo Amulet</b>: <b>'.$invis['naikinimo_amulet'].'</b><a href="?id=use_naikinimoam&ID=Naikinimo amulet">[u]</a></br>';}
if($invis['mirties_amulet'] > 0){echo''.$ico2.' <font color="red"><b>Mirties Amulet</b></font>: <b>'.$invis['mirties_amulet'].'</b><a href="?id=use_mirtiesm&ID=Mirties amulet">[u]</a></br>';}
if($invis['atgimimo_amulet'] > 0){echo''.$ico2.' <font color="red"><b>Atgimimo Amulet</b></font>: <b>'.$invis['atgimimo_amulet'].'</b><a href="?id=use_atgimimom&ID=Atgimimo amulet">[u]</a></br>';}
if($invis['ad16amulet'] > 0){echo''.$ico2.' <b>AD16 Amulet</b>: <b>'.$invis['ad16amulet'].'</b><a href="?id=use_ad16am&ID=AD16 Amulet">[u]</a></br>';}
if($invis['ad17amulet'] > 0){echo''.$ico2.' <b>AD17 Amulet</b>: <b>'.$invis['ad17amulet'].'</b><a href="?id=use_ad17am&ID=AD17 Amulet">[u]</a></br>';}
if($invis['ad18amulet'] > 0){echo''.$ico2.' <b>AD18 Amulet</b>: <b>'.$invis['ad18amulet'].'</b><a href="?id=use_ad18am&ID=AD18 Amulet">[u]</a></br>';}
if($invis['ad19amulet'] > 0){echo''.$ico2.' <b>AD19 Amulet</b>: <b>'.$invis['ad19amulet'].'</b><a href="?id=use_ad19am&ID=AD19 Amulet">[u]</a></br>';}
if($invis['ad20amulet'] > 0){echo''.$ico2.' <b>AD20 Amulet</b>: <b>'.$invis['ad20amulet'].'</b><a href="?id=use_ad20am&ID=AD20 Amulet">[u]</a></br>';}
   echo'</div>';
    online('Inventoriuje');
	
	
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Drakonų rutuliai");
	navigacija($g_n);
}

//Anti puolimams  x1 24h
if($id == 'use_antipl7'){
	if($ID != 'Anti puolimam 24h'){
			}   if($invis['antipl7'] >0){
		top('Anti puolimam 24h naudojimas');
$kiekanti= 24;
		echo'<div class="meniuc">Sunaudojai sėkmingai -  <b> '.$ID.'</b>  !  <br> <b> '.$kiekanti.'</b>val. būsi atsparus nuo puolimų!</div>';
	
$timxx = time()+60*60*24;      
	
mysqli_query($conn,"UPDATE zaidejai SET antipl='$timxx' WHERE nick='$nick' ");
mysqli_query($conn,"UPDATE inv SET antipl7=antipl7-'1' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Anti puolimam  naudojimas");
	navigacija($g_n);
}

//Anti puolimams  x1 12h
if($id == 'use_antipl6'){
	if($ID != 'Anti puolimam 12h'){
			}   if($invis['antipl6'] >0){
		top('Anti puolimam 12h naudojimas');
$kiekanti= 12;
		echo'<div class="meniuc">Sunaudojai sėkmingai -  <b> '.$ID.'</b>  !  <br> <b> '.$kiekanti.'</b>val. būsi atsparus nuo puolimų!</div>';
	
$timxx = time()+60*60*12;      
	
mysqli_query($conn,"UPDATE zaidejai SET antipl='$timxx' WHERE nick='$nick' ");
mysqli_query($conn,"UPDATE inv SET antipl6=antipl6-'1' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Anti puolimam  naudojimas");
	navigacija($g_n);
}
//Anti puolimams  x1 6h
if($id == 'use_antipl5'){
	if($ID != 'Anti puolimam 6h'){
			}   if($invis['antipl5'] >0){
		top('Anti puolimam 6h naudojimas');
$kiekanti= 6;
		echo'<div class="meniuc">Sunaudojai sėkmingai -  <b> '.$ID.'</b>  !  <br> <b> '.$kiekanti.'</b>val. būsi atsparus nuo puolimų!</div>';
	
$timxx = time()+60*60*6;      
	
mysqli_query($conn,"UPDATE zaidejai SET antipl='$timxx' WHERE nick='$nick' ");
mysqli_query($conn,"UPDATE inv SET antipl5=antipl5-'1' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Anti puolimam  naudojimas");
	navigacija($g_n);
}


//Anti puolimams  x1 3h
if($id == 'use_antipl4'){
	if($ID != 'Anti puolimam 180min'){
			}   if($invis['antipl4'] >0){
		top('Anti puolimam 180min naudojimas');
$kiekanti= 3;
		echo'<div class="meniuc">Sunaudojai sėkmingai -  <b> '.$ID.'</b>  !  <br> <b> '.$kiekanti.'</b>val. būsi atsparus nuo puolimų!</div>';
	
$timxx = time()+10800;      
	
mysqli_query($conn,"UPDATE zaidejai SET antipl='$timxx' WHERE nick='$nick' ");
mysqli_query($conn,"UPDATE inv SET antipl4=antipl4-'1' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Anti puolimam  naudojimas");
	navigacija($g_n);
}
//Anti puolimams  x1 60min
if($id == 'use_antipl3'){
	if($ID != 'Anti puolimam 60min'){
			}   if($invis['antipl3'] >0){
		top('Anti puolimam 60min naudojimas');
$kiekanti= 60;
		echo'<div class="meniuc">Sunaudojai sėkmingai -  <b> '.$ID.'</b>  !  <br> <b> '.$kiekanti.'</b>min būsi atsparus nuo puolimų!</div>';
	
$timxx = time()+3600;      
	
mysqli_query($conn,"UPDATE zaidejai SET antipl='$timxx' WHERE nick='$nick' ");
mysqli_query($conn,"UPDATE inv SET antipl3=antipl3-'1' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Anti puolimam  naudojimas");
	navigacija($g_n);
}
//Anti puolimams  x1 30min
if($id == 'use_antipl2'){
	if($ID != 'Anti puolimam 30min'){
			}   if($invis['antipl2'] >0){
		top('Anti puolimam 30min naudojimas');
$kiekanti= 30;
		echo'<div class="meniuc">Sunaudojai sėkmingai -  <b> '.$ID.'</b>  !  <br> <b> '.$kiekanti.'</b>min būsi atsparus nuo puolimų!</div>';
	
$timxx = time()+1800;      
	
mysqli_query($conn,"UPDATE zaidejai SET antipl='$timxx' WHERE nick='$nick' ");
mysqli_query($conn,"UPDATE inv SET antipl2=antipl2-'1' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Anti puolimam  naudojimas");
	navigacija($g_n);
}
//Anti puolimams  x1 10min
if($id == 'use_antipl1'){
	if($ID != 'Anti puolimam 10min'){
			}   if($invis['antipl'] >0){
		top('Anti puolimam 10min naudojimas');
$kiekanti= 10;
		echo'<div class="meniuc">Sunaudojai sėkmingai -  <b> '.$ID.'</b>  !  <br> <b> '.$kiekanti.'</b>min būsi atsparus nuo puolimų!</div>';
	
$timxx = time()+600;      
	
mysqli_query($conn,"UPDATE zaidejai SET antipl='$timxx' WHERE nick='$nick' ");
mysqli_query($conn,"UPDATE inv SET antipl=antipl-'1' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Anti puolimam  naudojimas");
	navigacija($g_n);
}
//Critical stone naudojimas 2000
if($id == 'use_criticalstone2000'){
	if($ID != 'Critical stone'){
			}   if($invis['critical'] >1999){
		top('Critical stone naudojimas');
$kiekcrit= rand(2000,10000);
		echo'<div class="meniuc">Sunaudojai sėkmingai - 2000 <b> '.$ID.'</b>  !  <br>Gavai <b> '.$kiekcrit.'</b> Kritinio lygio!</div>';
	mysqli_query($conn,"UPDATE zaidejai SET critical=critical+'$kiekcrit' WHERE nick='$nick' ")	;
mysqli_query($conn,"UPDATE inv SET critical=critical-'2000' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - 2000 <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Critical Stone naudojimas");
	navigacija($g_n);
}

//Critical stone naudojimas 1000
if($id == 'use_criticalstone1000'){
	if($ID != 'Critical stone'){
			}   if($invis['critical'] >999){
		top('Critical stone naudojimas');
$kiekcrit= rand(1000,5000);
		echo'<div class="meniuc">Sunaudojai sėkmingai - 1000 <b> '.$ID.'</b>  !  <br>Gavai <b> '.$kiekcrit.'</b> Kritinio lygio!</div>';
	mysqli_query($conn,"UPDATE zaidejai SET critical=critical+'$kiekcrit' WHERE nick='$nick' ")	;
mysqli_query($conn,"UPDATE inv SET critical=critical-'1000' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - 1000 <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Critical Stone naudojimas");
	navigacija($g_n);
}

//Critical stone naudojimas 200
if($id == 'use_criticalstone200'){
	if($ID != 'Critical stone'){
			}   if($invis['critical'] >199){
		top('Critical stone naudojimas');
$kiekcrit= rand(200,1000);
		echo'<div class="meniuc">Sunaudojai sėkmingai - 200 <b> '.$ID.'</b>  !  <br>Gavai <b> '.$kiekcrit.'</b> Kritinio lygio!</div>';
	mysqli_query($conn,"UPDATE zaidejai SET critical=critical+'$kiekcrit' WHERE nick='$nick' ")	;
mysqli_query($conn,"UPDATE inv SET critical=critical-'200' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - 200 <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Critical Stone naudojimas");
	navigacija($g_n);
}


//Critical stone naudojimas 50
if($id == 'use_criticalstone50'){
	if($ID != 'Critical stone'){
			}   if($invis['critical'] >49){
		top('Critical stone naudojimas');
$kiekcrit= rand(50,250);
		echo'<div class="meniuc">Sunaudojai sėkmingai - 50 <b> '.$ID.'</b>  !  <br>Gavai <b> '.$kiekcrit.'</b> Kritinio lygio!</div>';
	mysqli_query($conn,"UPDATE zaidejai SET critical=critical+'$kiekcrit' WHERE nick='$nick' ")	;
mysqli_query($conn,"UPDATE inv SET critical=critical-'50' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - 50 <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Critical Stone naudojimas");
	navigacija($g_n);
}


//Critical stone naudojimas 10
if($id == 'use_criticalstone10'){
	if($ID != 'Critical stone'){
			}   if($invis['critical'] >9){
		top('Critical stone naudojimas');
$kiekcrit= rand(10,50);
		echo'<div class="meniuc">Sunaudojai sėkmingai - 10 <b> '.$ID.'</b>  !  <br>Gavai <b> '.$kiekcrit.'</b> Kritinio lygio!</div>';
	mysqli_query($conn,"UPDATE zaidejai SET critical=critical+'$kiekcrit' WHERE nick='$nick' ")	;
mysqli_query($conn,"UPDATE inv SET critical=critical-'10' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - 10 <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Critical Stone naudojimas");
	navigacija($g_n);
}

//Critical stone naudojimas 1
if($id == 'use_criticalstone1'){
	if($ID != 'Critical stone'){
			}   if($invis['critical'] >0){
		top('Critical stone naudojimas');
$kiekcrit= rand(1,5);
		echo'<div class="meniuc">Sunaudojai sėkmingai - 1 <b> '.$ID.'</b>  !  <br>Gavai <b> '.$kiekcrit.'</b> Kritinio lygio!</div>';
	mysqli_query($conn,"UPDATE zaidejai SET critical=critical+'$kiekcrit' WHERE nick='$nick' ")	;
mysqli_query($conn,"UPDATE inv SET critical=critical-'1' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Critical Stone naudojimas");
	navigacija($g_n);
}
//ginklu
if($id == 'use_tranksos'){
	if($ID != 'Trankso kardas'){
			}   if($invis['Trankso_kardas'] >0){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_golds'){
	if($ID != 'Gold sword'){
			}   if($invis['Gold_sword'] >0){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_times'){
	if($ID != 'Time sword'){
			}   if($invis['Time_sword'] >0){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_moneys'){
	if($ID != 'Money sword'){
			}   if($invis['Money_sword'] >0){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_supermoneys'){
	if($ID != 'Super money sword'){
			}   if($invis['Super_money_sword'] >0){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_kircios'){
	if($ID != 'Vieno kircio sword'){
			}   if($invis['One_tap_sword'] >0){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_galioss'){
	if($ID != 'Galios sword'){
			}   if($invis['kg_sword'] >0){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_infinitys'){
	if($ID != 'Infinity sword'){
			}   if($invis['Infinity_sword'] >0){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_mirtiess'){
	if($ID != 'Mirties sword'){
			}   if($invis['mirties_sword'] >0){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_atgimimos'){
	if($ID != 'Atgimimo sword'){
			}   if($invis['atgimimo_sword'] >0){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
}




if($id == 'use_ad16kards'){
	if($ID != 'AD16 Kardas'){
			}   if($invis['ad16kard'] >0){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
}


if($id == 'use_ad17kards'){
	if($ID != 'AD17 Kardas'){
			}   if($invis['ad17kard'] >0){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_ad18kards'){
	if($ID != 'AD18 Kardas'){
			}   if($invis['ad18kard'] >0){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_ad19kards'){
	if($ID != 'AD19 Kardas'){
			}   if($invis['ad19kard'] >0){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
}

if($id == 'use_ad20kards'){
	if($ID != 'AD20 Kardas'){
			}   if($invis['ad20kard'] >0){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
}

//// armor
if($id == 'use_vedzitoa'){
	if($ID != 'Vedzito sarvai'){
			}   if($invis['Vedzito_sarvai'] >0){
		top('Šarvų užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Šarvų užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_golda'){
	if($ID != 'Gold armor'){
			}   if($invis['Gold_armor'] >0){
		top('Šarvų užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Šarvų užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_timea'){
	if($ID != 'Time armor'){
			}   if($invis['Time_armor'] >0){
		top('Šarvų užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Šarvų užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_moneya'){
	if($ID != 'Money armor'){
			}   if($invis['Money_armor'] >0){
		top('Šarvų užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Šarvų užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_supermoneya'){
	if($ID != 'Super money armor'){
			}   if($invis['Super_money_armor'] >0){
		top('Šarvų užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Šarvų užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_kircioa'){
	if($ID != 'Vieno kircio armor'){
			}   if($invis['One_tap_armor'] >0){
		top('Šarvų užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Šarvų užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_galiosa'){
	if($ID != 'Galios armor'){
			}   if($invis['kg_armor'] >0){
		top('Šarvų užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Šarvų užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_infinitya'){
	if($ID != 'Infinity armor'){
			}   if($invis['Infinity_armor'] >0){
		top('Šarvų užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Šarvų užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_mirtiesa'){
	if($ID != 'Mirties armor'){
			}   if($invis['mirties_armor'] >0){
		top('Šarvų užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Šarvų užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_atgimimoa'){
	if($ID != 'Atgimimo armor'){
			}   if($invis['atgimimo_armor'] >0){
		top('Šarvų užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Šarvų užsidėjimas");
	navigacija($g_n);
}



if($id == 'use_ad16sarva'){
	if($ID != 'AD16 Sarvai'){
			}   if($invis['ad16sarv'] >0){
		top('Šarvų užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Šarvų užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_ad17sarva'){
	if($ID != 'AD17 Sarvai'){
			}   if($invis['ad17sarv'] >0){
		top('Šarvų užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Šarvų užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_ad18sarva'){
	if($ID != 'AD18 Sarvai'){
			}   if($invis['ad18sarv'] >0){
		top('Šarvų užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Šarvų užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_ad19sarva'){
	if($ID != 'AD19 Sarvai'){
			}   if($invis['ad19sarv'] >0){
		top('Šarvų užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Šarvų užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_ad20sarva'){
	if($ID != 'AD20 Sarvai'){
			}   if($invis['ad20sarv'] >0){
		top('Šarvų užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Šarvų užsidėjimas");
	navigacija($g_n);
}


// amuletai
if($id == 'use_superam'){
	if($ID != 'Super amulet'){
			}   if($invis['Super_amulet'] >0){
		top('Amuleto užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET amuletas ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Amuleto užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_naikinimoam'){
	if($ID != 'Naikinimo amulet'){
			}   if($invis['naikinimo_amulet'] >0){
		top('Amuleto užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET amuletas ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Amuleto užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_mirtiesm'){
	if($ID != 'Mirties amulet'){
			}   if($invis['mirties_amulet'] >0){
		top('Amuleto užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET amuletas ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Amuleto užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_atgimimom'){
	if($ID != 'Atgimimo amulet'){
			}   if($invis['atgimimo_amulet'] >0){
		top('Amuleto užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET amuletas ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Amuleto užsidėjimas");
	navigacija($g_n);
}

if($id == 'use_ad16am'){
	if($ID != 'AD16 Amulet'){
			}   if($invis['ad16amulet'] >0){
		top('Amuleto užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET amuletas ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Amuleto užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_ad17am'){
	if($ID != 'AD17 Amulet'){
			}   if($invis['ad17amulet'] >0){
		top('Amuleto užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET amuletas ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Amuleto užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_ad18am'){
	if($ID != 'AD18 Amulet'){
			}   if($invis['ad18amulet'] >0){
		top('Amuleto užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET amuletas ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Amuleto užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_ad19am'){
	if($ID != 'AD19 Amulet'){
			}   if($invis['ad19amulet'] >0){
		top('Amuleto užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET amuletas ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Amuleto užsidėjimas");
	navigacija($g_n);
}
if($id == 'use_ad20am'){
	if($ID != 'AD20 Amulet'){
			}   if($invis['ad20amulet'] >0){
		top('Amuleto užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai - <b> '.$ID.'</b>  !</div>';
	mysqli_query($conn,"UPDATE zaidejai SET amuletas ='$ID' WHERE nick='$nick' ")	;}
else{
top('Klaida');
			echo'<div class="meniuc">Tu neturi - <b> '.$ID.'</b>  !</div>';}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Amuleto užsidėjimas");
	navigacija($g_n);
}

if($id == "ginkluote"){
top('Daigtai ant kūno');
echo'	<div class="meniu">
'.$ico2.' Kardas:  <b>'.$apie['sword'].' </b>  <a href="?id=nuimus">[<b>X</b>]</a></br>
'.$ico2.' Šarvai:  <b>'.$apie['armor'].' </b> <a href="?id=nuimua">[<b>X</b>]</a><br>
'.$ico2.' Amuletas:  <b>'.$apie['amuletas'].' </b> <a href="?id=nuimuam">[<b>X</b>]</a>
';
  
  
   echo'</div>';
    online('Inventoriuje');
	
	
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Daigtų užsidėjimas");
	navigacija($g_n);
}



	if($id == "daigtai"){
top('Inventorius');


    online('Inventoriuje');
   
echo'<div class="meniuc"><img src="img/imgg/inventorius.png"></div>';
  echo'<div class="up">Misijų daiktai:</div>';
echo' <div class="meniu">';

 if($invis['Microshem'] > 0){echo''.$ico2.' Microshem: <b>'.$invis['Microshem'].'</b></br>';}
 if($invis['Fusionfail'] > 0){echo''.$ico2.' Fusion fail: <b>'.$invis['Fusionfail'].'</b></br>';}
 if($invis['Sayiantail'] > 0){echo''.$ico2.' Sayian tail: <b>'.$invis['Sayiantail'].'</b></br>';}
 if($invis['Stone'] > 0){echo''.$ico2.' Stone: <b>'.$invis['Stone'].'</b></br>';}
 if($invis['Soul'] > 0){echo''.$ico2.' Soul: <b>'.$invis['Soul'].'</b></br>';}
 if($invis['Energystone'] > 0){echo''.$ico2.' Energy stone: <b>'.$invis['Energystone'].'</b></br>';}
 if($invis['Pragarovaisius'] > 0){echo''.$ico2.' Pragaro vaisius: <b>'.$invis['Pragarovaisius'].'</b></br>';}
 if($invis['Majinsroll'] > 0){echo''.$ico2.' Majin scroll: <b>'.$invis['Majinsroll'].'</b></br>';}
 if($invis['Goldstone'] > 0){echo''.$ico2.' Gold stone: <b>'.$invis['Goldstone'].'</b></br>';}
 if($invis['Magicball'] > 0){echo''.$ico2.' Magic ball: <b>'.$invis['Magicball'].'</b></br>';}
 if($invis['Powerstone'] > 0){echo''.$ico2.' Power stone: <b>'.$invis['Powerstone'].'</b></br>';}

		 if($invis['Malkos'] > 0){echo''.$ico2.' Malkos: <b>'.$invis['Malkos'].'</b></br>';}
 if($invis['Zuvis'] > 0){echo''.$ico2.' Zuvis: <b>'.$invis['Zuvis'].'</b></br>';}  	  
 echo' </div>';
  echo'<div class="up">Pagaminti daiktai:</div>';
echo' <div class="meniu">';
/*
	  if($invis['viplvl'] > 0){echo''.$ico2.' VIP: <b>'.$invis['viplvl'].'</b></br>';}  	  
*/
		 if($invis['radaras'] > 0){echo''.$ico2.' Radaras: <b>'.$invis['radaras'].'</b></br>';}  	  
if($invis['laivas'] > 0){echo''.$ico2.' Kosminis Laivas: <b>'.$invis['laivas'].'</b></br>';}  	  
 if($invis['ki'] > 0){echo''.$ico2.' Kovinės galios matuoklis: <b>'.$invis['ki'].'</b></br>';} 
echo'</div>';
  echo'<div class="up">Unikalūs daiktai:</div>';
echo' <div class="meniu">'; 	  
   

	 if($invis['Pupos'] > 0){echo''.$ico2.' Stebuklingos pupos: <b>'.$invis['Pupos'].'</b><a href="?id=eat">[V]</a></br>';} 	  
        if($invis['angelwing'] > 0){echo''.$ico2.' <font color="red">Angelo Sparnai:</font> <b>'.$invis['angelwing'].'</b></br>';}
      if($invis['naikinti'] > 0){echo''.$ico2.' <font color="red">Naikinimo galia:</font> <b>'.$invis['naikinti'].'</b></br>';}
      if($invis['tobulas'] > 0){echo''.$ico2.' <font color="red">Kario tobulėjimas:</font> <b>'.$invis['tobulas'].'</b></br>';}
 if($invis['mirties_item'] > 0){echo''.$ico2.' <font color="red">Mirties Item:</font> <b>'.$invis['mirties_item'].'</b></br>';}
if($invis['atgimimo_item'] > 0){echo''.$ico2.' <font color="red">Atgimimo Item:</font> <b>'.$invis['atgimimo_item'].'</b></br>';}

  if($invis['unikalus'] > 0){echo''.$ico2.' <font color="green">Pasiekimų taškai:</font> <b>'.$invis['unikalus'].'</b></br>';}
  if($invis['Super_amulet_item'] > 0){echo''.$ico2.' <font color="red">Super Amulet Item:</font> <b>'.$invis['Super_amulet_item'].'</b></br>';}
if($invis['naikinimo_amulet_item'] > 0){echo''.$ico2.' <font color="red">Naikinimo Amulet Item:</font> <b>'.$invis['naikinimo_amulet_item'].'</b></br>';}
if($invis['critical'] > 0){echo''.$ico2.' <font color="blue">Critical Stone:</font> <b>'.$invis['critical'].'</b><small><a href="?id=use_criticalstone1&ID=Critical stone"><b> [x1]</b></a><a href="?id=use_criticalstone10&ID=Critical stone"> <b>[x10]</b></a><a href="?id=use_criticalstone50&ID=Critical stone"> <b>[x50]</b></a><a href="?id=use_criticalstone200&ID=Critical stone"> <b>[x200]</b></a>
<a href="?id=use_criticalstone1000&ID=Critical stone"> <b>[x1000]</b></a>
<a href="?id=use_criticalstone2000&ID=Critical stone"> <b>[x2000]</b></a>

</small>

</br>';}
if($invis['ad16'] > 0){echo''.$ico2.' <font color="blue"><b>AD16 Item</b>:</font> <b>'.$invis['ad16'].'</b></br>';}
if($invis['ad17'] > 0){echo''.$ico2.' <font color="blue"><b>AD17 Item</b>:</font> <b>'.$invis['ad17'].'</b></br>';}
if($invis['ad18'] > 0){echo''.$ico2.' <font color="blue"><b>AD18 Item</b>:</font> <b>'.$invis['ad18'].'</b></br>';}
if($invis['ad19'] > 0){echo''.$ico2.' <font color="blue"><b>AD19 Item</b>:</font> <b>'.$invis['ad19'].'</b></br>';}
if($invis['ad20'] > 0){echo''.$ico2.' <font color="blue"><b>AD20 Item</b>:</font> <b>'.$invis['ad20'].'</b></br>';}
if($invis['antipotion'] > 0){echo''.$ico2.' <font color="black"><b><img src="img/boxes/anti.png" />Anti Potion</b>:</font> <b>'.$invis['antipotion'].'</b></br>';}
if($invis['antipl'] > 0){echo''.$ico2.' <font color="black">Anti Puolimam  <img src="img/boxes/anti2.png" />10min:</font> <b>'.$invis['antipl'].'</b><a href="?id=use_antipl1&ID=Anti puolimam 10min"><b> [U]</b></a></br>';}
if($invis['antipl2'] > 0){echo''.$ico2.' <font color="black">Anti Puolimam <img src="img/boxes/anti2.png" />30min:</font> <b>'.$invis['antipl2'].'</b><a href="?id=use_antipl2&ID=Anti puolimam 30min"><b> [U]</b></a></br>';}
if($invis['antipl3'] > 0){echo''.$ico2.' <font color="black">Anti Puolimam <img src="img/boxes/anti2.png" />60min:</font> <b>'.$invis['antipl3'].'</b><a href="?id=use_antipl3&ID=Anti puolimam 60min"><b> [U]</b></a></br>';}
if($invis['antipl4'] > 0){echo''.$ico2.' <font color="black">Anti Puolimam <img src="img/boxes/anti2.png" />3 valandom:</font> <b>'.$invis['antipl4'].'</b><a href="?id=use_antipl4&ID=Anti puolimam 180min"><b> [U]</b></a></br>';}
if($invis['antipl5'] > 0){echo''.$ico2.' <font color="black">Anti Puolimam <img src="img/boxes/anti2.png" />6 valandom:</font> <b>'.$invis['antipl5'].'</b><a href="?id=use_antipl5&ID=Anti puolimam 6h"><b> [U]</b></a></br>';}
if($invis['antipl6'] > 0){echo''.$ico2.' <font color="black">Anti Puolimam <img src="img/boxes/anti2.png" />12 valandom:</font> <b>'.$invis['antipl6'].'</b><a href="?id=use_antipl6&ID=Anti puolimam 12h"><b> [U]</b></a></br>';}
if($invis['antipl7'] > 0){echo''.$ico2.' <font color="black">Anti Puolimam <img src="img/boxes/anti2.png" />24 valandom:</font> <b>'.$invis['antipl7'].'</b><a href="?id=use_antipl7&ID=Anti puolimam 24h"><b> [U]</b></a></br>';}
echo'</div>';
echo'<div class="up">Išviso daiktų:</div>';
 echo'<div class="meniuc">Viso daiktų: <b>'.$suma.'</b></div>';
		  	  
		  	  
		  	  
	
		  	  
	  
	  
	  
      
	  
	  
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Paprasti daigtai");
	navigacija($g_n);

}





elseif($id == "eat"){
   top('Pupu valgymas');
   if(($invis['Pupos']) < 1){
    		
			echo '<div class="meniuc">Neturi pupu!</div>';
    	
    }else{
       
        echo '<div class="meniuc">Suvalgei stebuklingą pupą ir tavo gyvybės vėl pilnos!</div>';
        mysqli_query($conn,"UPDATE zaidejai SET gyvybes='$apie[max_gyvybes]' WHERE nick='$nick'");
        mysqli_query($conn,"UPDATE inv SET pupos=pupos-'1' WHERE nick='$nick'");
    }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php", "Inventorius", "Pupu valgymas");
	navigacija($g_n);
}

elseif($id == "nuimus"){
   top('Ginklo nuėmimas');
   
if($apie['sword'] == ""){
    		
			echo '<div class="meniuc">Neuždėtas</div>';
    	
    }
else{
       
        echo '<div class="meniuc">Nusiemei <b> Kardą</b> sėkmingai!</div>';
        
        mysqli_query($conn,"UPDATE zaidejai SET sword='Neuzdetas' WHERE nick='$nick'");
    }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php", "Inventorius", "Ginklo nuėmimas");
	navigacija($g_n);
}
elseif($id == "nuimua"){
   top('Šarvų nuėmimas');
   
if($apie['armor'] == ""){
    		
			echo '<div class="meniuc">Neuždėtas</div>';
    	
    }
else{
       
        echo '<div class="meniuc">Nusiemei <b>Šarvus</b> sėkmingai!</div>';
        
        mysqli_query($conn,"UPDATE zaidejai SET armor='Neuzdetas' WHERE nick='$nick'");
    }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php", "Inventorius", "Šarvo nuėmimas");
	navigacija($g_n);
}
elseif($id == "nuimuam"){
   top('Amuleto nuėmimas');
   
if($apie['amuletas'] == ""){
    		
			echo '<div class="meniuc">Neuždėtas</div>';
    	
    }
else{
       
        echo '<div class="meniuc">Nusiemei <b> Amuletą</b> sėkmingai!</div>';
        
        mysqli_query($conn,"UPDATE zaidejai SET amuletas='Neuzdetas' WHERE nick='$nick'");
    }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php", "Inventorius", "Amuleto nuėmimas");
	navigacija($g_n);
}


 foot();
?>

