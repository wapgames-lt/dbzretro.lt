<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();
$misija = mysql_fetch_assoc(mysql_query("SELECT * FROM misijos WHERE nick='$nick'"));
$inv = mysql_fetch_assoc(mysql_query("SELECT * FROM inv WHERE nick='$nick'"));
if($apie[lygis] < 70){
		top('Kaju planeta');
echo'<div class="meniuc"><img src="img/kaioshin.png"></br>Į kajų planeta galima tik nuo 70 lygio !</div>


';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Kaju planeta");
	navigacija($g_n);
}else{
		if($apie['k_laivas'] < '1' OR $apie['persikelimo_manevras'] <''){
		top('Kajų pleneta');
echo '<div class="meniuc"><img src=img/k_laivas.png></br></br>Tu neturi kosminio laivo, jį gali pasigaminti <b>Kapsulių korporacijoje</div>


';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Kaju planeta");
	navigacija($g_n);
}
else{
	
if($id == ''){
	top('Kaju planeta');
echo'<div class="meniuc"><img src="img/kaioshin.png">

</br>Sveikas '.statusas($nick).' Mes esame galingiausi valdovai kajai, atneš mum reikiamų daigtų ir mes tave treniruosime</div>
<div class="up">Misijos</div>
<div class="meniu"> '.$ico.' <a href="?id=neptuno">Neptuno dievo misija</a></br>
 '.$ico.' <a href="?id=west">Vakarų kajus</a></br>

 '.$ico.' <a href="?id=south">Pietų kajus</a></br>
 '.$ico.' <a href="?id=old">Senasis kajus</a></br>
 '.$ico.' <a href="?id=grand">Didysis kajus</a></br>
  '.$ico.' <a href="?id=gold">Vegeta Ozaru</a></br>
'.$ico.' <a href="?id=zkardas">Z kardas</a></div>


';	
	
	
	
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Kaju planeta");
	navigacija($g_n);
}

if($id == 'neptuno'){
top('Neptūno misija');
echo'<div class="meniuc"><img src="img/kajus.png"></div>
<div class="meniu">
<b>Norint įvygdyti misiją reike:</b></br>
<b>1.</b> 400 Pragaro vaisių</br>
<b>2.</b> 300 Stone </br>
<b>3.</b> 300 Microshem </br>
'.$ico2.'
<b>Atlygis:</b> 100  <img src="img/bicons/euro.png"> </div>
<div class="title">
'.$ico.'<a href="?id=neptuno2">Vygdyti misija </a></div>

';
	


   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kio.php", "Kaju planeta", "Neptūno misija");
	navigacija($g_n);
}
if($id == 'neptuno2'){
top('Neptūno misija');


		if($apie['neptunom']-time() < 0){
	       $timxx = time()+60*60*24*100;    


		
			if($inv['Pragarovaisius'] < 400 || $inv[Stone] < 300 || $inv[Microshem] < 300){
		echo'<div class="meniuc">Neturi pakankamai daigtu</div>';

	}else{
		
		echo'<div class="meniuc">Gavai 100<img src="img/bicons/euro.png"> </div>';
		$je = $jega *1.00;
		$gy = $gynyba *1.00;
		
		mysql_query("UPDATE zaidejai SET sms_litai=sms_litai+'100' WHERE nick='$nick'")or die(mysql_error());
		mysql_query("UPDATE inv SET Pragarovaisius=Pragarovaisius-'400', Stone=Stone-'300', Microshem=Microshem-'300' WHERE nick='$nick'")or die(mysql_error());

		///
mysql_query("UPDATE zaidejai SET neptunom='$timxx' WHERE nick='$nick' ");
///
	}
	}
elseif($apie['neptunom']-time() > 0){
                echo '<div class="meniuc">Tu jau įvygdei šią misiją!</div>';
            }

  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kio.php", "Kaju planeta", "Neptūno misija");
	navigacija($g_n);
}
if($id == 'west'){
top('Vakarų kajaus misija');
echo'<div class="meniuc"><img src="img/west.png"></div>
<div class="meniu">
<b>Norint įvygdyti misiją reike:</b></br>
<b>1.</b> 400 Power stone</br>
<b>2.</b> 200 Soul </br>
<b>3.</b> 400 Fussion fail </br>
'.$ico2.'
<b>Atlygis:</b> 150<img src="img/bicons/euro.png">    </div>
<div class="title">
'.$ico.'<a href="?id=west2">Vygdyti misija </a></div>

';
	


  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kio.php", "Kaju planeta", "Vakarų kajaus misija");
	navigacija($g_n);
}
if($id == 'west2'){
top('Vakarų kajaus misija');

		if($apie['vakarum']-time() < 0){
	       $timxx = time()+60*60*24*100;    
	if($inv['Fusionfail'] < 400 || $inv[Soul] < 200 || $inv[Powerstone] < 400){
		echo'<div class="meniuc">Neturi pakankamai daigtu</div>';
	}else{
		
		
		
		echo'<div class="meniuc">Gavai 150 <img src="img/bicons/euro.png"> </div>';
		$je = $jega *1.00;
		$gy = $gynyba *1.00;
		
		mysql_query("UPDATE zaidejai SET sms_litai=sms_litai+'150' WHERE nick='$nick'")or die(mysql_error());
		mysql_query("UPDATE inv SET Fusionfail=Fusionfail-'400', Soul=Soul-'200', Powerstone=Powerstone-'200' WHERE nick='$nick'")or die(mysql_error());
	mysql_query("UPDATE zaidejai SET vakarum='$timxx' WHERE nick='$nick' ");
///
	}	
	}
	
elseif($apie['vakarum']-time() > 0){
                echo '<div class="meniuc">Tu jau įvygdei šią misiją!</div>';
            }

  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kio.php", "Kaju planeta", "Vakarų kajaus misija");
	navigacija($g_n);}
if($id == 'old'){
top('Senojo kajaus misija');
echo'<div class="meniuc"><img src="img/old.png"></div><div class="meniu">
<b>Norint įvygdyti misiją reike:</b></br>
<b>1.</b> 150 Energy stone</br>
<b>2.</b> 250 Majin scroll </br>
<b>3.</b> 600 Soul </br>
'.$ico2.'
<b>Atlygis:</b> 200 <img src="img/bicons/euro.png">  </div>
<div class="title">
'.$ico.'<a href="?id=north2">Vygdyti misija </a></div>

';
	


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kio.php", "Kaju planeta", "Senajo kajaus misija");
	navigacija($g_n);
}
if($id == 'north2'){

top('Senojo kajaus misija');
	if($apie['senasism']-time() < 0){
	       $timxx = time()+60*60*24*100;    
	if($inv['Energystone'] < 150 || $inv[Majinsroll] < 250 || $inv[Soul] < 600){
		echo'<div class="meniuc">Neturi pakankamai daigtu</div>';
	}else{
		
		
		
		echo'<div class="meniuc">Gavai 200 <img src="img/bicons/euro.png"> </div>';
		$je = $jega *1.00;
		$gy = $gynyba *1.00;
		
		mysql_query("UPDATE zaidejai SET sms_litai=sms_litai+'200' WHERE nick='$nick'")or die(mysql_error());
		mysql_query("UPDATE inv SET Goldstone=Goldstone-'150',Majinsroll=Majinsroll-'250',Soul=Soul-'600' WHERE nick='$nick'")or die(mysql_error());
		mysql_query("UPDATE zaidejai SET senasism='$timxx' WHERE nick='$nick' ");
///
	}	}
	elseif($apie['senasism']-time() > 0){
                echo '<div class="meniuc">Tu jau įvygdei šią misiją!</div>';
            }


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kio.php", "Kaju planeta", "Senajo kajaus misija");
	navigacija($g_n);
}
if($id == 'south'){
top('Pietų kajaus misija');
echo'<div class="meniuc"><img src="img/soulth.png"></div><div class="meniu">
<b>Norint įvygdyti misiją reike:</b></br>
<b>1.</b> 400 Magic ball</br>
<b>2.</b> 200 Gold stone </br>
<b>3.</b> 400 Sayian tail </br>
'.$ico2.'
<b>Atlygis:</b> 250 <img src="img/bicons/euro.png"></div>
<div class="title">
'.$ico.'<a href="?id=south2">Vygdyti misija </a></div>

';
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kio.php", "Kaju planeta", "Pietų kajaus misija");
	navigacija($g_n);
}
if($id == 'south2'){
top('Pietų kajaus misija');

	if($apie['pietum']-time() < 0){
	       $timxx = time()+60*60*24*100;    
	if($inv['Magicball'] < 400 || $inv[Goldstone] < 200 || $inv[Sayiantail] < 400){
		echo'<div class="meniuc">Neturi pakankamai daigtu</div>';
	}else{
		
		
		
		echo'<div class="meniuc">Gavai  250 <img src="img/bicons/euro.png"></div>';
		$je = $jega *1.00;
		$gy = $gynyba *1.00;
		
		mysql_query("UPDATE zaidejai SET sms_litai=sms_litai+'250' WHERE nick='$nick'")or die(mysql_error());
		mysql_query("UPDATE inv SET Sayiantail=Sayiantail-'400',Goldstone=Goldstone-'200', Magicball=Magicball-'400'  WHERE nick='$nick'")or die(mysql_error());
		mysql_query("UPDATE zaidejai SET pietum='$timxx' WHERE nick='$nick' ");
///
	}
	}
	elseif($apie['pietum']-time() > 0){
                echo '<div class="meniuc">Tu jau įvygdei šią misiją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kio.php", "Kaju planeta", "Pietų kajaus misija");
	navigacija($g_n);
}
if($id == 'grand'){
top('Didžiojo kajaus misija');
echo'<div class="meniuc"><img src="img/grand.png"></div><div class="meniu">
<b>Norint įvygdyti misiją reike:</b></br>
<b>1.</b> 400 Energy stone</br>
<b>2.</b> 200 Majin scroll </br>
<b>3.</b> 400 Sayian tail </br>
'.$ico2.'
<b>Atlygis:</b> 300 <img src="img/bicons/euro.png">  </div>
<div class="title">
'.$ico.'<a href="?id=grand2">Vygdyti misija </a></div>

';
	


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kio.php", "Kaju planeta", "Didžiojo kajaus misija");
	navigacija($g_n);
}
if($id == 'grand2'){
top('Didžiojo kajaus misija');

		if($apie['didysism']-time() < 0){
	       $timxx = time()+60*60*24*100;    
		if($inv[Energystone] < 400 || $inv[Majinsroll] < 200 || $inv[Sayiantail] < 400){
		echo'<div class="meniuc">Neturi pakankamai daigtu</div>';
	}else{
		
		
		
		echo'<div class="meniuc">Gavai 300 <img src="img/bicons/euro.png"> </div>';
		$je = $jega *1.00;
		$gy = $gynyba *1.00;
		
		mysql_query("UPDATE zaidejai SET sms_litai=sms_litai+'300' WHERE nick='$nick'")or die(mysql_error());
		mysql_query("UPDATE inv SET Sayiantail=Sayiantail-'400',Majinsroll=Majinsroll-'200',Energystone=Energystone-'400' WHERE nick='$nick'")or die(mysql_error());
		mysql_query("UPDATE zaidejai SET didysism='$timxx' WHERE nick='$nick' ");
///
	}	}
	
elseif($apie['didysism']-time() > 0){
                echo '<div class="meniuc">Tu jau įvygdei šią misiją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kio.php", "Kaju planeta", "Didžiojo kajaus misija");
	navigacija($g_n);
}
if($id == 'gold'){
top('Vegeta Ozaru misija');
echo'<div class="meniuc"><img src="img/veikejai/Vegeta Ozaru-0.png"></div>
<div class="meniuc">
 Atnešk man 10000 Stone ir tapsi Vegeta Oazaru!</div>
<div class="meniuc">
'.$ico2.' <font color="green">Bonusai:</font><br>
'.$ico2.' Jėga:<b> +1000%</b><br/>
'.$ico2.' Gynyba:<b> +1000%</b><br/>
'.$ico2.' Gyvybes:<b> +1000%</b><br/>
</div><div class="line"></div>
<div class="titlec">
<a href="?id=gold2">Vygdyti misija </a></div>

';
	


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kio.php", "Kaju planeta", "Gold oozaru misija");
	navigacija($g_n);
}
if($id == 'gold2'){
top('Gold oozaru misija');

	if($apie['ozarum']-time() < 0){
	       $timxx = time()+60*60*24*1000;   
	if($inv['Stone'] < 9999){
echo'<div class="meniuc"><img src="img/veikejai/Vegeta Ozaru-0.png"></div>';
		echo'<div class="meniuc">Neturi pakankamai daigtų!</div>';
	}

	
elseif($apie[veikejas] == 'Vegeta Ozaru'){
		
				echo'<div class="meniuc">Tu jau esi <br>
<img src="img/veikejai/Vegeta Ozaru-0.png">
</div>';
	
}
	else{
		
		
		
		echo'<div class="meniuc"><img src="img/veikejai/Vegeta Ozaru-0.png"><br>Sėkmingai tapai Vegeta Ozaru!   </div>';
		
		
		mysql_query("UPDATE zaidejai SET veikejas='Vegeta Ozaru', trans='0' WHERE nick='$nick'")or die(mysql_error());
		mysql_query("UPDATE inv SET Stone=Stone-'10000' WHERE nick='$nick'")or die(mysql_error());
	
	    mysql_query("DELETE FROM transformacijos WHERE nick='$nick'");
		mysql_query("UPDATE zaidejai SET ozarum='$timxx', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick' ");
	}}
	
elseif($apie['ozarum']-time() > 0){
echo'<div class="meniuc"><img src="img/veikejai/Vegeta Ozaru-0.png"></div>';
                echo '<div class="meniuc">Tu jau įvygdei šią misiją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kio.php", "Kaju planeta", "Vegeta Ozaru misija");
	navigacija($g_n);
}
if($id == "zkardas"){
top('Z kardas');
echo '
<div class="meniuc"><img src="img/z-sword.jpg" width="150" height="100" border="1"></div>
<div class="meniuc">
Su Z kardu gausi <b>3 kartus daugiau</b> '.$pinigaii.' , Z kardą galima ištraukti nuo 120 lygio</div>

<div class="titlec"><a href="?id=traukti">Traukti kardą</a></div>';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kio.php", "Kaju planeta", "Z kardas");
	navigacija($g_n);
}
if($id == 'traukti'){
if($apie[lygis] < 119){
	top(Klaida);
echo'<div class="meniuc"><img src="img/z-sword.jpg" width="150" height="100" border="1"></div>';

	echo'<div class="titlec">Galima tik nuo 120 lygio</div>';
	
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kio.php", "Kaju planeta", "Z kardas");
	navigacija($g_n);
	
}
elseif($inv[zkardas] == 1){
	top(Klaida);
echo'<div class="meniuc"><img src="img/z-sword.jpg" width="150" height="100" border="1"></div>';
	echo'<div class="titlec">Jau turi Z kardą</div>';
	
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kio.php", "Kaju planeta", "Z kardas");
	navigacija($g_n);
	
}
else{
	top('Z kardas');
echo'<div class="meniuc"><img src="img/z-sword.jpg" width="150" height="100" border="1"></div>';
		echo'<div class="titlec">Ištraukei Z kardą</div>';
	mysql_query("UPDATE inv SET zkardas='1' WHERE nick='$nick'")
	;	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kio.php", "Kaju planeta", "Z kardas");
	navigacija($g_n);
	
}
}}}
 foot();
?>
