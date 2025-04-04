<?php
ob_start();

echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';

	  

   $prizas = $nust['sms_priz'];
	$prizas2 = round($nust['sms_priz']) / 2;
	$prizas3 = round($nust['sms_priz']) / 3;
 $statusai = array("Mod","Mod2","Mod3","Mod4","Admin");
$nst = mysql_fetch_assoc(mysql_query("SELECT * FROM turnyras"));
$new = mysql_fetch_assoc(mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT 1"));
$xd = mysql_query("SELECT * FROM zaidejai WHERE nick= $nick");
head2();
if($nust['new_time']-time() > 0){
    $q = mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT 1");
   
    while($row = mysql_fetch_assoc($q)){
        echo '<div class="meniuc">Padarytas atnaujinimas: '.$row[name].'</div>';
      
        unset($row);
    }
}
	   


baneris();
		topbar();

	
		
if(mysql_num_rows(mysql_query("SELECT * FROM kvietimai_i_komanda WHERE nick2='$nick'")) == true){
	echo"<div class='meniuc'><font color='red'>Dėmesio! Tu kviečiamas į ".$team_pakv['team']." komandą!</font><br>
	<a href='komanda.php?id=atmesti&ka=".$team_pakv['team']."'>Atmesti</a> <a href='komanda.php?id=priimti&ka=".$team_pakv['team']."'>Priimti</a>
	</div>";
	}
if($id == ""){
	 online('VIP Misijos');
   top('VIP Misijos');
    echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';

echo'<div class="up">'.$ico.'VIP Misijos</div>
<div class="meniuc">
<small><b><a href="?id=vip1"><img src="img/bicons/vip.png">VIP 1</a></b> | <a href="?id=vip3"><b><img src="img/bicons/vip.png">VIP 3</b>| <a href="?id=vip5"><b><img src="img/bicons/vip.png">VIP 5</b> |
<a href="?id=vip7"><b><img src="img/bicons/vip.png">VIP 7</b> |<a href="?id=vip10"><b><img src="img/bicons/vip.png">VIP 10</b> | <a href="?id=vip12"><b><img src="img/bicons/vip.png">VIP 12</b> | <a href="?id=vip15"><b><img src="img/bicons/vip.png">VIP 15</b> </small>

</div>
';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php","VIP", "VIP Misijos");
	navigacija($g_n);
}
if($id == "vip1"){
	 online('VIP Misijos');
   top('VIP Misijos');
    echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
if($inv['viplvl'] == 0){
     echo "<div class='meniuc'>Tu neturi <b>1 Lygio VIP</b>!</div>";}
else{
echo'<div class="up">'.$ico.'<img src="img/bicons/vip.png">1 VIP Misija</div>
<div class="meniuc">Misijai reikia:</div>
<div class="meniuc">
<b>30 '.$lvli.'</b> | <b>'.skaicius(30000).'</b>'.$attack2.' | <b>20</b>'.$eurui.'</div>


<div class="meniuc">
<b><a href="?id=vip1a">Vygdyti</a></b>

</div>
';
}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php","VIP", "VIP Misijos");
	navigacija($g_n);
}
if($id == 'vip1a'){
	top("Misijos vygdymas");
	
	

	if($apie[sms_litai] < 19){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Nepakanka $eurui !</div>";
			
}			
elseif($apie[lygis] < 29){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Neturi tokio $lvli !</div>";
			
}			
elseif($apie[veiksmai] < 29999){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Neturi tiek $attack2 !</div>";
			
}		
elseif($inv['viplvl']< 0){
     echo "<div class='meniuc'>Tu neturi <b>1 Lygio VIP</b>!</div>";}
	
elseif($apie['vip1m'] == '+'){
		echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
			echo'<div class="meniuc">Šią misiją jau esi įvygdęs!</div>';
		
	
}
			else{
			echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';	
			echo'<div class="meniuc">Įvygdei misiją sėkmingai! Gavai  <b>200 </b> '.$vipt.' !</div>';
			mysql_query("UPDATE zaidejai SET vip1m='+' WHERE nick='$nick'");
	
			mysql_query("UPDATE zaidejai SET vipticket=vipticket+'200', sms_litai=sms_litai-'20' WHERE nick='$nick'");
		
		
			}


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipm.php?id=","VIP Misijos","Misja");
navigacija($g_n);	
			
		}
if($id == "vip3"){
	 online('VIP Misijos');
   top('VIP Misijos');
    echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
if($inv['viplvl']< 2){
     echo "<div class='meniuc'>Tu neturi <b>3 Lygio VIP</b>!</div>";}
else{
echo'<div class="up">'.$ico.'<img src="img/bicons/vip.png">3 VIP Misija</div>
<div class="meniuc">Misijai reikia:</div>
<div class="meniuc">
<b>40 '.$lvli.'</b> | <b>'.skaicius(60000).'</b>'.$attack2.' | <b>40</b>'.$eurui.'</div>


<div class="meniuc">
<b><a href="?id=vip3a">Vygdyti</a></b>

</div>
';

}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php","VIP", "VIP Misijos");
	navigacija($g_n);
}
if($id == 'vip3a'){
	top("Misijos vygdymas");
	
	

	if($apie[sms_litai] < 39){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Nepakanka $eurui !</div>";
			
}			
elseif($apie[lygis] < 39){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Neturi tokio $lvli !</div>";
			
}			
elseif($apie[veiksmai] < 59999){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Neturi tiek $attack2 !</div>";
			
}		
elseif($inv['viplvl']< 2){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
     echo "<div class='meniuc'>Tu neturi <b>3 Lygio VIP</b>!</div>";}
	
elseif($apie['vip3m'] == '+'){
		echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
			echo'<div class="meniuc">Šią misiją jau esi įvygdęs!</div>';
		
	
}
			else{
			echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';	
			echo'<div class="meniuc">Įvygdei misiją sėkmingai! Gavai  <b>500 </b> '.$vipt.' !</div>';
			mysql_query("UPDATE zaidejai SET vip3m='+' WHERE nick='$nick'");
	
			mysql_query("UPDATE zaidejai SET vipticket=vipticket+'500', sms_litai=sms_litai-'40' WHERE nick='$nick'");
		
		
			}


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipm.php?id=","VIP Misijos","Misja");
navigacija($g_n);	
			
		}
if($id == "vip5"){
	 online('VIP Misijos');
   top('VIP Misijos');
    echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
if($inv['viplvl']< 4){
     echo "<div class='meniuc'>Tu neturi <b> 5 Lygio VIP</b>!</div>";}
else{
echo'<div class="up">'.$ico.'<img src="img/bicons/vip.png">5 VIP Misija</div>
<div class="meniuc">Misijai reikia:</div>
<div class="meniuc">
<b>50 '.$lvli.'</b> | <b>'.skaicius(100000).'</b>'.$attack2.' | <b>70</b>'.$eurui.'</div>


<div class="meniuc">
<b><a href="?id=vip5a">Vygdyti</a></b>

</div>
';
}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php","VIP", "VIP Misijos");
	navigacija($g_n);
}
if($id == 'vip5a'){
	top("Misijos vygdymas");
	
	

	if($apie[sms_litai] < 69 || $apie[lygis] < 49 ||$apie[veiksmai] < 99999){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Nepakanka $eurui, $lvli arba $attack2!</div>";
			
}			


elseif($inv['viplvl']< 4){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
     echo "<div class='meniuc'>Tu neturi <b>5 Lygio VIP</b>!</div>";}
	
elseif($apie['vip5m'] == '+'){
		echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
			echo'<div class="meniuc">Šią misiją jau esi įvygdęs!</div>';
		
	
}
			else{
			echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';	
			echo'<div class="meniuc">Įvygdei misiją sėkmingai! Gavai  <b>1,000 </b> '.$vipt.' !</div>';
			mysql_query("UPDATE zaidejai SET vip5m='+' WHERE nick='$nick'");
	
			mysql_query("UPDATE zaidejai SET vipticket=vipticket+'1000', sms_litai=sms_litai-'70'WHERE nick='$nick'");
		
		
			}


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipm.php?id=","VIP Misijos","Misja");
navigacija($g_n);	
			
		}
if($id == "vip7"){
	 online('VIP Misijos');
   top('VIP Misijos');
    echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
if($inv['viplvl']< 6){
     echo "<div class='meniuc'>Tu neturi <b> 7 Lygio VIP</b>!</div>";}
else{
echo'<div class="up">'.$ico.'<img src="img/bicons/vip.png">7 VIP Misija</div>
<div class="meniuc">Misijai reikia:</div>
<div class="meniuc">
<b>55 '.$lvli.'</b> | <b>'.skaicius(200000).'</b>'.$attack2.' | <b>120</b>'.$eurui.'</div>


<div class="meniuc">
<b><a href="?id=vip7a">Vygdyti</a></b>

</div>
';
}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php","VIP", "VIP Misijos");
	navigacija($g_n);
}
if($id == 'vip7a'){
	top("Misijos vygdymas");
	
	

	if($apie[sms_litai] < 119){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Nepakanka $eurui !</div>";
			
}			
elseif($apie[lygis] < 54){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Neturi tokio $lvli !</div>";
			
}			
elseif($apie[veiksmai] < 199999){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Neturi tiek $attack2 !</div>";
			
}		
elseif($inv['viplvl']< 6){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
     echo "<div class='meniuc'>Tu neturi <b>7 Lygio VIP</b>!</div>";}
	
elseif($apie['vip7m'] == '+'){
		echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
			echo'<div class="meniuc">Šią misiją jau esi įvygdęs!</div>';
		
	
}
			else{
			echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';	
			echo'<div class="meniuc">Įvygdei misiją sėkmingai! Gavai  <b>5,000 </b> '.$vipt.' !</div>';
			mysql_query("UPDATE zaidejai SET vip7m='+' WHERE nick='$nick'");
	
			mysql_query("UPDATE zaidejai SET vipticket=vipticket+'5000', sms_litai=sms_litai-'120' WHERE nick='$nick'");
		
		
			}


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipm.php?id=","VIP Misijos","Misja");
navigacija($g_n);	
			
		}
if($id == "vip10"){
	 online('VIP Misijos');
   top('VIP Misijos');
    echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
if($inv['viplvl']< 9){
     echo "<div class='meniuc'>Tu neturi <b> 10 Lygio VIP</b>!</div>";}
else{
echo'<div class="up">'.$ico.'<img src="img/bicons/vip.png">10 VIP Misija</div>
<div class="meniuc">Misijai reikia:</div>
<div class="meniuc">
<b>60 '.$lvli.'</b> | <b>'.skaicius(350000).'</b>'.$attack2.' | <b>200</b>'.$eurui.'</div>


<div class="meniuc">
<b><a href="?id=vip10a">Vygdyti</a></b>

</div>
';
}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php","VIP", "VIP Misijos");
	navigacija($g_n);
}
if($id == 'vip10a'){
	top("Misijos vygdymas");
	
	

	if($apie[sms_litai] < 199){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Nepakanka $eurui !</div>";
			
}			
elseif($apie[lygis] < 59){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Neturi tokio $lvli !</div>";
			
}			
elseif($apie[veiksmai] < 349999){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Neturi tiek $attack2 !</div>";
			
}		
elseif($inv['viplvl']< 9){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
     echo "<div class='meniuc'>Tu neturi <b>10 Lygio VIP</b>!</div>";}
	
elseif($apie['vip10m'] == '+'){
		echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
			echo'<div class="meniuc">Šią misiją jau esi įvygdęs!</div>';
		
	
}
			else{
			echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';	
			echo'<div class="meniuc">Įvygdei misiją sėkmingai! Gavai  <b>15,000 </b> '.$vipt.' !</div>';
			mysql_query("UPDATE zaidejai SET vip10m='+' WHERE nick='$nick'");
	
			mysql_query("UPDATE zaidejai SET vipticket=vipticket+'15000', sms_litai=sms_litai-'200'WHERE nick='$nick'");
		
		
			}


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipm.php?id=","VIP Misijos","Misja");
navigacija($g_n);	
			
		}
if($id == "vip12"){
	 online('VIP Misijos');
   top('VIP Misijos');
    echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
if($inv['viplvl']< 11){
     echo "<div class='meniuc'>Tu neturi <b> 12 Lygio VIP</b>!</div>";}
else{
echo'<div class="up">'.$ico.'<img src="img/bicons/vip.png">12 VIP Misija</div>
<div class="meniuc">Misijai reikia:</div>
<div class="meniuc">
<b>70 '.$lvli.'</b> | <b>'.skaicius(500000).'</b>'.$attack2.' | <b>400</b>'.$eurui.'</div>


<div class="meniuc">
<b><a href="?id=vip12a">Vygdyti</a></b>

</div>
';
}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php","VIP", "VIP Misijos");
	navigacija($g_n);
}
if($id == 'vip12a'){
	top("Misijos vygdymas");
	
	

	if($apie[sms_litai] < 399){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Nepakanka $eurui !</div>";
			
}			
elseif($apie[lygis] < 69){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Neturi tokio $lvli !</div>";
			
}			
elseif($apie[veiksmai] < 499999){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Neturi tiek $attack2 !</div>";
			
}		
elseif($inv['viplvl']< 11){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
     echo "<div class='meniuc'>Tu neturi <b>12 Lygio VIP</b>!</div>";}
	
elseif($apie['vip12m'] < '+'){
		echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
			echo'<div class="meniuc">Šią misiją jau esi įvygdęs!</div>';
		
	
}
			else{
			echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';	
			echo'<div class="meniuc">Įvygdei misiją sėkmingai! Gavai  <b>50,000 </b> '.$vipt.' !</div>';
			mysql_query("UPDATE zaidejai SET vip12m='+' WHERE nick='$nick'");
	
			mysql_query("UPDATE zaidejai SET vipticket=vipticket+'50000', sms_litai=sms_litai-'400'WHERE nick='$nick'");
		
		
			}


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipm.php?id=","VIP Misijos","Misja");
navigacija($g_n);	
			
		}
if($id == "vip15"){
	 online('VIP Misijos');
   top('VIP Misijos');
    echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
if($inv['viplvl']< 14){
     echo "<div class='meniuc'>Tu neturi <b> 15 Lygio VIP</b>!</div>";}
else{
echo'<div class="up">'.$ico.'<img src="img/bicons/vip.png">15 VIP Misija</div>
<div class="meniuc">Misijai reikia:</div>
<div class="meniuc">
<b>85 '.$lvli.'</b> | <b>'.skaicius(1000000).'</b>'.$attack2.' | <b>700</b>'.$eurui.'</div>


<div class="meniuc">
<b><a href="?id=vip15a">Vygdyti</a></b>

</div>
';
}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php","VIP", "VIP Misijos");
	navigacija($g_n);
}
if($id == 'vip15a'){
	top("Misijos vygdymas");
	
	

	if($apie[sms_litai] < 699){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Nepakanka $eurui !</div>";
			
}			
elseif($apie[lygis] < 84){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Neturi tokio $lvli !</div>";
			
}			
elseif($apie[veiksmai] < 999999){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
				echo"<div class='meniuc'>Neturi tiek $attack2 !</div>";
			
}		
elseif($inv['viplvl']< 14){
echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
     echo "<div class='meniuc'>Tu neturi <b>15 Lygio VIP</b>!</div>";}
	
elseif($apie['vip15m'] < '+'){
		echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';
			echo'<div class="meniuc">Šią misiją jau esi įvygdęs!</div>';
		
	
}
			else{
			echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';	
			echo'<div class="meniuc">Įvygdei misiją sėkmingai! Gavai  <b>100,000 </b> '.$vipt.' !</div>';
			mysql_query("UPDATE zaidejai SET vip15m='+' WHERE nick='$nick'");
	
			mysql_query("UPDATE zaidejai SET vipticket=vipticket+'100000', sms_litai=sms_litai-'700'WHERE nick='$nick'");
		
		
			}


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipm.php?id=","VIP Misijos","Misja");
navigacija($g_n);	
			
		}


foot();
