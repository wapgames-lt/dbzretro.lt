<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/config.php';;
include_once 'cfg/funkcijos.php';;
head2();
$zaidejai = mysql_fetch_assoc(mysql_query("SELECT * FROM zaidejai WHERE nick='$nick'"));
baneris();

topbar();
	if($id == ""){
	 online('Rudų keitykloje(bugina)');
   top('RudųKeitykla');
	
	
	echo'	<div class="meniuc">Čia gali pasirinkti kokias  <b>Rudas</b> išsikeisti!</div>
 <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>
	<div class="meniu">
	'.$ico.' <a href="?id=alavo">Keisti <b><img src="img/kasimas/alavo.png"height="16" width="16">Alavo</b> į '.$vipt.' VIP Ticketus</b></a></br>
	'.$ico.' <a href="?id=vario">Keisti <b><img src="img/kasimas/vario.png"height="16" width="16">Vario</b> į '.$vipt.' VIP Ticketus</b></a></br>
	'.$ico.' <a href="?id=kadmio">Keisti <b><img src="img/kasimas/kadmio.png"height="16" width="16">Kadmio</b> į '.$vipt.' VIP Ticketus</b></a></br>	
	'.$ico.' <a href="?id=cirkonio">Keisti <b><img src="img/kasimas/cirkonio.png"height="16" width="16">Cirkonio</b> į '.$vipt.' VIP Ticketus</b></a></br>
	'.$ico.' <a href="?id=gelezies">Keisti <b><img src="img/kasimas/gelezies.png"height="16" width="16">Geležies</b> į '.$vipt.' VIP Ticketus</b></a></br>
	'.$ico.' <a href="?id=sidabro">Keisti <b><img src="img/kasimas/sidabro.png"height="16" width="16">Sidabro</b> į '.$vipt.' VIP Ticketus</b></a></br>
	'.$ico.' <a href="?id=aukso">Keisti <b><img src="img/kasimas/aukso.png"height="16" width="16">Aukso</b> į '.$vipt.' VIP Ticketus</b></a></br>
	'.$ico.' <a href="?id=platinos">Keisti <b><img src="img/kasimas/platinos.png"height="16" width="16">Platinos</b> į '.$vipt.' VIP Ticketus</b></a></br>
	'.$ico.' <a href="?id=titano">Keisti <b><img src="img/kasimas/titano.png"height="16" width="16">Titano</b> į '.$vipt.' VIP Ticketus</b></a></br>
	'.$ico.' <a href="?id=osmio">Keisti <b><img src="img/kasimas/osmio.png"height="16" width="16">Osmio</b> į '.$vipt.' VIP Ticketus</b></a></br>
	'.$ico.' <a href="?id=mangano">Keisti <b><img src="img/kasimas/mangano.png"height="16" width="16">Mangano</b> į '.$vipt.' VIP Ticketus</b></a></br>
	'.$ico.' <a href="?id=anglies">Keisti <b><img src="img/kasimas/anglies.png"height="16" width="16">Anglies</b> į '.$vipt.' VIP Ticketus</b></a></br>
	'.$ico.' <a href="?id=mineralu">Keisti <b><img src="img/kasimas/mineralu.png"height="16" width="16">Mineralų</b> į '.$vipt.' VIP Ticketus</b></a></br>
	'.$ico.' <a href="?id=spato">Keisti <b><img src="img/kasimas/spato.png"height="16" width="16">Spato</b> į '.$vipt.' VIP Ticketus</b></a></br>
	'.$ico.' <a href="?id=kvarco">Keisti <b><img src="img/kasimas/kvarco.png"height="16" width="16">Kvarco</b> į '.$vipt.' VIP Ticketus</b></a></br>
	</div>
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","Rudų keitykla ");
	navigacija($g_n);
		}

if($id == "alavo"){
	 online('Rudų Keitykloje');
   top('Rudų keitykla');
	
	echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimas <b><img src="img/kasimas/alavo.png"height="16" width="16">Alavo rudas</b> į <b>'.$vipt.' VIP Ticketus</b>!</div>
	<div class="meniuc">
300 <b><img src="img/kasimas/alavo.png"height="16" width="16">Alavo ruda</b> - 200 <b>'.$vipt.' VIP TICKET</b>!</div>
<div class="meniuc">
Turi <b>'.$inv['alavas'].' <img src="img/kasimas/alavo.png"height="16" width="16"></b></div>
<div class="meniuc">Gali parduoti: <b>'.sk($inv['alavas']/300).'</b> kartų.</div>
<div class="meniuc">
<form action="?id=alavo2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
		}
elseif($id == "alavo2"){
    online('Rudų Keitykloje');
    top("Keičiasi rudas");
  
   
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*300;
		    $kiekv= $kiekv*200;
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv['alavas']){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/kasimas/alavo.png"height="16" width="16"> Alavo rūdų</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/kasimas/alavo.png"height="16" width="16">Alavo rūdų</b>, Gavai '.$kiekv.' <b>'.$vipt.' VIP TICKET</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET alavas=alavas-'$kainn' WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET vipticket=vipticket+'$kiekv' WHERE nick='$nick' ");

			  }   
		 }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
    }


if($id == "vario"){
	 online('Rudų Keitykloje');
   top('Rudų keitykla');
	
	echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimas <b><img src="img/kasimas/vario.png"height="16" width="16">Variū rūdas</b> į <b>'.$vipt.' VIP Ticketus</b>!</div>
	<div class="meniuc">
300 <b><img src="img/kasimas/vario.png"height="16" width="16">Vario ruda</b> - 250 <b>'.$vipt.' VIP TICKET</b>!</div>
<div class="meniuc">
Turi <b>'.$inv['varis'].' <img src="img/kasimas/vario.png"height="16" width="16"></b></div>
<div class="meniuc">Gali parduoti: <b>'.sk($inv['varis']/300).'</b> kartų.</div>

<div class="meniuc">
<form action="?id=vario2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
		}
elseif($id == "vario2"){
    online('Rudų Keitykloje');
    top("Keičiasi rudas");
  
   
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*300;
		    $kiekv= $kiekv*250;
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv['varis']){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/kasimas/vario.png"height="16" width="16"> Vario rūdų</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/kasimas/vario.png"height="16" width="16">Vario rūdų</b>, Gavai '.$kiekv.' <b>'.$vipt.' VIP TICKET</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET varis=varis-'$kainn' WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET vipticket=vipticket+'$kiekv' WHERE nick='$nick' ");

			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
    }
if($id == "kadmio"){
	 online('Rudų Keitykloje');
   top('Rudų keitykla');
	
	echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimas <b><img src="img/kasimas/kadmio.png"height="16" width="16">Kadmio rūdas</b> į <b>'.$vipt.' VIP Ticketus</b>!</div>
	<div class="meniuc">
300 <b><img src="img/kasimas/kadmio.png"height="16" width="16">Kadmio rūda</b> - 300 <b>'.$vipt.' VIP TICKET</b>!</div>
<div class="meniuc">
Turi <b>'.$inv['kadmis'].' <img src="img/kasimas/kadmio.png"height="16" width="16"></b></div>
<div class="meniuc">Gali parduoti: <b>'.sk($inv['kadmis']/300).'</b> kartų.</div>

<div class="meniuc">
<form action="?id=kadmio2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
		}
elseif($id == "kadmio2"){
    online('Rudų Keitykloje');
    top("Keičiasi rudas");
  
   
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*300;
		    $kiekv= $kiekv*300;
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv['kadmis']){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/kasimas/kadmio.png"height="16" width="16"> Kadmio rūdų</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/kasimas/kadmio.png"height="16" width="16">Kadmio rūdų</b>, Gavai '.$kiekv.' <b>'.$vipt.' VIP TICKET</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET kadmis=kadmis-'$kainn' WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET vipticket=vipticket+'$kiekv' WHERE nick='$nick' ");

			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
    }

if($id == "cirkonio"){
	 online('Rudų Keitykloje');
   top('Rudų keitykla');
	
	echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimas <b><img src="img/kasimas/cirkonio.png"height="16" width="16">Cirkonio rūdas</b> į <b>'.$vipt.' VIP Ticketus</b>!</div>
	<div class="meniuc">
300 <b><img src="img/kasimas/cirkonio.png"height="16" width="16">Alavo ruda</b> - 200 <b>'.$vipt.' VIP TICKET</b>!</div>
<div class="meniuc">
Turi <b>'.$inv['cirkonis'].' <img src="img/kasimas/cirkonio.png"height="16" width="16"></b></div>
<div class="meniuc">Gali parduoti: <b>'.sk($inv['cirkonis']/300).'</b> kartų.</div>
<div class="meniuc">
<form action="?id=cirkonio2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
		}
elseif($id == "cirkonio2"){
    online('Rudų Keitykloje');
    top("Keičiasi rudas");
  
   
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*300;
		    $kiekv= $kiekv*400;
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv['cirkonis']){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/kasimas/cirkonio.png"height="16" width="16"> Cirkonio rūdų</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/kasimas/cirkonio.png"height="16" width="16">Cirkonio rūdų</b>, Gavai '.$kiekv.' <b>'.$vipt.' VIP TICKET</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET cirkonis=cirkonis-'$kainn' WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET vipticket=vipticket+'$kiekv' WHERE nick='$nick' ");

			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
    }
if($id == "gelezies"){
	 online('Rudų Keitykloje');
   top('Rudų keitykla');
	$ruda ='Geležies';
$ruda2='gelezies';
$ruda3='gelezis';
	echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimas <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdas</b> į <b>'.$vipt.' VIP Ticketus</b>!</div>
	<div class="meniuc">
300 <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' ruda</b> - 500 <b>'.$vipt.' VIP TICKET</b>!</div>
<div class="meniuc">
Turi <b>'.$inv[$ruda3].' <img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"></b></div>
<div class="meniuc">Gali parduoti: <b>'.sk($inv['gelezis']/300).'</b> kartų.</div>
<div class="meniuc">
<form action="?id='.$ruda2.'2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
		}
elseif($id == "gelezies2"){
    online('Rudų Keitykloje');
    top("Keičiasi rudas");
  
   $ruda ='Geležies';
$ruda2='gelezies';
$ruda3='gelezis';
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*300;
		    $kiekv= $kiekv*500;
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv[$ruda3]){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"> '.$ruda.' rūdų</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdų</b>, Gavai '.$kiekv.' <b>'.$vipt.' VIP TICKET</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET $ruda3=$ruda3-'$kainn' WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET vipticket=vipticket+'$kiekv' WHERE nick='$nick' ");

			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
    }

if($id == "sidabro"){
	 online('Rudų Keitykloje');
   top('Rudų keitykla');
	$ruda ='Sidabro';
$ruda2='sidabro';
$ruda3='sidabras';
	echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimas <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdas</b> į <b>'.$vipt.' VIP Ticketus</b>!</div>
	<div class="meniuc">
300 <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' ruda</b> - 700 <b>'.$vipt.' VIP TICKET</b>!</div>
<div class="meniuc">
Turi <b>'.$inv[$ruda3].' <img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"></b></div>
<div class="meniuc">Gali parduoti: <b>'.sk($inv['sidabras']/300).'</b> kartų.</div>
<div class="meniuc">
<form action="?id='.$ruda2.'2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
		}
elseif($id == "sidabro2"){
    online('Rudų Keitykloje');
    top("Keičiasi rudas");
  
   $ruda ='Sidabro';
$ruda2='sidabro';
$ruda3='sidabras';
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*300;
		    $kiekv= $kiekv*700;
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv[$ruda3]){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"> '.$ruda.' rūdų</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdų</b>, Gavai '.$kiekv.' <b>'.$vipt.' VIP TICKET</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET $ruda3=$ruda3-'$kainn' WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET vipticket=vipticket+'$kiekv' WHERE nick='$nick' ");

			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
    }

if($id == "aukso"){
	 online('Rudų Keitykloje');
   top('Rudų keitykla');
	$ruda ='aukso';
$ruda2='aukso';
$ruda3='auksas';
	echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimas <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdas</b> į <b>'.$vipt.' VIP Ticketus</b>!</div>
	<div class="meniuc">
300 <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' ruda</b> - 900 <b>'.$vipt.' VIP TICKET</b>!</div>
<div class="meniuc">
Turi <b>'.$inv[$ruda3].' <img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"></b></div>
<div class="meniuc">Gali parduoti: <b>'.sk($inv['auksas']/300).'</b> kartų.</div>
<div class="meniuc">
<form action="?id='.$ruda2.'2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
		}
elseif($id == "aukso2"){
    online('Rudų Keitykloje');
    top("Keičiasi rudas");
  
$ruda ='aukso';
$ruda2='aukso';
$ruda3='auksas';
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*300;
		    $kiekv= $kiekv*900;
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv[$ruda3]){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"> '.$ruda.' rūdų</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdų</b>, Gavai '.$kiekv.' <b>'.$vipt.' VIP TICKET</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET $ruda3=$ruda3-'$kainn' WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET vipticket=vipticket+'$kiekv' WHERE nick='$nick' ");

			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
    }

if($id == "platinos"){
	 online('Rudų Keitykloje');
   top('Rudų keitykla');
	$ruda ='platinos';
$ruda2='platinos';
$ruda3='platina';
	echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimas <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdas</b> į <b>'.$vipt.' VIP Ticketus</b>!</div>
	<div class="meniuc">
300 <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' ruda</b> - 1100 <b>'.$vipt.' VIP TICKET</b>!</div>
<div class="meniuc">
Turi <b>'.$inv[$ruda3].' <img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"></b></div>
<div class="meniuc">Gali parduoti: <b>'.sk($inv['platina']/300).'</b> kartų.</div>

<div class="meniuc">
<form action="?id='.$ruda2.'2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
		}
elseif($id == "platinos2"){
    online('Rudų Keitykloje');
    top("Keičiasi rudas");
  
$ruda ='platinos';
$ruda2='platinos';
$ruda3='platina';
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*300;
		    $kiekv= $kiekv*1100;
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv[$ruda3]){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"> '.$ruda.' rūdų</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdų</b>, Gavai '.$kiekv.' <b>'.$vipt.' VIP TICKET</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET $ruda3=$ruda3-'$kainn' WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET vipticket=vipticket+'$kiekv' WHERE nick='$nick' ");

			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
    }


if($id == "titano"){
	 online('Rudų Keitykloje');
   top('Rudų keitykla');
	$ruda ='titano';
$ruda2='titano';
$ruda3='titanas';
	echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimas <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdas</b> į <b>'.$vipt.' VIP Ticketus</b>!</div>
	<div class="meniuc">
300 <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' ruda</b> - 1300 <b>'.$vipt.' VIP TICKET</b>!</div>
<div class="meniuc">
Turi <b>'.$inv[$ruda3].' <img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"></b></div>
<div class="meniuc">Gali parduoti: <b>'.sk($inv['titanas']/300).'</b> kartų.</div>
<div class="meniuc">
<form action="?id='.$ruda2.'2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
		}
elseif($id == "titano2"){
    online('Rudų Keitykloje');
    top("Keičiasi rudas");
  
$ruda ='titano';
$ruda2='titano';
$ruda3='titanas';
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*300;
		    $kiekv= $kiekv*1300;
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv[$ruda3]){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"> '.$ruda.' rūdų</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdų</b>, Gavai '.$kiekv.' <b>'.$vipt.' VIP TICKET</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET $ruda3=$ruda3-'$kainn' WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET vipticket=vipticket+'$kiekv' WHERE nick='$nick' ");

			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
    }

if($id == "osmio"){
	 online('Rudų Keitykloje');
   top('Rudų keitykla');
	$ruda ='osmio';
$ruda2='osmio';
$ruda3='osmis';
	echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimas <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdas</b> į <b>'.$vipt.' VIP Ticketus</b>!</div>
	<div class="meniuc">
300 <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' ruda</b> - 1500 <b>'.$vipt.' VIP TICKET</b>!</div>
<div class="meniuc">
Turi <b>'.$inv[$ruda3].' <img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"></b></div>
<div class="meniuc">Gali parduoti: <b>'.sk($inv['osmis']/300).'</b> kartų.</div>
<div class="meniuc">
<form action="?id='.$ruda2.'2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
		}
elseif($id == "osmio2"){
    online('Rudų Keitykloje');
    top("Keičiasi rudas");
	$ruda ='osmio';
$ruda2='osmio';
$ruda3='osmis';
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*300;
		    $kiekv= $kiekv*1500;
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv[$ruda3]){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"> '.$ruda.' rūdų</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdų</b>, Gavai '.$kiekv.' <b>'.$vipt.' VIP TICKET</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET $ruda3=$ruda3-'$kainn' WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET vipticket=vipticket+'$kiekv' WHERE nick='$nick' ");

			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
    }


if($id == "mangano"){
	 online('Rudų Keitykloje');
   top('Rudų keitykla');
	$ruda ='mangano';
$ruda2='mangano';
$ruda3='manganas';
	echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimas <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdas</b> į <b>'.$vipt.' VIP Ticketus</b>!</div>
	<div class="meniuc">
300 <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' ruda</b> - 1700 <b>'.$vipt.' VIP TICKET</b>!</div>
<div class="meniuc">
Turi <b>'.$inv[$ruda3].' <img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"></b></div>
<div class="meniuc">Gali parduoti: <b>'.sk($inv[$ruda3]/300).'</b> kartų.</div>
<div class="meniuc">
<form action="?id='.$ruda2.'2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
		}
elseif($id == "mangano2"){
    online('Rudų Keitykloje');
    top("Keičiasi rudas");
$ruda ='mangano';
$ruda2='mangano';
$ruda3='manganas';
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*300;
		    $kiekv= $kiekv*1700;
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv[$ruda3]){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"> '.$ruda.' rūdų</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdų</b>, Gavai '.$kiekv.' <b>'.$vipt.' VIP TICKET</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET $ruda3=$ruda3-'$kainn' WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET vipticket=vipticket+'$kiekv' WHERE nick='$nick' ");

			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
    }

if($id == "anglies"){
	 online('Rudų Keitykloje');
   top('Rudų keitykla');
	$ruda ='anglies';
$ruda2='anglies';
$ruda3='anglis';
	echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimas <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdas</b> į <b>'.$vipt.' VIP Ticketus</b>!</div>
	<div class="meniuc">
300 <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' ruda</b> - 1900 <b>'.$vipt.' VIP TICKET</b>!</div>
<div class="meniuc">
Turi <b>'.$inv[$ruda3].' <img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"></b></div>
<div class="meniuc">Gali parduoti: <b>'.sk($inv[$ruda3]/300).'</b> kartų.</div>
<div class="meniuc">
<form action="?id='.$ruda2.'2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
		}
elseif($id == "anglies2"){
    online('Rudų Keitykloje');
    top("Keičiasi rudas");
	$ruda ='anglies';
$ruda2='anglies';
$ruda3='anglis';
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*300;
		    $kiekv= $kiekv*1900;
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv[$ruda3]){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"> '.$ruda.' rūdų</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdų</b>, Gavai '.$kiekv.' <b>'.$vipt.' VIP TICKET</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET $ruda3=$ruda3-'$kainn' WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET vipticket=vipticket+'$kiekv' WHERE nick='$nick' ");

			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
    }
if($id == "mineralu"){
	 online('Rudų Keitykloje');
   top('Rudų keitykla');
	$ruda ='mineralu';
$ruda2='mineralu';
$ruda3='mineralai';
	echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimas <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdas</b> į <b>'.$vipt.' VIP Ticketus</b>!</div>
	<div class="meniuc">
300 <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' ruda</b> - 2200 <b>'.$vipt.' VIP TICKET</b>!</div>
<div class="meniuc">
Turi <b>'.$inv[$ruda3].' <img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"></b></div>
<div class="meniuc">Gali parduoti: <b>'.sk($inv[$ruda3]/300).'</b> kartų.</div>
<div class="meniuc">
<form action="?id='.$ruda2.'2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
		}
elseif($id == "mineralu2"){
    online('Rudų Keitykloje');
    top("Keičiasi rudas");
$ruda ='mineralu';
$ruda2='mineralu';
$ruda3='mineralai';
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*300;
		    $kiekv= $kiekv*2200;
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv[$ruda3]){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"> '.$ruda.' rūdų</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdų</b>, Gavai '.$kiekv.' <b>'.$vipt.' VIP TICKET</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET $ruda3=$ruda3-'$kainn' WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET vipticket=vipticket+'$kiekv' WHERE nick='$nick' ");

			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
    }
if($id == "spato"){
	 online('Rudų Keitykloje');
   top('Rudų keitykla');
	$ruda ='spato';
$ruda2='spato';
$ruda3='spatas';
	echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimas <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdas</b> į <b>'.$vipt.' VIP Ticketus</b>!</div>
	<div class="meniuc">
300 <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' ruda</b> - 2500 <b>'.$vipt.' VIP TICKET</b>!</div>
<div class="meniuc">
Turi <b>'.$inv[$ruda3].' <img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"></b></div>
<div class="meniuc">Gali parduoti: <b>'.sk($inv[$ruda3]/300).'</b> kartų.</div>
<div class="meniuc">
<form action="?id='.$ruda2.'2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
		}
elseif($id == "spato2"){
    online('Rudų Keitykloje');
    top("Keičiasi rudas");
		$ruda ='spato';
$ruda2='spato';
$ruda3='spatas';
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*300;
		    $kiekv= $kiekv*2500;
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv[$ruda3]){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"> '.$ruda.' rūdų</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdų</b>, Gavai '.$kiekv.' <b>'.$vipt.' VIP TICKET</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET $ruda3=$ruda3-'$kainn' WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET vipticket=vipticket+'$kiekv' WHERE nick='$nick' ");

			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
    }
if($id == "kvarco"){
	 online('Rudų Keitykloje');
   top('Rudų keitykla');
	$ruda ='kvarco';
$ruda2='kvarco';
$ruda3='kvarcas';
	echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimas <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdas</b> į <b>'.$vipt.' VIP Ticketus</b>!</div>
	<div class="meniuc">
300 <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' ruda</b> - 2800 <b>'.$vipt.' VIP TICKET</b>!</div>
<div class="meniuc">
Turi <b>'.$inv[$ruda3].' <img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"></b></div>
<div class="meniuc">Gali parduoti: <b>'.sk($inv[$ruda3]/300).'</b> kartų.</div>
<div class="meniuc">
<form action="?id='.$ruda2.'2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
		}
elseif($id == "kvarco2"){
    online('Rudų Keitykloje');
    top("Keičiasi rudas");
	$ruda ='kvarco';
$ruda2='kvarco';
$ruda3='kvarcas';
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*300;
		    $kiekv= $kiekv*2800;
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv[$ruda3]){
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16"> '.$ruda.' rūdų</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/kasimas/kasykla.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/kasimas/'.$ruda2.'.png"height="16" width="16">'.$ruda.' rūdų</b>, Gavai '.$kiekv.' <b>'.$vipt.' VIP TICKET</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET $ruda3=$ruda3-'$kainn' WHERE nick='$nick' ");
mysql_query("UPDATE zaidejai SET vipticket=vipticket+'$kiekv' WHERE nick='$nick' ");

			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","iskasenos.php","Atgal","Keitykla");
	navigacija($g_n);
    }
foot();
?>




