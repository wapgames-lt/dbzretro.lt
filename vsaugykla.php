<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();
$veikejas = mysql_fetch_assoc(mysql_query("SELECT * FROM veikejas WHERE nick='$nick'"));

if($id == ""){
	 online('Žiūri savo veikėjus');
   top('Veikėjų saugykla');
    
   echo '<div class="meniuc"><img src="img/veikejai/'.$apie['veikejas'].'-'.$apie[trans].'.png" alt="*"></div>'; 
echo '<div class="meniuc">
   Čia yra tavo visi  turimi unikalūs veikėjai<br></div>';
    

echo'
<div class="meniuc"><h4>
<a href="?id=sajanai">Sajanai</a></h4><br></div>
<div class="meniuc">
<h4><a href="?id=naikintojai">Naikintojai</a></h4><br></div>
<div class="meniuc">
<h4><a href="?id=angelai">Angelai</a></h4><br></div>
<div class="meniuc">
<h4><a href="?id=aukskredai">Už auksinius/kreditus</a></h4><br></div>

<div class="meniuc">

<h4><a href="?id=kiti">Visi kiti</a></h4><br></div>
<div class="meniuc">
<h3><a href="?id=dievai"><font color="red"><b>Super DIEVAI</b></font</a></h3><br></div>
';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjų Saugykla");
	navigacija($g_n);
}

if($id == "aukskredai"){
	 online('Žiūri savo veikėjus');
   top('Už auksinius/kreditus');
echo '<div class="meniuc"><img src="img/veikejai/'.$apie['veikejas'].'-'.$apie[trans].'.png" alt="*"height="140" width="140"/>></div>';
    echo '<div class="meniu">
    
   Čia yra tavo visi  turimi už auksnius/kreditus pirkti veikėjai<br></div>';
echo '';
if($apie['omegab']-time() > 0){
  echo' <div class="meniuc">
<a href="?id=omega"><h3>Omega fusion cooler</h3></div>
 </a>
';
}
if($apie['finalgokub']-time() > 0){
  echo' <div class="meniuc">
<a href="?id=fgokas"><h3>Final goku gods</h3></div>
 </a>
';
}
if($apie['sidrab']-time() > 0){
  echo' <div class="meniuc">
<a href="?id=sidra"><h3>Sidra</h3></div>
 </a>
';
}
if($apie['blackb']-time() > 0){
  echo' <div class="meniuc">
<a href="?id=bgokas"><h3>Black Goku Rose</h3></div>
 </a>
';
}
if($apie['kaleb']-time() > 0){
  echo' <div class="meniuc">
<a href="?id=kale"><h3>Kale</h3></div>
 </a>
';
}
if($apie['hoppb']-time() > 0){
  echo' <div class="meniuc">
<a href="?id=hopp"><h3>Hopp</h3></div>
 </a>
';
}
else{
echo ' <div class="meniuc"><b><font color="red">Neturi daugiau jokiųveikėjų!</b></font></div>';}
 $g_n[] = array("pagrindinis.php?","Pagrindinis","vsaugykla.php?id=","Saugykla","Už auksinius/kreditus veikėjai");
	navigacija($g_n);


}
if($id == "angelai"){
	 online('Žiūri savo veikėjus');
   top('Angelų saugykla');
echo '<div class="meniuc"><img src="img/veikejai/'.$apie['veikejas'].'-'.$apie[trans].'.png" alt="*"height="140" width="140"/>></div>';
    echo '<div class="meniu">
    
   Čia yra tavo visi  turimi angelų veikėjai<br></div>';



if($apie['vadoseb']-time() > 0){
  echo' <div class="meniuc">
<a href="?id=vadose"><h3>Vadose</h3></div>
 </a>
';
}
if($apie['visasb']-time() > 0){
  echo' <div class="meniuc">
<a href="?id=visas"><h3>Visas</h3></div>
 </a>
';
}
if($apie['cusb']-time() > 0){
  echo' <div class="meniuc">
<a href="?id=cus"><h3>Cus</h3></div>
 </a>
';
}
if($apie['mojitob']-time() > 0){
  echo' <div class="meniuc">
<a href="?id=mojito"><h3>Mojito</h3></div>
 </a>
';
}
if($apie['cognacb']-time() > 0){
  echo' <div class="meniuc">
<a href="?id=cognac"><h3>Cognac</h3></div>
 </a>
';
}
if($apie['cukatailb']-time() > 0){
  echo' <div class="meniuc">
<a href="?id=cukatail"><h3>Cukatail</h3></div>
 </a>
';
}

else{
echo ' <div class="meniuc"><b><font color="red">Neturi daugiau jokių veikėjų!</b></font></div>';}

 $g_n[] = array("pagrindinis.php?","Pagrindinis","vsaugykla.php?id=","Saugykla","Angelų veikėjai");
	navigacija($g_n);


}



 
if($id == "naikintojai"){
	 online('Žiūri savo veikėjus');
   top('Naikintojų saugykla');
echo '<div class="meniuc"><img src="img/veikejai/'.$apie['veikejas'].'-'.$apie[trans].'.png" alt="*"height="140" width="140"/>></div>';
    echo '<div class="meniuc">
    
   Čia yra tavo visi  turimi naikintojų veikėjai<br></div>';
echo '';

if($apie['billsb']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=bills"><h3>Lord bills</h3></a><br></div>
';
}
if($apie['champab']-time() > 0){
  echo '
<div class="meniuc">
<a href="?id=champa"><h3>Champa</h3></div>
 </a>
';
}

if($apie['quitelab']-time() > 0){
  echo '
<div class="meniuc">
<a href="?id=quitela"><h3>Quitela</h3>
 </a><br></div>
';
}
if($apie['moscob']-time() > 0){
  echo '
<div class="meniuc">
<a href="?id=mosco"><h3>Mosco</h3>
</a><br></div>
';
}
if($apie['arackb']-time() > 0){
  echo '
<div class="meniuc">
<a href="?id=arack"><h3>Arack</h3>
</a><br></div>
';
}
if($apie['iwanb']-time() > 0){
  echo '
<div class="meniuc">
<a href="?id=iwan"><h3>Iwan</h3>
</a><br></div>
';
}
if($apie['geeneb']-time() > 0){
  echo '
<div class="meniuc">
<a href="?id=geene"><h3>Geene</h3>
</a><br></div>
';
}
if($apie['toppomb']-time() > 0){
  echo '
<div class="meniuc">
<a href="?id=toppo"><h3>Toppo</h3>
</a><br></div>
';
}


else{
echo ' <div class="meniuc"><b><font color="red">Neturi daugiau jokių veikėjų!</b></font></div>';}
 $g_n[] = array("pagrindinis.php?","Pagrindinis","vsaugykla.php?id=","Saugykla","Naikinimo veikejai");
	navigacija($g_n);
}


if($id == "sajanai"){
	 online('Žiūri savo veikėjus');
   top('Sajanų saugykla');
echo '<div class="meniuc"><img src="img/veikejai/'.$apie['veikejas'].'-'.$apie[trans].'.png" alt="*"height="140" width="140"/>></div>';
    echo '<div class="meniuc">
    
   Čia yra tavo visi  turimi sajanų veikėjai<br></div>';

if($apie['kabab']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=kaba"><h3>Kaba</h3></a><br></div>
';
}
if($apie['vegetab']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=vegeta"><h3>Vegeta gods</h3></a><br></div>
';
}
if($apie['gokasb']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=gokas"><h3>Gokas gods</h3></a><br></div>
';
}

if($apie['gokas20xb']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=gokas2"><h3>Gokas SSJGB Kaioken 20x</h3></a><br></div>
';
}
if($apie['gokasultrab']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=gokasultra"><h3>Gokas Ultra Instinct</h3></a><br></div>
';
}
if($apie['gokasultramb']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=gokasultram"><h3>Gokas Mastered Ultra Instinct</h3></a><br></div>
';
}
if($apie['ozarum']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=ozaru"><h3>Vegeta Ozaru</h3></a><br></div>
';
}
if($apie['gohanultrab']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=gohanultra"><h3>Gohanas Ultra Instinct</h3></a><br></div>
';
}
if($apie['vegetaultrab']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=vegetaultra"><h3>Vegeta Ultra Instinct</h3></a><br></div>
';
}
if($apie['vegitoultrab']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=vegitoultra"><h3>Vegito Ultra Instinct</h3></a><br></div>
';
}
else{
echo ' <div class="meniuc"><b><font color="red">Neturi daugiau jokių veikėjų!</b></font></div>';}
 $g_n[] = array("pagrindinis.php?","Pagrindinis","vsaugykla.php?id=","Saugykla","Sajanų veikėjai");
	navigacija($g_n);
}

if($id == "kiti"){
	 online('Žiūri savo veikėjus');
   top('Veikėjų saugykla');
echo '<div class="meniuc"><img src="img/veikejai/'.$apie['veikejas'].'-'.$apie[trans].'.png" alt="*"height="140" width="140"/>></div>';
    echo '<div class="meniuc">
    
   Čia yra tavo visi  turimi kiti unikalūs veikėjai<br></div>';

if($apie['magetab']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=botamo"><h3>Botamo</h3></a><br></div>
';
}
if($apie['buub']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=buu"><h3>Majin Buu</h3></a><br></div>
';
}
if($apie['babyb']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=baby"><h3>Baby Vegeta</h3></a><br></div>
';
}
if($apie['s17b']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=s17"><h3>Super Android 17</h3></a><br></div>
';
}
if($apie['goldozarub']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=gbaby"><h3>Gold Ozaru Baby</h3></a><br></div>
';
}
if($apie['fryzasb']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=fryzas"><h3>Gold Fryzas</h3></a><br></div>
';
}
if($apie['hitasb']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=hitas"><h3>Hitas</h3>  </a><br></div>
';
}
if($apie['maxfryzasb']-time() > 0){
echo '
<div class="titlec">
<a href="?id=fryzas2"><h3>MAX Power Gold Fryzas</h3></a><br></div>
';
}
if($apie['jirenb']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=jiren"><h3>Jiren</h3></a><br></div>
';
}
if($apie['jirenmb']-time() > 0){
  echo '
<div class="titlec">
<a href="?id=jirenm"><h3>Max Form Jiren</h3></a><br></div>
';
}
if($apie['keflab']-time() > 0){
	echo '
<div class="titlec">
<a href="?id=kefla"><h3>Kefla</h3></a><br></div>
';
}
else{
echo ' <div class="meniuc"><b><font color="red">Neturi daugiau jokių veikėjų!</b></font></div>';}

 $g_n[] = array("pagrindinis.php?","Pagrindinis","vsaugykla.php?id=","Saugykla","Kiti veikėjai");
	navigacija($g_n);
}

elseif($id == "cognac"){
	 online('Žiūri turimus veikėjus');
	top('Cognac');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b>Cognac</b><br/>
'.$ico2.' Jėga:<b> +3250%</b><br/>
'.$ico2.' Gynyba:<b> +3250%</b><br/>
'.$ico2.' Gyvybes:<b> +3250%</b><br/>


		<td>
		<img src="img/veikejai/Cognac-0.png" alt="IMG" height="140" width="140".png">
		</td>
		</tr>
		</table> </div>	

	';
if($apie['cognacb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_cognac">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla",  "Hopp");
	navigacija($g_n);

}

//// naikintoju užsidėjimas 
elseif($id == "uzsidedu_cognac"){
	 online('Užsideda turimą veikėją');
	 top('Cognac');
		if($apie['cognacb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['hoppb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Cognac-0.png" alt="IMG" height="140" width="140"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Cognac', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}


elseif($id == "hopp"){
	 online('Žiūri turimus veikėjus');
	top('Hopp');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b>Hopp</b><br/>
'.$ico2.' Jėga:<b> +700%</b><br/>
'.$ico2.' Gynyba:<b> +700%</b><br/>
'.$ico2.' Gyvybes:<b> +700%</b><br/>


		<td>
		<img src="img/veikejai/Hopp-0.png" alt="IMG" height="140" width="140".png">
		</td>
		</tr>
		</table> </div>	

	';
if($apie['hoppb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_hopp">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla",  "Hopp");
	navigacija($g_n);

}

//// naikintoju užsidėjimas 
elseif($id == "uzsidedu_hopp"){
	 online('Užsideda turimą veikėją');
	 top('Hopp');
		if($apie['hoppb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['hoppb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Hopp-0.png" alt="IMG" height="140" width="140"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Hopp', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}


elseif($id == "bills"){
	 online('Žiūri turimus veikėjus');
	top('Bills');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Lords Bills</b><br/>
'.$ico2.' Jėga:<b> +700%</b><br/>
'.$ico2.' Gynyba:<b> +700%</b><br/>
'.$ico2.' Gyvybes:<b> +700%</b><br/>


		<td>
		<img src="img/veikejai/Lord bills-0.png">
		</td>
		</tr>
		</table> </div>	

	';
if($apie['billsb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_bills">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
		if($apie['billsb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_bills">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=naikintojai", "Naikintojai", "Bills");
	navigacija($g_n);

}

elseif($id == "kefla"){
	top('Kefla');
	echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b>Kefla</b><br/>
'.$ico2.' Jėga:<b> +6500%</b><br/>
'.$ico2.' Gynyba:<b> +6500%</b><br/>
'.$ico2.' Gyvybes:<b> +6500%</b><br/>
'.$ico2.' Unikali savybė:  <font color="green">    <b> iš kovų gauna 15 kart daugiau <img src="img/bicons/pinigai.png" />    </b><br/></font>
</b><br/>

		<td>
		<img src="img/veikejai/Kefla-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="?id=uzsidedu_kefla">Užsidėti šį veikėją</a></b></div>
		
		
		';

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=kiti", "Kiti", "Kefla");
	navigacija($g_n);



}

elseif($id == "uzsidedu_kefla"){
	online('Užsideda turimą veikėją');
	top('Kefla');
	if($apie['keflab']-time() < 0){
		echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
	}
	if(($apie['sms_litai']) < '0'){

		echo'	<div class="meniuc">Klaida!</div> ';}
	if($apie['keflab']-time() > 0){

		echo'	<div class="meniuc"><br><img src="img/veikejai/Kefla-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';
		mysql_query("UPDATE zaidejai SET veikejas='Kefla', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=kiti", "Kiti", "Kefla");
	navigacija($g_n);

}



//// naikintoju užsidėjimas 
elseif($id == "uzsidedu_bills"){
	 online('Užsideda turimą veikėją');
	 top('Lord Bills');
		if($apie['billsb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['billsb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Lord bills-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Lord bills', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=naikintojai", "Naikintojai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_bills'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Lord bills-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_bills">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_bills"){
	 online('Parduoda turimą veikėją');
	 top('Lord Bills');
		if($apie['billsb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['billsb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Lord bills-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>300</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET billsb='0', sms_litai=sms_litai+'300',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=naikintojai", "Naikintojai", "Veikejo pardavimas");
	navigacija($g_n);
	
}




elseif($id == "champa"){
	 online('Žiūri turimus veikėjus');
	top('Champa');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Champa</b><br/>
'.$ico2.' Jėga:<b> +850%</b><br/>
'.$ico2.' Gynyba:<b> +850%</b><br/>
'.$ico2.' Gyvybes:<b> +850%</b><br/>


		<td>
		<img src="img/veikejai/Champa-0.png">
		</td>
		</tr>
		</table> </div>
	';
if($apie['champab']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_champa">Užsidėti šį veikėją</a></b><br/></div>
		';
}
				if($apie['champab']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_champa">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=naikintojai", "Naikintojai", "Champa");
	navigacija($g_n);

}


elseif($id == "uzsidedu_champa"){
	 online('Užsideda turimą veikėją');
	 top('Champa');
		if($apie['champab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}

if($apie['veikejas'] != 'Champa'){
echo' <div class="meniuc">	EROR</div>';

}

		if($apie['champab']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Champa-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Champa', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

if($uzsidedu_champa > 1){
echo' Taip negalima!';
$ti = time()+5;
	    mysql_query("INSERT INTO block SET nick = '$nick', uz='Nebugink!', kas_ban='SISTEMA', time='$ti'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=naikintojai", "Naikintojai", "Veikejo užsidėjimas");
	navigacija($g_n);
	}
if($id == 'apsauga_champa'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Champa-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_champa">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

/////unikaluscnew
elseif($id == "cukatail"){
	 online('Žiūri turimus veikėjus');
	top('Cukatail');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Cukatail</b><br/>
'.$ico2.' Jėga:<b> +5000%</b><br/>
'.$ico2.' Gynyba:<b> +5000%</b><br/>
'.$ico2.' Gyvybes:<b> +5000%</b><br/>


		<td>
		<img src="img/veikejai/Cukatail-0.png">
		</td>
		</tr>
		</table> </div>	

	';
if($apie['cukatailb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_cukatail">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=angelai", "Angelai", "Cukatail");
	navigacija($g_n);

}

//// naikintoju užsidėjimas 
elseif($id == "uzsidedu_cukatail"){
	 online('Užsideda turimą veikėją');
	 top('Cukatail');
		if($apie['cukatailb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['cukatailb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Cukatail-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Cukatail', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=sajanai", "Sajanai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}

elseif($id == "zamasu"){
	 online('Žiūri turimus veikėjus');
	top('Zamasu');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Zamasu</b><br/>
'.$ico2.' Jėga:<b> +8500%</b><br/>
'.$ico2.' Gynyba:<b> +8500%</b><br/>
'.$ico2.' Gyvybes:<b> +8500%</b><br/>


		<td>
		<img src="img/veikejai/Zamasu-0.png">
		</td>
		</tr>
		</table> </div>	

	';
if($apie['zamasub']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_zamasu">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=kiti", "Kiti", "Zamasu");
	navigacija($g_n);

}

//// naikintoju užsidėjimas 
elseif($id == "uzsidedu_zamasu"){
	 online('Užsideda turimą veikėją');
	 top('Zamasu');
		if($apie['zamasub']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['zamasub']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Zamasu-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Zamasu', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=kiti", "Kiti", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}




//// pardavimas
elseif($id == "parduoti_champa"){
	 online('Parduoda turimą veikėją');
	 top('Champa');
		if($apie['champab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['champab']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Champa-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>500</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET champab='0', sms_litai=sms_litai+'500',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}
elseif($id == "quitela"){
	 online('Žiūri turimus veikėjus');
	top('Quitela');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Quitela</b><br/>
'.$ico2.' Jėga:<b> +2000%</b><br/>
'.$ico2.' Gynyba:<b> +2000%</b><br/>
'.$ico2.' Gyvybes:<b> +2000%</b><br/>


		<td>
		<img src="img/veikejai/Quitela-0.png">
		</td>
		</tr>
		</table> </div>	

	';
if($apie['quitelab']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_quitela">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';
		}
		if($apie['quitelab']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_quitela">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=naikintojai", "Naikintojai", "Quitela");
	navigacija($g_n);

}


elseif($id == "uzsidedu_quitela"){
	 online('Užsideda turimą veikėją');
	 top('Quitela');
	if($apie['quitelab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	if($apie['veikejas'] >> 'Quitela'){
echo' <div class="meniuc">Šį veikėją jau esate užsidėjęs!</div>';

}
	if($apie['quitelab']-time() > 0){
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}


		
  

	echo'	<div class="meniuc"><br><img src="img/veikejai/Quitela-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
}

	mysql_query("UPDATE zaidejai SET veikejas='Quitela', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");



 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=naikintojai", "Naikintojai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_quitela'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Quitela-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_quitela">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_quitela"){
	 online('Parduoda turimą veikėją');
	 top('Quitela');
		if($apie['quitelab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['quitelab']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Quitela-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>1666</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET quitelab='0', sms_litai=sms_litai+'1666',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}
elseif($id == "mosco"){
	 online('Žiūri turimus veikėjus');
	top('Mosco');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Mosco</b><br/>
'.$ico2.' Jėga:<b> +2500%</b><br/>
'.$ico2.' Gynyba:<b> +2500%</b><br/>
'.$ico2.' Gyvybes:<b> +2500%</b><br/>


		<td>
		<img src="img/veikejai/Mosco-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['moscob']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_mosco">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
			if($apie['moscob']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_mosco">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=naikintojai", "Naikintojai", "Mosco");
	navigacija($g_n);

}


elseif($id == "uzsidedu_mosco"){
	 online('Užsideda turimą veikėją');
	 top('Mosco');
		if($apie['moscob']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}

						if($apie['moscob']-time() > 0){
	echo'	<div class="meniuc"><br><img src="img/veikejai/Mosco-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Mosco', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");


}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=naikintojai", "Naikintojai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_mosco'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Mosco-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_mosco">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_mosco"){
	 online('Parduoda turimą veikėją');
	 top('Mosco');
		if($apie['moscob']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['moscob']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Mosco-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>2333</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET moscob='0', sms_litai=sms_litai+'2333',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}
elseif($id == "arack"){
	 online('Žiūri turimus veikėjus');
	top('Arack');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Arack</b><br/>
'.$ico2.' Jėga:<b> +3000%</b><br/>
'.$ico2.' Gynyba:<b> +3000%</b><br/>
'.$ico2.' Gyvybes:<b> +3000%</b><br/>


		<td>
		<img src="img/veikejai/Arack-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['arackb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_arack">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
			if($apie['arackb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_arack">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=naikintojai", "Naikintojai", "Arack");
	navigacija($g_n);

}


elseif($id == "uzsidedu_arack"){
	 online('Užsideda turimą veikėją');
	 top('Arack');
		if($apie['arackb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['moscob']-time() > 0){
	echo'	<div class="meniuc"><br><img src="img/veikejai/Arack-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Arack', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=naikintojai", "Naikintojai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_arack'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Arack-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_arack">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_arack"){
	 online('Parduoda turimą veikėją');
	 top('Arack');
		if($apie['arackb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['arackb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Arack-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>5000</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET arackb='0', sms_litai=sms_litai+'5000',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}
//// Angelai uzsidejimas
elseif($id == "visas"){
	 online('Žiūri turimus veikėjus');
	top('Wiss');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Wiss</b><br/>
'.$ico2.' Jėga:<b> +1000%</b><br/>
'.$ico2.' Gynyba:<b> +1000%</b><br/>
'.$ico2.' Gyvybes:<b> +1000%</b><br/>


		<td>
		<img src="img/veikejai/Wiss-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['visasb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_visas">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
			if($apie['visasb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_visas">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=angelai", "Angelai", "Visas");
	navigacija($g_n);

}


elseif($id == "uzsidedu_visas"){
	 online('Užsideda turimą veikėją');
	 top('Wiss');
		if($apie['visasb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}

						if($apie['visasb']-time() > 0){
	echo'	<div class="meniuc"><br><img src="img/veikejai/Wiss-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Wiss', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=angelai", "Angelai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_visas'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Wiss-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_visas">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_visas"){
	 online('Parduoda turimą veikėją');
	 top('Visas');
		if($apie['visasb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['visasb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Wiss-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>666</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET visasb='0', sms_litai=sms_litai+'666',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}

elseif($id == "vadose"){
	 online('Žiūri turimus veikėjus');
	top('Vadose');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Vadose</b><br/>
'.$ico2.' Jėga:<b> +1200%</b><br/>
'.$ico2.' Gynyba:<b> +1200%</b><br/>
'.$ico2.' Gyvybes:<b> +1200%</b><br/>


		<td>
		<img src="img/veikejai/Vadose-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['vadoseb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_vadose">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
			if($apie['vadoseb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_vadose">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=angelai", "Angelai", "Vadose");
	navigacija($g_n);

}


elseif($id == "uzsidedu_vadose"){
	 online('Užsideda turimą veikėją');
	 top('Vadose');
		if($apie['visasb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}

						if($apie['vadoseb']-time() > 0){
	echo'	<div class="meniuc"><br><img src="img/veikejai/Vadose-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Vadose', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=angelai", "Angelai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_vadose'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Vadose-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_vadose">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}
elseif($id == "gokasultra"){
	 online('Žiūri turimus veikėjus');
	top('Gokas Ultra Instinct');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Gokas Ultra Instinct</b><br/>
'.$ico2.' Jėga:<b> +6000%</b><br/>
'.$ico2.' Gynyba:<b> +6000%</b><br/>
'.$ico2.' Gyvybes:<b> +6000%</b><br/>


		<td>
		<img src="img/veikejai/Gokas Ultra Instinct-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['gokasultrab']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_gokasultra">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=sajanai", "Sajanai", "Gokas Ultra Instinct");
	navigacija($g_n);

}


elseif($id == "uzsidedu_gokasultra"){
	 online('Užsideda turimą veikėją');
	 top('Gokas Ultra Instinct');
		if($apie['gokasultrab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}

						if($apie['gokasultrab']-time() > 0){
	echo'	<div class="meniuc"><br><img src="img/veikejai/Gokas Ultra Instinct-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Gokas Ultra Instinct', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=sajanai", "Sajanai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
elseif($id == "gokasultram"){
	 online('Žiūri turimus veikėjus');
	top('Gokas Mastered Ultra Instinct');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b><small> Gokas Mastered Ultra Instinct</b></small><br/>
'.$ico2.' Jėga:<b> +7000%</b><br/>
'.$ico2.' Gynyba:<b> +7000%</b><br/>
'.$ico2.' Gyvybes:<b> +7000%</b><br/>


		<td>
		<img src="img/veikejai/Gokas Mastered Ultra Instinct-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['gokasultramb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_gokasultram">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=sajanai", "Sajanai", "Gokas Mastered Ultra Instinct");
	navigacija($g_n);

}


elseif($id == "uzsidedu_gokasultram"){
	 online('Užsideda turimą veikėją');
	 top('Gokas Mastered Ultra Instinct');
		if($apie['gokasultramb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}

						if($apie['gokasultramb']-time() > 0){
	echo'	<div class="meniuc"><br><img src="img/veikejai/Gokas Mastered Ultra Instinct-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Gokas Mastered Ultra Instinct', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=sajanai", "Sajanai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
elseif($id == "gohanultra"){
	 online('Žiūri turimus veikėjus');
	top('Gohanas Ultra Instinct');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b><small> Gohanas Ultra Instinct</b></small><br/>
'.$ico2.' Jėga:<b> +10000%</b><br/>
'.$ico2.' Gynyba:<b> +10000%</b><br/>
'.$ico2.' Gyvybes:<b> +10000%</b><br/>


		<td>
		<img src="img/veikejai/Gohanas Ultra Instinct-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['gohanultrab']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_gohanultra">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=sajanai", "Sajanai", "Gohanas Ultra Instinct");
	navigacija($g_n);

}


elseif($id == "uzsidedu_gohanultra"){
	 online('Užsideda turimą veikėją');
	 top('Gohanas Ultra Instinct');
		if($apie['gohanultrab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}

						if($apie['gohanultrab']-time() > 0){
	echo'	<div class="meniuc"><br><img src="img/veikejai/Gohanas Ultra Instinct-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Gohanas Ultra Instinct', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=sajanai", "Sajanai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
elseif($id == "toppo"){
	 online('Žiūri turimus veikėjus');
	top('Toppo');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b><small> Toppo</b></small><br/>
'.$ico2.' Jėga:<b> +8000%</b><br/>
'.$ico2.' Gynyba:<b> +8000%</b><br/>
'.$ico2.' Gyvybes:<b> +8000%</b><br/>


		<td>
		<img src="img/veikejai/Toppo-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['toppomb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_toppo">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=naikintojai", "Naikintojai", "Toppo");
	navigacija($g_n);

}


elseif($id == "uzsidedu_toppo"){
	 online('Užsideda turimą veikėją');
	 top('Toppo');
		if($apie['toppomb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}

						if($apie['toppomb']-time() > 0){
	echo'	<div class="meniuc"><br><img src="img/veikejai/Toppo-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Toppo', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=sajanai", "Sajanai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
elseif($id == "jirenm"){
	 online('Žiūri turimus veikėjus');
	top('Max Form Jiren');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b><small> Max Form Jiren</b></small><br/>
'.$ico2.' Jėga:<b> +9000%</b><br/>
'.$ico2.' Gynyba:<b> +9000%</b><br/>
'.$ico2.' Gyvybes:<b> +9000%</b><br/>


		<td>
		<img src="img/veikejai/Max Form Jiren-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['jirenmb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_jirenm">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=kiti", "Kiti", "Jiren");
	navigacija($g_n);

}


elseif($id == "uzsidedu_jirenm"){
	 online('Užsideda turimą veikėją');
	 top('Max Form Jiren');
		if($apie['jirenmb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}

						if($apie['jirenmb']-time() > 0){
	echo'	<div class="meniuc"><br><img src="img/veikejai/Max Form Jiren-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Max Form Jiren', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=sajanai", "Sajanai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
elseif($id == "vegetaultra"){
	 online('Žiūri turimus veikėjus');
	top('Vegeta Ultra Instinct');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b><small> Vegeta Ultra Instinct</b></small><br/>
'.$ico2.' Jėga:<b> +12000%</b><br/>
'.$ico2.' Gynyba:<b> +12000%</b><br/>
'.$ico2.' Gyvybes:<b> +12000%</b><br/>


		<td>
		<img src="img/veikejai/Vegeta Ultra Instinct-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['vegetaultrab']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_vegetaultra">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=sajanai", "Sajanai", "Vegeta Ultra Instinct");
	navigacija($g_n);

}


elseif($id == "uzsidedu_vegetaultra"){
	 online('Užsideda turimą veikėją');
	 top('Vegeta Ultra Instinct');
		if($apie['vegetaultrab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}

						if($apie['vegetaultrab']-time() > 0){
	echo'	<div class="meniuc"><br><img src="img/veikejai/Vegeta Ultra Instinct-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Vegeta Ultra Instinct', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=sajanai", "Sajanai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
elseif($id == "vegitoultra"){
	 online('Žiūri turimus veikėjus');
	top('Vegito Ultra Instinct');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b><small> Vegito Ultra Instinct</b></small><br/>
'.$ico2.' Jėga:<b> +15000%</b><br/>
'.$ico2.' Gynyba:<b> +15000%</b><br/>
'.$ico2.' Gyvybes:<b> +15000%</b><br/>


		<td>
		<img src="img/veikejai/Vegito Ultra Instinct-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['vegitoultrab']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_vegitoultra">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=sajanai", "Sajanai", "Vegito Ultra Instinct");
	navigacija($g_n);

}


elseif($id == "uzsidedu_vegitoultra"){
	 online('Užsideda turimą veikėją');
	 top('Vegito Ultra Instinct');
		if($apie['vegitoultrab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}

						if($apie['vegitoultrab']-time() > 0){
	echo'	<div class="meniuc"><br><img src="img/veikejai/Vegito Ultra Instinct-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Vegito Ultra Instinct', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=sajanai", "Sajanai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}


elseif($id == "ozaru"){
	 online('Žiūri turimus veikėjus');
	top('Vegetq Ozaru');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Vegeta Ozaru</b><br/>
'.$ico2.' Jėga:<b> +1000%</b><br/>
'.$ico2.' Gynyba:<b> +1000%</b><br/>
'.$ico2.' Gyvybes:<b> +1000%</b><br/>


		<td>
		<img src="img/veikejai/Vegeta Ozaru-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['ozarum']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_ozaru">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=sajanai", "Sajanai", "Vegeta Ozaru");
	navigacija($g_n);

}


elseif($id == "uzsidedu_ozaru"){
	 online('Užsideda turimą veikėją');
	 top('Vegeta Ozaru');
		if($apie['ozarum']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}

						if($apie['ozarum']-time() > 0){
	echo'	<div class="meniuc"><br><img src="img/veikejai/Vegeta Ozaru-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Vegeta Ozaru', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=sajanai", "Sajanai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}

//// pardavimas
elseif($id == "parduoti_vadose"){
	 online('Parduoda turimą veikėją');
	 top('Vadose');
		if($apie['vadoseb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['vadoseb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Vadose-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>833</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET vadoseb='0', sms_litai=sms_litai+'833',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}
elseif($id == "cus"){
	 online('Žiūri turimus veikėjus');
	top('Cus');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Cus</b><br/>
'.$ico2.' Jėga:<b> +4000%</b><br/>
'.$ico2.' Gynyba:<b> +4000%</b><br/>
'.$ico2.' Gyvybes:<b> +4000%</b><br/>


		<td>
		<img src="img/veikejai/Cus-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['cusb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_cus">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
			if($apie['cusb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_cus">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=angelai", "Angelai", "Cus");
	navigacija($g_n);

}


elseif($id == "uzsidedu_cus"){
	 online('Užsideda turimą veikėją');
	 top('Cus');
		if($apie['cusb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}

						if($apie['cusb']-time() > 0){
	echo'	<div class="meniuc"><br><img src="img/veikejai/Cus-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Cus', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=angelai", "Angelai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_cus'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Cus-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_cus">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_cus"){
	 online('Parduoda turimą veikėją');
	 top('Champa');
		if($apie['cusb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['cusb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Cus-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>6666</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET cusb='0', sms_litai=sms_litai+'6666',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}
//// Sajanu uzsidejimas

elseif($id == "kaba"){
	 online('Žiūri turimus veikėjus');
	top('Kaba');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Kaba</b><br/>
'.$ico2.' Jėga:<b> +10%</b><br/>
'.$ico2.' Gynyba:<b> +10%</b><br/>
'.$ico2.' Gyvybes:<b> +10%</b><br/>


		<td>
		<img src="img/veikejai/Kaba-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['kabab']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_kaba">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
				if($apie['kabab']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_kaba">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=sajanai", "Sajanai", "Kaba");
	navigacija($g_n);

}


elseif($id == "uzsidedu_kaba"){
	 online('Užsideda turimą veikėją');
	 top('Kaba');
		if($apie['kabab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}

						if($apie['kabab']-time() > 0){
	echo'	<div class="meniuc"><br><img src="img/veikejai/Kaba-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Kaba', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=sajanai", "Sajanai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_kaba'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Kaba-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_kaba">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_kaba"){
	 online('Parduoda turimą veikėją');
	 top('Kaba');
		if($apie['kabab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['kabab']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Kaba-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>5</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET kabab='0', sms_litai=sms_litai+'5',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");

}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}
elseif($id == "vegeta"){
	 online('Žiūri turimus veikėjus');
	top('Vegeta Gods');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Vegeta Gods</b><br/>
'.$ico2.' Jėga:<b> +200%</b><br/>
'.$ico2.' Gynyba:<b> +200%</b><br/>
'.$ico2.' Gyvybes:<b> +200%</b><br/>


		<td>
		<img src="img/veikejai/Vegeta gods-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['vegetab']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_vegeta">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
				if($apie['vegetab']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_vegeta">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=angelai", "Angelai", "Vegeta Gods");
	navigacija($g_n);

}


elseif($id == "uzsidedu_vegeta"){
	 online('Užsideda turimą veikėją');
	 top('Vegeta Gods');
		if($apie['vegetab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['vegetab']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Vegeta gods-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Vegeta gods', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=angelai", "Angelai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_vegeta'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Vegeta gods-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_vegeta">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_vegeta"){
	 online('Parduoda turimą veikėją');
	 top('Vegeta');
		if($apie['vegetab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['vegetab']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Vegeta gods-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>133</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET vegetab='0', sms_litai=sms_litai+'133',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}
elseif($id == "gokas"){
	 online('Žiūri turimus veikėjus');
	top('Gokas Gods');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Gokas Gods</b><br/>
'.$ico2.' Jėga:<b> +250%</b><br/>
'.$ico2.' Gynyba:<b> +250%</b><br/>
'.$ico2.' Gyvybes:<b> +250%</b><br/>


		<td>
		<img src="img/veikejai/Goku Gods-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['gokasb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_gokas">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
			if($apie['gokasb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_gokas">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=angelai", "Angelai", "Gokas Gods");
	navigacija($g_n);

}


elseif($id == "uzsidedu_gokas"){
	 online('Užsideda turimą veikėją');
	 top('Gokas Gods');
		if($apie['gokasb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['gokasb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Goku Gods-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Goku Gods', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=angelai", "Angelai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_gokas'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Goku Gods-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_gokas">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_gokas"){
	 online('Parduoda turimą veikėją');
	 top('Goku Gods');
		if($apie['gokasb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['gokasb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Goku Gods-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>166</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET gokasb='0', sms_litai=sms_litai+'166',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}
elseif($id == "gokas2"){
	 online('Žiūri turimus veikėjus');
	top('Gokas');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Gokas SSJGB Kaioken 20x</b><br/>
'.$ico2.' Jėga:<b> +3000%</b><br/>
'.$ico2.' Gynyba:<b> +3000%</b><br/>
'.$ico2.' Gyvybes:<b> +3000%</b><br/>


		<td>
		<img src="img/veikejai/Gokas SSJGB Kaioken 20x-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['gokas20xb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_gokas2">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
			if($apie['gokas20xb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_gokas2">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=angelai", "Angelai", "Gokas");
	navigacija($g_n);

}


elseif($id == "uzsidedu_gokas2"){
	 online('Užsideda turimą veikėją');
	 top('Gokas');
		if($apie['gokas20xb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['gokas20xb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Gokas SSJGB Kaioken 20x-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Gokas SSJGB Kaioken 20x', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=angelai", "Angelai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_gokas20x'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Gokas SSJGB Kaioken 20x-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_gokas20x">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_gokas20x"){
	 online('Parduoda turimą veikėją');
	 top('Gokas 20x');
		if($apie['gokas20xb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['kabab']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Gokas SSJGB Kaioken 20x-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>3333</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET gokas20xb='0', sms_litai=sms_litai+'1333',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}
////kitu veikeju uzsidejimas

elseif($id == "botamo"){
	 online('Žiūri turimus veikėjus');
	top('Botamo');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Botamo</b><br/>
'.$ico2.' Jėga:<b> +20%</b><br/>
'.$ico2.' Gynyba:<b> +20%</b><br/>
'.$ico2.' Gyvybes:<b> +20%</b><br/>


		<td>
		<img src="img/veikejai/Botamo-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['magetab']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_botamo">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
				if($apie['magetab']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_botamo">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=kiti", "Kiti", "Botamo");
	navigacija($g_n);

}


elseif($id == "uzsidedu_botamo"){
	 online('Užsideda turimą veikėją');
	 top('Botamo');
		if($apie['magetab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['magetab']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Botamo-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Botamo', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=kiti", "Kiti", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_botamo'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Botamo-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_botamo">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_botamo"){
	 online('Parduoda turimą veikėją');
	 top('Botamo');
		if($apie['magetab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['magetab']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Botamo-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>10</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET magetab='0', sms_litai=sms_litai+'10',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");

}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}
elseif($id == "buu"){
	 online('Žiūri turimus veikėjus');
	top('Majin Buu');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Majin Buu</b><br/>
'.$ico2.' Jėga:<b> +30%</b><br/>
'.$ico2.' Gynyba:<b> +30%</b><br/>
'.$ico2.' Gyvybes:<b> +30%</b><br/>


		<td>
		<img src="img/veikejai/Majin Buu-0.png">
		</td>
		</tr>
		</table> </div>
		';
if($apie['buub']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_buu">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
			if($apie['buub']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_buu">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=kiti", "Kiti", "Majin buu");
	navigacija($g_n);

}


elseif($id == "uzsidedu_buu"){
	 online('Užsideda turimą veikėją');
	 top('Majin Buu');
		if($apie['buub']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}

						if($apie['buub']-time() > 0){
	echo'	<div class="meniuc"><br><img src="img/veikejai/Majin Buu-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Majin Buu', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=kiti", "Kiti", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_buu'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Majin Buu-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_buu">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_buu"){
	 online('Parduoda turimą veikėją');
	 top('Majin Buu');
		if($apie['buub']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['buub']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Majin Buu-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>15</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET buub='0', sms_litai=sms_litai+'15',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}

elseif($id == "baby"){
	 online('Žiūri turimus veikėjus');
	top('Baby Vegeta');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Baby Vegeta</b><br/>
'.$ico2.' Jėga:<b> +50%</b><br/>
'.$ico2.' Gynyba:<b> +50%</b><br/>
'.$ico2.' Gyvybes:<b> +50%</b><br/>


		<td>
		<img src="img/veikejai/Baby Vegeta-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['babyb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_baby">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
		if($apie['babyb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_baby">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=kiti", "Kiti", "Baby Vegeta");
	navigacija($g_n);

}


elseif($id == "uzsidedu_baby"){
	 online('Užsideda turimą veikėją');
	 top('Baby Vegeta');
		if($apie['babyb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['babyb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Baby Vegeta-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Baby Vegeta', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=kiti", "Kiti", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_baby'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Baby Vegeta-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_baby">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_baby"){
	 online('Parduoda turimą veikėją');
	 top('Baby Vegeta');
		if($apie['babyb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['babyb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Baby Vegeta-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>35</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET babyb='0', sms_litai=sms_litai+'35',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}
elseif($id == "s17"){
	 online('Žiūri turimus veikėjus');
	top('Super Android 17');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Super Android 17</b><br/>
'.$ico2.' Jėga:<b> +75%</b><br/>
'.$ico2.' Gynyba:<b> +75%</b><br/>
'.$ico2.' Gyvybes:<b> +75%</b><br/>


		<td>
		<img src="img/veikejai/Super Android 17-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['s17b']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_s17">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
			if($apie['s17b']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_s17">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=kiti", "Kiti", "Super Android 17");
	navigacija($g_n);

}


elseif($id == "uzsidedu_s17"){
	 online('Užsideda turimą veikėją');
	 top('Super Android 17');
		if($apie['s17b']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['s17b']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Super Android 17-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Super Android 17', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=kiti", "Kiti", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_s17'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Super Android 17-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_s17">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_s17"){
	 online('Parduoda turimą veikėją');
	 top('Super Android 17');
		if($apie['s17b']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['s17b']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Super Android 17-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>50</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET s17b='0', sms_litai=sms_litai+'50',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}

elseif($id == "dyspo"){
	 online('Žiūri turimus veikėjus');
	top('Dyspo');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b>Dyspo</b><br/>
'.$ico2.' Jėga:<b> +1500%</b><br/>
'.$ico2.' Gynyba:<b> +1500%</b><br/>
'.$ico2.' Gyvybes:<b> +1500%</b><br/>


		<td>
		<img src="img/veikejai/Dyspo-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['dyspob']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_dyspo">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
			if($apie['goldozarub']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_goldozaru">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=kiti", "Kiti", "Dyspo");
	navigacija($g_n);

}


elseif($id == "uzsidedu_dyspo"){
	 online('Užsideda turimą veikėją');
	 top('Dyspo');
		if($apie['dyspob']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['dyspob']-time() > 0){	
	echo'	<div class="meniuc"><br><img src="img/veikejai/Dyspo-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Dyspo', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=kiti", "Kiti", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_goldozaru'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Gold Ozaru Baby-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_goldozaru">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}







elseif($id == "gbaby"){
	 online('Žiūri turimus veikėjus');
	top('Gold Ozaru Baby');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Gold Ozaru Baby</b><br/>
'.$ico2.' Jėga:<b> +100%</b><br/>
'.$ico2.' Gynyba:<b> +100%</b><br/>
'.$ico2.' Gyvybes:<b> +100%</b><br/>


		<td>
		<img src="img/veikejai/Gold Ozaru Baby-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['goldozarub']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_gbaby">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
			if($apie['goldozarub']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_goldozaru">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=kiti", "Kiti", "Gold Ozaru Baby");
	navigacija($g_n);

}


elseif($id == "uzsidedu_gbaby"){
	 online('Užsideda turimą veikėją');
	 top('Gold Ozaru Baby');
		if($apie['goldozarub']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['goldozarub']-time() > 0){	
	echo'	<div class="meniuc"><br><img src="img/veikejai/Gold Ozaru Baby-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Gold Ozaru Baby', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=kiti", "Kiti", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_goldozaru'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Gold Ozaru Baby-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_goldozaru">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_goldozaru"){
	 online('Parduoda turimą veikėją');
	 top('Gold Ozaru Baby');
		if($apie['goldozarub']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['goldozarub']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Gold Ozaru Baby-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>65</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET goldozarub='0', sms_litai=sms_litai+'65',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}

elseif($id == "fryzas"){
	 online('Žiūri turimus veikėjus');
	top('Gold Fryzas');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Gold Fryzas</b><br/>
'.$ico2.' Jėga:<b> +150%</b><br/>
'.$ico2.' Gynyba:<b> +150%</b><br/>
'.$ico2.' Gyvybes:<b> +150%</b><br/>


		<td>
		<img src="img/veikejai/Gold Fryzas-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['fryzasb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_fryzas">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
			if($apie['fryzasb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_fryzas">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=kiti", "Kiti", "Gold Fryzas");
	navigacija($g_n);

}

if($id == "dievai"){
	 online('Žiūri savo veikėjus');
   top('DIEVAI');
echo '<div class="meniuc"><img src="img/veikejai/'.$apie['veikejas'].'-'.$apie[trans].'.png" alt="*"></div>';
    echo '<div class="meniu">
    
   Čia yra tavo visi  turimi SUPER DIEVAI veikėjai<br></div>';

if($apie['prestb']-time() > 0){
  echo' <div class="meniuc">
<a href="?id=prest"><h3>Grand Prest</h3></div>
 </a>
';
}
if($apie['zenob']-time() > 0){
  echo' <div class="meniuc">
<a href="?id=zeno"><h3>Zeno Sama</h3></div>
 </a>
';
}
if($apie['omnikingb']-time() > 0){
  echo' <div class="meniuc">
<a href="?id=omni"><h3>OmniKing</h3></div>
 </a>
';
}

else{
echo ' <div class="meniuc"><b><font color="red">Neturi daugiau jokių veikėjų!</b></font></div>';}

 $g_n[] = array("pagrindinis.php?","Pagrindinis","vsaugykla.php?id=","Saugykla","DIEVAI Veikėjai");
	navigacija($g_n);


}
elseif($id == "uzsidedu_fryzas"){
	 online('Užsideda turimą veikėją');
	 top('Gold Fryzas');
		if($apie['fryzasb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}

						if($apie['fryzasb']-time() > 0){
	echo'	<div class="meniuc"><br><img src="img/veikejai/Gold Fryzas-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Gold Fryzas', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=kiti", "Kiti", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_fryzas'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Gold Fryzas-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_fryzas">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_fryzas"){
	 online('Parduoda turimą veikėją');
	 top('Gold fryzas');
		if($apie['fryzasb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['fryzasb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Gold Fryzas-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>100</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET fryzasb='0', sms_litai=sms_litai+'100',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}
elseif($id == "hitas"){
	 online('Žiūri turimus veikėjus');
	top('Hitas');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Hitas</b><br/>
'.$ico2.' Jėga:<b> +350%</b><br/>
'.$ico2.' Gynyba:<b> +350%</b><br/>
'.$ico2.' Gyvybes:<b> +350%</b><br/>


		<td>
		<img src="img/veikejai/Hitas-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['hitasb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_hitas">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
			if($apie['hitasb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_hitas">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=kiti", "Kiti", "Hitas");
	navigacija($g_n);

}


elseif($id == "uzsidedu_hitas"){
	 online('Užsideda turimą veikėją');
	 top('Hitas');
		if($apie['hitasb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['hitasb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Hitas-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Hitas', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=kiti", "Kiti", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_hitas'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Hitas-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_hitas">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_hitas"){
	 online('Parduoda turimą veikėją');
	 top('Hitas');
		if($apie['hitasb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['hitasb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Hitas-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>230</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET hitasb='0', sms_litai=sms_litai+'230',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");

}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}

///mojito
elseif($id == "mojito"){
	 online('Žiūri turimus veikėjus');
	top('Mojito');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Mojito</b><br/>
'.$ico2.' Jėga:<b> +700%</b><br/>
'.$ico2.' Gynyba:<b> +700%</b><br/>
'.$ico2.' Gyvybes:<b> +700%</b><br/>


		<td>
		<img src="img/veikejai/Mojito-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['mojitob']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_mojito">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
				
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=angelai", "Angelai", "Mojito");
	navigacija($g_n);

}


elseif($id == "uzsidedu_mojito"){
	 online('Užsideda turimą veikėją');
	 top('Mojito');
		if($apie['mojitob']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['mojitob']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Mojito-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Mojito', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=angelai", "Angelai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
///Iwan
elseif($id == "iwan"){
	 online('Žiūri turimus veikėjus');
	top('Iwan');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Iwan</b><br/>
'.$ico2.' Jėga:<b> +1200%</b><br/>
'.$ico2.' Gynyba:<b> +1200%</b><br/>
'.$ico2.' Gyvybes:<b> +1200%</b><br/>


		<td>
		<img src="img/veikejai/Iwan-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['iwanb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_iwan">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=nakintojai", "Naikintojai", "Iwan");
	navigacija($g_n);

}


elseif($id == "uzsidedu_iwan"){
	 online('Užsideda turimą veikėją');
	 top('Iwan');
		if($apie['iwanb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['iwanb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Iwan-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Iwan', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=naikintojai", "Naikintojai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
///Geene
elseif($id == "geene"){
	 online('Žiūri turimus veikėjus');
	top('Geene');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Geene</b><br/>
'.$ico2.' Jėga:<b> +2000%</b><br/>
'.$ico2.' Gynyba:<b> +2000%</b><br/>
'.$ico2.' Gyvybes:<b> +2000%</b><br/>


		<td>
		<img src="img/veikejai/Geene-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['geeneb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_geene">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
				
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=nakintojai", "Naikintojai", "Geene");
	navigacija($g_n);

}


elseif($id == "uzsidedu_geene"){
	 online('Užsideda turimą veikėją');
	 top('Geene');
		if($apie['geeneb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['geeneb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Geene-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Geene', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=naikintojai", "Naikintojai", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
///PREST
elseif($id == "prest"){
	 online('Žiūri turimus veikėjus');
	top('Grand Prest');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Grand Prest</b><br/>
'.$ico2.' Jėga:<b> +6000%</b><br/>
'.$ico2.' Gynyba:<b> +6000%</b><br/>
'.$ico2.' Gyvybes:<b> +6000%</b><br/>


		<td>
		<img src="img/veikejai/Grand Prest-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['prestb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_prest">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=dievai", "DIEVAI", "Grand Prest");
	navigacija($g_n);

}


elseif($id == "uzsidedu_prest"){
	 online('Užsideda turimą veikėją');
	 top('Grand Prest');
		if($apie['prestb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['prestb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Grand Prest-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Grand Prest', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=dievai", "DIEVAI", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}

///ZENO SAMA
elseif($id == "zeno"){
	 online('Žiūri turimus veikėjus');
	top('Zeno Sama');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Zeno Sama</b><br/>
'.$ico2.' Jėga:<b> +10000%</b><br/>
'.$ico2.' Gynyba:<b> +10000%</b><br/>
'.$ico2.' Gyvybes:<b> +10000%</b><br/>


		<td>
		<img src="img/veikejai/Zeno Sama-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['zenob']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_zeno">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=dievai", "DIEVAI", "Zeno Sama");
	navigacija($g_n);

}

///Omni
elseif($id == "omni"){
	 online('Žiūri turimus veikėjus');
	top('OmniKing');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b>OmniKing</b><br/>
'.$ico2.' Jėga:<b> +15500%</b><br/>
'.$ico2.' Gynyba:<b> +15500%</b><br/>
'.$ico2.' Gyvybes:<b> +15500%</b><br/>


		<td>
		<img src="img/veikejai/Omniking-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['omnikingb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_omni">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=dievai", "DIEVAI", "Grand Prest");
	navigacija($g_n);

}


elseif($id == "uzsidedu_omni"){
	 online('Užsideda turimą veikėją');
	 top('OmniKing');
		if($apie['omnikingb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['omnikingb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Omniking-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='OmniKing', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=dievai", "DIEVAI", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}


elseif($id == "uzsidedu_zeno"){
	 online('Užsideda turimą veikėją');
	 top('Zeno Sama');
		if($apie['zenob']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['zenob']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Zeno Sama-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Zeno Sama', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=dievai", "DIEVAI", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
elseif($id == "fryzas2"){
	 online('Žiūri turimus veikėjus');
	top('MAX Power Gold Fryzas');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> MAX Power Gold Fryzas</b><br/>
'.$ico2.' Jėga:<b> +500%</b><br/>
'.$ico2.' Gynyba:<b> +500%</b><br/>
'.$ico2.' Gyvybes:<b> +500%</b><br/>


		<td>
		<img src="img/veikejai/MAX Power Gold Fryzas-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['maxfryzasb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_fryzas2">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
		if($apie['maxfryzasb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_maxfryzas">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=kiti", "Kiti", "MAX Power Gold Fryzas");
	navigacija($g_n);

}


elseif($id == "uzsidedu_fryzas2"){
	 online('Užsideda turimą veikėją');
	 top('MAX Power Gold Fryzas');
		if($apie['maxfryzasb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['maxfryzasb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/MAX Power Gold Fryzas-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='MAX Power Gold Fryzas', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=kiti", "Kiti", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_maxfryzas'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/MAX Power Gold Fryzas-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_maxfryzas">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_maxfryzas"){
	 online('Parduoda turimą veikėją');
	 top('MAX POWER FRYZAS');
		if($apie['maxfryzasb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['maxfryzasb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/MAX Power Gold Fryzas-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>330</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET maxfryzasb='0', sms_litai=sms_litai+'330',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}
elseif($id == "jiren"){
	 online('Žiūri turimus veikėjus');
	top('Jiren');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Jiren</b><br/>
'.$ico2.' Jėga:<b> +1500%</b><br/>
'.$ico2.' Gynyba:<b> +1500%</b><br/>
'.$ico2.' Gyvybes:<b> +1500%</b><br/>


		<td>
		<img src="img/veikejai/Jiren-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['jirenb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_jiren">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
	if($apie['jirenb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=apsauga_jiren">Parduoti šį veikėją</a></b><br/></div>
		
		
		';}	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=kiti", "Kiti", "Jiren");
	navigacija($g_n);

}


elseif($id == "uzsidedu_jiren"){
	 online('Užsideda turimą veikėją');
	 top('Jiren');
		if($apie['jirenb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['jirenb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Jiren-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Jiren', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=kiti", "Kiti", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
if($id == 'apsauga_jiren'){
	top(' Veikėjo pardavimas ');
	echo'	<div class="meniuc"><br><img src="img/veikejai/Jiren-0.png"></div>';

echo'<div class="meniuc">';
echo'Ar tikrai norite parduoti?<br>
<a href="?id=parduoti_jiren">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>'	;
	

echo'</div>';
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Veikėjo pardavimas");
	navigacija($g_n);
}

//// pardavimas
elseif($id == "parduoti_jiren"){
	 online('Parduoda turimą veikėją');
	 top('Jiren');
		if($apie['jirenb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['jirenb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Jiren-0.png"></div>
<font color="red"><div class="meniuc">Pardavei veikėją, gavai <b>1000</b>'.$eurui.'</div> </font>';		
	
mysql_query("UPDATE zaidejai SET jirenb='0', sms_litai=sms_litai+'1000',  kiek_unikaliu=kiek_unikaliu-'1'WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla","Veikejo pardavimas");
	navigacija($g_n);
	
}
///// uz auksnius
elseif($id == "omega"){
	 online('Žiūri turimus veikėjus');
	top('Omega');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Fusion Omega cooler</b><br/>
'.$ico2.' Jėga:<b> +15%</b><br/>
'.$ico2.' Gynyba:<b> +15%</b><br/>
'.$ico2.' Gyvybes:<b> +15%</b><br/>


		<td>
		<img src="img/veikejai/Fusion omega cooler-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['omegab']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_omega">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=aukskredai", "Atgal", "Omega");
	navigacija($g_n);

}


elseif($id == "uzsidedu_omega"){
	 online('Užsideda turimą veikėją');
	 top('Omega');
		if($apie['omegab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['jirenb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Fusion omega cooler-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Fusion omega cooler', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=aukskredai", "Atgal", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}

elseif($id == "fgokas"){
	 online('Žiūri turimus veikėjus');
	top('Final Goku gods');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Final goku gods</b><br/>
'.$ico2.' Jėga:<b> +1000%</b><br/>
'.$ico2.' Gynyba:<b> +1000%</b><br/>
'.$ico2.' Gyvybes:<b> +1000%</b><br/>


		<td>
		<img src="img/veikejai/Final goku gods-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['finalgokub']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_fgokas">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=aukskredai", "Atgal", "Final goku");
	navigacija($g_n);

}


elseif($id == "uzsidedu_fgokas"){
	 online('Užsideda turimą veikėją');
	 top('Final goku gods');
		if($apie['finalgokub']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['finalgokub']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Final goku gods-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Final goku gods', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=aukskredai", "Atgal", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}

elseif($id == "sidra"){
	 online('Žiūri turimus veikėjus');
	top('Sidra');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Sidra</b><br/>
'.$ico2.' Jėga:<b> +100%</b><br/>
'.$ico2.' Gynyba:<b> +100%</b><br/>
'.$ico2.' Gyvybes:<b> +100%</b><br/>


		<td>
		<img src="img/veikejai/Sidra-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['sidrab']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_sidra">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=aukskredai", "Atgal", "Sidra");
	navigacija($g_n);

}


elseif($id == "uzsidedu_sidra"){
	 online('Užsideda turimą veikėją');
	 top('Sidra');
		if($apie['sidrab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['jirenb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Sidra-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Sidra', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=aukskredai", "Atgal", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
elseif($id == "bgokas"){
	 online('Žiūri turimus veikėjus');
	top('Black Goku Rose');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Black Goku Rose</b><br/>
'.$ico2.' Jėga:<b> +200%</b><br/>
'.$ico2.' Gynyba:<b> +200%</b><br/>
'.$ico2.' Gyvybes:<b> +200%</b><br/>


		<td>
		<img src="img/veikejai/Black Goku Rose-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['blackb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_bgokas">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=aukskredai", "Atgal", "Black Goku Rose");
	navigacija($g_n);

}


elseif($id == "uzsidedu_bgokas"){
	 online('Užsideda turimą veikėją');
	 top('Black Goku Rose');
		if($apie['blackb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['blackb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Black Goku Rose-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Black Goku Rose', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=aukskredai", "Atgal", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}

elseif($id == "kale"){
	 online('Žiūri turimus veikėjus');
	top('Kale');
	if($apie['kaleb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Kale</b><br/>
'.$ico2.' Jėga:<b> +50%</b><br/>
'.$ico2.' Gynyba:<b> +50%</b><br/>
'.$ico2.' Gyvybes:<b> +50%</b><br/>


		<td>
		<img src="img/veikejai/Kale-0.png">
		</td>
		</tr>
		</table> </div>	
	';
if($apie['kaleb']-time() > 0){
  echo '
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="vsaugykla.php?id=uzsidedu_kale">Užsidėti šį veikėją</a></b><br/></div>
		
		
		';}
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų Saugykla", "vsaugykla.php?id=aukskredai", "Atgal", "Kale");
	navigacija($g_n);

}


elseif($id == "uzsidedu_kale"){
	 online('Užsideda turimą veikėją');
	 top('Kale');
		if($apie['kaleb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!</div> ';}
		if($apie['kaleb']-time() > 0){
				
	echo'	<div class="meniuc"><br><img src="img/veikejai/Kale-0.png"><br>
<font color="red">Užsidėjai sėkmingai</div> </font>';		
	mysql_query("UPDATE zaidejai SET veikejas='Kale', trans='0', sms_litai=sms_litai-'0' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vsaugykla.php","Veikėjų saugykla", "vsaugykla.php?id=aukskredai", "Atgal", "Veikejo užsidėjimas");
	navigacija($g_n);
	
}
foot();
?>









