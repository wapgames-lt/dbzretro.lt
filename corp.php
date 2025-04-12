<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();
if($id == ""){
top('Kapsulių korporacija');
   
   online('Kapsuliu korporacijoje');

   echo '<div class="meniuc"><img src="img/imgg/kapsule.png" border="0" alt="*"></br>
   <font color="red">Perspėjimas!</font> <b> Jeigu nenorite prarasti savo turimų daigtų, gaminkite po viena kartą, o ne po du ta patį daigtą!</b></div>';
echo' <div class="up">Paprasti daiktai</div>';
   echo '
  
    <div class="meniu">'.$ico.'  <a href="corp.php?id=gaminu&ka=radaras">Radaras </a>';






if($inv['radaras'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['radaras']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';


}
echo'<br>';
echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=ki">K.G matuoklis </a>';
if($inv['ki'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['ki']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}
echo'<br>';
echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=sword">Trankso kardas </a>';
if($inv['Trankso_kardas'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['Trankso_kardas']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}
echo'<br>';
echo'
       '.$ico.'  <a href="corp.php?id=gaminu&ka=armor">Vedžito šarvai </a>';
if($inv['Vedzito_sarvai'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['Vedzito_sarvai']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}
echo'<br>';
echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=goldarmor">Gold Armor </a>';
if($inv['Gold_armor'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['Gold_armor']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}

echo'<br>';

echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=timearmor">Time Armor </a>';
if($inv['Time_armor'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['Time_armor']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}

echo'<br>';
echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=timesword">Time Sword </a>';
if($inv['Time_sword'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['Time_sword']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}
echo'</div>';
echo' <div class="up">Unikalūs Armor</div>';
echo'<div class="meniu">';

echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=moneyarmor">Money Armor </a>';
if($inv['Money_armor'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['Money_armor']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}

echo'<br>';
echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=smoneyarmor">Super Money Armor </a>';
if($inv['Super_money_armor'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['Super_money_armor']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}

echo'<br>';
echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=kircioarmor">Vieno Kirčio Armor </a>';
if($inv['One_tap_armor'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['One_tap_armor']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}

echo'<br>';
echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=kgarmor">Galios Armor </a>';
if($inv['kg_armor'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['kg_armor']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}
echo'<br>';

echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=infarmor">Infinity Armor </a>';
if($inv['Infinity_armor'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['Infinity_armor']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}
echo'<br>';
echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=mirtiesarmor">Mirties Armor </a>';
if($inv['mirties_armor'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['mirties_armor']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}
echo'<br>';
echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=atgimimoarmor">Atgimimo Armor </a>';
if($inv['atgimimo_armor'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['atgimimo_armor']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}
echo'</div>';








echo' <div class="up">Unikalūs Sword</div>';
echo'<div class="meniu">';
echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=moneysword">Money Sword </a>';
if($inv['Money_sword'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['Money_sword']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}
echo'<br>';
echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=smoneysword">Super Money Sword </a>';
if($inv['Super_money_sword'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['Super_money_sword']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}
echo'<br>';

echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=kirciosword">Vieno kirčio kardas </a>';
if($inv['One_tap_sword'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['One_tap_sword']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}
echo'<br>';
echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=kgsword">Galios kardas </a>';
if($inv['kg_sword'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['kg_sword']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}

echo'<br>';

echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=infsword">Infinity Sword</a>';
if($inv['Infinity_sword'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['Infinity_sword']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}


echo'<br>
      ';     
echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=mirtiessword">Mirties Sword</a>';
if($inv['mirties_sword'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['mirties_sword']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}


echo'<br>
      ';     
echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=atgimimosword">Atgimimo Sword</a>';
if($inv['atgimimo_sword'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['atgimimo_sword']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}


echo'</div>
      ';     

echo' <div class="up">Unikalūs Amuletai</div>';
echo'<div class="meniu">';
echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=samulet">Super Amulet</a>';
if($inv['Super_amulet'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['Super_amulet']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}

echo'<br>';
 echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=namulet">Naikinimo Amulet</a>';
if($inv['naikinimo_amulet'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['naikinimo_amulet']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}

echo'<br>
      ';     
echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=mirtiesamulet">Mirties Amulet</a>';
if($inv['mirties_amulet'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['mirties_amulet']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}

echo'<br>
      ';     
echo'
    '.$ico.'  <a href="corp.php?id=gaminu&ka=atgimimoamulet">Atgimimo Amulet</a>';
if($inv['atgimimo_amulet'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['atgimimo_amulet']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}

echo'</div>
      ';     

echo' <div class="up">Erdvėlaiviai</div>';
echo'<div class="meniu">';
echo'
       '.$ico.'  <a href="corp.php?id=gaminu&ka=k_laivas">Kosminis laivas </a>';
if($inv['laivas'] <= 0 ){
echo'[<font color="red"><b>Nepasigaminęs</b></font><b>]';}
if($inv['laivas']> 0){
echo'[<font color="green"><b>Pasigaminęs</b></font><b>]';
}
echo'</div>';

 
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Kapsulių korporija");
	navigacija($g_n);
   
   }
   if($id == "gaminu"){
   	if($ka == "sword"){
   		top('Trankso Ginklo gaminimas');
    	online('Kapsuliu korporacijoje');

   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Trankso kardo</b> pagaminimo kaina yra:<br> <font color="red">2000 </font><b>Fusion Fail</b> , <font color=="red"> 700 </font>mln. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 50 </font><img src="img/bicons/euro.png" border="0" alt="*"><br><b>Trankso Kardas</b> duoda <b> 15</b>% daugiau <img src="img/bicons/pinigai.png" /> kovų lauke!<br/>Bei trenksite bosams<b> 500 </b>daugiau! <br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=sword2">Gaminti</a>
   </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Ginklo gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "sword2"){
   online('Kapsuliu korporacijoje');
top('Trankso Ginklo gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';


if($inv['Fusionfail'] < 1999 || $apie['litai'] < 1999999999 ||  $apie['sms_litai'] < 49 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Fusion Fail</b> , <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b> </div>'; 	
   }

elseif($inv['Trankso_kardas'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Trankso kardą</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Trankso kardą </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">2000 </font><b>Fusion Fail, </b><font color="blue">2</font>mlrd. <img src="img/bicons/pinigai.png"> bei <font color="blue">50 </font><img src="img/bicons/euro.png">
</div>';
     mysqli_query($conn,"UPDATE inv SET Fusionfail=Fusionfail-'2000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'1999999999', sms_litai=sms_litai-'50' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET Trankso_kardas=Trankso_kardas+'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET sword='Trankso kardas' WHERE nick='$nick'");
   }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Ginklo gaminimas");
	navigacija($g_n);
   }}

if($ka == "goldsword"){
   		top('Gold Sword gaminimas');
    	online('Kapsuliu korporacijoje');

   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Gold Sword</b> pagaminimo kaina yra:<br> <font color="red">4000 </font><b>Gold Stone</b> , <font color=="red"> 2 </font>mlrd. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 120 </font><img src="img/bicons/euro.png" border="0" alt="*"><br><b>Gold Sword</b> duoda <b>2 </b>kartus daugiau <img src="img/bicons/auxo.png" />(<b>Turint Gold Armor</b>)<br/>Bei trenksite bosams<b> 1000 </b>daugiau! <br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=goldsword2">Gaminti</a>
   </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Ginklo gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "goldsword2"){
   online('Kapsuliu korporacijoje');
top('Gold Sword gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';


if($inv['Goldstone'] < 3999 || $apie['litai'] < 1999999999 ||  $apie['sms_litai'] < 119 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Gold Stone</b> , <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b> </div>'; 	
   }

elseif($inv['Gold_sword'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Gold Sword</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Gold Sword </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">4000 </font><b>Gold stone, </b><font color="blue">2</font>mlrd. <img src="img/bicons/pinigai.png"> bei <font color="blue">120 </font><img src="img/bicons/euro.png">


</div>';
     mysqli_query($conn,"UPDATE inv SET Goldstone=Goldstone-'4000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'1999999999', sms_litai=sms_litai-'120' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET Gold_sword=Gold_sword+'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET sword='Gold sword' WHERE nick='$nick'");
   }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Ginklo gaminimas");
	navigacija($g_n);
   }
if($ka == "goldarmor"){
   		top('Gold Armor gaminimas');
    	online('Kapsuliu korporacijoje');

   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Gold Armor</b> pagaminimo kaina yra:<br> <font color="red">7000 </font><b>Energy Stone</b> , <font color=="red"> 4 </font>mlrd. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 150 </font><img src="img/bicons/euro.png" border="0" alt="*"><br><b>Gold Armor</b> duoda <b>2</b> kartus daugiau <img src="img/bicons/auxo.png" /> kovų lauke.<br/>Sumažins boso daromą žalą <b>100</b><br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=goldarmor2">Gaminti</a>
   </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "goldarmor2"){
   online('Kapsuliu korporacijoje');
top('Gold Armor gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';


if($inv['Energystone'] < 6999 || $apie['litai'] < 3999999999 ||  $apie['sms_litai'] < 149 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Energy Stone</b>(' . $inv['Energystone'] .'/7000) , <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b> </div>';
   }

elseif($inv['Gold_armor'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Gold Armor</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Gold Armor </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">7000 </font><b>Energy Stone, </b><font color="blue">4</font>mlrd. <img src="img/bicons/pinigai.png"> bei <font color="blue">150 </font><img src="img/bicons/euro.png">



</div>';
     mysqli_query($conn,"UPDATE inv SET Energystone=Energystone-'7000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'3999999999', sms_litai=sms_litai-'150' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET Gold_armor=Gold_armor+'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET armor='Gold armor' WHERE nick='$nick'");
   }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
   }

if($ka == "timesword"){
   		top('Time Sword gaminimas');
    	online('Kapsuliu korporacijoje');

   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Time Sword</b> pagaminimo kaina yra:<br> <font color="red">3000 </font><b>Power Stone</b> , <font color=="red"> 5 </font>mlrd. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 250 </font><img src="img/bicons/euro.png" border="0" alt="*"><br><b>Time Sword</b> prideda +<b>2</b>mln.<img src="img/bicons/attack.png" /><br/>Bei trenksite bosams<b> 1500 </b>daugiau! <br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=timesword2">Gaminti</a>
   </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Ginklo gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "timesword2"){
   online('Kapsuliu korporacijoje');
top('Time Sword gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';


if($inv['Powerstone'] < 4999 || $apie['litai'] < 4999999999 ||  $apie['sms_litai'] < 249 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Power Stone</b> , <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b> </div>'; 	
   }

elseif($inv['Time_sword'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Gold Sword</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Time Sword </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">5000 </font><b>Power Stone, </b><font color="blue">5</font>mlrd. <img src="img/bicons/pinigai.png"> bei <font color="blue">250 </font><img src="img/bicons/euro.png">


</div>';
     mysqli_query($conn,"UPDATE inv SET Powerstone=Powerstone-'5000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'4999999999', sms_litai=sms_litai-'250' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET Time_sword=Time_sword+'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET sword='Time sword' WHERE nick='$nick'");
   }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Ginklo gaminimas");
	navigacija($g_n);
   }

if($ka == "moneyarmor"){
   		top('Money Armor gaminimas');
    	online('Kapsuliu korporacijoje');

   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Money Armor</b> pagaminimo kaina yra:<br> <font color="red">7000 </font><b>Magic ball</b> , <font color=="red"> 8</font>mlrd. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 300 </font><img src="img/bicons/euro.png" border="0" alt="*"><br><b>Money Armor</b> prideda + <b>35</b>% <img src="img/bicons/pinigai.png" /> kovų lauke.<br/>Sumažins boso daromą žalą <b>300</b><br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=moneyarmor2">Gaminti</a>
   </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "moneyarmor2"){
   online('Kapsuliu korporacijoje');
top('Money Armor gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';


if($inv['Magicball'] < 9999 || $apie['litai'] < 7999999999 ||  $apie['sms_litai'] < 299 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Magic ball</b> , <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b> </div>'; 	
   }

elseif($inv['Money_armor'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Money Armor</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Money Armor </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">10000 </font><b>Magic ball, </b><font color="blue">8</font>mlrd. <img src="img/bicons/pinigai.png"> bei <font color="blue">300</font><img src="img/bicons/euro.png">


</div>';
     mysqli_query($conn,"UPDATE inv SET Magicball=Magicball-'10000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'7999999999', sms_litai=sms_litai-'300' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET Money_armor=Money_armor+'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET armor='Money armor' WHERE nick='$nick'");
   }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
   }

if($ka == "smoneyarmor"){
   		top('Super Money Armor gaminimas');
    	online('Kapsuliu korporacijoje');

   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Super Money Armor</b> pagaminimo kaina yra:<br> <font color="red">8000 </font><b>Sayan Tail</b> , <font color=="red"> 15 </font>mlrd. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 400 </font><img src="img/bicons/euro.png" border="0" alt="*"><br>Būtina atiduoti <b> Money Armor</b><br><b>Super Money Armor</b> prideda + <b>80</b>%<img src="img/bicons/pinigai.png" /> daugiau kovų lauke.<br/>Sumažins boso daromą žalą <b>500</b><br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=smoneyarmor2">Gaminti</a>
   </div>';

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "smoneyarmor2"){
   online('Kapsuliu korporacijoje');
top('Super Money Armor gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';



if($inv['Sayiantail'] < 9999 || $inv['Money_armor'] < 1 ||$apie['litai'] < 14999999999 ||  $apie['sms_litai'] < 399 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Sayan tail</b> , <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png"> !</b><br>Arba neturite<b> Money Armor!</b> </div>'; 	
   }

elseif($inv['Super_money_armor'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Super money Armor</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Super money Armor </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">10000 </font><b>Sayan tail, </b><font color="blue">15</font>mlrd. <img src="img/bicons/pinigai.png"> bei <font color="blue">400 </font><img src="img/bicons/euro.png"><br>Bei atidavei <b>Super Money Armor</b>!



</div>';
     mysqli_query($conn,"UPDATE inv SET Sayiantail=Sayiantail-'10000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'14999999999', sms_litai=sms_litai-'400' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET Super_money_armor=Super_money_armor+'1', Money_armor=Money_armor-'1' WHERE nick='$nick'");
  }
  mysqli_query($conn,"UPDATE zaidejai SET armor='Super money armor' WHERE nick='$nick'"); 
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
   }

if($ka == "kircioarmor"){
   		top('Vieno kirčio armor gaminimas');
    	online('Kapsuliu korporacijoje');

   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Vieno kirčio armor</b> pagaminimo kaina yra:<br> <font color="red">8000 </font><b>Majin scroll</b> ir <b>Mikroskemų</b> , <font color=="red"> 40 </font>mlrd. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 500 </font><img src="img/bicons/euro.png" border="0" alt="*"><br>Būtina atiduoti <b>Super Money Armor</b><br><b>Vieno kirčio armor</b> duoda  <b>2.5</b> karto daugiau <img src="img/bicons/pinigai.png" />, <img src="img/bicons/exp.png" />  kovų lauke!<br/>Sumažins boso daromą žalą <b>700</b><br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=kircioarmor2">Gaminti</a>
   </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "kircioarmor2"){
   online('Kapsuliu korporacijoje');
top('Vieno kirčio armor gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';


if($inv['Majinsroll'] < 8000 || $inv['Super_money_armor'] < 1 ||$inv['Microshem'] < 8000 ||$apie['litai'] < 39999999999 ||  $apie['sms_litai'] < 500 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Majin scroll</b> , <b>Mikroskemų</b>, <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b> <br>Arba neturite <b> Super Money Armor!</b></div>'; 	
   }

elseif($inv['One_tap_armor'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Vieno kirčio armor</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Vieno kirčio armor </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">8000 </font><b>Majin Scroll, Mikroskemų </b><font color="blue">40</font>mlrd. <img src="img/bicons/pinigai.png"> bei <font color="blue">500 </font><img src="img/bicons/euro.png"><br>Bei atidavei <b>Super Money Armor</b>!

</div>';
     mysqli_query($conn,"UPDATE inv SET Majinsroll=Majinsroll-'10000', Microshem=Microshem-'10000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'39999999999', sms_litai=sms_litai-'500' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET One_tap_armor=One_tap_armor+'1', Super_money_armor=Super_money_armor-'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET armor='Vieno kircio armor' WHERE nick='$nick'");
   }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
   }

if($ka == "kgarmor"){
   		top('Galios Armor gaminimas');
    	online('Kapsuliu korporacijoje');

   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Galios Armor</b> pagaminimo kaina yra:<br> <font color="red">4000 </font><b>Power Stone</b>, <b>Energy Stone</b>,<font color=="red"> 80 </font>mlrd. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 800 </font><img src="img/bicons/euro.png" border="0" alt="*"><br>Būtina atiduoti <b> Vieno Kirčio Armor</b><br><b>Galios Armor</b> duoda  <b>4</b> kartus daugiau <img src="img/bicons/pinigai.png" />, <img src="img/bicons/exp.png" /> kovų lauke!<br/>Sumažins boso daromą žalą <b>1000</b><br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=kgarmor2">Gaminti</a>
   </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "kgarmor2"){
   online('Kapsuliu korporacijoje');
top('Galios Armor gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';


if($inv['Powerstone'] < 4999 || $inv['One_tap_armor'] < 1 || $inv['Energystone'] < 3999 ||$apie['litai'] < 79999999999 ||  $apie['sms_litai'] < 799 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Power Stone</b> , <b>Energy Stone</b>, <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b><br>Arba neturi <b>Vieno kirčio Armor</b>! </div>'; 	
   }

elseif($inv['kg_armor'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Galios Amor</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Galios Armor </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">5000 </font><b>Energy, Power Stone </b><font color="blue">80</font>mlrd. <img src="img/bicons/pinigai.png"> bei <font color="blue">800 </font><img src="img/bicons/euro.png"><br>Bei atidavei <b>Vieno kirčio Armor</b>!

</div>';
     mysqli_query($conn,"UPDATE inv SET Powerstone=Powerstone-'5000', Energystone=Energystone-'4000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'79999999999', sms_litai=sms_litai-'800' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET kg_armor=kg_armor+'1', One_tap_armor=One_tap_armor-'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET armor='Galios armor' WHERE nick='$nick'");
   }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
   }
if($ka == "infarmor"){
   		top('Infinity Armor gaminimas');
    	online('Kapsuliu korporacijoje');
if($apie['vipas3']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>3 Lygio VIP</b>!</div>";}
else{
   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Infinity Armor</b> pagaminimo kaina yra:<br> <font color="red">11000 </font> <b>Energy Stone</b>,<font color=="red"> 220 </font>mlrd. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 2000 </font><img src="img/bicons/euro.png" border="0" alt="*"><br>Būtina atiduoti <b> Galios Armor</b><br><b>Infinity Armor</b> duoda  <b>6</b> kartus daugiau <img src="img/bicons/pinigai.png" />, <img src="img/bicons/exp.png" /> kovų lauke!<br/>Sumažins boso daromą žalą <b>1500</b><br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=infarmor2">Gaminti</a>
   </div>';}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "infarmor2"){
   online('Kapsuliu korporacijoje');
top('Infinity Armor gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';
if($apie['vipas3']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>3 Lygio VIP</b>!</div>";}
else{
if($inv['kg_armor'] < 1 || $inv['Energystone'] < 10999 ||$apie['litai'] < 219999999999 ||  $apie['sms_litai'] < 1999 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Energy Stone</b>, <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b><br>Arba neturi <b>Vieno kirčio Armor</b>! </div>'; 	
   }

elseif($inv['Infinity_armor'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Infinity Amor</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Infinity Armor </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">11000 </font><b>Energy Stone </b><font color="blue">220</font>mlrd. <img src="img/bicons/pinigai.png"> bei <font color="blue">2000 </font><img src="img/bicons/euro.png"><br>Bei atidavei <b>Galios Armor</b>!

</div>';
     mysqli_query($conn,"UPDATE inv SET  Energystone=Energystone-'11000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'219999999999', sms_litai=sms_litai-'2000' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET Infinity_armor=Infinity_armor+'1', kg_armor=kg_armor-'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET armor='Infinity armor' WHERE nick='$nick'");
   }
}
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
   }
//// atgimimo setas
if($ka == "atgimimoarmor"){
   		top('Atgimimo Armor gaminimas');
    	online('Kapsuliu korporacijoje');
if($apie['vipas14']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>15 Lygio VIP</b>!</div>";}
else{
   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Atgimimo Armor</b> pagaminimo kaina yra:<br> <font color="red">25000 </font> <b>Atgimimo Item</b>,<font color=="red"> 100 </font>kvad. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 20000 </font><img src="img/bicons/euro.png" border="0" alt="*"><br>Būtina atiduoti <b>Mirties sword</b>, <b>Mirties armor</b> bei <b>Mirties  amulet</b>!<br><b>Atgimimo Armor</b> duoda  <b>15</b> kartu daugiau <img src="img/bicons/pinigai.png" />, <img src="img/bicons/exp.png" /> kovų lauke!<br/>Sumažins boso daromą žalą <b>500000</b><br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=atgimimoarmor2">Gaminti</a>
   </div>';}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "atgimimoarmor2"){
   online('Kapsuliu korporacijoje');
top('Atgimimo Armor gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';
if($apie['vipas14']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>15 Lygio VIP</b>!</div>";}
else{
if($inv['mirties_armor'] < 1 || $inv['mirties_sword'] < 1 ||$inv['mirties_amulet'] < 1 || $inv['atgimimo_item'] < 24999 ||$apie['litai'] < 99999999999999999  ||  $apie['sms_litai'] < 19999 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Atgimimo Item</b>, <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b><br>Arba neturi <b>Mirties Armor, Sword , Amulet</b>! </div>'; 	
   }

elseif($inv['atgimimo_armor'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Atgimimo Amor</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Atgimimo Armor </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">25000 </font><b>Atgimimo Item </b><font color="blue">100</font>kvar. <img src="img/bicons/pinigai.png"> bei <font color="blue">20000 </font><img src="img/bicons/euro.png"><br>Bei atidavei <small><b>Mirties Armor, Sword ,  amulet</b></small>!

</div>';
     mysqli_query($conn,"UPDATE inv SET  atgimimo_item=atgimimo_item-'25000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'99999999999999999', sms_litai=sms_litai-'20000' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET atgimimo_armor=atgimimo_armor+'1', mirties_armor=mirties_armor-'1', mirties_sword=mirties_sword-'1', mirties_amulet=mirties_amulet-'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET armor='Atgimimo armor' WHERE nick='$nick'");
   }
}
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
   }
if($ka == "atgimimosword"){
   		top('Atgimimo Sword gaminimas');
    	online('Kapsuliu korporacijoje');
if($apie['vipas14']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>15 Lygio VIP</b>!</div>";}
else{
   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Atgimimo Sword</b> pagaminimo kaina yra:<br> <font color="red">25000 </font> <b>Atgimimo Item</b>,<font color=="red"> 200 </font>kvad. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 25000 </font><img src="img/bicons/euro.png" border="0" alt="*"><br>Būtina atiduoti <b>Mirties sword</b>, <b>Mirties armor</b> bei <b>Mirties  amulet</b>!<br><b>Atgimimo Sword</b> duoda  <b>14</b> kartu daugiau <img src="img/bicons/pinigai.png" />, <img src="img/bicons/exp.png" /> kovų lauke!<br/>Padidins bosui daromą žalą <b>2000000</b><br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=atgimimosword2">Gaminti</a>
   </div>';}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Kardo gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "atgimimosword2"){
   online('Kapsuliu korporacijoje');
top('Atgimimo Sword gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';
if($apie['vipas14']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>15 Lygio VIP</b>!</div>";}
else{
if($inv['mirties_armor'] < 1 || $inv['mirties_sword'] < 1 ||$inv['mirties_amulet'] < 1 || $inv['atgimimo_item'] < 24999 ||$apie['litai'] < 199999999999999999  ||  $apie['sms_litai'] < 24999 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Atgimimo Item</b>, <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b><br>Arba neturi <b>Mirties Armor, Sword , Amulet</b>! </div>'; 	
   }

elseif($inv['atgimimo_sword'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Atgimimo Sword</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Atgimimo Sword </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">25000 </font><b>Atgimimo Item </b><font color="blue">200</font>kvad. <img src="img/bicons/pinigai.png"> bei <font color="blue">25000 </font><img src="img/bicons/euro.png"><br>Bei atidavei <small><b>Mirties Armor, Sword ,  amulet</b></small>!

</div>';
     mysqli_query($conn,"UPDATE inv SET  atgimimo_item=atgimimo_item-'25000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'199999999999999999', sms_litai=sms_litai-'25000' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET atgimimo_sword=atgimimo_sword+'1', mirties_armor=mirties_armor-'1', mirties_sword=mirties_sword-'1', mirties_amulet=mirties_amulet-'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET armor='Atgimimo sword' WHERE nick='$nick'");
   }
}
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
   }
if($ka == "atgimimoamulet"){
   		top('Atgimimo Amulet gaminimas');
    	online('Kapsuliu korporacijoje');
if($apie['vipas19']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>20 Lygio VIP</b>!</div>";}
else{
   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Atgimimo Amulet</b> pagaminimo kaina yra:<br> <font color="red">30000 </font> <b>Atgimimo  item</b>,<font color=="red"> 1</font>kvint. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 40000 </font><img src="img/bicons/euro.png" border="0" alt="*"><br>Būtina atiduoti <b> Atgimimo armor ir Atgimimo sword</b><br><b>Atgimimo Amulet</b> duoda  <b>25</b> kartu daugiau <img src="img/bicons/pinigai.png" />, <img src="img/bicons/exp.png" /> kovų lauke!<br/>Sumažins boso daromą žalą <b>1500000</b><br><b>Bonusas</b> - meta <b>3 kartus daugiau</b> Kario tobulėjimo kovų zonoje!
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=atgimimoamulet2">Gaminti</a>
   </div>';}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Amulet gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "atgimimoamulet2"){
   online('Kapsuliu korporacijoje');
top('Atgimimo Amulet gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';
if($apie['vipas19']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>20 Lygio VIP</b>!</div>";}
else{
if($inv['atgimimo_armor'] < 1 ||  $inv['atgimimo_sword'] < 1 || $inv['atgimimo_item'] < 29999 || $apie['litai'] < 9999999999999999999 ||  $apie['sms_litai'] < 39999 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Atgimimo item</b>, <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b><br>Arba neturi <b>Atgimimo armor, sword</b>! </div>'; 	
   }

elseif($inv['atgimimo_amulet'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Atgimimo Amulet</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Atgimimo Amulet</b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">30000 </font><b>Atgimimo item, </b><font color="blue">1</font>kvint. <img src="img/bicons/pinigai.png"> bei <font color="blue">40000 </font><img src="img/bicons/euro.png"><br>Bei atidavei  <b>Atgimimo sword, armor</b>!

</div>';
     mysqli_query($conn,"UPDATE inv SET  atgimimo_item=atgimimo_item-'30000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'999999999999999999', sms_litai=sms_litai-'40000' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET atgimimo_amulet=atgimimo_amulet+'1', atgimimo_sword=atgimimo_sword-'1', atgimimo_armor=atgimimo_armor-'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET amuletas='Atgimimo amulet' WHERE nick='$nick'");
}
   }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Amuleto gaminimas");
	navigacija($g_n);
   }


//// mirties setas
if($ka == "mirtiesarmor"){
   		top('Mirties Armor gaminimas');
    	online('Kapsuliu korporacijoje');
if($apie['vipas9']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>10 Lygio VIP</b>!</div>";}
else{
   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Mirties Armor</b> pagaminimo kaina yra:<br> <font color="red">25000 </font> <b>Mirties Item</b>,<font color=="red"> 100 </font>trln. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 12000 </font><img src="img/bicons/euro.png" border="0" alt="*"><br>Būtina atiduoti <b>Infinity sword</b>, <b>Infinity armor</b> bei <b>Naikinimo amulet</b>!<br><b>Mirties Armor</b> duoda  <b>10</b> kartu daugiau <img src="img/bicons/pinigai.png" />, <img src="img/bicons/exp.png" /> kovų lauke!<br/>Sumažins boso daromą žalą <b>150000</b><br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=mirtiesarmor2">Gaminti</a>
   </div>';}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "mirtiesarmor2"){
   online('Kapsuliu korporacijoje');
top('Mirties Armor gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';
if($apie['vipas9']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>10 Lygio VIP</b>!</div>";}
else{
if($inv['naikinimo_amulet'] < 1 || $inv['mirties_item'] < 24999 ||$apie['litai'] < 99999999999999  ||  $apie['sms_litai'] < 11999 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Mirties Item</b>, <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b></div>';
   }
elseif ($inv['Infinity_armor'] < 1) {
    echo'<div class="meniuc"><b>Neturi Infinity Armour</b>!</div>';
}
elseif ($inv['naikinimo_amulet'] < 1) {
    echo'<div class="meniuc"><b>Neturi naikinimo amulet</b>!</div>';
}
elseif($inv['mirties_armor'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Mirties Amor</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Mirties Armor </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">25000 </font><b>Mirties Item </b><font color="blue">100</font>trln. <img src="img/bicons/pinigai.png"> bei <font color="blue">12000 </font><img src="img/bicons/euro.png"><br>Bei atidavei <small><b>Infinity Armor, Sword , Naikinomo amulet</b></small>!

</div>';
     mysqli_query($conn,"UPDATE inv SET  mirties_item=mirties_item-'25000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'99999999999999', sms_litai=sms_litai-'12000' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET mirties_armor=mirties_armor+'1', Infinity_armor=Infinity_armor-'1', naikinimo_amulet=naikinimo_amulet-'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET armor='Mirties armor' WHERE nick='$nick'");
   }
}
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
   }
if($ka == "mirtiessword"){
   		top('Mirties Sword gaminimas');
    	online('Kapsuliu korporacijoje');
if($apie['vipas9']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>10 Lygio VIP</b>!</div>";}
else{
   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Mirties Sword</b> pagaminimo kaina yra:<br> <font color="red">20000 </font> <b>Mirties Item</b>,<font color=="red"> 80 </font>trln. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 10000 </font><img src="img/bicons/euro.png" border="0" alt="*"><br>Būtina atiduoti <b>Infinity sword</b>, <b>Infinity armor</b> bei <b>Naikinimo amulet</b>!<br><b>Mirties Sword</b> duoda  <b>9</b> kartu daugiau <img src="img/bicons/pinigai.png" />, <img src="img/bicons/exp.png" /> kovų lauke!<br/>Padidina  bosų daromą žalą <b>1000000</b><br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=mirtiessword2">Gaminti</a>
   </div>';}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Sword gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "mirtiessword2"){
   online('Kapsuliu korporacijoje');
top('Mirties Sword gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';
if($apie['vipas9']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>10 Lygio VIP</b>!</div>";}
else{
if($inv['mirties_item'] < 19999 ||$apie['litai'] < 79999999999999  ||  $apie['sms_litai'] < 9999 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Mirties Item</b>, <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b>! </div>';
   }
elseif ($inv['Infinity_sword'] < 1 || $inv['Infinity_armor'] < 1) {
    echo'<div class="meniuc"><b>Neturi Infinity Sword arba Infinity Armour</b>!</div>';
}
elseif ($inv['naikinimo_amulet'] < 1) {
    echo'<div class="meniuc"><b>Neturi naikinimo amulet</b>!</div>';
}
elseif($inv['mirties_sword'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Mirties Sword</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Mirties Sword </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">20000 </font><b>Mirties Item </b><font color="blue">80</font>trln. <img src="img/bicons/pinigai.png"> bei <font color="blue">10000 </font><img src="img/bicons/euro.png"><br>Bei atidavei <small><b>Infinity Armor, Sword , Naikinomo amulet</b></small>!

</div>';
     mysqli_query($conn,"UPDATE inv SET  mirties_item=mirties_item-'20000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'79999999999999', sms_litai=sms_litai-'10000' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET mirties_sword=mirties_sword+'1', Infinity_armor=Infinity_armor-'1', Infinity_sword=Infinity_sword-'1', naikinimo_amulet=naikinimo_amulet-'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET sword='Mirties sword' WHERE nick='$nick'");
   }
}
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Sword gaminimas");
	navigacija($g_n);
   }

if($ka == "mirtiesamulet"){
   		top('Mirties Amulet gaminimas');
    	online('Kapsuliu korporacijoje');
if($apie['vipas12']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>13 Lygio VIP</b>!</div>";}
else{
   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Mirties Amulet</b> pagaminimo kaina yra:<br> <font color="red">30000 </font> <b>Mirties  item</b>,<font color=="red"> 1</font>kvadr. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 20000 </font><img src="img/bicons/euro.png" border="0" alt="*"><br>Būtina atiduoti <b> Mirties armor ir Mirties sword</b><br><b>Mirties Amulet</b> duoda  <b>15</b> kartu daugiau <img src="img/bicons/pinigai.png" />, <img src="img/bicons/exp.png" /> kovų lauke!<br/>Sumažins boso daromą žalą <b>600000</b><br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=mirtiesamulet2">Gaminti</a>
   </div>';}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Amulet gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "mirtiesamulet2"){
   online('Kapsuliu korporacijoje');
top('Mirties Amulet gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';
if($apie['vipas12']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>13 Lygio VIP</b>!</div>";}
else{
if($inv['mirties_armor'] < 1 ||  $inv['mirties_sword'] < 1 || $inv['mirties_item'] < 29999 || $apie['litai'] < 9999999999999999 ||  $apie['sms_litai'] < 19999 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Mirties item</b>, <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b><br>Arba neturi <b>Mirties armor, sword</b>! </div>'; 	
   }

elseif($inv['mirties_amulet'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Mirties Amulet</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Mirties Amulet</b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">30000 </font><b>Mirties item, </b><font color="blue">1</font>kvadr. <img src="img/bicons/pinigai.png"> bei <font color="blue">20000 </font><img src="img/bicons/euro.png"><br>Bei atidavei  <b>Mirties sword, armor</b>!

</div>';
     mysqli_query($conn,"UPDATE inv SET  mirties_item=mirties_item-'30000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'999999999999999', sms_litai=sms_litai-'20000' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET mirties_amulet=mirties_amulet+'1', mirties_sword=mirties_sword-'1', mirties_armor=mirties_armor-'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET amuletas='Mirties amulet' WHERE nick='$nick'");
}
   }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Amuleto gaminimas");
	navigacija($g_n);
   }








if($ka == "moneysword"){
   		top('Money Sword gaminimas');
    	online('Kapsuliu korporacijoje');

   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Money Sword</b> pagaminimo kaina yra:<br> <font color="red">8000 </font><b>Magic ball</b> , <font color=="red"> 12</font>mlrd. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 370 </font><img src="img/bicons/euro.png" border="0" alt="*"><br><b>Money Sword</b> prideda + <b>30</b>% <img src="img/bicons/pinigai.png" /> kovų lauke.<br/>Bei trenksite bosams<b> 2000 </b>daugiau! <br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=moneysword2">Gaminti</a>
   </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Ginklo gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "moneysword2"){
   online('Kapsuliu korporacijoje');
top('Money Sword gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';


if($inv['Magicball'] < 7999 || $apie['litai'] < 11999999999 ||  $apie['sms_litai'] < 369 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Magic ball</b> , <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b> </div>'; 	
   }

elseif($inv['Money_sword'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Money Sword</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Money Sword </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">8000 </font><b>Magic ball, </b><font color="blue">12</font>mlrd. <img src="img/bicons/pinigai.png"> bei <font color="blue">370</font><img src="img/bicons/euro.png">


</div>';
     mysqli_query($conn,"UPDATE inv SET Magicball=Magicball-'8000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'11999999999', sms_litai=sms_litai-'370' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET Money_sword=Money_sword+'1' WHERE nick='$nick'");
 mysqli_query($conn,"UPDATE zaidejai SET sword='Money sword' WHERE nick='$nick'"); 
   }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Ginklo gaminimas");
	navigacija($g_n);
   }

if($ka == "smoneysword"){
   		top('Super Money Sword gaminimas');
    	online('Kapsuliu korporacijoje');

   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Super Money Sword</b> pagaminimo kaina yra:<br> <font color="red">9000 </font><b>Sayan Tail</b> , <font color=="red"> 20 </font>mlrd. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 450 </font><img src="img/bicons/euro.png" border="0" alt="*"><br>Būtina atiduoti <b> Money Sword</b><br><b>Super Money Sword</b> prideda + <b>60</b>%<img src="img/bicons/pinigai.png" /> daugiau kovų lauke.<br/>Bei trenksite bosams<b> 4000 </b>daugiau! <br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=smoneysword2">Gaminti</a>
   </div>';

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Ginklo gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "smoneysword2"){
   online('Kapsuliu korporacijoje');
top('Super Money Sword gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';



if($inv['Sayiantail'] < 8999 || $inv['Money_sword'] < 1 ||$apie['litai'] < 19999999999 ||  $apie['sms_litai'] < 449 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Sayan tail</b> , <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png"> !</b><br>Arba neturite<b> Money Sword!</b> </div>'; 	
   }

elseif($inv['Super_money_sword'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Super money Sword</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Super money Sword </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">9000 </font><b>Sayan tail, </b><font color="blue">20</font>mlrd. <img src="img/bicons/pinigai.png"> bei <font color="blue">450 </font><img src="img/bicons/euro.png">



</div>';
     mysqli_query($conn,"UPDATE inv SET Sayiantail=Sayiantail-'9000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'19999999999', sms_litai=sms_litai-'450' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET Super_money_sword=Super_money_sword+'1', Money_sword=Money_sword-'1' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET sword='Super money sword' WHERE nick='$nick'");
  }
   
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Ginklo gaminimas");
	navigacija($g_n);
   }

if($ka == "kirciosword"){
   		top('Vieno kirčio kardo gaminimas');
    	online('Kapsuliu korporacijoje');

   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Vieno kirčio kardo</b> pagaminimo kaina yra:<br> <font color="red">10000 </font><b>Majin scroll</b> ir <b>Mikroskemų</b> , <font color=="red"> 50 </font>mlrd. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 620 </font><img src="img/bicons/euro.png" border="0" alt="*"><br>Būtina atiduoti <b>Super Money Sword</b><br><b>Vieno kirčio kardas</b> duoda  <b>2</b> kartus daugiau <img src="img/bicons/pinigai.png" />, <img src="img/bicons/exp.png" />  kovų lauke!<br/>Bei trenksite bosams<b> 6000 </b>daugiau! <br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=kirciosword2">Gaminti</a>
   </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Ginklo gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "kirciosword2"){
   online('Kapsuliu korporacijoje');
top('Vieno kirčio kardo gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';


       if ($inv['Super_money_sword'] < 1) {
          echo '<div class="meniuc">Neturi Super Money Sword</div>';
       }

if($inv['Majinsroll'] < 9999 ||$inv['Microshem'] < 9999 ||$apie['litai'] < 49999999999 ||  $apie['sms_litai'] < 619 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Majin scroll</b> , <b>Mikroskemų</b>, <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b> <br>Arba neturite <b> Super Money Sword!</b></div>'; 	
   }

elseif($inv['One_tap_sword'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Vieno kirčio kardą</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Vieno kirčio kardą </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">10000 </font><b>Majin Scroll, Mikroskemų </b><font color="blue">50</font>mlrd. <img src="img/bicons/pinigai.png"> bei <font color="blue">620 </font><img src="img/bicons/euro.png"><br>Bei atidavei <b>Super Money Sword</b>!

</div>';
     mysqli_query($conn,"UPDATE inv SET Majinsroll=Majinsroll-'10000', Microshem=Microshem-'10000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'49999999999', sms_litai=sms_litai-'620' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET One_tap_sword=One_tap_sword+'1', Super_money_sword=Super_money_sword-'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET sword='Vieno kircio sword' WHERE nick='$nick'");
   }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Ginklo gaminimas");
	navigacija($g_n);
   }



if($ka == "kgsword"){
   		top('Galios kardo gaminimas');
    	online('Kapsuliu korporacijoje');

   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Galios kardo</b> pagaminimo kaina yra:<br> <font color="red">5000 </font><b>Power Stone</b>, <b>Energy Stone</b>,<font color=="red"> 100 </font>mlrd. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 1020 </font><img src="img/bicons/euro.png" border="0" alt="*"><br>Būtina atiduoti <b> Vieno Kirčio kardą</b><br><b>Galios kardas</b> duoda  <b>3</b> kartus daugiau <img src="img/bicons/pinigai.png" />, <img src="img/bicons/exp.png" /> kovų lauke!<br>Bei trenksite bosams<b> 8000 </b>daugiau! <br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=kgsword2">Gaminti</a>
   </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Ginklo gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "kgsword2"){
   online('Kapsuliu korporacijoje');
top('Galios kardo gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';


if($inv['Powerstone'] < 4999 || $inv['One_tap_sword'] < 1 || $inv['Energystone'] < 4999 ||$apie['litai'] < 99999999999 ||  $apie['sms_litai'] < 1019 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Power Stone</b> , <b>Energy Stone</b>, <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b><br>Arba neturi <b>Vieno kirčio kardo</b>! </div>'; 	
   }

elseif($inv['kg_sword'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Galios kardą</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Galios kardą </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">5000 </font><b>Energy, Power Stone </b><font color="blue">100</font>mlrd. <img src="img/bicons/pinigai.png"> bei <font color="blue">1020 </font><img src="img/bicons/euro.png"><br>Bei atidavei <b>Vieno kirčio kardą</b>!

</div>';
     mysqli_query($conn,"UPDATE inv SET Powerstone=Powerstone-'5000', Energystone=Energystone-'5000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'99999999999', sms_litai=sms_litai-'1020' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET kg_sword=kg_sword+'1', One_tap_sword=One_tap_sword-'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET sword='Galios sword' WHERE nick='$nick'");
   }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Ginklo gaminimas");
	navigacija($g_n);
   }
if($ka == "infsword"){
   		top('Infinity Sword gaminimas');
    	online('Kapsuliu korporacijoje');
if($apie['vipas3']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>3 Lygio VIP</b>!</div>";}
else{
   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Infinity Sword</b> pagaminimo kaina yra:<br> <font color="red">12000 </font> <b>Magic ball</b>,<font color=="red"> 200 </font>mlrd. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 1800 </font><img src="img/bicons/euro.png" border="0" alt="*"><br>Būtina atiduoti <b> Galios Kardą</b><br><b>Infinity Sword</b> duoda  <b>5</b> kartus daugiau <img src="img/bicons/pinigai.png" />, <img src="img/bicons/exp.png" /> kovų lauke!<br/>Bei trenksite bosams<b> 10000 </b>daugiau! <br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=infsword2">Gaminti</a>
   </div>';}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Kardo gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "infsword2"){
   online('Kapsuliu korporacijoje');
top('Infinity Sword gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';

if($apie['vipas3']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>3 Lygio VIP</b>!</div>";}
else{
if($inv['kg_sword'] < 1 || $inv['Magicball'] < 11999 ||$apie['litai'] < 199999999999 ||  $apie['sms_litai'] < 1799 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Magic Ball</b>, <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b><br>Arba neturi <b>Galios kardo</b>! </div>'; 	
   }

elseif($inv['Infinity_sword'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Infinity Sword</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Infinity Sword </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">12000 </font><b>Magic Ball, </b><font color="blue">200</font>mlrd. <img src="img/bicons/pinigai.png"> bei <font color="blue">1800 </font><img src="img/bicons/euro.png"><br>Bei atidavei <b>Galios Karda</b>!

</div>';
     mysqli_query($conn,"UPDATE inv SET  Magicball=Magicball-'12000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'199999999999', sms_litai=sms_litai-'1800' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET Infinity_sword=Infinity_sword+'1', kg_sword=kg_sword-'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET sword='Infinity sword' WHERE nick='$nick'");
   }
}
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Kardo gaminimas");
	navigacija($g_n);
   }
    
/// amuletai
if($ka == "samulet"){
   		top('Super Amulet gaminimas');
    	online('Kapsuliu korporacijoje');
if($apie['vipas4']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>4 Lygio VIP</b>!</div>";}
else{
   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Super Amulet</b> pagaminimo kaina yra:<br> <font color="red">10000 </font> <b>Super amulet item</b>,<font color=="red"> 500 </font>mlrd. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 3000 </font><img src="img/bicons/euro.png" border="0" alt="*"><br>Būtina atiduoti <b> Infinity Kardą</b> ir <b>Infinity Armor</b><br><b>Super Amulet</b> duoda  <b>5</b> kartus daugiau <img src="img/bicons/pinigai.png" />, <img src="img/bicons/exp.png" /> kovų lauke!<br/>Bei trenksite bosams<b> 2 </b> kartus daugiau! <br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=samulet2">Gaminti</a>
   </div>';}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Amulet gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "samulet2"){
   online('Kapsuliu korporacijoje');
top('Super Amulet gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';
if($apie['vipas4']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>4 Lygio VIP</b>!</div>";}
else{
if($inv['Infinity_sword'] < 1 || $inv['Infinity_armor'] < 1 || $inv['Super_amulet_item'] < 9999 ||$apie['litai'] < 499999999999 ||  $apie['sms_litai'] < 2999 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Super Amulet item</b>, <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b><br>Arba neturi <b>Infinity Sword</b> ir <b>Infinity Armor</b>! </div>'; 	
   }

elseif($inv['Super_amulet'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Super Amulet</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Super Amulet</b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">10000 </font><b>Super Amulet item, </b><font color="blue">500</font>mlrd. <img src="img/bicons/pinigai.png"> bei <font color="blue">3000 </font><img src="img/bicons/euro.png"><br>Bei atidavei <b>Infinity Sword</b> ir <b>Infinity Armor</b>!

</div>';
     mysqli_query($conn,"UPDATE inv SET  Super_amulet_item=Super_amulet_item-'10000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'499999999999', sms_litai=sms_litai-'3000' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET Super_amulet=Super_amulet+'1', Infinity_sword=Infinity_sword-'1', Infinity_armor=Infinity_armor-'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET amuletas='Super amulet' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET armor='Neuzdetas' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET sword='Neuzdetas' WHERE nick='$nick'");
   }
}
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Amuleto gaminimas");
	navigacija($g_n);
   }

if($ka == "namulet"){
   		top('Naikinimo Amulet gaminimas');
    	online('Kapsuliu korporacijoje');
if($apie['vipas5']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>5 Lygio VIP</b>!</div>";}
else{
   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Naikinimo Amulet</b> pagaminimo kaina yra:<br> <font color="red">5000 </font> <b>Naikinimo amulet item</b>,<font color=="red"> 1</font>trln. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 5000 </font><img src="img/bicons/euro.png" border="0" alt="*"><br>Būtina atiduoti <b> Super Amulet</b><br><b>Naikinimo Amulet</b> duoda  <b>8</b> kartus daugiau <img src="img/bicons/pinigai.png" />, <img src="img/bicons/exp.png" /> kovų lauke!<br/>Sumažins boso daromą žalą <b>2000</b><br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=namulet2">Gaminti</a>
   </div>';}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Amulet gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "namulet2"){
   online('Kapsuliu korporacijoje');
top('Naikinimo Amulet gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';
if($apie['vipas5']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>5 Lygio VIP</b>!</div>";}
else{
if($inv['Super_amulet'] < 1 ||  $inv['naikinimo_amulet_item'] < 4999 ||$apie['litai'] < 999999999999 ||  $apie['sms_litai'] < 4999 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Naikinimo Amulet item</b>, <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b><br>Arba neturi <b>Super Amulet</b>! </div>'; 	
   }

elseif($inv['naikinimo_amulet'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Naikinimo Amulet</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Naikinimo Amulet</b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">5000 </font><b>Naikinimo Amulet item, </b><font color="blue">1</font>trln. <img src="img/bicons/pinigai.png"> bei <font color="blue">5000 </font><img src="img/bicons/euro.png"><br>Bei atidavei  <b>Super Amulet</b>!

</div>';
     mysqli_query($conn,"UPDATE inv SET  naikinimo_amulet_item=naikinimo_amulet_item-'5000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'999999999999', sms_litai=sms_litai-'5000' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET Super_amulet=Super_amulet-'1', naikinimo_amulet=naikinimo_amulet+'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET amuletas='Naikinimo amulet' WHERE nick='$nick'");
}
   }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Amuleto gaminimas");
	navigacija($g_n);
   }



if($ka == "timearmor"){
   		top('Time Armor gaminimas');
    	online('Kapsuliu korporacijoje');

   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

<div class="meniuc">   <b>Time Armor</b> pagaminimo kaina yra:<br> <font color="red">3000 </font><b>Majin Scroll</b> , <font color=="red"> 7 </font>mlrd. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 220 </font><img src="img/bicons/euro.png" border="0" alt="*"><br><b>Time Armor</b> prideda +<b>6</b>mln. <img src="img/bicons/shield.png" /><br/>Sumažins boso daromą žalą <b>200</b><br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=timearmor2">Gaminti</a>
   </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "timearmor2"){
   online('Kapsuliu korporacijoje');
top('Time Armor gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';


if($inv['Majinsroll'] < 2999 || $apie['litai'] < 6999999999 ||  $apie['sms_litai'] < 219 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Majin Scroll</b> , <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b> </div>'; 	
   }

elseif($inv['Time_armor'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Time Armor</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Time Armor </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">3000 </font><b>Majin scroll, </b><font color="blue">7</font>mlrd. <img src="img/bicons/pinigai.png"> bei <font color="blue">220 </font><img src="img/bicons/euro.png">

</div>';
     mysqli_query($conn,"UPDATE inv SET Majinsroll=Majinsroll-'3000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'6999999999', sms_litai=sms_litai-'220' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET Time_armor=Time_armor+'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET armor='Time armor' WHERE nick='$nick'");
   }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Armor gaminimas");
	navigacija($g_n);
   }
   	if($ka == "armor"){
    	online('Kapsuliu korporacijoje');
top('Šarvų gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png" border="0" alt="*"></div>

   <div class="meniuc"><b>Vedžito šarvų</b> pagaminimo  kaina yra:<br> <font color="red"> 2000</font><b> Majin Scroll</b>  , <font color=="red"> 500 </font>mln. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 50 </font><img src="img/bicons/euro.png" border="0" alt="*"><br><b>Vedžito šarvai </b> duoda <b>40</b>% daugiau <img src="img/bicons/exp.png" /> kovų lauke!<br/>Sumažins boso daromą žalą <b>50</b><br>
  
   </div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=armor2">Gaminti</a>
   </div>';
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Šarvų gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "armor2"){
   online('Kapsuliu korporacijoje');
top('Šarvų gaminimas');
   echo '<div class="meniuc"><img src="img/Dr.png"></div>';
   if($inv['Majinsroll'] < 1999 || $apie['litai'] < 499999999 ||  $apie['sms_litai'] < 49 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Majin Scroll</b> , <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b> </div>'; 	
   }
elseif($inv['Vedzito_sarvai'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs Vedžito šarvus!</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Vedžito šarvus</b> sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">2000 </font><b>Majin Scroll, </b><font color="blue">500</font>mln. <img src="img/bicons/pinigai.png"> bei <font color="blue">50 </font><img src="img/bicons/euro.png">

</div>';
      mysqli_query($conn,"UPDATE inv SET Majinsroll=Majinsroll-'2000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'499999999', sms_litai=sms_litai-'50' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET Vedzito_sarvai=Vedzito_sarvai+'1' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE zaidejai SET armor='Vedzito sarvai' WHERE nick='$nick'");
   }
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Ginklo gaminimas");
	navigacija($g_n);
   }
   
   
    if($ka == "radaras"){
    	online('Kapsuliu korporacijoje');
top('Radaro gaminimas');
   echo '<div class="meniuc"><img src="img/radar.png" border="0" alt="*"></div>

<div class="meniuc"> <b>  Radaro </b>pagaminimo kaina yra:<br><font color=="red"> 1000 </font><b>mikroschemų</b> , <font color=="red"> 100 </font>mln.  <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 10 </font><img src="img/bicons/euro.png" border="0" alt="*"><br/><b>Radaras</b> bus suteiktas <b>Visam laikui</b>!<br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=radaras2">Gaminti</a>
   </div>';
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Radaro gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "radaras2"){
   	top('Radaro gaminimas');
   online('Kapsuliu korporacijoje');

   echo '<div class="meniuc"><img src="img/radar.png"></div>';


   if($inv['Microshem'] < 999 || $apie['litai'] < 99999999 ||  $apie['sms_litai'] < 9 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Microschemų</b> , <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b> </div>'; 	
   }
elseif($inv['radaras'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs radarą</b>!</div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>radarą</b> sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">1000 </font><b>Mikroskemų, </b><font color="blue">100</font>mln. <img src="img/bicons/pinigai.png"> bei <font color="blue">10 </font><img src="img/bicons/euro.png">

</div>';
      mysqli_query($conn,"UPDATE inv SET Microshem=Microshem-'1000' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'99999999', sms_litai=sms_litai-'10' WHERE nick='$nick'")or die(mysqli_error());
 mysqli_query($conn,"UPDATE inv SET radaras=radaras+'1' WHERE nick='$nick'");
  
   }


    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Radaro gaminimas");
	navigacija($g_n);
   }
    
if($ka == "ki"){
    	online('Kapsuliu korporacijoje');
  top('KG matuoklio gaminimas');
   echo '<div class="meniuc"><img src="img/kg.png" border="0" alt="*"></div>
<div class="meniuc"> <b>  K.G Matuoklio </b> pagaminimo kaina  yra:<br> <font color="red">5000</font> <b> mikroschemų</b> , <font color=="red"> 2 </font>mlrd. <img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 120 </font><img src="img/bicons/euro.png" border="0" alt="*"><br/><b>KG matuoklis</b> bus suteiktas <b>Visam laikui</b>!<br>
  
   </div><div class="line"></div><div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=ki2">Gaminti</a>
   </div>';
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "KG rodymo gaminimas");
	navigacija($g_n);
}
	
   elseif($ka == "ki2"){
   online('Kapsuliu korporacijoje');
    top('KG rodymo gaminimas');
   echo '<div class="meniuc"><img src="img/kg.png"></div>';

   if($inv['Microshem'] < 4999 || $apie['litai'] < 1999999999 ||  $apie['sms_litai'] < 119 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Microschemų</b> , <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b> </div>'; 	
   }
elseif($inv['ki'] > 0){
echo'<div class="meniuc"><b>Jau turi pasigaminęs KG rodymo prietaisą</b>!</div>';

   }else{
      echo '<div class="meniuc">Pasigaminai<b> K.G matuoklį </b>sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">5000 </font><b>Mikroskemų, </b><font color="blue">2</font>mlrd. <img src="img/bicons/pinigai.png"> bei <font color="blue">120 </font><img src="img/bicons/euro.png">

</div>';
         mysqli_query($conn,"UPDATE inv SET Microshem=Microshem-'1500' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'199999999', sms_litai=sms_litai-'30' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE inv SET ki=ki+'1' WHERE nick='$nick'");
   
   }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "KG rodymo gaminimas");
	navigacija($g_n);
   }
if($ka == "k_laivas"){
    	online('Kapsuliu korporacijoje');
  top('Kosminis laivas');
   echo '<div class="meniuc"><img src="img/k_laivas.png" border="0" alt="*"></div>

<div class="meniuc"><b>  Kosminio laivo</b> gaminimo  kaina yra:<br> <font color="red">2500 </font><b>mikroschemų</b> , <font color=="red"><b> 1</b> </font> trln.<img src="img/bicons/pinigai.png" border="0" alt="*"> bei <font color=="red"> 300 </font><img src="img/bicons/euro.png" border="0" alt="*"><br>Su <b>Kosminiu Laivu</b> galėsite keliauti į <b>Namekų</b> ir <b>Kajų</b> planetas!<br/></div>
  
 <div class="meniuc">
   '.$ico.' <a href="corp.php?id=gaminu&ka=k_laivas2">Gaminti</a>
   </div>';
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Kosminis laivas");
	navigacija($g_n);
}
	
   elseif($ka == "k_laivas2"){
   online('Kapsuliu korporacijoje');
  top('Kosminis laivas');
echo '<div class="meniuc"><img src="img/k_laivas.png" border="0" alt="*"></div>';
   if($inv['Microshem'] < 2499 || $apie['litai'] < 99999999999 ||  $apie['sms_litai'] < 299 ){
   echo '<div class="meniuc">Neturi pakankamai <b>Microschemų</b> , <img src="img/bicons/pinigai.png"><b> arba <img src="img/bicons/euro.png">  !</b> </div>'; 	
   }
elseif($inv['laivas'] > 0){
  echo '<div class="meniuc"><b>Jau turi pasigaminęs Kosminį Laivą!</b></div>';
}
else{
      echo '<div class="meniuc">Pasigaminai <b>Kosminį Laivą</b> sėkmingai!</div>
<div class="meniuc">Sumokėjai <font color="red">2500 </font><b>Mikroskemų, </b><font color="blue">1</font>mlrd. <img src="img/bicons/pinigai.png"> bei <font color="blue">70 </font><img src="img/bicons/euro.png">

</div>';
         mysqli_query($conn,"UPDATE inv SET Microshem=Microshem-'2500' WHERE nick='$nick'")or die(mysqli_error());
   mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'999999999', sms_litai=sms_litai-'70' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE zaidejai SET k_laivas='1' WHERE nick='$nick'");
     mysqli_query($conn,"UPDATE inv SET  laivas=laivas+'1' WHERE nick='$nick'");
   }


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","corp.php", "Kapsulių korporacija", "Kosminis laivas");
	navigacija($g_n);
   }
 foot();
?>
