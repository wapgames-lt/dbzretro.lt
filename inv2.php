<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
$invis = mysql_fetch_assoc(mysql_query("SELECT * FROM inv WHERE nick='$nick'"));
head2();
echo'
<div class="up">
<img src="img/baneriai/botasm.png" /></div>';
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
	'.$ico.' <a href="?id=ball">Drakonų rutuliai</a></br>
		
		'.$ico.' <a href="?id=guns">Mano <b>Sword</b>/<b>Armor</b>/<b>Amulet</b></a></br>
	'.$ico.' <a href="?id=ginkluote">Uždėti daiktai</a></br>
	</div>';

echo' <div class="up">Išviso daiktų:</div>';
echo'<div class="meniuc">Išviso daiktų: <b>'.$suma.'</b></div>
	';
	
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Inventorius");
	navigacija($g_n);
}
		if($id == keys){
	top('Inventorius');
echo'	<div class="meniu">';		
//mysql_query("UPDATE inv SET red_key='0', blue_key='0', black_key='0', green_key='0', yellow_key='0'");
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
if($id == "balls"){
top('Inventorius');
echo'<div class="meniuc">
	<img src="img/imgg/inventorius.png"></div>';
echo'	<div class="up">Paprasti rutuliai<div>
<div class="meniu">';
  
 if($invis['dball'] > 0){echo''.$ico2.' Drakono rutulys: <b>'.$invis['dball'].'</b></br>';}

echo'</div>';
echo'	<div class="up">Geri rutuliai<div>
<div class="meniu">';

   
  if($invis['Nball'] > 0){echo''.$ico2.' Namek drakono rutuliai: <b>'.$invis['Nball'].'</b></br>';}
 if($invis['Jball'] > 0){echo''.$ico2.' Juodieji drakono rutuliai: <b>'.$invis['Jball'].'</b></br>';}
    if($invis['Sball'] > 0){echo''.$ico2.' Samungo drakono rutuliai: <b>'.$invis['Sball'].'</b></br>';}
echo'</div>';
echo'	<div class="up">Unikalūs rutuliai<div>
<div class="meniu">';
if($invis['sdball'] > 0){echo''.$ico2.' Super drakono rutulys: <b>'.$invis['sdball'].'</b></br>';}
   echo'</div>';
    online('Inventoriuje');
	
	
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Drakonų rutuliai");
	navigacija($g_n);
}
if($id == "guns"){
top('Inventorius');
echo'<div class="meniuc"><img src="img/imgg/inventorius.png"></div>';
echo' <div class="up">Swordai</div>	

<div class="meniu">';
   if($invis['Trankso_kardas'] > 0){echo''.$ico2.' Trankso kardas: <b>'.$invis['Trankso_kardas'].'</b>';
if($apie['Trankso_kardas2'] ==  '+'){echo'<s>[u]</s></a>';}
else{echo'<a href="?id=use_sword&ID=Trankso kardas"><b>[u]</b></a>';}
echo'<br>';}
if($invis['Gold_sword'] > 0){echo''.$ico2.' Gold Sword: <b>'.$invis['Gold_sword'].'</b>';
if($apie['Gold_sword2'] ==  '+'){echo'<s>[u]</s></a>';}
else{echo'<a href="?id=use_sword&ID=Gold sword"><b>[u]</b></a>';}
echo'<br>';}

 if($invis['Time_sword'] > 0){echo''.$ico2.' Time Sword: <b>'.$invis['Time_sword'].'</b>';
if($apie['Time_sword2'] ==  '+'){echo'<s>[u]</s></a>';}
else{echo'<a href="?id=use_sword&ID=Time sword"><b>[u]</b></a>';}
echo'<br>';}
/*
if($invis['Money_sword'] > 0){echo''.$ico2.' Money Sword: <b>'.$invis['Money_sword'].'</b>';
if($apie['swordu'] ==  'Uzdetas'){echo'<s>[u]</s></a>';}
if($apie['swordu'] ==  'Neuzdetas'){echo'<a href="?id=use_sword&ID=Money sword"><b>[u]</b></a>';}
echo'<br>';}
  if($invis['Super_money_sword'] > 0){echo''.$ico2.' Super Money Sword: <b>'.$invis['Super_money_sword'].'</b>';
if($apie['swordu'] ==  'Uzdetas'){echo'<s>[u]</s></a>';}
if($apie['swordu'] ==  'Neuzdetas'){echo'<a href="?id=use_sword&ID=Super money sword"><b>[u]</b></a>';}
echo'<br>';}
  if($invis['One_tap_sword'] > 0){echo''.$ico2.' Vieno Kircio Sword: <b>'.$invis['One_tap_sword'].'</b>';
if($apie['swordu'] ==  'Uzdetas'){echo'<s>[u]</s></a>';}
if($apie['swordu'] ==  'Neuzdetas'){echo'<a href="?id=use_sword&ID=Vieno kircio kardas"><b>[u]</b></a>';}
echo'<br>';}
if($invis['kg_sword'] > 0){echo''.$ico2.' Galios Sword: <b>'.$invis['kg_sword'].'</b>';
if($apie['swordu'] ==  'Uzdetas'){echo'<s>[u]</s></a>';}
if($apie['swordu'] ==  'Neuzdetas'){echo'<a href="?id=use_sword&ID=Galios kardas"><b>[u]</b></a>';}
echo'<br>';}
if($invis['Infinity_sword'] > 0){echo''.$ico2.' Infinity Sword: <b>'.$invis['Infinity_sword'].'</b>';
if($apie['swordu'] ==  'Uzdetas'){echo'<s>[u]</s></a>';}
if($apie['swordu'] ==  'Neuzdetas'){echo'<a href="?id=use_sword&ID=Infinity sword"><b>[u]</b></a>';}}
*/
echo'</div>';
echo' <div class="up">Armorai</div>	
<div class="meniu">';
  if($invis['Vedzito_sarvai'] > 0){echo''.$ico2.' Vedzito sarvai: <b>'.$invis['Vedzito_sarvai'].'</b>';
if($apie['armoru'] ==  'Uzdetas'){echo'<s>[u]</s></a>';}
if($apie['armoru'] ==  'Neuzdetas'){echo'<a href="?id=use_armor&ID=Vedzito sarvai"><b>[u]</b></a>';}
echo'<br>';}

  if($invis['Gold_armor'] > 0){echo''.$ico2.' Gold Armor: <b>'.$invis['Gold_armor'].'</b>';
if($apie['armoru'] ==  'Uzdetas'){echo'<s>[u]</s></a>';}
if($apie['armoru'] ==  'Neuzdetas'){echo'<a href="?id=use_armor&ID=Gold armor"><b>[u]</b></a>';}
echo'<br>';}
    if($invis['Time_armor'] > 0){echo''.$ico2.' Time Armor: <b>'.$invis['Time_armor'].'</b>';
if($apie['armoru'] ==  'Uzdetas'){echo'<s>[u]</s></a>';}
if($apie['armoru'] ==  'Neuzdetas'){echo'<a href="?id=use_armor&ID=Time armor"><b>[u]</b></a>';}
echo'<br>';}

  if($invis['Money_armor'] > 0){echo''.$ico2.' Money Armor: <b>'.$invis['Money_armor'].'</b>';
if($apie['armoru'] ==  'Uzdetas'){echo'<s>[u]</s></a>';}
if($apie['armoru'] ==  'Neuzdetas'){echo'<a href="?id=use_armor&ID=Money armor"><b>[u]</b></a>';}
echo'<br>';}

  if($invis['Super_money_armor'] > 0){echo''.$ico2.' Super Money Armor: <b>'.$invis['Super_money_armor'].'</b>';
if($apie['armoru'] ==  'Uzdetas'){echo'<s>[u]</s></a>';}
if($apie['armoru'] ==  'Neuzdetas'){echo'<a href="?id=use_armor&ID=Super money armor"><b>[u]</b></a>';}
echo'<br>';}
  if($invis['kg_armor'] > 0){echo''.$ico2.' Vieno Kircio Armor: <b>'.$invis['kg_armor'].'</b>';
if($apie['armoru'] ==  'Uzdetas'){echo'<s>[u]</s></a>';}
if($apie['armoru'] ==  'Neuzdetas'){echo'<a href="?id=use_armor&ID=Vieno kircio armor"><b>[u]</b></a>';}
echo'<br>';}
  if($invis['Infinity_armor'] > 0){echo''.$ico2.' Infinity Armor: <b>'.$invis['Infinity_armor'].'</b>';
if($apie['armoru'] ==  'Uzdetas'){echo'<s>[u]</s></a>';}
if($apie['armoru'] ==  'Neuzdetas'){echo'<a href="?id=use_armor&ID=Infinity armor"><b>[u]</b></a>';}}

echo'</div>';
echo' <div class="up">Amuletai</div>	
<div class="meniu">';
  if($invis['Super_amulet'] > 0){echo''.$ico2.' Super Amulet: <b>'.$invis['Super_amulet'].'</b>';
if($apie['amuletasu'] ==  'Uzdetas'){echo'<s>[u]</s></a>';}
if($apie['amuletasu'] ==  'Neuzdetas'){echo'<a href="?id=use_amulet&ID=Super amulet"><b>[u]</b></a>';}
echo'<br>';}
   echo'</div>';
    online('Inventoriuje');
	
	
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Drakonų rutuliai");
	navigacija($g_n);
}
if($id == "ginkluote"){
top('Uždėti daiktai');
echo'	<div class="meniu">';
// sword
echo''.$ico2.' Kardas: <b>'.$apie[sword].'</b>';
if($apie['sword'] ==  'Trankso kardas'){echo' <a href="?id=nuimti_sword&ID=Nuimu Trankso kardas">[X]</a>';}

if($apie['sword'] ==  'Time sword'){echo' <a href="?id=nuimti_sword&ID=Nuimu Time sword">[X]</a>';}
if($apie['sword'] ==  'Money sword'){echo' <a href="?id=nuimti_sword&ID=Nuimu Money sword">[X]</a>';}
if($apie['sword'] ==  'Super money sword'){echo' <a href="?id=nuimti_sword&ID=Nuimu Super money sword">[X]</a>';}
if($apie['sword'] ==  'Vieno kircio kardas'){echo' <a href="?id=nuimti_sword&ID=Nuimu Vieno kircio sword">[X]</a>';}
if($apie['sword'] ==  'Galios kardas'){echo' <a href="?id=nuimti_sword&ID=Nuimu Galios sword">[X]</a>';}
if($apie['sword'] ==  'Infinity sword'){echo' <a href="?id=nuimti_sword&ID=Nuimu Infinity sword">[X]</a>';}
if($apie['sword'] ==  'Gold sword'){echo' <a href="?id=nuimti_sword&ID=Nuimu Gold sword">[X]</a>';}

echo'</br>';
// armor
echo''.$ico2.' Šarvai: <b>'.$apie[armor].'</b>';  

   if($apie['armor'] ==  'Vedzito sarvai'){echo' <a href="?id=nuimti_armor&ID=Nuimu Vedzito sarvai">[X]</a> ';}
  if($apie['armor'] ==  'Gold armor'){echo' <a href="?id=nuimti_armor&ID=Nuimu Gold armor">[X]</a> ';}
 if($apie['armor'] ==  'Time armor'){echo' <a href="?id=nuimti_armor&ID=Nuimu Time armor">[X]</a> ';}
 if($apie['armor'] ==  'Money armor'){echo' <a href="?id=nuimti_armor&ID=Nuimu Money armor">[X]</a> ';}
 if($apie['armor'] ==  'Super money armor'){echo' <a href="?id=nuimti_armor&ID=Nuimu Super money armor">[X]</a> ';}
 if($apie['armor'] ==  'Vieno kircio armor'){echo' <a href="?id=nuimti_armor&ID=Nuimu Vieno kircio armor">[X]</a> ';}
 if($apie['armor'] ==  'Infinity armor'){echo' <a href="?id=nuimti_armor&ID=Nuimu Infinity armor">[X]</a> ';}
 if($apie['armor'] ==  'Galios armor'){echo' <a href="?id=nuimti_armor&ID=Nuimu Galios armor">[X]</a> ';}
echo'<br>';
// amulet
echo'
'.$ico2.' Amuletas: <b>'.$apie[amuletas].'</b> ';

 if($apie['amuletas'] ==  'Super amulet'){echo'<a href="?id=nuimti_amulet&ID=Nuimu Super amulet">[X]</a>';}
  
  
   echo'</div>';
    online('Inventoriuje');
	
	
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Drakonų rutuliai");
	navigacija($g_n);
}


//// nusiima daiktai amulet
if($id == 'nuimti_amulet'){
	if($ID != 'Nuimu Super amulet'){
		header('Location:inv.php');
	}
if($apie['amuletas'] ==  'Neuzdeta'){
echo'<div class="meniuc">NEUZDETA!</div>';}
else{
		top('Amuleto nuėmimas');
		echo'<div class="meniuc">Nusiemei <b>Super Amulet</b> sėkmingai!</div>';
	mysql_query("UPDATE zaidejai SET amuletas ='Neuzdeta' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Super_amulet=Super_amulet+'1' WHERE nick='$nick'");
}
mysql_query("UPDATE zaidejai SET amuletasu ='Neuzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Amulet nuėmimas");
	navigacija($g_n);
	
	
}
//// nusiima daiktai sword
if($id == 'nuimti_sword'){
	if($ID != 'Nuimu Trankso kardas'){
	
	}

if($apie['Trankso_kardas2'] ==  '+'){
		top('Ginklo nuėmimas');
		echo'<div class="meniuc">Nusiemei <b>Trankso karda</b> sėkmingai!</div>';
	
mysql_query("UPDATE inv SET Trankso_kardas=Trankso_kardas+'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET Trankso_kardas2='-' WHERE nick='$nick'");

	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo nuėmimas");
	navigacija($g_n);
	}
	
}

if($id == 'nuimti_sword'){
	if($ID != 'Nuimu Time sword'){
		header('Location:inv.php');
	}
if($apie['sword'] ==  'Neuzdeta'){
echo'<div class="up">Klaida</div>';
echo'<div class="meniuc">NEUZDETA!</div>';}	

else{
		top('Ginklo nuėmimas');
		echo'<div class="meniuc">Nusiemei <b>Time Sword</b> sėkmingai!</div>';
	mysql_query("UPDATE zaidejai SET sword ='Neuzdeta' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Time_sword=Time_sword+'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET swordu ='Neuzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo nuėmimas");
	navigacija($g_n);
	}
	
}

if($id == 'nuimti_sword'){
	if($ID != 'Nuimu Gold sword'){
		header('Location:inv.php');
	}
if($invis['Gold_sword'] >0){
		top('Ginklo nuėmimas');
		echo'<div class="meniuc">Nusiemei <b>Gold Sword</b> sėkmingai!</div>';
	mysql_query("UPDATE zaidejai SET sword ='Neuzdeta' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Gold_sword=Gold_sword+'1' WHERE nick='$nick'");

	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo nuėmimas");
	navigacija($g_n);
	}
	
}
if($id == 'nuimti_sword'){
	if($ID != 'Nuimu Money sword'){
		header('Location:inv.php');
	}

if($apie['sword'] ==  'Neuzdeta'){
echo'<div class="up">Klaida</div>';
echo'<div class="meniuc">NEUZDETA!</div>';}	
else{
		top('Ginklo nuėmimas');
		echo'<div class="meniuc">Nusiemei <b>Money Sword</b> sėkmingai!</div>';
	mysql_query("UPDATE zaidejai SET sword ='Neuzdeta' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Money_sword=Money_sword+'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET swordu ='Neuzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo nuėmimas");
	navigacija($g_n);
	}
	
}
if($id == 'nuimti_sword'){
	if($ID != 'Nuimu Super money sword'){
		header('Location:inv.php');
	}
if($apie['sword'] ==  'Neuzdeta'){
echo'<div class="up">Klaida</div>';
echo'<div class="meniuc">NEUZDETA!</div>';}	

else{
		top('Ginklo nuėmimas');
		echo'<div class="meniuc">Nusiemei <b>Super Money Sword</b> sėkmingai!</div>';
	mysql_query("UPDATE zaidejai SET sword ='Neuzdeta' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Super_money_sword=Super_money_sword+'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET swordu ='Neuzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo nuėmimas");
	navigacija($g_n);
	}
	
}
if($id == 'nuimti_sword'){
	if($ID != 'Nuimu Vieno kircio sword'){
		header('Location:inv.php');
	}
if($apie['sword'] ==  'Neuzdeta'){
echo'<div class="up">Klaida</div>';
echo'<div class="meniuc">NEUZDETA!</div>';}	

else{
		top('Ginklo nuėmimas');
		echo'<div class="meniuc">Nusiemei <b>Vieno kircio Sword</b> sėkmingai!</div>';
	mysql_query("UPDATE zaidejai SET sword ='Neuzdeta' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET One_tap_sword=One_tap_sword+'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET swordu ='Neuzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo nuėmimas");
	navigacija($g_n);
	}
	
}
if($id == 'nuimti_sword'){
	if($ID != 'Nuimu Galios sword'){
		header('Location:inv.php');
	}

if($apie['sword'] ==  'Neuzdeta'){
echo'<div class="up">Klaida</div>';
echo'<div class="meniuc">NEUZDETA!</div>';}	
else{
		top('Ginklo nuėmimas');
		echo'<div class="meniuc">Nusiemei <b>Galios karda</b> sėkmingai!</div>';
	mysql_query("UPDATE zaidejai SET sword ='Neuzdeta' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET kg_sword=kg_sword+'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET swordu ='Neuzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo nuėmimas");
	navigacija($g_n);
	}
	
}
if($id == 'nuimti_sword'){
	if($ID != 'Nuimu Infinity sword'){
		header('Location:inv.php');
	}
if($apie['sword'] ==  'Neuzdeta'){
echo'<div class="up">Klaida</div>';
echo'<div class="meniuc">NEUZDETA!</div>';}	

else{
		top('Ginklo nuėmimas');
		echo'<div class="meniuc">Nusiemei <b>Infinity Sword</b> sėkmingai!</div>';
	mysql_query("UPDATE zaidejai SET sword ='Neuzdeta' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Infinity_sword=Infinity_sword+'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET swordu ='Neuzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo nuėmimas");
	navigacija($g_n);
	}
	
}

//// nusiima daiktai armor
if($id == 'nuimti_armor'){
	if($ID != 'Nuimu Vedzito sarvai'){
		header('Location:inv.php');
	}

if($apie['armor'] ==  'Neuzdeta'){
echo'<div class="up">Klaida</div>';
echo'<div class="meniuc">NEUZDETA!</div>';}	
else{
		top('Šarvo nuėmimas');
		echo'<div class="meniuc">Nusiemei <b>Vedzito sarvai</b> sėkmingai!</div>';
	mysql_query("UPDATE zaidejai SET armor ='Neuzdeta' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Vedzito_sarvai=Vedzito_sarvai+'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET armoru ='Neuzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Armor nuėmimas");
	navigacija($g_n);
	}
	
}
if($id == 'nuimti_armor'){
	if($ID != 'Nuimu Gold armor'){
		header('Location:inv.php');
	}
if($apie['armor'] ==  'Neuzdeta'){
echo'<div class="up">Klaida</div>';
echo'<div class="meniuc">NEUZDETA!</div>';}	
else{
		top('Šarvo nuėmimas');
		echo'<div class="meniuc">Nusiemei <b>Gold Armor</b> sėkmingai!</div>';
	mysql_query("UPDATE zaidejai SET armor ='Neuzdeta' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Gold_armor=Gold_armor+'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET armoru ='Neuzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Armor nuėmimas");
	navigacija($g_n);
	}
	
}
if($id == 'nuimti_armor'){
	if($ID != 'Nuimu Time armor'){
		header('Location:inv.php');
	}

if($apie['armor'] ==  'Neuzdeta'){
echo'<div class="up">Klaida</div>';
echo'<div class="meniuc">NEUZDETA!</div>';}	
else{
		top('Šarvo nuėmimas');
		echo'<div class="meniuc">Nusiemei <b>Time Armor</b> sėkmingai!</div>';
	mysql_query("UPDATE zaidejai SET armor ='Neuzdeta' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Time_armor=Time_armor+'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET armoru ='Neuzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Armor nuėmimas");
	navigacija($g_n);
	}
	
}

if($id == 'nuimti_armor'){
	if($ID != 'Nuimu Money armor'){
		header('Location:inv.php');
	}

if($apie['armor'] ==  'Neuzdeta'){
echo'<div class="up">Klaida</div>';
echo'<div class="meniuc">NEUZDETA!</div>';}	
else{
		top('Šarvo nuėmimas');
		echo'<div class="meniuc">Nusiemei <b>Money Armor</b> sėkmingai!</div>';
	mysql_query("UPDATE zaidejai SET armor ='Neuzdeta' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Money_armor=Money_armor+'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET armoru ='Neuzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Armor nuėmimas");
	navigacija($g_n);
	}
	
}
if($id == 'nuimti_armor'){
	if($ID != 'Nuimu Super money armor'){
		header('Location:inv.php');
	}

if($apie['armor'] ==  'Neuzdeta'){
echo'<div class="up">Klaida</div>';
echo'<div class="meniuc">NEUZDETA!</div>';}	
else{
		top('Šarvo nuėmimas');
		echo'<div class="meniuc">Nusiemei <b>Super money Armor</b> sėkmingai!</div>';
	mysql_query("UPDATE zaidejai SET armor ='Neuzdeta' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Super_money_armor=Super_money_armor+'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET armoru ='Neuzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Armor nuėmimas");
	navigacija($g_n);
	}
	
}

if($id == 'nuimti_armor'){
	if($ID != 'Nuimu Vieno kircio armor'){
		header('Location:inv.php');
	}
if($apie['armor'] ==  'Neuzdeta'){
echo'<div class="up">Klaida</div>';
echo'<div class="meniuc">NEUZDETA!</div>';}	
else{
		top('Šarvo nuėmimas');
		echo'<div class="meniuc">Nusiemei <b>Vieno kircio Armor</b> sėkmingai!</div>';
	mysql_query("UPDATE zaidejai SET armor ='Neuzdeta' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET One_tap_armor=One_tap_armor+'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET armoru ='Neuzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Armor nuėmimas");
	navigacija($g_n);
	}
	
}
if($id == 'nuimti_armor'){
	if($ID != 'Nuimu Infinity armor'){
		header('Location:inv.php');
	}

if($apie['armor'] ==  'Neuzdeta'){
echo'<div class="up">Klaida</div>';
echo'<div class="meniuc">NEUZDETA!</div>';}	
else{
		top('Šarvo nuėmimas');
		echo'<div class="meniuc">Nusiemei <b>Infinity Armor</b> sėkmingai!</div>';
	mysql_query("UPDATE zaidejai SET armor ='Neuzdeta' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Infinity_armor=Infinity_armor+'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET armoru ='Neuzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Armor nuėmimas");
	navigacija($g_n);
	}
	
}
if($id == 'nuimti_armor'){
	if($ID != 'Nuimu Galios armor'){
		header('Location:inv.php');
	}

if($apie['armor'] ==  'Neuzdeta'){
echo'<div class="up">Klaida</div>';
echo'<div class="meniuc">NEUZDETA!</div>';}	
else{
		top('Šarvo nuėmimas');
		echo'<div class="meniuc">Nusiemei <b>Galios Armor</b> sėkmingai!</div>';
	mysql_query("UPDATE zaidejai SET armor ='Neuzdeta' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET kg_armor=kg_armor+'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET armoru ='Neuzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Armor nuėmimas");
	navigacija($g_n);
	}
	
}
/// uzsideda daiktai
if($id == 'use_amulet'){
	if($ID != 'Super amulet'){
		header('Location:inv.php');
	}if($invis['Super_amulet'] > 1){
		top('Amuleto užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai</div>';
	mysql_query("UPDATE zaidejai SET amuletas ='$ID' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Super_amulet=Super_amulet-'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET amuletasu ='Uzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Amuleto užsidėjimas");
	navigacija($g_n);
	}
	
}


if($id == 'use_armor'){
	if($ID != 'Gold armor'){
		header('Location:inv.php');
	}if($invis['Gold_armor'] > 1){
		top('Šarvo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai</div>';
	mysql_query("UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Gold_armor=Gold_armor-'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET armoru ='Uzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
	}
	
}
if($id == 'use_sword'){
	if($ID != 'Infinity sword'){
		header('Location:inv.php');
	}if($invis['infinity_sword'] > 1){
		top('Šarvo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai</div>';
	mysql_query("UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Infinity_sword=Infinity_sword-'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET swordu ='Uzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
	}
	
}
if($id == 'use_armor'){
	if($ID != 'Infinity armor'){
		header('Location:inv.php');
	}if($invis['Infinity_armor'] > 1){
		top('Šarvo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai</div>';
	mysql_query("UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Infinity_armor=Infinity_armor-'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET armoru ='Uzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
	}
	
}

if($id == 'use_armor'){
	if($ID != 'Money armor'){
		header('Location:inv.php');
	}if($invis['Money_armor'] > 1){
		top('Šarvo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai</div>';
	mysql_query("UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Money_armor=Money_armor-'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET armoru ='Uzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
	}
	
}
if($id == 'use_armor'){
	if($ID != 'Super money armor'){
		header('Location:inv.php');
	}if($invis['Super_money_armor'] > 1){
		top('Šarvo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai</div>';
	mysql_query("UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Super_money_armor=Super_money_armor-'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET armoru='Uzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
	}
	
}

if($id == 'use_armor'){
	if($ID != 'Vieno kircio armor'){
		header('Location:inv.php');
	}if($invis['One_tap_armor'] > 1){
		top('Šarvo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai</div>';
	mysql_query("UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET One_tap_armor=One_tap_armor-'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET armoru ='Uzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
	}
	
}
if($id == 'use_armor'){
	if($ID != 'Galios armor'){
		header('Location:inv.php');
	}if($invis['kg_armor'] > 1){
		top('Šarvo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai</div>';
	mysql_query("UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET kg_armor=kg_armor-'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET armoru ='Uzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
	}
	
}
if($id == 'use_armor'){
	if($ID != 'Time armor'){
		header('Location:inv.php');
	}if($invis['Time_armor'] > 1){
		top('Šarvo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai</div>';
	mysql_query("UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Time_armor=Time_armor-'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET armoru ='Uzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
	}
	
}

if($id == 'use_sword'){
	if($ID != 'Gold sword'){
		header('Location:inv.php');
	}if($invis['Gold_sword'] > 1){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai</div>';
	mysql_query("UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;
	mysql_query("UPDATE inv SET Gold_sword=Gold_sword-'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET Gold_sword2='+' WHERE nick='$nick'");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
	}
}
if($id == 'use_sword'){
	if($ID != 'Time sword'){
		header('Location:inv.php');
	}if($invis['Time_sword'] > 1){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai</div>';
	mysql_query("UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;
	mysql_query("UPDATE inv SET Time_sword=Time_sword-'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET swordu ='Uzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
	}
}
if($id == 'use_sword'){
	if($ID != 'Trankso kardas'){
		
	}

if($invis['Trankso_kardas'] > 0){

		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai</div>';
	mysql_query("UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Trankso_kardas=Trankso_kardas-'1' WHERE nick='$nick'");
	mysql_query("UPDATE zaidejai SET Trankso_kardas2='+' WHERE nick='$nick'");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
	}
	
}
if($id == 'use_armor'){
	if($ID != 'Vedzito sarvai'){
		header('Location:inv.php');
	}if($invis['Vedzito_sarvai'] > 1){
		top('Šarvo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai</div>';
	mysql_query("UPDATE zaidejai SET armor ='$ID' WHERE nick='$nick' ")	;
mysql_query("UPDATE inv SET Vedzito_sarvai=Vedzito_sarvai-'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET armoru ='Uzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
	}
	
}

if($id == 'use_sword'){
	if($ID != 'Money sword'){
		header('Location:inv.php');
	}if($invis['Money_sword'] > 1){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai</div>';
	mysql_query("UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;
	mysql_query("UPDATE inv SET Money_sword=Money_sword-'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET swordu ='Uzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
	}
	
}

if($id == 'use_sword'){
	if($ID != 'Super money sword'){
		header('Location:inv.php');
	}if($invis['Super_money_sword'] > 1){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai</div>';
	mysql_query("UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;
	mysql_query("UPDATE inv SET Super_money_sword=Super_money_sword-'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET swordu ='Uzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
	}
	
}


if($id == 'use_sword'){
	if($ID != 'Vieno kircio kardas'){
		header('Location:inv.php');
	}if($invis['One_tap_sword'] > 1){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai</div>';
	mysql_query("UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;
	mysql_query("UPDATE inv SET One_tap_sword=One_tap_sword-'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET swordu ='Uzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
	}
	
}


if($id == 'use_sword'){
	if($ID != 'Galios kardas'){
		header('Location:inv.php');
	}if($invis['kg_sword'] > 1){
		top('Ginklo užsidėjimas');
		echo'<div class="meniuc">Užsidėjai sėkmingai</div>';
	mysql_query("UPDATE zaidejai SET sword ='$ID' WHERE nick='$nick' ")	;
	mysql_query("UPDATE inv SET kg_sword=kg_sword-'1' WHERE nick='$nick'");
mysql_query("UPDATE zaidejai SET swordu ='Uzdetas' WHERE nick='$nick' ");
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Ginklo užsidėjimas");
	navigacija($g_n);
	}
	
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
 if($invis['Majinsroll'] > 0){echo''.$ico2.' Majin sroll: <b>'.$invis['Majinsroll'].'</b></br>';}
 if($invis['Goldstone'] > 0){echo''.$ico2.' Gold stone: <b>'.$invis['Goldstone'].'</b></br>';}
 if($invis['Magicball'] > 0){echo''.$ico2.' Magic ball: <b>'.$invis['Magicball'].'</b></br>';}
 if($invis['Powerstone'] > 0){echo''.$ico2.' Power stone: <b>'.$invis['Powerstone'].'</b></br>';}

		 if($invis['Malkos'] > 0){echo''.$ico2.' Malkos: <b>'.$invis['Malkos'].'</b></br>';}
 if($invis['Zuvis'] > 0){echo''.$ico2.' Zuvis: <b>'.$invis['Zuvis'].'</b></br>';}  	  
 echo' </div>';
  echo'<div class="up">Pagaminti daiktai:</div>';
echo' <div class="meniu">';
	  
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
  if($invis['unikalus'] > 0){echo''.$ico2.' <font color="green">Pasiekimų taškai:</font> <b>'.$invis['unikalus'].'</b></br>';}
  if($invis['Super_amulet_item'] > 0){echo''.$ico2.' <font color="red">Super Amulet Item:</font> <b>'.$invis['Super_amulet_item'].'</b></br>';}

echo'</div>';
echo'<div class="up">Išviso daiktų:</div>';
 echo'<div class="meniuc">Viso daiktų: <b>'.$suma.'</b></div>';
		  	  
		  	  
		  	  
	
		  	  
	  
	  
	  
      
	  
	  
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php","Inventorius", "Paprasti daigtai");
	navigacija($g_n);

}






elseif($id == "eat"){
   top('Pupu valgymas');
   if(($invis[Pupos]) < 1){
    		
			echo '<div class="meniuc">Neturi pupu!</div>';
    	
    }else{
       
        echo '<div class="meniuc">Suvalgei stebuklingą pupą ir tavo gyvybės vėl pilnos!</div>';
        mysql_query("UPDATE zaidejai SET gyvybes='$apie[max_gyvybes]' WHERE nick='$nick'");
        mysql_query("UPDATE inv SET pupos=pupos-'1' WHERE nick='$nick'");
    }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","inv.php", "Inventorius", "Pupu valgymas");
	navigacija($g_n);
}




 foot();
?>
