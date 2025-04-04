<?php
ob_start();
session_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
 $ii = mysql_fetch_assoc(mysql_query("SELECT * FROM tikslas WHERE nick = '$nick'"));

head2();
baneris();
topbar();
if($id == ""){
	top('Misijos');
   online('Misijos');
	  echo '<div class="meniuc"><img src="img/imgg/misijos.png"></div>';
 echo '<div class="meniuc">Pasirink misija, perėjas visas misijas igausi nemenkai statūsų, tad sėkmės</div>';
 echo'<div class="up">Pasirinkimas:</div>
   <div class="meniu">
   	
'.$dailyp.' <a href="daily.php?id="><font color="red"><b>Dienos Misijos</b></font></a>  <br/>  
   '.$dailypp.' <a href="mission/daily/view/index.php"><font color="red"><b>Legendinės Dienos Misijos</b></font></a>  <br/> 
<img src=img/aicon/misijos.png border="1" width="16" height="16"><a href="?id=tikslas">Žaidimo tikslas</a><br/>
<img src=img/aicon/misijos.png border="1" width="16" height="16"><a href="pasiekimai.php?id="><b><font color="red">Pasiekimai</b></font></a><br/>
<img src=img/aicon/misijos.png border="1" width="16" height="16"><a href="vmisijos.php?id=">Unikalių Veikėjų Misijos</a><br/>
  
<img src=img/aicon/misijos.png border="1" width="16" height="16"> <a href="sagos.php?id=">Sagų Progresas</a><br/>
<img src=img/aicon/misijos.png border="1" width="16" height="16"> <a href="kovu_misijos.php?id=">Kovų Misijos</a><br/>
<img src=img/aicon/misijos.png border="1" width="16" height="16"> <a href="kasimo_misijos.php?id=">Kasimo Misijos</a><br/>
<img src="img/aicon/misijos.png" alt="IMG" height="16" width="16"> <a href="istorija.php?id="><font color="red"><b>ŽAIDIMO ISTORIJA</b></font></a><br/>

   </div>';
			
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Misijos");
	navigacija($g_n);
}

if($id == "tikslas"){
	
	top("Žaidimo tikslas");
   online('Žaidimo tikslas');
	
	if(empty($ii[tikslas1])){
$a = "<img src='img/no.png'>";		
}else{
$a = "<img src='img/ok.png'>";		
}
		if(empty($ii[tikslas2])){
$b = "<img src='img/no.png'>";		
}else{
$b = "<img src='img/ok.png'>";		
}

		if(empty($ii[tikslas3])){
$c = "<img src='img/no.png'>";		
}else{
$c = "<img src='img/ok.png'>";		
}

		if(empty($ii[tikslas4])){
$d = "<img src='img/no.png'>";		
}else{
$d = "<img src='img/ok.png'>";		
}
		if(empty($ii[tikslas5])){
$e = "<img src='img/no.png'>";		
}else{
$e = "<img src='img/ok.png'>";		
}
		if(empty($ii[tikslas6])){
$f = "<img src='img/no.png'>";		
}else{
$f = "<img src='img/ok.png'>";		
}
		if(empty($ii[tikslas7])){
$g = "<img src='img/no.png'>";		
}else{
$g = "<img src='img/ok.png'>";		
}
		if(empty($ii[tikslas8])){
$h = "<img src='img/no.png'>";		
}else{
$h = "<img src='img/ok.png'>";		
}

		if(empty($ii[tikslas9])){
$i = "<img src='img/no.png'>";		
}else{
$i = "<img src='img/ok.png'>";		
}
		if(empty($ii[tikslas10])){
$k = "<img src='img/no.png'>";		
}else{
$k = "<img src='img/ok.png'>";		
}
	if(empty($ii[tikslas11])){
$j = "<img src='img/no.png'>";		
}else{
$j = "<img src='img/ok.png'>";		
}
	if(empty($ii[tikslas12])){
$l = "<img src='img/no.png'>";		
}else{
$l = "<img src='img/ok.png'>";		
}
if(empty($ii[tikslas13])){
$z = "<img src='img/no.png'>";		
}else{
$z = "<img src='img/ok.png'>";		
}
if(empty($ii[tikslas14])){
$m = "<img src='img/no.png'>";		
}else{
$m = "<img src='img/ok.png'>";		
}
if(empty($ii[tikslas15])){
$n = "<img src='img/no.png'>";		
}else{
$n = "<img src='img/ok.png'>";		
}
if(empty($ii[tikslas16])){
$p = "<img src='img/no.png'>";		
}else{
$p = "<img src='img/ok.png'>";		
}
	echo"<div class='meniuc'>Norint pasiekti žaidimo aukštumas, turite įvygdyti šiuos visus užsibrėžtus tikslus!<br></div>";
	echo'    <div class="meniu">  '.$a.' Sutaupyti 10 000 <img src="img/bicons/euro.png"></br>';
	echo''.$b.' Sutaupyti 1 <b><font color="red">trln.</font></b><img src="img/bicons/pinigai.png"></br>';
echo''.$c.' Pasiekti 15 000 <img src="img/bicons/pt.png"></br>';
echo''.$d.' Surinkti 50 000 <img src="img/bicons/malka.png"></br>';
echo''.$j.' Sugauti  30 000 <img src="img/bicons/zuvis.png"></br>';
	echo''.$e.' Pasiekti 100 <img src="img/bicons/lvl.png"></br>';
	echo''.$f.' Padaryti 200 000 <img src="img/bicons/attack1.png"></br>';
echo''.$l.' Padaryti per parą 30 000 <img src="img/bicons/attack1.png"></br>';
echo''.$h.' Sutaupyti 5 000 <img src="img/bicons/bitcoin.png"></br>';
	echo''.$k.' Įvygdyti 50 <img src="img/bicons/psk.png"></br>';
	echo''.$i.' Parašyti 2 000 <img src="img/bicons/sms.png"></br>';
echo''.$g.' Laimėti 100 kovų arenoje</br>';
echo''.$z.' Sutaupyti 600 000 <img src="img/bicons/auxo.png"></br>';
echo''.$m.' Įsigyti <b>Radarą</b> </br>';
echo''.$n.' Įsigyti <b>KG matuoklį</b> </br>';
echo''.$p.' Įsigyti <b>Kosminį Laivą</b> </br>';
	echo"</div>";
	
	
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","misijos.php","Misijos", "Žaidimo tikslas");
	navigacija($g_n);
}




if($id == 'rinkimasas'){
	top('Rinkimo misijos');
	online('Rinkimo misijos');
	$rinkimas= mysql_fetch_assoc(mysql_query("SELECT * FROM rinkimas WHERE id ='$apie[rinkimas]'"));
	echo'<div class="meniu">Vygdote '.$apie[rinkimas].'/600 užduočių</div><div class="meniuc">Reike : '.$rinkimas[reike1].' '.change($rinkimas[daigto1]).'  ir '.$rinkimas[reike2].' '.change($rinkimas[daigto2]).' Už tai gausite '.$rinkimas[atlygis_kiek].' '.ch($rinkimas[atlygis]).'</div>
	<div class="meniu">'.$ico.' <a href="?id=rinkimas2">Turiu viską ko reike</a>
	</div>';
	
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","misijos.php","Misijos", "Rinkimo misijos");
	navigacija($g_n);	
}
if($id == 'rinkimas2as'){
	top('Rinkimo misijos');
	online('Rinkimo misijos');
	$rinkimas= mysql_fetch_assoc(mysql_query("SELECT * FROM rinkimas WHERE id ='$apie[rinkimas]'"));
	if($inv[$rinkimas[daigto1]] < $rinkimas[reike1] or $inv[$rinkimas[daigto2]] < $rinkimas[reike2]){
		
		echo'<div class="meniuc">Nepakanka daigtų</div>';
	}
	else{
		
		echo'<div class="meniuc"> Gavai :'.$rinkimas[atlygis_kiek].' '.ch($rinkimas[atlygis]).'</div>';
		mysql_query("UPDATE zaidejai SET $rinkimas[atlygis]=$rinkimas[atlygis]+'$rinkimas[atlygis_kiek]', rinkimas=rinkimas+'1' WHERE nick='$nick'");
		mysql_query("UPDATE inv SET $rinkimas[daigto1]=$rinkimas[daigto1]-'$rinkimas[reike1]',$rinkimas[daigto2]=$rinkimas[daigto2]-'$rinkimas[reike2]'  WHERE nick='$nick'");
		
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","misijos.php","Misijos", "Rinkimo misijos");
	navigacija($g_n);	
}

 foot();
?>
