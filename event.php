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
   top('Vasaros eventas');
   
    online('Vasaros eventas');
 echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';
    echo '<div class="meniuc">
   Už <b>Vasaros gerybės</b>, gausi atsitikinį prizą!<br> <b>Prizas</b> gali būti <b>Critical Stone</b>, <b>'.$pinigaii.'</b>, <b>'.$eurui.'</b> bei <b>'.$kreditaii.'</b>!</div>';
   
    echo '<div class="up"> <b>Turimos <b>Vasaros gėrybės</b></b>:</div>
    <div class="meniu">
    ';
    echo'<img src="img/boxes/1.png">Pavogtų rožių: <b>'.sk($inv['event1']).'</b>/<b>250</b></br>';
echo'<img src="img/boxes/2.png"> Nuskintų lapelių: <b>'.sk($inv['event2']).'</b>/<b>250</b></br>';
echo'<img src="img/boxes/3.png">Surinktų vyšnių: <b>'.sk($inv['event3']).'</b>/<b>250</b></br>';
echo'<img src="img/boxes/4.png"> Sugautų drugelių: <b>'.sk($inv['event4']).'</b>/<b>250</b></br>';
  echo'  </div>';
if($inv['event1']>249 and $inv['event2'] > 249 and $inv['event3'] > 249 and $inv['event4'] >249 ){
    echo '<div class="meniuc">
   <img src="img/boxes/eventp.png"><a href="?id=event2">Pasiimti prizą!</a></div>';}

echo' <div class="meniu"><img src="img/boxes/lapelis.png"><a href="?id=keitykla"><b>Gėrybių</b> keitykla</a></div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Vasaros event");
	navigacija($g_n);
 }
if($id =='event2'){
  top('Vasaros eventas');
   
    online('Vasaros eventas');

       
      if($inv['event1']< 249 or $inv['event2'] < 249 or $inv['event3'] < 249 or $inv['event4'] < 249 ){
echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';
           echo '<div class="meniuc">Neturi pakankamai <b>Vasaros gėrybių</b>!</div>';
       } else {
            $randas = rand(0,5);
			$gaus[0] = array("sms_litai","100","500","$eurui");
		    $gaus[1] = array("litai","1000","1000000","$pinigaii");
			$gaus[2] = array("kred","2000","10000","$kreditaii");
			$gaus[3] = array("critical","200","1500","Critical Stone");
				$gaus[4] = array("auksiniai","500","7000","$auksiniaii");
$gaus[5] = array("vipticket","10000","15000","$vipt");
			list($statusas,$min,$max,$ko) = $gaus[$randas];	
			$duoda = rand($min,$max);
       echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';   
  echo '<div class="meniuc">Pasiėmei <img src="img/boxes/eventp.png">prizą ir gavai <b>'.sk($duoda).'</b> '.$ko.' <b></div>';
            mysql_query("UPDATE zaidejai SET $statusas=$statusas+'$duoda' WHERE nick='$nick' ");
       mysql_query("UPDATE inv SET $statusas=$statusas+'$duoda' WHERE nick='$nick' ");
        mysql_query("UPDATE inv SET event1=event1-'250', event2=event2-'250', event3=event3-'250', event4=event4-'250' WHERE nick='$nick'");
       }
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis", "Vasaros eventas");
	navigacija($g_n);
   
}
	if($id == "keitykla"){
	 online('Vasaros Event keitykloje');
   top('Vasaros Event Keitykla');
	
	
	echo'	<div class="meniuc">Čia gali pasirinkti kokių kums reikia <b>Gėrybių</b> pasikeisti!</div>
 <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>
	<div class="meniu">
	'.$ico.' <a href="?id=keiciu1">Keisti <b><img src="img/boxes/1.png">Rožes </b> į <b><img src="img/boxes/2.png">Lapelius</b></a></br>
		'.$ico.' <a href="?id=keiciu2">Keisti  <b><img src="img/boxes/2.png">Lapelius</b> į <b><img src="img/boxes/3.png">Vyšnias</b></a></br>
		'.$ico.' <a href="?id=keiciu3">Keisti <b><img src="img/boxes/3.png">Vyšnias</b> į <b><img src="img/boxes/4.png">Drugelius</b></a></br>
		'.$ico.' <a href="?id=keiciu4">Keisti <b><img src="img/boxes/4.png">Drugelius</b> į <b><img src="img/boxes/1.png">Rožes</b></a></br>
	

	</div>
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","event.php?id=","Event","Gėrybių keitykla ");
	navigacija($g_n);
		}

if($id == "keiciu1"){
	 online('Vasaros Evente');
   top('Vasaros Evento keitykla');
	
	echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimas <b><img src="img/boxes/1.png">Rožes</b> į <b><img src="img/boxes/2.png">Lapelius</b>!</div>
	<div class="meniuc">
2 <b><img src="img/boxes/1.png">Rožės</b> - 1 <b><img src="img/boxes/2.png">Lapelis</b>!</div>
<div class="meniuc">
<form action="?id=keiciu1a" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","event.php?id=","Event","Keitykla");
	navigacija($g_n);
		}
elseif($id == "keiciu1a"){
    online('Vasaros Event Keitykloje');
    top("Keičiasi Rožes");
  
   
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*2;
		
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv['event1']){
echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/boxes/1.png">Rožių</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/boxes/1.png">Rožių</b>, Gavai '.$kiekv.' <b><img src="img/boxes/2.png">Lapelių</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET event1=event1-'$kainn', event2=event2+'$kiekv' WHERE nick='$nick' ");
			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","event.php?id=keiciu1","Atgal","Rožių keitime");
	navigacija($g_n);
    }

if($id == "keiciu2"){
	 online('Vasaros Evente');
   top('Vasaros Evento keitykla');
	
	echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimas <b><img src="img/boxes/2.png">Lapelius</b> į <b><img src="img/boxes/3.png">Vyšnias</b>!</div>
	<div class="meniuc">
2 <b><img src="img/boxes/2.png">Lapeliai</b> - 1 <b><img src="img/boxes/3.png">Vyšnia</b>!</div>
<div class="meniuc">
<form action="?id=keiciu2a" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","event.php?id=","Event","Keitykla");
	navigacija($g_n);
		}
elseif($id == "keiciu2a"){
    online('Vasaros Event Keitykloje');
    top("Keičiasi Lapelius");
  
   
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*2;
		
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv['event2']){
echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/boxes/2.png">Lapelių</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/boxes/2.png">Lapelių</b>, Gavai '.$kiekv.' <b><img src="img/boxes/3.png">Vyšnių</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET event2=event2-'$kainn', event3=event3+'$kiekv' WHERE nick='$nick' ");
			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","event.php?id=keiciu1","Atgal","Lapelių keitime");
	navigacija($g_n);
    }
if($id == "keiciu3"){
	 online('Vasaros Evente');
   top('Vasaros Evento keitykla');
	
	echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimas <b><img src="img/boxes/3.png">Vyšnias</b> į <b><img src="img/boxes/4.png">Drugelius</b>!</div>
	<div class="meniuc">
2 <b><img src="img/boxes/3.png">Vyšnios</b> - 1 <b><img src="img/boxes/4.png">Drugelis</b>!</div>
<div class="meniuc">
<form action="?id=keiciu3a" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","event.php?id=","Event","Keitykla");
	navigacija($g_n);
		}
elseif($id == "keiciu3a"){
    online('Vasaros Event Keitykloje');
    top("Keičiasi Drugelius");
  
   
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*2;
		
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv['event3']){
echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/boxes/3.png">Vyšnių</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/boxes/3.png">Vyšnių</b>, Gavai '.$kiekv.' <b><img src="img/boxes/4.png">Drugelių</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET event3=event3-'$kainn', event4=event4+'$kiekv' WHERE nick='$nick' ");
			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","event.php?id=keiciu1","Atgal","Vyšnių keitime");
	navigacija($g_n);
    }

if($id == "keiciu4"){
	 online('Vasaros Evente');
   top('Vasaros Evento keitykla');
	
	echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';
	echo'	<div class="meniuc">Čia galite išsikeisti savo turimus <b><img src="img/boxes/4.png">Drugelius</b> į <b><img src="img/boxes/1.png">Rožes</b>!</div>
	<div class="meniuc">
2 <b><img src="img/boxes/4.png">Drugeliai</b> - 1 <b><img src="img/boxes/1.png">Rožė</b>!</div>
<div class="meniuc">
<form action="?id=keiciu4a" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Išsikeisti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","event.php?id=","Event","Keitykla");
	navigacija($g_n);
		}
elseif($id == "keiciu4a"){
    online('Vasaros Event Keitykloje');
    top("Keičiasi Drugelius");
  
   
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*2;
		
            
            if(empty($kiekv)){
echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv['event4']){
echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/boxes/4.png">Drugelių</b> !
</div>';
	          } else {
echo' <div class="meniuc"><img src=img/imgg/pavasario.png border="1" width="180" height="90"><alt="**"></div>';
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/boxes/4.png">Drugelių</b>, Gavai '.$kiekv.' <b><img src="img/boxes/1.png">Rožių</b>!</div>';
	             
	              
				   mysql_query("UPDATE inv SET event4=event4-'$kainn', event1=event1+'$kiekv' WHERE nick='$nick' ");
			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","event.php?id=keiciu1","Atgal","Drugelių keitime");
	navigacija($g_n);
    }


 foot();
?>
